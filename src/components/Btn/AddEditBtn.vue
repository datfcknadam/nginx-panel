<template>
  <v-dialog v-model="dialog" persistent max-width="600px">
    <template v-slot:activator="{ on }">
      <v-btn
        :color="name === 'Добавить'? 'primary' : 'grey lighten-4'"
        :dark="name === 'Добавить'? true : false"
        v-text="name"
        v-on="on"
      />
    </template>
    <v-card>
      <v-card-title>
        <span class="headline title">{{name}} виртуальный хост с перенаправлением</span>
      </v-card-title>
      <v-divider class="mx-2"/>
      <v-card-text>
        <v-container>
          <v-row>
            <v-col cols="12" sm="10" md="6">
              <v-text-field outlined label="Виртуальный хост" required v-model="data"/>
            </v-col>
            <v-col cols="12" sm="6" md="6">
              <v-text-field outlined label="Описание" :value="data"/>
            </v-col>
            <v-col cols="12">
              <v-divider/>
            </v-col>
            <v-col cols="12">
              <v-radio-group v-model="radioGroup">
                <v-radio label="Перенаправлять HTTP на адрес"/>
                <v-radio label="Перенаправлять HTTP на HTTPS"/>
              </v-radio-group>
            </v-col>
            <v-select
              filled
              v-model="selectHTTP"
              :items="selectProp"
              :disabled="radioGroup === 0 ? false : true"
            />
            <v-text-field
              label="Перенаправлять HTTP на адрес"
              outlined
              :value="selectHTTP + data"
              :disabled="radioGroup === 0 ? false : true"
            />
            <v-col cols="12">
              <v-divider/>
            </v-col>
            <v-select :items="selectProp" v-model="selectHTTPS" filled/>
            <v-text-field
              outlined
              label="Перенаправлять HTTPS на адрес"
              required
              :value="selectHTTPS + data"
            />
            <v-col cols="12">
              <v-divider/>
            </v-col>
            <v-col cols="12">
              <v-checkbox
                label="Использовать сертификат LetsEnctrypt"
                :input-value="checkDomain ? false: null"
                :disabled="checkDomain ? true : false"
              />
              <v-checkbox label="Разрешать использование WebSocket"/>
            </v-col>
          </v-row>
        </v-container>
      </v-card-text>
      <v-card-actions>
        <v-spacer></v-spacer>
        <v-btn color="green lighten-1" dark @click="dialog = false">Сохранить</v-btn>
        <v-btn color="grey lighten-2" @click="dialog = false">Отмена</v-btn>
      </v-card-actions>
    </v-card>
  </v-dialog>
</template>
<script>
export default {
  data() {
    return {
      description: "",
      radioGroup: 0,
      dialog: false,
      selectProp: ["http://", "https://"],
      selectHTTP: "http://",
      selectHTTPS: "http://"
    };
  },
  props: {
    name: {
      type: String
    },
    data: {
      type: String
    },
    identificator: {
      type: Number
    }
  },
  computed: {
    checkDomain() {
      if (this.data.toLowerCase().indexOf("*") !== -1) {
        return true;
      }
      return false;
    },
  },
};
</script>
<style>
div.v-input.v-select {
  max-width: 120px;
  padding: 0;
  margin: 0;
}
.v-text-field--filled > .v-input__control > .v-input__slot {
  border-top-left-radius: 16px !important;
  border-top-right-radius: 0px !important;
}
</style>
