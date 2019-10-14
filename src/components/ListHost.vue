<template>
  <div>
    <v-expansion-panels>
    <v-expansion-panel v-for="(list, i) of data" :key="i">
      <v-expansion-panel-header v-text="list"/>
    </v-expansion-panel>
    </v-expansion-panels>
  </div>
</template>

<script>
export default {
  data(){
    return {
      data: ["one", "two", "free", "one", "one", "one"],
    }
  }
}
</script>

<style>

</style>
