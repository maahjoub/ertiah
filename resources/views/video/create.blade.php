@extends('layouts.master')
@section('title') 'Create Video ' @endsection
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

                                    <form method="post"  action="{{ route('video.store') }}" autocomplete="off" enctype="multipart/form-data">
                                        @csrf
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label>{{ trans('main_trans.video_name_ar') }} : <span class="text-danger">*</span></label>
                                                    <input  class="form-control" name="name_ar" type="text" >
                                                </div>
                                            </div>

                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label>{{ trans('main_trans.video_name_en') }} : <span class="text-danger">*</span></label>
                                                    <input  class="form-control" name="name_en" type="text" >
                                                </div>
                                            </div>

                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>{{ trans('main_trans.video_src') }} : <span class="text-danger">*</span></label>
                                                    <input  class="form-control" name="video_src" type="file" >
                                                </div>
                                            </div>

                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>{{ trans('main_trans.video_img_src') }} : <span class="text-danger">*</span></label>
                                                    <input  class="form-control" name="video_img_src" type="file" >
                                                </div>
                                            </div>

                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label>{{ trans('main_trans.video_description') }} : <span class="text-danger">*</span></label>
                                                    <textarea name="description" class="form-control"
                                                              rows="4"></textarea>
                                                </div>
                                            </div>

                                            <div class="col-6">
                                                <div class="form-group">
                                                    <label for="Grade_id">{{ trans('main_trans.grade_name') }}  : <span
                                                            class="text-danger">*</span></label>
                                                    <select class="custom-select mr-sm-2" name="grade_id">
                                                        <option selected disabled>{{ trans('main_trans.grade_name') }}...</option>
                                                        @foreach($grades as $grade)
                                                            <option value="{{ $grade->id }}">{{ $grade->Name }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>

                                            <div class="col-6">
                                                <div class="form-group">
                                                    <label for="Grade_id">{{ trans('main_trans.type') }} : <span
                                                            class="text-danger">*</span></label>
                                                    <select class="custom-select mr-sm-2" name="type_id">
                                                        <option selected disabled>{{ trans('main_trans.type') }}...</option>
                                                        @foreach($types as $type)
                                                            <option value="{{ $type->id }}">{{ $type->name }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>

                                            <div class="col-6">
                                                <div class="form-group">
                                                    <label for="Grade_id">{{ trans('main_trans.category') }} : <span
                                                            class="text-danger">*</span></label>
                                                    <select class="custom-select mr-sm-2" name="category_id">
                                                        <option selected disabled>{{ trans('main_trans.category') }}...</option>
                                                        @foreach($categories as $category)
                                                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>

                                            <div class="col-6">
                                                <div class="form-group">
                                                    <label for="Grade_id">{{ trans('main_trans.class_name') }} : <span
                                                            class="text-danger">*</span></label>
                                                    <select class="custom-select mr-sm-2" name="class_id">
                                                        <option selected disabled>{{ trans('main_trans.class_name') }}...</option>
                                                        @foreach($classRoms as $class)
                                                            <option value="{{ $class->id }}">{{ $class->Name_Class }}</option>
                                                        @endforeach
                                                    </select>
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
