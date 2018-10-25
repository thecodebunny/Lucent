<?php

/**
  *
  * OUTPUTS THEME OPTIONS RELATED
  * REQUIRED JAVASCRIPT TO FOOTER
  *
  * @package Lucent
  * @author TheCodeBunny
  * @link www.thecodebunny.com
  **/

  $lucent_global = lucent_global();

?>
  
<script id="lucent-footer-inline-scripts" type="text/javascript">

  jQuery(document).ready(function($){
	'use-strict';

	jQuery("body").niceScroll({
		cursorcolor: "<?php echo $lucent_global['theme_dark_secondary']['rgba']; ?>",
		cursorwidth: "10px",
		cursorborder: "1px solid #fff",
		cursorborderradius: "5px",
	});

<?php if ( '1' === $lucent_global['lucent_totop'] ) { ?>
	jQuery.lucenttotop({
		location: '<?php echo $lucent_global['totop_side']; ?>',
		containerColor: '<?php echo $lucent_global['theme_dark_secondary']['color']; ?>'
	});
<?php } ?>

	jQuery('#lucentmobileslide').LucentSlide({
		trigger: "#mobile-trigger-button",
		effect: "<?php echo $lucent_global['lucent_mobile_fx']; ?>",
		position: "<?php echo $lucent_global['lucent_mobile_side']; ?>",
		slidebarwidth: "<?php echo $lucent_global['lucent_mobile_width']['width']; ?>",
		close: ".close-cart",
	});

<?php if ( 'full' === $lucent_global['header_hidden'] && 'overlay' === $lucent_global['lucent_hidden_fullfx'] ) { ?>
	jQuery(".hidden-fullscreen").LucentOverlay({
		trigger: ".lucent-hidden-toggle",
		overlayEffect: "<?php echo $lucent_global['lucent_hidden_overlayfx']; ?>",
		targetelement: ".hidden-fullscreen",
		particlebg: "<?php echo $lucent_global['theme_light_primary']['color']; ?>",
	});

<?php } if ( 'full' === $lucent_global['header_hidden'] && 'slide' === $lucent_global['lucent_hidden_fullfx'] ) { ?>
	jQuery('.hidden-fullslide').LucentSlide({
		trigger: ".lucent-hidden-toggle",
		effect: "<?php echo $lucent_global['lucent_hiddenfull_fx']; ?>",
		position: "<?php echo $lucent_global['header_hiddenfull_slide']; ?>",
		slidebarwidth: "100%",
		close: ".overlay-close",
	});

<?php } if ( 'slide' === $lucent_global['header_hidden'] ) { ?>

	jQuery('.lucenthidden').LucentSlide({
		trigger: ".lucent-hidden-toggle",
		effect: "<?php echo $lucent_global['lucent_hidden_fx']; ?>",
		position: "<?php echo $lucent_global['header_hidden_slide']; ?>",
		slidebarwidth: "<?php echo $lucent_global['lucent_hiddenside_width']['width']; echo $lucent_global['lucent_hiddenside_width']['units']; ?>",
		close: ".overlay-close",
	});
<?php } ?>

	jQuery('.lucentnav').LucentNav();

	<?php if ( 'true' === $lucent_global['lucent_menu_sticky'] && 'top' === $lucent_global['header_position'] ) { ?>
	jQuery('.lucent-sticky').LucentStickyHeader({
		transitionStyle: '<?php echo $lucent_global['lucent_sticky_animation']; ?>',
		<?php
		if ( 'true' === $lucent_global['lucent_sticky_shadow'] ) {
			echo 'shadow: true,';}
?>
	});
		
	<?php } if ( 'yes' === $lucent_global['lucent_mobile_sticky'] ) { ?>
	jQuery('.lucent-mobile-sticky').LucentStickyHeader({
		transitionStyle: '<?php echo $lucent_global['lucent_sticky_animation']; ?>',
		<?php
		if ( 'true' === $lucent_global['lucent_sticky_shadow'] ) {
			echo 'shadow: true,';}
?>
	});
		
<?php } ?>

	jQuery('#lucent-mobile').lucentslidemenu({
		menuWidth: '100%',
		menuHeight: '100%',
		backItemIcon: 'icon-arrow-left',
		groupIcon: 'icon-arrow-right',
		mode: 'overlap',
		onItemClick: function() {
		var event = arguments[0],
			$menuLevelHolder = arguments[1],
			$item = arguments[2],
			options = arguments[3];
		var itemHref = $item.find( 'a:first' ).attr( 'href' );
		location.href = itemHref;
	}
	});

	jQuery('.lucent-lightbox').iziModal();

<?php if ( class_exists( 'WooCommerce' ) ) { ?>

	jQuery(".share-product").iziModal();

	jQuery(".lucent-accordion").Lucentaccordion();

	jQuery("#lucent-filters, .option-set, .orderby, .variations select, .lucent-reg-personal select, .woocommerce-EditAccountForm select, .account-navigation").lucentselect();

	jQuery(".compact-view-content").iziModal({
		group: 'products',
		loop: true,
		transitionIn: "<?php echo $lucent_global['lucent_compact_in']; ?>",
		transitionOut: "<?php echo $lucent_global['lucent_compact_out']; ?>",
		navigateArrows: 'closeToModal', // Boolean, 'closeToModal', 'closeScreenEdge'																													
	});

<?php if ( 'slideout' === $lucent_global['lucent_fancy_cart'] ) { ?>
	jQuery('#lucentslideoutcart').LucentSlide({
		trigger: "a#fancy_minicart",
		effect: "<?php echo $lucent_global['lucent_slidecart_fx']; ?>",
		position: "<?php echo $lucent_global['lucent_fancycart_slide']; ?>",
		slidebarwidth: "<?php echo $lucent_global['lucent_slidecart_width']['width']; ?>",
		close: ".close-cart",
	});
<?php } if ( $lucent_global['lucent_fancy_cart'] == 'popup' ) { ?>
  
	jQuery("#lucentpopupcart").iziModal({
		title: "<?php echo __( 'Your Shopping Cart','lucent' ); ?>",
		transitionIn: "<?php echo $lucent_global['lucent_fancy_cart_in']; ?>",
		transitionOut: "<?php echo $lucent_global['lucent_fancy_cart_out']; ?>"
	});

<?php } if ( 'popup' === $lucent_global['lucent_fancy_cart'] && ! is_product() ) { ?>
	jQuery(document).on('click', '#lucentpopupcart .plus', function () {
		$input = $(this).prev('input.qty');
		console.log($input);
		var val = parseInt($input.val());
		$input.val(val + 1).change();
	});
	jQuery(document).on('click', '#lucentpopupcart .minus', function () {
		$input = $(this).next('input.qty');
		var val = parseInt($input.val());
		if (val > 0) {
			$input.val(val - 1).change();
		}
	});
	<?php } elseif ( 'slide' === $lucent_global['lucent_fancy_cart'] && ! is_product() ) { ?>
	jQuery('.quantity').on('click', '.plus', function (e) {
		$input = $(this).prev('input.qty');
		var val = parseInt($input.val());
		$input.val(val + 1).change();
	});

	JQuery('.quantity').on('click', '.minus', function (e) {
		$input = $(this).next('input.qty');
		var val = parseInt($input.val());
		if (val > 0) {
			$input.val(val - 1).change();
		}
	});
	
<?php } if ( ($lucent_global['lucent_shop_layout'] == 'lucent-masonry grid') ) { ?>

	var $container = $('.products'),
	filters = {};
	$container.isotope({
		itemSelector : '.grid-item, .flat-item',
		masonry: {
			gutter: 5
		}
	});
	$container.imagesLoaded().progress( function($) {
	fitWidth: true
	});
	// filter buttons
	jQuery('#filters select').change(function(){
		var $this = $(this);
		var group = $this.attr('data-filter-group');
		filters[ group ] = $this.find(':selected').attr('data-filter-value');
		var isoFilters = [];
		for ( var prop in filters ) {
			isoFilters.push( filters[ prop ] )
		}
		var selector = isoFilters.join('');
		$container.isotope({ filter: selector });
		return false;
	});
	jQuery('ul>li').click(function() {
		var $this = jQuery(this);
		var group = $this.parent().data('filter-group');
		filters[ group ] = $this.data('filter-value'); 
		var isoFilters = [];
		for ( var prop in filters ) {
			isoFilters.push( filters[ prop ] )
		}
	});

<?php } else { ?>
	
	Isotope.Item.prototype._create = function() {
		this.id = this.layout.itemGUID++;
		this._transn = {
			ingProperties: {},
			clean: {},
			onEnd: {}
		};
		this.sortData = {};
	};
	Isotope.Item.prototype.layoutPosition = function() {
		  this.emitEvent( 'layout', [ this ] );
	};
	Isotope.prototype.arrange = function( opts ) {
		this.option( opts );
		this._getIsInstant();
		this.filteredItems = this._filter( this.items );
		this._isLayoutInited = true;
	};
	Isotope.LayoutMode.create('none');
	var $container = $('.products'),
	filters = {};
	$container.isotope({
		itemSelector : '.product',
		layoutMode: 'none',
	  });
	$container.imagesLoaded().progress( function($) {
		$container.isotope('layout');
		fitWidth: true
	  });
	  $('#filters select').change(function(){
		var $this = $(this);
		var group = $this.attr('data-filter-group');
		filters[ group ] = $this.find(':selected').attr('data-filter-value');
		var isoFilters = [];
		for ( var prop in filters ) {
		  isoFilters.push( filters[ prop ] )
		}
		var selector = isoFilters.join('');
		$container.isotope({ filter: selector });
		return false;
	  });
	  
	jQuery('ul>li').click(function() {
		var $this = jQuery(this);
		var group = $this.parent().data('filter-group');
		filters[ group ] = $this.data('filter-value'); 
		var isoFilters = [];
		for ( var prop in filters ) {
		isoFilters.push( filters[ prop ] )
		}
	  });
	  
<?php } if ( is_user_logged_in() && is_account_page() && 'yes' === $lucent_global['lucent_accountnav_dropdown'] ) { ?>
		document.getElementById("lucent-account-nav").onchange = function() {
			if (this.selectedIndex!==0) {
				window.location.href = this.value;
			}
		};

<?php
}

if ( 'show' === $lucent_global['lucent_woo_countdown'] ) {
	global $product;
	$woocountdown = get_post_meta( $product->get_id(), '_sale_price_dates_to', true );
	if ( '' !== $woocountdown ) {
		$saledate = date( 'Y/m/d', $woocountdown );
	?>
		jQuery('#woo-countdown-<?php echo $product->get_id(); ?>').LucentCountdown({
			endDate: new Date("<?php echo $saledate; ?>"),
			theme: 'woo',
			titleDays: 'D',
			titleHours: 'H',
			titleMinutes: 'M',
			titleSeconds: 'S',
		});
	<?php
	}
}

if ( 'yes' === $lucent_global['lucent_company_registration'] ) {
	?>

	jQuery('#lucent-reg-companyinfo').hide();
	var CompanyInfo = jQuery('#lucent_customer_type');
	var select = this.value;
	CompanyInfo.change(function () {
		if ($(this).val() == 'company') {
			$('#lucent-reg-companyinfo').css("display: block");
			$('#lucent-reg-companyinfo').slideDown("slow");
		}
		else $('#lucent-reg-companyinfo').slideUp("slow");
	});

<?php
}
}
?>

});

</script>
