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
			background: #db8005;
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
	</style>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
	<nav class="navbar_class" data-bs-theme="light" id="navbar_header">
	  <div class="container-fluid">
	    <a class="navbar-brand" href="home"><label id="txtHeader">Flip~<img src="../../public/img/owl.png">~Flops</label></a>
	    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
	      <span class="navbar-toggler-icon"></span>
	    </button>
	  </div>
	</nav>
	<br>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
	`);