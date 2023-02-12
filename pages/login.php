<?php
    $err = false;
    if(isset($_POST['login_submit'])) {
        if($_POST['user'] == "Demo" && md5($_POST['pwd']) == 'f0258b6685684c113bad94d91b8fa02a') {
            //session_start();
            $_SESSION['valid'] = true;
            $_SESSION['timeout'] = time();
            $_SESSION['user'] = 'Demo';
            //session_register();
            header('Location: /GestionVehicules/wellcome');
        } else {
            $err = true;
        }
    }
?>
<h1 class="title"> Page de connexion</h1>

<fieldset>
    <form action="" method="post">
        <div>
            <label for="user">User:</label>
            <input id="user" name="user" type="text">
        </div>
        <div>
            <label for="pwd">Password:</label>
            <input id="pwd" name="pwd" type="password">
        </div>
        <div>
            <center>
                <button type="submit" name="login_submit" value="Login">
                    Login
                    <span class="material-symbols-outlined">login</span>
                </button>
        </center>
        </div>
    </form>
    <div class="wrapper_error-msg">
        <?php 
            if($err) echo "<span class='error-msg'> Pas de compte pour cette user !!</span>";
            if(isset($_POST['login_submit'])) echo error_msg($_POST) 
        ?>
    </div>
</fieldset>
