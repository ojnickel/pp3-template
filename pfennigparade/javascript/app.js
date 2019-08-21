jQuery(document).ready(function($) {
  // Cookie-Hinweis.
  function cookiebar_open() {
    if (document.cookie.indexOf('cookiebar_closed=true') >= 0) {
      return false;
    }
    return true;
  }

  if (cookiebar_open()) {
    jQuery('.cookies').show();
  }

  jQuery('#cookie_info').click(function() {
    jQuery('.cookies').hide();
    set_cookie('cookiebar_closed', 365);
  });

  jQuery('#cookie_close').click(function(e) {
    e.preventDefault();
    jQuery('.cookies').hide();
    set_cookie('cookiebar_closed', 365);
  });

  function set_cookie(name, days) {
    var date, expires;
    date = new Date();
    date.setTime(date.getTime()+(days*24*60*60*1000));
    expires = " expires="+date.toGMTString();
    document.cookie = name+"=true; path=/;"+expires;
  }
 //OPEN BOX
  var liste = jQuery("#wohnenppkarte li");
  var index;
  liste.click(function() {
	index = jQuery( "#wohnenppkarte li" ).index( this );
    jQuery("#wohnenppkarte .a" + index).toggle();
    jQuery("#wohnenppkarte .karte").css( "visibility", "hidden" );
    jQuery("#wohnenppkarte .karte-legende").css( "display", "none" );
    jQuery("#wohnenppkarte li.wklink").css( "display", "none" );
  });

  //CLOSE BOX
  var close = jQuery("#wohnenppkarte section .schliessen");
  close.click(function() {
    jQuery("#wohnenppkarte section").css( "display", "none" );
    index = index + 1;
    jQuery( "#wohnenppkarte li:eq(" + index + ") a" ).focus();
    jQuery("#wohnenppkarte .karte").css( "visibility", "");
    jQuery("#wohnenppkarte .karte-legende").css( "display", "");
    jQuery("#wohnenppkarte li.wklink").css( "display", "" );
  });
  /*close.focusout(function() {
    jQuery("#wohnenppkarte section").css( "display", "none" );
    jQuery("#wohnenppkarte .karte").css( "visibility", "");
    jQuery("#wohnenppkarte .karte-legende").css( "display", "");
    jQuery("#wohnenppkarte li.wklink").css( "display", "" );
  });*/
});
