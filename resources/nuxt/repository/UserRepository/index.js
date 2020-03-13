import Repository from '../Repository.js'

const resource = '/users'

export default {
  register(payload) {
    Repository.defaults.headers.post['Content-Type'] = 'multipart/form-data'

    return Repository.post(`${resource}`, payload)
  },
}
