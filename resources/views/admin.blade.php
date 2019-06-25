@extends('layouts.app')

@section('content')
  <dashboard tamanho="10">
    <widgets titulo="Dashboard">

                  <div class="row">
                      <div class="col-md-4">

                          <box qtd="{{$totalArtigos}}" titulo="Artigos" url="{{route('artigos.index')}}" cor="#00c0ef" icone="fa fa-book"></box>

                      </div>

                      <div class="col-md-4" >

                          <box qtd="{{$totalAutores}}" titulo="Autores" url="{{route('autores.index')}}" cor="#00a65a" icone="fa fa-commenting-o"></box>

                      </div>

                      <div class="col-md-4" >

                          <box qtd="{{$totalUsuarios}}" titulo="Usuarios" url="{{route('usuarios.index')}}" cor="#f39c12" icone="ion ion-person-add"></box>

                      </div>

                      </div>
                  </div>
    </widgets>
  </dashboard>
@endsection
