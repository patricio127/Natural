<template>
  <v-app>
    <v-navigation-drawer v-model="drawer" app>
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
      <v-app-bar-nav-icon @click.stop="drawer = !drawer"></v-app-bar-nav-icon>
      <v-toolbar-title>Natural</v-toolbar-title>
    </v-app-bar>
    <v-main>
      <router-view />
    </v-main>
  </v-app>
</template>

<script>
export default {
  name: "App",

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
