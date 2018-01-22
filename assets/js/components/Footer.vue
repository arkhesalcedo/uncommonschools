<template>
	<section id="ucs-footer" :style="{ 'background-image': 'url(' + image + ')' }">
		<div class="section">
			<div class="container">
				<div class="columns">
					<div class="column">
						<h4>Find a school near you</h4>

						<div id="zipCode">
							<input type="text" placeholder="Zip Code ...">
							<button><img :src="imageButton"></button>
						</div>
					</div>
				</div>
			</div>
		</div>

		<div id="newsletter" class="section">
			<div class="container">
				<div class="columns">
					<div class="column">
						<h5>Newsletter</h5>
					</div>
					<div class="column">
						<input type="text" placeholder="Your full name">
					</div>
					<div class="column">
						<input type="text" placeholder="Email address">
					</div>
					<div class="column">
						<button><img :src="imageButton"></button>
					</div>
				</div>
			</div>
		</div>

		<div class="section" id="footerNav">
			<div class="container">
				<div class="columns">
					<div class="column is-offset-3">
						<nav>
							<ul>
								<li><a href="">ABOUT <img :src="imageLink"></a></li>
								<li><a href="">CAREERS <img :src="imageLink"></a></li>
								<li><a href="">ENROLL <img :src="imageLink"></a></li>
								<li><a href="">EMPLOYEE PORTAL <img :src="imageLink"></a></li>
								<li><a href="">PRESS <img :src="imageLink"></a></li>
								<li><a href="">PRIVACY POLICY <img :src="imageLink"></a></li>
							</ul>
						</nav>
					</div>
					<div class="column is-3">
						<nav>
							<ul>
								<li><a href=""><i class="fab fa-facebook-f"></i> FACEBOOK</a></li>
								<li><a href=""><i class="fab fa-twitter"></i> TWITTER</a></li>
								<li><a href=""><i class="fab fa-instagram"></i> INSTAGRAM</a></li>
								<li><a href=""><i class="fab fa-vimeo-v"></i> VIMEO</a></li>
								<li><a href=""><i class="fab fa-linkedin-in"></i> LINKEDIN</a></li>
							</ul>
						</nav>
					</div>
					<div class="column is-3">
						<nav>
							<ul>
								<li><a href="">FAQ <img :src="imageLink"></a></li>
								<li><a href="">SHOP <img :src="imageLink"></a></li>
								<li><a href="">DONATE <img :src="imageLink"></a></li>
							</ul>
						</nav>
					</div>
				</div>
			</div>
		</div>
	</section>
</template>

<style lang="scss" scoped>
	#ucs-footer {
		background-repeat: no-repeat;
		background-size: cover;
		background-position: top left;
		min-height: 1150px;

		padding-top: 50px;
		padding-bottom: 50px;

		h4 {
			font-family: 'KnockoutFull';
			color: #333743;
			font-size: 86px;
			line-height: 110%;
			letter-spacing: 1px;
		}

		#zipCode {
			position: relative;
			width: 520px;
			margin: 150px auto 220px;

			input[type=text] {
				outline: none;
				appearance: none;
				border: 3px solid #FFDD00;
				font-size: 36px;
				font-family: 'KnockoutLite';
				line-height: 100%;
				padding: 24px 105px 24px 24px;
				width: 100%;
				display: block;
				text-transform: uppercase;
				color: #333743;

				&::placeholder {
					color: #333743;
				}
			}

			button {
				position: absolute;
				top: 0px;
				outline: none;
				appearance: none;
				border: none;
				background: none;
				right: 24px;
				top: 50%;
				transform: translateY(-50%);
				cursor: pointer;
			}
		}

		#newsletter {
			background: #FFDD00;

			&.section {
				padding-top: 0px;
				padding-bottom: 0px;
			}

			h5 {
				color: #FFF;
				font-size: 64px;
				line-height: 100%;
				letter-spacing: 1px;
				font-family: 'KnockoutFull';
			}

			input[type=text] {
				outline: none;
				border: none;
				background: none;
				font-family: 'ITC Franklin Gothic MdCd';
				font-size: 24px;
				line-height: 110%;
				color: #333743;
				letter-spacing: 0.25px;
				border-bottom: 2px solid #333743;
				height: 51px;
				width: 100%;

				&::placeholder {
					color: #333743;
				}
			}

			button {
				outline: none;
				appearance: none;
				border: none;
				background: none;
				cursor: pointer;
				height: 51px;
			}
		}

		#footerNav {
			nav {
				ul {
					li {
						a {
							font-family: 'KnockoutLite';
							color: #FFF;
							font-size: 20px;
							line-height: 200%;
							letter-spacing: 1px;
							text-transform: uppercase;
							transition: color 0.3s ease-out;

							svg {
								height: 20px;
								width: 30px;
								margin-right: 30px;
								color: #FFDD00;

								transition: margin-right 0.3s ease-out;
							}

							img {
								display: inline-block;
								margin-left: 10px;
								transition: margin-left 0.3s ease-out;
							}

							&:hover {
								color: #FFDD00;

								img {
									margin-left: 20px;
								}

								svg {
									margin-right: 20px;
								}
							}
						}
					}
				}
			}
		}
	}

	@media only screen and (max-width : 768px) {
		#ucs-footer {
			min-height: auto;

			h4 {
				text-align: center;
				font-size: 50px;
			}

			#zipCode {
				width: auto;
				margin: 30px auto;


				input[type=text] {
					padding: 24px 105px 24px 24px;
				}
			}

			#footerNav {
				nav {
					ul {
						li {
							text-align: right;

							a {
								svg, img {
									display: none;
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
			image: null,
			imageButton: null,
			imageLink: null
		}
	}
</script>