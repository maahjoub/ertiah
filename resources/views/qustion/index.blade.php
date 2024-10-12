@extends('layouts.master')
@section('css')
    @toastr_css
@section('title')
    {{ trans('all_trans.add_question') }}
@stop
@endsection
@section('page-header')
    <!-- breadcrumb -->
@section('PageTitle')
    {{ trans('all_trans.add_question') }}
@stop
<!-- breadcrumb -->
@endsection
@section('content')
    <!-- row -->
    <div class="row">
        <div class="col-md-12 mb-30">
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
                    <button type="button" class="button x-small" data-toggle="modal" data-target="#exampleModal">
                        {{ trans('all_trans.add_answers') }}
                    </button>
                    <button type="button" class="button x-small" data-toggle="modal" data-target="#addquestion">
                        {{ trans('all_trans.add_question') }}
                    </button>
                        <div class="modal fade" id="addquestion" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                                     aria-hidden="true">
                                    <div class="modal-dialog modal-lg">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 style="font-family: 'Cairo', sans-serif;" class="modal-title" id="exampleModalLabel">
                                                    {{ trans('all_trans.add_question') }}
                                                </h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <form class=" row mb-30" action="{{ route('questions.store') }}" method="POST">
                                                    @csrf
                                                    <div class="card-body">
                                                        <div class="repeater">
                                                            <div data-repeater-list="List_Classes">
                                                                <div data-repeater-item>
                                                                    <div class="row">
                                                                        <div class="col">
                                                                            <label for="Name"
                                                                                   class="mr-sm-2">{{ trans('all_trans.add_question') }}
                                                                                :</label>
                                                                            <input class="form-control" type="text" name="questions" />
                                                                        </div>
                                                                        <div class="col">
                                                                            <label for="Name"
                                                                                   class="mr-sm-2">{{ trans('all_trans.add_right_answers') }}
                                                                                :</label>
                                                                            <input class="form-control" type="text" name="right_answer" />
                                                                        </div>
                                                                        <div class="col">
                                                                            <label for="Name_en"
                                                                                   class="mr-sm-2">{{ trans('all_trans.Name_Subject') }}
                                                                                :</label>
                                                                            <div class="box">
                                                                                <select class="fancyselect" name="Subject">
                                                                                    @foreach ($Subjects as $Subject)
                                                                                        <option value="{{ $Subject->id }}">{{ $Subject->name }}</option>
                                                                                    @endforeach
                                                                                </select>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="row mt-20">
                                                                <div class="col-12">
                                                                    <input class="button" data-repeater-create type="button" value="{{ trans('My_Classes_trans.add_row') }}"/>
                                                                </div>
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-secondary"
                                                                        data-dismiss="modal">{{ trans('Grades_trans.Close') }}</button>
                                                                <button type="submit"
                                                                        class="btn btn-success">{{ trans('Grades_trans.submit') }}</button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                        </div>

                        <!-- add_modal_class -->
                        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                                 aria-hidden="true">
                                <div class="modal-dialog modal-lg">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 style="font-family: 'Cairo', sans-serif;" class="modal-title" id="exampleModalLabel">
                                                {{ trans('all_trans.add_answers') }}
                                            </h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <form class=" row mb-30" action="{{ route('store_answer') }}" method="POST">
                                                @csrf
                                                <div class="card-body">
                                                    <div class="repeater">
                                                        <div data-repeater-list="List_Classes">
                                                            <div data-repeater-item>
                                                                <div class="row">
                                                                    <div class="col">
                                                                        <label for="Name"
                                                                               class="mr-sm-2">{{ trans('all_trans.add_answers') }}
                                                                            :</label>
                                                                        <input class="form-control" type="text" name="answer" />
                                                                    </div>

                                                                    <div class="col">
                                                                        <label for="Name_en"
                                                                               class="mr-sm-2">{{ trans('all_trans.chose_qustions') }}
                                                                            :</label>
                                                                        <div class="box">
                                                                            <select class="fancyselect" name="qustion_id">
                                                                                @foreach ($questions as $qustion)
                                                                                    <option value="{{ $qustion->id }}">{{ $qustion->qustion }}</option>
                                                                                @endforeach
                                                                            </select>
                                                                        </div>
                                                                    </div>

                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="row mt-20">
                                                            <div class="col-12">
                                                                <input class="button" data-repeater-create type="button" value="{{ trans('My_Classes_trans.add_row') }}"/>
                                                            </div>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary"
                                                                    data-dismiss="modal">{{ trans('Grades_trans.Close') }}</button>
                                                            <button type="submit"
                                                                    class="btn btn-success">{{ trans('Grades_trans.submit') }}</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- add_modal_class -->

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
