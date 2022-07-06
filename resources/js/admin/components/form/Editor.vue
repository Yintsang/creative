<template>
    <input-wrapper :with-row="withRow" :multi-language="multiLanguage" :title="myTitle" :required="required" v-slot="slotProps">
        <tinymce-editor 
            :init="myEditorParams"
            :name="getName(slotProps.language)"
            :initial-value="initialValue ? initialValue : myValue"
            v-model="myValue"
            :required="required"
        >
        </tinymce-editor>
    </input-wrapper>
</template>

<script>
    import helper from '../config/helper';
    import inputMixins from '../config/inputMixins';
    export default {
        mixins: [helper, inputMixins],
        props: {
            initialValue: String,
            editorParams: Object,
        },
        data: function() {
            var self = this;
            return {

            }
        },
        computed: {
            myEditorParams: function(){
                if(!this.editorParams){
                    return this.$root.editorParams;
                }

                return this.editorParams
            }
        },
        mounted: function(){
            
        },
        methods: {
           
        }
    }
</script>
