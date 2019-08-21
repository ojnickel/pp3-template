jQuery(document).ready(function($) {
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
