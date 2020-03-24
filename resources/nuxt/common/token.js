export const getToken = async () => {
  try {
    return await localStorage.getItem('token')
  } catch {
    return 'error'
  }
}
