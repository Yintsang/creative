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
        <div class="card-header">Example</div>
        <div class="card-body">

            @row([
                'type' => 'textinput',
                'has_language' => true,
                'field' => 'title',
                'options' => [
                    'required' => true,
                ],
                'remark' => 'Remark here'
            ])

            @row([
                'type' => 'datepicker',
                'field' => 'date',
            ])

            @row([
                'type' => 'editor',
                'field' => 'editor',
                'has_language' => true,
            ])

            @row([
                'type' => 'textarea',
                'has_language' => true,
                'field' => 'description',
            ])

            @row([
                'type' => 'editor',
                'field' => 'editor',
                'has_language' => true,
            ])

            @row([
                'type' => 'colorpicker',
                'field' => 'color',
            ])

            @row([
                'type' => 'image-upload',
                'field' => 'image',
            ])

            @row([
                'type' => 'image-upload',
                'field' => 'file',
                'options' => [
                    'is_file' => true
                ]
            ])

            @row([
                'type' => 'image-upload',
                'field' => 'images',
                'options' => [
                    'is_single' => false
                ]
            ])

            @row([
                'type' => 'radio',
                'field' => 'my_radio',
                'options' => [
                    'default' => 0,
                    'value_key' => 'value',
                    'title_key' => 'title',
                    'list' => [
                        [
                            'title' => 'Yes',
                            'value' => 1,
                        ],
                        [
                            'title' => 'No',
                            'value' => 0,
                        ],
                    ]
                ]
            ])

            @row([
                'type' => 'select',
                'field' => 'my_select',
                'options' => [
                    'placeholder' => [
                        'title' => 'Please Select'
                    ],
                    'value_key' => 'id',
                    'title_key' => 'title',
                    'list' => [
                        [
                            'title' => 'Title 1',
                            'id' => 1,
                        ],
                        [
                            'title' => 'Title 2',
                            'id' => 2,
                        ],
                    ]
                ]
            ])

            @row([
                'type' => 'checkbox',
                'field' => 'tags',
                'options' => [
                    'value_key' => 'id',
                    'title_key' => 'title',
                    'checked' => $record->tags->pluck('id')->toArray(),
                    'list' =>  $tags->toArray()
                ]
            ])

{{--             @row([
                'type' => 'multiselect',
                'field' => 'tags',
                'options' => [
                    'key' => 'id',
                    'label' => 'title',
                    'selected' => $record->tags->pluck('id')->toArray(),
                    'items' => $tags->toArray()
                ]
            ]) --}}


            @row([
                'type' => 'map',
                'field' => 'address',
                'has_language' => true,
            ])

            <div class="form-group row">
                <label for="text-input" class="col-md-2 col-form-label">Row</label>
                <div class="col-md-10">
                    Custom Content
                </div>
            </div>


        </div>
    </div>
    <div class="card">
        <div class="card-header">Repeater</div>
        <div class="card-body">

            @repeater([
                'field' => 'logos',
                'show_title' => false,
                'sub_fields' =>
                [
                    [
                        'type' => 'image-upload',
                        'field' => 'image',
                        'options' => [
                            'width' => '20%'
                        ]
                    ],
                    [
                        'type' => 'textarea',
                        'field' => 'title',
                        'has_language' => true,
                        'options' => [
                            'width' => '50%'
                        ]
                    ],
                    [
                        'type' => 'textinput',
                        'field' => 'url',
                        'options' => [
                            'width' => '30%'
                        ]
                    ],
                    [
                        'type' => 'radio',
                        'field' => 'my_radio',
                        'options' => [
                            'list' => [
                                [
                                    'title' => 'Yes',
                                    'value' => 1,
                                ],
                                [
                                    'title' => 'No',
                                    'value' => 0,
                                ],
                            ]
                        ]

                    ]
                ]
            ])
        </div>
    </div>
{{--     <div class="card">
        <div class="card-header">Vue Components</div>
        <div class="card-body">
            <repeater
                field="rows"
                :sub-fields="[
                    {
                        input: 'text-input',
                        field: 'title',
                        multiLanguage: true
                    },
                    {
                        input: 'text-area',
                        field: 'description',
                    }
                ]"
                v-model="rows"
            >
            </repeater>

            <radio
                :required="true"
                field="radio"
                title-key="title"
                value-key="id"
                :items="[
                    {
                        id: 1,
                        title: 'test1'
                    },
                    {
                        id: 2,
                        title: 'test2'
                    },
                ]"
                v-model="radio"
            ></radio>

            <select-menu
                :required="true"
                field="select"
                title-key="title"
                value-key="id"
                :items="[
                    {
                        id: 1,
                        title: 'test1'
                    },
                    {
                        id: 2,
                        title: 'test2'
                    },
                ]"
            ></select-menu>

            <auto-complete
                :required="true"
                field="autocomplete"
                :items="['test1', 'test2']"
                v-model="autocomplete"
            ></auto-complete>

            <editor
                :required="true"
                field="editor"
                :multi-language="true"
                :editor-params="editorParams"
            >
                
            </editor>

            <text-input
                :required="true"
                field="text_input"
                :multi-language="true"
                :input-props='{"test": "test2"}'
            >
                
            </text-input>

            <row title="Test Row">
                <text-input
                    field="title2"
                    :multi-language="true"
                    :with-row="false"
                >
                
                </text-input>
                <text-input
                    field="title3"
                    :with-row="false"
                >
                
                </text-input>
            </row>
        </div>
    </div> --}}

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