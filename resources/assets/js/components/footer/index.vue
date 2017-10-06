<template>
	<footer id="footer">
		<footer-top></footer-top>
		<footer-widget></footer-widget>
		<footer-bottom></footer-bottom>
	</footer>
</template>

<script>
	import FooterTop from './footer-top'
	import FooterWidget from './footer-widget'
	import FooterBottom from './footer-bottom'

	export default {
		components: {
			FooterTop,
			FooterWidget,
			FooterBottom,
		}
	}
</script>