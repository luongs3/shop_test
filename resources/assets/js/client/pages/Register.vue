<template>
	<div id="Register">
        <div class="row">
			<div class="col-sm-4 col-sm-offset-3">
				<register-form />
			</div>
        </div>
	</div>
</template>

<script>
import RegisterForm from 'comps/auth/register-form';

export default {
    components: {
        RegisterForm,
    },
}
</script>

<style>
</style>

