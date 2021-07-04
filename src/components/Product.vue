<template>
        <v-row class="producto">
            <v-col cols="6" sm="4" md="1">{{producto.codigo}}</v-col>
            <v-col cols="6" sm="4" md="1"><img :src='producto.urlImagen' v-show="producto.urlImagen" alt='vista previa de la imagen'></v-col>
            <v-col cols="12" sm="4" md="2"> {{producto.nombre | mayuscula}}</v-col>
            <v-col cols="12" sm="6" md="4">{{producto.descripcion | mayuscula}}</v-col>
            <v-col cols="6" sm="6" md="1">{{producto.categoria | mayuscula}}</v-col>
            <v-col cols="6" sm="4" md="1">{{producto.precio | formatoPrecio}}</v-col>
            <v-col cols="6" sm="4" md="1" class="action"><v-btn color="primary" elevation="2" icon v-on:click="editar"><v-icon>mdi-pencil</v-icon></v-btn></v-col>
            <v-col cols="6" sm="4" md="1" class="action"><v-btn color="error" elevation="2" icon v-on:click="eliminar"><v-icon>mdi-delete</v-icon></v-btn></v-col>
        </v-row>
</template>

<script>
  export default {
    props:['producto'],
    methods:{
        eliminar:function(){
            this.$emit('eliminar',this.producto);
        },
        editar:function(){
            this.$emit('editar',this.producto);
        }
    },
  }
</script>
<style scoped>
#lista-productos img {
    max-height: 50px;
    max-width: 90px;
}
#lista-productos .producto > div{
    display: flex;
    align-items: center;
    line-height: 50px;
    padding: 10px;
}
#lista-productos .producto .action {
    display: flex;
    justify-content: center;
}
</style>