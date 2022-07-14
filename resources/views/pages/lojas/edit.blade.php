@extends('adminlte::page')

@section('title', "Editar a Loja {$loja->name}")

@section('content_header')
    <h1>Editar a Loja - <b>{{$loja->name}}</b></h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            <form action="{{ route('lojas.update', $loja->id) }}" class="form" method="POST">
                @csrf
                @method('PUT')
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
            </form>
        </div>
    </div>
@endsection