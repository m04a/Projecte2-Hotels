(function ($) {
	
	"use strict";

	$(function() {
        $("#tabs").tabs();
    });

	$(window).scroll(function() {
	  var scroll = $(window).scrollTop();
	  var box = $('.header-text').height();
	  var header = $('header').height();

	  if (scroll >= box - header) {
	    $("header").addClass("background-header");
	  } else {
	    $("header").removeClass("background-header");
	  }
	});
	

	$('.schedule-filter li').on('click', function() {
        var tsfilter = $(this).data('tsfilter');
        $('.schedule-filter li').removeClass('active');
        $(this).addClass('active');
        if (tsfilter == 'all') {
            $('.schedule-table').removeClass('filtering');
            $('.ts-item').removeClass('show');
        } else {
            $('.schedule-table').addClass('filtering');
        }
        $('.ts-item').each(function() {
            $(this).removeClass('show');
            if ($(this).data('tsmeta') == tsfilter) {
                $(this).addClass('show');
            }
        });
    });


	// Window Resize Mobile Menu Fix
	mobileNav();


	// Scroll animation init
	window.sr = new scrollReveal();
	

	// Menu Dropdown Toggle
	if($('.menu-trigger').length){
		$(".menu-trigger").on('click', function() {	
			$(this).toggleClass('active');
			$('.header-area .nav').slideToggle(200);
		});
	}


	function onScroll(event){
	    var scrollPos = $(document).scrollTop();
	    $('.nav a').each(function () {
	        var currLink = $(this);
	        var refElement = $(currLink.attr("href"));
	        if (refElement.position().top <= scrollPos && refElement.position().top + refElement.height() > scrollPos) {
	            $('.nav ul li a').removeClass("active");
	            currLink.addClass("active");
	        }
	        else{
	            currLink.removeClass("active");
	        }
	    });
	}


	// Quan estigui carregada li afegim la clase que basicament esborra la anterior
	 $(window).on('load', function() {

        $('#js-preloader').addClass('loaded');

    });


	// Window Resize Mobile Menu Fix
	$(window).on('resize', function() {
		mobileNav();
	});


	// Window Resize Mobile Menu Fix
	function mobileNav() {
		var width = $(window).width();
		$('.submenu').on('click', function() {
			if(width < 767) {
				$('.submenu ul').removeClass('active');
				$(this).find('ul').toggleClass('active');
			}
		});
	}
 $( function() {
 $.datepicker.regional['cat'] = {
 closeText: 'Tancar',
 prevText: '🡰 Ant',
 nextText: 'Seg 🡲',
 currentText: 'Avui',
 monthNames: ['Gener', 'Febrer', 'Març', 'Abril', 'Maig', 'Juny', 'Juliol', 'Agost', 'Setembre', 'Octubre', 'Novembre', 'Decembre'],
 monthNamesShort: ['Gen','Feb','Mar','Abr', 'Mai','Jun','Jul','Ago','Sep', 'Oct','Nov','Dec'],
 dayNames: ['Diumenge', 'Dilluns', 'Dimarts', 'Dimecres', 'Dijous', 'Divendres', 'Dissabte'],
 dayNamesShort: ['Dom','Lun','Mar','Mié','Juv','Vie','Sáb'],
 dayNamesMin: ['Dg','Di','Dm','Dc','Dj','Dv','Ds'],
 weekHeader: 'Sm',
 dateFormat: 'dd/mm/yy',
 firstDay: 1,
 isRTL: false,
 showMonthAfterYear: false,
 yearSuffix: ''
 };
 $.datepicker.setDefaults($.datepicker.regional['cat']);
    var dateFormat = "dd/mm/yy",
      from = $( "#from" )
        .datepicker ({
          defaultDate: "+1w",
          changeMonth: true,
          numberOfMonths: 1
        })
        .on( "change", function() {
          to.datepicker( "option", "minDate", getDate( this ) );
        }),
      to = $( "#to" ).datepicker({
        defaultDate: "+1w",
        changeMonth: true,
        numberOfMonths: 1
      })
      .on( "change", function() {
        from.datepicker( "option", "maxDate", getDate( this ) );
      });
 
    function getDate( element ) {
      var date;
      try {
        date = $.datepicker.parseDate( dateFormat, element.value );
      } catch( error ) {
        date = null;
      }
 
      return date;
    }
  } );
})(window.jQuery);

/*Canvis de reserves*/

if ( document.URL.includes("reserva.php") ) {
	document.getElementById("titlevar").textContent="Reserva";
}
if ( document.URL.includes("habitacions.php") ) {
	document.getElementById("titlevar").textContent="Habitacions";
}
if ( document.URL.includes("about.php") ) {
	document.getElementById("titlevar").textContent="Sobre nosaltres";
}
if ( document.URL.includes("terms.php") ) {
	document.getElementById("titlevar").textContent="Termes i condicions";
}
if ( document.URL.includes("contacte.php") ) {
	document.getElementById("titlevar").textContent="Contacte";
}
if ( document.URL.includes("registre.php") ) {
	document.getElementById("titlevar").textContent="Registre";
}
if ( document.URL.includes("reservabuscador.php") ) {
	document.getElementById("titlevar").textContent="Reserva";
}
if ( document.URL.includes("login.php") ) {
	document.getElementById("titlevar").textContent="Login";
}

/*Lightbox fet*/
$(document).on("click", '[data-toggle="lightbox"]', function(event) {
  event.preventDefault();
  $(this).ekkoLightbox();
});

/*Botó per imprimir la reserva*/
 function crearPDF() {
        var pdf = new jsPDF('p', 'pt', 'letter');
        // source can be HTML-formatted string, or a reference
        // to an actual DOM element from which the text will be scraped.
        source = $('#customers')[0];

        // we support special element handlers. Register them with jQuery-style 
        // ID selector for either ID or node name. ("#iAmID", "div", "span" etc.)
        // There is no support for any other type of selectors 
        // (class, of compound) at this time.
        specialElementHandlers = {
            // element with id of "bypass" - jQuery style selector
            '#bypassme': function (element, renderer) {
                // true = "handled elsewhere, bypass text extraction"
                return true
            }
        };
        margins = {
            top: 80,
            bottom: 60,
            left: 40,
            width: 522
        };
        // all coords and widths are in jsPDF instance's declared units
        // 'inches' in this case
        pdf.fromHTML(
            source, // HTML string or DOM elem ref.
            margins.left, // x coord
            margins.top, { // y coord
                'width': margins.width, // max width of content on PDF
                'elementHandlers': specialElementHandlers
            },

            function (dispose) {
                // dispose: object with X, Y of the last line add to the PDF 
                //          this allow the insertion of new lines after html
                pdf.save('latevareserva.pdf');
            }, margins);

    };
    /*Tarjeta de credit*/
function validate(){
        card = document.getElementById('card').value;
        cardno = "/^(?:3[47][0-9]{13})$/";
  if(card.match(cardno)){
      return true;
  }
      else{
        alert("Not a valid Amercican Express credit card number!");
        return false;
    }
 
};

