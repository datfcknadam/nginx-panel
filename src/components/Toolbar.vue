<template>
  <div>
    <v-toolbar dense>
      <add-edit-btn :data="''" :name="'Добавить'"/>
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
import AddEditBtn from './Btn/AddEditBtn.vue';

export default {
  components: {
    AddEditBtn,
  },
  computed: mapState(['listItem']),

}
</script>

<style>

</style>
