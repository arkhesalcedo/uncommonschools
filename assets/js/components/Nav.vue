<template>
	<section id="us-nav">
		<div id="mobileMenu" class="is-hidden-tablet">
			<img :src="mobileLogo" :alt="alt" class="logo">

			<div class="bar" @click="toggleMenu" :class="{ 'active' : menuActive }">
				<div class="bar1"></div>
				<div class="bar2"></div>
				<div class="bar3"></div>
			</div>

			<div class="mobileMenuContainer" :class="{ 'active' : menuActive }">
				<nav>
					<ul id="mainNav">
						<li><a href="">About</a></li>
						<li><a href="">Reason Why</a></li>
						<li><a href="">Our Schools</a></li>
						<li><a href="">Results</a></li>
						<li><a href="">Careers</a></li>
						<li><a href="">Donate</a></li>
					</ul>
				</nav>

				<nav id="subNavMobile">
					<ul>
						<li><a href="">Families</a></li>
						<li><a href="">Teachers</a></li>
						<li><a href="">Donor</a></li>
						<li><a href="">Contact</a></li>
					</ul>
				</nav>
			</div>
		</div>
		<div id="whiteTopBar" class="is-hidden-mobile">
			<div class="container">
				<div class="columns navContainer is-gapless">
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
				<div class="columns navContainer is-gapless">
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
		.navContainer {
			max-width: 1060px;
			margin: 0 auto;
			position: relative;
			    padding-right: 0.75rem;
		}

		.mobileMenuContainer {
			height: 0px;
			opacity: 0;
			display: none;
			transition: opacity	0.3s, height 0.2s;

			nav {
				ul {
					li {
						a {
							color: #919191;
							line-height: 70px;
							text-transform: uppercase;
							font-size: 20px;
							font-family: 'KnockoutFull';
							letter-spacing: 0.5px;
							transition: color 0.5s ease;

							&:hover {
								color: #FFDD00;
							}
						}
					}
				}
			}

			&.active {
				height: 100vh;
				opacity: 1;
				display: block;
			}
		}

		z-index: 3;
		position: fixed;
		width: 100%;
		top: 0;
		left: 0;

		.bar {
			position: fixed;
			cursor: pointer;
			top: 22px;
			right: 2.3rem;

			.bar1, .bar2, .bar3 {
				width: 24px;
				height: 2px;
				transition: 0.4s cubic-bezier(1, -2, 0, 3);
				// transition-delay: 0.5s;
				background: #FFF;
			}

			.bar2 {
				margin: 5px 0px;
			}

			&.active {
				.bar1 {
					transform: rotate(-45deg) translate(-4px, 5px);
				}

				.bar2 {
					opacity: 0;
				}

				.bar3 {
					transform: rotate(45deg) translate(-5px, -6px);
				}
			}
		}

		#mobileMenu {
			background: #333743;
			padding: 0px 1.5rem;
			position: relative;
			max-height: 100vh;

			img {
				display: inline-block;
				margin: 10px auto;

				@media only screen and (max-width : 768px) {
					width: auto;
					height: 50px;
					margin: 5px 0px 0px 0.75rem;
				}
			}

			#subNavMobile {
				position: absolute;
				bottom: 0px;
				width: 87%;

				ul {
					display: flex;
    				justify-content: space-between;

					li {
						text-align: center;
						display: inline-block;

						a {
							display: block;
						    margin: 0px;
						    padding: 0px;
						    color: #FFDD00;
						}
					}
				}
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

							@media only screen and (max-width : 1215px) {
								margin-left: 10px;
							}

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
				left: 0.75rem;
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
		},

		methods: {
			toggleMenu() {
				this.menuActive = ! this.menuActive;

				if (this.menuActive) {
				    document.body.classList.add('menuActive');
			  	} else {
			  		document.body.classList.remove('menuActive');
			  	}
			}
		},

		data() {
			return {
				menuActive: false,
			}
		}
	}
</script>