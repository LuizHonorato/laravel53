@extends('painel.templates.template')

@section('content')
<h1 class="title-pg">
  <a href="{{route('produtos.index')}}"><span class="glyphicon glyphicon-arrow-left"></span></a> Gestão Produto: <b>{{ $produto->nomeProduto or 'Novo produto'}}</b> </h1>
  @if(isset($errors) && count($errors) > 0)
    <div class="alert alert-danger">
        @foreach($errors->all() as $error)
            <p>{{$error}}</p>
        @endforeach
    </div>
  @endif

  @if(isset($produto))
      <form class="form" method="post" action="{{route('produtos.update', $produto->id)}}">
      {!! Form::model($produto, ['route' => ['produtos.update', $produto->id], 'class' => 'form', 'method' => 'put']) !!}
  @else
      {!! Form::open(['route' => 'produtos.store', 'class' => 'form']) !!}
  @endif
      <div class="form-group">
        {!! Form::text('nomeProduto', null, ['class' => 'form-control', 'placeholder' => 'Nome']) !!}
      </div>

      <div class="form-group">
        <label>
            {!! Form::checkbox('ativo') !!}
            Ativo?
        </label>
      </div>

      <div class="form-group">
        {!! Form::text('numeroProduto', null, ['class' => 'form-control', 'placeholder' => 'Número']) !!}
      </div>

      <div class="form-group">
          {!! Form::select('category', $categories, null, ['class' => 'form-control']) !!}
      </div>

      <div class="form-group">
          {!! Form::textarea('descricaoProduto', null, ['class' => 'form-control', 'placeholder' => 'Descrição']) !!}
      </div>

      <div class="form-group">
        {!! Form::submit('Enviar', ['class' => 'btn btn-primary']) !!}
      </div>
    {!! Form::close() !!}
@endsection
