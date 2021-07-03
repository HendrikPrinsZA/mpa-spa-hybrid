<template>
  <v-app-bar density="compact">
    <v-app-bar-title to="/">Vuetify</v-app-bar-title>
    
    <v-spacer></v-spacer>

    <v-btn link to="/dashboard">Dashboard</v-btn>
    <v-btn to="/accounts" class="mr-3">Accounts</v-btn>

    <v-divider inset vertical></v-divider>

    <v-badge bordered color="error" icon="mdi-exit-to-app" class="mr-3">
      <v-btn color="error" flat>
        John Doe
      </v-btn>
    </v-badge>
  </v-app-bar>
</template>

<script>
export default {
  name: 'NavTop'
}
</script>

<style lang="scss" scoped>
.v-btn--active {
  text-decoration: underline;
  font-weight: 600;
}
</style>