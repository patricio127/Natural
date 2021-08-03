<template>
        <v-row class="producto">
            <v-col cols="6" sm="4" md="1">{{producto.codigo}}</v-col>
            <v-col cols="6" sm="4" md="1">
                <img :src='pendiente ? producto.imagen : apiPath + "/Natural/api/" + "imagenes/" + producto.codigo + producto.imagen' v-show="producto.imagen" alt='Img'>
            </v-col>
            <v-col cols="12" sm="4" md="2"> {{producto.nombre | mayuscula}}</v-col>
            <v-col cols="12" sm="6" md="4">{{producto.descripcion | mayuscula}}</v-col>
            <v-col cols="6" sm="6" md="1">{{producto.categoria | mayuscula}}</v-col>
            <v-col cols="6" sm="4" md="1">{{producto.precio | formatoPrecio}}</v-col>
            <v-col cols="6" sm="4" md="1" class="action"><v-btn color="primary" elevation="2" icon v-on:click="editar"><v-icon>mdi-pencil</v-icon></v-btn></v-col>
            <v-col cols="6" sm="4" md="1" class="action">
                <v-dialog v-model="dialog" persistent max-width="290">
                    <template v-slot:activator="{ on, attrs }">
                        <v-btn color="error" elevation="2" icon v-bind="attrs" v-on="on">
                            <v-icon>mdi-delete</v-icon>
                        </v-btn>
                    </template>
                    <v-card>
                        <v-card-title class="text-h5">
                            Confirmar eliminación
                        </v-card-title>
                        <v-card-text>Confirme que desea eliminar el producto "{{producto.nombre}}"</v-card-text>
                        <v-card-actions>
                        <v-spacer></v-spacer>
                        <v-btn color="red darken-1" text v-on:click="eliminar">Eliminar</v-btn>
                        <v-btn color="gray darken-1" text v-on:click="dialog = false">Cancelar</v-btn>
                        </v-card-actions>
                    </v-card>
                </v-dialog>
            </v-col>
        </v-row>
</template>

<script>
import StorageManager from '../storage-manager';
  export default {
    props:['producto'],
    data: function(){
        return {
            pendiente: StorageManager.leerPendientesDeLS()[this.producto.codigo],
            dialog: false,
            apiPath: StorageManager.API_PATH,
        }
    },
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