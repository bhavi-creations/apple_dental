 AOS.init({
 	duration: 800,
 	easing: 'slide'
 });

 swiper.on('slideChangeTransitionEnd', function () {
	AOS.refresh();
  });
  
  
  AOS.init({ disable: false });
(function($) {

	"use strict";

	$(window).stellar({
    responsive: true,
    parallaxBackgrounds: true,
    parallaxElements: true,
    horizontalScrolling: false,
    hideDistantElements: false,
    scrollProperty: 'scroll',
    horizontalOffset: 0,
	  verticalOffset: 0
  });


	var fullHeight = function() {

		$('.js-fullheight').css('height', $(window).height());
		$(window).resize(function(){
			$('.js-fullheight').css('height', $(window).height());
		});

	};
	fullHeight();

	// loader
	var loader = function() {
		setTimeout(function() { 
			if($('#ftco-loader').length > 0) {
				$('#ftco-loader').removeClass('show');
			}
		}, 1);
	};
	loader();

	// Scrollax
   $.Scrollax();

	var carousel = function() {
		$('.home-slider').owlCarousel({
	    loop:true,
	    autoplay: true,
	    margin:0,
	    animateOut: 'fadeOut',
	    animateIn: 'fadeIn',
	    nav:false,
	    autoplayHoverPause: false,
	    items: 1,
	    navText : ["<span class='ion-md-arrow-back'></span>","<span class='ion-chevron-right'></span>"],
	    responsive:{
	      0:{
	        items:1,
	        nav:false
	      },
	      600:{
	        items:1,
	        nav:false
	      },
	      1000:{
	        items:1,
	        nav:false
	      }
	    }
		});
		$('.carousel-testimony').owlCarousel({
			center: true,
			loop: true,
			items:1,
			margin: 30,
			stagePadding: 0,
			nav: true,
			navText: ['<span class="ion-ios-arrow-back">', '<span class="ion-ios-arrow-forward">'],
			responsive:{
				0:{
					items: 1
				},
				600:{
					items: 1
				},
				1000:{
					items: 1
				}
			}
		});

	};
	carousel();

	$('nav .dropdown').hover(function(){
		var $this = $(this);
		// 	 timer;
		// clearTimeout(timer);
		$this.addClass('show');
		$this.find('> a').attr('aria-expanded', true);
		// $this.find('.dropdown-menu').addClass('animated-fast fadeInUp show');
		$this.find('.dropdown-menu').addClass('show');
	}, function(){
		var $this = $(this);
			// timer;
		// timer = setTimeout(function(){
			$this.removeClass('show');
			$this.find('> a').attr('aria-expanded', false);
			// $this.find('.dropdown-menu').removeClass('animated-fast fadeInUp show');
			$this.find('.dropdown-menu').removeClass('show');
		// }, 100);
	});


	$('#dropdown04').on('show.bs.dropdown', function () {
	  console.log('show');
	});

	// scroll
	var scrollWindow = function() {
		$(window).scroll(function(){
			var $w = $(this),
					st = $w.scrollTop(),
					navbar = $('.ftco_navbar'),
					sd = $('.js-scroll-wrap');

			if (st > 150) {
				if ( !navbar.hasClass('scrolled') ) {
					navbar.addClass('scrolled');	
				}
			} 
			if (st < 150) {
				if ( navbar.hasClass('scrolled') ) {
					navbar.removeClass('scrolled sleep');
				}
			} 
			if ( st > 350 ) {
				if ( !navbar.hasClass('awake') ) {
					navbar.addClass('awake');	
				}
				
				if(sd.length > 0) {
					sd.addClass('sleep');
				}
			}
			if ( st < 350 ) {
				if ( navbar.hasClass('awake') ) {
					navbar.removeClass('awake');
					navbar.addClass('sleep');
				}
				if(sd.length > 0) {
					sd.removeClass('sleep');
				}
			}
		});
	};
	scrollWindow();

	
	var counter = function() {
		
		$('#section-counter').waypoint( function( direction ) {

			if( direction === 'down' && !$(this.element).hasClass('ftco-animated') ) {

				var comma_separator_number_step = $.animateNumber.numberStepFactories.separator(',')
				$('.number').each(function(){
					var $this = $(this),
						num = $this.data('number');
						console.log(num);
					$this.animateNumber(
					  {
					    number: num,
					    numberStep: comma_separator_number_step
					  }, 7000
					);
				});
				
			}

		} , { offset: '95%' } );

	}
	counter();

	var contentWayPoint = function() {
		var i = 0;
		$('.ftco-animate').waypoint( function( direction ) {

			if( direction === 'down' && !$(this.element).hasClass('ftco-animated') ) {
				
				i++;

				$(this.element).addClass('item-animate');
				setTimeout(function(){

					$('body .ftco-animate.item-animate').each(function(k){
						var el = $(this);
						setTimeout( function () {
							var effect = el.data('animate-effect');
							if ( effect === 'fadeIn') {
								el.addClass('fadeIn ftco-animated');
							} else if ( effect === 'fadeInLeft') {
								el.addClass('fadeInLeft ftco-animated');
							} else if ( effect === 'fadeInRight') {
								el.addClass('fadeInRight ftco-animated');
							} else {
								el.addClass('fadeInUp ftco-animated');
							}
							el.removeClass('item-animate');
						},  k * 50, 'easeInOutExpo' );
					});
					
				}, 100);
				
			}

		} , { offset: '95%' } );
	};
	contentWayPoint();


	// navigation
	var OnePageNav = function() {
		$(".smoothscroll[href^='#'], #ftco-nav ul li a[href^='#']").on('click', function(e) {
		 	e.preventDefault();

		 	var hash = this.hash,
		 			navToggler = $('.navbar-toggler');
		 	$('html, body').animate({
		    scrollTop: $(hash).offset().top
		  }, 700, 'easeInOutExpo', function(){
		    window.location.hash = hash;
		  });


		  if ( navToggler.is(':visible') ) {
		  	navToggler.click();
		  }
		});
		$('body').on('activate.bs.scrollspy', function () {
		  console.log('nice');
		})
	};
	OnePageNav();


	// magnific popup
	$('.image-popup').magnificPopup({
    type: 'image',
    closeOnContentClick: true,
    closeBtnInside: false,
    fixedContentPos: true,
    mainClass: 'mfp-no-margins mfp-with-zoom', // class to remove default margin from left and right side
     gallery: {
      enabled: true,
      navigateByImgClick: true,
      preload: [0,1] // Will preload 0 - before current, and 1 after the current image
    },
    image: {
      verticalFit: true
    },
    zoom: {
      enabled: true,
      duration: 300 // don't foget to change the duration also in CSS
    }
  });

  $('.popup-youtube, .popup-vimeo, .popup-gmaps').magnificPopup({
    disableOn: 700,
    type: 'iframe',
    mainClass: 'mfp-fade',
    removalDelay: 160,
    preloader: false,

    fixedContentPos: false
  });

  $('.appointment_date').datepicker({
	  'format': 'm/d/yyyy',
	  'autoclose': true
	});
	$('.appointment_time').timepicker();



})(jQuery);


    // Change navbar background on scroll
    window.addEventListener('scroll', function () {
		const navbar = document.querySelector('.navbar');
		if (window.scrollY > 50) {
		  navbar.classList.add('scrolled');
		} else {
		  navbar.classList.remove('scrolled');
		}
	  });
  
	  $(document).ready(function() {
		$('.home-slider').owlCarousel({
		  items: 1,
		  loop: true,
		  autoplay: true,
		  autoplayTimeout: 5000,
		  nav: false,
		  dots: true,
		  animateOut: 'fadeOut',
		  animateIn: 'fadeIn',
		  smartSpeed: 1000
		});
	  });
  
  
  
  
  //<!--counter-->
  
  
  document.addEventListener("DOMContentLoaded", function () {
	  const counters = document.querySelectorAll(".number");
  
	  counters.forEach(counter => {
		const updateCount = () => {
		  const target = +counter.getAttribute("data-number");
		  const count = +counter.innerText;
  
		  const increment = Math.ceil(target / 100);
  
		  if (count < target) {
			counter.innerText = count + increment;
			setTimeout(updateCount, 30);
		  } else {
			counter.innerText = target;
		  }
		};
  
		updateCount();
	  });
	});
  
  
	document.addEventListener("DOMContentLoaded", function () {
	  const counters = document.querySelectorAll(".dsdl5-number");
  
	  const animateCounters = () => {
		counters.forEach((counter) => {
		  const updateCount = () => {
			const target = +counter.getAttribute("data-number");
			const count = +counter.innerText;
  
			const increment = Math.ceil(target / 100);
  
			if (count < target) {
			  counter.innerText = count + increment;
			  setTimeout(updateCount, 30);
			} else {
			  counter.innerText = target;
			}
		  };
  
		  const observer = new IntersectionObserver(
			(entries, observer) => {
			  entries.forEach((entry) => {
				if (entry.isIntersecting) {
				  updateCount();
				  observer.unobserve(entry.target); // Stop observing once animation starts
				}
			  });
			},
			{ threshold: 0.5 }
		  );
  
		  observer.observe(counter);
		});
	  };
  
	  animateCounters();
	});
  
  
  
  
  
  
  
  //  why choose us
  
	document.addEventListener('DOMContentLoaded', function() {
	const slides = document.querySelectorAll('.whychoose-singleslide');
	let currentSlide = 0;
  
	function showSlide(index) {
	  slides.forEach((slide, i) => {
		slide.style.transform = `translateX(-${index * 100}%)`;
	  });
	}
  
	setInterval(() => {
	  currentSlide = (currentSlide + 1) % slides.length;
	  showSlide(currentSlide);
	}, 3000);
  });
  
  // ----------------------Active link----------------------
  
  document.querySelectorAll('.navbar .navbar-nav .nav-link').forEach(link => {
	  link.addEventListener('click', () => {
		  // Remove active class from all links
		  document.querySelectorAll('.navbar .navbar-nav .nav-item').forEach(item => {
			  item.classList.remove('active');
		  });
		  
		  // Add active class to the clicked link's parent
		  link.closest('.nav-item').classList.add('active');
	  });
  });
  
//--------------testimoniels------------------------------
$(document).ready(function () {
	// Left Carousel
	$(".left-carousel").owlCarousel({
	  items: 1, // Display 1 item at a time
	  loop: true,
	  autoplay: true,
	  autoplayTimeout: 5000,
	  margin: 10,
	  dots: true,
	});
  
	// Right Carousel
	$(".right-carousel").owlCarousel({
	  items: 1, // Display 1 item at a time
	  loop: true,
	  autoplay: true,
	  autoplayTimeout: 5000,
	  margin: 10,
	  dots: true,
	});
  });
  
  
  //achievements-----------------
  document.addEventListener("DOMContentLoaded", function () {
    const counters = document.querySelectorAll(".number");

    counters.forEach(counter => {
      const updateCount = () => {
        const target = +counter.getAttribute("data-number");
        const count = +counter.innerText;

        const increment = Math.ceil(target / 100);

        if (count < target) {
          counter.innerText = count + increment;
          setTimeout(updateCount, 30);
        } else {
          counter.innerText = target;
        }
      };

      updateCount();
    });
  });

  //----------doctors slides-------------
  var swiper = new Swiper('.dsdl-swiper-container', {
    slidesPerView: 1, // Single slide on mobile for clarity
    spaceBetween: 20,
    loop: true,
    pagination: {
      el: '.swiper-pagination',
      clickable: true,
    },
    autoplay: {
      delay: 3000,
      disableOnInteraction: false,
    },
    breakpoints: {
      768: {
        slidesPerView: 2,
        spaceBetween: 20,
      },
      1024: {
        slidesPerView: 3,
        spaceBetween: 30,
      },
    },
  });

swiper.on('slideChangeTransitionEnd', function () {
  AOS.refresh();
});


AOS.init({ disable: false });
// appointment booking form---------------

document.getElementById('appointment-form').addEventListener('submit', function (event) {
    event.preventDefault(); // Prevent normal form submission

    // Gather form data
    const name = document.getElementById('appointment_name').value;
    const email = document.getElementById('appointment_email').value;
    const date = document.getElementById('appointment_date').value;
    const time = document.getElementById('appointment_time').value;
    const phone = document.getElementById('phone').value;
    const department = document.getElementById('department').value;

    // Validate form fields
    if (name && email && date && time && phone && department) {
        if (!confirm('Do you want to confirm your appointment?')) {
            return; // Exit if user cancels
        }

        // Create a FormData object for AJAX submission
        const formData = new FormData();
        formData.append('name', name);
        formData.append('email', email);
        formData.append('date', date);
        formData.append('time', time);
        formData.append('phone', phone);
        formData.append('department', department);

        // Send form data via AJAX
        fetch('submit_appointment.php', {
            method: 'POST',
            body: formData,
        })
            .then((response) => response.text())
            .then((message) => {
                const formMessage = document.getElementById('form-message');
                formMessage.style.display = 'block';
                formMessage.textContent = message;
                formMessage.style.color = '#28a745';

                // Clear form fields
                document.getElementById('appointment-form').reset();
            })
            .catch((error) => {
                alert('There was an error submitting your appointment. Please try again.');
                console.error(error);
            });
    } else {
        alert('Please fill in all the fields correctly!');
    }
});



