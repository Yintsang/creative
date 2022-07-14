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
                'type' => 'editor',
                'field' => 'description',
                'has_language' => true,
            ])

            @row([
                'title' => 'Image (660 x 490px)',
                'type' => 'image-upload',
                'field' => 'image',
            ])

            @row([
                'type' => 'editor',
                'title' => 'Content',
                'has_language' => true,
                'field' => 'image_title',
            ])

            @repeater([
                'field' => 'content',
                'show_title' => true,
                'title' => 'Icon',
                'sub_fields' =>
                [
                    [
                        'title' =>'Image (100 x 100px)',
                        'type' => 'image-upload',
                        'field' => 'image',
                        'options' => [
                            'width' => '20%'
                        ]
                    ],
                    [
                        'type' => 'textinput',
                        'field' => 'img_content',
                        'has_language' => true,
                        'options' => [
                            'width' => '50%'
                        ]
                    ],
                ]
            ])

            @row([
                'type' => 'editor',
                'title' => 'Sub Description',
                'has_language' => true,
                'field' => 'sub_description',
            ])
             
        </div>
        @include('admin.base.footer') 
    </div>
    <!-- @include('admin.base.seo') -->
</form>
@endsection
@section('js')
@endsection