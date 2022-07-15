@extends('adminlte::page')

@section('title', 'Lojas')

@section('content_header')
    <h1><a href="{{ route('lojas.create') }}" class="btn btn-dark">Adicionar</a> Loja</h1>
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
                        <th>email</th>
                        <th width="250" >Ações</th>
                    </tr>
                </thead>
                <tbody>
                @foreach ($lojas as $loja)
                    <tr>
                        <td>
                            {{ $loja->name }}
                        </td>
                        <td>
                            {{ $loja->email }}
                        </td>
                        <td style="width= 10rem">
                            <a href="{{ route('lojas.edit', $loja->id) }}" class="btn btn-primary">
                                <i title="Editar" class="far fa-edit"></i></a>
                            <a href="{{ route('lojas.show', $loja->id) }}" class="btn btn-warning"><i title="Visualizar" class="fas fa-search"></i></a></a>
                            <div class="btn-group">
                                <form action="{{ route('lojas.destroy', $loja->id) }}" method="POST">
                                    @csrf 
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger"><i title="Deletar" class="far fa-trash-alt"></i></button>
                                </form>
                            </div>
                        </td>
                    </tr>
                    @endforeach
                    </tbody>
            </table>
        </div>
        <div class="card-footer">
            {!! $lojas->links('vendor.pagination.bootstrap-4') !!}
        </div>
    </div>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop