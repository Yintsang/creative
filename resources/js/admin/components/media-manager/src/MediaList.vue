<template>
    <div class="media-list-container">
        <modal ref="moveFilesModal" :options="modalOptions">
            <v-jstree ref="tree2" :data="folders" text-field-name="name" @item-click="folderClick"></v-jstree>
        </modal>
        <div v-if="showMediasOrLoading" class="mb-3">
            <div v-if="!loading">
                <div v-if="searchedQ != ''" class="d-inline-block mr-3">
                    <span class="mr-1">Search: <b>{{ searchedQ }}</b> </span>
                    <a href="javascript:void(0);" @click="resetSearch">Reset</a>
                </div>
                <div class="d-inline-block mr-3">Total: {{ medias.length }} File(s)</div>
                <div v-if="selectedMedias.length > 0" class="d-inline-block">{{ selectedMedias.length }} File(s) Selected</div>
            </div>
            <div v-else>Loading...</div>
        </div>
        <div v-show="showMedias && !mediaManager.isSingle && medias.length > 0" class="media-list-action-row">
            <ul class="action-list" _v-show="medias.length > 0">
                <li class="checkbox-col"><input type="checkbox" @change="selectAll" :checked="selectedAll"></li>
                <li><button class="btn btn-sm btn-primary" :disabled="selectedMedias.length == 0" @click="moveFilesPopup">Move</button></li></li>
                <li><button class="btn btn-sm btn-danger" :disabled="selectedMedias.length == 0" @click="deleteFilesPopup">Delete</button></li></li>
            </ul>
        </div>
        <div v-show="showMedias" class="media-list">
            <media v-for="media in medias" :media="media" :searched-q="searchedQ" :key="media.id" @select="onSelectMedia" @update="onUpdateMedia" @delete="onDeleteMedia" v-model="selectedMedias"></media>
        </div>
        <div v-if="searchedQ == ''" class="media-list-placeholder">
            <div v-if="mediaManager.$refs.tree.data[0].id == 0 && mediaManager.$refs.tree.data[0].children.length == 0">
                Create a folder to store your first file
            </div>
            <div v-else-if="selectedFolder && selectedFolder.is_root">
                Please choose a folder
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        components: {
            'media': require('./Media').default,
        },
        computed: {
            mediaManager: function () {
                return this.$parent.$parent;
            },
            selectedAll: function(){
                return this.selectedMedias.length != 0 && this.selectedMedias.length == this.medias.length;
            },
            showMediasOrLoading: function(){
                return (this.selectedFolder && !this.selectedFolder.is_root) || this.searchedQ != '';
            },
            showMedias: function(){
                return this.showMediasOrLoading && !this.loading;
            },
        },
        props: ['value', 'medias', 'selectedMedias', 'selectedFolder', 'uploadProgress', 'loading', 'searchedQ'],
        data: function() {
            return {
                modalOptions: {
                    ok: function(){},
                    cancel: function(){}
                },
                folders: [],
                selectedMoveFolder: null,
                dropzoneOptions: {
                    url: config.media_library.endpoints.upload,
                    thumbnailWidth: 90,
                    thumbnailHeight: 90,
                    headers: { "X-CSRF-TOKEN": config.csrf_token },
                    // dictDefaultMessage: "<i class='fa fa-cloud-upload'></i> Drop files here to upload"
                },
                cancelSource: null,
            }
        },
        created: function(){

        },
        mounted: function(){

        },
        methods: {
            folderClick: function(node){
                this.selectedMoveFolder = node.model;
                this.modalOptions.okDisabled = (this.selectedMoveFolder.id == this.selectedFolder.id);
            },
            selectAll: function(e){
                var medias = !this.selectedAll ? this.medias : [];
                this.$emit('select-media', medias);
            },
            getMediasInFolder: function(folder){
                var self = this;
                if(this.cancelSource){
                    this.cancelSource.cancel();
                    this.cancelSource = null;
                }

                var CancelToken = axios.CancelToken;
                var source = CancelToken.source();
                this.cancelSource = source;
                this.$emit('update-loading', true);
                axios.get(config.media_library.endpoints.medias_in_folder + '/' + folder.id, {
                    cancelToken: source.token
                }).then(function (response) {
                    var data = response.data;

                    if(data.status == 'success' && data.folder && data.folder.id == self.selectedFolder.id){
                        self.$emit('update-medias', data.medias)
                        $('.media-list').scrollTop(0);
                    }
                })
                .catch(function (error) {
                    console.log(error);
                })
                .then(function () {
                    self.cancelSource = null;
                    self.$emit('update-loading', false);
                });
            },
            deleteFilesPopup: function(){
                this.mediaManager.modalOptions = {
                    title: 'Delete Files',
                    description: 'Confirm to delete ' + this.selectedMedias.length + ' file(s)?',
                    ok: this.deleteFiles,
                    cancel: function(){}
                }
                this.mediaManager.$refs.modal.showModal();
            },
            deleteFiles: function(){
                var self = this;
                var ids = _.map(this.selectedMedias, 'id');
                var params = new URLSearchParams();
                params.append('id', ids);
                axios.post(config.media_library.endpoints.delete_media, params)
                    .then(function (response) {
                        var data = response.data;
                        if(data.status == 'success'){
                            var medias = _.reject(self.medias, function(media) {
                                return _.indexOf(ids, media.id) >= 0;
                            });
                            self.$emit('select-media', []);
                            self.$emit('update-medias', medias)
                        }
                    })
                    .catch(function (error) {
                        console.log(error);
                    })
                    .then(function () {

                    }
                );
            },
            moveFilesPopup: function(){
                this.folders = _.cloneDeep(this.mediaManager.$refs.tree.data, true);
                this.folders[0].disabled = true;
                this.modalOptions = {
                    title: 'Move Files',
                    description: 'Move file(s) to:',
                    okDisabled: true,
                    ok: this.moveFiles,
                    cancel: function(){}
                }
                
                this.$refs.moveFilesModal.showModal();
            },
            moveFiles: function(){
                var self = this;
                this.checkedAll = false;
                if(!this.selectedMoveFolder || this.selectedMoveFolder.id == 0){
                    return;
                }
                var folder_id = this.selectedMoveFolder.id;
                var ids = _.map(this.selectedMedias, 'id');
                var deleting_medias = this.selectedMedias;
                var params = new URLSearchParams();
                params.append('id', ids);
                params.append('folder_id', folder_id);
                axios.post(config.media_library.endpoints.move_media, params)
                    .then(function (response) {
                        var data = response.data;
                        if(data.status == 'success'){
                            self.$emit('delete-medias', deleting_medias);
                        }
                    })
                    .catch(function (error) {
                        console.log(error);
                    })
                    .then(function () {

                    }
                );
            },
            onSelectMedia: function(media){
                var medias = _.xorBy(this.selectedMedias, [media], 'id');
                this.$emit('select-media', medias);
            },
            onUpdateMedia: function(media){
                var updated_medias = _.map(this.medias, function(a) {
                    return a.id === media.id ? media : a;
                });
                this.$emit('update-medias', updated_medias);
            },
            onDeleteMedia: function(media){
                this.$emit('delete-medias', [media]);
            },
            resetSearch: function(){
                this.mediaManager.resetSearch();
            }
            
        }
    }
</script>
