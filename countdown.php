<?php

/**
 * Função responsável por gerar contador de tempo regressivo
 */
function do_countdown($atts) {

	$attributes = array("referencia" => "","size" => "", "data"=>"");

	extract(
			shortcode_atts($attributes, $atts)
			);

	if ($referencia == "") {
		echo "";
	}

	$size = trim($size) != "" ? "countdown-size-" . $size : "";
	$data = trim($data) != "" ? date("Y-m-d",strtotime(str_replace("/", "-", $data))) : "";

	if ( isset($referencia) && !empty($referencia) ) {
		$propertyData = getPropertyByReference($referencia);
	}



	if ( empty($referencia) && !empty($data) ) {
		$referencia = microtime(true);
	}
	

	$out = "
		<div class='countdown-item $size' id='countdown-$referencia'>
			<div class='countdown-unit'><span id='countdown-days-$referencia'>00</span><label>DIAS</label></div>
			<div class='countdown-unit'><span id='countdown-hours-$referencia'>00</span><label>HORAS</label></div>
			<div class='countdown-unit'><span id='countdown-minutes-$referencia'>00</span><label>MIN</label></div>
			<div class='countdown-unit'><span id='countdown-seconds-$referencia'>00</span><label>SEG</label></div>
			<div class='clear'></div>
		</div>	
	";

	if ( isset($propertyData) || !empty($data) ) {

		$dateCountdown = "";

		if ( isset($propertyData) && trim($propertyData->end) != "" ) {
			$dateCountdown = trim($propertyData->end);
		} else if ( !empty($data) ) {
			$dateCountdown = $data;
		}

		if ( !empty($dateCountdown) && strtotime(date("Y-m-d")) < strtotime($dateCountdown) ) {
			$out .= "<script>
						runCountdown('$referencia','$dateCountdown');
					</script>";
		}

	}

	

	echo $out;
}
add_shortcode('apocountdow', 'do_countdown');


function load_countdown_assets() {
	wp_register_script( 'countdownlib', PLUGIN_COUNTDOWN_URL . "assets/js/countdown.js");
    wp_enqueue_script( 'countdownlib' );

    wp_register_script( 'countdownbase', PLUGIN_COUNTDOWN_URL . "assets/js/base.js");
    wp_enqueue_script( 'countdownbase' );

    wp_register_style( 'countdowncss', PLUGIN_COUNTDOWN_URL . "assets/css/countdown.css");
    wp_enqueue_style( 'countdowncss' );
}
add_action( 'wp_enqueue_scripts', 'load_countdown_assets');

function getPropertyByReference($reference) {

	global $wpdb;

	$propertyData = $wpdb->get_row($wpdb->prepare ("SELECT dataInicioEvento AS start, dataFimEvento AS end FROM ". TABLE_PROPERTIES_COUNTDOWN ." WHERE referencia = '{$reference}' LIMIT 1",array()));

	return $propertyData;
}