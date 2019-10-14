<template>
  <div id="app">
    <v-app id="inspire">
      <toolbar/>
      <list-host/>
    </v-app>
  </div>
</template>

<script>
import Toolbar from './components/Toolbar.vue';
import ListHost from './components/ListHost.vue';

export default {
  name: 'App',
  components: {
    Toolbar,
    ListHost,
  },
  data: () => ({
    //
  }),
};
</script>
