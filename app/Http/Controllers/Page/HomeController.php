<?php

namespace App\Http\Controllers\Page;

use App\Http\Controllers\Controller;

class HomeController extends Controller
{
	protected $pageTitle = 'Share your message with the world!';
	protected $pageMetaDescription = 'Welcome to Message Wall, share your message with the world!';

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
		return view('home.index');
	}
}
