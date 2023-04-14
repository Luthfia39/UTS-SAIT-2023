<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE-edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Mahasiswa</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    </head>
    <body>
        <div class="container">
            <p class="display-6 text-center" style="padding-top: 20px;"> Data Mahasiswa :  </p>
            <?php
                $curl = curl_init();

                curl_setopt_array($curl, array(
                CURLOPT_URL => 'http://192.168.56.102/uts_sait_api/uts_sait_api.php',
                CURLOPT_RETURNTRANSFER => true,
                CURLOPT_ENCODING => '',
                CURLOPT_MAXREDIRS => 10,
                CURLOPT_TIMEOUT => 0,
                CURLOPT_FOLLOWLOCATION => true,
                CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                CURLOPT_CUSTOMREQUEST => 'GET',
                ));

                $response = curl_exec($curl);
                $json = json_decode($response, true);
                $no = 1;

                echo "<div class='table-responsive' style='padding: 20px; margin-top: 20px;'>
                    <table class='table'>
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>NIM</th>
                                <th>Nama</th>
                                <th>Alamat</th>
                                <th>Tanggal Lahir</th>
                                <th>Kode Mata Kuliah</th>
                                <th>Nama Mata Kuliah</th>
                                <th>SKS</th>
                                <th>Nilai</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>";
                        foreach ($json["data"] as $value){echo"
                        <tr>
                            <td>".$no++." </td>
                            <td>".$value["nim"]." </td>
                            <td>".$value["nama"]." </td>
                            <td>".$value["alamat"]." </td>
                            <td>".$value["tanggal_lahir"]." </td>
                            <td>".$value["kode_mk"]." </td>
                            <td>".$value["nama_mk"]." </td>
                            <td>".$value["sks"]." </td>
                            <td>".$value["nilai"]." </td>
                            <td> 
                                <a href='form-update.php?nim=".$value["nim"]."&kode_mk=".$value["kode_mk"]."' 
                                style='padding-right: 5px; color: blue;'>
                                <i class='fa fa-pencil-square-o' aria-hidden='true'></i></a>

                                <a href='do-delete.php?nim=".$value["nim"]."&kode_mk=".$value["kode_mk"]."' 
                                style='color: red;'>
                                <i class='fa fa-trash-o' aria-hidden='true'></i></a>
                            </td>
                        </tr>";}
                    echo"</table>
                </div>";

                curl_close($curl);
            ?>
            <div class="container">
                <a type="submit" class="btn btn-primary" href="form-add.php" style="margin: 20px 0 40px 0;">Tambah Data</a>
            </div>
        </div>
    </body>
</html>