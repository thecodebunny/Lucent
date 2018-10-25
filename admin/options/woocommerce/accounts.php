<?php
/**
 * Accounts Login/Regisgter Options
 *
 * @package Lucent
 **************************************/

Redux::setSection(
	'lucent_opts',
	array(
		'id'         => 'lucent_woocommerce_accounts',
		'title'      => __( 'Account Options','lucent' ),
		'icon'       => 'panel-profile-male',
		'subsection' => true,
		'fields'     => array(
			array(
				'id'         => 'lucent_company_registration',
				'type'       => 'button_set',
				'title'      => __( 'Company Registration', 'lucent' ),
                'desc'       => __( 'Enable Company Registration?', 'lucent' ),
                'options'    => array(
                    'yes'    => 'Yes',
                    'no'     => 'No',
                ),
                'default'    => 'yes',
            ),
            array(
				'id'         => 'lucent_registration_info',
				'type'       => 'button_set',
				'title'      => __( 'Show Merchant Info?', 'lucent' ),
                'options'    => array(
                    'yes'    => 'Yes',
                    'no'     => 'No',
                ),
                'default'    => 'yes',
            ),
            array(
				'id'         => 'lucent_company_description',
				'type'       => 'editor',
				'title'      => __( 'Registration form intro', 'lucent' ),
                'default'    => '<p>After the registration you will be displayed the retail prices until your account has been verified.</p></br>
                <h3>Please send us your business license by fax.</h3></br>
                <p>Please send us your business license by fax to +49 2555 92 95 61. If you are already registered as a merchant, you can skip this step.</p></br>
                <h3>We will validate your information and activate your account!</h3></br>
                <p>We will activate your account after verification. You will then receive a confirmation email. From now on, you will be displayed the merchant purchase prices on the item and overview pages.</p>',
            ),
            array(
				'id'         => 'lucent_company_vat',
				'type'       => 'button_set',
				'title'      => __( 'VAT/Tax ID', 'lucent' ),
                'desc'       => __( 'VAT/Tax ID required?', 'lucent' ),
                'options'    => array(
                    'yes'    => 'Yes',
                    'no'     => 'No',
                ),
                'default'    => 'yes',
            ),
            array(
				'id'         => 'lucent_bdate',
				'type'       => 'button_set',
				'title'      => __( 'Birthdate required?', 'lucent' ),
                'options'    => array(
                    'yes'    => 'Yes',
                    'no'     => 'No',
                ),
                'default'    => 'yes',
            ),
            array(
				'id'         => 'lucent_accountnav_dropdown',
				'type'       => 'button_set',
				'title'      => __( 'Dropdown Account Navigation', 'lucent' ),
                'desc'       => __( 'Convert Account Navigation to Dropdown?', 'lucent' ),
                'options'    => array(
                    'yes'    => 'Yes',
                    'no'     => 'No',
                ),
                'default'    => 'yes',
            ),
            array(
				'id'         => 'lucent_billing_address',
				'type'       => 'button_set',
				'title'      => __( 'Address Fields', 'lucent' ),
                'desc'       => __( 'Show Address Fields in Registration form?', 'lucent' ),
                'options'    => array(
                    'yes'    => 'Yes',
                    'no'     => 'No',
                ),
                'default'    => 'yes',
            ),
        ),
    )
);