<template>
	<transition name="slide-fade">
		<section id="ucs-social" class="section" v-scroll-reveal="{ delay: 250, viewFactor: 0.2 }">
			<div class="container">
				<div class="columns">
					<div class="column">
						<p class="has-text-centered">{{ subtitle }}</p>
						<h2 class="has-text-centered">{{ title }}</h2>
					</div>
				</div>

				<div class="columns socialFeeds is-multiline">
					<div class="column is-4" v-for="feed in feeds">
						<div class="socialFeedsBox">
							<img :src="feed.image">
							<div class="socialFeedsContent">
								<span v-text="feed.date" class="date"></span>
								<a :href="feed.link" target="_blank" class="link"><i class="fab fa-twitter"></i></a>
								<p v-text="feed.description"></p>

								<p class="feedStats">
									<span class="commentsCount">{{ generateRandomNumber() }} <i class="fas fa-comment-alt"></i></span>
									<span class="sharesCount">{{ generateRandomNumber() }} <i class="fas fa-retweet"></i></span>
									<span class="lovesCount">{{ generateRandomNumber() }} <i class="fas fa-heart"></i></span>
								</p>
							</div>
						</div>
					</div>
				</div>

				<div class="columns">
					<div class="column has-text-centered">
						<a href="" class="customButton">Load More <img :src="loadMoreImage" alt="Load More"></a>
</a>
					</div>
				</div>
			</div>
		</section>
	</transition>
</template>

<style lang="scss" scoped>
	#ucs-social {
		background: linear-gradient(to bottom, #FFF 0%, #FFF 65%, #E6EDEE 65%, #E6EDEE 100%);
		padding-top: 300px;

		.customButton {
			margin: 100px auto;
			display: inline-block;
			color: #000;

			@media only screen and (max-width : 768px) {
				margin: 40px auto 0px;
			}
		}

		.columns {
			.column {
				p {
					font-size: 20px;
					color: #919191;
					text-transform: uppercase;
					font-family: 'KnockoutLite';
					line-height: 110%;
					letter-spacing: 1px;
					margin-bottom: 15px;
				}

				h2 {
					font-size: 86px;
					line-height: 110%;
					color: #333743;
					font-family: 'KnockoutFull';
					letter-spacing: 1px;
					margin-bottom: 60px;

					@media only screen and (max-width : 768px) {
						font-size: 60px;
						line-height: 100%;
						margin-bottom: 0px;
					}
				}
			}

			&.socialFeeds {
				max-width: 1060px;
				margin: 0 auto;

				.column {
					.socialFeedsBox {
						position: relative;

						.socialFeedsContent {
							position: absolute;
							background: rgba(51,55,67,0.75);
							box-shadow: 0 2px 4px 0 rgba(0,0,0,0.50);
							width: 100%;
							height: 0;
							top: 0px;
							left: 0px;
							opacity: 0;
							overflow: hidden;
							border-top: 3px solid #FFDD00;
							transition: height 0.3s, opacity 0.3s;

							span.date, a.link{
								position: absolute;
								top: 6.67%;
							}

							span.date {
								left: 6.67%;
								font-family: 'KnockoutLite';
								font-size: 20px;
								color: #FFDD00;
								letter-spacing: 1px;
								text-transform: uppercase;
								line-height: 110%;
							}

							a.link {
								right: 6.67%;
								color: #FFDD00;
								font-size: 20px;
								line-height: 110%;
							}

							p.feedStats {
								position: absolute;
								bottom: 6.67%;
								left: 6.67%;

								span {
									font-family: 'KnockoutLite';
									font-size: 18px;
									color: #FFFFFF;
									letter-spacing: 0.75px;
									margin-right: 20px;
									opacity: 0;

									&.commentsCount {
										transition: opacity 0.3s ease-out 0.2s;
									}

									&.sharesCount {
										transition: opacity 0.3s ease-out 0.3s;
									}

									&.lovesCount {
										transition: opacity 0.3s ease-out 0.4s;
									}
								}
							}

							p {
								position: absolute;
								bottom: 20%;
								left: 6.67%;
								width: 86.67%;
								text-transform: none;
								font-family: 'ITC Franklin Gothic MdCd';
								font-size: 20px;
								color: #FFFFFF;
								letter-spacing: 0.25px;
								line-height: 26px;
							}
						}

						img {
							transform: none;
							box-shadow: none;
							width:  100%;
							transition: transform 0.3s ease-out, box-shadow 0.3s ease-out;
						}

						&:hover {
							img {
								transform: scale(1.1);
								box-shadow: 4px 6px 6px 0 rgba(0,0,0,0.50), inset 0 1px 3px 0 rgba(0,0,0,0.50);

								@media only screen and (max-width : 768px) {
									transform: scale(1.05);
								}
							}

							.socialFeedsContent {
								height: 100%;
								opacity: 1;

								.commentsCount, .sharesCount, .lovesCount {
									opacity: 1;
								}
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
			page: null,
			loadMoreImage: null
		},

		data() {
			return {
				loaded: false,
				title: null,
				subtitle: null,
				feeds: [
					{
						date: 'August 13',
						link: 'https://instagram.com',
						image: '/wp-content/themes/uncommonschools/assets/images/social1.png',
						description: 'A normal caption from any social post goes here, it’s long and maybe even two lines. #hashtag #lovemyjob #uncommonstudents',
						comments: 0,
						shares: 0,
						love: 0
					},
					{
						date: 'August 13',
						link: 'https://instagram.com',
						image: '/wp-content/themes/uncommonschools/assets/images/social2.png',
						description: 'A normal caption from any social post goes here, it’s long and maybe even two lines. #hashtag #lovemyjob #uncommonstudents',
						comments: 0,
						shares: 0,
						love: 0
					},
					{
						date: 'August 13',
						link: 'https://instagram.com',
						image: '/wp-content/themes/uncommonschools/assets/images/social3.png',
						description: 'A normal caption from any social post goes here, it’s long and maybe even two lines. #hashtag #lovemyjob #uncommonstudents',
						comments: 0,
						shares: 0,
						love: 0
					},
					{
						date: 'August 13',
						link: 'https://instagram.com',
						image: '/wp-content/themes/uncommonschools/assets/images/social4.png',
						description: 'A normal caption from any social post goes here, it’s long and maybe even two lines. #hashtag #lovemyjob #uncommonstudents',
						comments: 0,
						shares: 0,
						love: 0
					},
					{
						date: 'August 13',
						link: 'https://instagram.com',
						image: '/wp-content/themes/uncommonschools/assets/images/social5.png',
						description: 'A normal caption from any social post goes here, it’s long and maybe even two lines. #hashtag #lovemyjob #uncommonstudents',
						comments: 0,
						shares: 0,
						love: 0
					},
					{
						date: 'August 13',
						link: 'https://instagram.com',
						image: '/wp-content/themes/uncommonschools/assets/images/social6.png',
						description: 'A normal caption from any social post goes here, it’s long and maybe even two lines. #hashtag #lovemyjob #uncommonstudents',
						comments: 0,
						shares: 0,
						love: 0
					}
				]
			}
		},

		methods: {
			generateRandomNumber() {
				return Math.floor(Math.random() * 20);
			}
		},

		mounted() {
			axios.get('/wp-json/acf/v3/pages/' + this.page).then((response) => {
		  		let data = response.data;

		  		this.subtitle = data.acf.social_subtitle;

		  		this.title = data.acf.social_title;

		  		this.loaded = true;
		  	}).catch((error) => {
				console.log(error);
		  	});
		}
	}
</script>