<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <title>Document</title>

    <style>

        body {
            background-image: url("image/langit.png");
            background-size: cover;
            background-repeat: no-repeat;
        }
    </style>

</head>
<body>
<form action="simulasi.php" method="post">
    <section class="vh-100"">
        <div class="container py-5 h-100">
        <div class="row d-flex justify-content-center align-items-center h-100">
            <div class="col-12 col-md-8 col-lg-6 col-xl-5">
            <div class="card shadow-2-strong" style="border-radius: 1rem;">
                <div class="card-body p-5 ">

                <h3 class="mb-5 text-center">Simulasi PLTS</h3>

                <div class="mb-3">
                    <label for="bebanDaya" class="form-label">MASUKAN PERKIRAAN BEBAN DAYA TUMAH ANDA (watt)</label>
                    <input type="text" class="form-control" id="bebanDaya" name="beban">
                </div>

                <button type="submit" class="btn btn-outline-primary btn-lg mt-4 mb-3" name="kirim">Kirim</button> <br>
                
                </div>
            </div>
            </div>
        </div>
        </div>
    </section>
</form>

</body>
</html>