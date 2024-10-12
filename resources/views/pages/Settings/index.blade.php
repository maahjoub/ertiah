@extends('layouts.master')
@section('css')
@toastr_css
@section('title')
{{ trans('all_trans.system_settings') }}
@stop
@endsection
@section('page-header')
<!-- breadcrumb -->
@section('PageTitle')
{{ trans('all_trans.system_settings') }}
@stop
<!-- breadcrumb -->
@endsection
@section('content')
<!-- row -->
<div class="row">
    <div class="col-md-12 mb-30">
        <div class="card card-statistics h-100">
            <div class="card-body">
                <span class="button x-small">
                    {{ trans('all_trans.system_settings') }}
                </span>
            </div>
            @if ($errors->any())
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <ul>
                    @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                    @endforeach
                </ul>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            @endif
            <div class="col-xs-12">
                <div class="col-md-12">
                    <br>
                    <form action="{{route('settings.update', 'test')}}" method="post" autocomplete="off"
                        enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="form-row">
                            <div class="col-md-4">
                                <label for="title">{{ trans('all_trans.school_name') }}</label>
                                <input type="text" name="school_name" value="{{ $settings['school_name']}}"
                                    class="form-control">
                            </div>
                            <div class="col-md-4">
                                <label for="title">{{ trans('all_trans.academy_eayr') }}</label>
                                <input type="text" name="academy_eayr" value="{{  $settings['academy_eayr'] }}"
                                    class="form-control">
                            </div>
                            <div class="col-md-4">
                                <label for="title">{{ trans('all_trans.school_phone') }}</label>
                                <input type="text" name="school_phone" value="{{$settings['school_phone']}}"
                                    class="form-control">
                            </div>
                            <div class="col-md-4">
                                <label for="title">{{ trans('all_trans.school_address') }}</label>
                                <input type="text" name="school_adders" value="{{$settings['school_adders']}}"
                                    class="form-control">
                            </div>
                            <div class="col-md-4">
                                <label for="title">{{ trans('all_trans.school_email') }}</label>
                                <input type="text" name="school_email" value="{{ $settings['school_email']}}"
                                    class="form-control">
                            </div>
                            <div class="col-md-4">
                                <label for="title">{{ trans('all_trans.school_title') }}</label>
                                <input type="text" name="school_title" value="{{  $settings['school_title'] }}"
                                    class="form-control">
                            </div>
                            <div class="col-md-4">
                                <label for="title">{{ trans('all_trans.school_logo') }}</label>
                                <input type="hidden" name="school_logo" value="{{  $settings['school_logo'] }}"
                                    class="form-control">
                                <img src="{{  asset('attachments/logo/' . $settings['school_logo'].'/'. $settings['school_logo'] ) }}"
                                    class="img-logo" alt="$settings['school_logo']">
                            </div>
                            <div class="col-md-4">
                                <label for="title">{{ trans('all_trans.chose_school_logo') }}</label>
                                <input type="file" accept="image/*" name="logo" class="form-control">
                            </div>
                        </div>
                        <br>
                        <button class="btn btn-success btn-sm nextBtn btn-lg pull-right mb-3" type="submit"> {{
                            trans('all_trans.save_data') }}</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- row closed -->
    @endsection
    @section('js')
    @toastr_js
    @toastr_render
    @endsection