@extends('adminlte::page')

@section('title', "Detalhes do Produto - {{ $produto->name }}")

@section('content_header')
    <h1>Detalhes do Produto - <b>{{ $produto->name }}</b></h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            @include('includes.alerts')
            <ul>
                <li>
                    <strong>Nome:</strong> {{ $produto->name }}
                </li>
                <li>
                    <strong>Valor:</strong> R$ {{ number_format($produto->valor, 2, ',', '.')  }}
                </li>
                <li>
                    <strong>Ativo:</strong> {{ $produto->ativo }}
                </li>
            </ul>
            
            <form action="{{ route('produtos.destroy', $produto->id) }}" method="POST">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger btn-sm">Deletar produto {{ $produto->name }}</button>
            </form>
        </div>
    </div>
@endsection