@extends('adminlte::page')

@section('title', "Detalhes da Loja - {{ $loja->name }}")

@section('content_header')
    <h1>Detalhes da Loja - <b>{{ $loja->name }}</b></h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            @include('includes.alerts')
            <ul>
                <li>
                    <strong>Nome:</strong> {{ $loja->name }}
                </li>
                <li>
                    <strong>Email:</strong> {{ $loja->email }}
                </li>
            </ul>
            <form action="{{ route('lojas.destroy', $loja->id) }}" method="POST">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger btn-sm">Deletar Loja {{ $loja->name }}</button>
            </form>
        </div>
    </div>
@endsection