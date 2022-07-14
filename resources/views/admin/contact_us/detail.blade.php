@extends('layouts.admin')
@section('buttons')

    @if($id && $url = $record->getDetailUrl(['preview' => true]))
    <a class="btn btn-primary" href="{{ $url }}" target="_blank">Preview</a>
    @endif

    @can('update', $record)
    <button class="btn btn-success btn-save-main-form" type="button">Save</button>
    @endcan

    @can('delete', $record)
    <button class="btn btn-danger btn-save-delete-form" type="button">Delete</button>
    @endcan

    @can('back', $record)
    <a class="btn btn-secondary" href="{{ $config['links']['detail']['back'] }}">Back</a>
    @endcan  
@endsection
@section('content')
<form id="deleteForm" action="{{ route('admin.' . $config['section'] . '.delete') }}" method="post" enctype="multipart/form-data">
    @csrf
    <input type="hidden" name="id" value="{{ $id }}">
</form>

<form id="mainForm" action="{{ route('admin.' . $config['section'] . '.save') }}" method="post" enctype="multipart/form-data">
    @csrf
    <input type="hidden" name="id" value="{{ $id }}">
    <div class="card">
        <div class="card-header">{{ $config['page_name'] }}</div>
        <div class="card-body" id="app-main">
            @row([
                'title' => 'Tel',
                'type' => 'textinput',
                'field' => 'tel',
            ])

            @row([
                'title' => 'Whatsapp',
                'type' => 'textinput',
                'field' => 'whatsapp_footer',
            ])

            @row([
                'title' => 'Email',
                'type' => 'textinput',
                'field' => 'email',
            ])

            @row([
                'title' => 'Address',
                'type' => 'editor',
                'has_language' => true,
                'field' => 'address',
            ])

            @row([
                'title' => 'Google Map Link',
                'type' => 'textinput',
                'field' => 'google_map_link',
            ])

            @row([
                'title' => 'Google Map Image (528 x 792px)',
                'type' => 'image-upload',
                'field' => 'google_map_image',
            ])

            @row([
                'title' => 'Linkedin',
                'type' => 'textinput',
                'field' => 'linkedin',
            ])
             
            @row([
                'title' => 'Wechat',
                'type' => 'textinput',
                'field' => 'wechat',
            ])

            @row([
                'title' => 'Whatsapp Link',
                'type' => 'textinput',
                'field' => 'whatsapp',
            ])
        </div>
        @include('admin.base.footer') 
    </div>
    @include('admin.base.seo')
</form>
@endsection
@section('js')
@endsection