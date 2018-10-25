<?php
/**
 * Login Form
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/myaccount/form-login.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woothemes.com/document/template-structure/
 * @author  WooThemes
 * @package WooCommerce/Templates
 * @version 3.3.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

$lucent_global = lucent_global();

?>

<?php wc_print_notices(); ?>

<?php do_action( 'woocommerce_before_customer_login_form' ); ?>

<?php if ( get_option( 'woocommerce_enable_myaccount_registration' ) === 'yes' ) : ?>

<div class="u-columns col2-set" id="customer_login">

	<div class="u-column1 col-1">

<?php endif; ?>
<?php if ( get_option( 'woocommerce_enable_myaccount_registration' ) === 'yes' ) :  { ?> <div class="lucent-login-half"> <?php } else : { ?> <div class="lucent-login"> <?php } endif; ?>

		<h2 class="login-logo"><?php do_action('lucent_Logo'); ?></h2>

		<div class="login-content">

			<form method="post" class="lucent-form-login">
				<?php do_action( 'woocommerce_login_form_start' ); ?>

				<p class="woocommerce-FormRow woocommerce-FormRow--wide form-row form-row-wide">
					<label for="username"><?php _e( 'Username or email address', 'lucent' ); ?> <span class="required">*</span></label>
					<input type="text" class="woocommerce-Input woocommerce-Input--text input-text" name="username" id="username" value="<?php if ( ! empty( $_POST['username'] ) ) echo esc_attr( $_POST['username'] ); ?>" />
				</p>
				<p class="woocommerce-FormRow woocommerce-FormRow--wide form-row form-row-wide">
					<label for="password"><?php _e( 'Password', 'lucent' ); ?> <span class="required">*</span></label>
					<input class="woocommerce-Input woocommerce-Input--text input-text" type="password" name="password" id="password" />
				</p>

				<?php do_action( 'woocommerce_login_form' ); ?>

				<p class="form-row">
					<?php wp_nonce_field( 'woocommerce-login', 'woocommerce-login-nonce' ); ?>
					<input type="submit" class="woocommerce-Button button" name="login" value="<?php esc_attr_e( 'Login', 'lucent' ); ?>" />
					<label for="rememberme" class="inline">
						<input class="woocommerce-Input woocommerce-Input--checkbox" name="rememberme" type="checkbox" id="rememberme" value="forever" /> <?php _e( 'Remember me', 'lucent' ); ?>
					</label>
				</p>
				<p class="woocommerce-LostPassword lost_password">
					<a href="<?php echo esc_url( wp_lostpassword_url() ); ?>"><?php _e( 'Lost your password?', 'lucent' ); ?></a>
				</p>

				<?php do_action( 'woocommerce_login_form_end' ); ?>

			</form>
		</div>
    </div>
<?php if ( get_option( 'woocommerce_enable_myaccount_registration' ) === 'yes' ) : ?>

	</div>

	<div class="u-column2 col-2">
    <div class="lucent-register">
		<h2 class="register-header"><?php echo get_bloginfo('name'); echo __( ' Merchant Registration.' , 'lucent' ); ?></h2>
		<?php if ('yes' === $lucent_global['lucent_registration_info']) { ?> 
		<div class="registration-intro">
			<?php echo $lucent_global['lucent_company_description'] ?>
		</div>
		<?php } ?>
		<form method="post" class="register registration-form">
			<?php do_action( 'woocommerce_register_form_start' ); ?>
			<div class="lucent-reg-personal">
			<h2 class="personal-header"><?php echo __( 'Personal Information' , 'lucent' ); ?></h2>
				<?php if ('yes' === $lucent_global['lucent_company_registration']) { ?> 
				<p class="woocommerce-FormRow woocommerce-FormRow--wide form-row form-row-wide">
				<label for="lucent_customer_type"><?php _e( 'I am', 'lucent' ); ?>  <span class="required">*</span></label>
				<select name="lucent_customer_type" id="lucent_customer_type" />
					<option value="private"><?php echo __('Private Customer','lucent') ?></option>
					<option value="company"><?php echo __('Company','lucent') ?></option>
				</select>
				</p>
				<?php } ?>
				<p class="woocommerce-FormRow woocommerce-FormRow--wide form-row form-row-wide">
				<label for="reg_billing_salutation"><?php _e( 'Salutation', 'lucent' ); ?></label>
				<select name="lucent_salutation" id="lucent_salutation"/>
					<option value="mr"><?php echo __('Mr. ','lucent') ?></option>
					<option value="mrs"><?php echo __('Mrs. ','lucent') ?></option>
				</select>
				</p>
				<p class="woocommerce-FormRow woocommerce-FormRow--wide form-row form-row-wide">
					<label for="reg_billing_firstname" class="lucent-label"><?php _e( 'First Name', 'lucent' ); ?> <span class="required">*</span></label>
					<input type="text" class="woocommerce-Input woocommerce-Input--text input-text lucent-reg-field" name="billing_first_name" id="reg_billing_firstname" value="<?php if ( ! empty( $_POST['billing_first_name'] ) ) echo esc_attr( $_POST['billing_first_name'] ); ?>" />
				</p>
				<p class="woocommerce-FormRow woocommerce-FormRow--wide form-row form-row-wide">
						<label for="reg_billing_lastname" class="lucent-label"><?php _e( 'Last Name', 'lucent' ); ?> <span class="required">*</span></label>
						<input type="text" class="woocommerce-Input woocommerce-Input--text input-text lucent-reg-field" name="billing_last_name" id="reg_billing_lastname" value="<?php if ( ! empty( $_POST['billing_last_name'] ) ) echo esc_attr( $_POST['billing_last_name'] ); ?>" />
				</p>
			
			<?php if ( 'no' === get_option( 'woocommerce_registration_generate_username' ) ) : ?>

				<p class="woocommerce-FormRow woocommerce-FormRow--wide form-row form-row-wide">
					<label for="reg_username" class="lucent-label"><?php _e( 'Username', 'lucent' ); ?> <span class="required">*</span></label>
					<input type="text" class="woocommerce-Input woocommerce-Input--text input-text lucent-reg-field" name="username" id="reg_username" value="<?php if ( ! empty( $_POST['username'] ) ) echo esc_attr( $_POST['username'] ); ?>" />
				</p>

			<?php endif; ?>

			<p class="woocommerce-FormRow woocommerce-FormRow--wide form-row form-row-wide">
				<label for="reg_email" class="lucent-label"><?php _e( 'Email address', 'lucent' ); ?> <span class="required">*</span></label>
				<input type="email" class="woocommerce-Input woocommerce-Input--text input-text lucent-reg-field" name="email" id="reg_email" value="<?php if ( ! empty( $_POST['email'] ) ) echo esc_attr( $_POST['email'] ); ?>" />
			</p>

			<p class="woocommerce-FormRow woocommerce-FormRow--wide form-row form-row-wide">
					<label for="lucent_bdate" class="lucent-label"><?php _e( 'Birth Date', 'lucent' ); ?><?php if ('yes' === $lucent_global['lucent_bdate']) { ?> <span class="required">*</span> <?php } ?></label>
					<input type="date" class="woocommerce-Input woocommerce-Input--text input-text lucent-reg-field" name="lucent_bdate" id="lucent_bdate" value="<?php if ( ! empty( $_POST['bdate'] ) ) echo esc_attr( $_POST['lucent_bdate'] ); ?>" />
			</p>

			<?php if ( 'no' === get_option( 'woocommerce_registration_generate_password' ) ) : ?>

				<p class="woocommerce-FormRow woocommerce-FormRow--wide form-row form-row-wide">
					<label for="reg_password" class="lucent-label"><?php _e( 'Password', 'lucent' ); ?> <span class="required">*</span></label>
					<input type="password" class="woocommerce-Input woocommerce-Input--text input-text lucent-reg-field" name="password" id="reg_password" />
				</p>

			<?php endif; ?>
			</div>
			<?php if ('yes' === $lucent_global['lucent_company_registration']) { ?> 
			<div id="lucent-reg-companyinfo">
				<h2 class="company-header"><?php echo __( 'Company Information' , 'lucent' ); ?></h2>
				<p class="woocommerce-FormRow woocommerce-FormRow--wide form-row form-row-wide">
					<label for="billing_company_name" class="lucent-label"><?php _e( 'Company Name', 'lucent' ); ?> <span class="required">*</span></label>
					<input type="text" class="woocommerce-Input woocommerce-Input--text input-text lucent-reg-field" name="billing_company_name" id="billing_company_name" value="<?php if ( ! empty( $_POST['billing_company_name'] ) ) echo esc_attr( $_POST['billing_company_name'] ); ?>" />
				</p>
				<p class="woocommerce-FormRow woocommerce-FormRow--wide form-row form-row-wide">
					<label for="billing_department" class="lucent-label"><?php _e( 'Department', 'lucent' ); ?> <span class="required">*</span></label>
					<input type="text" class="woocommerce-Input woocommerce-Input--text input-text lucent-reg-field" name="billing_department" id="billing_department" value="<?php if ( ! empty( $_POST['billing_department'] ) ) echo esc_attr( $_POST['billing_department'] ); ?>" />
				</p>
				<p class="woocommerce-FormRow woocommerce-FormRow--wide form-row form-row-wide">
					<label for="billing_tax" class="lucent-label"><?php _e( 'Tax / VAT ID', 'lucent' ); ?><?php if ('yes' === $lucent_global['lucent_company_vat']) { ?> <span class="required">*</span> <?php } ?></label>
					<input type="text" class="woocommerce-Input woocommerce-Input--text input-text lucent-reg-field" name="billing_tax" id="billing_tax" value="<?php if ( ! empty( $_POST['billing_tax'] ) ) echo esc_attr( $_POST['billing_tax'] ); ?>" />
				</p>
			</div>
			<?php } if ('yes' === $lucent_global['lucent_billing_address']) { ?> 
			<div class="lucent-reg-address">
				<h2 class="address-header"><?php echo __( 'Billing Address' , 'lucent' ); ?></h2>
				<?php do_action('Lucent_Reg_Countries'); ?>
				<p class="woocommerce-FormRow woocommerce-FormRow--wide form-row form-row-wide">
					<label for="billing_address_1" class="lucent-label"><?php _e( 'House number and street name ', 'lucent' ); ?> <span class="required">*</span></label>
					<input type="text" class="woocommerce-Input woocommerce-Input--text input-text lucent-reg-field" name="billing_address_1" id="billing_address_1" value="<?php if ( ! empty( $_POST['billing_address_1'] ) ) echo esc_attr( $_POST['billing_address_1'] ); ?>" />
				</p>
				<p class=" woocommerce-FormRow woocommerce-FormRow--wide form-row form-row-wide address-field" id="billing_address_2_field" data-priority="60">
					<input type="text" class="input-text " name="billing_address_2" id="billing_address_2" placeholder="Apartment, suite, unit, etc. (optional)" value="" autocomplete="address-line2">
				</p>
				<p class="woocommerce-FormRow woocommerce-FormRow--wide form-row form-row-wide address-field validate-required" id="billing_city_field" data-priority="70" data-o_class="form-row form-row-wide address-field validate-required">
					<label for="billing_city" class="lucent-label"><?php _e( 'Town / City' , 'lucent' ) ?> <abbr class="required" title="required">*</abbr></label>
					<input type="text" class="input-text lucent-reg-field " name="billing_city" id="billing_city" placeholder="" value="" autocomplete="address-level2">
				</p>
				<?php do_action('Lucent_Reg_States'); ?>
				<p class="woocommerce-FormRow woocommerce-FormRow--wide form-row form-row-wide address-field validate-postcode validate-required" id="billing_postcode_field" data-priority="65" data-o_class="form-row form-row-wide address-field validate-required validate-postcode">
					<label for="billing_postcode" class="lucent-label"><?php _e( 'Postcode / ZIP' , 'lucent' ) ?>  <abbr class="required" title="required">*</abbr></label>
					<input type="text" class="input-text lucent-reg-field " name="billing_postcode" id="billing_postcode" placeholder="" value="" autocomplete="postal-code">
				</p>
				<p class="woocommerce-FormRow woocommerce-FormRow--wide form-row form-row-wide validate-required validate-phone" id="billing_phone_field" data-priority="100">
					<label for="billing_phone" class="lucent-label"><?php _e( 'Phone' , 'lucent' ) ?> <abbr class="required" title="required">*</abbr></label>
					<input type="tel" class="input-text lucent-reg-field " name="billing_phone" id="billing_phone" placeholder="" value="" autocomplete="tel">
				</p>
			</div>
			<?php } ?>
			<!-- Spam Trap -->
			<div style="<?php echo ( ( is_rtl() ) ? 'right' : 'left' ); ?>: -999em; position: absolute;"><label for="trap"><?php _e( 'Anti-spam', 'lucent' ); ?></label><input type="text" name="email_2" id="trap" tabindex="-1" /></div>

			<?php do_action( 'woocommerce_register_form' ); ?>
			<?php do_action( 'register_form' ); ?>

			<p class="woocomerce-FormRow form-row">
				<?php wp_nonce_field( 'woocommerce-register', 'woocommerce-register-nonce' ); ?>
				<input type="submit" class="woocommerce-Button button" name="register" value="<?php esc_attr_e( 'Register', 'lucent' ); ?>" />
			</p>

			<?php do_action( 'woocommerce_register_form_end' ); ?>
		</form>
	
	</div>
</div>
</div>
<?php endif; ?>

<?php do_action( 'woocommerce_after_customer_login_form' ); ?>
