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
                'title' =>'Background Image (2160 x 1425px)',
                'type' => 'image-upload',
                'field' => 'background_image',
                'options' => [
                    'required' => true,
                ],
            ])

            @row([
                'title' =>'Circle Image (1300 x 1300px)',
                'type' => 'image-upload',
                'field' => 'image',
                'options' => [
                    'required' => true,
                ],
            ])

            @row([
                'title' =>'Product Image (1300 x 1300px)',
                'type' => 'image-upload',
                'field' => 'p_image',
                'options' => [
                    'required' => true,
                ],
            ])

            @row([
                'type' =>'Description title',
                'type' => 'textinput',
                'field' => 'description_title',
                'has_language' => true,
            ])

            @row([
                'type' => 'textarea',
                'field' => 'description',
                'has_language' => true,
            ])
            
            @row([
                'type' => 'textinput',
                'field' => 'url',
                'has_language' => true,
            ])

            <b>If Chinese version please start at "/zh-hant/"</b>

            @include('admin.base.status')
        </div>
        @include('admin.base.footer') 
    </div>
    @include('admin.base.seo')
</form>
@endsection
@section('js-before')
@parent
<script>
    mixins.push({
        data: {
            titles: {
                1: 'title1',
                2: 'title2',
                3: 'title3',
            },
            rows: [],
            radio: null,
            autocomplete: '',
        }
    })
</script>
@endsection