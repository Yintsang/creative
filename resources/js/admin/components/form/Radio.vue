<template>
    <input-wrapper :with-row="withRow" :multi-language="multiLanguage" :title="myTitle" :required="required" v-slot="slotProps">
        <div v-for="(item, index) in items" class="form-check form-check-inline mr-3">
            <input type="radio" :id="getId(slotProps.language, index)" :class="'form-check-input ' + (error ? 'is-invalid' : '')" :name="getName(slotProps.language)" @change="onChange($event, slotProps.language)" :value="item[valueKey]" :required="required" :readonly="readonly" @blur="onBlur" v-model="myValue" v-bind="inputProps" />
            <label class="form-check-label" :for="getId(slotProps.language, index)" v-text="item[titleKey]"></label>
        </div>
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
