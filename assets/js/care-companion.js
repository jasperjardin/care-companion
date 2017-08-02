jQuery(document).ready( function($) {
    "use strict";

    // SemiCircle
    // Circle
    // Line

    // var circle = new ProgressBar.SemiCircle('#care-companion-progress-bar', {
    //     color: '#FCB03C',
    //     duration: 3000,
    //     easing: 'easeInOut',
    //     strokeWidth: 6,
    //     easing: 'easeInOut',
    //     duration: 1400,
    //     color: '#FFEA82',
    //     trailColor: '#eee',
    //     trailWidth: 1,
    //     svgStyle: null
    // });
    //
    // circle.animate(1);

    function care_companion_set_options( $selector = '', $attr_selector = '', $default_value = '' ) {
        return ( $selector.attr( $attr_selector ) !== undefined && $selector.attr( $attr_selector ).length >= 1 ) ? $selector.attr( $attr_selector ) : $default_value;
    }

    var $progress_bar_selector = $( '#care-companion-progress-bar' );

    if ( $progress_bar_selector.length >= 1 ) {
        $.each( $progress_bar_selector, function() {

            var __this = $(this);
            var __this_parent = __this.parents(".care-companion");
            var progress_bar = '';

            var progress_symbol = care_companion_set_options( __this_parent, 'data-progress-symbol', '' );
            var progress_text_size = care_companion_set_options( __this_parent, 'data-progress-text-size', '18px' );
            var progress_donation = care_companion_set_options( __this_parent, 'data-progress-donation', '0' );

            var progress_color = care_companion_set_options( __this_parent, 'data-progress-color', '#eb543a' );
            var progress_trail_color = care_companion_set_options( __this_parent, 'data-progress-trail-color', '#eee' );
            var progress_shape = care_companion_set_options( __this_parent, 'data-progress-shape', 'Circle' );
            var progress_stroke_width = care_companion_set_options( __this_parent, 'data-progress-stroke-width', '4' );
            var progress_trail_width = care_companion_set_options( __this_parent, 'data-progress-trail-width', '1' );
            var progress_transition_style = care_companion_set_options( __this_parent, 'data-progress-transition-style', 'easeInOut' );
            var progress_transition_duration = care_companion_set_options( __this_parent, 'data-progress-transition-duration', '1400' );

            var progress_advance_animation = care_companion_set_options( __this_parent, 'data-progress-advance-animation', 'false' );
            var progress_start_color = care_companion_set_options( __this_parent, 'data-progress-start-color', '#333' );
            var progress_start_width = care_companion_set_options( __this_parent, 'data-progress-start-width', '1' );
            var progress_end_color = care_companion_set_options( __this_parent, 'data-progress-end-color', '1' );
            var progress_end_width = care_companion_set_options( __this_parent, 'data-progress-end-width', '1' );

            __this.css( 'font-size', progress_text_size );

            var $settings = {
                color: progress_color,
                trailColor: progress_trail_color,
                strokeWidth: parseInt( progress_stroke_width ),
                trailWidth: parseInt( progress_trail_width ),
                easing: progress_transition_style,
                duration: parseInt( progress_transition_duration ),
                svgStyle: null,
                text: {
                    autoStyleContainer: true
                },
                from: {
                    color: progress_color,
                    width: parseInt( progress_stroke_width )
                },
                to: {
                    color: progress_color,
                    width: parseInt( progress_stroke_width )
                },
                step: function( state, progress_loader ) {
                    progress_loader.path.setAttribute(
                        'stroke',
                        state.color
                    );
                    progress_loader.path.setAttribute(
                        'stroke-width',
                        state.width
                    );

                    var value = Math.round( progress_loader.value() * 100 );

                    if ( 0 === value ) {
                        progress_loader.setText( '0%');
                    } else {
                        progress_loader.setText(value + '%');
                    }

                }
            };
            if ( 'true' === progress_advance_animation ) {
                $settings = {
                    color: progress_color,

                    trailColor: progress_trail_color,
                    strokeWidth: parseInt( progress_stroke_width ),
                    trailWidth: parseInt( progress_trail_width ),
                    easing: progress_transition_style,
                    duration: parseInt( progress_transition_duration ),
                    text: {
                        autoStyleContainer: true
                    },
                    from: {
                        color: progress_start_color,
                        width: parseInt( progress_start_width )
                    },
                    to: {
                        color: progress_end_color,
                        width: parseInt( progress_end_width )
                    },
                    // Set default step function for all animate calls
                    step: function( state, progress_loader ) {
                        progress_loader.path.setAttribute(
                            'stroke',
                            state.color
                        );
                        progress_loader.path.setAttribute(
                            'stroke-width',
                            state.width
                        );
                        console.log(state);
                        var value = Math.round( progress_loader.value() * 100 );

                        if ( 0 === value ) {
                            progress_loader.setText( '0%');
                        } else {
                            progress_loader.setText(value + '%');
                        }

                    }
                }
            }

            if ( 'Line' === progress_shape ) {
                progress_bar = new ProgressBar.Line( this, $settings );
            }
            if ( 'Circle' === progress_shape ) {
                progress_bar = new ProgressBar.Circle( this, $settings );
            }
            if ( 'SemiCircle' === progress_shape ) {
                progress_bar = new ProgressBar.SemiCircle( this, $settings );
            }
            if ( 'Square' === progress_shape || 'Triangle' === progress_shape || 'Heart' === progress_shape ) {
                progress_bar = new ProgressBar.Path( this, $settings );
            }


            progress_bar.animate(1.0);  // Number from 0.0 to 1.0

            // var bar = new ProgressBar.Path('#heart-path', {
            //   easing: 'easeInOut',
            //   duration: 1400
            // });
            //
            // bar.set(0);
            // bar.animate(1);  // Number from 0.0 to 1.0
        });
    }

});
