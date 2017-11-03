<template>
	<div class="header-middle"><!--header-middle-->
		<div class="container">
			<div class="row">
				<div class="col-sm-4">
					<div class="logo pull-left">
						<router-link to="/"><img src="images/home/logo.png" alt="Main Page" /></router-link>
					</div>
				</div>
				<div class="col-sm-8">
					<div class="shop-menu pull-right">
						<ul class="nav navbar-nav">
							<li><a href="#"><i class="fa fa-user"></i> Account</a></li>
							<li><a href="#"><i class="fa fa-star"></i> Wishlist</a></li>
							<li><a href="checkout.html"><i class="fa fa-crosshairs"></i> Checkout</a></li>
							<li><a href="cart.html"><i class="fa fa-shopping-cart"></i> Cart</a></li>
							<li v-if="!user">
								<a href="#" id="show-modal" @click="showLoginModal = true"><i class="fa fa-lock"></i>Login</a>
								<!-- <router-link :to="{name: 'login'}"><i class="fa fa-lock"></i> Login</router-link> -->
							</li>
							<li v-if="!user"><router-link :to="{name: 'register'}"><i class="fa fa-lock"></i> Register</router-link></li>
							<li v-if="user"><a href="#" @click="logout"><i class="fa fa-lock"></i>Logout</a></li>
							<li v-if="user"><a href="#">{{ user.name }}</a></li>
						</ul>
					</div>
				</div>
			</div>
		</div>
		 <login-modal v-if="showLoginModal" @close="showLoginModal = false" :showLoginModal="showLoginModal" />
	</div><!--/header-middle-->
</template>

<script>
import { mapState, mapGetters, mapActions } from 'vuex'
import { logout } from 'api/auth'
import LoginModal from 'comps/auth/login-form'

    export default {
    	data() {
    		return {
    			showLoginModal: false,
    		}
    	},
    	components: {
    		LoginModal
    	},
    	computed: {
    		...mapState('auth', ['user']),
    	},
    	methods: {
            logout () {
                logout().then(() => {
                    window.location.reload()
                })
            },
    	}
    }
</script>
