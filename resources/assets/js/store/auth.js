import { register } from 'api/auth'
import { getMe } from 'api/user'

export default {
    namespaced: true,
    state: {
        user: window.user,
    },
    mutations: {
        PRELOAD (state, user) {
            state.preload = user
        },

        SET_USER (state, user) {
            state.user = user
        },

        SET_POSTS_COUNT (state, posts_count) {
            if (state.user.posts_count !== posts_count) {
                state.user.posts_count = posts_count
            }
        },

        SET_LAST_SEEN (state, data) {
            state.user.last_seen = _assign(state.user.last_seen, data)
        }
    },
    actions: {
        register ({ commit, dispatch }, data) {
            return register(data).then(({data}) => {
                localStorage.setItem('user', JSON.stringify(data.user))
                commit('SET_USER', data.user)

                return data
            })
            .catch(error => {
                if (error.response && error.response.data) {
                    throw error.response.data
                } else {
                    throw error.message
                }
            })
        },

        login ({ commit, dispatch }, data) {
            return axios.post('/login', data)
                .then(({data}) => {
                    localStorage.setItem('user', JSON.stringify(data.user))
                    commit('SET_USER', data.user)

                    return data
                })
                .catch(error => {
                    if (error.response && error.response.data) {
                        throw error.response.data
                    } else {
                        throw error.message
                    }
                })
        },

        logout ({ commit, dispatch }) {
            localStorage.removeItem('user')
            commit('SET_USER', null)

            return axios.post('/logout')
        },
        
        fetchMe ({ commit, state }) {
            try {
                getMe()
                    .then(({data}) => {
                        if (data.user) {
                            localStorage.setItem('user', JSON.stringify(data.user))
                            commit('SET_USER', data.user)
                        } else {
                            localStorage.setItem('user', null)
                            commit('SET_USER', null)
                        }
                        
                        return data
                    })
                    .catch(() => null)
            } catch (error) {
                commit('SET_USER', null)
                return null
            }
        },
        changeAuthenticationState ({ commit, dispatch }, { user = null } = {}) {
            if (user !== null) {
                commit('SET_USER', user)
            } else {
                dispatch('fetchUser')
            }
        },

        fetchLastSeen ({ state, commit }) {
            if (!state.guest) {
                return axios.get('/api/me/activity/lastVisit').then(({ data }) => commit('SET_LAST_SEEN', data))
            }
        }
    },
    getters: {
        authenticated: (state) => state.user != null,
        roles: (state) => state.user ? state.user.roles || [] : [],
        // isEditor: (state) => state.user && state.user.roles.includes('editor'),
        userId: (state) => {
            return state.user ? state.user.id : null
        },
        isUser: (state) => (id) => state.user && state.user.id === id,
        isAdmin: (state) => state.user && state.user.is_admin === true
    }
}