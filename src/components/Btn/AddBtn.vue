<template>
  <v-dialog v-model="dialog" persistent max-width="650px">
    <template v-slot:activator="{ on }">
      <v-btn v-text="'Добавить'" v-on="on" color="primary" dark />
    </template>
    <v-form ref="form" v-model="valid" lazy-validation>
      <v-card>
        <v-card-title>
          <span class="headline title">Добавление виртуального хоста с перенаправлением</span>
        </v-card-title>
        <v-divider class="mx-2" />
        <v-card-text>
          <v-container>
            <v-row>
              <v-col cols="12" sm="10" md="6">
                <v-text-field outlined label="Виртуальный хост" v-model="host" :rules="hostRules" />
              </v-col>
              <v-col cols="12" sm="6" md="6">
                <v-text-field
                  outlined
                  label="Описание"
                  :rules="descriptionRules"
                  v-model="description"
                />
              </v-col>
              <v-col cols="12">
                <v-divider />
              </v-col>
              <v-col cols="12">
                <v-radio-group v-model="radioGroup">
                  <v-radio label="Перенаправлять HTTP на адрес" value="false" />
                  <v-radio label="Перенаправлять HTTP на HTTPS" value="true" />
                </v-radio-group>
              </v-col>
              <v-select
                filled
                v-model="selectHTTP"
                :items="selectProp"
                :disabled="radioGroup === 'false' ? false : true"
              />
              <v-text-field
                label="Перенаправлять HTTP на адрес"
                outlined
                @input="httpRoute"
                :value="selectHTTP"
                :disabled="radioGroup === 'false' ? false : true"
              />
              <v-col cols="12">
                <v-divider />
              </v-col>
              <v-select :items="selectProp" v-model="selectHTTPS" filled />
              <v-text-field
                outlined
                label="Перенаправлять HTTPS на адрес"
                @input="httpsRoute"
                required
                :value="selectHTTPS"
                :rules="httpsRules"
              />
              <v-col cols="12">
                <v-divider />
              </v-col>
              <v-col cols="12">
                <v-checkbox
                  label="Использовать сертификат LetsEncrypt"
                  :input-value="checkDomain ? false: null"
                  :disabled="checkDomain ? true : false"
                  v-model="letsEncrypt"
                />
                <v-checkbox label="Разрешать использование WebSocket" v-model="webSocket" />
              </v-col>
            </v-row>
          </v-container>
        </v-card-text>
        <v-card-actions>
          <v-spacer></v-spacer>
          <v-btn color="success" :disabled="!valid" @click="save">Сохранить</v-btn>
          <v-btn color="error" @click="dialog = false">Отмена</v-btn>
        </v-card-actions>
      </v-card>
    </v-form>
  </v-dialog>
</template>

<script>
export default {
  data() {
    return {
      valid: true,
      http: "",
      https: "",
      webSocket: "",
      letsEncrypt: "",
      host: "",
      description: "",
      radioGroup: "false",
      dialog: false,
      selectProp: ["http://", "https://"],
      selectHTTP: "http://",
      selectHTTPS: "http://",
      hostRules: [v => !!v || "Заполните поле виртуального хоста"],
      descriptionRules: [v => !!v || "Заполните поле описания"],
      httpsRules: [v => (v && v.length >= 9) || "Заполните поле"]
    };
  },
  props: {
    name: {
      type: String
    },
    data: {
      type: Object
    },
    identificator: {
      type: Number
    }
  },
  computed: {
    checkDomain() {
      if (this.host.toLowerCase().indexOf("*") !== -1) {
        return true;
      }
      return false;
    }
  },
  methods: {
    save() {
      if (this.$refs.form.validate()) {
        this.snackbar = true;
        this.$store.dispatch("createHost", {
          host: this.host,
          brief: this.description,
          httpForceHttps: this.radioGroup,
          webSocket: this.webSocket,
          description: this.description,
          letsEncrypt: this.letsEncrypt,
          http: this.http,
          https: this.https
        });
        this.dialog = false;
      }
    },
    httpRoute(value) {
      this.http = value;
    },
    httpsRoute(value) {
      this.https = value;
    }
  }
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
