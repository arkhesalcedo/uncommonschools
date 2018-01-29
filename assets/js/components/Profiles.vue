<template>
	<transition name="slide-fade">
		<div id="ucs-profiles" v-scroll-reveal="{ delay: 250, viewFactor: 0.2 }">
			<section class="section">
				<div class="container">
					<div class="columns profileContainer">
						<div class="column is-5">
							<p class="caption">{{ subtitle }}</p>
							<h2>{{ title }}</h2>
							<p class="description">{{ description }}</p>
						</div>

						<div class="column">
							<div class="columns is-gapless is-multiline studentsBlock">
								<div class="column is-6" v-for="(profile, index) in profiles" :id="['profile_' + (index + 1)]">
									<img :src="profile.acf.picture">

									<div class="details">
										<span>{{ profile.acf.school_name }}</span>
										<h4>{{ profile.acf.first_name }} {{ profile.acf.last_name }}</h4>
										<p>{{ profile.acf.profile | trimmed }}</p>
										<a href="" @click.prevent="showProfile(index)"><img :src="imageLink"></a>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</section>

			<div class="modal" :class="{ 'is-active' : isActive }" v-if="selectedProfile">
				<div class="modal-background"></div>
			  	
			  	<div class="modal-content">
			    	<div class="section">
			    		<div class="columns">
			    			<div class="column">
			    				<figure class="image is-square">
									<img :src="selectedProfile.acf.picture">
								</figure>
			    			</div>
			    			<div class="column">
			    				<span>{{ selectedProfile.acf.school_name }}</span>
								<h4>{{ selectedProfile.acf.first_name }} {{ selectedProfile.acf.last_name }}</h4>
								<p>{{ selectedProfile.acf.profile }}</p>
			    			</div>
			    		</div>
			    	</div>
			  	</div>
			  	
			  	<button class="modal-close is-large" aria-label="close" @click="isActive = false"></button>
			</div>
		</div>
	</transition>
</template>

<style lang="scss" scoped>
	#ucs-profiles {
		background: #333743;
		padding-top: 200px;
		z-index: 1;
    	position: relative;

		@media only screen and (max-width : 768px) {
			padding-top: 0px;
		}

		.modal {
			.modal-content {
				width: 1060px;
			}

			span {
				display: block;
				font-family: 'KnockoutLite';
				font-size: 16px;
				color: #FFDD00;
				letter-spacing: 0.5px;
				line-height: 120%;
				text-transform: uppercase;
				margin-bottom: 10px;
			}

			h4 {
				font-family: 'KnockoutLite';
				font-size: 30px;
				color: #FFFFFF;
				letter-spacing: 0.5px;
				line-height: 100%;
				margin-bottom: 10px;
			}

			p {
				color: #FFF;
				font-size: 20px;
				line-height: 26px;
				letter-spacing: 0.25px;
				font-family: 'ITC Franklin Gothic MdCd';
			}
		}

		.profileContainer {
			max-width: 1060px;
			margin: 0 auto;
		}

		.studentsBlock {
			margin-bottom: -200px;

			.column {
				position: relative;

				@media only screen and (max-width : 768px) {
					margin-bottom: 20px;
				}

				.details {
					position: absolute;
					bottom: 10%;
					width: 80%;
					left: 10%;
					border-top: 3px solid #FFDD00;
					background: rgba(51, 55, 67, 0.75);
					color: #FFF;
					padding: 22px;
					height: 100px;
					overflow: hidden;
					transition: height 0.3s, bottom 0.3s;

					span {
						display: block;
						font-family: 'KnockoutLite';
						font-size: 16px;
						color: #FFDD00;
						letter-spacing: 0.5px;
						line-height: 120%;
						text-transform: uppercase;
					}

					h4 {
						font-family: 'KnockoutLite';
						font-size: 30px;
						color: #FFFFFF;
						letter-spacing: 0.5px;
						line-height: 100%;
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
							box-shadow: none;
							width: auto;
						}
					}
				}

				img {
					transform: none;
					transition: transform 0.3s;
					box-shadow: 6px 8px 8px 0 rgba(0,0,0,0.50);
					width: 100%;

					@media only screen and (max-width : 768px) {
						transform-origin: center center !important;
					}
				}

				&#profile_1 {
					img {
						transform-origin: bottom right;
					}
				}

				&#profile_2 {
					img {
						transform-origin: bottom left;
					}
				}

				&#profile_3 {
					img {
						transform-origin: top right;
					}
				}

				&#profile_4 {
					img {
						transform-origin: top left;
					}
				}

				&:hover {
					.details {
						height: 240px;

						p {
							opacity: 1;
							transition-delay: 0.2s;
						}

						h4 {
							margin-bottom: 15px;
						}

						a {
							opacity: 1;
							transition-delay: 0.3s;
						}
					}

					img {
						transform: scale(1.05);
					}
				}
			}
		}

		.caption {
			font-family: 'KnockoutLite';
			font-size: 20px;
			color: #FFDD00;
			letter-spacing: 1px;
			margin-bottom: 17px;
			text-transform: uppercase;
			line-height: 100%;
			margin-top: 80px;
		}

		h2 {
			font-family: 'KnockoutLite';
			font-size: 64px;
			color: #FFFFFF;
			letter-spacing: 1px;
			line-height: 100%;
			margin-bottom: 20px;
		}

		.description {
			font-family: 'ITC Franklin Gothic MdCd';
			font-size: 20px;
			color: #FFDD00;
			letter-spacing: 0.25px;
			line-height: 120%;
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
				return string.substring(0, 100) + '...';
			}
		},

		data() {
			return {
				loaded: false,
				title: null,
				subtitle: null,
				description: null,
				profiles: null,
				isActive: false,
				selectedProfile: null
			}
		},

		methods: {
			showProfile(index) {
				this.selectedProfile = this.profiles[index];

				this.isActive = true;
			}
		},

		mounted() {
			axios.get('/wp-json/acf/v3/pages/' + this.page).then((response) => {
		  		let data = response.data;

		  		this.loaded = true;

		  		this.title = data.acf.profiles_title;

		  		this.subtitle = data.acf.profiles_subtitle;

		  		this.description = data.acf.profiles_description;
		  	}).catch((error) => {
				console.log(error);
		  	});

		  	axios.get('/wp-json/acf/v3/ucs-profiles?per_page=4').then((response) => {
		  		this.profiles = response.data;

		  		this.loaded = true;
		  	}).catch((error) => {
				console.log(error);
		  	});
		}
	}
</script>