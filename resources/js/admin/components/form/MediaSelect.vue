<template>
    <input-wrapper :with-row="withRow" :multi-language="multiLanguage" :title="myTitle" :required="required" v-slot="slotProps">
        <gallery-list 
            :is-single="!isMulti"
            :type="field"
            main-field="{{ $main_field ?? ''}}"
            :is-repeater="false"
            :language-id="slotProps.language ? slotProps.language.id : 1"
            :medias="{{ $is_repeater ? $_medias : json_encode($_medias) }}"
            :r-index="r_index"
            field="{{ $field_name }}"
            last-folder-id="{{ request()->session()->get('lastBrowseFolderId') }}"
            :is-video="type == 'video'"
            :is-file="type == 'file'"
            button-title="{{ $options['button_title'] ?? '' }}"
            :required="required"
        >
        </gallery-list>
    </input-wrapper>
</template>

<script>
    import helper from '../config/helper';
    import inputMixins from '../config/inputMixins';
    export default {
        mixins: [helper, inputMixins],
        props: {
            type: {
                type: String,
                default: 'image'
            },
            buttonName: {
                type: String,
            },
            isMulti: {
                type: Boolean,
                default: false,
            }
        },
        data: function() {
            var self = this;
            return {

            }
        },
        computed: {
            myButtonName: function(){
                if(typeof this.buttonName != 'undefined'){
                    return this.buttonName;
                }

                var buttonName;

                if(this.isMulti){
                    buttonName = 'Add '; 
                }else{
                    buttonName = 'Select '; 
                }

                if(this.type == 'image'){
                    return 'Select Im'
                }
            }
        },
        mounted: function(){

        },
        methods: {

        }
    }
</script>
