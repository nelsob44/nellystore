<template>
  <v-footer
    height="absolute"
    color="primary lighten-1"
  >
    <v-layout
      justify-center
      row
      wrap
    >
      <v-btn
        v-for="link in links"
        :key="link"
        color="white"
        flat
        round
      >
        {{ link }}
      </v-btn>
      <v-flex
        primary
        lighten-2
        py-3
        text-xs-center
        white--text
        xs12
      >
        <div>&copy; 2017 - {{ new Date().getFullYear() }}</div><strong>Nellystore</strong>
      </v-flex>
    </v-layout>
  </v-footer>
</template>

<script>
export default {

}
</script>

<style>

</style>
