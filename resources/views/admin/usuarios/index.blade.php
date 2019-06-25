@extends('layouts.app')

@section('content')
    <dashboard tamanho="10">

      @if($errors->all())
        @foreach ($errors->all() as $key => $value)
        <div class="alert alert-danger" role="alert">
          <strong>{{$value}}</strong>
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
        </div>
        @endforeach
      @endif

                <widgets titulo="Lista de Usuarios">


                    <tabela-lista
                    v-bind:titulos="['#','Nome','E-mail']"
                    v-bind:itens="{{json_encode($listaModelo)}}"
                    criar="#criar" detalhe="/admin/usuarios/" editar="/admin/usuarios/" deletar="/admin/usuarios/" token="{{ csrf_token() }}"
                    modal="sim"

                    ></tabela-lista>
                    <div align="center">
                        {{$listaModelo}}
                    </div>
                </widgets>

    </dashboard>

    <modal nome="adicionar" titulo="Adcionar">
      <formulario id="formAdicionar" css="" action="{{route('usuarios.store')}}" method="post" enctype="" token="{{ csrf_token() }}">

        <div class="form-group">
          <label for="titulo">Nome</label>
          <input type="text" class="form-control" id="name" name="name" placeholder="Nome" value="{{old('nome')}}">
        </div>

        <div class="form-group">
          <label for="conteudo">E-mail</label>
          <input type="email" class="form-control" id="email" name="email" placeholder="E-mail" value="{{old('email')}}">
        </div>

        <div class="form-group">
          <label for="autor">Autor</label>
          <select class="form-control" id="autor" name="autor">
              <option {{ ( old('autor') && old('autor') == 'N' ? 'selected' : '' ) }} value="N">Não</option>
              <option {{ ( old('autor') && old('autor') == 'S' ? 'selected' : '' ) }} value="S">Sim</option>
          </select>
        </div>

        <div class="form-group">
          <label for="conteudo">Senha</label>
          <input type="password" class="form-control" id="password" name="password" placeholder="Senha">
        </div>

      </formulario>
      <span slot="botoes">
        <button form="formAdicionar" class="btn btn-info">Adicionar</button>
      </span>
    </modal>

    <modal nome="editar" titulo="Editar">
      <formulario id="formEditar" v-bind:action="'/admin/usuarios/' + $store.state.item.id" method="put" enctype="multipart/form-data" token="{{ csrf_token() }}">

        <div class="form-group">
          <label for="titulo">Nome</label>
          <input type="text" class="form-control" name="name" v-model="$store.state.item.name" placeholder="Nome">
        </div>

        <div class="form-group">
          <label for="descricao">E-mail</label>
          <input type="email" class="form-control" name="email" v-model="$store.state.item.email" placeholder="E-mail">
        </div>

        <div class="form-group">
          <label for="autor">Autor</label>
          <select class="form-control" name="autor" v-model="$store.state.item.autor">
              <option value="N">Não</option>
              <option value="S">Sim</option>
          </select>
        </div>

        <div class="form-group">
          <label for="conteudo">Senha</label>
          <input type="password" class="form-control" name="password" placeholder="Senha">
        </div>

      </formulario>
      <span slot="botoes">
        <button form="formEditar" class="btn btn-info">Atualizar</button>
      </span>
    </modal>

@endsection
