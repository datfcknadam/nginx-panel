<template>
  <div id="app">
    <v-app id="inspire">
      <toolbar/>
      <host-list/>
    </v-app>
  </div>
</template>

<script>
import Toolbar from './components/Toolbar.vue';
import HostList from './components/HostList.vue';

export default {
  name: 'App',
  components: {
    Toolbar,
    HostList,
  },
  data: () => ({
    //
  }),
};
</script>
