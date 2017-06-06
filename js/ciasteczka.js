//Komunikat cookies
$(document).ready(function() {

	if ( jQuery.cookie("cookie_agree") === undefined ){
	    //Treść komunikatu
	    var cookiesInfo = '<div id="cookie-law"><div class="cookiesrodek">\
	        <a class="close-cookie-banner" title="Zamknij komunikat o cookies"><span>Zamknij</span></a>\
	        <p>\
	        Ta witryna używa plików cookies do zapewnienia Ci maksymalnego komfortu przeglądania. \
	        Kontynuując przeglądanie naszej witryny bez zmiany ustawień przeglądarki, wyrażasz zgodę na użycie \
	        plików cookie. Zawsze możesz zmienić ustawienia przeglądarki i&nbsp;zablokować te pliki.\
	        </p>\
	    </div></div>';
	    jQuery('body').append(cookiesInfo);
	    jQuery('#cookie-law a.close-cookie-banner').click(function(){
	        jQuery.cookie("cookie_agree", "1" , { expires: 3650 });
	        jQuery('#cookie-law').remove();
	        return false;
	    });
	}

});