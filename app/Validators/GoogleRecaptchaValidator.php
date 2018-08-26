<?php

namespace App\Validators;

use Log;

class GoogleRecaptchaValidator {
	/**
   * The default class constructor.
   *
   * @return void
   */
	public function __construct()
  {
		// ..
  }

  /**
   * Validates the reCAPTCHA if it exists in the supplied Request.
   *
   * @param array $request
   * @return stdClass / null
   */
  public static function validate(array $request)
  {
    if (isset($request['g-recaptcha-response'])) {
      $parameters = array(
        'secret' => ' 6LeZfRsUAAAAAJ-YxDdsKbEcyukM5RhKwQVr6L_T',
        'response' => $request['g-recaptcha-response']
      );
      
      return self::_fetchFromGoogle($parameters);
    }
    
    return null;
  }

  /**
   * Fetches the API Response via cURL from Google.
   *
   * @param array $parameters
   * @return array
   */
  private static function _fetchFromGoogle(array $parameters) 
  {
    $defaults = array(
      CURLOPT_URL => 'https://www.google.com/recaptcha/api/siteverify', 
      CURLOPT_POST => true,
      CURLOPT_POSTFIELDS => $parameters,
      CURLOPT_RETURNTRANSFER => true,
    );

    $ch = curl_init();
    curl_setopt_array($ch, $defaults);

    $response = curl_exec($ch);
    $httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
    curl_close($ch);

    if ($httpCode == 200) {
      return json_decode($response, true);
    }
    
    Log::error('Failed contacting Google for reCAPTCHA validation.');
    return null;
  }
}
