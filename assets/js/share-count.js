/**
 * This file handles the calculations of the number of shares on each single Form.
 *
 * @since 1.0
 */
jQuery( document ).ready(
function( $ ) {
    'use strict';
	// Request share count via Facebook Graph.
	$.ajax( {
		url: 'http://graph.facebook.com/',
		data: {
			id: window.location.href
		},
		success: function( http_response ) {
			if ( http_response.share ) {
				var  share_count = http_response.share.share_count;
				$( '#care-companion-share-count' ).html( share_count.toLocaleString( 'en-US', { minimumFractionDigits: 0 } ) );
			} else {
				$( '#care-companion-share-count' ).html( '0' );
			}
		}
	} );

    var form_ids = care_companion_sharer_js_vars.form_ids;
    var id, form_id = '';
    var classes = '.care-companion-donation-box, .care-companion-recent-campaigns, .care-companion-successful-campaigns';

    // Sharer
    $('.facebook-share a').click(function(e){
        e.preventDefault();

        form_id = $( this ).parents( classes ).attr( 'data-form-id' );
        id = 'form_' + form_id;

        CareCompanionSharerPopup( care_companion_sharer_js_vars[id].fb_sharer_url );
    });
    // TWitter
    $('.twitter-share a').click(function(e){
        e.preventDefault();

        form_id = $( this ).parents( classes ).attr( 'data-form-id' );
        id = 'form_' + form_id;

        CareCompanionSharerPopup( care_companion_sharer_js_vars[id].tw_sharer_url );
    });

    // LinkedIn
    $('.linkedin-share a').click(function(e){
        e.preventDefault();

        form_id = $( this ).parents( classes ).attr( 'data-form-id' );
        id = 'form_' + form_id;

        CareCompanionSharerPopup( care_companion_sharer_js_vars[id].li_sharer_url );
    });

    //Google+
    $('.google-plus-share a').click(function(e){
        e.preventDefault();

        form_id = $( this ).parents( classes ).attr( 'data-form-id' );
        id = 'form_' + form_id;

        CareCompanionSharerPopup( care_companion_sharer_js_vars[id].gp_sharer_url );
    });

    // Redit
    $('.reddit-share a').click(function(e){
        e.preventDefault();

        form_id = $( this ).parents( classes ).attr( 'data-form-id' );
        id = 'form_' + form_id;

        CareCompanionSharerPopup( care_companion_sharer_js_vars[id].rd_sharer_url );
    });

    function CareCompanionSharerPopup( url ) {

        var winTop = ( screen.height / 2 ) - ( 520 / 2 );
        var winLeft = ( screen.width / 2 ) - ( 350 / 2 );

        window.open( url, 'sharer', 'top='+winTop + ',left=' + winLeft
            + ',toolbar=0,status=0,width=520,height=350'
        );
    }
});
