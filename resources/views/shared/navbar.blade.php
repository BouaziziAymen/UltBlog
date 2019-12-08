<nav class="navbar navbar-default">
<div class="container-fluid">
<!-- Brand and toggle get grouped for better mobile display -->
<div class="navbar-header">
<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
<span class="sr-only">Toggle navigation</span>
<span class="icon-bar"></span>
<span class="icon-bar"></span>
<span class="icon-bar"></span>
</button>
<a class="navbar-brand" href="#">{!! trans('main.right_title') !!}</a>
</div>
<!-- Navbar Right -->
<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
<ul class="nav navbar-nav navbar-right">
<li><a href="/">{!! trans('main.home') !!}</a></li>
<li><a href="/blog">Blog</a></li>
<li><a href="/about">{!! trans('main.about') !!}</a></li>
<li><a href="/contact">{!! trans('main.contact') !!}</a></li>
<li class="dropdown">
<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">{!! trans('main.member') !!} <span class="caret"></span></a>
<ul class="dropdown-menu" role="menu">
@if (Auth::check())
@if(Auth::user()->hasRole('manager'))
<li><a href="/admin">Admin</a></li>
@endif
<li><a href="/users/logout">{!! trans('main.logout') !!}</a></li>
@else
<li><a href="/users/register">{!! trans('main.register') !!}</a></li>
<li><a href="/users/login">{!! trans('main.login') !!}</a></li>
@endif
</ul>
</li>
</ul>
</div>
</div>
</nav>