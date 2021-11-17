<?php 

if(! session_id()) session_start();
require_once 'init.php';

$status = new ModelStatus();


if (isset($_POST)) {
    $id = htmlentities( $_POST['id'] );
    $newNamaStatus = htmlentities( $_POST['nama_status'] );
    
    $stat = $status->editById($id, $newNamaStatus);
    $errMsg = $status->getError();

    if ($stat > 0) {
        Flasher::setFlash('Record Successfully Editted', 'Editted','success');
    }
    else{
        Flasher::setFlash($errMsg, 'Editted','danger');
    }
}
header('Location: '.BASEURL.'/status.php');
exit();

?>