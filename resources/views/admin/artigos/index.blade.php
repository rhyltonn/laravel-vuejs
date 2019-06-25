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

                <widgets titulo="Lista de Artigos">


                    <tabela-lista
                    v-bind:titulos="['#','Título','imagem','Data']"
                    v-bind:itens="{{json_encode($listarArtigos)}}"
                    criar="#criar" detalhe="/admin/artigos/" editar="/admin/artigos/" deletar="/admin/artigos/" token="{{ csrf_token() }}"
                    modal="sim"

                    ></tabela-lista>
                    <div align="center">
                        {{$listarArtigos}}
                    </div>
                </widgets>

    </dashboard>

    <modal nome="adicionar" titulo="Adcionar">
      <formulario id="formAdicionar" css="" action="{{route('artigos.store')}}" method="post" enctype="" token="{{ csrf_token() }}">

        <div class="form-group">
          <label for="titulo">Título</label>
          <input type="text" class="form-control" id="titulo" name="titulo" placeholder="Título" value="{{old('titulo')}}">
        </div>


        <div class="form-group">
            <label for="imagem">Imagem</label>
            <input type="file" class="form-control-file" name="imagem" id="imagem">
          </div>
        </form>

        <div class="form-group">
          <label for="conteudo">Conteudo</label>
          <textarea class="form-control" id="conteudo" name="conteudo"  rows="8" cols="80">{{old('conteudo')}}</textarea>
        </div>

        <div class="form-group">
          <label for="data">Data</label>
          <input type="date" class="form-control" id="data" name="data" {{old('data')}}>
        </div>

        <div class="form-group">
          <label for="autor">Destaque</label>
          <select class="form-control" id="destaque" name="destaque">
              <option {{ ( old('destaque') && old('destaque') == 'N' ? 'selected' : '' ) }} {{ ( !old('destaque') ? 'selected' : '') }}value="N">Não</option>
              <option {{ ( old('destaque') && old('destaque') == 'S' ? 'selected' : '' ) }} value="S">Sim</option>
          </select>
        </div>

      </formulario>
      <span slot="botoes">
        <button form="formAdicionar" class="btn btn-info">Adicionar</button>
      </span>
    </modal>

    <modal nome="editar" titulo="Editar">
      <formulario id="formEditar" v-bind:action="'/admin/artigos/' + $store.state.item.id" method="put" enctype="multipart/form-data" token="{{ csrf_token() }}">

        <div class="form-group">
          <label for="titulo">Título</label>
          <input type="text" class="form-control" id="titulo" name="titulo" v-model="$store.state.item.titulo" placeholder="Título">
        </div>

        <div class="form-group">
            <label for="imagem">Imagem</label>
            <input type="file" class="form-control-file" name="imagem" id="imagem" disabled>
          </div>
        </form>

        <div class="form-group">
          <label for="conteudo">Conteudo</label>
          <textarea class="form-control" id="conteudo" name="conteudo"  rows="8" cols="80" v-model="$store.state.item.conteudo"></textarea>
        </div>

        <div class="form-group">
          <label for="data">Data</label>
          <input type="date" class="form-control" id="data" name="data" v-model="$store.state.item.data">
        </div>

        <div class="form-group">
          <label for="autor">Destaque</label>
          <select class="form-control" id="destaque" name="destaque" v-model="$store.state.item.destaque">
              <option value="N">Não</option>
              <option value="S">Sim</option>
          </select>
        </div>
      </formulario>
      <span slot="botoes">
        <button form="formEditar" class="btn btn-info">Atualizar</button>
      </span>
    </modal>

@endsection
