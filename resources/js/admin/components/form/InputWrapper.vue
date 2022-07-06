<template>
    <componment :is="withRow ? 'row' : 'slot-wrapper'" :required="required" :title="title">
        <componment :is="multiLanguage ? 'languages-tab' : 'slot-wrapper'" v-slot="slotProps">
            <slot :language="slotProps.language"></slot>
        </componment>
    </componment>
</template>

<script>
    import helper from '../config/helper';
    import inputMixins from '../config/inputMixins';
    export default {
        mixins: [helper],
        props: {
            withRow: Boolean,
            multiLanguage: Boolean,
            title: String,
            required: Boolean
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
