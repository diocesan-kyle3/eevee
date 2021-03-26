jQuery(document).ready(($)=>{
  $('.page-template-homepage .hero-slider').slick({
    autoplay: true,
    arrows: true,
    autoplaySpeed: 5000,
    cssEase: 'linear',
    dots: true,
    fade: true,
    infinite: true,
    slidesToShow: 1,
    slidesToScroll: 1,
    responsive: [{
      breakpoint: 600,
      settings: {
        autoplay: false,
        arrows: false,
        dots: true,
        infinite: true,
        slidesToShow: 1,
        slidesToScroll: 1,
      }
    }],
  });

  // $(window).on('resize orientationchange', ()=>{ $('.page-template-homepage .hero-slider').slick('resize') });
});
