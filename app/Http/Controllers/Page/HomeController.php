<?php

namespace App\Http\Controllers\Page;

use App\Http\Controllers\Controller;

use App\Models\Message;

class HomeController extends Controller
{
	protected $pageTitle = 'Read the world!';
	protected $pageMetaDescription = 'Welcome to Message Wall, read the world!';

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
   * Displays the Home Page.
   *
   * @return view
   */
	public function index()
	{
		// Dynamically generates a placeholder for the `message` field.
		$placeholder = $this->generatePlaceholder();

		// Retrieves all messages.
		$messages = Message::getAll();

		return view('home.index', compact('placeholder', 'messages'));
	}

	/**
   * Dynamically generates a placeholder message.
   *
   * @return string
   */
	private function generatePlaceholder()
	{
		$placeholders = [
			'Say something awesome!',
			'What\'s on your mind?',
			'Shout it out to the world!'
		];

		// Randomly selects an index from the preset placeholders and returns it
		// then retrieves the element for that index.
		return $placeholders[array_rand($placeholders)];
	}
}
