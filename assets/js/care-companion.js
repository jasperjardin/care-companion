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
    function care_companion_get_string( str = '', marker = '', section = 0 ) {
        return str.split( marker )[ section ];
    }

    function care_companion_absint( value ) {
        if ( value < 0 ) {
            return Math.abs( value );
        }
        return;
    }

    function care_companion_get_percentage( total, percentage ) {
        var percent = '';
        var circle = total;
        var percent_decimal = '';
        var circle_percent = '';

        if ( percentage > 0 ) {
            percent_decimal = percentage / 100;
            circle_percent = circle * percent_decimal;
            percent =  circle - circle_percent;

            return percent;

        } else {

            return 0;

        }
    }

    var $progress_bar_selector = $( '.care-companion-progress-bar' );

    if ( $progress_bar_selector.length >= 1 ) {
        $.each( $progress_bar_selector, function() {

            var __this = $(this);
            var __this_parent = __this.parents(".care-companion-donation-box");
            var progress_bar = '';
            var path = '';
            var circle = 301.635;
            var semi_circle = 150.818;
            var line = 100;

            var progress_offset = '';


            var form_id = care_companion_set_options( __this_parent, 'data-form-id', '' );
            var progress_symbol = care_companion_set_options( __this_parent, 'data-progress-symbol', '' );
            var progress_text = care_companion_set_options( __this_parent, 'data-progress-text', '' );
            var progress_text_size = care_companion_set_options( __this_parent, 'data-progress-text-size', '45px' );
            var progress_donation = care_companion_set_options( __this_parent, 'data-progress-donation', '0' );
            progress_donation = parseInt( progress_donation );

            var progress_color = care_companion_set_options( __this_parent, 'data-progress-color', '#eb543a' );
            var progress_fill = care_companion_set_options( __this_parent, 'data-progress-fill', 'rgba(0, 0, 0, 0.5)' );
            var progress_trail_color = care_companion_set_options( __this_parent, 'data-progress-trail-color', '#fff' );
            var progress_shape = care_companion_set_options( __this_parent, 'data-progress-shape', 'Circle' );
            var progress_stroke_width = care_companion_set_options( __this_parent, 'data-progress-stroke-width', '4' );
            var progress_trail_width = care_companion_set_options( __this_parent, 'data-progress-trail-width', '4' );
            var progress_transition_style = care_companion_set_options( __this_parent, 'data-progress-transition-style', 'easeInOut' );
            var progress_transition_duration = care_companion_set_options( __this_parent, 'data-progress-transition-duration', '1400' );

            var progress_advance_animation = care_companion_set_options( __this_parent, 'data-progress-advance-animation', 'false' );
            var progress_start_color = care_companion_set_options( __this_parent, 'data-progress-start-color', '#333' );
            var progress_start_width = care_companion_set_options( __this_parent, 'data-progress-start-width', '1' );
            var progress_end_color = care_companion_set_options( __this_parent, 'data-progress-end-color', '#333' );
            var progress_end_width = care_companion_set_options( __this_parent, 'data-progress-end-width', '1' );
/**
 * @todo remove progress_donation = 50
 */
if ( '2908' === form_id ) {
    progress_donation = 50;
}

            var progress_bar_width = care_companion_get_percentage( circle, progress_donation );

            if ( 'Circle' === progress_shape ) {
                progress_offset = circle;
                if ( 0 === progress_donation ) {
                    progress_bar_width = progress_offset;
                }
            }

            if ( 'SemiCircle' === progress_shape ) {
                progress_bar_width = care_companion_get_percentage( semi_circle, progress_donation );
                progress_offset = semi_circle;
                if ( 0 === progress_donation ) {
                    progress_bar_width = progress_offset;
                }
            }

            if ( 'Line' === progress_shape ) {
                progress_bar_width = 100 - progress_donation;
                progress_offset = line;
                if ( 0 === progress_donation ) {
                    progress_bar_width = progress_offset;
                }
            }

            __this.css( 'font-size', progress_text_size );
            /**
             * @todo remove var svg
             */
            var svg = __this.height();

            var $settings = {
                color: progress_color,
                trailColor: progress_trail_color,
                strokeWidth: parseInt( progress_stroke_width ),
                trailWidth: parseInt( progress_trail_width ),
                easing: progress_transition_style,
                easing: progress_transition_style,
                duration: parseInt( progress_transition_duration ),
                svgStyle: null,
                text: {
                    autoStyleContainer: true,
                    style: {
                        // Text color.
                        // Default: same as stroke color (options.color)
                        color: progress_trail_color,
                        position: ' ',
                        left: ' ',
                        top: ' ',
                        padding: 0,
                        margin: 0,
                        // You can specify styles which will be browser prefixed
                        transform: {
                            prefix: true,
                            value: ' '
                        }
                    }
                },
                fill: progress_fill,

                from: {
                    color: progress_color,
                    width: parseInt( progress_stroke_width ),
                    offset: progress_offset
                },
                to: {
                    color: progress_color,
                    width: parseInt( progress_stroke_width ),
                    offset: progress_bar_width
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
                    progress_loader.path.setAttribute(
                        'stroke-dashoffset',
                        state.offset
                    );

                    var value = Math.round(progress_loader.value() * 100);

                    var percentage = '<span class="percentage-text">' + value + progress_symbol + '</span>';
                    var complated_text = '';

                    if ( '' !== progress_text ) {
                        complated_text = '<span class="completed-text">' + progress_text + '</span>';
                    }

                    if ( 0 === value ) {
                        percentage = '<span class="percentage-text">0' + progress_symbol + '</span>';
                        progress_loader.setText( percentage + complated_text);
                    } else {
                        progress_loader.setText( percentage + complated_text);
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
                        width: parseInt( progress_start_width ),
                        offset: __this.width()
                    },
                    to: {
                        color: progress_end_color,
                        width: parseInt( progress_end_width ),
                        offset: progress_bar_width
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
                        progress_loader.path.setAttribute(
                            'stroke-dashoffset',
                            state.offset
                        );

                        var value = Math.round(progress_loader.value() * 100);
                        var percentage = '<span class="percentage-text">' + value + progress_symbol + '</span>';
                        var complated_text = '';

                        if ( '' !== progress_text ) {
                            complated_text = '<span class="completed-text">' + progress_text + '</span>';
                        }

                        if ( 0 === value ) {
                            percentage = '<span class="percentage-text">0' + progress_symbol + '</span>';
                            progress_loader.setText( percentage + complated_text);
                        } else {
                            progress_loader.setText( percentage + complated_text);
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

            if ( 'Heart' === progress_shape ) {
                path = '#care-companion-heart-shape-loader';
            }
            if ( 'Triangle' === progress_shape ) {
                path = '#care-companion-triangle-shape-loader';
            }
            if ( 'Square' === progress_shape ) {
                path = '#care-companion-square-shape-loader';
            }

            if ( 'Square' === progress_shape || 'Triangle' === progress_shape || 'Heart' === progress_shape ) {
                progress_bar = new ProgressBar.Path( path, $settings );
            }

            progress_bar.animate(1.0);  // Number from 0.0 to 1.0

        });
    }

});
