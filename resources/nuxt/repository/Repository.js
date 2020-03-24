import axios from 'axios'
import { getToken } from '~/common/token.js'
const baseDomain = 'localhost:8080/api/'
const baseURL = `http://${baseDomain}`
const token = getToken()
axios.defaults.headers.common.Authorization = 'Bearer ' + token

console.log(token)
export default axios.create({
  baseURL,
})
