@extends('painel.templates.template')

@section('content')
<h1 class="title-pg">
  <a href="{{route('produtos.index')}}"><span class="glyphicon glyphicon-arrow-left"></span></a> Produto: <b>{{$produto->nomeProduto}}</b></h1>
<p><b>Ativo: </b> {{$produto->ativo}}</p>
<p><b>Número: </b> {{$produto->numeroProduto}}</p>
<p><b>Categoria: </b> {{$produto->category}}</p>
<p><b>Descrição: </b> {{$produto->descricaoProduto}}</p>

<hr>

@if(isset($errors) && count($errors) > 0)
  <div class="alert alert-danger">
      @foreach($errors->all() as $error)
          <p>{{$error}}</p>
      @endforeach
  </div>
@endif

{!! Form::open(['route' => ['produtos.destroy', $produto->id], 'method' => 'DELETE']) !!}
    {!! Form::submit("Deletar Produto: $produto->nomeProduto", ['class' => 'btn btn-danger']) !!}
{!! Form::close() !!}

@endsection
