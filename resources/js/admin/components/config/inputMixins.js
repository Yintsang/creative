export default {
    props: {
        title: {
            type: String,
        },
        field: {
            type: String,
            required: true
        },
        name: {
            type: String,
        },
        readonly: {
            type: Boolean,
            default: false
        },
        placeholder: String,
        value: String|Number|Array|Object,
        error: {
            type: Boolean,
            default: false
        },
        required: Boolean,
        multiLanguage: {
            type: Boolean,
            default: false
        },
        isRepeater: Boolean,
        repeaterField: String,
        repeaterIndex: Number,
        withRow: {
            type: Boolean,
            default: true
        },
        inputProps: Object,
    },
    computed: {
        myValue: {
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
    methods: {
        onBlur: function(e){
            this.$emit('blur', e.target.value)
        },
        getName: function(language){
            if(this.name){
                return this.name;
            }

            if(this.isRepeater){
                if(!language){
                    return 'repeater[' + this.repeaterField + '][' + this.repeaterIndex + '][' + this.field + ']';
                }else{
                    return 'repeater[' + this.repeaterField + '][' + this.repeaterIndex + '][languages][' + language.id + '][' + this.field + ']';
                }
            }

            if(!language){
                return this.field;
            }

            return 'languages[' + language.id + '][' + this.field + ']';
        },
        getValue: function(language){
            if(!language){
                return this.myValue;
            }

            return this.myValue ? this.myValue[language.id] : '';
        },
        getId: function(language, key){
            return this.getName(language).replace(/(\[|\])/, '_') + (typeof key != 'undefined' ?  ('_' + key) : '');
        },
        getClass: function(){
            return 'form-control ' + (this.error ? 'is-invalid' : '');
        },
        onChange: function(e, language){
            if(!language){
                this.$emit("change", e.target.value);
            }else{
                var value =  this.myValue || {};
                value[language.id] = e.target.value;
                this.$emit("change", this.myValue);
            }
        }
    }
}