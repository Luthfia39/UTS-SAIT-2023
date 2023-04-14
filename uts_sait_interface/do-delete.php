<?php

// retrieve parameter
$nim = $_GET['nim'];
$kode_mk = $_GET['kode_mk'];

// curl initialization
$curl = curl_init();

// set curl option for update data
curl_setopt_array($curl, array(
  CURLOPT_URL => 'http://192.168.56.102/uts_sait_api/uts_sait_api.php?nim='.$nim.'&kode_mk='.$kode_mk.'',
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => '',
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 0,
  CURLOPT_FOLLOWLOCATION => true,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => 'DELETE',
));

// execute curl
$response = curl_exec($curl);

// convert json object to php object
$result = json_decode($response, true);

// close curl session
curl_close($curl);

// notification process
echo "<script>
alert('".$result['message']."');
window.location.href='index.php';
</script>";
?>