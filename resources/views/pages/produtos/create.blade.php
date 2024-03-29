@extends('adminlte::page')

@section('title', 'Cadastrar Novo Produto')

@section('content_header')
    <h1>Cadastrar Novo Produto</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            <form action="{{ route('produtos.store') }}" class="form" method="POST">
                @csrf
                @include('includes.alerts')
                <div class="card">
                    <table>
                        <thead class="table table-condensed">
                            <tr>
                            <th class="pl-3" width="50px">#</th>
                            <th>Nome:</th>
                            </tr>
                        </thead>
                        <tbody>
                        
                                @foreach ($lojas as $loja )
                                <tr>
                                    <td class="pl-3"><input type="checkbox" name="lojas[]" value="{{ $loja->id }}"></td>
                                    <td class="pl-3">{{ $loja->name }}</td>
                                </tr>
                            </tbody>    
                            @endforeach
                
                    </table>
                </div>
                <div class="form-group">
                    <label for="name">Nome:</label>
                    <input type="text" name="name" class="form-control" placeholder="Nome:" value="{{ $produto->name ?? old('name') }}">
                </div>
                <div class="form-group">
                    <label for="valor">Valor:</label>
                    <input type="text" name="valor" class="form-control" placeholder="Valor:" value="{{ $produto->valor ?? old('valor') }}">
                    
                </div>
                <li class="d-inline-block mr-2">
                    <fieldset>
                        <div class="vs-radio-con vs-radio-primary">
                            <input type="radio" checked  
                            @if (!empty($produto)) @if ($produto->ativo == 1) checked @endif   @endif
                            name="ativo" value="1" >
                            <span class="vs-radio vs-radio-sm">
                            </span>
                            <span class="">Ativo</span>
                        </div>
                    </fieldset>
                </li>
                <li class="d-inline-block mr-2 mb-4">
                    <fieldset>
                        <div class="vs-radio-con vs-radio-primary">
                            <input type="radio" 
                            @if (!empty($produto)) @if ($produto->ativo == 0) checked @endif   @endif   
                            name="ativo" value="0" >
                            <span class="vs-radio vs-radio-sm">
                            </span>
                            <span class="">Inativo</span>
                        </div>
                    </fieldset>
                </li>
                <div class="form-group">
                    <button type="submit" class="btn btn-dark">Enviar</button>
                    
                </div>
            </form>
        </div>
    </div>
@endsection