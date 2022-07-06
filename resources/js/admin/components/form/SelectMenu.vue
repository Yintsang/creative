<template>
    <input-wrapper :with-row="withRow" :multi-language="multiLanguage" :title="myTitle" :required="required" v-slot="slotProps">
        <select v-model="myValue" :name="getName(slotProps.language)" @change="onChange($event, slotProps.language)" :required="required" :readonly="readonly" :class="'form-control ' + (error ? 'is-invalid' : '')" v-bind="inputProps">
            <option v-for="(item, index) in items"  :value="item[valueKey]" v-text="item[titleKey]"></option>
        </select>
    </input-wrapper>
</template>

<script>
    import helper from '../config/helper';
    import inputMixins from '../config/inputMixins';
    export default {
        mixins: [helper, inputMixins],
        props: {
            valueKey: {
                type: String,
                default: 'value'
            },
            titleKey: {
                type: String,
                default: 'title'
            },
            items: {
                type: Array,
                default: []
            }
        },
        data: function() {
            var self = this;
            return {

            }
        },
        mounted: function(){
        },
        methods: {

        }
    }
</script>
