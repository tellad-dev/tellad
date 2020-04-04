import { RepositoryFactory } from '~/repository/RepositoryFactory.js'
const AuthRepository = RepositoryFactory.get('auth')

export const state = () => ({
  user: {},
  token: '',
})

export const mutations = {
  setUser(state, user) {
    state.user = user
  },
  setToken(state, token) {
    state.token = token
  },
}

export const actions = {
  signup(context, payload) {
    return new Promise((resolve, reject) => {
      AuthRepository.signup(payload)
        .then(response => {
          context.commit('setToken', response.data.user.api_token)
          context.commit('setUser', response.data.user)
          resolve(response)
        })
        .catch(error => {
          reject(error)
        })
    })
  },
  login(context, payload) {
    return new Promise((resolve, reject) => {
      AuthRepository.login(payload)
        .then(response => {
          context.commit('setToken', response.data.user.api_token)
          context.commit('setUser', response.data.user)
          resolve(response)
        })
        .catch(error => {
          reject(error)
        })
    })
  },
  async logout({ commit }) {
    return new Promise((resolve, reject) => {
      commit('setUser', { user: null })
      AuthRepository.logout()
      .then(response => {
        commit('setToken', { token: null })
        resolve(response)
      })
      .catch(error => {
        reject(error)
      })
    })
  },
}
