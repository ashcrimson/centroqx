@extends('layouts.app')

@section('title_page',__('Edit Preparacion'))

@section('content')

    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col">
                    <h1>{{__('Edit Preparacion')}}</h1>
                </div>
                <div class="col">
                    <a class="btn btn-outline-info float-right"
                       href="{{route('preparacions.index')}}">
                        <i class="fa fa-list" aria-hidden="true"></i>&nbsp;<span class="d-none d-sm-inline">{{__('List')}}</span>
                    </a>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <div class="content">
        <div class="container-fluid">


            @include('layouts.partials.request_errors')

            <div class="card">
                <div class="card-body">

                   {!! Form::model($preparacion, ['route' => ['preparacions.update', $preparacion->id], 'method' => 'patch'
                        ,'class' => 'form-loading-on-submit']) !!}
                        <div class="form-row">

                            @include('preparacions.fields')


                            <div class="form-group col-sm-4">
                                <a href="{!! route('preparacions.index') !!}" class="btn btn-block btn-secondary">Cancelar</a>
                            </div>
                            <div class="form-group col-sm-4">
                                <button type="submit"  class="btn btn-block btn-success">
                                    <i class="fa fa-save"></i> Guardar
                                </button>
                            </div>

                            <div class="form-group col-sm-4">
                                <button type="submit"  class="btn btn-block btn-warning" name="cerrar" value="1">
                                    <i class="fa fa-save"></i> Cierre de preparaci??n
                                </button>
                            </div>

                        </div>

                   {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>

@endsection
