import axios from 'axios'
import { getToken } from '~/common/token.js'
const baseDomain = 'localhost:8080/api'
const baseURL = `http://${baseDomain}`
const token = getToken()
// const ORIGIN = 'http://localhost:3000'
// axios.defaults.headers.common['Access-Control-Allow-Origin'] = ORIGIN
// axios.defaults.headers.common['Content-Type'] = 'application/json'
axios.defaults.headers.common.Authorization = 'Bearer ' + token

console.log(token)
export default axios.create({
  baseURL,
  headers: {
    'Content-Type': 'application/json',
    'Access-Control-Allow-Origin': '*',
  },
  responseType: 'json',
})
