<template>
	<transition name="slide-fade">
		<div id="ucs-steps" v-if="loaded">
			<section class="section topSteps">
				<div class="container">
					<div class="columns">
						<div class="column">
							<p class="has-text-centered">{{ subtitle }}</p>
							<h2 class="has-text-centered">{{ title }}</h2>
						</div>
					</div>
				</div>
			</section>

			<section class="section bottomSteps">
				<div class="columns">
					<div class="column theSteps has-text-centered" v-for="(step, index) in steps">
						<img :src="step.acf.icon" class="stepIcon">

						<p>{{ step.acf.caption }}</p>

						<h4>{{ step.acf.name }}</h4>

						<p>{{ step.acf.description }}</p>

						<a :href="link"><img :src="readMoreImage" alt="Read More"></a>
					</div>
				</div>
			</section>
		</div>
	</transition>
</template>

<style lang="scss" scoped>
	#ucs-steps {
		.topSteps {
			background: #FFF;

			p {
				font-family: 'KnockoutLite';
				font-size: 20px;
				color: #919191;
				letter-spacing: 1px;
				line-height: 110%;
				margin-bottom: 11px;
				text-transform: uppercase;
			}

			h2 {
				font-family: 'KnockoutFull';
				font-size: 86px;
				color: #333743;
				letter-spacing: 1px;
				line-height: 110%;
				margin-bottom: 80px;
			}
		}

		.bottomSteps {
			background: #333743;

			.column {
				position: relative;
			}

			.stepIcon {
				position: absolute;
				top: -85px;
				left: 50%;
				transform: translateX(-50%);
				width: 100px;
				height: 100px;
			}

			.theSteps {

				a {
					display: inline-block;
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
				title: null,
				subtitle: null,
				steps: null
			}
		},

		mounted() {
			axios.get('/wp-json/acf/v3/pages/' + this.page).then((response) => {
		  		let data = response.data;

		  		this.loaded = true;

		  		this.title = data.acf.steps_title;

		  		this.subtitle = data.acf.steps_subtitle;
		  	}).catch((error) => {
				console.log(error);
		  	});

		  	axios.get('/wp-json/acf/v3/ucs-steps?per_page=3&orderby=id&order=asc').then((response) => {
		  		this.steps = response.data;

		  		this.loaded = true;
		  	}).catch((error) => {
				console.log(error);
		  	});

			this.loaded = true;
		}
	}
</script>