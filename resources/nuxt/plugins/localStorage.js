import createPersistedState from 'vuex-persistedstate'

export default ({ store }) => {
  createPersistedState({
    key: 'token',
    paths: ['auth.token'], // localStorageに保存したいstoreを入れる
  })(store)
}
