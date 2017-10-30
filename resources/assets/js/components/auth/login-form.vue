<template>
	<div class="login-form"><!--login form-->
		<h2>Login to your account</h2>
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
			
            <button type="submit" class="btn btn-block btn-primary mt-1">
                <span class="text-uppercase">Login</span>
            </button>

	        <div class="form-group">
	            <a class="float-right" href="/password/reset" @click.prevent="toForgotPage">
	                Forgot your password?
	            </a>
	            <div class="clearfix"></div>
	        </div>
		</form>
	</div><!--/login form-->
</template>
<script>
import { mapActions } from 'vuex'

	export default {
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
			...mapActions('auth', ['login']),
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
                    let that = this;
                    setTimeout(function() {
	                    that.$router.push('/')
                    }, 1000)

                })
                .catch((e) => {
                    if (e.errors) {
                    	for (let index in e.errors) {
                            this.errors.add(index, e.errors[index][0])
                    	}
                    }
                })

                // .catch(( response ) => {
                // 	console.log('catch login failed')
                // 	console.log('response: ', response)
                //     this.authenticationError = response.status === 401
                //         ? response.data.message
                //         : 'Sorry, something went wrong.'
                // })
            },

            toForgotPage () {
                this.$root.$emit('auth-popup-close')
                this.$router.push('/password/reset')
            },
		}
	}
</script>