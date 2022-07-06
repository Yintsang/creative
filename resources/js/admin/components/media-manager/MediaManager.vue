<template>
    <div :class="'media-manager' + (isSingle ? ' is-single' : '' ) + ((this.showDropzone && !this.selectedRootFolder) ? ' opened-dropzone' : '')" :data-uploading="uploading">
        <modal ref="modal" :options="modalOptions"></modal>
        <div class="media-manager-inner justify-content-center">
            <div class="card card-default">
                <div class="card-header clearfix">
                    <div class="float-left">Media Manager</div>
                    <a href="javascript:void(0);" class="float-right" @click="close">
                        <i class="fa fa-close"></i>
                    </a>
                </div>
                <div class="media-manager-body card-body">
                    <div class="upload-progress-bar" :data-progress="uploadProgress" :style="{'width': (uploadProgress + '%'), 'opacity': uploadProgressOpacity}"></div>
                    <div class="media-manager-body-top">
                        <ul class="action-list">
                            <li><button class="btn btn-sm btn-primary" :disabled="selectedRootFolder" @click="switchDropzone">Upload</button></li>
                            <li><button class="btn btn-sm btn-primary" @click="addFolderPopup">Add Folder</button></li>
                            <li><button class="btn btn-sm btn-primary" :disabled="selectedFirstFolder" @click="renameFolderPopup">Rename Folder</button></li>
                            <li><button class="btn btn-sm btn-danger" :disabled="selectedFirstFolder" @click="deleteFolderPopup">Delete Folder</button></li>
                        </ul>
                        <div class="media-search-col">
                            <i class="fa fa-search"></i>
                            <input type="search" name="q" v-model="q" @keyup.enter="search" @search="search" autocomplete="off">
                        </div>
                    </div>

                    <div class="upload-file-container clearfix">
                        <div class="float-right" v-if="watermark">
                            <label for="input-watermark">
                                <input id="input-watermark" type="checkbox" name="watermark" v-model="addWatermark">
                                Add Watermark
                            </label>
                        </div>
                        <div class="clearfix"></div>
                        <vue-dropzone ref="dropzone" id="dropzone" :options="dropzoneOptions" @vdropzone-sending="dropzoneSending" @vdropzone-success="dropzoneUploadSuccess" @vdropzone-drop="dropzoneDrop" @vdropzone-total-upload-progress="onUploadProgress" @vdropzone-complete-multiple="onCompleteMultiple"></vue-dropzone>
                    </div>

                    <div class="media-manager-conten-container">
                        <multipane class="media-manager-content clearfix">
                            <div class="tree-col">
                                <v-jstree ref="tree" :data="folders" text-field-name="name" draggable @item-click="folderClick" @item-drop="moveFolder" @item-drop-before="moveFolderBefore"></v-jstree>
                            </div>
                            <multipane-resizer></multipane-resizer>
                            <div class="mediaList-col" :data-is-drag-over="isDragOver" @dragenter="dragEnterHander" @dragover="dragOverHandler" @dragleave="dragLeaveHandler" @drop="dropFile">
                                <media-list v-if="!isDragOver" :medias="medias" :selected-medias="selectedMedias" :selected-folder="selectedFolder" :upload-progress="uploadProgress" :loading="loading" :searched-q="searchedQ" ref="mediaList" v-model="selectedMedias" @select-media="onSelectMedia" @update-medias="onUpdateMedias" @delete-medias="onDeleteMedias" @update-loading="onUpdateLoading"></media-list>
                               
                                <div v-if="isDragOver" class="media-list-dropzone">
                                    <div>Drop files here to upload</div>
                                </div>

                            </div>
                        </multipane>
                    </div>
                </div>
                <div class="card-footer">
                    <div class="">
                        <ul class="breadcrumb media-breadcrumb">
                            <li v-for="folder in getSelectedFolderTree()" class="breadcrumb-item">
                                <a href="#" @click="clickBreadcrumb(folder)" v-text="folder.name"></a>
                            </li>
                        </ul>
                    </div>
                    <div class="manager-footer-right" v-if="caller && !isSingle">
                        <div class="d-inline-block mr-2">Selected {{ selectedMedias.length }} File(s) </div>
                        <a href="javascript:void(0);" class="btn btn-primary" @click="selectFilesToGallery">
                            Select
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    import helper from '../config/helper';
    export default {
        components: {
            'media-list': require('./src/MediaList').default,
        },
        mixins: [helper],
        props: ["allowBulkSelect", "watermark", 'rootId', 'lastBrowseFolderId'],

        data: function() {
            var self = this;
           return {
                folders: [{
                    name: "Media Library",
                    id: this.rootId,
                    opened: true,
                    is_root: this.rootId == 0,
                    icon: config.media_library.dir.icon,
                    children: config.media_library.dir.list
                }],
                dropzoneOptions: {
                    url: config.media_library.endpoints.upload,
                    // thumbnailWidth: 90,
                    // thumbnailHeight: 90,
                    headers: { "X-CSRF-TOKEN": config.csrf_token },
                    dictDefaultMessage: "<i class='fa fa-cloud-upload'></i> Drop files here to upload",
                    acceptedFiles: "image/*,application/*,video/*,audio/*,text/*",
                    addRemoveLinks: true,
                    // autoProcessQueue: false
                },
                showDropzone: false,
                modalOptions: {
                    textInputModel: '',
                    ok: function(){},
                    cancel: function(){}
                },
                selectedRootFolder: this.rootId == 0,
                isSingle: false,
                selectedMedias: [],
                caller: null,
                addWatermark: true,
                initFolderSelected: false,
                selectedFirstFolder: true,
                isDragOver: false,
                medias: [],
                selectedFolder: {
                    is_root: this.rootId == 0,
                },
                uploadProgress: 0,
                uploadProgressOpacity: 0,
                q: '',
                searchedQ: '',
                loading: false,
           }
        },
        computed: {
            newFolderName: function(){
                return this.modalOptions.textInputModel;
            },
            uploading: function(){
                return this.uploadProgress != 0 && this.uploadProgress != 100;
            }
        },
        created: function(){
        },
        mounted: function(){
            this.selectedFolder = this.$refs.tree.data[0];
        },
        methods: {
            switchDropzone: function() {
                this.showDropzone = !this.showDropzone;
            },
            dragEnterHander: function(e){
                if(this.selectedRootFolder){
                    return;
                }
                e.stopPropagation();
                e.preventDefault();
                this.isDragOver = true;
            },
            dragOverHandler: function(e){
                if(this.selectedRootFolder){
                    return;
                }
                e.stopPropagation();
                e.preventDefault();
            },
            dragLeaveHandler: function(e){
                if(this.selectedRootFolder){
                    return;
                }
                e.stopPropagation();
                e.preventDefault();
                this.isDragOver = false;
            },
            dropFile: function(e){
                if(this.selectedRootFolder){
                    return;
                }
                e.stopPropagation();
                e.preventDefault();
                var self = this;
                // this.showDropzone = true;
                this.isDragOver = false;
                this.$nextTick(function(){
                    var eventClone = new event.constructor(e.type, {
                        dataTransfer: e.dataTransfer
                    }) 
                    self.$refs.dropzone.dropzone.element.dispatchEvent(eventClone);
                })
            },
            clickBreadcrumb: function(folder){
                if(folder.disabled){
                    return;
                }
                this.selectFolder(folder.id);
            },
            search: function(e){
                if(this.loading){
                    return;
                }
                var self = this;

                this.selectedMedias = [];

                if(this.q == ''){
                    this.resetSearch();
                    return;
                }

                this.loading = true;
                self.searchedQ = self.q;

                axios.get(config.media_library.endpoints.search, {
                    params: {
                        q: this.q,
                    }
                })
                .then(function (response) {
                    var data = response.data;
                    if(data.status == 'success'){
                        self.medias = data.medias;
                    }
                })
                .catch(function (error) {
                    console.log(error);
                })
                .then(function () {
                    self.loading = false;
                });
            },
            resetSearch: function(){
                this.selectedMedias = [];
                this.q = '';
                this.searchedQ = '';
                this.$refs.mediaList.getMediasInFolder(this.getSelectedFolder());
            },
            folderClick: function(node) {
                if(this.getSelectedFolder().id == node.model.id){
                    // return;
                }
                this.q = '';
                this.searchedQ = '';
                this.uploadProgressOpacity = 0;
                this.uploadProgress = 0;
                this.selectedMedias = [];
                this.selectedFolderNode = node;
                this.selectedFolder = node.model;
                this.selectedFolder.opened = true;
                this.selectedRootFolder = this.getSelectedFolder().is_root;
                this.selectedFirstFolder = (this.getSelectedFolder().id == this.rootId);
                this.$refs.mediaList.getMediasInFolder(this.getSelectedFolder());
            },
            getSelectedFolder: function(){
                if(!this.selectedFolder){
                    this.selectedFolder = this.$refs.tree.data[0];
                }
                return this.selectedFolder;
            },
            getSelectedFolderTree: function(){
                if(this.searchedQ != ''){
                    return [
                        {
                            id: this.folders[0].id,
                            name: this.folders[0].name,
                        },
                        {
                            id: 'search',
                            name: 'Search: ' + this.searchedQ,
                            disabled: true,
                        }
                    ];
                }

                if(!this.selectedFolderNode){
                    return [];
                }
                var node = this.selectedFolderNode;
                var folder_id = this.selectedFolderNode.model.id;
                var tree = [{
                    id: folder_id,
                    name: node.model.name
                }];
                while(node.$parent && parseInt(folder_id) != parseInt(this.rootId)){
                    node = node.$parent;
                    folder_id = node.model.id;
                    tree.unshift({
                        id: folder_id,
                        name: node.model.name
                    })
                }
                return tree;
            },
            dropzoneDrop: function(event){
                this.uploadProgress = 0;
                this.uploadProgressOpacity = 1;
            },
            dropzoneSending: function(file, xhr, formData){
                this.updatingFolder = this.getSelectedFolder();
                formData.append("watermark", this.addWatermark);
                if(file.fullPath){
                    formData.append("fullPath", file.fullPath);
                }
                formData.append('folder_id', this.getSelectedFolder().id);
                formData.append("id", config.id);
            },
            dropzoneUploadSuccess: function(file, response){
                var self = this;
                if(response.status == 'success'){
                    this.$refs.dropzone.removeFile(file);
                    if(response.uploaded_file.folder_id == this.updatingFolder.id){
                        this.medias.unshift(response.uploaded_file);
                        if(!this.isSingle){
                            this.selectedMedias.unshift(response.uploaded_file)
                        }
                    }
                    this.updatingFolder.children = response.folder_tree;
                    this.$refs.tree.initializeData( this.updatingFolder.children )
                    this.updatingFolder.opened = true;
                }
            },
            onUploadProgress: function(totalUploadProgress, totalBytes, totalBytesSent){
                if(totalUploadProgress > this.uploadProgress){
                    this.uploadProgress = totalUploadProgress;
                }
            },
            onCompleteMultiple: function(){
                console.log('onCompleteMultiple')
            },
            addFolderPopup: function(){

                this.modalOptions = {
                    title: 'Add Folder',
                    description: 'Enter the folder name:',
                    textInput: true,
                    textInputModel: '',
                    ok: this.addFolder,
                    cancel: function(){}
                }
                this.$refs.modal.showModal();
            },
            renameFolderPopup: function(){
                this.modalOptions = {
                    title: 'Rename Folder',
                    description: 'Enter the new folder name:',
                    textInput: true,
                    textInputModel: this.getSelectedFolder().name,
                    ok: this.renameFolder,
                    cancel: function(){}
                }
                this.$refs.modal.showModal();
            },
            deleteFolderPopup: function(){
                this.modalOptions = {
                    title: 'Delete Folder',
                    description: 'Confirm to delete folder \'' + this.getSelectedFolder().name + '\' ? All sub folders and files will be deleted (Irreversible)',
                    ok: this.deleteFolder,
                    cancel: function(){}
                }
                this.$refs.modal.showModal();
            },
            addFolder: function(){
                var self = this;
                this.updatingFolder = this.getSelectedFolder();
                var params = new URLSearchParams();
                params.append('parent_folder_id', this.selectedFolder.id);
                params.append('new_folder_name', this.newFolderName);
                
                axios.post(config.media_library.endpoints.create_folder, params)
                    .then(function (response) {
                        var data = response.data;
                        if(data.status == 'success'){
                            self.modalOptions.textInputModel = '';
                            if(data.folder.is_new){
                                self.updatingFolder.addChild({
                                    id: data.folder.id,
                                    name: data.folder.name,
                                    icon: config.media_library.dir.icon,
                                })

                                self.$nextTick(function(){
                                    self.selectFolder(data.folder.id, false);
                                })

                            }else{
                                alert('Folder "' + data.folder.name + '" already exists');
                            }
                        }
                    })
                    .catch(function (error) {
                        console.log(error);
                    })
                    .then(function () {

                    }
                );
            },
            renameFolder: function(){
                var self = this;
                this.updatingFolder = this.getSelectedFolder();
                var params = new URLSearchParams();
                params.append('folder_id', this.selectedFolder.id);
                params.append('new_folder_name', this.newFolderName);
                
                axios.post(config.media_library.endpoints.rename_folder, params)
                    .then(function (response) {
                        var data = response.data;
                        if(data.status == 'success'){
                            self.modalOptions.textInputModel = '';
                            self.updatingFolder.name = data.folder.name;
                        }
                    })
                    .catch(function (error) {
                        console.log(error);
                    })
                    .then(function () {

                    }
                );
            },
            moveFolderBefore: function(node, item, draggedItem, e){
                this.movingFolder = draggedItem;
            },
            moveFolder: function(node, item, e){
                var self = this;
                var params = new URLSearchParams();
                params.append('folder_id', this.movingFolder.id);
                params.append('destination_folder_id', item.id);
                
                axios.post(config.media_library.endpoints.move_folder, params)
                    .then(function (response) {
                        var data = response.data;
                        if(data.status == 'success'){
                            self.movingFolder.name = data.folder.name;
                        }
                    })
                    .catch(function (error) {
                        console.log(error);
                    })
                    .then(function () {
                        self.movingFolder = null;
                    }
                );
                
            },
            deleteFolder: function(){
                var self = this;
                this.updatingFolderNode = this.selectedFolderNode;
   
                var params = new URLSearchParams();
                params.append('folder_id', this.selectedFolder.id);
                
                axios.post(config.media_library.endpoints.delete_folder, params)
                    .then(function (response) {
                        var data = response.data;
                        if(data.status == 'success'){
                            var index = self.updatingFolderNode.parentItem.indexOf(self.updatingFolderNode.model);
                            self.updatingFolderNode.parentItem.splice(index, 1);
                            self.selectFolder(self.updatingFolderNode.$parent.model.id);
                        }else{
                            if(data.message){
                                alert(data.message)
                            }
                        }
                    })
                    .catch(function (error) {
                        console.log(error);
                    })
                    .then(function () {

                    }
                );
            },
            open: function(caller, isSingle = false, lastGallery = false, folderId = false){
                var self = this;
                this.caller = caller;
                this.isSingle = isSingle;
                this.selectedMedias = []
                this.$parent.mediaManagerShown = true;
                if(this.initFolderSelected){
                    return;
                }

                if(!folderId){
                    folderId = this.lastBrowseFolderId || this.rootId;
                }

                if(lastGallery || folderId){
                    this.initFolderSelected = true;
                    if(lastGallery){
                        folderId = lastGallery.folder_id;
                    }
                    this.selectFolder(folderId, true)
                }
            },
            selectFolder: function(folder_id, openParentFolders){
                var folders = this.$refs.tree.$children;
                this.getFolderById(folders, folder_id);
                if(this.targetFolder){
                    this.unSelectAllFolders(folders);
                    this.folderClick(this.targetFolder);
                    this.targetFolder.model.selected = true;

                    if(openParentFolders){
                        var parent = this.targetFolder.$parent;

                        while(parent){
                            if(!parent.model || parent.model.id == 0){
                                break;
                            }
                            parent.model.openChildren();
                            parent = parent.$parent;
                        }
                    }
                }
            },
            unSelectAllFolders: function(folders){
                for(var i = 0; i < folders.length; i++){
                    folders[i].model.selected = false;
                    this.unSelectAllFolders(folders[i].$children);
                }
            },
            getFolderById: function(folders, targetFolderId){
                if(!folders){
                    return;
                }
                for(var i = 0; i < folders.length; i++){
                    if(folders[i].model.id == targetFolderId){
                        this.targetFolder = folders[i];
                    }

                    this.getFolderById(folders[i].$children, targetFolderId);
                }

            },
            close: function() {
                this.$parent.mediaManagerShown = false;
            },
            selectFilesToGallery: function(){
                if(typeof this.caller == 'function'){
                    var media = this.selectedMedias[0];
                    this.caller(media.path, {title: media.title});
                }else{
                    if(this.isSingle){
                        this.caller.mediasData = this.selectedMedias;
                    }else{
                        this.caller.mediasData =  _.unionBy(this.caller.mediasData, this.selectedMedias, 'id');
                    }
                }
                this.close();
            },
            onSelectMedia: function(medias){
                this.selectedMedias = medias;

                if(this.caller && this.isSingle){
                    return this.selectFilesToGallery();
                }
            },
            onUpdateMedias: function(medias){
                this.medias = medias;
            },
            onDeleteMedias: function(medias){

                var ids = _.map(medias, 'id');

                var updated_medias = _.reject(this.medias, function(a) {
                    return ids.indexOf(a.id) != -1;
                });

                this.medias = updated_medias;

                var selected_medias = _.reject(this.selectedMedias, function(a) {
                    return ids.indexOf(a.id) != -1;
                });

                this.selectedMedias = selected_medias;
            },
            onUpdateLoading: function(loading){
                this.loading = loading;
            },
        }
    }
</script>
