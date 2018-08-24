<!doctype html>
<html lang="{{ app()->getLocale() }}">
  <head>
    @section('head')
      @include('layouts.head.meta')
      
      @include('layouts.head.google')

      @include('layouts.head.cdn')

      @section('styles-default')
        @include('layouts.head.styles.default')
      @show
    @show

    @include('layouts.head.title')
  </head>
  <body>
   	@section('body')
    	@include('layouts.body.background')

    	@include('layouts.body.content')
    @show
  </body>

  @section('script-default')
  	@include('layouts.scripts.default')
  @show
</html>