<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Test</title>
</head>
<body>
    <iframe src="https://es.amateur.tv/%26output%3Dembed" class="embed-responsive-item" id="data" frameborder="0" allowfullscreen></iframe>
    <!--<iframe width='1080' height='760' src="https://www.youtube.com/embed/dQw4w9WgXcQ" frameborder="0" allowfullscreen></iframe>-->
</body>
</html>

<script src="{{asset('js/jquery-3.1.1.min.js')}}"></script>

<script>
    $(document).ready(function() {
        var url = "https://es.amateur.tv/"+"&output=embed";
        //window.location.replace(url);
    });
</script>