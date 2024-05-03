<?php

if(isset($_POST["email"])){
    try{
        require_once("conexion.php");
        $email=$_POST["email"];
        $password=$_POST["password"];
        $sql="select * from user where email=? and password=?";
        $stm=$conn->prepare($sql);
        $stm->bindParam(1,$email);  
        $stm->bindParam(2,$password);  
        $stm->execute();
        if($stm-> rowCount()>0){
          $result=$stm->fetchAll(PDO::FETCH_ASSOC);
          $username=$result[0]["username"];
          $iduser=$result[0]["iduser"];
          session_start();
          $_SESSION["username"]=$username;
          $_SESSION["iduser"]=$iduser;
          header("Location: ./"); // Redirigir a index.php después del inicio de sesión exitoso
          exit();
        }else{
          $error="Usuario o contraseña incorrectos";
        } 
    }catch(Exception $e){
        $error="Error interno ".$e->getMessage();
    }
  
}
?>
<?php
if(isset($error)){
    echo $error;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <title>Login</title>
</head>
<body class="d-flex justify-content-center align-items-center vh-100 bg-light">
  <form action="" method="post" class="card p-4" style="max-width: 400px;">
    <h2 class="text-center mb-4">Login</h2>
    <!-- Email input -->
    <div class="form-outline mb-4">
      <input name="email" type="email" id="form2Example1" class="form-control" />
      <label class="form-label" for="form2Example1">Email </label>
    </div>

    <!-- Password input -->
    <div class="form-outline mb-4">
      <input  name="password" type="password" id="form2Example2" class="form-control" />
      <label class="form-label" for="form2Example2">Password</label>
    </div>

    <!-- Checkbox -->
    <div class="mb-4 form-check d-flex justify-content-between align-items-center">
      <input class="form-check-input me-2" type="checkbox" value="" id="form2Example31" checked />
      <label class="form-check-label" for="form2Example31"> Remember me </label>
    </div>

    <!-- Submit button -->
    <button type="submit" data-mdb-button-init data-mdb-ripple-init class="btn btn-primary btn-block mb-4">Sign in</button>

    <!-- Register and Home buttons -->
    <div class="text-center">
      <p class="mb-1">Not a member? <a href="register.php">Register</a></p>
      <p><a href="index.php">Inicio</a></p>
    </div>
  </form>

  <!-- Bootstrap Bundle with Popper -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>


