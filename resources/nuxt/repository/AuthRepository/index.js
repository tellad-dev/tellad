import Repository from '../Repository.js'

const resource = '/login'

export default {
  login(payload) {
    return Repository.post(`${resource}`, payload)
  },
  logout() {
    return Repository.post('/logout')
  },
  signup(payload) {
    return Repository.post('/register', payload)
  },
}
