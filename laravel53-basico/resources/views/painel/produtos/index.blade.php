@extends('painel.templates.template')

@section('content')
<h1 class="title-pg">Listagem dos produtos</h1>

<a href="{{url('/painel/produtos/create')}}" class="btn btn-primary btn-add">
  <span class="glyphicon glyphicon-plus"></span> Cadastrar</a>

<table class="table table-striped">
    <tr>
        <th>Nome</th>
        <th>Descrição</th>
        <th width="100px">Ações</th>
    </tr>
    @foreach($produtos as $produto)
        <tr>
            <td>{{$produto->nomeProduto}}</td>
            <td>{{$produto->descricaoProduto}}</td>
            <td>
                <a href="{{ route('produtos.edit', $produto->id) }}" class="actions edit">
                    <span class="glyphicon glyphicon-pencil"></span>
                </a>
                <a href="{{ route('produtos.show', $produto->id) }}" class="actions delete">
                    <span class="glyphicon glyphicon-eye-open"></span>
                </a>
            </td>
        </tr>
    @endforeach
</table>

{!! $produtos->links() !!}

@endsection
