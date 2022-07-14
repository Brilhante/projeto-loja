@extends('adminlte::page')

@section('title', 'Produtos')

@section('content_header')
    <h1><a href="{{ route('produtos.create') }}" class="btn btn-dark">ADD</a> Produto</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-header">
        </div>
        <div class="card-body">
            <table class="table table-condensed">
                <thead>
                    <tr>
                        <th>Nome</th>
                        <th>valor</th>
                        <th>ativo</th>
                        <th width="250" >Ações</th>
                    </tr>
                </thead>
                <tbody>
                @foreach ($produtos as $produto)
                    <tr>
                        <td>
                            {{ $produto->name }}
                        </td>
                        <td>
                            R$ {{ number_format($produto->valor, 2, ',', '.')  }}
                        </td>
                        <td>
                            {{ $produto->ativo }}
                        </td>
                        <td style="width= 10rem">
                            <a href="{{ route('produtos.edit', $produto->id) }}" class="btn btn-sm btn-primary">Editar</a>
                            <a href="{{ route('produtos.show', $produto->id) }}" class="btn btn-sm btn-warning">VER</a>
                            <div class="btn-group">
                                <form action="{{ route('lojas.destroy', $produto->id) }}" method="POST">
                                    @csrf 
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-danger">Deletar</button>
                                </form>
                            </div>
                        </td>
                    </tr>
                    @endforeach
                    </tbody>
            </table>
        </div>
        <div class="card-footer">
            {!! $produtos->links('vendor.pagination.bootstrap-4') !!}
        </div>
    </div>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop