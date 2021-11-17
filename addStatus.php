<?php 

if(! session_id()) session_start();
require_once 'init.php';

$status = new ModelStatus();


if (isset($_POST)) {
    $newId = htmlentities( $_POST['id'] );
    $newNamaStatus = htmlentities( $_POST['nama_status'] );
    
    $stat = $status->add($newId, $newNamaStatus);
    $errMsg = $status->getError();

    if ($stat > 0) {
        Flasher::setFlash('Record Successfully Added', 'Added','success');
    }
    else{
        Flasher::setFlash($errMsg, 'Added','danger');
    }
}
header('Location: '.BASEURL.'/status.php');
exit();

?>