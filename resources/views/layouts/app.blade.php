<!DOCTYPE html>
<html>
@include('general.head')

<body>
	<div id="main">
		@include('general.navbar')
		@include('general.modal')
		<br>
		<div class="container"
				 id="sec_1">
			@yield('content')
		</div>
	</div>

	@include('general.booty')

</html>
