<?php

require_once("method.php");
$mhs = new Method();

$request_method = $_SERVER["REQUEST_METHOD"];
switch ($request_method) {
    CASE 'GET':
        if(!empty($_GET["id"])){
            $id = intval($_GET["id"]);
            $mhs->get_mhs($id);
        }
        else{
            $mhs->get_mhss();
        }
    break;

    CASE 'POST':
        if(!empty($_GET["id"])){
            $id = intval($_GET["id"]);
            $mhs->update_mhs($id);
        }
        else{
            $mhs->insert_mhs();
        }
    break;

    CASE 'DELETE':
        if(!empty($_GET["id"])){
            $id = intval($_GET["id"]);
            $mhs->delete_mhs($id);
        }

    break;

    CASE 'PATCH':
        if(!empty($_GET["id"])){
            $id = intval($_GET["id"]);
            $mhs->patch_mhs($id);
        }
    break;

}

?>