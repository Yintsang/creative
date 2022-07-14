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
                'title'=> 'Popup Title',
                'type' => 'textinput',
                'has_language' => true,
                'field' => 'title',
                'options' => [
                    'required' => true,
                ],
            ])

            @row([
                'title'=> 'Popup Description',
                'type' => 'editor',
                'has_language' => true,
                'field' => 'popup_description',
            ])

            @row([
                'title'=> 'Popup image (600 x 717px)',
                'type' => 'image-upload',
                'field' => 'popup_image',
            ])

            @row([
                'title'=> 'Popup url',
                'type' => 'textinput',
                'field' => 'popup_url',
            ])
             
            @include('admin.base.status')
        </div>
        @include('admin.base.footer') 
    </div>
    @include('admin.base.seo')
</form>
@endsection
@section('js')
@endsection