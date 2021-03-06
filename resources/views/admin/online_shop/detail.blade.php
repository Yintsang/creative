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
                'field' => 'supplier',
                'options' => [
                    'check_all' => 'false',
                    'value_key' => 'id',
                    'title_key' => 'title',
                    'checked' => $record->supplier->pluck('id')->toArray(),
                    'list' =>  $supplier->toArray()
                ]
            ])
            
            @row([
                'type' => 'image-upload',
                'title' => 'Logo',
                'field' => 'logo',
            ])

            @row([
                'type' => 'textinput',
                'has_language' => true,
                'title' => 'Company Name',
                'field' => 'title',
            ])

            @row([
                'type' => 'textinput',
                'has_language' => true,
                'title' => 'Website Address',
                'field' => 'website_address',
            ])

            @row([
                'type' => 'textinput',
                'title' => 'Email Address',
                'field' => 'email',
            ])

            @row([
                'type' => 'textinput',
                'title' => 'Telephone',
                'field' => 'tel',
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