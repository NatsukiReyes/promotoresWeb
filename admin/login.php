<?php
    session_start();
    require_once("includes/connection.php"); 
    include("includes/header.php");

    if(isset($_SESSION["session_username"])){
        header("Location: intropage.php");
    }

    if(isset($_POST["login"])){
        if(!empty($_POST['username']) && !empty($_POST['password'])) {
            $username=$_POST['username'];
            $password=$_POST['password'];
            $query =mysql_query("SELECT * FROM usuarios WHERE username='".$username."' AND password='".$password."'");
            $numrows=mysql_num_rows($query);
            if($numrows!=0){
                while($row=mysql_fetch_assoc($query)){
                    $dbusername=$row['username'];
                    $dbpassword=$row['password'];
                }
                if($username == $dbusername && $password == $dbpassword){
                    $_SESSION['session_username']=$username;
                    /* Redirect browser */
                    header("Location: intropage.php");
                }
            }else{
                $message =  "Nombre de usuario ó contraseña invalida!";
            }
        }else {
            $message = "Todos los campos son requeridos!";
        }
    }
?>

<div class="container mlogin">
    <div id="login">
        <h1>
            <img src="../imagenes/icons/login.png" width="35%">
        </h1>
        <form name="loginform" id="loginform" action="" method="POST">
            <p>
                <label for="user_login">Nombre De Usuario<br />
                <input type="text" name="username" id="username" class="input" value="" size="20" /></label>
            </p>
            <p>
                <label for="user_pass">Contraseña<br />
                <input type="password" name="password" id="password" class="input" value="" size="20" /></label>
            </p>
            <p class="submit">
                <input type="submit" name="login" class="button" value="Entrar" />
            </p>
        </form>
    </div>
</div>

<?php include("includes/footer.php"); ?>

<?php if (!empty($message)) {echo "<p class=\"error\">" . "MESSAGE: ". $message . "</p>";} ?>
	