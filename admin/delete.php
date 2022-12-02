<?php
session_start();

require_once  '../vendor/autoload.php';

//database and admin
use BugTracking\Database\Database;
use BugTracking\Models\Admin;
//config
use BugTracking\Config\Config;



//error reporting
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);


if (!isset($_SESSION['u_id'])) {
	header('Location:'.Config::$home);
	exit();
}
else{

    $database = new Database();
    $db = $database->connect();
    $admin = new Admin($db);


    if(isset($_SERVER['REQUEST_METHOD']) == "GET"){

        if(isset($_GET['tid'])){

            
            $admin->tid = $_GET['tid'];
            if($admin->deleteType()){
                header('Location: admin.php');
                exit();
            }
            else{
                die('err');
            }


        }
        if(isset($_GET['sid'])){
            $admin->sid = $_GET['sid'];
            if($admin->deleteStatus()){
                header('Location: admin.php');
                exit();
            }
            else{
                die('err');
            }


        }

        if(isset($_GET['pid'])){
            $admin->pid = $_GET['pid'];
            $admin->deletePriority();
            header('Location: admin.php');
            exit();
            
        
          

        }
    }
    else{
        header('Location:'.Config::$home);
        exit();
    }
}
