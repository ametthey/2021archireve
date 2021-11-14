<?php
/**
* ACF Form: Deregister ACF style
*/
add_action('wp_print_styles', 'hwk_acf_form_deregister_styles', 99);
function hwk_acf_form_deregister_styles(){
    wp_deregister_style('acf');
    wp_deregister_style('acf-field-group');
    wp_deregister_style('acf-global');
    wp_deregister_style('acf-input');
    wp_deregister_style('acf-datepicker');
}

/**
* ACF Form: Elements Class
*/
add_filter('acf/load_field', 'hwk_acf_form_field_class');
function hwk_acf_form_field_class($field){
    if(is_admin() || wp_doing_ajax())
        return $field;

    $field['wrapper']['class'] .= ' col-12 form-group';

    if($field['type'] != 'checkbox')
        $field['class'] .= ' form-control';

    return $field;
}

/**
* ACF Form: Default form args
*/
add_filter('acf/validate_form', 'hwk_acf_form_args');
function hwk_acf_form_args($args){
    if(is_admin() || wp_doing_ajax())
        return $args;

    if(!$args['html_before_fields'])
        $args['html_before_fields'] = '<div class="row">';

    if(!$args['html_after_fields'])
        $args['html_after_fields'] = '</div>';

    if($args['html_updated_message'] == '<div id="message" class="updated"><p>%s</p></div>')
        $args['html_updated_message'] = '<div class="alert alert-success">%s</div>';

    if($args['html_submit_button'] == '<input type="submit" class="acf-button button button-primary button-large" value="%s" />')
        $args['html_submit_button'] = '<input type="submit" class="acf-button button btn btn-primary btn-lg" value="%s" />';

    // Set default Uploader to default
    $args['uploader'] = 'basic';

    return $args;
}
/**
* ACF Form: Elements Required Class
*/
add_filter('acf/get_field_label', 'hwk_acf_form_label', 10, 2);
function hwk_acf_form_label($label, $field){
    if(is_admin() || wp_doing_ajax())
        return $label;

    $label = str_replace('class="acf-required"', 'class="acf-required text-danger"', $label);
    return $label;
}
/**
* ACF Form: Helper – Get Form
*/
function hwk_acf_form_get_form($form = false){
    if(!$form)
        $form = $_POST['_acf_form'];

    if(!$form)
        return false;

    $form = json_decode(acf_decrypt($form), true);
    if(!$form || empty($form) || !is_array($form))
        return false;

    return $form;
}
/**
* ACF Form: Helper – Get Data
*/
function hwk_acf_form_get_data($acf = false){
    if(!$acf)
        $acf = $_POST['acf'];

    if(!$acf)
        return false;

    $data = array();
    foreach($acf as $key => $value){
        $input = acf_get_field($key);

        if(!isset($input['name']))
            continue;

        $data['input'][$input['name']] = $value;
        $data['key'][$input['name']] = $key;
    }
    if(empty($data))
        return false;

    return $data;
}
/**
* ACF Form: Helper – Get Return
*/
function hwk_acf_form_get_return($form){
    if(empty($form) || !is_array($form))
        return false;

    $return = array();

    if(isset($form['return']) && !empty($form['return']))
        $return['redirect'] = $form['return'];

    if(isset($_POST['redirect']) && ($redirect = esc_url(urldecode($_POST['redirect']))))
        $return['redirect'] = $redirect;

    if(isset($form['updated_message']) && !empty($form['updated_message']))
        $return['message'] = $form['updated_message'];

    return $return;
}

/**
* ACF Form Login: Register Form
*/
acf_register_form(array(
    'id'                    => 'hwk_ajax_acf_login',
    'post_id'               => 'hwk_ajax_acf_login',
    'form_attributes'       => array(
        'class' => 'acf-form acf-form-ajax',
    ),
    'field_groups'          => array(14), // ACF Fields Group ID
    'updated_message'       => __('Logged in!'),
    'return'                => home_url('account'),
    'submit_value'          => __('Login'),
    'html_submit_button'    => '<input type="submit" class="acf-button button btn btn-primary btn-lg" value="%s" /> &nbsp; <a href="/connexion/mot-de-passe-oublie">' . __('Lost password') . '</a>',
));
/**
* ACF Form Login: Input Hidden
*/
add_action('acf/input/form_data', 'hwk_ajax_acf_login_input');
function hwk_ajax_acf_login_input($args){
    if(is_admin() || (isset($args['post_id']) && $args['post_id'] != 'hwk_ajax_acf_login'))
        return;

    echo '<input type="hidden" name="action" value="hwk_ajax_acf_login_ajax_submit" />';

    if(isset($_GET['redirect']) && ($redirect = esc_url(urldecode($_GET['redirect']))))
        echo '<input type="hidden" name="redirect" value="' . $redirect . '" />';
}
/**
* ACF Form Login: Ajax Validation
*/
add_action('acf/validate_save_post', 'hwk_ajax_acf_login_ajax_validation');
function hwk_ajax_acf_login_ajax_validation(){
    if(!isset($_POST['_acf_post_id']) || $_POST['_acf_post_id'] != 'hwk_ajax_acf_login')
        return;

    if((!$form = hwk_acf_form_get_form()) || (!$data = hwk_acf_form_get_data()))
        wp_send_json_success(array(
            'valid' => 1,
            'data' 	=> array(
            'error' => __('An error occured. Please try again later.')
            )
        ));

    $input = $data['input'];
    $key = $data['key'];

    // Login
    $input['login'] = sanitize_user($input['login']);

    if(empty($input['login']) || !username_exists($input['login']))
        acf_add_validation_error('acf['.$key['login'].']', __('Invalid username'));

    // Password
    $input['password'] = sanitize_text_field($input['password']);
    $user = get_user_by('login', $input['login']);

    if(empty($input['password']) || !$user || !wp_check_password($input['password'], $user->data->user_pass, $user->ID))
        acf_add_validation_error('acf['.$key['password'].']', __('Invalid password'));
}
/**
 * ACF Form Login: Ajax Submit
 */
add_action('wp_ajax_hwk_ajax_acf_login_ajax_submit', 'hwk_ajax_acf_login_ajax_submit');
add_action('wp_ajax_nopriv_hwk_ajax_acf_login_ajax_submit', 'hwk_ajax_acf_login_ajax_submit');
function hwk_ajax_acf_login_ajax_submit(){
    if(!acf_verify_nonce('acf_form') || !isset($_POST['_acf_post_id']) || $_POST['_acf_post_id'] != 'hwk_ajax_acf_login')
        return;

    // Errors
    if(!acf_validate_save_post())
        wp_send_json_success(array(
            'valid' 	=> 0,
            'errors' 	=> acf_get_validation_errors(),
        ));

    // Form data check
    if((!$form = hwk_acf_form_get_form()) || (!$data = hwk_acf_form_get_data()))
        wp_send_json_success(array(
            'valid' => 1,
            'data' 	=> array(
                'error' => __('An error occured. Please try again later.')
            )
        ));

    $input = $data['input'];
    $key = $data['key'];

    // Login user
    $user = wp_signon(array(
        'user_login'    => $input['login'],
        'user_password' => $input['password'],
        'remember'      => (($input['remember_me']) ? true : false),
    ), false);

    if(is_wp_error($user))
        wp_send_json_success(array(
            'valid' => 1,
            'data' 	=> array(
                'error' => $user
            )
        ));

    wp_send_json_success(array(
        'valid' => 1,
        'data' 	=> hwk_acf_form_get_return($form),
    ));
}
