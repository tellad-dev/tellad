import userRepository from './UserRepository'
import authRepository from './AuthRepository'

const repositories = {
  user: userRepository,
  auth: authRepository,
}

export const RepositoryFactory = {
  get: name => repositories[name],
}
