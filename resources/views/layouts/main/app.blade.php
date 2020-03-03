<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="author" content="Adrian Ardais">

    <title>Inventory System</title>

    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="{{ asset('css/main.css') }}" rel="stylesheet">



</head>

<body>
<div class="d-flex" id="wrapper">
    @include('layouts.main.sidebar.sidebar')
    <div id="page-content-wrapper">
        @include('layouts.main.navigation.nav')
        <div class="container-fluid pt-4">
            @include('layouts.flash-message.message')
            @yield('content')
        </div>

    </div>
</div>


<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>
<script>
    $("#menu-toggle").click(function(e) {
        e.preventDefault();
        $("#wrapper").toggleClass("toggled");
    });


</script>

<script>
    function checkvalue(val)
    {
        if(val==="1") {
            document.getElementById('vehicle').style.display = 'block';
            document.getElementById('supply').style.display = 'none';
        }
        else if(val=="2") {
            document.getElementById('supply').style.display = 'block';
            document.getElementById('vehicle').style.display = 'none';

        }else{
            document.getElementById('vehicle').style.display = 'none';
            document.getElementById('supply').style.display = 'none';
        }
    }
</script>
</body>
</html>
