
<?php 
class Flasher  
{
    public static function setFlash($msg, $action, $type){
        $_SESSION['flash']= [
            'msg' => $msg,
            'type' => $type
        ];
    }

    public static function flash ()
    {
        if( isset($_SESSION['flash'])){
            echo '<div class="alert alert-'.$_SESSION['flash']['type'].' alert-dismissible fade show" role="alert"><button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>'
           .$_SESSION['flash']['msg'].
            '</div>';

            unset($_SESSION['flash']);
        }
    }
}

?>