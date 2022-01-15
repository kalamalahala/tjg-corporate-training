<?
add_filter( 'gform_pre_send_email', 'before_email', 10, 4 );

function before_email( $email ) {
    $addresses = $email['to'];
    //strip ending commas to help filter CJ emails
    $exploder = explode ( $addresses, ',' );

    GFCommon::log_debug( __METHOD__ .  'list of email addresses: ' . print_r($exploder));
    foreach ( $exploder as $csv ) {
        if ( empty( $csv ) ) {
            $email['to'] = rtrim($email['to'], ',');
        }
    }
    // $email['to'] = 'test@somedomain.com';
    return $email;
}


?>