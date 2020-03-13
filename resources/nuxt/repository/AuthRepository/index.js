import Repository from '../Repository.js'

const resource = '/auth'

export default {
  login(payload) {
    return Repository.post(`${resource}`, payload)
  },
}
