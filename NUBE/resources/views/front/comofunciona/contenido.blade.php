<!DOCTYPE html>
<html lang="en-US">
<head>
	<meta charset="UTF-8"/>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

	@include('front.partes.estilos')
	<title>Inmubiliaria CloudProp | Sistema de gestión inmobiliaria</title>

	<title>Cloudprop | Sistema de gestión inmobiliaria</title>
</head>


		<div id="container" class="{{-- intro-effect-push --}}">
			<!-- Top Navigation -->
			<header class="header">
				<div class="parallax-comofunciona"></div>
				<div class="title">
					<h1>Tus servicios inmobiliarios, en la nube</h1>
				</div>
			</header>
			<button class="trigger" data-info="Saber más"><span>Trigger</span></button>

			<article class="content">
				<div>
					<blockquote>
						<!--
						CloudProp es una empresa de servicios inmobiliarios que busca entregar una nueva experiencia en confort y seguridad a sus clientes a través de un software de administración exclusivo.
						-->
						Nuestra misión es brindar la máxima transparencia, seguridad y beneficios a nuestros clientes, con la intención de ser la mejor forma de buscar, encontrar y administrar tu inmueble ideal.
						.</blockquote>
				</div>
			</article>

		</div><!-- /container -->
		<script src="{{asset('plantillas/plugins/ArticleIntroEffects/js/classie.js')}}"></script>
		{{--
        <script>
			(function() {

				// detect if IE : from http://stackoverflow.com/a/16657946
				var ie = (function(){
					var undef,rv = -1; // Return value assumes failure.
					var ua = window.navigator.userAgent;
					var msie = ua.indexOf('MSIE ');
					var trident = ua.indexOf('Trident/');

					if (msie > 0) {
						// IE 10 or older => return version number
						rv = parseInt(ua.substring(msie + 5, ua.indexOf('.', msie)), 10);
					} else if (trident > 0) {
						// IE 11 (or newer) => return version number
						var rvNum = ua.indexOf('rv:');
						rv = parseInt(ua.substring(rvNum + 3, ua.indexOf('.', rvNum)), 10);
					}

					return ((rv > -1) ? rv : undef);
				}());


				// disable/enable scroll (mousewheel and keys) from http://stackoverflow.com/a/4770179
				// left: 37, up: 38, right: 39, down: 40,
				// spacebar: 32, pageup: 33, pagedown: 34, end: 35, home: 36
				var keys = [32, 37, 38, 39, 40], wheelIter = 0;

				function preventDefault(e) {
					e = e || window.event;
					if (e.preventDefault)
					e.preventDefault();
					e.returnValue = false;
				}

				function keydown(e) {
					for (var i = keys.length; i--;) {
						if (e.keyCode === keys[i]) {
							preventDefault(e);
							return;
						}
					}
				}

				function touchmove(e) {
					preventDefault(e);
				}

				function wheel(e) {
					// for IE
					//if( ie ) {
						//preventDefault(e);
					//}
				}

				function disable_scroll() {
					window.onmousewheel = document.onmousewheel = wheel;
					document.onkeydown = keydown;
					document.body.ontouchmove = touchmove;
				}

				function enable_scroll() {
					window.onmousewheel = document.onmousewheel = document.onkeydown = document.body.ontouchmove = null;
				}

				var docElem = window.document.documentElement,
					scrollVal,
					isRevealed,
					noscroll,
					isAnimating,
					container = document.getElementById( 'container' ),
					trigger = container.querySelector( 'button.trigger' );

				function scrollY() {
					return window.pageYOffset || docElem.scrollTop;
				}

				function scrollPage() {
					scrollVal = scrollY();

					if( noscroll && !ie ) {
						if( scrollVal < 0 ) return false;
						// keep it that way
						window.scrollTo( 0, 0 );
					}

					if( classie.has( container, 'notrans' ) ) {
						classie.remove( container, 'notrans' );
						return false;
					}

					if( isAnimating ) {
						return false;
					}

					if( scrollVal <= 0 && isRevealed ) {
						toggle(0);
					}
					else if( scrollVal > 0 && !isRevealed ){
						toggle(1);
					}
				}

				function toggle( reveal ) {
					isAnimating = true;

					if( reveal ) {
						classie.add( container, 'modify' );
					}
					else {
						noscroll = true;
						disable_scroll();
						classie.remove( container, 'modify' );
					}

					// simulating the end of the transition:
					setTimeout( function() {
						isRevealed = !isRevealed;
						isAnimating = false;
						if( reveal ) {
							noscroll = false;
							enable_scroll();
						}
					}, 1200 );
				}

				// refreshing the page...
				var pageScroll = scrollY();
				noscroll = pageScroll === 0;

				disable_scroll();

				if( pageScroll ) {
					isRevealed = true;
					classie.add( container, 'notrans' );
					classie.add( container, 'modify' );
				}

				window.addEventListener( 'scroll', scrollPage );
				trigger.addEventListener( 'click', function() { toggle( 'reveal' ); } );
			})();
		</script>
		--}}

</html>