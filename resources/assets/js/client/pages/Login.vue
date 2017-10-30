<template>
	<div id="login">
        <div class="row">
			<div class="col-sm-4 col-sm-offset-3">
				<login-form />
			</div>
        </div>
	</div>
</template>

<script>
import LoginForm from 'comps/auth/login-form';

export default {
    components: {
        LoginForm,
    },
}
</script>

<style>
</style>

