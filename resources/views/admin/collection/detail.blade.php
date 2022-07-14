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
                'type' => 'checkbox',
                'field' => 'business',
                'options' => [
                    'check_all' => 'false',
                    'value_key' => 'id',
                    'title_key' => 'title',
                    'checked' => $record->business->pluck('id')->toArray(),
                    'list' =>  $business->toArray()
                ]
            ])

            @row([
                'title' => 'Banner (2462 x 760px)',
                'type' => 'image-upload',
                'field' => 'image',
                'options' => [
                    'required' => true,
                ],
            ])

            @row([
                'type' => 'textinput',
                'has_language' => true,
                'field' => 'title',
                'options' => [
                    'required' => true,
                ],
            ])

            @row([
                'type' => 'editor',
                'has_language' => true,
                'field' => 'description',
            ])
            
            @row([
                'title' => 'Header 1',
                'type' => 'textinput',
                'has_language' => true,
                'field' => 'header_1',
            ])

            @row([
                'title' => 'Header Color 1',
                'type' => 'colorpicker',
                'field' => 'header_color_1',
            ])

            @repeater([
                'field' => 'content',
                'show_title' => true,
                'title' => 'Bullet Point 1',
                'button_text' => 'Add Bullet Point',
                'sub_fields' =>
                [
                    [
                        'title' => 'Content',
                        'type' => 'textinput',
                        'field' => 'content',
                        
                        'has_language' => true,
                        'options' => [
                            'width' => '50%'
                        ]
                    ],
                ]
            ])

            @row([
                'title' => 'Header 2',
                'type' => 'textinput',
                'has_language' => true,
                'field' => 'header_2',
            ])

            @row([
                'title' => 'Header Color 2',
                'type' => 'colorpicker',
                'field' => 'header_color_2',
            ])

            @repeater([
                'field' => 'content2',
                'show_title' => true,
                'title' => 'Bullet Point 2',
                'button_text' => 'Add Bullet Point',
                'sub_fields' =>
                [
                    [
                        'title' => 'Content',
                        'type' => 'textinput',
                        'field' => 'content',
                        'has_language' => true,
                        'options' => [
                            'width' => '50%'
                        ]
                    ],
                ]
            ])

            @row([
                'title' => 'Header 3',
                'type' => 'textinput',
                'has_language' => true,
                'field' => 'header_3',
            ])

            @row([
                'title' => 'Header Color 3',
                'type' => 'colorpicker',
                'field' => 'header_color_3',
            ])

            @repeater([
                'field' => 'content3',
                'show_title' => true,
                'title' => 'Bullet Point 3',
                'button_text' => 'Add Bullet Point',
                'sub_fields' =>
                [
                    [
                        'title' => 'Content',
                        'type' => 'textinput',
                        'field' => 'content',
                        'has_language' => true,
                        'options' => [
                            'width' => '50%'
                        ]
                    ],
                ]
            ])

            @row([
                'title' => 'Header 4',
                'type' => 'textinput',
                'has_language' => true,
                'field' => 'header_4',
            ])

            @row([
                'title' => 'Header Color 4',
                'type' => 'colorpicker',
                'field' => 'header_color_4',
            ])

            @repeater([
                'field' => 'content4',
                'show_title' => true,
                'title' => 'Bullet Point 4',
                'button_text' => 'Add Bullet Point',
                'sub_fields' =>
                [
                    [
                        'title' => 'Content',
                        'type' => 'textinput',
                        'field' => 'content',
                        'has_language' => true,
                        'options' => [
                            'width' => '50%'
                        ]
                    ],
                ]
            ])

            @row([
                'title' => 'Description 2',
                'type' => 'editor',
                'has_language' => true,
                'field' => 'description2',
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