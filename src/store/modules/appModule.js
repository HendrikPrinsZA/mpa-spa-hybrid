import api from '@/plugins/api'

export default {
  state: () => ({ 
    data: {}
  }),

  mutations: { 
    SET_APP_DATA (state, data) { 
      state.data = data || {}; 
    }
  },

  actions: {
    async loadAppData ({ commit }) {
      await api.get('/app').then(response => {
        commit('SET_APP_DATA', response.data)
      })
    }
  },

  getters: { 
    appData (state) {
      return state.data
    }
  }
}