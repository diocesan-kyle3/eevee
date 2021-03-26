jQuery(document).ready(($)=>{
  // assign utility classes to menu
  $('.main-navigation a').addClass('has-primary-color-hover has-quaternary-background-color-hover font-header');
  $('.main-navigation .sub-menu').addClass('has-quaternary-background-color');
  $('.main-navigation .sub-menu .sub-menu').addClass('has-primary-border-color');

  // utility classes for Mega Menu
  $('.mega-menu-enabled .has-mega-menu .sub-menu').removeClass('has-primary-background-color');
    $('.mega-menu-enabled .has-mega-menu > .sub-menu .menu-item').removeClass('has-primary-background-color-hover has-secondary-background-color-hover has-tertiary-background-color-hover has-quaternary-background-color-hover has-white-background-color-hover');
      $('.mega-menu-enabled .has-mega-menu > .sub-menu .menu-item .menu-link').removeClass('has-white-color has-white-color-hover').addClass('has-secondary-color-hover');
      $('.mega-menu-enabled .has-mega-menu > .sub-menu > .menu-item > .menu-link').addClass('has-quaternary-border-color');

  // style input fields on forms
  $('.gform_body input, .gform_body textarea').addClass('font-main');

  // style submit button on forms
  $('.gform_footer input[type="submit"]').addClass('button-primary');

  // style .mega-menu-links
  $('.main-navigation .acf-mega-menu .has-mega .mega-menu .mega-menu-links a').removeClass('has-secondary-color-hover');
});
