<?php

namespace App\Models;

class Message
{
	/**
   * The default class constructor.
   *
   * @return void
   */
	public function __construct()
	{
		// ...
  }

	/**
   * Retrieves all selected messages from the messages.txt file and randomizes their order.
   *
   * @return array
   */
	public static function getAll()
	{
		$messages = [];

		$messages[] = "Hi, I hope you enjoy my little app! Dominic :)";
		
		return $messages;
	}
}
