<template>
	<div class="login-form"><!--login form-->
		<h2>Register account</h2>
	    <span class="form-control-feedback" v-show="registrationError">
	        {{ registrationError }}
	    </span>

        <form class="form-horizontal mt-2" role="form" @submit.prevent="validateBeforeSubmit()">
            <div :class="{ 'control': true }">
                <input
                    v-validate="'max:50'"
                    type="text"
                    name="name"
	                :class="{'input': true, 'is-danger': errors.has('name') }"
                    class="form-control"
                    v-model.trim="form.name"
                    placeholder="Name"
                />
                <span v-show="errors.has('name')" class="help is-danger">{{ errors.first('name') }}</span>
            </div>            

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

            <div :class="{ 'control': true }">
                <input
                    v-validate="'required'"
                    type="password"
                    name="password_confirmation"
                    :class="{'input': true, 'is-danger': errors.has('password_confirmation') }"
                    class="form-control"
                    placeholder="Password Confirmation"
                    v-model.trim="form.password_confirmation"
                />
                <span v-show="errors.has('password_confirmation')" class="help is-danger">
                {{ errors.first('password_confirmation') }}</span>
                
            </div>

            <button type="submit" class="btn btn-block btn-primary mt-1">
                <span class="text-uppercase">Sign Up</span>
            </button>
        </form>
	</div>
</template>
<script>
import { mapActions } from 'vuex'

	export default {
		data () {
            return {
                form: {
        	        name: '',
			        email: '',
			        password: '',
			        password_confirmation: '',
                },
                registrationError: null,
            }
        },

        methods: {
            ...mapActions('auth', ['register']),
            validateBeforeSubmit () {
                if (this.form.password !== this.form.password_confirmation) { // Because confirmed rule does not work.
                    this.errors.add('password_confirmation', 'The password confirmation does not match.')
                    return
                }

                this.$validator.validateAll().then((result) => {
                    if (result) {
                        this.handleRegisteringProcess()
                    }
                }).catch(() => {})
            },

            handleRegisteringProcess () {
                this.form.errors = []
                this.register(this.form)
                    .then(( response ) => {
                        this.registrationError = null
                        let that = this;
                        setTimeout(function() {
                            this.$router.push('/')
                        }, 1000)
                    })
                    .catch((e) => {
                        if (e.errors) {
                        	for (let index in e.errors) {
	                            this.errors.add(index, e.errors[index][0])
                        	}
                        }
                    })
			},
        },
        mounted() {
            // console.log('this.register: ', this.register)
        }
	}
</script>