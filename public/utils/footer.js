document.write(`
	<style>
		@font-face {
		  font-family: 'Protest Riot';
		  src: url("../../public/font/Protest_Riot/ProtestRiot-Regular.ttf");
		}
		.footer_class {
			background-color: black;
			color: white;
	        width: 100%;
	    }

	    .footer_class_footer {
	        text-align: center;
	        padding: 20px;
	    }

	    .contact-me{
	    	margin-left: 50px;
	    }

	    .footer_class_footer p {
	        margin: 0;
	    }

	    .footer_class_footer a {
	        margin: 0 10px;
	        text-decoration: none;
	    }
	    hr{
	    	margin-left: 150px;
	    	margin-right: 150px;
	    }
	    @media screen and (min-width: 50px) and (max-width: 800px){
			.footer_class{
				padding: 0rem 1rem 0rem 1rem;
			}
			.footer_class_footer p{
				font-size: 15px;
			}
			.contact-me {
				margin-right: 50px;
			}
			hr{
				margin: auto;
			}
		}
	</style>
	<div class="footer_class">
		<hr>
		<footer class="footer_class_footer">
		    <p><a href="/../home"><img src="../../public/img/owl_color_white.png"></a>&copy; 2024 Flip ~ Flops - Todos os direitos reservados </p>
		    <div class="contact-me">
		    	<a href="" target="_blank">Sobre</a>
		    	<a href="https://www.instagram.com/_1uccass/" target="_blank">Instagram</a>
		    	<a href="https://github.com/Luccxx/" target="_blank">Github</a>
		    </div>
	    	
		</footer>
	</div>
	`);