<template>
    <div class="pagination-wrapper">
        <ul class="pagination" v-if="hasPages">
        	<!-- previous item -->
            <li v-if="currentPage == 1" class="page-item">
                <a class="disabled"><i aria-hidden="true" class="fa fa-angle-left"></i></a>
            </li>
            <li v-else class="page-item" >
                <router-link :to="to(currentPage - 1)" rel="prev" exact>
                    <i aria-hidden="true" class="fa fa-angle-left"></i>
                </router-link>
            </li>

    		<!-- numbers -->
            <li v-for="link in this.pages">
                <router-link
                    v-if="link !== '...'"
                    :to="to(link)"
                    active-class="active" exact
                >
                    {{ link }}
                </router-link>
                <a v-else class="disabled">...</a>
            </li>

    		<!-- next item -->
            <li v-if="currentPage == lastPage" class="page-item">
                <a class="disabled"><i aria-hidden="true" class="fa fa-angle-right"></i></a>
            </li>
            <li v-else class="page-item">
                <router-link :to="to(currentPage + 1)" rel="next" exact><i aria-hidden="true" class="fa fa-angle-right"></i></router-link>
            </li>
        </ul>
    </div>
</template>

<script>
    import _ from 'lodash'

    export default {

        props: {
            path: String,
            query: Object,
            currentPage: {
                type: Number,
                default: 1
            },
            lastPage: {
                type: Number,
                default: 1
            },
            onEachSide: {
                type: Number,
                default: 3,
            },
            queryParam: {
                type: String,
                default: 'page'
            }
        },

        computed: {
            pages () {
                let window = this.get(this.onEachSide)
                return _.flatten(_.filter([
                    window['first'],
                    _.isArrayLike(window['slider']) ? ['...'] : null,
                    window['slider'],
                    _.isArrayLike(window['last']) ? ['...'] : null,
                    window['last'],
                ], (item) => item !== null))
            },
            hasPages () {
                return this.lastPage > 1
            }
        },

        methods: {
            to (page) {
                const path = this.path || this.$route.path

                const otherParams = _.omit(this.query || this.$route.query, [this.queryParam])
                const query = page !== 1
                    ? _.assign({}, otherParams, { [this.queryParam]: page })
                    : otherParams

                return { path, query }
            },

            get (onEachSide = 3) {
                if (this.lastPage < (onEachSide * 2) + 6) {
                    return this.getSmallSlider()
                }

                return this.getUrlSlider(onEachSide)
            },

            getSmallSlider () {
                return {
                    'first': _.range(1, this.lastPage + 1),
                    'slider': null,
                    'last': null,
                }
            },

            getUrlSlider (onEachSide) {
                let window = onEachSide * 2

                if (!this.hasPages) {
                    return {'first': null, 'slider': null, 'last': null}
                }

                // If the current page is very close to the beginning of the page range, we will
                // just render the beginning of the page range, followed by the last 2 of the
                // links in this list, since we will not have room to create a full slider.
                if (this.currentPage <= window) {
                    return this.getSliderTooCloseToBeginning(window)
                } // eslint-disable-line brace-style

                // If the current page is close to the ending of the page range we will just get
                // this first couple pages, followed by a larger window of these ending pages
                // since we're too close to the end of the list to create a full on slider.
                else if (this.currentPage > (this.lastPage - window)) {
                    return this.getSliderTooCloseToEnding(window)
                }

                // If we have enough room on both sides of the current page to build a slider we
                // will surround it with both the beginning and ending caps, with this window
                // of pages in the middle providing a Google style sliding paginator setup.
                return this.getFullSlider(onEachSide)
            },

            getSliderTooCloseToBeginning (window) {
                return {
                    'first': _.range(1, window + 3),
                    'slider': null,
                    'last': this.getFinish(),
                }
            },

            getSliderTooCloseToEnding (window) {
                return {
                    'first': this.getStart(),
                    'slider': null,
                    'last': _.range(this.lastPage - (window + 2), this.lastPage + 1),
                }
            },

            getFullSlider (onEachSide) {
                return {
                    'first': this.getStart(),
                    'slider': this.getAdjacentUrlRange(onEachSide),
                    'last': this.getFinish(),
                }
            },

            getAdjacentUrlRange (onEachSide) {
                return _.range(this.currentPage - onEachSide, this.currentPage + onEachSide + 1)
            },

            getStart () {
                return [1, 2]
            },

            getFinish () {
                return [this.lastPage - 1, this.lastPage]
            },
        },

        // mounted() {
        //     console.log('this.pages', this.pages);
        // },
    }
</script>

<style>
.pagination-wrapper {
    width: 100%;
    text-align: center;
}
</style>
