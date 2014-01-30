<!DOCTYPE html>
<html>
	<head>
		<title>Phalcon PHP Framework</title>

        {#{ stylesheet_link("http://fonts.googleapis.com/css?family=Rosario", false) }#}
        {{ stylesheet_link("http://fonts.googleapis.com/css?family=Monoton", false) }}
        {{ stylesheet_link("css/main.css") }}
	</head>
	<body class="{{ classBody }}">

		{{ content() }}
        {{ assets.outputJs('footer') }}



        <strong style="color:green">Global Layout(дефолтный) /views/index.volt</strong>
        <br>
        <a class="copyright">PhalconPHP Framework &copy</a>
	</body>
</html>