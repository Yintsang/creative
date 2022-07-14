@if($repeater)
    <textarea class="form-control {{ $errors->has($dot_name) ? 'is-invalid' : ''  }}" :name="{{ $name }}" rows="5" {{ isset($options['required']) && $options['required'] ? 'required' : '' }} v-model="{{ $value }}"></textarea>
@else
    <textarea class="form-control {{ $errors->has($dot_name) ? 'is-invalid' : ''  }}" name="{{ $name }}" rows="5" {{ isset($options['required']) && $options['required'] ? 'required' : '' }}>{{ old($dot_name) ?? $value }}</textarea>
@endif

