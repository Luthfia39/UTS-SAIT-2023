<?php
require_once "conn.php";
$request_method=$_SERVER["REQUEST_METHOD"];
switch ($request_method) {
   case 'GET':
         if(!empty($_GET["nim"]))
         {
            $id=strval($_GET["nim"]);
            get_data($id);
         }
         else
         {
            get_all_data();
         }
         break;
   case 'POST':
         if(!empty($_GET["nim"]) and !empty($_GET["kode_mk"]))
         {
            $id=strval($_GET["nim"]);
            $mk=strval($_GET["kode_mk"]);
            update_data($id, $mk);
         }
         else
         {
            insert_data();
         }     
         break; 
   case 'DELETE':
          $id=strval($_GET["nim"]);
          $mk=strval($_GET["kode_mk"]);
            delete_data($id, $mk);
            break;
   default:
      // Invalid Request Method
         header("HTTP/1.0 405 Method Not Allowed");
         break;
      break;
 }



   function get_all_data()
   {
      global $mysqli;
      $query="SELECT * FROM all_data";
      $data=array();
      $result=$mysqli->query($query);
      while($row=mysqli_fetch_object($result))
      {
         $data[]=$row;
      }
      $response=array(
                     'status' => 1,
                     'message' =>'Pengambilan data berhasil dilakukan!',
                     'data' => $data
                  );
      header('Content-Type: application/json');
      echo json_encode($response);
   }
 
   function get_data($id=0)
   {
      global $mysqli;
      $query="SELECT * FROM all_data";
      if($id != 0)
      {
         $query.=" WHERE nim='$id'";
      }
      $data=array();
      $result=$mysqli->query($query);
      while($row=mysqli_fetch_object($result))
      {
         $data[]=$row;
      }
      $response=array(
                     'status' => 1,
                     'message' =>'Pengambilan data berhasil dilakukan!',
                     'data' => $data
                  );
      header('Content-Type: application/json');
      echo json_encode($response);
        
   }
 
   function insert_data()
      {
         global $mysqli;
         if(!empty($_POST["nilai"])){
            $data=$_POST;
         }else{
            $data = json_decode(file_get_contents('php://input'), true);
         }

         $arrcheckpost = array('nim' => '','kode_mk' => '','nilai' => '');
         $hitung = count(array_intersect_key($data, $arrcheckpost));
         if($hitung == count($arrcheckpost)){
          
               $result = mysqli_query($mysqli, "INSERT INTO perkuliahan SET
               nim = '$data[nim]',
               kode_mk = '$data[kode_mk]',
               nilai = '$data[nilai]'");                
               if($result)
               {
                  $response=array(
                     'status' => 1,
                     'message' =>'Data berhasil ditambahkan!'
                  );
               }
               else
               {
                  $response=array(
                     'status' => 0,
                     'message' =>'Penambahan data tidak berhasil dilakukan!'
                  );
               }
         }else{
            $response=array(
                     'status' => 0,
                     'message' =>'Parameter tidak sesuai!'
                  );
         }
         header('Content-Type: application/json');
         echo json_encode($response);
      }
 
   function update_data($id, $mk)
      {
         global $mysqli;
         if(!empty($_POST["nilai"])){
            $data=$_POST;
         }else{
            $data = json_decode(file_get_contents('php://input'), true);
         }

         $arrcheckpost = array('nim' => '','kode_mk' => '','nilai' => '');
         $hitung = count(array_intersect_key($data, $arrcheckpost));
         if($hitung == count($arrcheckpost)){
          
               $result = mysqli_query($mysqli, "UPDATE all_data SET
               nim = '$data[nim]',
               kode_mk = '$data[kode_mk]',
               nilai = '$data[nilai]'
               WHERE nim=".$id." AND kode_mk=".$mk );
          
            if($result)
            {
               $response=array(
                  'status' => 1,
                  'message' =>'Data berhasil diubah!'
               );
            }
            else
            {
               $response=array(
                  'status' => 0,
                  'message' =>'Data tidak berhasil diubah!'
               );
            }
         }else{
            $response=array(
                     'status' => 0,
                     'message' =>'Parameter tidak cocok'
                  );
         }
         header('Content-Type: application/json');
         echo json_encode($response);
      }
 
   function delete_data($id, $mk)
   {
      global $mysqli;
      $query="DELETE FROM perkuliahan WHERE nim='$id' AND kode_mk='$mk'";
      if(mysqli_query($mysqli, $query))
      {
         $response=array(
            'status' => 1,
            'message' =>'Data berhasil dihapus!'
         );
      }
      else
      {
         $response=array(
            'status' => 0,
            'message' =>'Data gagal dihapus!'
         );
      }
      header('Content-Type: application/json');
      echo json_encode($response);
   }

 
?> 
