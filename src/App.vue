<template>
  <v-app>
    <v-navigation-drawer v-model="drawer" app fixed temporary>
      <v-list>
        <v-list-item
          links
          v-for="item in items"
          :key="item.titulo"
          :to="item.path"
        >
          <v-list-item-action>
            <v-icon>mdi-{{ item.icono }}</v-icon>
          </v-list-item-action>
          <v-list-item-content>
            <v-list-item-title> {{ item.titulo }}</v-list-item-title>
          </v-list-item-content>
        </v-list-item>
      </v-list>
    </v-navigation-drawer>
    <v-app-bar class="primary" app>
      <v-app-bar-nav-icon @click.stop="drawer = true"></v-app-bar-nav-icon>
      <v-toolbar-title>Natural</v-toolbar-title>
    </v-app-bar>
    <v-main>
      <router-view />
    </v-main>
  </v-app>
</template>

<script>
import StoareManager from './storage-manager'
export default {
  name: "App",
  mounted: function() {
    const listaProductos = StoareManager.leerLS();
    if (!listaProductos || listaProductos.length == 0){
      const fetchPromise = fetch(`https://veggie-shop.000webhostapp.com/test-data-api/test-data.php`);
      fetchPromise.then(response => {
          if (response.ok === true) {
              return response.json();
          }
      }).then(result => {
          if (result){
            StoareManager.guardarEnLS(result.listaProductos);
            location.reload();
          }
      }).catch(() => {
          console.warn("Error geting reviews");
      });
    }
  },  
  data: () => ({
    items: [
      {
        titulo: "Home",
        icono: "home",
        path: "/",
      },
      {
        titulo: "Admin",
        icono: "format-list-checkbox",
        path: "/admin",
      },
    ],
    drawer: null,
  }),
};
</script>
<style>
section#carousel-principal {
    padding: 0;
}
h2, h3{
    text-align: center;
    padding: 20px 0;
    margin-top: 35px;
}
h3 {
  font-size: 2.125rem;
  font-weight: 400;
}
ol {
    padding: 0 !important;
}
a {
  text-decoration: none;
}
</style>