<?php

add_shortcode ( 'agent_level_gravity_view', 'agent_level_gravity_view' );

/**
 * Returns a gravity view ID for the currently logged in Agent, or the one specified by agent_id
 *
 * @param int $atts the ID of the Gravity View
 * @return string the Gravity View Shortcode
 */
function agent_level_gravity_view ( $atts ) {
    // init string
    $gravityViewShortcode = '';

    // get ID from shortcode parameter view_id
    $atts = shortcode_atts ( array (
        'view_id' => '',
        'field_id' => '',
    ), $atts, 'agent_level_gravity_view' );

    // agent_id parameter logic to get current agent number or a specified one
    if ( !isset ( $_GET['agent_id'] ) ) {
        $userToQuery = get_current_user_id();
        $agentNumber = get_user_meta( $userToQuery, 'agent_number', true );
        } else {
            $agentNumber = $_GET['agent_id'];
        }
    
    // build shortcode with:
    // $atts['view_id'] - the ID of the gravity view
    // $atts['field_id'] - the ID of the form field to filter by, must enter manually, but may omit
    // $agentNumber - the 5 digit agent number as acquired above 
    $gravityViewShortcode = do_shortcode('[gravityview id="' . $atts['view_id'] . '" search_field="' . $atts['field_id'] . '" search_value="' . $agentNumber . '"]');

    // return gravityview Shortdoee
    return $gravityViewShortcode;
}




?>