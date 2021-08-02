<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{env('APP_NAME' ?? "Lumem & Vue")}}</title>
    <link rel="stylesheet" href="css/app.css" />
</head>
<body>
    <h1>My App</h1>
    <div id="app">
        <p>
            <router-link to="/foo">Go to Foo</router-link>
            <router-link to="/bar">Go to Bar</router-link>
        </p>

        <router-view></router-view>

    </div>
    <script src="js/app.js"></script>
</body>
</html>
