@php
    $custom_attrs = $options['custom_attrs'] ?? [];
@endphp

@if($repeater)
    <input type="{{ $options['input_type'] ?? 'text' }}" class="form-control {{ $errors->has($dot_name) ? 'is-invalid' : ''  }}" :name="{{ $name }}" v-model="{{ $value }}" autocomplete="off" {{ isset($options['required']) && $options['required'] ? 'required' : '' }}>
@else
    <input type="{{ $options['input_type'] ?? 'text' }}" class="form-control {{ $errors->has($dot_name) ? 'is-invalid' : ''  }}" name="{{ $name }}" value="{{ old($dot_name) ?? $value }}" autocomplete="off" {{ isset($options['required']) && $options['required'] ? 'required' : '' }}
    @foreach($custom_attrs as $attr => $attr_value)
        {!! $attr !!}="{!! $attr_value !!}"
    @endforeach
    >
@endif