<?php

namespace App\Models;

class Message
{
	/**
   * The file to which messages should be written.
   *
   * @var string
   */
	private static $messagesFile = 'messages.csv';

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
   * Retrieves all selected messages from the messages.csv file and randomizes their order.
   *
   * @return array
   */
	public static function getAll()
	{
		$messages = [];
		
		// Reads in the messages.csv file
		$file = fopen(storage_path(self::$messagesFile), "a+");
		while ($line = fgetcsv($file, 100)) {
			$messages[] = $line[0];
		}
		fclose($file);

		if (count($messages) > 0) {
			shuffle($messages);
		} else {
			$messages[] = "Hi, I hope you enjoy my little app! Dominic :)";
		}

		return $messages;
	}

	/**
   * Stores the specified message by appending it to the end of the message.csv file.
   *
   * @param string $message
   *
   * @return void
   */
	public static function store(string $message)
	{
		$file = fopen(storage_path(self::$messagesFile), "a+");
		fputcsv($file, array($message));
		fclose($file);
	}
}
