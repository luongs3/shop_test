import { register } from 'api/auth'
import { getMe } from 'api/user'

export default {
    namespaced: true,
    state: {
        user: null,
        guest: true
    },
    mutations: {
        PRELOAD (state, user) {
            state.preload = user
        },

        SET_USER (state, user) {
            state.user = user
            console.log('SET_USER', state.user)
        },

        SET_GUEST (state, guest) {
            state.guest = Boolean(guest)
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
            return register(data).then(response => response.data)
            .catch(error => {
                if (error.response && error.response.data) {
                    throw error.response.data
                } else {
                    throw error.message
                }
            })
        },
        
        fetchMe ({ commit, state }) {
            try {
                getMe()
                    .then(({data}) => {
                        commit('SET_USER', data)
                        commit('SET_GUEST', false)
                        
                        return data
                    })
                    .catch(() => null)
            } catch (error) {
                commit('SET_USER', null)
                commit('SET_GUEST', true)
                return null
            }
        },
        changeAuthenticationState ({ commit, dispatch }, { guest = true, user = null } = {}) {
            if (user !== null) {
                commit('SET_USER', user)
                commit('SET_GUEST', false)
            } else {
                commit('SET_GUEST', guest)
                dispatch('fetchUser')
            }
        },
        login ({ commit, dispatch }, data) {
            return axios.post('/login', data).then(response => response)
        },

        logout ({ commit, dispatch }) {
            return axios.post('/logout')
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