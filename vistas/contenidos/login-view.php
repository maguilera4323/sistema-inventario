<?php
	//verifica si hay sesiones iniciadas
	if (session_status() !== PHP_SESSION_ACTIVE) {
		session_start();
   }

   //verifica si la variable del contador está creada
   if (!isset($_SESSION['contador_intentos'])){
	   $_SESSION['contador_intentos'] = 1;
   }

   //llamado al controlador de login
   require_once 'controladores/loginControlador.php';
   $usuario = new loginUsuarios(); //se crea nueva instancia de usuario

	//valdacion para ver si se recibieron datos de ingreso
	if (isset($_POST['acceder'])) {
		$datos = array(
			'usuario'=> filter_var($_POST['usuario'], FILTER_SANITIZE_STRING),
			'password'=> filter_var($_POST['clave'], FILTER_SANITIZE_STRING),
			'contador'=> filter_var($_POST['contador'], FILTER_SANITIZE_STRING)
		);
		$respuesta = $usuario->accesoSistema($datos); //se envian los datos a la funcion accesoUsuario de Logincontrolador
	}
	
?>
<style>
	@import url('https://fonts.googleapis.com/css2?family=Montserrat:wght@500;700&display=swap');

body{
    font-family: 'Montserrat', sans-serif;
    background-color: #e5e5f7;
    background-image: radial-gradient(#ff26e7 0.5px, #e5e5f7 0.5px);
    background-size: 20px 20px;
    background-position: 0 0 10px 10px;
    display:flex;
    min-height: 100vh;
}

.form{
    background-color: black;
    margin:auto;
    width: 100%;
    max-width:450px;
    padding:3em 3em;
    border-radius: 10px;
    box-shadow: 2px 5px 10px 3px white;
    text-align: center;
}

.form_title{
    font-size: 1.5rem;
    margin-bottom: 3em;
	color: white;
}


.font_link{
    font-weight: 400;
    color: white;
}

.form_container{
	margin-top: 0.7rem;
    display: grid;
    gap:2.5em
}

.form_group{
    position: relative;
    --color:white;
}


.form_input{
    width:100%;
	margin-top:0.5rem;
	margin-bottom:1.7rem;
    background: none;
    color:white;
    font-size: 1rem;
    padding:0.6em 0.6em;
    border:none;
    outline: none;
    border-bottom: 1px solid var(--color);
    font-family: 'Montserrat', sans-serif;
}

.form_input::placeholder{
    font-size: 25px;
}


.form_label{
    color:white;
    cursor: pointer;
    position: absolute;
    top:0;
    left:10px;
    transform: translateY(10px);
    transition: transform 0.5s, color 0.3s;
}

.form_input:focus + .form_label, .form_input:not(:placeholder-shown)+.form_label{
    transform: translateY(-12px) scale(0.9);
    transform-origin: left top;
    color:rgba(39, 140, 255, 0.91);
}


.form_submit{
    margin-top:1.5rem;
    margin-bottom:0.5rem;
    background-color: #3863f2;
    color:white;
    font-family: 'Montserrat', sans-serif;
    font-weight: 300;
    font-size: 1rem;
    padding:0.8em 40%;
    border:none;
    border-radius:0.7em;
}

.form_line{
    position:absolute;
    bottom:0;
    left: 0;
    width: 100%;
    height: 1px;
    background-color: #3863f2;
    transform: scale(0);
    transform: left bottom;
    transition: transform 0.4s;
}

.form_paragraph{
	color:white;
	font-size: 1rem;
}


.form_input:focus ∼.form_label, .form_input:not(:placeholder-shown)∼.form_label{
    transform: scale(1);
}

a{
    text-decoration: none;
    color:#3863f2;
}

a:hover{
    color:#678bff;
}

img{
    margin-bottom: 1rem;
}


@media (max-width:767px) {
	.form{
        width: 90%;
		height: 33rem;
    }

    .form_container{
        margin-top: 0.3rem;
        display: grid;
		gap:2.5em;
    }

	.form_input{
		width:100%;
		margin-bottom:1rem;
		font-size: 1rem;
		padding:0.6em 0.3em;
	}

	.form_submit{
		margin-top:0.3rem;
		margin-bottom:0.2rem;
		background-color: #3863f2;
		color:white;
		font-family: 'Montserrat', sans-serif;
		font-weight: 300;
		font-size: 1rem;
		padding:0.8em 40%;
		border:none;
		border-radius:0.5em;
	}
}

</style>
<title>Login</title>

<form action="" class="form" method="POST">
	<?php
				 if(isset($_SESSION['respuesta'])){
					switch($_SESSION['respuesta']){
						case 'Contraseña incorrecta':
							echo '
							<style>
							.form{
								width: 90%;
								height: 30rem;
							}
							</style>
							<div div class="alert alert-danger text-center style="font-size: 17px;" role="alert">Usuario y/o contraseña inválidos</div>';
							$_SESSION['contador_intentos']+=0.5;
						break;
						case 'Usuario inactivo':
							echo '
							<style>
							.form{
								width: 90%;
								height: 40rem;
							}
							</style>
							<div class="alert alert-warning text-center" style="font-size: 17px;">El usuario está inactivo. Comuniquese con el 
							administrador del sistema</div>';
						break;
						case 'Usuario bloqueado':
							echo '
							<style>
							.form{
								width: 90%;
								height: 40rem;
							}
							</style>
							<div class="alert alert-dark text-center" style="font-size: 17px;">El usuario está bloqueado. Comuniquese con el 
							administrador del sistema</div>';
							$_SESSION['contador_intentos']=0;
						break;
						case 'Datos incorrectos':
							echo '
							<style>
							.form{
								width: 90%;
								height: 40rem;
							}
							</style>
							<div class="alert alert-danger text-center" style="font-size: 17px;">Usuario y/o contraseña inválidos</div>';
							$_SESSION['contador_intentos']=0;
						break;
						case 'Usuario sin permisos':
							echo '<div class="alert alert-dark text-center" style="font-size: 17px;">El usuario no tiene los permisos para iniciar 
							sesión. Comuniquese con el administrador del sistema</div>';
							$_SESSION['contador_intentos']=0;
						break;
					 }
				 }
			 ?>
		<h2 class="form_title">Iniciar Sesion</h2>
				
				<div class="form_container">
					<div class="form_group">
						<input type="text" name="usuario" id="usuario" class="form_input" placeholder=" ">
						<label for="user" class="form_label">Usuario</label>
						<span class="form_line"></span>
					</div>
				</div>

				<div class="form_container">
					<div class="form_group">
						<input type="password" name="clave" id="clave" class="form_input" placeholder=" ">
						<label for="password" class="form_label">Contraseña</label>
						<span class="form_line"></span>
					</div>
				</div>

				<input type="submit" class="form_submit" name="acceder" placeholder="Ingresar">
				<p class="form_paragraph">Olvidaste tu contraseña? <a href="<?php echo SERVERURL?>recuperacion-clave/" class="form_">Entra aqui</a></p> 
			</form>


