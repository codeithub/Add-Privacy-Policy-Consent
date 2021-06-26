add_action( 'woocommerce_register_form', 'codeithub_add_registration_privacy_policy', 11 );
   
function codeithub_add_registration_privacy_policy() {
 
woocommerce_form_field( 'privacy_policy_reg', array(
   'type'          => 'checkbox',
   'class'         => array('form-row privacy'),
   'label_class'   => array('woocommerce-form__label woocommerce-form__label-for-checkbox checkbox'),
   'input_class'   => array('woocommerce-form__input woocommerce-form__input-checkbox input-checkbox'),
   'required'      => true,
   'label'         => 'I\'ve read and accept the <a href="/privacy-policy">Privacy Policy</a>',
));
  
}
  
// Show error if user does not tick
   
add_filter( 'woocommerce_registration_errors', 'codeithub_validate_privacy_registration', 10, 3 );
  
function codeithub_validate_privacy_registration( $errors, $username, $email ) {
if ( ! is_checkout() ) {
    if ( ! (int) isset( $_POST['privacy_policy_reg'] ) ) {
        $errors->add( 'privacy_policy_reg_error', __( 'Privacy Policy consent is required!', 'woocommerce' ) );
    }
}
return $errors;
}
