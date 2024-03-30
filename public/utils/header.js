document.write(`
	<style>
		@font-face {
		  font-family: 'Protest Riot';
		  src: url("../../public/font/Protest_Riot/ProtestRiot-Regular.ttf");
		}
		#navbarNav{
			font-size: 22px;
		}
		.container-fluid{
			font-family: 'Protest Riot', sans-serif;
		}
		#navbar_header{
			background: #0d1117;
			padding-top: 10px;
			padding-bottom: 10px;
		}
		#txtHeader{
			color: white;
			font-size: 35px; 
			margin-left: 3%;
		}
		#txtHeader:hover{
			cursor: pointer;
		}
		.navbar-nav a{
			color: white;
		}
		img{
			height: auto;
			margin: 5px;
			width: 30px;
		}
		@media screen and (min-width: 100px) and (max-width: 800px){
			.container-fluid{
				text-align: center;
				font-size: auto;

				width: auto;
			}
		}
	</style>
	<main class="master">
		<nav class="navbar_class" data-bs-theme="light" id="navbar_header">
		  <div class="container-fluid">
		    <a class="navbar-brand" href="/../home"><label id="txtHeader">Flip~<img src="../../public/img/owl_white_color.png">~Flops</label></a>
		  </div>
		</nav>
	</main>
	

	`);