import { Middleware } from '@nuxt/types'

const auth: Middleware = ({ route, store, redirect }) => {
  if (route.name) {
    if (
      !(route.name === 'index' || route.name.includes('signup') || route.name === 'login') &&
      !store.state.auth.user.apiToken
    ) {
      redirect('/login')
    } else if ((route.name === 'signin' || route.name.includes('signup')) && store.state.auth.user.apiToken) {
      redirect('/')
    }
  } else {
    redirect('/')
  }
}

export default auth
