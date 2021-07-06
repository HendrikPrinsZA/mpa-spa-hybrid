import api from '@/plugins/api'

export default {
  state: () => ({ 
    data: {},
    loading: false
  }),

  mutations: { 
    SET_APP_DATA (state, data) { 
      state.data = data || {}; 
    },

    SET_LOADING (state, loading) {
      state.loading = loading
    }
  },

  actions: {
    async loadAppData ({ commit }) {
      commit('SET_LOADING', true)
      await api.get('/app').then(response => {
        commit('SET_APP_DATA', response.data)
      }).catch(error => {
        console.log({
          fn: 'appModule->loadAppData->catch',
          error: error
        });
      }).finally(() => {
        commit('SET_LOADING', false)
      })
    }
  },

  getters: { 
    
    appData (state) {
      return state.data
    },

    isLoading (state) {
      return state.loading
    }

  }
}