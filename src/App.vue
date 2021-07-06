<template>
  <v-app id="app">
    <v-overlay :value="isLoading">
        <v-progress-circular indeterminate size="64"></v-progress-circular>
    </v-overlay>
    
    <div v-if="!isLoading">
      <NavTop :appData="appData"/>
      <v-main>
        <router-view/>
      </v-main>
    </div>
    <DevSessionHandler v-if="devMode"/>
  </v-app>
  
</template>

<script>
import NavTop from '@/components/NavTop';
import DevSessionHandler from '@/components/DevSessionHandler';
import { mapGetters, mapActions } from 'vuex'

export default {
  name: 'App',

  components: {
    NavTop,
    DevSessionHandler
  },

  data: () => ({
    devMode: (process.env.NODE_ENV !== 'production')
  }),

  computed: {
        
    // Map the store's state `appData`
    ...mapGetters(['appData', 'isLoading'])

  },

  methods: {

    // Map the store's action `loadAppData`
    ...mapActions(['loadAppData'])

  },

  async mounted() {
    await this.loadAppData()
  }
}
</script>
