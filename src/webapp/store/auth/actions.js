import MeQuery from '@/services/queries/auth/me.query.js'

export default {
  async me({ commit }) {
    const result = await this.app.$graphql.request(MeQuery)

    if (result.me) {
      commit('setUser', result.me)
    } else {
      commit('resetUser')
    }
  },
}
