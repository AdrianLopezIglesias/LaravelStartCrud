<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Adrian Lopez Iglesias - Desarrollos IT</title>
    <!-- Google Tag Manager -->
    <script>
        (function(w, d, s, l, i) {
            w[l] = w[l] || [];
            w[l].push({
                'gtm.start': new Date().getTime(),
                event: 'gtm.js'
            });
            var f = d.getElementsByTagName(s)[0],
                j = d.createElement(s),
                dl = l != 'dataLayer' ? '&l=' + l : '';
            j.async = true;
            j.src =
                'https://www.googletagmanager.com/gtm.js?id=' + i + dl;
            f.parentNode.insertBefore(j, f);
        })(window, document, 'script', 'dataLayer', 'GTM-PWTQF87');
    </script>
    <!-- End Google Tag Manager -->
    <script type="text/javascript">
        window.textos = {!!json_encode($f) !!}
    </script>
    <script type="text/javascript">
        window.tecnologias = {!!json_encode($tec) !!}
    </script>
    <script type="text/javascript">
        window.proyectos = {!!json_encode($pro) !!}
    </script>
</head>

<body>
    @section('content')

    <div class="" id="App">

    </div>
</body>
<!-- Google Tag Manager (noscript) -->
<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-PWTQF87" height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
<!-- End Google Tag Manager (noscript) -->
<script src="{{ mix('js/app.js') }}"></script>