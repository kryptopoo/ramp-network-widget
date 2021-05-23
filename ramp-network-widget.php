<?php
/*
Plugin Name: Ramp Network Widget
Plugin URI: https://github.com/kryptopoo/ramp-network-widget
Description: This plugin adds a Ramp Network Widget
Version: 1.0
Author: kryptopoo
Author URI: https://twitter.com/kryptopoo
License: GPL2
*/

// The widget class
class Ramp_Network_Widget extends WP_Widget {

	// Main constructor
	public function __construct() {
		parent::__construct(
			'ramp_network_widget',
			__( 'Ramp Network Widget', 'text_domain' ),
			array(
				'customize_selective_refresh' => true,
			)
		);
	}

	// The widget form (for the backend )
	public function form( $instance ) {

		// Set widget defaults
		$defaults = array(
			'title'         => 'Ramp Network Widget',
            'hostLogoUrl'   => 'https://ramp.network/assets/images/Logo.svg',
            'hostAppName'   => 'Fiat to Cryptocurrency',
            'selectedCountryCode'   => 'TEST',
            'defaultAsset'          => 'ETH',
            'swapAsset'     => '',
            'swapAmount'    => '',
            'fiatCurrency'  => 'EUR',
            'fiatValue'     => '',
            'userAddress'           => '',
            'userEmailAddress'      => '',
            'webhookStatusUrl'      => '',
            'finalUrl'              => '', 
            'hostApiKey'    => '',
            // 'variant'       => '',
            // 'containerNode' => '',
            'testMode' => true
		);
		
		// Parse current settings with defaults
		extract( wp_parse_args( ( array ) $instance, $defaults ) ); ?>

		<?php // Widget Title ?>
		<p>
			<label for="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>"><?php _e( 'Widget Title', 'text_domain' ); ?></label>
			<input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'title' ) ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>" />
		</p>

        <?php // hostAppName ?>
		<p>
			<label for="<?php echo esc_attr( $this->get_field_id( 'hostAppName' ) ); ?>"><?php _e( 'App Name', 'text_domain' ); ?></label>
			<input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'hostAppName' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'hostAppName' ) ); ?>" type="text" value="<?php echo esc_attr( $hostAppName ); ?>" />
		</p>

        <?php // hostLogoUrl ?>
		<p>
			<label for="<?php echo esc_attr( $this->get_field_id( 'hostLogoUrl' ) ); ?>"><?php _e( 'Logo Url', 'text_domain' ); ?></label>
			<input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'hostLogoUrl' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'hostLogoUrl' ) ); ?>" type="text" value="<?php echo esc_attr( $hostLogoUrl ); ?>" />
		</p>

        <?php // selectedCountryCode ?>
		<p>
			<label for="<?php echo esc_attr( $this->get_field_id( 'selectedCountryCode' ) ); ?>"><?php _e( 'Selected Country Code', 'text_domain' ); ?></label>
			<input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'selectedCountryCode' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'selectedCountryCode' ) ); ?>" type="text" value="<?php echo esc_attr( $selectedCountryCode ); ?>" />
		</p>

        <?php // defaultAsset ?>
		<p>
			<label for="<?php echo esc_attr( $this->get_field_id( 'defaultAsset' ) ); ?>"><?php _e( 'Default Asset', 'text_domain' ); ?></label>
			<input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'defaultAsset' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'defaultAsset' ) ); ?>" type="text" value="<?php echo esc_attr( $defaultAsset ); ?>" />
		</p>

        <?php // swapAmount ?>
		<p>
			<label for="<?php echo esc_attr( $this->get_field_id( 'swapAmount' ) ); ?>"><?php _e( 'Swap Amount', 'text_domain' ); ?></label>
			<input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'swapAmount' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'swapAmount' ) ); ?>" type="text" value="<?php echo esc_attr( $swapAmount ); ?>" />
		</p>

        <?php // fiatCurrency ?>
		<p>
			<label for="<?php echo esc_attr( $this->get_field_id( 'fiatCurrency' ) ); ?>"><?php _e( 'Fiat Currency', 'text_domain' ); ?></label>
			<input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'fiatCurrency' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'fiatCurrency' ) ); ?>" type="text" value="<?php echo esc_attr( $fiatCurrency ); ?>" />
		</p>


        <?php // fiatValue ?>
		<p>
			<label for="<?php echo esc_attr( $this->get_field_id( 'fiatValue' ) ); ?>"><?php _e( 'Fiat Value', 'text_domain' ); ?></label>
			<input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'fiatValue' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'fiatValue' ) ); ?>" type="text" value="<?php echo esc_attr( $fiatValue ); ?>" />
		</p>

        <?php // userAddress ?>
		<p>
			<label for="<?php echo esc_attr( $this->get_field_id( 'userAddress' ) ); ?>"><?php _e( 'User Cryptocurrency Address', 'text_domain' ); ?></label>
			<input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'userAddress' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'userAddress' ) ); ?>" type="text" value="<?php echo esc_attr( $userAddress ); ?>" />
		</p>

        <?php // userEmailAddress ?>
		<p>
			<label for="<?php echo esc_attr( $this->get_field_id( 'userEmailAddress' ) ); ?>"><?php _e( 'User Email Address', 'text_domain' ); ?></label>
			<input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'userEmailAddress' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'userEmailAddress' ) ); ?>" type="text" value="<?php echo esc_attr( $userEmailAddress ); ?>" />
		</p>

        <?php // webhookStatusUrl ?>
		<p>
			<label for="<?php echo esc_attr( $this->get_field_id( 'webhookStatusUrl' ) ); ?>"><?php _e( 'Webhook Status Url', 'text_domain' ); ?></label>
			<input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'webhookStatusUrl' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'webhookStatusUrl' ) ); ?>" type="text" value="<?php echo esc_attr( $webhookStatusUrl ); ?>" />
		</p>

        <?php // finalUrl ?>
		<p>
			<label for="<?php echo esc_attr( $this->get_field_id( 'finalUrl' ) ); ?>"><?php _e( 'Final Url', 'text_domain' ); ?></label>
			<input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'finalUrl' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'finalUrl' ) ); ?>" type="text" value="<?php echo esc_attr( $finalUrl ); ?>" />
		</p>

        <?php // hostApiKey ?>
		<p>
			<label for="<?php echo esc_attr( $this->get_field_id( 'hostApiKey' ) ); ?>"><?php _e( 'Host Api Key', 'text_domain' ); ?></label>
			<input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'hostApiKey' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'hostApiKey' ) ); ?>" type="text" value="<?php echo esc_attr( $hostApiKey ); ?>" />
		</p>

		<?php // Checkbox ?>
		<p>
			<input id="<?php echo esc_attr( $this->get_field_id( 'testMode' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'testMode' ) ); ?>" type="checkbox" value="1" <?php checked( '1', $testMode ); ?> />
			<label for="<?php echo esc_attr( $this->get_field_id( 'testMode' ) ); ?>"><?php _e( 'Enable Test Mode', 'text_domain' ); ?></label>
		</p>
		<p>
		Read more detail of configuration options: <a href="https://docs.ramp.network/configuration" target="_blank">Ramp Docs Configuration</a>
		</p>

	<?php }

	// Update widget settings
	public function update( $new_instance, $old_instance ) {
		$instance = $old_instance;

        $instance['title']    = isset( $new_instance['title'] ) ? wp_strip_all_tags( $new_instance['title'] ) : '';
        $instance['hostLogoUrl']    = isset( $new_instance['hostLogoUrl'] ) ? wp_strip_all_tags( $new_instance['hostLogoUrl'] ) : '';
        $instance['hostAppName']    = isset( $new_instance['hostAppName'] ) ? wp_strip_all_tags( $new_instance['hostAppName'] ) : '';
        $instance['selectedCountryCode']    = isset( $new_instance['selectedCountryCode'] ) ? wp_strip_all_tags( $new_instance['selectedCountryCode'] ) : '';
        $instance['defaultAsset']    = isset( $new_instance['defaultAsset'] ) ? wp_strip_all_tags( $new_instance['defaultAsset'] ) : '';
        $instance['swapAsset']    = isset( $new_instance['swapAsset'] ) ? wp_strip_all_tags( $new_instance['swapAsset'] ) : '';
        $instance['swapAmount']    = isset( $new_instance['swapAmount'] ) ? wp_strip_all_tags( $new_instance['swapAmount'] ) : '';
        $instance['fiatCurrency']    = isset( $new_instance['fiatCurrency'] ) ? wp_strip_all_tags( $new_instance['fiatCurrency'] ) : '';
        $instance['fiatValue']    = isset( $new_instance['fiatValue'] ) ? wp_strip_all_tags( $new_instance['fiatValue'] ) : '';
        $instance['userAddress']    = isset( $new_instance['userAddress'] ) ? wp_strip_all_tags( $new_instance['userAddress'] ) : '';
        $instance['userEmailAddress']    = isset( $new_instance['userEmailAddress'] ) ? wp_strip_all_tags( $new_instance['userEmailAddress'] ) : '';
        $instance['webhookStatusUrl']    = isset( $new_instance['webhookStatusUrl'] ) ? wp_strip_all_tags( $new_instance['webhookStatusUrl'] ) : '';
        $instance['finalUrl']    = isset( $new_instance['finalUrl'] ) ? wp_strip_all_tags( $new_instance['finalUrl'] ) : '';
        $instance['hostApiKey']    = isset( $new_instance['hostApiKey'] ) ? wp_strip_all_tags( $new_instance['hostApiKey'] ) : '';
        $instance['testMode']    = isset( $new_instance['testMode'] ) ? wp_strip_all_tags( $new_instance['testMode'] ) : true;

		return $instance;
	}

	// Display the widget
	public function widget( $args, $instance ) {

		extract( $args );

		// Check the widget options
		$title    = isset( $instance['title'] ) ? apply_filters( 'widget_title', $instance['title'] ) : '';
		$hostLogoUrl = isset( $instance['hostLogoUrl'] ) ? $instance['hostLogoUrl'] : '';
		$hostAppName = isset( $instance['hostAppName'] ) ? $instance['hostAppName'] : '';
		$selectedCountryCode   = isset( $instance['selectedCountryCode'] ) ? $instance['selectedCountryCode'] : '';
		$defaultAsset = ! empty( $instance['defaultAsset'] ) ? $instance['defaultAsset'] : '';
        $swapAsset = ! empty( $instance['swapAsset'] ) ? $instance['swapAsset'] : '';
        $swapAmount = ! empty( $instance['swapAmount'] ) ? $instance['swapAmount'] : '';
        $fiatCurrency = ! empty( $instance['fiatCurrency'] ) ? $instance['fiatCurrency'] : '';
        $fiatValue = ! empty( $instance['fiatValue'] ) ? $instance['fiatValue'] : '';
        $userAddress = ! empty( $instance['userAddress'] ) ? $instance['userAddress'] : '';
        $userEmailAddress = ! empty( $instance['userEmailAddress'] ) ? $instance['userEmailAddress'] : '';
        $webhookStatusUrl = ! empty( $instance['webhookStatusUrl'] ) ? $instance['webhookStatusUrl'] : '';
        $finalUrl = ! empty( $instance['finalUrl'] ) ? $instance['finalUrl'] : '';
        $hostApiKey = ! empty( $instance['hostApiKey'] ) ? $instance['hostApiKey'] : '';

        $testMode   = isset( $instance['testMode'] ) ? $instance['testMode'] : true;

		// WordPress core before_widget hook (always include )
		echo $before_widget;

        // render iframe
        $iframe_src = $testMode ? 'https://ri-widget-staging.firebaseapp.com/' : 'https://buy.ramp.network/' ;
        $iframe_src_params = [];



        if ($hostAppName)
            array_push($iframe_src_params, 'hostAppName=' . $hostAppName);
        if ($hostLogoUrl)
            array_push($iframe_src_params, 'hostLogoUrl=' . $hostLogoUrl);
        if ($selectedCountryCode)
            array_push($iframe_src_params, 'selectedCountryCode=' . $selectedCountryCode);
        if ($defaultAsset)
            array_push($iframe_src_params, 'defaultAsset=' . $defaultAsset);
        if ($swapAsset)
            array_push($iframe_src_params, 'swapAsset=' . $swapAsset);
        if ($swapAmount)
            array_push($iframe_src_params, 'swapAmount=' . $swapAmount);
        if ($fiatCurrency)
            array_push($iframe_src_params, 'fiatCurrency=' . $fiatCurrency);
        if ($fiatValue)
            array_push($iframe_src_params, 'fiatValue=' . $fiatValue);
        if ($userAddress)
            array_push($iframe_src_params, 'userAddress=' . $userAddress);
        if ($userEmailAddress)
            array_push($iframe_src_params, 'userEmailAddress=' . $userEmailAddress);
        if ($webhookStatusUrl)
            array_push($iframe_src_params, 'webhookStatusUrl=' . $webhookStatusUrl);
        if ($finalUrl)
            array_push($iframe_src_params, 'finalUrl=' . $finalUrl);
        if ($hostApiKey)
            array_push($iframe_src_params, 'hostApiKey=' . $hostApiKey);
   
        $iframe_src .=  '?' .   implode ('&' , $iframe_src_params ) ;
        $iframe = '<iframe name="ramp-widget-iframe" style="border: 0; width: 100%; height: 100%; min-height: 580px; min-width: 350px;"';
        $iframe .= 'src="' . $iframe_src . '" />';

        echo($iframe);

		// WordPress core after_widget hook (always include )
		echo $after_widget;
	}

}

// Register the widget
function my_register_custom_widget() {
	register_widget( 'Ramp_Network_Widget' );
}
add_action( 'widgets_init', 'my_register_custom_widget' );