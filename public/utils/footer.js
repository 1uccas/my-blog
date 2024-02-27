document.write(`
	<style>
		@font-face {
		  font-family: 'Protest Riot';
		  src: url("../../public/font/Protest_Riot/ProtestRiot-Regular.ttf");
		}
		footer.footer_class, hr{
		  font-family: 'Protest Riot', sans-serif;
		  bottom: 0;
		  left: 0;
		  height: 40px;
		  position: fixed;
		  width: 100%;
		  text-align: center;
		  display: flex;
		  flex-direction: row;
		  aling-items: center;
		  justify-content: space-evenly;
		}
		hr{
			display: flex;
			aling-items: center;
			justify-content: center;
			margin-left: 10rem;
			width: 75%;
			border-top: 1.5px solid black;
		}
	</style>
	<div class="footer_class">
		<hr>
		<footer class="footer_class">
		    <p>&copy; 2024 Blogs~Blogs</p>
		</footer>
	</div>
	`);