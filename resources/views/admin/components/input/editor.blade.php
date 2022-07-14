@if($repeater)
    <tinymce-editor 
        :init="{{ $options['editor_params'] ?? 'editorParams' }}"
        :name="{{ $name }}"
        :initial-value="{{ old($dot_name) ? old($dot_name) : $value }}"
        :required="{{ isset($options['required']) && $options['required'] ? 'true' : 'false' }}"
    >
    </tinymce-editor>
@else
    <tinymce-editor 
        :init="{{ $options['editor_params'] ?? 'editorParams' }}"
        name="{{ $name }}"
        :initial-value="{{ json_encode(old($dot_name) ?? $value) }}"
        :required="{{ isset($options['required']) && $options['required'] ? 'true' : 'false' }}"
        v-model="record.{{ $js_name ?? $name }}"
    >
    </tinymce-editor>
@endif

