<html>
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE-edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
        <title>Mahasiswa | Tambah Data</title>
    </head>
    <body>
        <p class="display-6 text-center" style="padding-top: 20px;"> 
            Pendataan Nilai Mahasiswa
        </p>
        <form action="do-add.php" method="POST">
            <div class="container">
                <div class="mb-3">
                    <label class="form-label">NIM</label>
                    <input type="txt" class="form-control" name="nim" required>
                </div>
                <div class="mb-3">
                    <label  class="form-label">Kode Mata Kuliah</label>
                    <input type="text" class="form-control" name="kode_mk" required>
                </div> 
                <!-- <div class="input-group mb-3">
                    <label class="input-group-text" for="nim"> NIM </label>
                    <select class="form-select" id="nim" name="nim">
                        <option value="-"> --Pilih NIM-- </option>
                        <option value="Nol Kilometer Jl.Malioboro"> 
                            Nol Kilometer Jl.Malioboro
                        </option>
                        <option value="Desa Wisata Sungai Code Jogja Kota"> 
                            Desa Wisata Sungai Code Jogja Kota
                        </option>
                        <option value="Candi Prambanan"> Candi Prambanan </option>
                        <option value="Kauman Pakualaman Yogyakarta"> 
                            Kauman Pakualaman Yogyakarta
                        </option>
                        <option value="Candi Borobudur"> Candi Borobudur </option>
                    </select>
                </div> -->
                <div class="mb-3">
                    <label class="form-label">Nilai</label>
                    <input type="number" class="form-control" name="nilai" required>
                </div>
                <input type="submit" class="btn btn-primary" name="submit" value="Masukkan Data">
            </div>
        </form>
    </body>
</html>