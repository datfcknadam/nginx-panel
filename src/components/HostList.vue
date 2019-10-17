<template>
  <div>
    <v-expansion-panels multiple focusable accordion>
    <v-expansion-panel v-for="(list, i) of hostList" :key="i">
      <v-expansion-panel-header v-on:click="listItem(i)">
        <v-container fluid>
          <v-row>
            <img class="mt-2" max-height="40px" src="../../public/web.png">
            <v-col>
              <span class="font-weight-bold" v-text="list[Object.keys(list)].inuse.host"/> &nbsp;(
              <a :href="list" v-text="list[Object.keys(list)].inuse.host"/>)
              <p class="font-weight-light" v-text="list[Object.keys(list)].inuse.brief"/>
            </v-col>
          </v-row>
          <v-expansion-panel-content>
            <div class="more-info">
              <p> Перенаправлять HTTP:
                <span v-text="list[Object.keys(list)].inuse.httpTarget ?
                  list[Object.keys(list)].inuse.httpForceHttps : 'на HTTPS'"
                />
              </p>
              <p> Перенаправлять HTTPS на адрес: {{list[Object.keys(list)].inuse.httpsTarget}}</p>
              <p> Сертификат: {{list[Object.keys(list)].inuse.host}}</p>
            </div>
            <update-btn :identificator="i"/>
            <div class="d-flex flex-row-reverse">
              <del-btn :identificator="i"/>
              <edit-btn :data="list[Object.keys(list)]" :identificator="i"/>
            </div>
          </v-expansion-panel-content>
        </v-container>
      </v-expansion-panel-header>
    </v-expansion-panel>
    </v-expansion-panels>
  </div>
</template>

<script>
import EditBtn from './Btn/EditBtn.vue';
import DelBtn from './Btn/DelBtn.vue';
import UpdateBtn from './Btn/UpdateBtn.vue';
import {mapState} from 'vuex';

export default {
  components: {

    EditBtn,
    DelBtn,
    UpdateBtn,
  },
  computed: {
    ...mapState(['hostList']),
  },
  methods: {
    listItem(key) {
      this.$store.commit('SET_LIST_ITEM', key);
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
div.more-info {
  width: auto;
}
</style>
