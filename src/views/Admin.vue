<template>
    <div id="lista-productos" class="mx-4">
        <h2>Lista de productos</h2>
        <div id="agregar"><router-link to="/add" class="nav-link">
            <v-btn
                color="indigo"
                dark
                fixed
                bottom
                right
                fab
            >
            <v-icon dark>mdi-plus</v-icon>
            </v-btn></router-link>
        </div>
        <v-row class="encabezado">
            <v-col lg="1">Codigo</v-col>
            <v-col lg="1">Imagen</v-col>
            <v-col lg="2">Nombre</v-col>
            <v-col lg="5">Descripcion del producto</v-col>
            <v-col lg="1">Precio</v-col>
            <v-col lg="2">Acciones</v-col>
        </v-row>
        <transition-group tag="ol" enter-active-class="animate__animated animate__bounceInLeft"
                        leave-active-class=" animate__animated animate__fadeOutRightBig" v-if="productos.length > 0">
            <li v-for="producto in productos" :key="producto.codigo">
                <product v-show="editandoCodigo != producto.codigo" :producto="producto"
                                    @editar="editar($event)" @eliminar="eliminar($event)">
                </product>
                <edit v-if="editandoCodigo == producto.codigo" :producto="producto" 
                                @terminarEdicion="terminarEdicion">
                </edit>
            </li>
        </transition-group>
        <p v-else>Aún no hay productos</p>
    </div>
</template>
<script>
  import Edit from '../components/Edit.vue';
  import Product from '../components/Product.vue';
  import StorageManager from '../storage-manager';

  export default {
    name: 'Admin',
    components: {
      Edit,
      Product,
    },
    mounted: function() {
          this.productos = StorageManager.leerLS();
    },
    methods: {
        eliminar: function(producto) {
            this.productos.splice(this.productos.indexOf(producto),1);
            StorageManager.guardarEnLS(this.productos);
        },
        editar: function(producto) {
            this.editandoCodigo = producto.codigo;
        },
        terminarEdicion: function() {
            StorageManager.guardarEnLS(this.productos);
            this.editandoCodigo = undefined;
        },
    },
    data: function() {
        return {
            productos:[],
            editandoCodigo:undefined,
        }
    }
  }
</script>
<style scoped>
#agregar {
    margin-bottom: 30px;
}
#lista-productos .encabezado {
    margin: 0 0 15px 0;
    padding-left: 0;
    padding-right: 0;
    height: 70px;
    line-height: 50px;
    font-size: 1.1em;
    font-weight: 500;
}
#lista-productos .encabezado > div:last-child{
    text-align: center;
}
#lista-productos  ol  li, #lista-productos .encabezado {
    list-style-type: none;
    margin-bottom: 25px;
    background-color: #fff  ;
}
#lista-productos ol li{
    box-shadow: 5px 5px rgb(0 0 0 / 20%);
    padding-left: 15px;
    padding-right: 15px;

}
#lista-productos p {
    text-align: center;
    font-size: 2em;
}
</style>