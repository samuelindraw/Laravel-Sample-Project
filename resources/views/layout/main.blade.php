<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <!-- Bootstrap CSS -->
    <title>@yield('title')</title>
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">Laravel</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup"
                aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                <div class="navbar-nav">
                    <a class="nav-link active" aria-current="page" href="/">Calculator</a>
                    <a class="nav-link" href="/bahancrud">Crud Bahan Baku</a>
                    <a class="nav-link" href="/student">EXPORT- IMPORT &nbsp;</a>
                    <a class="nav-link" href="/about">Tes Kecil</a>
                    <a class="nav-link" href="/teskecil/hitungabjad">Cek abjad</a>
                    <a class="nav-link" href="/teskecil/cekkalender">Cek Kalender</a>
                    <a class="nav-link" href="/teskecil/pisahstr">Pisah Str</a>
                    <a class="nav-link" href="/teskecil/pisahstr">Pisah Str</a>
                    <a class="nav-link" href="/teskecil/fibonaci">Fibonaci</a>
                    <a class="nav-link" href="/teskecil/deretangka">Deret Angka</a>
                    <a class="nav-link" href="/teskecil/counter">Counter4digit</a>
                    <a class="nav-link" href="/teskecil/bintang">Bintang</a>
                    <a class="nav-link" href="/teskecil/separator">Separator</a>
                    <a class="nav-link" href="/teskecil/jamtambah">Jam</a>
                </div>
            </div>
        </div>
    </nav>
    @yield('container')
    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js"
        integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous">
    </script>
</body>

</html>
