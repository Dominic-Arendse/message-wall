@extends('layouts.app')

@section('page-content')
	<div class="row">
		<div class="col s12">
			<h1 id="home_page_title">MESSAGE WALL</h1>
		</div>
		<div class="col s12">
			<h2 id="home_page_slogan">Read the world!</h2>
		</div>
	</div>

	<div class="row" style="text-align: center;">
		<form name="recaptcha_form" action="{{ url('message') }}" method="PUT">
			<div class="input-field col s8 offset-s2">
        <input type="text" id="message" name="message" placeholder="{{ $placeholder }}" maxlength="70" style="display: block; margin-left: auto; margin-right: auto;">
      </div>

      <div class="col s12">
				<button type="submit" onclick="onSubmitForRecaptcha()" class="waves-effect waves-light btn red">
					<i class="material-icons">create</i>
				</button>
			</div>
		</form>
	</div>

	<div id="messages" class="row">
		<div class="col s10 offset-s1">
			<ul>
			@foreach($messages as $message)
				<li>
				  <a href="#">
				    <p>{{ $message }}</p>
				  </a>
				</li>
			@endforeach
			</ul>
		</div>
	</div>
@endsection