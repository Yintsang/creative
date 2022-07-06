<template>
    <b-tabs>
        <b-tab v-for="language in myLanguages" :title="language.name" :key="language.id">
           <slot :language="language"></slot>
        </b-tab>
    </b-tabs>
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
                myLanguages: []
            }
        },
        computed: {

        },
        mounted: function(){
            this.myLanguages = this.languages || this.$root.languages;
        },
        methods: {

        }
    }
</script>
