@extends('layouts.master')
@section('css')

@endsection

@section('title')
    {{ trans('main.grades') }}
@endsection
@section('page-header')
<!-- breadcrumb -->
<div class="page-title">
    <div class="row">
        <div class="col-sm-6">
            <h4 class="mb-0">{{ trans('main.grades') }}</h4>
        </div>
        <div class="col-sm-6">
            <ol class="breadcrumb pt-0 pr-0 float-left float-sm-right ">
                <li class="breadcrumb-item"><a href="/" class="default-color">{{ trans('main.home') }}</a></li>
                <li class="breadcrumb-item active">{{ trans('main.grades') }}</li>
            </ol>
        </div>
    </div>
</div>
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
                    {{ trans('main.grade.add_grade') }}
                </button>


                <div class="table-responsive">
                    <table class="table" id="datatable">
                    <thead>
                      <tr>
                        <th scope="col">#</th>
                        <th scope="col">{{ trans('main.grade.name') }}</th>
                        <th scope="col">{{ trans('main.grade.note') }}</th>
                        <th scope="col">{{ trans('main.grade.action') }}</th>
                      </tr>
                    </thead>
                    <tbody>
                        @php
                            $i = 1;
                        @endphp
                        @foreach ($grades as $grade)
                            <tr>
                                <th scope="row">{{ $i++ }}</th>
                                <td>{{ $grade->name }}</td>
                                <td>{{ $grade->note }}</td>
                                <td>
                                    <button type="button" class="btn btn-info btn-sm" data-toggle="modal"
                                        data-target="#edit{{ $grade->id }}"
                                        title="{{ trans('main.grade.edit_grade') }}"><i class="fa fa-edit"></i></button>
                                    <button type="button" class="btn btn-danger btn-sm" data-toggle="modal"
                                        data-target="#delete{{ $grade->id }}"
                                        title="{{ trans('main.grade.delete_grade') }}"><i
                                            class="fa fa-trash"></i></button>
                                </td>
                            </tr>
                            <!-- edit_modal_Grade -->
                            <div class="modal fade" id="edit{{ $grade->id }}" tabindex="-1" role="dialog"
                                aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 style="font-family: 'Cairo', sans-serif;" class="modal-title"
                                                id="exampleModalLabel">
                                                {{ trans('main.edit_grade') }}
                                            </h5>
                                            <button type="button" class="close" data-dismiss="modal"
                                                aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <!-- add_form -->
                                            <form action="{{ route('grade.update', 'test') }}" method="post">
                                                {{ method_field('patch') }}
                                                @csrf
                                                <div class="row">
                                                    <div class="col">
                                                        <label for="Name"
                                                            class="mr-sm-2">{{ trans('main.grade.stage_name_ar') }}
                                                            :</label>
                                                        <input id="Name" type="text" name="Name"
                                                            class="form-control"
                                                            value="{{ $grade->getTranslation('name', 'ar') }}"
                                                            required>
                                                        <input id="id" type="hidden" name="id" class="form-control"
                                                            value="{{ $grade->id }}">
                                                    </div>
                                                    <div class="col">
                                                        <label for="Name_en"
                                                            class="mr-sm-2">{{ trans('main.grade.stage_name_en') }}
                                                            :</label>
                                                        <input type="text" class="form-control"
                                                            value="{{ $grade->getTranslation('name', 'en') }}"
                                                            name="Name_en" required>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label
                                                        for="exampleFormControlTextarea1">{{ trans('main.grade.note') }}
                                                        :</label>
                                                    <textarea class="form-control" name="note"
                                                        id="exampleFormControlTextarea1"
                                                        rows="3">{{ $grade->note }}</textarea>
                                                </div>
                                                <br><br>

                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary"
                                                        data-dismiss="modal">{{ trans('main.grade.close') }}</button>
                                                    <button type="submit"
                                                        class="btn btn-success">{{ trans('main.grade.submit') }}</button>
                                                </div>
                                            </form>

                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- delete_modal_Grade -->
                            <div class="modal fade" id="delete{{ $grade->id }}" tabindex="-1" role="dialog"
                                aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 style="font-family: 'Cairo', sans-serif;" class="modal-title"
                                                id="exampleModalLabel">
                                                {{ trans('main.grade.delete_grade') }}
                                            </h5>
                                            <button type="button" class="close" data-dismiss="modal"
                                                aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <form action="{{ route('grade.destroy', 'test') }}" method="post">
                                                {{ method_field('Delete') }}
                                                @csrf
                                                {{ trans('main.grade.warning') }}
                                                <input id="id" type="hidden" name="id" class="form-control"
                                                    value="{{ $grade->id }}">
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary"
                                                        data-dismiss="modal">{{ trans('main.grade.close') }}</button>
                                                    <button type="submit"
                                                        class="btn btn-danger">{{ trans('main.grade.submit') }}</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </tbody>
                  </table>
                  </div>
            </div>
        </div>
    </div>

    <!-- add_modal_Grade -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 style="font-family: 'Cairo', sans-serif;" class="modal-title" id="exampleModalLabel">
                    {{ trans('Grades_trans.add_Grade') }}
                </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <!-- add_form -->
                <form action="{{ route('grade.store') }}" method="POST">
                    @csrf
                    <div class="row">
                        <div class="col">
                            <label for="Name" class="mr-sm-2">{{ trans('main.grade.stage_name_ar') }}
                                :</label>
                            <input id="Name" type="text" name="name" class="form-control">
                        </div>
                        <div class="col">
                            <label for="Name_en" class="mr-sm-2">{{ trans('main.grade.stage_name_en') }}
                                :</label>
                            <input type="text" class="form-control" name="name_en">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlTextarea1">{{ trans('main.grade.note') }}
                            :</label>
                        <textarea class="form-control" name="note" id="exampleFormControlTextarea1"
                            rows="3"></textarea>
                    </div>
                    <br><br>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary"
                    data-dismiss="modal">{{ trans('main.grade.close') }}</button>
                <button type="submit" class="btn btn-success">{{ trans('main.grade.submit') }}</button>
            </div>
            </form>

        </div>
    </div>
</div>


</div>
<!-- row closed -->
@endsection
@section('js')

@endsection
