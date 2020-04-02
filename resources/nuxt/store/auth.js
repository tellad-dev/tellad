import { RepositoryFactory } from '~/repository/RepositoryFactory.js'
const AuthRepository = RepositoryFactory.get('auth')

export const state = () => ({
  token: '',
})

export const mutations = {
  login(state, payload) {
    state.token = payload
  },
  signup(state, token) {
    state.token = token
  },
}

export const actions = {
  login(context, payload) {
    AuthRepository.login(payload)
  },
  async signup(context, payload) {
    console.log('payload:', payload)
    const response = await AuthRepository.signup({ email: payload.email, password: payload.password })
    if (response.data.access_token) {
      console.log('localstorage ni hozon!')
      localStorage.setItem('token', JSON.stringify(response.data.access_token))
    }
    const a = localStorage.getItem('token')
    console.log(a)
    context.commit('signup', response.data.access_token)
  },
}
