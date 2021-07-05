<template>
  <v-dialog v-model="showModal" persistent>
    <v-card class="pa-2" outlined tile width="500" loading="loading">
      <v-card-header>
        <v-card-avatar>
          <v-avatar color="blue-lighten-4" size="50">
            <v-progress-circular indeterminate v-if="loading"></v-progress-circular>
            <v-icon large v-else>mdi-account-alert</v-icon>
          </v-avatar>
        </v-card-avatar>
        <v-card-header-text>
          <v-card-title>Dev Session Handler</v-card-title>
          <v-card-subtitle>
            DevServer session clone
          </v-card-subtitle>
        </v-card-header-text>
      </v-card-header> 
      <v-card-text>
        <ol>
          <li><span>Log in </span><a target="_blank" :href="hrefLogin">{{ hrefLogin }}</a></li>
          <li><span>Visit </span><a target="_blank" :href="hrefSessionid">{{ hrefSessionid }}</a></li>
          <li>Enter the sessionid below</li>
        </ol>
        <input v-model="sessionid" placeholder="sessionid" style="width: 100%; border: 1px solid black;"/>
      </v-card-text>
      <v-divider></v-divider>
      <v-card-actions>
        <v-btn color="blue" block @click="setSessionid()">Set sessionid</v-btn>
        <v-spacer></v-spacer>
      </v-card-actions>
    </v-card>
  </v-dialog>
</template>

<script>
import api from '@/plugins/api.js'

export default {
  name: 'DevSessionHandler',

  data: () => ({
    loading: false,
    hrefLogin: process.env.VUE_APP_MPA_HOST,
    hrefSessionid: process.env.VUE_APP_MPA_HOST + '/api/dev/sessionid',
    session: {},
    sessionid: null,
    showModal: false
  }),

  mounted: function() {
    this.getSession();
  },

  methods: {

    getSession() {
      let me = this;

      me.loading = true
      api.get('/dev/session').then(response => {
        me.session = response.data.session
        me.sessionid = response.data.sessionid

        if (me.session.loggedin) {
          me.showModal = false
        } else {
          me.showModal = true
        }
        
      }).finally(() => {
        me.loading = false
      })
    },

    setSessionid() {
      let me = this,
        payload = {
          sessionid: me.sessionid
        };

      me.loading = true
      api.post('/dev/session', payload).finally(() => {
        me.loading = false
        me.getSession()
      })
    }
  }
}
</script>
