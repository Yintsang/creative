<template>
    <input-wrapper :with-row="withRow" :multi-language="multiLanguage" :title="myTitle" :required="required" v-slot="slotProps">
        <textarea :class="getClass()" :name="getName(slotProps.language)" @change="onChange($event, slotProps.language)" :value="getValue(slotProps.language)" autocomplete="off" :required="required" :placeholder="placeholder" :readonly="readonly" @blur="onBlur" v-bind="inputProps"></textarea>
    </input-wrapper>
</template>

<script>
    import helper from '../config/helper';
    import inputMixins from '../config/inputMixins';
    export default {
        mixins: [helper, inputMixins],
        props: {

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
