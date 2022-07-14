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
                    'checked' => $record->collection->pluck('id')->toArray(),
                    'list' =>  $collection->toArray()
                ]
            ])

            @row([
                'title' => 'Product Image (308 x 308px)',
                'type' => 'image-upload',
                'field' => 'image',
                'options' => [
                    'required' => true,
                    'is_single' => false
                ]
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
                'type' => 'radio',
                'field' => 'supplier_id',
                'title'=> 'Supplier',
                'options' => [
                    'required' => true,
                    'value_key' => 'id',
                    'title_key' => 'title',
                    'list' =>  $supplier->toArray()
                ]
            ])

            @row([
                'type' => 'radio',
                'field' => 'series_id',
                'title'=> 'Series',
                'options' => [
                    'required' => true,
                    'value_key' => 'id',
                    'title_key' => 'title',
                    'list' =>  $series->toArray()
                ]
            ])

            @row([
                'type' => 'checkbox',
                'field' => 'collection',
                'options' => [
                    'check_all' => 'false',
                    'value_key' => 'id',
                    'title_key' => 'title',
                    'checked' => $record->collection->pluck('id')->toArray(),
                    'list' =>  $collection->toArray()
                ]
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