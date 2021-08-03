<template>
  <div>
    <h2>Añadir producto</h2>
    <router-link to="/admin" class="nav-link mx-16" id="volver"><v-btn elevation="2" color="secondary">Volver</v-btn> </router-link>
    <sushi-form @guardar="guardar" :producto="producto" 
          :codigoRepetido="codigoRepetido" :modoEdicion="false">
    </sushi-form>
  </div>
</template>

<script>
  import StorageManager from '../storage-manager';
  import SushiForm from '../components/SushiForm.vue';
  export default {
    name: "Add",
    components: {
      SushiForm,
    },
    data:function(){
        return {
            producto: {
                codigo: '',
                categoria:'',
                nombre: '',
                descripcion: '',
                precio: '',
                imagen: '',
            },
            codigoRepetido: false,
            productos: [],
        }
    },
    mounted: function() {
          this.productos = StorageManager.leerLS();
      },
    methods:{
        codigoExistente: function(codigo){
            let yaExiste = false;
            this.productos.forEach(producto => {
                if(producto.codigo == codigo){
                    yaExiste = true;
                }
            });
            StorageManager.leerPendientesEliminarDeLS().forEach(pendiente => {
                if(pendiente == codigo){
                    yaExiste = true;
                }
            });
            return yaExiste;
        },
        guardar:function() {
            if(this.codigoExistente(this.producto.codigo)){
                this.codigoRepetido=true;
            }else {
                //this.productos.push(this.producto);
                StorageManager.guardarEnBD(this.producto).then((response)=>{
                  if(response.ok){
                    this.$router.push('/admin');
                  }
                }).catch(()=>{
                  this.producto.imagen = URL.createObjectURL(document.querySelector("input[type='file']").files[0]);
                  StorageManager.guardarPendienteEnLS(this.producto);
                  this.productos.push(this.producto);
                  StorageManager.guardarEnLS(this.productos);
                  this.$router.push('/admin');
                });
                
            }
        }
    },
  }
</script>