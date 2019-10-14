<template>
  <div>
    <v-toolbar dense>
      <v-toolbar-items dense>
        <add-host/>
      </v-toolbar-items>
      <v-spacer></v-spacer>
      <v-toolbar-items>
        <v-text-field
          hide-details
          prepend-icon="search"
          single-line
        ></v-text-field>
      </v-toolbar-items>
    </v-toolbar>
  </div>
</template>

<script>
import addHost from './AddHost.vue';

export default {
  components: {
    addHost,
  }
}
</script>

<style>

</style>
