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
    <h1 class="text-black-20">Detalhes de Contato!</h1>
</div>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                <div class="max-w-xl">
                    <div class="row">
                        <div class="container mt-4">
                            <h3>Contato ID: {{ $id ?? ''}}</h3>

                            @if ($dados)
                                <div class="card">
                                    <div class="card-body">
                                        <h5 class="card-title"><strong>Nome:</strong> {{ $dados->name }}</h5>
                                        <p class="card-text"><strong>Contato:</strong> {{ $dados->contact }}</p>
                                        <p class="card-text"><strong>E-mail:</strong> {{ $dados->email }}</p>
                                        <p class="card-text"><strong>Data de Cadastro:</strong> {{ date('d/m/Y H:i:s', strtotime($dados->created_at) ?? '') }}</p>
                                        <p class="card-text"><strong>Última Atualização:</strong> {{ date('d/m/Y H:i:s', strtotime($dados->updated_at) ?? '') }}</p>

                                        <div class="mt-4">
                                            <a href="{{ route ('contacts.index') }}" class="btn btn-info btn-default" id="redirect"><i class="fa fa-reply"></i> Voltar a Lista</a>
                                            <a href="{{ route('contacts.edit', $dados->id) }}" class="btn btn-success">Editar</a>
                                            <a href="{{ route('contacts.confirm', ['id' => $dados->id]) }}"  class="btn btn-danger">Excluir</a>
                                        </div>
                                    </div>
                                </div>
                            @else
                                <p>Usuário não encontrado.</p>
                            @endif
                        </div>
                    </div>
                    <div class="clearfix">&nbsp;</div>
                </div>
            </div>
        </div>
    </div>
@stop
