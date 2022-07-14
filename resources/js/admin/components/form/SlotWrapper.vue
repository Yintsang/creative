<template>
    <div>
        <slot></slot>
    </div>
</template>

<script>
    import helper from '../config/helper';
    export default {
        mixins: [helper],
        props: {
            languages: Array
        },
        data: function() {
            var self = this;
            return {
            }
        },
        computed: {

        },
        mounted: function(){
        },
        methods: {

        }
    }
</script>
