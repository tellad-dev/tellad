import axios from 'axios'

const baseDomain = 'localhost:8080'
const baseURL = `http://${baseDomain}`
axios.defaults.headers.post['Content-Type'] = 'application/json;charset=utf-8'
axios.defaults.headers.post['Access-Control-Allow-Origin'] = '*'

export default axios.create({
  baseURL,
})
