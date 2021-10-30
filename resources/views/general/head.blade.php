<head>
	<meta charset = "UTF-8">

	<title>{{ config('app.name') }}</title>
	<meta name    = "csrf-token"
	      content = "{{ csrf_token() }}">


	<meta name    = "viewport"
	      content = "width=device-width, initial-scale=1">

	<!-- Font Awesome -->
	<link rel            = "stylesheet"
	      href           = "https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.14.0/css/all.min.css"
	      integrity      = "sha512-1PKOgIY59xJ8Co8+NE6FZ+LOAZKjy+KY8iq0G4B3CyeY6wYHN3yt9PW0XpSriVlkMXe40PTKnXrLnZ9+fkDaog=="
	      crossorigin    = "anonymous" />
	<link rel            = "stylesheet"
	      href           = "https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css"
	      integrity      = "sha512-1ycn6IcaQQ40/MKBW2W4Rhis/DbILU74C1vSrLJxCq57o941Ym01SwNsOMqvEBFlcgUa6xLiPY/NS5R+E6ztJQ=="
	      crossorigin    = "anonymous"
	      referrerpolicy = "no-referrer" />
	{{--
	<link href = "https://cdn.jsdelivr.net/gh/gitbrent/bootstrap4-toggle@3.6.1/css/bootstrap4-toggle.min.css"
	      rel  = "stylesheet"> --}}

	<!-- AdminLTE -->
	<link rel         = "stylesheet"
	      href        = "https://cdnjs.cloudflare.com/ajax/libs/admin-lte/3.0.5/css/adminlte.min.css"
	      integrity   = "sha512-rVZC4rf0Piwtw/LsgwXxKXzWq3L0P6atiQKBNuXYRbg2FoRbSTIY0k2DxuJcs7dk4e/ShtMzglHKBOJxW8EQyQ=="
	      crossorigin = "anonymous" />

	<!-- iCheck -->
	{{--
	<link rel         = "stylesheet"
	      href        = "https://cdnjs.cloudflare.com/ajax/libs/icheck-bootstrap/3.0.1/icheck-bootstrap.min.css"
	      integrity   = "sha512-8vq2g5nHE062j3xor4XxPeZiPjmRDh6wlufQlfC6pdQ/9urJkU07NM0tEREeymP++NczacJ/Q59ul+/K2eYvcg=="
	      crossorigin = "anonymous" /> --}}
	<link rel         = "stylesheet"
	      href        = "https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/css/select2.min.css"
	      integrity   = "sha512-nMNlpuaDPrqlEls3IX/Q56H36qvBASwb3ipuo3MxeWbsQB1881ox0cRv7UPTgBlriqoynt35KjEwgGUeUXIPnw=="
	      crossorigin = "anonymous" />
	<link rel         = "stylesheet"
	      href        = "https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.47/css/bootstrap-datetimepicker.min.css"
	      integrity   = "sha512-aEe/ZxePawj0+G2R+AaIxgrQuKT68I28qh+wgLrcAJOz3rxCP+TwrK5SPN+E5I+1IQjNtcfvb96HDagwrKRdBw=="
	      crossorigin = "anonymous" />


	<script src         = "https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"
	        integrity   = "sha512-bLT0Qm9VnAYZDflyKcBaQ2gg0hSYNQrJ8RilYldYQ1FxQYoCLtUjuuRuZo+fjqhx/qtq/1itJ0C2ejDxltZVFg=="
	        crossorigin = "anonymous"></script>
	<script src         = "https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"
	        integrity   = "sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN"
	        crossorigin = "anonymous">
	</script>
	<script src         = "https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js"
	        integrity   = "sha384-w1Q4orYjBQndcko6MimVbzY0tgp4pWB4lZ7lr30WKz0vr/aWKhXdBNmNb5D92v7s"
	        crossorigin = "anonymous">
	</script>


	<link rel         = "stylesheet"
	      href        = "https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/css/bootstrap.min.css"
	      integrity   = "sha384-/Y6pD6FV/Vv2HJnA6t+vslU6fwYXjCFtcEpHbNJ0lyAFsXTsjBbfaDjzALeQsN6M"
	      crossorigin = "anonymous">
	<link rel         = "stylesheet"
	      href        = "https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.5.2/animate.min.css">

	{{-- JQUERY UI --}}
	<script src  = "https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
	<link   rel  = "stylesheet"
	        href = "//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">

	{{-- LODASH --}}
	<script src = "/js/lodash.js"></script>
	<script src = "/js/functions.js"></script>

	{{-- ALPINEJS --}}
	<script src = "//unpkg.com/alpinejs"
					defer></script>

</head>