<template>
  <div>
    <v-expansion-panels multiple focusable accordion>
    <v-expansion-panel v-for="(list, i) of hostList.data" :key="i">
      <v-expansion-panel-header v-on:click="listItem(i)">
        <v-container fluid>
          <v-row>
            <img class="mt-2" max-height="40px" src="../../public/web.png">
            <v-col>
              <span class="font-weight-bold" v-text="list"/> &nbsp;
              <a :href="list" v-text="`(${list})`"/>
              <p class="font-weight-light" v-text="list"/>
            </v-col>
          </v-row>
          <v-expansion-panel-content>
            <div class="more-detail">
              <p> Перенаправлять HTTP: {{list}}</p>
              <p> Перенаправлять HTTPS на адрес: {{list}}</p>
              <p> Сертификат: {{list}}</p>
            </div>
            <update-btn :identificator="i"/>
            <div class="d-flex flex-row-reverse">
              <del-btn :identificator="i"/>
              <add-edit-btn :data="list" :name="'Редактировать'" :identificator="i"/>
            </div>
          </v-expansion-panel-content>
        </v-container>
      </v-expansion-panel-header>
    </v-expansion-panel>
    </v-expansion-panels>
  </div>
</template>

<script>
import AddEditBtn from './Btn/AddEditBtn.vue';
import DelBtn from './Btn/DelBtn.vue';
import UpdateBtn from './Btn/UpdateBtn.vue';
import {mapState} from 'vuex';

export default {
  components: {
    AddEditBtn,
    DelBtn,
    UpdateBtn,
  },
  computed: mapState(['hostList']),
  methods: {
    listItem(key) {
      this.$store.commit('SET_LIST_ITEM', key);
      console.log(this.hostList);
    },
  },
  mounted(){
    this.$store.dispatch('loadHostList');
  },
}
</script>

<style>
div.row > img {
  max-width: auto;
  max-height: 40px;
}
button.v-expansion-panel-header {
  padding: 0 24px;
}
.container--fluid {
  padding: 0;
}
</style>
