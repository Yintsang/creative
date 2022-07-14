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
                'type' => 'textinput',
                'has_language' => true,
                'field' => 'title',
            ])

            @row([
                    'title' => 'logo (500 x 103px)',
                    'type' => 'image-upload',
                    'field' => 'logo',
            ])

            @row([
                'type' => 'editor',
                'field' => 'description',
                'has_language' => true,
            ])

            @row([
                'title'=> 'Background Image (600 x 600px)',
                'type' => 'image-upload',
                'field' => 'bg_image',
                'options' => [
                    'required' => true,
                ],
            ])

            @row([
                'title'=> 'Product Background Image (1800 x 1800px)',
                'type' => 'image-upload',
                'field' => 'pbg_image',
                'options' => [
                    'required' => true,
                ],
            ])

            @row([
                'title'=> 'Product Image (528 x 528px)',
                'type' => 'image-upload',
                'field' => 'p_image',
                'options' => [
                    'required' => true,
                ],
            ])

            @row([
                'type' => 'textinput',
                'has_language' => true,
                'field' => 'url',
            ])          
            <b>If Chinese version please start at "/zh-hant/"</b>
        </div>
        @include('admin.base.footer') 
    </div>
    <!-- @include('admin.base.seo') -->
</form>
@endsection
@section('js')
@endsection