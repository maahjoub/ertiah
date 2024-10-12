@extends('layouts.master')
@section('css')

    @section('title')
        {{__('main_trans.types')}}
    @stop
@endsection
@section('page-header')
    <!-- breadcrumb -->
    @section('PageTitle')
        {{__('main_trans.types')}}
    @stop
    <!-- breadcrumb -->
@endsection
@section('content')
    <!-- row -->
    <div class="row">
        <div class="col-md-12 mb-30">
            <div class="card card-statistics h-100">
                <div class="card-body">
                    <div class="row">
                        <div class="col-xl-12 mb-30">
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
                                    <a href="{{ route('type.create') }}" class="button x-small" >
                                        {{ trans('main_trans.add_type') }}
                                    </a>
                                    <br><br>
                                    <div class="table-responsive">
                                        <table id="datatable" class="table  table-hover table-sm table-bordered p-0" data-page-length="50"
                                               style="text-align: center">
                                            <thead>
                                            <tr>
                                                <th><input name="select_all" id="example-select-all" type="checkbox" onclick="CheckAll('box1', this)" /></th>
                                                <th>#</th>
                                                <th>{{ trans('main_trans.type_name') }}</th>
                                                <th>{{ trans('My_Classes_trans.Processes') }}</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            <?php $i = 0; ?>
                                            @foreach ($types as $type)
                                                <tr>
                                                        <?php $i++; ?>
                                                    <td><input type="checkbox"  value="{{ $type->id }}" class="box1" ></td>
                                                    <td>{{ $i }}</td>
                                                    <td>{{ $type->name }}</td>

                                                    <td>
                                                        <a type="button" class="btn btn-info btn-sm" href="{{ route('type.edit', $type->id) }}"
                                                                title="{{ trans('Grades_trans.Edit') }}"><i class="fa fa-edit"></i></a>
                                                        <form action="{{ route('type.destroy', $type->id) }}" class="d-inline"
                                                              method="post">
                                                            {{ method_field('Delete') }}
                                                            @csrf
                                                                <button type="submit"
                                                                        class="btn btn-danger"><i class="fa fa-trash"></i></button>
                                                        </form>
                                                    </td>
                                                </tr>

                                                <!-- edit_modal_Grade -->
                                            @endforeach
                                        </table>
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
                                            {{ trans('My_Classes_trans.add_class') }}
                                        </h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <form class=" row mb-30" action="{{ route('Classrooms.store') }}" method="POST">
                                            @csrf
                                            <div class="card-body">
                                                <div class="repeater">
                                                    <div data-repeater-list="List_Classes">
                                                        <div data-repeater-item>
                                                            <div class="row">

                                                                <div class="col">
                                                                    <label for="Name"
                                                                           class="mr-sm-2">{{ trans('My_Classes_trans.Name_class') }}
                                                                        :</label>
                                                                    <input class="form-control" type="text" name="Name" />
                                                                </div>
                                                                <div class="col">
                                                                    <label for="Name"
                                                                           class="mr-sm-2">{{ trans('My_Classes_trans.Name_class_en') }}
                                                                        :</label>
                                                                    <input class="form-control" type="text" name="Name_class_en" />
                                                                </div>
                                                                <div class="col">
                                                                    <label for="Name_en"
                                                                           class="mr-sm-2">{{ trans('My_Classes_trans.Name_Grade') }}
                                                                        :</label>
                                                                </div>

                                                                <div class="col">
                                                                    <label for="Name_en"
                                                                           class="mr-sm-2">{{ trans('My_Classes_trans.Processes') }}
                                                                        :</label>
                                                                    <input class="btn btn-danger btn-block" data-repeater-delete
                                                                           type="button" value="{{ trans('My_Classes_trans.delete_row') }}" />
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
                    <!-- row closed -->
                </div>
            </div>
        </div>
    </div>
    <!-- row closed -->
@endsection
