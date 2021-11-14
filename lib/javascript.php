<?php
// add_filter( 'script_loader_tag', 'add_attribs_to_scripts', 10, 3 );
function add_attribs_to_scripts( $tag, $handle, $src ) {

$load_scripts = array(
    '_themename-isotope',
    '_themename-jquery',
);

// The handles of the enqueued scripts we want to defer
// $async_scripts = array(
//     'jquery-migrate',
//     'sharethis',
// );
//
// $defer_scripts = array(
//     'contact-form-7',
//     'jquery-form',
//     'wpdm-bootstrap',
//     'frontjs',
//     'jquery-choosen',
//     'fancybox',
//     'jquery-colorbox',
//     'search'
// );

// $jquery = array(
//     'jquery'
// );

if ( in_array( $handle, $load_scripts ) ) {
    return '<script src="' . $src . '" async="async" onload="verifiyCDNLoad()" type="text/javascript"></script>' . "\n";
}

// if ( in_array( $handle, $defer_scripts ) ) {
//     return '<script src="' . $src . '" defer="defer" type="text/javascript"></script>' . "\n";
// }
// if ( in_array( $handle, $async_scripts ) ) {
//     return '<script src="' . $src . '" async="async" type="text/javascript"></script>' . "\n";
// }
// if ( in_array( $handle, $jquery ) ) {
//     return '<script src="' . $src . '" integrity="sha256-ZosEbRLbNQzLpnKIkEdrPv7lOy9C27hHQ+Xp8a4MxAQ=" crossorigin="anonymous" type="text/javascript"></script>' . "\n";
// }
return $tag;
}
