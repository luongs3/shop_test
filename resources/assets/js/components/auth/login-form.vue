<template>
    <modal class="login-form">
        <div slot="header">
            <h3>Login to your account<i class="fa fa-times-circle"  @click="$emit('close')"></i></h3>
        </div>
        <div slot="body">
            <div class="alert alert-danger error-container mt-1 mb-1" v-if="authenticationError">
                {{ authenticationError }}
            </div>
            <form role="form" @submit.prevent="validateBeforeSubmit">
                <div :class="{ 'control': true }">
                    <input
                        v-validate="'required|email|max:255'"
                        type="email"
                        name="email"
                        :class="{'input': true, 'is-danger': errors.has('email') }"
                        class="form-control"
                        v-model.trim="form.email"
                        placeholder="E-mail Address"
                    />
                    <span v-show="errors.has('email')" class="help is-danger">
                        {{ errors.first('email') }}
                    </span>
                </div>

                <div :class="{ 'control': true }">
                    <input
                        v-validate="'required|min:6|max:255'"
                        type="password"
                        name="password"
                        :class="{'input': true, 'is-danger': errors.has('password') }"
                        class="form-control"
                        v-model.trim="form.password"
                        placeholder="Password"
                    />
                    <span v-show="errors.has('password')" class="help is-danger">
                        {{ errors.first('password') }}
                    </span>
                </div>
            </form>    
        </div>
        <div slot="footer">
            <div class="form-group">
                <a class="float-right" href="/password/reset" @click.prevent="toForgotPage">
                    Forgot your password?
                </a>
            </div>
            <button type="submit" class="btn btn-block btn-primary mt-1" @click="validateBeforeSubmit">
                <span class="text-uppercase">Login</span>
            </button>
        </div>
    </modal>
</template>
<script>
import { mapActions } from 'vuex'
import Modal from 'comps/modal'

	export default {
        props: {
            showLoginModal: Boolean,
        },
		data() {
			return {
				form: {
			        email: '',
			        password: '',
                },
				authenticationError: null,
			}
		},
		methods: {
			...mapActions('auth', ['login', 'fetchMe']),
			validateBeforeSubmit () {
                this.$validator.validateAll().then((result) => {
                    this.handleLoginProcess()
                }).catch(() => {})
            },

            handleLoginProcess () {
                this.loading = true
                this.login(this.form)
                .then((response) => {
                    this.authenticationError = null
                    window.location.reload()
                })
                .catch((e) => {
                    if (e.errors) {
                    	for (let index in e.errors) {
                            this.errors.add(index, e.errors[index][0])
                    	}
                    }
                })
            },

            toForgotPage () {
                this.$root.$emit('auth-popup-close')
                this.$router.push('/password/reset')
            },
		},
        components: {
            Modal,
        }
	}
</script>