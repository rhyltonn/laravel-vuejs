<template>
  <nav class="navbar navbar-expand-md navbar-light bg-benf shadow-sm">
      <div class="container">
          <a class="navbar-brand" v-bind:href="url">
              <img class="img-fluid" v-bind:src="host+logo" alt="">
          </a>
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation'">
              <span class="navbar-toggler-icon"></span>
          </button>

          <div class="collapse navbar-collapse" id="navbarSupportedContent">
              <!-- Left Side Of Navbar -->
              <ul class="navbar-nav mr-auto">

              </ul>

              <!-- Right Side Of Navbar -->
              <ul class="navbar-nav ml-auto">
                <slot>
                </slot>
              </ul>
          </div>
      </div>
  </nav>
</template>

<script>
    export default {
      props:['logo','url'],
      computed:{
        host: function(){
          if(window.location.hostname == '127.0.0.1'){
          return "http://"+window.location.hostname+":8000/";
        }else{
          return "http://"+window.location.hostname+"/";
        }

        }
      }
  }
</script>

<style>
  .bg-benf{
    background: #e31847;
  }
  .navbar-light .navbar-brand{
    color: #fff!important;
  }
  .navbar-brand img{
      width: 150px;
  }
  .nav-link{
    color: #fff!important;
  }
</style>
