@extends('layouts.app')

@section('title', 'CRM Bahiana - AlfaSoft - Contatos')

@section('adminlte_css_pre')
    <link rel="stylesheet" href="{{ asset('vendor/icheck-bootstrap/icheck-bootstrap.min.css') }}">
@stop

@section('content_header')
    <h1 class="m-0 text-dark">AlfaSoft - Contatos</h1>
@stop
@section('content')
<div class="container-fluid">
    <h1 class="text-black-20">Deleção de registro!</h1>
</div>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                <div class="max-w-xl">
                    <div class="alert alert-danger" role="alert">
                        Tem certeza que quer deletar o registro: {{ $id ?? '' }} ?
                    </div>
                    <div class="row">
                        <div class="col-xs-10 col-md-8" style="text-align: right;">
                            &nbsp;
                        </div>
                        <div class="col-xs-2 col-md-2" style="text-align: right;">
                            <a href="{{ route ('contacts.index') }}" class="btn btn-info btn-default" id="redirect"><i class="fa fa-reply"></i> Voltar</a>
                        </div>
                        <div class="col-xs-2 col-md-2" style="text-align: right;">
                            <a href="{{ route ('contacts.delete', ['id' => $id]) }}" class="btn btn-info btn-block" id="redirect"><i class="fa fa-trash"></i> Delete</a>
                        </div>
                    </div>
                    <div class="clearfix">&nbsp;</div>
                </div>
            </div>
        </div>
    </div>
@stop
