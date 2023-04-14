<html>
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE-edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
        <title>Mahasiswa | Ubah Data</title>
    </head>
    <body>
        <div class="container">
            <p class="display-6 text-center" style="padding-top: 20px;"> 
                Pendataan Nilai Mahasiswa
            </p>
            <?php
            // retrieve parameter
            $nim = $_GET['nim'];
            $kode_mk = $_GET['kode_mk'];

            // curl initialization
            $curl= curl_init();

            // set curl option for get data
            curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($curl, CURLOPT_URL, 'http://192.168.56.102/uts_sait_api/uts_sait_api.php?nim='.$nim.'');

            // execute curl
            $res = curl_exec($curl);

            // convert json object to php object
            $json = json_decode($res, true);

            foreach ($json["data"] as $value){
                if ($value['kode_mk'] == $kode_mk) {echo"
                    <form action='do-update.php' method='POST'>
                        <div class='container'>
                            <div class='mb-3'>
                                <label class='form-label'>NIM</label>
                                <input type='txt' class='form-control' name='nim' value=".$value['nim']." required>
                            </div>
                            <div class='mb-3'>
                                <label  class='form-label'>Kode Mata Kuliah</label>
                                <input type='text' class='form-control' name='kode_mk' value=".$value['kode_mk']." required>
                            </div> 
                            <div class='mb-3'>
                                <label class='form-label'>Nilai</label>
                                <input type='number' class='form-control' name='nilai' value=".$value['nilai']." required>
                            </div>
                            <input type='submit' class='btn btn-primary' name='submit' value='Masukkan Data'>
                        </div>
                    </form>";
                }
                else {
                    echo"
                    <p class='display-6 text-center' style='padding-top: 20px;'> 
                        Data tidak tersedia
                    </p>
                    ";
                }
            }

            // close curl session
            curl_close($curl);
        ?>
        </div>    
    </body>
</html>