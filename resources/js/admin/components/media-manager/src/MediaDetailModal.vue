<template>
    <div class="media-detail-container">
        <b-modal ref="modalRef" :title="media.file_name" centered size="lg" @ok="saveMedia" @cancel="croppedImgData = false" ok-title="Save">
            <div class="d-block">
                <div class="mb-3" v-if="loaded">
                    <div v-if="media.thumbnail" class="media-main-img" :style="{ backgroundImage:  'url(\'' + (croppedImgData ? croppedImgData : media.path)+ '\')' }" :title="media.name"></div>
                </div>
                <div class="mb-3" style="text-align: center;" v-if="media.thumbnail">
                    <a class="btn btn-sm btn-primary" target="_blank" :href="media.path">Preview</a>
                    <button class="btn btn-sm btn-primary" @click="editMedia">Crop Image</button>
                    <b-modal ref="cropperModalRef" centered size="lg" @ok="crop" @cancel="croppedImgData = false">
                        <div class="cropper-wrapper">
                            <vueCropper
                                v-if="shownCropper"
                                ref="cropper"
                                autoCropWidth="200"
                                autoCropHeight="200"
                                :centerBox="true"
                                :autoCrop="true"
                                :full="true"
                                enlarge="2"
                                :img="media.path"
                            ></vueCropper>
                        </div>
                    </b-modal>
                </div>
                <form ref="form" enctype="multipart/form-data">
                    <input type="hidden" name="id" :value="media.id">
                    <input v-if="croppedImgData" type="hidden" name="image" :value="croppedImgData">
                    <div class="form-group row">
                        <label class="col-md-2 col-form-label">
                            Title
                            <div class="alt-remark-container">
                                <div>(For alt tag):</div>
                                <div class="alt-remark">
                                    <span>?</span>
                                    <div class="description">
                                        the term “alt tag” is a commonly used abbreviation of what's actually an alt attribute on an img tag. The alt tag of any image on your site should describe what's on it. Screen readers for the blind and visually impaired will read out this text and therefore make your image accessible.
                                    </div>
                                </div>
                            </div>
                        </label>
                        <div class="col-md-9">
                            <input type="text" class="form-control" v-model="media.title" name="title">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-md-2 col-form-label">
                            Filename:
                        </label>
                        <div class="col-md-9">
                            <input type="text" class="form-control" v-model="media.file_name" name="file_name">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-md-2 col-form-label">
                            Replace File:
                        </label>
                        <div class="col-md-9">
                            <input type="file" name="file">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-md-2 col-form-label">
                            Url:
                        </label>
                        <div class="col-md-9">
                            <a target="_blank" :href="media.path">{{ media.path }}</a>
                        </div>
                    </div>

                    <div v-if="media.thumbnail" class="form-group row">
                        <label class="col-md-2 col-form-label">
                            Size:
                        </label>
                        <div class="col-md-9 mt-2">
                            {{ media.width }} x {{ media.height }}
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-md-2 col-form-label">
                            File Size:
                        </label>
                        <div class="col-md-9 mt-2">
                            {{ bytesToSize(media.size) }}
                        </div>
                    </div>

                    <div class="form-group row" v-if="media.post_medias.length > 0">
                        <label class="col-md-2 col-form-label">
                            Selected By:
                        </label>
                        <div class="col-md-9 mt-2">
                            <ul>
                                <li v-for="post_media in media.post_medias">
                                    <a :href="getPostLink(post_media)" target="_blank">
                                        {{ post_media.post_table }}: {{ post_media.type }}, {{ post_media.mediable_id }}
                                        <i class="fa fa-external-link"></i>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-md-2 col-form-label">
                            Created:
                        </label>
                        <div class="col-md-9 mt-2">
                            <span>{{ dateFormat(media.created_at) }}</span>
                        </div>
                    </div>

                    <div class="form-group row" v-if="media.created_at != media.updated_at">
                        <label class="col-md-2 col-form-label">
                            Updated:
                        </label>
                        <div class="col-md-9 mt-2">
                            <span>{{ dateFormat(media.updated_at) }}</span>
                        </div>
                    </div>

                </form>
            </div>
        </b-modal>
    </div>
</template>
<script>
    import helper from '../../config/helper';
    export default {
        mixins: [helper],
        props: ['media'],
        data: function(){
            return {
                shownCropper: false,
                croppedImgData: false,
                imageSizeString: '',
                loaded: false
            }
        },
        created: function(){
            
        },
        methods: {
            showModal: function() {
                if(!this.loaded){
                    this.loaded = true;
                }
                this.$refs.modalRef.show();
            },
            hideModal: function() {
                this.$refs.modalRef.hide();
            },
            editMedia: function(){
                
                this.$refs.cropperModalRef.doShow();
                this.$refs.cropperModalRef.hide();
                this.shownCropper = true;
            },
            crop: function(){
                var self = this;
                this.$refs.cropper.getCropData((data) => {
                    self.croppedImgData = data;
                })

            },
            getImageSize: function(){
                var self = this;
                var img = new Image();
                img.onload = function() {
                    self.imageSizeString = this.width + ' x ' + this.height;
                }
                img.src = this.media.path;
            },
            getPostLink: function(post_media){
                return config.base_admin_url + '/' + post_media.post_table + '/detail/' + post_media.mediable_id;
            },
            saveMedia: function(){
                var self = this;
                var params = new FormData(this.$refs.form);

                axios.post(config.media_library.endpoints.edit_media, params)
                    .then(function (response) {
                        var data = response.data;
                        if(data.status == 'success'){
                            self.$emit('update', data.media);
                        }
                    })
                    .catch(function (error) {
                        console.log(error);
                    })
                    .then(function () {

                    }
                );
            }
        }
    }
</script>
