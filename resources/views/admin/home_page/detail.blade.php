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
                'title'=> 'About Us',
                'type' => 'editor',
                'has_language' => true,
                'field' => 'about_us',
            ])

            @row([
                'title'=> 'First Header',
                'type' => 'textinput',
                'has_language' => true,
                'field' => 'first_header',
            ])

            @row([
                'title'=> 'First Title',
                'has_language' => true,
                'type' => 'textinput',
                'field' => 'first_title',
            ])

            @row([
                'title'=> 'First Description',
                'has_language' => true,
                'type' => 'editor',
                'field' => 'first_description',
            ])

            @row([
                'title'=> 'First URL',
                'has_language' => true,
                'type' => 'textinput',
                'field' => 'first_url',
            ])
            <b>If Chinese version please start at "/zh-hant/"</b>
            
            @row([
                'title'=> 'Background Image (600 x 600px)',
                'type' => 'image-upload',
                'field' => 'bg_image',
                'options' => [
                    'required' => true,
                ],
            ])

            @row([
                'title'=> 'Product Background Image (1800 x 1880px)',
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
            
            @repeater([
                'field' => 'content',
                'show_title' => true,
                'title' => 'Content',
                'sub_fields' =>
                [
                    [
                        'title' => 'Header',
                        'type' => 'textinput',
                        'has_language' => true,
                        'field' => 'header',
                        'options' => [
                            'width' => '20%'
                        ]
                    ],
                    [
                        'title' => 'Title',
                        'type' => 'textinput',
                        'has_language' => true,
                        'field' => 'textinput',
                        'options' => [
                            'width' => '20%'
                        ]
                    ],
                    [
                        'title'=> 'Description',
                        'type' => 'textarea',
                        'field' => 'description',
                        'has_language' => true,
                        'options' => [
                            'width' => '30%'
                        ]
                    ],
                    [
                        'title'=> 'URL',
                        'type' => 'textinput',
                        'field' => 'url',
                        'has_language' => true,
                        'options' => [
                            'width' => '10%'
                        ]
                    ],
                    [
                        'title'=> 'Product Banner Image (1448 x 620px)',
                        'type' => 'image-upload',
                        'field' => 'content_pb_image',
                        'options' => [
                            'width' => '10%',
                            'is_single' => false
                        ]
                    ],
                    [
                        'title'=> 'Product Image (303 x 303px)',
                        'type' => 'image-upload',
                        'field' => 'content_p_image',
                        'options' => [
                            'width' => '10%',
                            'is_single' => false
                        ]
                    ],
                ]
            ])
             
        </div>
        @include('admin.base.footer') 
    </div>
    @include('admin.base.seo')
</form>
@endsection
@section('js')
@endsection