<template>
    <div v-bind:class="definirCor">
        <div class="card-header">{{titulo}}</div>

        <div class="card-body">
            <slot></slot>
        </div>
    </div>
</template>

<script>
    export default {
        props:['titulo','cor'],
        computed:
            {
                definirCor: function(){
                    return "card " + (this.cor || "card-default");
                }
            }
    }
</script>

<style>

</style>
