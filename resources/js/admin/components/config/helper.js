export default {
    methods: {
        bytesToSize: function(bytes) {
           var sizes = ['Bytes', 'KB', 'MB', 'GB', 'TB'];
           if (bytes == 0) return '0 Byte';
           var i = parseInt(Math.floor(Math.log(bytes) / Math.log(1024)));
           return Math.round(bytes / Math.pow(1024, i), 2) + ' ' + sizes[i];
        },
        addslashes: function(string){
            return string.replace(/\\/g, '\\\\').
                replace(/\u0008/g, '\\b').
                replace(/\t/g, '\\t').
                replace(/\n/g, '\\n').
                replace(/\f/g, '\\f').
                replace(/\r/g, '\\r').
                replace(/'/g, '\\\'').
                replace(/"/g, '\\"');
        },
        dateFormat: function(date){
            return moment(date).format('YYYY-MM-DD HH:mm:ss');
        },
        ucwords: function(str){
            str = str.toLowerCase();
            return str.replace(/(^([a-zA-Z\p{M}]))|([ -][a-zA-Z\p{M}])/g,
            function($1){
                return $1.toUpperCase();
            });
        },
        getTitle: function(obj){
            if(typeof obj.title != 'undefined'){
                return obj.title;
            }
            return this.ucwords(obj.field.replace(/_/g, ' '));
        },
    }
}