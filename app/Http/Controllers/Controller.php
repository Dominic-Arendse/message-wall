<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Support\Facades\Auth;

use View;

class Controller extends BaseController
{
  use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

  protected $pageTitle = null;
	protected $pageMetaDescription = null;

	/**
   * The default class constructor.
   *
   * @return void
   */
	public function __construct()
	{
		// Page (Normal) Data
  	View::share('pageTitle', $this->pageTitle);
  	View::share('pageMetaDescription', $this->pageMetaDescription);
  }
}