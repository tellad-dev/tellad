import Repository from '../Repository.js'

const resource = 'login'

export default {
  login(payload) {
    return Repository.post(`${resource}`, payload)
  },
  signup(payload) {
    return Repository.post('register', payload)
  },
}
