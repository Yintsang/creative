@extends('layouts.admin')
@section('buttons')

    @canany(['add', 'update'], $record)
    <button class="btn btn-success btn-save-main-form" type="button">Save</button>
    @endcan

    @can('delete', $record)
    <button class="btn btn-danger btn-save-delete-form" type="button">Delete</button>
    @endcan

    <a class="btn btn-secondary" href="{{ $config['links']['detail']['back'] }}">Back</a>
    
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

            <div class="form-group row">
                <h6 class="col-md-12 col-form-label" for="text-input uppercase bold">Basic Information</h6>
            </div>


            @row([
                'type' => 'textinput',
                'field' => 'name',
            ])


            @row([
                'type' => 'textinput',
                'field' => 'username',
            ])

            @row([
                'type' => 'textinput',
                'field' => 'email',
                'options' => [
                    'input_type' => 'email'
                ]
            ])


            @row([
                'type' => 'select',
                'field' => 'role_id',
                'title' => 'Role',
                'options' => [
                    'placeholder' => [
                        'title' => 'Please Select',
                        'value' => '' 
                    ],
                    'value_key' => 'id',
                    'list' => $roles
                ]
            ])


            @if(!empty($id))

                <div class="form-group row">
                    <h6 class="col-md-12 col-form-label mt-3" for="text-input uppercase bold">Reset Password</h6>
                </div>

            @endif

            @row([
                'type' => 'textinput',
                'field' => 'new_password',
                'title' => 'Password',
                'remark' => 'At least 8 characters',
                'options' => [
                    'input_type' => 'password',
                ]
            ])

            @row([
                'type' => 'textinput',
                'field' => 'new_password_confirmation',
                'title' => 'Password Confirmation',
                'options' => [
                    'input_type' => 'password',
                ]
            ])

            @if(!empty($id))

                @row([
                    'type' => 'textinput',
                    'field' => 'current_admin_password',
                    'options' => [
                        'input_type' => 'password',
                    ]
                ])

            @endif

            @include('admin.base.status')

        </div>
        @include('admin.base.footer')
    </div>
</form>
@endsection
@section('js')
@endsection