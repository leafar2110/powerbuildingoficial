
$(window).scroll(function(){
  if( $(this).scrollTop() > 50 ){
    
          $('.navbar-inverse').addClass('navbar-inverse-black');
         
  } 

else {
    
   
      $('.navbar-inverse').removeClass('navbar-inverse-black');
      
  }
});


(function(){
    $('.carousel-showmanymoveone .item').each(function(){
      var itemToClone = $(this);
  
      for (var i=1;i<6;i++) {
        itemToClone = itemToClone.next();
  
        // wrap around if at end of item collection
        if (!itemToClone.length) {
          itemToClone = $(this).siblings(':first');
        }
  
        // grab item, clone, add marker class, add to collection
        itemToClone.children(':first-child').clone()
          .addClass("cloneditem-"+(i))
          .appendTo($(this));
      }
    });
  }());
  
  
    $('.carousel-hero-home').carousel({
    interval: 34300
  })
  


  
  $(document).ready(function () {
  
    'use strict';
    
     var c, currentScrollTop = 0,
         navbar = $('#menu');
  
     $(window).scroll(function () {
        var a = $(window).scrollTop();
        var b = navbar.height();
       
        currentScrollTop = a;
       
        if (c < currentScrollTop && a > b + b) {
          navbar.addClass("navbartop-hidden");
        } else if (c > currentScrollTop && !(a <= b)) {
          navbar.removeClass("navbartop-hidden");
        }
        c = currentScrollTop;
    });
    
  });


  var prevScrollpos = window.pageYOffset;
  window.onscroll = function() {
    var currentScrollPos = window.pageYOffset;
    if (prevScrollpos > currentScrollPos) {
      document.getElementById("menu-bottom").style.bottom = "0";
    } else {
      document.getElementById("menu-bottom").style.bottom = "-150px";
    }
    prevScrollpos = currentScrollPos;
  }



  jQuery(document).on('click','.mega-dropdown',function(e){e.stopPropagation()
  })
  



  $('.work-mode-ir-arriba').click(function(){
		$('body, html').animate({
			scrollTop: '0px'
		}, 1000);
	});
	
	
	  $('.ir-arriba').click(function(){
		$('body, html').animate({
			scrollTop: '0px'
		}, 1000);
	});
	
	$(window).scroll(function(){
		if( $(this).scrollTop() > 500 ){
			$('.ir-arriba').slideDown(300);
		} else {
			$('.ir-arriba').slideUp(300);
		}
	});



  $(".controls-filter-movil").click(function(){

    $("#content-filter-programs").toggleClass("open-content-filter-programs");
  });


  $(".controls-filter").click(function(){

    $("#content-filter-programs").toggleClass("close-content-filter-programs");
  });
 
// AJUSTES WOOCOMMERCE------------------------------------------------------- 
$('.woocommerce-shipping-fields:empty').hide();

// AJUSTES TOUCH CAROUSEL-------------------------------------------------------

var $this = $('#carousel-touch-product');
    if($('.itcp').length <4) {
      $("#constrols-itcp").hide(1000);
    } 


  $('.responsive').slick({
    dots: false,
    prevArrow: $('.prev'),
    nextArrow: $('.next'),
    infinite: false,
    speed: 600,
    slidesToShow: 3,
    slidesToScroll: 3,
    responsive: [

      {
        breakpoint: 992,
        settings: {
          slidesToShow: 2,
          slidesToScroll: 2,
          infinite: true,
        }
      },


      {
        breakpoint: 767,
        settings: {
          slidesToShow: 1,
          slidesToScroll: 1,
          infinite: true,
        }


        // You can unslick at a given breakpoint now by adding:
        // settings: "unslick"
        // instead of a settings object
      }]
  });
    //# sourceURL=pen.js



    $('.responsive2').slick({
      dots: false,
      prevArrow: $('.prev'),
      nextArrow: $('.next'),
      infinite: true,
      speed: 600,
      slidesToShow: 3,
      slidesToScroll: 3,
      responsive: [
  
        {
          breakpoint: 992,
          settings: {
            slidesToShow: 3,
            slidesToScroll: 2,
            infinite: false,
          }
        },
  
  
        {
          breakpoint: 767,
          settings: {
            slidesToShow: 1,
            slidesToScroll: 1,
            infinite: false,
          }
  
  
          // You can unslick at a given breakpoint now by adding:
          // settings: "unslick"
          // instead of a settings object
        }]
    });
      //# sourceURL=pen.js