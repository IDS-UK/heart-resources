/*
 * Slider Settings
 */
jQuery(document).ready(function(){
   jQuery('.widget_slider_area_rotate').bxSlider({
      mode: 'horizontal',
      speed: 1000,
      auto: true,
      pause: 3000,
      adaptiveHeight: false,
      nextText: '',
      prevText: '',
      nextSelector: '.slide-next',
      prevSelector: '.slide-prev',
      pager: false,
      tickerHover: true
   });
});