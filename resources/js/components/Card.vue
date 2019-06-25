<template>

  <div id="cardBase" v-bind:class="defTamanho">

    <div class="card">
        <h4 class="card-title text-center"><b>{{titulo}}</b></h4>
        <img v-bind:src="imagem" class="card-img-top" alt="...">
        <div class="card-body">
        <p class="card-text">{{artigo}}</p>
        <p class="card-text"><small class="text-muted">{{data}}</small></p>
      </div>
    </div>

  </div>

</template>

<script>
    export default {
      props:['tamanho','titulo','imagem','artigo','data'],
      computed:{
      defTamanho: function(){
          if(this.tamanho>=12){
              return "col-md-12";
          }
          return "col-md-"+this.tamanho;
      }
    }
  }
</script>

<style>
  #cardBase{
    padding: 15px;
  }
  .card-title{
    padding: 10px 0px;
  }
  .card img{
    padding: 0px 15px;
  }

</style>
