  <?php
                session_start();
                session_unset();
                session_destroy();
                setcookie('loged_in','',time()-3600,'/','localhost');
                header('location: ../login.php');
                
?>