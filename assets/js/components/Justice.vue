<template>
	<transition name="slide-fade">
		<section id="ucs-justice" class="section" v-scroll-reveal="{ delay: 250, viewFactor: 0.2 }">
			<div class="container">
				<div class="columns justiceContainer">
					<div class="column">
						<transition name="custom-fade" mode="out-in" appear>
							<div class="slider" v-for="(justice, index) in justices" :key="index" v-if="isActive == index">
								<img :src="justice.acf.banner">

								<div class="details">
									<span>{{ justice.acf.subtitle }}</span>
									<h4>{{ justice.acf.title }}</h4>
									<p>{{ justice.acf.description }}</p>
									<a href="">{{ justice.acf.link_text }} <img :src="imageLink"></a>
								</div>
							</div>
						</transition>

						<div class="slideNav">
							<a href="" @click.prevent="isActive = index" v-for="(justice, index) in justices"><img :src="[ isActive == index ? circleImageAlt : circleImage ]"></a>
						</div>
					</div>
				</div>
			</div>
		</section>
	</transition>
</template>

<style lang="scss" scoped>
	#ucs-justice {
		padding: 7rem 1.5rem;

		@media only screen and (max-width : 768px) {
			padding: 3rem 1.5rem;
		}

		.justiceContainer {
			max-width: 1060px;
			margin: 0 auto;
			position: relative;

			.slideNav {
				position: absolute;
				top: 11px;
				right: 10%;
				width: 16px;
				z-index: 2;

				@media only screen and (max-width : 1215px) {
					width: 100%;
					top: -30px;
					right: 0px;
					text-align: center;

					a {
						margin: 0px 3px;
					}
				}

				a {
					margin-bottom: 1px;
					display: inline-block;

					img {
						@media only screen and (max-width : 1215px) {
							height: 20px;
						}
					}
				}
			}

			.slider {
				&.custom-fade-enter {
					.details {
						bottom: 30px;
					}

					img {
						max-width: 100%;
					}
				}

				position: relative;
				z-index: 1;

				img {
					max-width: 83%;
					transition: max-width 0.3s;

					@media only screen and (max-width : 1215px) {
						max-width: 100%;
					}
				}

				.details {
					position: absolute;
					bottom: -10%;
					width: 430px;
					right: 0px;
					border-top: 3px solid #FFDD00;
					background: rgba(51, 55, 67, 0.75);
					color: #FFF;
					padding: 40px;
					overflow: hidden;
					transition: bottom 0.3s;

					@media only screen and (max-width : 1215px) {
						position: relative;
						width: 100%;
					}

					span {
						font-family: 'KnockoutLite';
						font-size: 20px;
						color: #FFDD00;
						letter-spacing: 1px;
						margin-bottom: 16px;

						@media only screen and (max-width : 768px) {
							font-size: 15px;
						}
					}

					h4 {
						font-family: 'KnockoutFull';
						font-size: 64px;
						color: #FFFFFF;
						letter-spacing: 1px;
						line-height: 100%;
						margin-bottom: 18px;

						@media only screen and (max-width : 768px) {
							font-size: 30px;
						}
					}

					p {
						font-family: 'ITC Franklin Gothic MdCd';
						font-size: 20px;
						color: #FFFFFF;
						letter-spacing: 0.25px;
						line-height: 120%;
						margin-bottom: 20px;

						@media only screen and (max-width : 768px) {
							font-size: 20px;
						}
					}

					a {
						font-family: 'KnockoutLite';
						font-size: 30px;
						color: #FFFFFF;
						letter-spacing: 1.25px;

						@media only screen and (max-width : 768px) {
							font-size: 25px;
						}

						img {
							display: inline-block;
							width: auto;
							transition: margin-left 0.3s;
							margin-left: 0px;
						}

						&:hover {
							img {
								margin-left: 10px;
							}
						}
					}
				}
			}
		}
	}
</style>

<script>
	export default {
		props: {
			imageLink: null,
			circleImage: null,
			circleImageAlt: null
		},

		data() {
			return {
				loaded: false,
				justices: null,
				sliderCount: 4,
				isActive: 0
			}
		},

		mounted() {
			axios.get('/wp-json/acf/v3/ucs-social-justices?per_page=' + this.sliderCount).then((response) => {
		  		this.justices = response.data;

		  		this.loaded = true;
		  	}).catch((error) => {
				console.log(error);
		  	});
		}
	}
</script>