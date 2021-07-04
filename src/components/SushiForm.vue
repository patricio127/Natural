<template>
    <div>
        <v-form ref="form" id="formulario" @submit.prevent="guardar" v-model="valid">
            <v-container>
                <v-row>
                <v-col md="12"  lg="6">
                    <v-col lg="12" v-if="!modoEdicion">
                        <v-text-field
                            v-on:keydown.190.stop.prevent v-on:keydown.188.stop.prevent v-on:keydown.189.stop.prevent
                            v-on:keydown.109.stop.prevent v-on:keydown.110.stop.prevent  v-on:keydown.107.stop.prevent
                            :rules="codigoRules"
                            v-model.number="producto.codigo"
                            label="Codigo del producto"
                            id="codigo" name="codigo"
                            required
                        ></v-text-field>
                        <p v-if="validando && codigoRepetido" class="invalid-feedback">El codigo del producto ya existe</p>
                    </v-col>
                    <v-col lg="12">
                        <v-text-field
                            v-model="producto.nombre"
                            :rules="nombreRules"
                            label="Nombre del producto"
                            id="nombre" name="nombre"
                            required
                        ></v-text-field>
                    </v-col>
                    <v-col lg="12">
                        <v-text-field
                            v-model="producto.descripcion"
                            :rules="descripcionRules"
                            label="Descripcion"
                            id="descripcion" name="descripcion"
                            required
                        ></v-text-field>
                    </v-col>
                    <v-col lg="12">
                        <v-text-field
                            v-model.number="producto.precio"
                            :rules="precioRules"
                            label="Precio"
                            id="precio" name="precio"
                            required
                        ></v-text-field>
                    </v-col>
                    <v-col lg="12">
                        <v-text-field
                            v-model.number="producto.urlImagen"
                            :rules="imagenRules"
                            label="Ingrese la URL de la imagen de internet"
                            id="url-imagen" name="url-imagen"
                            required
                        ></v-text-field>
                    </v-col>
                </v-col>
                <v-col md="12"  lg="6">
                    <p>Vista previa de la imagen</p>
                    <div class="vista-previa">
                        <v-img heigth="300" :src='producto.urlImagen' v-show="producto.urlImagen" alt='vista previa de la imagen'></v-img>
                    </div>
                </v-col>
            </v-row>
            <v-col lg="12">
                <v-btn elevation="2" type="submit" color="primary">
                    {{modoEdicion ? "Listo" : "Guardar"}}
                </v-btn>
            </v-col>
            </v-container>
        </v-form>
    </div>
</template>

<script>
  export default {
    props:['producto','codigoRepetido', 'modoEdicion'],
    data:() =>({
            valid: false,
            validando : false,
            codigoRules: [
                v => !!v || 'Código requerido',
            ],
            nombreRules: [
                v => !!v || 'Nombre requerido',
            ],
            descripcionRules: [
                v => !!v || 'Descripción requerida',
            ],
            precioRules: [
                v => !!v || 'Precio requerido',
            ],
            imagenRules: [
                v => !!v || 'Imagen requerida',
            ],
        }
    ),
    methods : {
        guardar: function() {
            if (this.$refs.form.validate()) {
                this.validando = true;
                this.$emit('guardar');
            }
        }
    }
  }
</script>
<style scoped>
.invalid-feedback {
    color: red;
}
</style>