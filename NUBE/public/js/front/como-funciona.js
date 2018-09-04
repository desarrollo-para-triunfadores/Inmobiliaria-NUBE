/*
 * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * 
 * Portada
 * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * 
 */

$(document).ready(function () {
    /*Redefinimos el tamaño de la portada basado en el tamaño de la pantalla*/
    resize_portada();    
});

/*Evento asociado al cambio de resulción de la ventana del navegador*/
$(window).resize(function () {
    resize_portada();
    // resize_section_iconos();
});

/*Esta función redefina la resolución de la portada*/
function resize_portada() {
    var height = $(window).height();
    var alto = height - 131;
    $('#parallax-portada').height(alto);
}

/*Este evento anima el botón de play al pasar el mouse*/
$(".img_scroll").hover(function () {
    $(this).toggleClass("animated infinite bounce");
});



/*
 * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * 
 * Iconos Porpietario - Inquilino
 * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * 
 */


var size_1 = "", size_2 = "";

//Contribution interpolation

$(document).ready(function () {
    contributionInterpolation();
    resize_section_iconos();
});

/*Evento asociado al cambio de resulción de la ventana del navegador*/
$(window).resize(function () {
    resize_section_iconos();
});

/*Esta función redefine la resolución de la portada*/
function resize_section_iconos() {
    var ancho = $(window).width();
    if (ancho < 800) {
        size_1 = "x-large";
        size_2 = "large";
        $('.col-hidden').removeClass('col-md-6');
        $('.col-hidden').addClass('col-md-4');
        $('#section-iconos #contribute-details .contribution-extended-details p').css('font-size', 'medium');
    } else {
        size_1 = "xx-large";
        size_2 = "x-large";
        $('.col-hidden').removeClass('col-md-6');
        $('.col-hidden').addClass('col-md-4');
        $('#section-iconos #contribute-details .contribution-extended-details p').css('font-size', '.9em');
    }

    $('#section-iconos .contribute-inquilino h1, #section-iconos .contribute-propietario h1').css('font-size', size_1);
    $('#section-iconos .contribute-inquilino h1, #section-iconos .contribute-propietario h1').css('font-size', size_1);

    $('#section-iconos .contribute-inquilino').hover(function () {
        $('#section-iconos .contribute-inquilino h1').css('font-size', size_2);
    }, function () {
        $('#section-iconos .contribute-inquilino h1').css('font-size', size_1);
    });

    $('#section-iconos .contribute-propietario').hover(function () {
        $('#section-iconos .contribute-propietario h1').css('font-size', size_2);
    }, function () {
        $('#section-iconos .contribute-propietario h1').css('font-size', size_1);
    });

    $('#contribute-details').css('overflow-y', 'scroll');
}

var contributionInterpolation = function () {
    $(document).on("click", '.contribute-propietario', function () {
        $('#section-iconos .contribute-propietario').off();
        $('#section-iconos .contribute-propietario h1').css('font-size', size_2);
        bounceBall($(this), 3, 250);
    })
    $(document).on("click", '.contribute-inquilino', function () {
        $('#section-iconos .contribute-inquilino').off();
        $('#section-iconos .contribute-inquilino h1').css('font-size', size_2);
        bounceBall($(this), 3, 250);
    })

    function bounceBall(element, times, speed) {
        //add the class Active to the element
        element.addClass('active');

        //take the initial position of the element
        var x = element.offset().left - $(window).scrollLeft();


        var y = $(window).outerHeight() - (element.offset().top - $(window).scrollTop()) - element.outerHeight();

        //make the element a position absolute element of the body removing it first from the original container
        var parent = element.parent();
        element.detach();
        $('#contribute-details').prepend(element).css({
            display: 'block'
        });
        //element.

        element.css({
            position: 'fixed', // position: 'absolute',
            left: x + 'px',
            bottom: y + 'px'
        })

        for (var i = 0; i < times; i++) {
            distance = y / (i + 2);

            element.animate({
                bottom: 0
            }, speed, 'easeInQuad')
                    .animate({
                        bottom: '+=' + distance
                    }, speed, 'easeOutQuad');
            if (i === 2) {
                element.animate({
                    bottom: 0
                }, 400, 'easeInQuad', function () {
                    openContributionDetails()
                });
            }
        }

        var openContributionDetails = function () {
            var $closeDetails = '<button type="button" class="close-details btn btn-default" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>'
            var $detailsContent = parent.find('.hidden-content').html();
            var $details = "<div class='contribution-extended-details animated fadeInUp'>" + $detailsContent + "</div>"

            $("#contribute-details").css({
                background: 'rgba(51, 156, 216, 0.9)'
            })
                    .append($details).append($closeDetails);

            //close the details
            $('.close-details').on("click", function () {
                $('#contribute-details').fadeOut(function () {
                    $(this).empty().removeAttr('style');
                    element.removeAttr('style').removeClass('active');
                    parent.prepend(element).addClass('animated fadeInUp');
                    resize_section_iconos();
                })
            });

        }
    }

}


/*
 * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * 
 * JS para moviles en seccion "COMO FUNCIONA"
 * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * 
 */
var swiper = new Swiper('.swiper-container',{
    scrollbar: {
        el: '.swiper-scrollbar',
        hide: true,
    },
    //swiper.width: 50,

});

/*
 * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *
 * FIN
 * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *
 */