import authRepository from './AuthRepository'

const repositories = {
  auth: authRepository,
}

export const RepositoryFactory = {
  get: name => repositories[name],
}
