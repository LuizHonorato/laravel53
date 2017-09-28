@extends('site.templates.template1')

@section('content')

  <h1>Home Page do Site!</h1>

  @if( $var1 == '123' )
    <p>É igual</p>
    @else
    <p>É diferente</p>
  @endif

  @unless($var1 == 124)
    <p>Não é igual...</p>
  @endunless

  @for($i = 0; $i < 10; $i++)
      <p>Valor: {{$i}}</p>
  @endfor

{{-- comentário
  @if(count($arrayData) > 0)
  @foreach($arrayData as $array)
    <p>Foreach: {{$array}}</p>
  @endforeach
  @else
    <p>Não existem itens para serem mostrados no foreach</p>
  @endif
--}}

  @forelse($arrayData as $array)
    <p>Forelse: {{$array}}</p>
  @empty
    <p>Não existem itens para serem mostrados no forelse.</p>
  @endforelse

  @include('site.includes.sidebar', compact('var1'))

@endsection

@push('scripts')
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"
    integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u"
    crossorigin="anonymous">
@endpush
