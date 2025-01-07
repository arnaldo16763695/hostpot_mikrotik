
<?php
include "conexion.php";
error_reporting(0);
if (!empty($_POST)) {
	if (isset($_POST["username"]) && isset($_POST["password"])) {
		if ($_POST["username"] != "" && $_POST["password"] != "") {


			$user_id = null;
			$sql1 = "select * from user where (username=\"$_POST[username]\" or email=\"$_POST[username]\") and password=\"$_POST[password]\" ";
			$query = $con->query($sql1);
			while ($r = $query->fetch_array()) {
				$user_id = $r["id"];
				break;
			}
			if ($user_id == null) {
				print "<script>window.location='../index.php?page=login';</script>";
			} else {
				session_start();
				$_SESSION["user_id"] = $user_id;

				echo "
				<script language='JavaScript' type='text/javascript'>

var pagina='../index.php?page=home'
function redireccionar() 
{
location.href=pagina
} 
setTimeout ('redireccionar()', 1);

</script>
		
				";
			}
		}
	}
} else {
	header('Location: ../login.php?info=Debe llenar todo los campos');
}
?>






