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
    <a class="copyright">PhalconPHP Framework &copy</a>
    <br>
    <strong style="color:red">Global Layout /views/main.volt</strong>
	</body>
</html>