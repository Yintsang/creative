<template>
    <div class="form-group row">
        <label class="col-md-2 col-form-label">
            <span v-html="title"></span>
            <span v-if="required" style="color: red;">*</span>
        </label>
        <div class="col-md-10">
            <slot></slot>
        </div>
    </div>
</template>

<script>
    import helper from '../config/helper';
    export default {
        mixins: [helper],
        props: {
            title: String,
            required: Boolean
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
