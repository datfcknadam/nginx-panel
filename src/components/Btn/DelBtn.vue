<template>
  <v-dialog v-model="dialog" persistent max-width="600px">
    <template v-slot:activator="{ on }">
      <v-btn class="mr-2" v-text="'Удалить'" v-on="on"/>
    </template>
    <v-card>
      <v-card-title>
        <span class="headline title">Вы действительно хотите удалить хост под номером {{identificator}}</span>
      </v-card-title>
      <v-card-actions>
        <v-spacer></v-spacer>
        <v-btn color="green lighten-1" dark @click="dialog = false">Да</v-btn>
        <v-btn color="grey lighten-2" @click="dialog = false">Нет</v-btn>
      </v-card-actions>
    </v-card>
  </v-dialog>
</template>

<script>
export default {
  props: {
    identificator: {
    type: Number,
    },
  },
  data(){
    return {
      dialog: false,
    }
  }
}
</script>
