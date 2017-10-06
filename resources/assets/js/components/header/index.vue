<template>
    <!--header_top-->
	<div id="header">
        <header-top></header-top>
        <header-middle></header-middle>
        <header-bottom></header-bottom>
	</div>
    <!--/header_top-->
</template>

<script>
    import HeaderTop from 'comps/header/header-top'
    import HeaderMiddle from 'comps/header/header-middle'
    import HeaderBottom from 'comps/header/header-bottom'

    export default {
        components: {
            HeaderTop,
            HeaderMiddle,
            HeaderBottom,
        }
    }
</script>
