<template>
      <div>
        <p></p>
        <div class="row justify-content-between">
          <div class="col-4">
            <a v-if="criar && !modal" v-bind:href="criar">Criar</a>
            <modallink v-if="criar && modal" tipo="button" nome="adicionar" titulo="Criar" css=""></modallink>
          </div>
          <div class="col-3">
            <input type="search" placeholder="Buscar" class="form-control" v-model="buscar">
          </div>
        </div>
        <br>
        <table class="table table-striped table-hover">
          <thead>
            <tr>
              <th v-for="titulo in titulos">{{titulo}}</th>
              <th v-if="detalhe || deletar">Ação</th>
            </tr>
          </thead>

          <tbody>
            <tr v-for="(item, index) in lista">
              <td v-for="i in item">{{i}}</td>

              <td v-if="detalhe || deletar">
                <form v-bind:id="index" v-if="deletar && token" v-bind:action="deletar + item.id" method="post">
                  <input type="hidden" name="_method" value="DELETE">
                  <input type="hidden" name="_token" v-bind:value="token">

              <modallink v-if="editar && modal" v-bind:item="item" tipo="button"  nome="editar" v-bind:url="editar" titulo="Editar" css=""></modallink>
              <a v-if="deletar" href="#" v-on:click="executaForm(index)">Deletar</a>
              </form>

              <form v-bind:id="index" v-if="!deletar && token" v-bind:action="deletar + item.id" method="post">
                  <input type="hidden" name="_token" v-bind:value="token">

            <modallink v-if="editar && modal" v-bind:item="item" tipo="button"  nome="editar" v-bind:url="editar" titulo="Editar" css=""></modallink>

            </form>


            </td>
            </tr>


          </tbody>
        </table>

      </div>
</template>

<script>
    export default {
      props:['titulos','itens','criar','detalhe','editar','deletar','token','modal'],
      data:function(){
        return {
          buscar:''
        }
      },
      methods:{
        executaForm: function(index){
          document.getElementById(index).submit();
        }
      },
      computed:{
        lista:function(){
          let lista = this.itens.data;

          if(this.buscar){
            return lista.filter(res => {
              res = Object.values(res);
              for(let k = 0;k<res.length; k++){
                if((res[k] + "").toLowerCase().indexOf(this.buscar.toLowerCase()) >= 0){
                  return true;
              }
            }
              return false;

            });
          }

          return lista;
        }
      }
    }
</script>
