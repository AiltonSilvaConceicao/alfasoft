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
    <h1 class="text-black-20">Editar Contato</h1>
</div>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                <div class="max-w-xl">
                    @if(!empty($error))
                        <div class="alert alert-danger" role="alert">
                            {{ $error ?? ''}}
                        </div>
                    @endif
                    @if($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    <form name="form" action="{{ route('contacts.update', ['id' => $contactId]) }}" method="POST">
                        @csrf
                        <div class="d-flex flex-column" style="min-height: 100vh;">
                            <div class="row">
                              <div class="col-md-4 mb-4">
                                <label for="name" class="form-label">Nome</label>
                                <input type="text" class="form-control" name="name" id="name" value="{{ $dados->name ?? '' }}" placeholder="Digite o nome">
                              </div>
                              <div class="col-md-4 mb-4">
                                <label for="contato" class="form-label">Contato</label>
                                <input type="text" class="form-control" name="contact" id="contact" value="{{ $dados->contact ?? '' }}" placeholder="Digite o contato">
                              </div>
                              <div class="col-md-4 mb-4">
                                <label for="email" class="form-label">Email</label>
                                <input type="email" class="form-control" name="email" id="email" value="{{ $dados->email ?? '' }}" placeholder="Digite o email">
                              </div>
                              <div class="col-md-12 d-flex justify-content-end">
                                <a href="{{ route ('contacts.index') }}" class="btn btn-info btn-default" id="redirect"><i class="fa fa-reply"></i> Voltar a Lista</a> &nbsp;&nbsp; &nbsp;
                                <button type="submit" class="btn btn-primary">Salvar</button>
                              </div>
                            </div>
                          </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@stop
