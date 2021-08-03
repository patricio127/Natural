<template>
  <div>
    <h2>Dejar una reseña</h2>
    <v-form ref="form" id="review-form" @submit.prevent="enviar" v-model="valid">
      <v-container>
        <v-row>
          <v-col lg="12">
            <router-link to="/" class="nav-link mx-16" id="volver" offset-lg="3"><v-btn elevation="2" color="secondary">Volver</v-btn> </router-link>
          </v-col>
          
          <v-col offset-lg="3" lg="6">
            <v-slider
              v-model="review.rating"
              :label="slider.label"
              :thumb-color="slider.color"
              thumb-label="always"
              max="50"
              min="0"
            ></v-slider>
          
          </v-col>
          <v-col offset-lg="3" lg="6">
            <v-textarea
              solo
              v-model="review.text"
              :rules="textRules"
              name="review"
              label="Deje su comentario"
              counter="250"
            ></v-textarea>
          </v-col>
          <v-col offset-lg="3" lg="6">
            <v-btn elevation="2" type="submit" color="primary">
              Enviar
            </v-btn>
          </v-col>
        </v-row>
      </v-container>
    </v-form>
  </div>
</template>
<script>
  import StorageManager from '../storage-manager';
  export default {
    name: "AddReview",
    data:function(){
        return {
            review: {
                rating: 45,
                text:'',
            },
            slider: { label: 'Puntuación', color: 'orange' },
            textRules: [
                v => !!v || 'Comentario requerido',
            ],
            valid: false,
        }
        
    },
    methods:{
      enviar:function() {
          if(this.review.text && this.review.text.length <= 250){
             StorageManager.guardarReview(this.review.rating/10, this.review.text).then((response)=>{
              if(response.ok){
                this.$router.push('/');
              }
            });
          }
         
              
      }
    }
  }
</script>