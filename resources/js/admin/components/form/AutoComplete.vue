<template>
    <input-wrapper :with-row="withRow" :multi-language="multiLanguage" :title="myTitle" :required="required" v-slot="slotProps">
        <vue-autosuggest
            :suggestions="filteredOptions"
            :input-props="{id: getId(slotProps.language), class: getClass(), name: getName(slotProps.language)}"
            v-model="myValue"
        >
        </vue-autosuggest>
    </input-wrapper>
</template>

<script>
    import helper from '../config/helper';
    import inputMixins from '../config/inputMixins';
    export default {
        mixins: [helper, inputMixins],
        props: {
            items: {
                type: Array,
                default: []
            }
        },
        data: function() {
            var self = this;
            return {
                query: ''
            }
        },
        computed: {
            filteredOptions: function() {
                var self = this;
                return [
                    {
                        data: this.items.filter(function(item){
                            return item.toLowerCase().indexOf(self.myValue.toLowerCase()) > -1;
                        })
                    }
                ];
            },
            myValue: {
                get: function() {
                    return typeof this.value == 'undefined' ? this.query : this.value;
                },
                set: function(value) {
                    if(typeof this.value == 'undefined'){
                        this.query = value;
                    } 
                    this.$emit("input", value);
                }
            },
        },
        mounted: function(){
        },
        methods: {

        }
    }
</script>
