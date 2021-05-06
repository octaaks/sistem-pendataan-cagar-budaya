<!DOCTYPE html>
<html>

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@500;700;900&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="/css/custom.css">
</head>

<body>

    <div class="bg">
    </div>
    <div class="content">
        <div class="row">
            <div class="col-lg-6">
                <img class="logo-small" src="/res/img/logo_salatiga.png">
            </div>
            <div class="col-lg-6 text-right">
                <img class="logo-big" src="/res/img/wonderful_indonesia.png">
            </div>
        </div>
        <div class="bottom-section">
            <div class="row">
                <div class="col-lg-12">
                    <h2 class="title">PENDATAAN DINAS PARIWISATA DAN KEBUDAYAAN</h2>
                    <h2 class="title">KOTA SALATIGA</h2>
                </div>
            </div>
            <div class="row mt-5">
                <div class="col-lg-12">
                    <form action="{{ route('login') }}">
                        <button class="btn button-home">Login</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

</body>

</html>