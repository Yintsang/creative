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
            'type' => 'searchselect',
            'field' => 'district_id',
            'title'=> 'Location',
            'options' => [
                'required' => true,
                'value_key' => 'id',
                'title_key' => 'search_title',
                'list' =>  $districts->toArray()
            ]
        ])

        {{-- @row([
            'type' => 'select',
            'field' => 'location',
            'title' => 'Region',
            'options' => [
                'placeholder' => [
                    'title' => 'Please Select'
                ],
                'selected' => $record->location,
                'list' => $countries,
                'value_key' => 'id',
            ]
        ])

        <div id="region" style="display: none">
            @foreach ($regions as $key => $region)
                @if (count($region) > 1)
                    <div id="region-{{$key}}" style="display: none">
                        @row([
                            'type' => 'select',
                            'title' => 'Location',
                            'field' => 'region-' . $key,
                            'options' => [
                                'placeholder' => [
                                    'title' => 'Please Select',
                                ],
                                'selected' => $record->region,
                                'list' => $region,
                                'value_key' => 'id',
                            ]
                        ])
                    </div>
                @endif
            @endforeach
        </div>

        <div id="district" style="display: none">
            @foreach ($districts as $key => $district)
                <div id="district-{{$key}}" style="display: none">
                    @row([
                        'type' => 'select',
                        'title' => 'District',
                        'field' => 'district-' . $key,
                        'options' => [
                            'placeholder' => [
                                'title' => 'Please Select',
                            ],
                            'selected' => $record->district,
                            'list' => $district,
                            'value_key' => 'id',
                        ]
                    ])
                </div>
            @endforeach
        </div> --}}

        @row([
                'type' => 'checkbox',
                'field' => 'supplier',
                'title' => 'Brand',
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
                'title' => 'Address',
                'field' => 'address',
            ])

            @row([
                'type' => 'textinput',
                'title' => 'Google Map Link',
                'field' => 'google_map_link',
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
<script>
    function showRegion() {
        var select = $('select[name="location"]').find(":selected");

        if (select.val() == 1) {
            $('#region').show()
            $('#region-1').show()
            $('#region-9').hide()
            showDistrict()
        } else if (select.val() == 9) {
            $('#region').show()
            $('#region-1').hide()
            $('#region-9').show()
            $('#district').hide()
        }
    }

    function showDistrict() {
        var select = $('select[name="region-1"]').find(":selected");

        if (select.val() == 3) { // Hong Kong Island
            $('#district').show()
            $('#district-6').hide()
            $('#district-4').hide()
            $('#district-3').show()
        } else if (select.val() == 6) { // Kowloon
            $('#district').show()
            $('#district-3').hide()
            $('#district-4').hide()
            $('#district-6').show()
        } else if (select.val() == 4) { // New Territories
            $('#district').show()
            $('#district-3').hide()
            $('#district-6').hide()
            $('#district-4').show()
        }
    }

    $(document).ready(function () {
        showRegion()
        showDistrict()
    })

    $('select[name="location"]').on('change', function () {
        showRegion()
    })

    $('select[name="region-1"]').on('change', function () {
        showDistrict()
    })
</script>
@endsection