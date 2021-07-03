<template>
  <v-app id="app">
    <NavTop/>
    <v-main>
      <router-view/>
    </v-main>
  </v-app>
</template>

<script>
import NavTop from '@/components/NavTop';

export default {
  name: 'App',

  components: {
    NavTop
  }
}
</script>
