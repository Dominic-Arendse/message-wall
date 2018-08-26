<?php

namespace App\Http\Controllers\Auth;

use App\Http\Requests\StoreMessage;

use App\Http\Controllers\Controller;

use App\Models\Message;

class SubmitMessageController extends Controller
{
	/**
   * The default class constructor.
   *
   * @return void
   */
	public function __construct()
	{
		parent::__construct();
  }

	/**
   * Handles the message submitted by the user.
   *
   * StoreMessage $request
   *
   * @return JSON
   */
	public function submitMessage(StoreMessage $request)
	{
		// Stores the user's message.
		Message::store($request["message"]);

		// Builds the response.
		$response = [
			"status" => "success",
			"data" => [
				"message" => $request["message"]
			]
		];

		return json_encode($response);
	}
}
