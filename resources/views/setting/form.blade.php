@extends('layouts.master')

@section('title') {{ $title }} Setting @endsection

@section('css')

@endsection

@section('content')
    <!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-flex align-items-center justify-content-between">
                <h4 class="mb-0 font-size-18">{{ $title }} Setting</h4>
                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item">
                            <a href="javascript: void(0);">Setting</a>
                        </li>
                        <li class="breadcrumb-item active">Form</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
    <!-- end page title -->
    @if ($errors->any())
        @foreach ($errors->all() as $error)
            <div class="alert alert-danger" role="alert">
                {{ $error }}
            </div>
        @endforeach
    @enderror
    <div class="row">
        <div class="col-12">
            <form method="POST" action="{{ $submit }}" enctype="multipart/form-data">
                @csrf
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title mb-4">Setting Details</h4>
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="setting_tax_name">Setting Name</label>
                                    <input type="text" id="setting_tax_name" name="setting_tax_name" class="form-control" value="{{ @$post->setting_description }}" readonly>
                                </div>
                                <div class="form-group">
                                    <label for="setting_value">Setting Rate<span class="text-danger">*</span></label><br>
                                    <input id="setting_value" name="setting_value" class="form-control" type="{{ @$post->setting_type }}" value="{{ @$post->setting_value }}">
                                </div>
                                @if (@$post->hasMedia('setting'))
                                    <img src="{{ $post->getFirstMediaUrl('setting') }}" alt="" srcset="" width="100" class="mb-5">
                                @endif
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-6">
                                <button type="submit"
                                    class="btn btn-primary waves-effect waves-light mr-1">Submit</button>
                                    <a href="{{ route('setting_listing') }}" class="btn btn-secondary">Cancel</a>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
@section('script')
@endsection
