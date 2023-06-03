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
    <h1 class="text-black-20">Lista de Contatos</h1>
</div>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                <div class="max-w-xl">
                    @if($dados)
                        <div class="row">
                            <div class="col-xs-10 col-md-10" style="text-align: right;">
                                &nbsp;
                            </div>
                            <div class="col-xs-2 col-md-2" style="text-align: right;">
                                <a href="{{ route ('contacts.create')}}" class="btn btn-info btn-block" id="redirect"><i class="fa fa-edit"></i> Add New</a>
                            </div>
                        </div>
                        <div class="clearfix">&nbsp;</div>
                        <div class="row">
                            <table cellspacing="2" cellpadding="2" class="table table-bordered mb-5" width="100%">
                                <thead>
                                    <tr class="table-success" style="text-align: left;">
                                        <th>ID</th>
                                        <th>Nome</th>
                                        <th>Contato</th>
                                        <th>E-mail</th>
                                        <th>Manage</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @if($dados)
                                        @php
                                        $t = 0;
                                        $i = 1;
                                        @endphp
                                        @foreach($dados as $dado)
                                            @php
                                            if($i % 2 == 0) {
                                                $collor = 'background-color: #f2f2f2;';
                                            } else {
                                                $collor = 'background-color: #ffffff;';
                                            }
                                            @endphp
                                            <tr style="{{ $collor ?? ''}}">
                                                <td>{{ $dado->id ?? '' }}</td>
                                                <td> {{ $dado->name ?? ''}}</td>
                                                <td> {{ $dado->contact ?? ''}}</td>
                                                <td> {{ $dado->email ?? ''}}</td>
                                                <td> <a href="{{ route('contacts.details', ['id' => $dado->id]) }}" class="btn btn-default btn-sm">Details</a> <a href="{{ route('contacts.edit', ['id' => $dado->id]) }}" class="btn btn-primary btn-sm">Edit</a>  <a href="{{ route('contacts.confirm', ['id' => $dado->id])}}" class="btn btn-danger btn-sm">Delete</a></td>
                                            </tr>
                                            @php
                                            $i++;
                                            $t++;
                                            @endphp
                                        @endforeach
                                    @endif
                                    <thead>
                                        <tr style="background-color: #fcfcfc;">
                                            <th colspan="4"  style="text-align: right;">TOTAL</th>
                                            <th> {{ $t ?? '' }}</th>
                                        </tr>
                                    </thead>
                                </tbody>
                            </table>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
@stop
