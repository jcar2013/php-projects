<?php

session_start();

/**
 * This file is the main API for GetResponse
 *
 * @category   GetResponse API
 * @package    GetResponse
 * @author     Wonkasoft <Support@Wonkasoft.com>
 * @copyright  2019 Wonkasoft
 * @version    Release: 1.0.0
 * @since      file available since Release 1.0.0
 */

$config = parse_ini_file( 'inc/config.ini' );

if ( empty( $_GET ) ) {												// Checks if field are null
	header( 'Location: https://aperabags.com/' );
	die();
} elseif ( empty( $_GET['nonce'] ) ) {				// Check is nonce is left empty
	header( 'Location: https://aperabags.com/' );
	die();
} elseif ( $_GET['nonce'] != 4646 ) {					// Checks for valid nonce
	exit( 'Invalid request' );
} else {
	$email     = $_GET['email'];								// Loads the data into local variables
	$status    = $_GET['status'];
	$nonce     = $_GET['nonce'];
	$useragent = $_SERVER['HTTP_USER_AGENT'];			

	$token = $config['key'];										// Loads token form config file

}


function update( $email ) {
	/*	Header data. Useragent is the type of device is being used.
			Token is passed through.
	*/
	$headerdata = array(
		'User-Agent:' . $useragent,
		'X-Auth-Token: api-key ' . $token,
		'Referer: localhost',
		'Content-Type: multipart/form-data',			// What is multipart/data?? 
	);

	$post_data = array(
		'email'  => $email,
		'status' => $status,
	);

	$ch = curl_init(); // Starts the cURL session

	// How is the data loaded in the url params
	$url = 'https://api.getresponse.com/v3/contacts?query[email]=info@wonkasoft.com&query[origin]=api';

	curl_setopt( $ch, CURLOPT_URL, $url );

	curl_setopt( $ch, CURLOPT_RETURNTRANSFER, 1 );

	curl_setopt( $ch, CURLOPT_FOLLOWLOCATION, true );

	curl_setopt( $ch, CURLOPT_SSL_VERIFYPEER, false );

	curl_setopt( $ch, CURLOPT_USERAGENT, $useragent );

	curl_setopt( $ch, CURLOPT_HTTPHEADER, $headerdata );

	curl_setopt( $ch, CURLOPT_HEADER, true );

	// curl_setopt( $ch, CURLOPT_POSTFIELDS, $post_data );

	$output = json_decode( json_encode( curl_exec( $ch ) ), false );

	if ( $output === false ) {
		echo 'cURL Error: ' . curl_error( $ch );
	}

	curl_close( $ch ); 			// Closes the cURL session

	echo $output;
}

function add( $email ) {
	$headerdata = array(
		'User-Agent:' . $useragent,
		'X-Auth-Token: api-key ' . $token,
		'Referer: localhost',
		'Content-Type: multipart/form-data',
	);

	$post_data = array(
		'email'  => $email,
		'status' => $status,
	);

	$ch = curl_init();

	$url = 'https://api.getresponse.com/v3/contacts?query[email]=info@wonkasoft.com&query[origin]=api';

	curl_setopt( $ch, CURLOPT_URL, $url );

	curl_setopt( $ch, CURLOPT_RETURNTRANSFER, 1 );

	curl_setopt( $ch, CURLOPT_FOLLOWLOCATION, true );

	curl_setopt( $ch, CURLOPT_SSL_VERIFYPEER, false );

	curl_setopt( $ch, CURLOPT_USERAGENT, $useragent );

	curl_setopt( $ch, CURLOPT_HTTPHEADER, $headerdata );

	curl_setopt( $ch, CURLOPT_HEADER, true );

	// curl_setopt( $ch, CURLOPT_POSTFIELDS, $post_data );

	$output = json_decode( json_encode( curl_exec( $ch ) ), false );

	if ( $output === false ) {
		echo 'cURL Error: ' . curl_error( $ch );
	}

	curl_close( $ch );

	echo $output;

}

function delete( $email ) {
	$headerdata = array(
		'User-Agent:' . $useragent,
		'X-Auth-Token: api-key ' . $token,
		'Referer: localhost',
		'Content-Type: multipart/form-data',
	);

	$post_data = array(
		'email'  => $email,
		'status' => $status,
	);

	$ch = curl_init();

	$url = 'https://api.getresponse.com/v3/contacts?query[email]=info@wonkasoft.com&query[origin]=api';

	curl_setopt( $ch, CURLOPT_URL, $url );

	curl_setopt( $ch, CURLOPT_RETURNTRANSFER, 1 );

	curl_setopt( $ch, CURLOPT_FOLLOWLOCATION, true );

	curl_setopt( $ch, CURLOPT_SSL_VERIFYPEER, false );

	curl_setopt( $ch, CURLOPT_USERAGENT, $useragent );

	curl_setopt( $ch, CURLOPT_HTTPHEADER, $headerdata );

	curl_setopt( $ch, CURLOPT_HEADER, true );

	// curl_setopt( $ch, CURLOPT_POSTFIELDS, $post_data );

	$output = json_decode( json_encode( curl_exec( $ch ) ), false );

	if ( $output === false ) {
		echo 'cURL Error: ' . curl_error( $ch );
	}

	curl_close( $ch );

	echo $output;

}

function search( $email ) {
	$headerdata = array(
		'User-Agent:' . $useragent,
		'X-Auth-Token: api-key ' . $token,
		'Referer: localhost',
		'Content-Type: multipart/form-data',
	);

	$post_data = array(
		'email'  => $email,
		'status' => $status,
	);

	$ch = curl_init();

	$url = 'https://api.getresponse.com/v3/contacts?query[email]=info@wonkasoft.com&query[origin]=api';

	curl_setopt( $ch, CURLOPT_URL, $url );

	curl_setopt( $ch, CURLOPT_RETURNTRANSFER, 1 );

	curl_setopt( $ch, CURLOPT_FOLLOWLOCATION, true );

	curl_setopt( $ch, CURLOPT_SSL_VERIFYPEER, false );

	curl_setopt( $ch, CURLOPT_USERAGENT, $useragent );

	curl_setopt( $ch, CURLOPT_HTTPHEADER, $headerdata );

	curl_setopt( $ch, CURLOPT_HEADER, true );

	// curl_setopt( $ch, CURLOPT_POSTFIELDS, $post_data );

	$output = json_decode( json_encode( curl_exec( $ch ) ), false );

	if ( $output === false ) {
		echo 'cURL Error: ' . curl_error( $ch );
	}

	curl_close( $ch );

	echo $output;
}
