<template>
    <componment :is="withRow ? 'row' : 'slot-wrapper'" :required="required" :title="myTitle">
        <div class="repeater">
            <input type="hidden" :name="'repeater[' + field + ']'" v-if="rows.length == 0">
            <div class="repeater-header-row">
                <div v-for="subField in subFields" class="repeater-header-cell" style="width: 50%" v-text="getTitle(subField)"></div>
                <div class="repeater-header-cell remove-col"></div>
            </div>
            <draggable class="mb-3">
                <div v-for="(row, index) in rows" :key="row.__time" class="repeater-row">
                    <div class="repeater-content-row">
                        <div v-for="subField in subFields" :key="subField.field" class="repeater-cell" style="width: 50%">
                            <componment
                                :is="subField.input"
                                :field="subField.field"
                                :required="subField.required"
                                :title="subField.title"
                                :multi-language="subField.multiLanguage"
                                :with-row="false"
                                :is-repeater="true"
                                :repeaterField="field"
                                :repeaterIndex="index"
                                v-model="rows[index][subField.field]"
                            >
                            </componment>
                        </div>
                        <div class="repeater-cell remove-col">
                            <a href="javascript:void(0);" @click="removeRow(index)" class="btn-remove-row">
                                <i class="fa fa-close"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </draggable>
            <a href="javascript:void(0);" class="btn btn-primary" @click="addRow">Add Row</a>
        </div>
    </componment>
</template>

<script>
    import helper from '../config/helper';
    export default {
        mixins: [helper],
        props: {
            title: String,
            field: String,
            subFields: Array,
            required: Boolean,
            value: Array,
            withRow: {
                type: Boolean,
                default: true
            }
        },
        data: function() {
            var self = this;
            return {
                
            }
        },
        computed: {
            rows: {
                get: function() {
                    return this.value;
                },
                set: function(value) {
                    this.$emit("input", value);
                }
            },
            myTitle: function(){
                return this.getTitle(this);
            }
        },
        mounted: function(){
            
        },
        methods: {
            addRow: function(){
                var obj = {
                    __time: new Date().getTime(),
                };

                this.subFields.forEach(function(subField){
                    var value;
                    if(subField.multiLanguage){
                        value = []
                    }else{
                        value = null;
                    }

                    obj[subField.field] = value;
                })

                this.rows.push(obj);
            },
            removeRow: function(index){
                this.rows.splice(index, 1);
            },
        }
    }
</script>
