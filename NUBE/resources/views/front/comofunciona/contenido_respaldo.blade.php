<div id="page-content">

    <div id="container" class="intro-effect-push">
    <!-- Parallax Portada -->
    <div id="parallax-portada" class="parallax-comofunciona" >
        <div class="parallax-container">
            <a class="imgcircle bounceInUp animated animated roll" href="#page-content">
                <h1 class="sombra animated bounce" style="color: white">Mas de 80% de los servicios inmobiliarios en la nube.</h1>
                {{--
                <img class="img_scroll" src="{{ asset('imagenes/iconos/circle.png') }}" width="40">
                --}}
            </a>
        </div>
    </div>
    <!-- /.Parallax Portada-->

    <div class="container">
        <div class="row">
            <!-- About Us -->
            <br><br><br><br>
            <div class="col-md-12 col-sm-12">
                <section id="about-us">
                    <header><h1>Quienes somos</h1></header>
                    <section id="ceo-section" class="center">
                        <header class="center"><div class="cite-title">Inmobiliaria NUBE</div></header>
                        <div class="cite no-bottom-margin">

                        </div>

                        <hr class="divider">

                    </section><!-- /#ceo-section -->

                </section><!-- /#about-us -->
            </div><!-- /.col-md-12 -->
        </div><!-- /.row -->
    </div><!-- /.container -->
</div>
</div>

@section('script')
    <script src="js/classie.js"></script>
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
@endsection