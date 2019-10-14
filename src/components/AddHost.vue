<template>
  <v-dialog v-model="dialog" persistent max-width="600px">
    <template v-slot:activator="{ on }">
      <v-btn color="primary" v-on="on">Добавить</v-btn>
    </template>
    <v-card>
      <v-card-title>
        <span class="headline title">Добавление виртуального хоста с перенаправлением</span>
      </v-card-title>
      <v-divider class="mx-2"/>
      <v-card-text>
        <v-container>
          <v-row>
            <v-col cols="12" sm="10" md="6">
              <v-text-field v-model="host" outlined label="Виртуальный хост" required/>
            </v-col>
            <v-col cols="12" sm="6" md="6">
              <v-text-field  outlined label="Описание"/>
            </v-col>
            <v-col cols="12">
              <v-divider/>
            </v-col>
            <v-col cols="12" sm="10" md="10">
              <v-radio-group v-model="radioGroup">
                <v-radio label="Перенаправлять HTTP на адрес"/>
                <v-radio label="Перенаправлять HTTP на HTTPS"/>
              </v-radio-group>
              <v-text-field label="Перенаправлять HTTP на адрес"  outlined :disabled="radioGroup === 0 ? false : true"/>
            </v-col>
            <v-col cols="12">
              <v-divider/>
            </v-col>
            <v-col cols="12" sm="10" md="10">
              <v-text-field outlined label="Перенаправлять HTTPS на адрес" required/>
            </v-col>
            <v-col cols="12">
              <v-divider/>
            </v-col>
            <v-col cols="12">
              <v-checkbox label="Использовать сертификат LetsEnctrypt"/>
              <v-checkbox label="Разрешать использование WebSocket" :disabled="checkDomain ? true : false"/>
            </v-col>
          </v-row>
        </v-container>
      </v-card-text>
      <v-card-actions>
        <v-spacer></v-spacer>
        <v-btn color="blue darken-1" text @click="dialog = false">Close</v-btn>
        <v-btn color="blue darken-1" text @click="dialog = false">Save</v-btn>
      </v-card-actions>
    </v-card>
  </v-dialog>
</template>
<script>
export default {
  data(){
    return {
      host: "",
      radioGroup: 0,
      dialog: false,
    }
  },
  computed: {
    checkDomain() {
      if (this.host.indexOf(".c20.arealidea.ru") !== -1) {
        return true;
      }
      return false;
    },
  },
}
</script>
