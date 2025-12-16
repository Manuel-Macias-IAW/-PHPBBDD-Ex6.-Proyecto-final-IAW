    <?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
if(!isset ($_SESSION["conectado"] )|| $_SESSION["conectado"] = false){
        header("Location:login.php");

}

