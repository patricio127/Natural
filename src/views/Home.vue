<template>
  <div>
    <body>
      <header>
        <nav>
          <v-img width="100" class="mx-auto my-2" height="auto" src="../assets/logo.png"></v-img>
        </nav>
        <h1 hidden>Natural Sushi</h1>
      </header>
      <section
        id="carousel-principal"
        class="carousel slide"
        data-bs-ride="carousel"
      >
        <v-carousel>
          <v-carousel-item
            reverse-transition="fade-transition"
            transition="fade-transition"
          >
            <v-img height="auto" src="../assets/inicio.jpg">
              <v-row class="fill-height" align="center" justify="center">
                <div class="carousel-text">
                  <div class="text-h2">Bienvenido a Natural Sushi</div>
                  <div lg="6" class="text-p">¿Que vas a disfrutar hoy?</div>
                </div>
              </v-row>
            </v-img>
          </v-carousel-item>
          <v-carousel-item
            reverse-transition="fade-transition"
            transition="fade-transition"
          >
            <v-img height="auto" src="../assets/caroucel1.jpg">
              <v-row class="fill-height" align="center" justify="center">
                <div class="carousel-text">
                  <div class="text-h2">¿Queres probar algo nuevo?</div>
                  <div class="text-p">Tenemos variedades de platos para que puedas desgustar</div>
                </div>
              </v-row>
            </v-img>
          </v-carousel-item>
          <v-carousel-item
            reverse-transition="fade-transition"
            transition="fade-transition"
          >
            <v-img height="auto" src="../assets/caroucel2.jpg">
              <v-row class="fill-height" align="center" justify="center">
                <div class="carousel-text">
                  <div class="text-h2">Ideal para reunirse con amigos</div>
                  <div class="text-p">Pasa un buen momento en nuestro restaurante, sin ningun costo adicional</div>
                </div>
              </v-row>
            </v-img>
          </v-carousel-item>
        </v-carousel>
      </section>
      <section id="productos" v-if="productos.length > 0">
        <h3>Nuestros productos</h3>
        <v-row>
          <v-card class="my-4 mx-auto" max-width="18rem" v-for="producto in productos" :key="producto.codigo">
            <div class="contenedor-img">
              <v-img contain :src='apiPath +"/Natural/api/" + "imagenes/" + producto.codigo + producto.imagen' alt="Imagen"></v-img>
            </div>
            <v-card-title>{{producto.nombre | mayuscula}}</v-card-title>
            <v-card-text>{{producto.descripcion | mayuscula}}</v-card-text>
          </v-card>
        </v-row>
      </section>
      <section id="servicios">
        <h3>Nuestros servicios</h3>
        <v-row>
          <v-col lg="4" md="6" sm="12">
            <v-card class="mx-auto my-4" height="250">
              <v-img
                contain
                height="100"
                src="../assets/camion.svg"
              ></v-img>
              <v-card-title>Te lo llevamos a tu casa</v-card-title>
              <v-card-text
                >Desde el momento que pedís tu orden, trabajamos para que esté
                lo antes posible en tu domicilio</v-card-text
              >
            </v-card>
          </v-col>
          <v-col lg="4" md="6" sm="12">
            <v-card class="mx-auto my-4" height="250">
              <v-img
                contain
                height="100"
                src="../assets/take-away.svg"
              ></v-img>
              <v-card-title>Take away</v-card-title>
              <v-card-text
                >Podes buscar tu orden en un tiempo estimado que te damos
                telefónicamente</v-card-text
              >
            </v-card>
          </v-col>
          <v-col lg="4" md="6" sm="12">
            <v-card class="mx-auto my-4" height="250">
              <v-img
                contain
                height="100"
                src="../assets/plato.svg"
              ></v-img>
              <v-card-title>Un buen plato en un buen restaurante</v-card-title>
              <v-card-text>Lunes a Sabados - 19:00HS a 00:00HS</v-card-text>
            </v-card>
          </v-col>
        </v-row>
      </section>
      <section id="reseñas" >
        <h3>Reseñas</h3>
        <v-row >
          <v-col lg="3" md="6" sm="12" v-for="review in reseñas" :key=review.id>
            <v-card class="mx-auto " max-width="374">
              <v-img
                contain
                height="100"
                src="../assets/usuario.svg"
                class="mx-auto"
              ></v-img>
              <v-card-text >
                <v-row align="center" class="mx-1">
                  <v-rating
                    :value=parseFloat(review.rating)
                    color="amber"
                    dense
                    half-increments
                    readonly
                    size="20"
                    class="my-4"
                  ></v-rating>
                  <div class="grey--text ms-4">{{review.rating}}</div>
                </v-row>
                <div> {{review.text}}
                </div>
              </v-card-text>
            </v-card>
          </v-col>

        </v-row>
        <v-row class="reviews-button-container">
          <router-link to="/add-review" class="nav-link" >
            <v-btn color="primary" elevation="8">Dejanos tu reseña</v-btn> 
          </router-link>
        </v-row> 
      </section>
      <footer>
        <div>
          <div>
            <h3>Sobre Nosotros</h3>
            <p>
              Tenemos 11 años de experiencia en lo que hacemos, sabemos cómo
              hacerte feliz
            </p>
          </div>
          <div id="iconos">
            <h4>Contactos</h4>
            <ul>
              <li>5491155025436</li>
              <li>Guatemala 255, CABA</li>
              <li>
                <a href="https://www.instagram.com/" target="_blank"
                  ><img src="../assets/instagram.svg" alt="Instagram"
                /></a>
              </li>
              <li>
                <a href="https://www.facebook.com/" target="_blank"
                  ><img src="../assets/facebook.svg" alt="Facebook"
                /></a>
              </li>
            </ul>
          </div>
        </div>
        <p>
          Patricio Huang - Aplicaciones para Dispositivos Móviles - noche - 3a -
          2021
        </p>
      </footer>
    </body>
  </div>
</template>

<script>
import StorageManager from "../storage-manager";
export default {
  name: "Home",
  mounted: function () {
    StorageManager.leerBD().then(productos => {
        this.productos = productos;
        StorageManager.guardarEnLS(this.productos);
    }).catch(()=>{
        this.productos = StorageManager.leerLS();
    });

    const fetchPromise = fetch(`${this.apiPath}/Natural/api/reviews.php`);

    fetchPromise.then(response => {
        if (response.ok === true) {
            return response.json();
        } else {
          console.warn("Error geting reviews");
        }
    }).then(result => {
        if (result){
          this.reseñas = result;
        }
    }).catch(() => {
        console.warn("Error geting reviews");
    });
  },
  data: function() {
    return {
      productos: [],
      reseñas: [],
      apiPath: StorageManager.API_PATH,
    }
  }
};
</script>
<style scoped>
.carousel-text {
    width: 100%;
    background-color: rgba(255,255,255,0.6);
    padding: 10px;
}
.carousel-text > div {
  text-align: center;
}
.carousel-text > div:last-child {
  font-weight: bold;
}

#productos, #servicios, #reseñas {
  padding-left: 50px;
  padding-right: 50px;
}

#productos .v-card .contenedor-img {
    height: 200px;
    width: 100%;
    overflow: hidden;
    background-color: black;
    display: flex;
    align-items: center;
    border-top-right-radius: 10px;
    border-top-left-radius: 10px;
}

#servicios .card {
    height: 250px;
}

#reseñas {
  padding-bottom: 50px;
}

#reseñas .v-card {
  padding-top:20px;
}

#reseñas .v-card .v-card__text {
  height: 200px;
}

#productos > div > div {
    margin: 10px 10px;
    border-radius: 10px;
    border: none;
}
#reseñas div div.card:hover, #productos div div.card:hover {
    box-shadow: rgba(100, 100, 111, 0.2) 0px 7px 29px 0px;
}

.reviews-button-container a{
  width: 350px;
  display: block;
  margin-left: auto;
  margin-right: auto;
  margin-top: 30px;
  margin-bottom: 30px;
}
.reviews-button-container a button{
  width: 100%;
}
footer {
    background-image: url('../assets/footer.jpg');
    padding: 50px 0 40px;
}
footer h3, footer h4 {
    color: rgb(230, 230, 230);
}
footer h3 {
    padding: 0 0 20px 0;
    text-align: left;
}
footer p {
    color: #f1faee;
}
footer > div {
    display: block;
    padding: 0 40px;
}
footer ul li {
    color: #a8dadc;
    list-style: none;
}
footer ul li a{
    color: #a8dadc;
    text-decoration: none;
}
footer ul li a img {
    width: 16px;
    height: 16px;
}
footer > p:last-child{
    text-align: center;
    margin: 0;
    padding: 50px 20px 0;
    font-size: 0.75em;
}
footer > div {
    display: grid;
    grid-template-columns: 50% 50%;
} 
</style>
