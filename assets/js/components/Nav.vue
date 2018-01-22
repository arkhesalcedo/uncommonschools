<template>
	<section id="us-nav">
		<div id="mobileMenu" class="is-hidden-tablet">
			<img :src="mobileLogo" :alt="alt" class="logo">	
		</div>
		<div id="whiteTopBar" class="is-hidden-mobile">
			<div class="container">
				<div class="columns is-gapless">
					<div class="column is-3">
						<img :src="logo" :alt="alt" class="logo">		
					</div>

					<div class="column is-9">
						<nav>
							<ul id="mainNav">
								<li><a href="">About</a></li>
								<li><a href="">Reason Why</a></li>
								<li><a href="">Our Schools</a></li>
								<li><a href="">Results</a></li>
								<li><a href="">Careers</a></li>
								<li><a href="">Donate</a></li>
								<li><a href=""><i class="fas fa-search"></i></a></li>
							</ul>
						</nav>
					</div>
				</div>
			</div>
		</div>

		<div id="grayBarNav" class="is-hidden-mobile">
			<div class="container">
				<div class="columns is-gapless">
					<div class="column">
						<nav>
							<ul id="subNav">
								<li><a href="">Families</a></li>
								<li><a href="">Teachers</a></li>
								<li><a href="">Donor</a></li>
								<li><a href="">Contact</a></li>
							</ul>
						</nav>
					</div>
				</div>
			</div>
		</div>
	</section>
</template>

<style lang="scss" scoped>
	#us-nav {
		z-index: 1;
		position: fixed;
		width: 100%;
		top: 0;
		left: 0;

		#mobileMenu {
			text-align: center;
			background: #333743;

			img {
				display: inline-block;
				margin: 10px auto;
			}
		}

		#grayBarNav {
			background: rgba(51, 55, 67, 0.5);
		}

		#whiteTopBar {
			background: #FFF;
		}

		.container {
			position: relative;

			nav {
				ul {
					line-height: 0px;
					text-align: right;

					li {
						line-height: 0px;
						display: inline-block;

						a {
							margin: 0px;
							padding: 0px;
							display: inline-block;
						}
					}
				}

				ul#mainNav {
					li {
						a {
							color: #919191;
							line-height: 70px;
							text-transform: uppercase;
							font-size: 20px;
							font-family: 'KnockoutFull';
							letter-spacing: 0.5px;
							margin-left: 40px;
							transition: color 0.5s ease;

							&:hover {
								color: #FFDD00;
							}
						}
					}
				}

				ul#subNav {
					li {
						a {
							font-family: 'ITC Franklin Gothic BkCd';
							color: #FFF;
							font-size: 14px;
							line-height: 20px;
							padding-left: 22px;

							&::after {
								content: "|";
								height: 80%;
								margin-left: 22px;
								color: #FFF !important;
							}

							&:hover {
								color: #FFDD00;
							}
						}

						&:last-child {
							a {
								&::after {
									display: none;
								}
							}
						}
					}
				}
			}

			.logo {
				position: absolute;
				z-index: 2;
			}
		}
	}
</style>

<script>
	export default {
		props: {
			logo: null,
			mobileLogo: null,
			alt: null
		}
	}
</script>