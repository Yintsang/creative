@extends('layouts.admin')
@section('content')
<media-manager id="media-manager" ref="manager" root-id="0" watermark="{{ (config('appcustom.watermark')) }}" last-browse-folder-id="{{ session('lastBrowseFolderId') }}"></media-manager> 
@endsection
@section('js')
<style>

    @media(min-width: 992px){
        .modal{
            left: 100px;
        }
    }
</style>
@endsection

