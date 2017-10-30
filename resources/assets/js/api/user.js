export const getUsers = (params) => axios.get('/users', { params })
export const getUser = (params, username) => axios.get(`/users/${username}`, { params })
export const getMe = (params) => axios.get(`/me`, { params })
