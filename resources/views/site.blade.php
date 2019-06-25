@extends('layouts.app')

@section('content')
  <base-auto tamanho="10">
    <div class="row justify-content-center">

      @foreach ($lista as $key => $value)
          @if ($value->destaque == "S")
        <card
        tamanho="10"
        titulo="{{$value->titulo}}"
        imagem="/img/pinguim.png"
        artigo="{{$value->conteudo}}"
        data="{{$value->data}}"
        >
        </card>
          @break
        @endif
      @endforeach

      @foreach ($lista as $key => $value)
          @if ($value->destaque == "N")
            <card
            tamanho="5"
            titulo="{{$value->titulo}}"
            imagem="/img/pinguim.png"
            artigo="{{$value->conteudo}}"
            data="{{$value->data}}"
            >
            </card>

          @endif
      @endforeach

        <!-- FINAL ROW -->
      </div>

      </base-auto>

    </base-auto>
@endsection
