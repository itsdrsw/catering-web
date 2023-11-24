<?php
include 'koneksi.php';
if (function_exists($_GET['function'])) {
    $_GET['function']();
}

function get_user()
{
    global $conn;
    $query = $conn->query("select * from user");
    while ($row = mysqli_fetch_object($query)) {
        $data[] = $row;
    }

    if ($data) {
        $response = array(
            'status' => 1,
            'message' => 'Success',
            'data' => $data
        );
    } else {
        $response = array(
            'status' => 0,
            'message' => 'No Data Found'
        );
    }
    header('Content-Type: application/json');
    echo json_encode($response);
}
//api.php?function=get_user

function get_user_id() 
{
    global $conn;
    if(!empty($_GET["id_user"])) {
        $id = $_GET['id_user'];
    } else {
        $id = 0; // Berikan nilai default jika id_user tidak ditemukan.
    }
    $query = $conn->query("select * from user where id_user = $id");
    if ($query) {
        while ($row = mysqli_fetch_object($query)) {
            $data[] = $row;
        }
        if ($data) {
            $response = array(
                'status' => 1,
                'message' => 'Success',
                'data' => $data
            );
        } else {
            $response = array(
                'status' => 0,
                'message' => 'No Data Found'
            );
        }
    } else {
        $response = array(
            'status' => 0,
            'message' => 'Query Error'
        );
    }
    header('Content-Type: application/json');
    echo json_encode($response);
}

//api.php?function=get_user_id

function update_user()
{
    global $conn;
    if (!empty($_GET["id_user"])) {
        $id     = $_GET["id_user"];
        $nama   = $_GET["nama"];
        $alamat = $_GET["alamat"];
        $telp   = $_GET["telp"];
        $usrn   = $_GET["username"];
        $pass   = $_GET["password"];
    }
        $query  = "update user set nama = '$nama',alamat = '$alamat', 
        telp = '$telp', username = '$usrn', password = '$pass' 
        where id_user = $id";
        if($result = mysqli_query($conn, $query)) {
            if($result) {
                $response = array(
                    'status' => 1,
                    'message' => 'Update Succes'
                );
            }else{
                $response = array(
                    'status' => 0,
                    'message' => 'Update Failed'
                );
            }
        }else{
            $response=array(
                'status' => 0,
                'message' => 'Update Parameter',
                'data' => $id,
                'query' => $query
            );
        }
        header('Content-Type: application/json');
        echo json_encode($response);
}
//api

function delete_user()
{
    global $conn;
    $id = $_GET['id_user'];
    $query = "delete from user where id_user = $id";
    if(mysqli_query($conn, $query)) {
        $response=array(
            'status' => 1,
            'message' => "Delete Success"
        );
    }else{
        $response = array(
            'status' => 0,
            'message' => "Delete Fail",
            'message' => $query
        );
    }
    header('Content-Type: application/json');
    echo json_encode($response);
}

function insert_user()
{
    global $conn;

    if (isset($_GET["nama"], $_GET["alamat"], $_GET["telp"], 
    $_GET["username"], $_GET["password"], $_GET['security'])) {
        $nama   = $_GET["nama"];
        $alamat = $_GET["alamat"];
        $telp   = $_GET["telp"];
        $usrn   = $_GET["username"];
        $pass   = $_GET["password"];
        $scrt   = $_GET['security'];

        // Buat pernyataan SQL
        $query = "INSERT INTO user (nama, alamat, telp, username, password, security) 
        VALUES ('$nama', '$alamat', '$telp', '$usrn', '$pass', '$scrt')";
        if (mysqli_query($conn, $query)) {
            $response = array(
                'status' => 1,
                'message' => 'Insert Success'
            );
        } else {
            $response = array(
                'status' => 0,
                'message' => 'Insert Failed',
                'error' => mysqli_error($conn)
            );
        }
    } else {
        $response = array(
            'status' => 0,
            'message' => 'Missing Parameters'
        );
    }

    header('Content-Type: application/json');
    echo json_encode($response);
}
