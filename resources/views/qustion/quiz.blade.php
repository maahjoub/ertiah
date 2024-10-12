@extends('layouts.master')
@section('css')

@section('title')
    {{ trans('all_trans.exam') }}
@stop
@endsection
@section('page-header')
    <!-- breadcrumb -->
@section('PageTitle')
    {{ trans('all_trans.exams') }}
@stop
<!-- breadcrumb -->
@endsection
@section('content')
    <!-- row -->
    <div class="row">
        <div class="col-md-12 mb-30">
            <div class="card card-statistics h-100">
                <div class="card-body">
                    <div class="quiz-app">
                        <div class="quiz-info">
                            <div class="catefory">{{ trans('all_trans.Category') }} : <span>HTML</span></div>
                            <div class="count">{{ trans('all_trans.qustions_count') }}: <span></span></div>
                        </div>
                        <div class="quiz-area"></div>
                        <div class="answers-area"></div>
                        <button class="submit-button">Submit Answer</button>
                        <div class="bullets">
                            <div class="spans"></div>
                            <div class="countdown"></div>
                        </div>

                        <div class="results"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- row closed -->
@endsection
@section('js')

@endsection

