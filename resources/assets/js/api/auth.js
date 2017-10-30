export const login = (data) => axios.post('/login', data)
export const register = (data) => axios.post('/register', data)
export const logout = () => axios.post('/logout')
