<template>
    <div :class="'media-cell' + (mediaManager.isSingle ? ' is-single' : '')">
        <div class="media-cell-inner clearfix">
            <div class="checkbox-image-col clearfix" @click="onSelect">
                <div class="checkbox-col" v-show="!mediaManager.isSingle">
                    <input type="checkbox" ref="checkbox" class="checkbox" :checked="checked">
                </div>
                <div class="image-col">
                    <div v-if="media.thumbnail" class="media-img" :style="{ backgroundImage: 'url(\'' + addslashes(media.thumbnail) + '?' + thumbnailVersion + '\')' }" :title="media.name"></div>
                    <div v-else class="media-img" :title="media.name">
                        {{ media.extension }}
                    </div>
                </div>
            </div>
            <div class="detail-col">
                <div class="filename" @click="detailPopup">{{ media.file_name }}</div>
                <div class="title" @click="detailPopup" style="display: none;">{{ media.title }}</div>
                <div class="path" v-if="searchedQ != ''">{{ getFolderPath(media.folder_path) }}</div>
                <div class="delete" @click="remove">Delete</div>
                <div class="info">
                    <div class="info-left">
                        <div>{{ dateFormat(media.created_at) }}</div>
                        <div v-if="media.post_medias.length != 0">Selected: {{ media.post_medias.length }}</div>
                    </div>
                    <div class="info-right">{{ bytesToSize(media.size) }} </div> 
                </div>
            </div>
        </div>
        <media-detail-modal ref="detailModal" :media="media" @update="onUpdateMedia"></media-detail-modal>
    </div>
</template>
<script>
    import helper from '../../config/helper';
    export default {
        props: ['media', 'value', 'searchedQ'],
        mixins: [helper],
        components: {
            'media-detail-modal': require('./MediaDetailModal').default,
        },
        computed: {
            mediaManager: function () {
                return this.$root.$refs.manager;
            },
            mediaList: function () {
                return this.mediaManager.$refs.mediaList;
            },
            checked: function(){
                var self = this;

                return !!_.find(this.value, function(o) {
                    return o.id == self.media.id;
                });
            }
        },
        data: function() {
            return {
                thumbnailVersion: 0
            }
        },
        created: function(){

        },
        methods: {
            getFolderPath: function(folder_path){
                return folder_path.replace(/^media/, '');
            },
            remove: function(){
                var self = this;
                var params = new URLSearchParams();
                params.append('id', this.media.id);
                axios.post(config.media_library.endpoints.delete_media, params)
                    .then(function (response) {
                        var data = response.data;
                        if(data.status == 'success'){
                            self.$emit('delete', self.media);
                        }
                    })
                    .catch(function (error) {
                        console.log(error);
                    })
                    .then(function () {

                    }
                );
            },
            onSelect: function(){
                this.$emit('select', this.media);
            },
            isChecked: function(){
                return this.checked;
            },
            detailPopup: function(){
                this.$refs.detailModal.showModal();
            },
            onUpdateMedia: function(media){
                this.thumbnailVersion = new Date().getTime();
                this.$emit('update', media);
            },
        }
    }
</script>
