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

            <v-row class="encabezado d-none d-md-flex">
                <v-col lg="1">Codigo</v-col>
                <v-col lg="1">Imagen</v-col>
                <v-col lg="2">Nombre</v-col>
                <v-col lg="4">Descripcion</v-col>
                <v-col lg="1">Categoria</v-col>
                <v-col lg="1">Precio</v-col>
                <v-col lg="2">Acciones</v-col>
            </v-row>
            <transition-group tag="ol" enter-active-class="animate__animated animate__bounceInLeft"
                            leave-active-class=" animate__animated animate__fadeOutRightBig" v-if="productos.length > 0">
                <li v-for="producto in productos" :key="producto.codigo">
                    <product v-show="editandoProducto != producto" :producto="producto"
                                        @editar="editar($event)" @eliminar="eliminar($event)">
                    </product>
                    <edit v-if="editandoProducto == producto" :producto="producto" 
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
    mounted: async function() {
        StorageManager.leerBD().then(productos => {
            this.productos = productos;
            StorageManager.guardarEnLS(this.productos);
        }).catch(()=>{
            this.productos = StorageManager.leerLS();
        });
        console.log('mounted en Admin');
        console.log(`hay data pendiente ${StorageManager.hayDataPendiente()}`);
        if (StorageManager.hayDataPendiente()) {
            console.log(navigator.onLine);
            if (navigator.onLine) {
                console.log('ya estaba online y habia data pendiente');
                await StorageManager.actualizarBDConDataOffline();
                StorageManager.leerBD().then(productos => {
                    this.productos = productos;
                    StorageManager.guardarEnLS(this.productos);
                })
            } 
        }
        window.addEventListener('online', async () => {
            console.log('Evento online!');
            if (StorageManager.hayDataPendiente()) {
                await StorageManager.actualizarBDConDataOffline();
                StorageManager.leerBD().then(productos => {
                    this.productos = productos;
                    StorageManager.guardarEnLS(this.productos);
                })
            }
        });
    },
    methods: {
        eliminar: function(producto) {
            StorageManager.eliminarDeBD(producto).then(response => {
                if (response.ok) {
                    this.productos.splice(this.productos.indexOf(producto), 1);
                }
            }).catch(()=>{
                console.log('catch del eliminar');
                StorageManager.guardarPendienteEliminarEnLS(producto);
                this.productos.splice(this.productos.indexOf(producto), 1);
                StorageManager.guardarEnLS(this.productos);
            });
        },
        editar: function(producto) {
            this.editandoProducto = producto;
        },
        terminarEdicion: function() {
            StorageManager.guardarEnBD(this.editandoProducto).then(response => {
                if (response.ok) {
                    if (document.querySelector("input[type='file']").files.length > 0) {
                        this.editandoProducto.imagen = document.querySelector("input[type='file']").files[0].name;
                    }
                    this.editandoProducto = undefined;
                }
            }).catch(()=>{
                if (document.querySelector("input[type='file']").files.length > 0) {
                    this.producto.imagen = URL.createObjectURL(document.querySelector("input[type='file']").files[0]);
                }
                StorageManager.guardarPendienteEnLS(this.editandoProducto);
                StorageManager.guardarEnLS(this.productos);
                this.editandoProducto = undefined;
            });
        },
    },
    data: function() {
        return {
            productos:[],
            editandoProducto:undefined,
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