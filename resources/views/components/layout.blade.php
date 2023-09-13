<!doctype html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite('resources/css/app.css')
    @vite('resources/js/app.js')
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800;900&display=swap"
    rel="stylesheet"> 
</head>

<style>
    @import url('https://fonts.cdnfonts.com/css/sansation');

    body {
        font-family: inter;
    }
</style>

<body>
 {{$slot}}
</body>

</html>