<template>
	<transition name="slide-fade">
		<section id="ucs-3-blocks-across" class="section">
			<div class="container" v-scroll-reveal="{ delay: 250, viewFactor: 0.2 }">
				<div class="columns">
					<div class="column">
						<p class="has-text-centered">{{ subtitle }}</p>
						<h2 class="has-text-centered">{{ title }}</h2>
					</div>
				</div>

				<div class="columns acrossBlocksContainer">
					<div class="column" v-for="(service, index) in services">
						<div class="acrossContainer">
							<img :src="service.acf.image" :alt="service.acf.title">

							<div class="details">
								<h4>{{ service.acf.title }}</h4>
								<p>{{ service.acf.description | trimmed }}</p>
								<a href=""><img :src="imageLink"></a>
							</div>
						</div>
					</div>
				</div>
			</div>
		</section>
	</transition>
</template>

<style lang="scss" scoped>
	#ucs-3-blocks-across {
		p {
			color: #919191;
			font-size: 20px;
			font-family: 'KnockoutLite';
			letter-spacing: 1px;
			line-height: 22px;
			margin-bottom: 20px;
		}

		h2 {
			color: #333743;
			font-size: 86px;
			line-height: 90px;
			letter-spacing: 1px;
			font-family: 'KnockoutFull';
			margin-bottom: 71px;

			@media only screen and (max-width : 768px) {
				font-size: 60px;
				line-height: 100%;
				margin-bottom: 0px;
			}
		}

		img {
			display: inline-block;
			box-shadow: none;
			position: relative;
			bottom: 0px;
			transition: box-shadow 0.5s ease-out, bottom 0.3s;
			width: 100%;
		}

		.details {
			position: absolute;
			width: 100%;
			border-top: 3px solid #FFDD00;
			background: rgba(51, 55, 67, 0.75);
			color: #FFF;
			padding: 22px;
			height: 120px;
			overflow: hidden;
			bottom: 23px;
    		right: -17px;
    		transition: height 0.3s, bottom 0.3s;

    		@media only screen and (max-width : 768px) {
				bottom: 6px;
    			right: 0px;
			}

			h4 {
				font-family: 'KnockoutFull';
				font-size: 42px;
				line-height: 100%;
				margin-bottom: 15px;
			}

			p, a {
				opacity: 0;
				color: #FFF;
				font-size: 20px;
				line-height: 26px;
				letter-spacing: 0.25px;
				font-family: 'ITC Franklin Gothic MdCd';
				transition: opacity 0.3s ease;
			}

			a {
				position: absolute;
				bottom: 20px;
				right: 20px;
						
				img {
					width: auto;
				}
			}
		}

		.acrossBlocksContainer {
			max-width: 1060px;
			margin: 0 auto;
		}

		.acrossContainer {
			position: relative;

			&:hover {
				.details {
					height: 240px;

					p {
						opacity: 1;
						transition-delay: 0.2s;
					}

					a {
						opacity: 1;
						transition-delay: 0.3s;
					}

					img {
						box-shadow: none;
					}

					@media only screen and (max-width : 768px) {
						bottom: 11px;
					}
				}

				img {
					box-shadow: 6px 8px 8px 0 rgba(0,0,0,0.50), inset 0 1px 3px 0 rgba(0,0,0,0.50);
					bottom: 5px;
				}
			}
		}
	}
</style>

<script>
	export default {
		props: {
			page: null,
			imageLink: null
		},

		filters: {
			trimmed(string) {
				return string.substring(0, 70) + '...';
			}
		},

		data() {
			return {
				loaded: false,
				subtitle: null,
				title: null,
				services: null
			}
		},

		mounted() {
			axios.get('/wp-json/acf/v3/pages/' + this.page).then((response) => {
		  		let data = response.data;

		  		this.subtitle = data.acf.subtitle;

		  		this.title = data.acf.title;
		  	}).catch((error) => {
				console.log(error);
		  	});

		  	axios.get('/wp-json/acf/v3/ucs-services?per_page=3&order=asc').then((response) => {
		  		this.services = response.data;

		  		this.loaded = true;
		  	}).catch((error) => {
				console.log(error);
		  	});
		}
	}
</script>