<template>
	<transition name="slide-fade">
		<section id="us-banner">
			<div class="row" :style="{ 'background-image': 'url(' + image + ')' }">
				<div class="section">
					<div class="container">
						<div class="columns bannerContainer">
							<div class="column is-half halfBanner">
								<p>{{ subtitle }}</p>
								<h1>{{ title }}</h1>

								<a :href="link" class="customButton">Read More <img :src="readMoreImage" alt="Read More"></a>
</a>
							</div>
						</div>
					</div>
				</div>
			</div>
		</section>
	</transition>
</template>

<style lang="scss" scoped>
	#us-banner {
		.bannerContainer {
			max-width: 1060px;
			margin: 0 auto;
		}

		.row {
			height: 100vh;
			min-height: 600px;
			background-repeat: no-repeat;
			background-size: cover;
			background-attachment: fixed;
			background-position: center center;

			@media only screen and (max-width : 768px) {
				background-attachment: none;
			}

			.container {
				height: 100vh;
				display: flex;
    			align-items: center;

    			.halfBanner {
    				@media only screen and (max-width : 1215px) {
						width: 100%;
					}
    			}

    			p {
    				color: #FFDD00;
    				font-size: 20px;
    				font-family: 'KnockoutLite';
    				letter-spacing: 1px;
    				line-height: 120%;
    				margin-bottom: 14px;
    			}

    			h1 {
    				color: #FFF;
    				font-size: 100px;
    				letter-spacing: 1px;
    				line-height: 100%;
    				font-family: 'KnockoutFull';
    				margin-bottom: 36px;

    				@media only screen and (max-width : 768px) {
						font-size: 60px;
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
			readMoreImage: null
		},

		data() {
			return {
				loaded: false,
				subtitle: null,
				title: null,
				link: null,
				image: null
			}
		},

		mounted() {
			axios.get('/wp-json/acf/v3/pages/' + this.page).then((response) => {
		  		let data = response.data;

		  		this.subtitle = data.acf.banner_subtitle;

		  		this.title = data.acf.banner_title;

		  		this.link = data.acf.banner_link;

		  		this.image = data.acf.banner_image;

		  		this.loaded = true;
		  	}).catch((error) => {
				console.log(error);
		  	});
		}
	}
</script>