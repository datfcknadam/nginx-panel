<template>
  <div>
    <v-toolbar dense>
      <add-btn/>
      <v-spacer></v-spacer>
      <v-toolbar-items id="search">
        <v-text-field
          single-line
          label="search"
          prepend-icon="search"
        >
        </v-text-field>
      </v-toolbar-items>
    </v-toolbar>
  </div>
</template>

<script>
import {mapState} from 'vuex';
import AddBtn from './Btn/AddBtn.vue';

export default {
  components: {
    AddBtn,
  },
  computed: mapState(['listItem']),

}
</script>

<style>

</style>
