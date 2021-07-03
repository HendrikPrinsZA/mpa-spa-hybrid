<template>
  <v-app id="app">
    <NavTop :appData="appData"/>
    <v-main>
      <router-view/>
    </v-main>
  </v-app>
</template>

<script>
import NavTop from '@/components/NavTop';
import { mapGetters, mapActions } from 'vuex'

export default {
  name: 'App',

  components: {
    NavTop
  },

  computed: {
        
    // Map the store's state `appData`
    ...mapGetters(['appData'])

  },

  methods: {

    // Map the store's action `loadAppData`
    ...mapActions(['loadAppData'])

  },

  async mounted() {
    await this.loadAppData()
    this.hasLoaded = true
  },
}
</script>
