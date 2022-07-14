@extends('adminlte::page')

@section('title', 'Cadastrar Nova Loja')

@section('content_header')
    <h1>Cadastrar Nova Loja</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            <form action="{{ route('lojas.store') }}" class="form" method="POST">
                @csrf
                @include('includes.alerts')

                <div class="form-group">
                    <label for="name">Nome:</label>
                    <input type="text" name="name" class="form-control" placeholder="Nome:" value="{{ $loja->name ?? old('name') }}">
                </div>
                <div class="form-group">
                    <label for="email">Email:</label>
                    <input type="text" name="email" class="form-control" placeholder="Email:" value="{{ $loja->email ?? old('email') }}">
                    
                </div>
              
                <div class="form-group">
                    <button type="submit" class="btn btn-dark">Enviar</button>
                    
                </div>
            </form>
        </div>
    </div>
@endsection