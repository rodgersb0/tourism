/*!
 * Contact Buttons Plugin Demo 0.1.0
 * https://github.com/joege/contact-buttons-plugin
 *
 * Copyright 2015, José Gonçalves
 *
 * Licensed under the MIT license:
 * http://www.opensource.org/licenses/MIT
 */
 
// Google Fonts
WebFontConfig = {
  google: { families: [ 'Lato:400,700,300:latin' ] }
};
(function() {
  var wf = document.createElement('script');
  wf.src = ('https:' == document.location.protocol ? 'https' : 'http') +
    '://ajax.googleapis.com/ajax/libs/webfont/1/webfont.js';
  wf.type = 'text/javascript';
  wf.async = 'true';
  var s = document.getElementsByTagName('script')[0];
  s.parentNode.insertBefore(wf, s);
})();

// Initialize Share-Buttons
$.contactButtons({
  effect  : 'slide-on-scroll',
  buttons : {
    'facebook':   { class: 'facebook', use: true, link: 'https://www.facebook.com/kalimalima.fox', extras: 'target="_blank"' },
    'linkedin':   { class: 'linkedin', use: true, link: 'https://www.linkedin.com/in/rodgers-missili-58834990/' },
	'instagram':     { class: 'instagram',    use: true, link: 'https://www.instagram.com/rodgersb099' },
	'twitter':     { class: 'twitter',    use: true, link: 'https://www.twitter.com/' },
    'google':     { class: 'gplus',    use: true, link: 'https://plus.google.com/101079894566123972174' },
    //'mybutton':   { class: 'git',      use: true, link: 'https://github.com/rodgersb0', icon: 'github', title: 'My title for the button' },
    'phone':      { class: 'phone separated',    use: true, link: '+265 884752230' },
    'email':      { class: 'email',    use: true, link: 'Rodgersb0@gmail.com' }
  }
});