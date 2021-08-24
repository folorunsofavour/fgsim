<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script>
        new WOW().init();
    </script>
    <title>Admin | Edu++</title>
    <!-- <link type="text/css" rel="stylesheet" href="assets/css/fontawesome/css/fontawesome.css"/> -->
    <link href="/assets/css/error_unauthorized.css" rel="stylesheet">
</head>
<body>
<div id="notfound">
    <div class="notfound">
        <div class="notfound-bg">
            <div></div>
            <div></div>
            <div></div>
        </div>
        <h1>oops!</h1>
        <h2>Error 401 : Unauthorized Access</h2>
        <a href="{{ URL::previous() }}">go back</a>
    </div>
</div>
</body>
</html>
