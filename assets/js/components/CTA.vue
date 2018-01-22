<template>
	<transition name="slide-fade">
		<section id="ucs-cta" class="section"  v-if="loaded">
			<div class="container">
				<div class="columns">
					<div class="column">
						<img :src="banner" class="ctaBanner">

						<div class="cta">
							<h4>{{ title }}</h4>

							<a href=""><img :src="learnMoreImage"></a>
						</div>
					</div>
				</div>
			</div>
		</section>
	</transition>
</template>

<style lang="scss" scoped>
	#ucs-cta {
		&.section {
			padding: 15rem 1.5rem;
		}

		.column {
			position: relative;

			.ctaBanner {
				position: absolute;
				top: -50%;
				left: -110px;
				z-index: -1;
			}
		}

		.cta {
			border-top: 1px solid #FFDD00;
			background: rgba(51, 55, 67, 0.75);
			padding: 30px 40px;

			h4 {
				color: #FFF;
				font-size: 64px;
				line-height: 100%;
				letter-spacing: 1px;
				font-family: 'KnockoutFull';
				margin-bottom: 34px;
			}
		}

		@media only screen and (max-width : 768px) {
			&.section {
				padding: 3rem 1.5rem;
			}

			.column {
				.ctaBanner {
					position: initial;
				}
			}

			.cta {
				h4 {
					font-size: 40px;
				}
			}
		}
	}
</style>

<script>
	export default {
		props: {
			page: null,
			learnMoreImage: null
		},

		data() {
			return {
				loaded: false,
				title: null,
				banner: null,
				link: null
			}
		},

		mounted() {
			axios.get('/wp-json/acf/v3/pages/' + this.page).then((response) => {
		  		let data = response.data;

		  		this.loaded = true;

		  		this.title = data.acf.cta_title;

		  		this.banner = data.acf.cta_banner;

		  		this.link = data.acf.cta_link;

		  	}).catch((error) => {
				console.log(error);
		  	});

			this.loaded = true;
		}
	}
</script>