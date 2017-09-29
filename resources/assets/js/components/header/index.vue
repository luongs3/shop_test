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
    import HeaderTop from 'comps/header/HeaderTop';
    import HeaderMiddle from 'comps/header/HeaderMiddle';
    import HeaderBottom from 'comps/header/HeaderBottom';

    export default {
        components: {
            HeaderTop,
            HeaderMiddle,
            HeaderBottom,
        }
    }
</script>
