<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
</head>
<body>

    <!--<h1>About Me <?= $name; ?></h1>-->
    <!--<h1>About Me {{ $name }}</h1> Unescaped data-->
    <h1>About Me {!! $name !!}</h1> <!-- Unescaped data -->

    <p>
        Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ea eum eveniet exercitationem fugiat harum ipsa maxime nisi nobis perferendis quo recusandae, sit? Architecto commodi eaque, eos iure quidem sunt voluptates!
    </p>

</body>
</html>