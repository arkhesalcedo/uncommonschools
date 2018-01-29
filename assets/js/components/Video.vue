<template>
	<transition name="slide-fade">
		<section id="ucs-video" class="section">
			<div class="container" v-scroll-reveal="{ delay: 250, viewFactor: 0.2 }">
				<div class="columns videoContainer">
					<div class="column">
						<transition name="custom-fade" mode="out-in" appear>
							<div class="slider" v-for="(video, index) in videos" :key="index" v-if="isActive == index">
								<img :src="video.acf.image">

								<div class="overlay"></div>

								<div class="details">
									<div>
										<span>{{ video.acf.subtitle }}</span>
										<h4 class="time">{{ video.acf.time }}</h4>
										<h4>{{ video.acf.title }}</h4>
										<p>{{ video.acf.description }}</p>

										<a href="" @click.prevent="playVideo(index)" class="customButton">Play Clip <img :src="playClipImage" alt="Read More"></a>
</a>
									</div>
								</div>
							</div>
						</transition>
					</div>
				</div>

				<div class="columns videoContainer videoNavBar is-mobile">
					<div class="column" v-for="(video, index) in videos">
						<a href="" @click.prevent="isActive = index" :class="[isActive == index ? 'activeBar' : '']"><span></span>{{ video.acf.time }}</a>
					</div>
				</div>
			</div>

			<transition name="fade">
				<div class="modal" :class="{ 'is-active' : selectedVideo }" v-if="selectedVideo">
					<div class="modal-background"></div>
				  	
				  	<div class="modal-content">
				    	<iframe width="100%" height="100%" :src="['https://youtube.com/embed/' + selectedVideo]" allowfullscreen></iframe>
				  	</div>
				  	
				  	<button class="modal-close is-large" aria-label="close" @click="selectedVideo = false"></button>
				</div>
			</transition>	
		</section>
	</transition>
</template>

<style lang="scss" scoped>
	#ucs-video {
		.modal-content {
			width: 90%;
			height: 90%;
			max-width: auto;
			overflow: hidden;
		}

		.videoContainer {
			max-width: 1060px;
			margin: 0 auto;

			&.videoNavBar {
				a {
					border-top: 3px solid #919191;
					font-family: 'KnockoutLite';
					font-size: 20px;
					color: #919191;
					letter-spacing: 1px;
					display: block;
					line-height: 200%;
					position: relative;

					span {
						width: 50%;
						height: 0px;
						background: #333743;
						display: inline-block;
						position: absolute;
						top: -3px;
						opacity: 0;
						transition: height 0.2s, opacity 0.2s;
					}

					&:hover, &.activeBar {
						color: #333743;
						border-top: 3px solid #333743;

						span {
							height: 6px;
							opacity: 1;
						}
					}

					@media only screen and (max-width : 768px) {
						font-size: 10px;
					}
				}
			}

			.customButton {
				&:hover {
					img {
						margin-left: 40px;
					}
				}
			}

			.slider {
				position: relative;

				.details {
					position: absolute;
					top: 0px;
					right: 0px;
					height: 100%;
					width: 50%;
					display: flex;
					align-items: center;
  					justify-content: center;
  					transition: top 0.3s;

  					div {
  						padding: 0px 20%;

  						span {
  							font-family: 'KnockoutLite';
							font-size: 20px;
							color: #FFDD00;
							letter-spacing: 1px;
							margin-bottom: 20px;
							text-transform: uppercase;
						}

  						h4 {
  							font-family: 'KnockoutLite';
							font-size: 30px;
							color: #FFFFFF;
							letter-spacing: 0.5px;
							line-height: 100%;
							margin-bottom: 10px;
  						}

  						h4.time {
  							font-family: 'KnockoutFull';
							font-size: 100px;
							color: #FFFFFF;
							letter-spacing: 0;
  						}

  						p {
  							font-family: 'ITC Franklin Gothic MdCd';
							font-size: 20px;
							color: #FFFFFF;
							letter-spacing: 0.25px;
							line-height: 120%;
							margin-bottom: 10px;
  						}

  						a {
  							img {
  								opacity: 1;
  								transition: opacity 0.3s ease-in 0.2s, margin-left 0.3s;
  								max-width: 230px;
  							}
  						}
  					}

  					@media only screen and (max-width : 1215px) {
						width: 100%;
					}

  					@media only screen and (max-width : 768px) {
						width: 100%;
						position: relative;
						background: #333743;

						div {
							padding: 20px;

							h4.time {
								font-size: 30px;
	  						}
						}
					}
				}

				&.custom-fade-enter {
					.details {
						top: -20px;

						a {
							img {
								opacity: 0;
							}
						}
					}
				}
			}

			.overlay {
				position: absolute;
				top: 0px;
				left: 0px;
				width: 100%;
				height: 100%;
				background-image: linear-gradient(90deg, rgba(0,0,0,0.0) 30%, rgba(0,0,0,0.5) 92%);

				@media only screen and (max-width : 768px) {
					display: none;
				}
			}
		}
	}
</style>

<script>
	export default {
		props: {
			playClipImage: null
		},

		data() {
			return {
				loaded: false,
				isActive: 0,
				videoCount: 4,
				selectedVideo: null,
				videos: null
			}
		},

		methods: {
			playVideo(index) {
				this.selectedVideo = this.videos[index].acf.youtube_id;
			}
		},

		mounted() {
			axios.get('/wp-json/acf/v3/ucs-videos?per_page=' + this.videoCount).then((response) => {
		  		this.videos = response.data;

		  		this.loaded = true;
		  	}).catch((error) => {
				console.log(error);
		  	});
		}
	}
</script>