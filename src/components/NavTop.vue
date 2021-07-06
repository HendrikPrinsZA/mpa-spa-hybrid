<template>
  <v-app-bar density="compact">
    <v-app-bar-title>SPA</v-app-bar-title>
    
    <v-spacer></v-spacer>

    <v-btn :href="hrefDashboard">Dashboard</v-btn>
    <v-btn to="/accounts" class="mr-3">Accounts</v-btn>

    <v-divider inset vertical></v-divider>

    <v-badge bordered color="error" icon="mdi-exit-to-app" class="mr-3">
      <v-btn :href="hrefLogout" color="error" flat>
        <span v-if="appData.profile">
          {{ appData.profile.firstname }} {{ appData.profile.lastname }}
        </span>
      </v-btn>
    </v-badge>
  </v-app-bar>
</template>

<script>
export default {
  name: 'NavTop',

  props: [
    'appData'
  ],

  computed: {

    hrefDashboard() {
      if (process.env.NODE_ENV !== 'production') {
        return process.env.VUE_APP_MPA_HOST + '/mpa/dashboard.php?SPA_HOST=' + encodeURI(window.location.origin)
      }
      return '../mpa/dashboard.php'
    },

    hrefLogout() {
      if (process.env.NODE_ENV !== 'production') {
        return process.env.VUE_APP_MPA_HOST + '/mpa/login.php?logout&SPA_HOST=' + encodeURI(window.location.origin)
      }
      return '../mpa/login.php?logout'
    }
  }
}
</script>

<style lang="scss" scoped>
.v-btn--active {
  text-decoration: underline;
  font-weight: 600;
}
</style>