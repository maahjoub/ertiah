@extends('layouts.master')
@section('css')

    @section('title')
        {{ __('main_trans.edit_Type') }}
    @stop
@endsection
@section('page-header')
    <!-- breadcrumb -->
    @section('PageTitle')
        {{ __('main_trans.edit_Type') }}
    @stop
    <!-- breadcrumb -->
@endsection
@section('content')
    <!-- row -->
    <div class="row">
        <div class="col-md-12 mb-30">
            <div class="card card-statistics h-100">
                <div class="card-body">

                    <!-- row -->
                    <div class="row">
                        <div class="col-md-6 mb-30 m-auto">
                            <div class="card card-statistics h-100">
                                <div class="card-body">

                                    @if ($errors->any())
                                        <div class="alert alert-danger">
                                            <ul>
                                                @foreach ($errors->all() as $error)
                                                    <li>{{ $error }}</li>
                                                @endforeach
                                            </ul>
                                        </div>
                                    @endif

                                    <form method="post"  action="{{ route('Type.update', $Type) }}" autocomplete="off">
                                        @csrf
                                        @method('PUT')
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label>{{ trans('main_trans.Type_name_en') }} : <span class="text-danger">*</span></label>
                                                    <input  class="form-control" name="name_en" type="text" value="{{ $Type->getTranslation('name', 'en') }}">
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label>{{ trans('main_trans.Type_name_ar') }} : <span class="text-danger">*</span></label>
                                                    <input  class="form-control" name="name_ar" type="text" value="{{ $Type->getTranslation('name', 'ar') }}" >
                                                </div>
                                            </div>
                                        </div>
                                        <button class="btn btn-success btn-sm nextBtn btn-lg pull-right" type="submit">{{trans('Students_trans.submit')}}</button>
                                    </form>

                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- row closed -->

                </div>
            </div>
        </div>
    </div>
    <!-- row closed -->
@endsection
@section('js')

@endsection
