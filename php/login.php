<?php
include "conexion.php";
error_reporting(0);

if (!empty($_POST)) {
	if (isset($_POST["username"]) && isset($_POST["password"])) {
		// Validar que los datos no estén vacíos y eliminar espacios extra
		$username = trim($_POST["username"]);
		$password = trim($_POST["password"]);

		if ($username !== "" && $password !== "") {
			// Preparar la consulta para evitar inyecciones SQL
			$stmt = $con->prepare("SELECT * FROM user WHERE username = ? AND password = ?");

			if (!$stmt) {
				die(json_encode(["status" => "error", "message" => "Error al preparar la consulta: " . $con->error]));
			}

			// Asignar parámetros (usar parámetros seguros para ambos valores)
			$stmt->bind_param("ss", $username, $password);

			// Ejecutar la consulta
			$stmt->execute();

			// Obtener los resultados
			$result = $stmt->get_result();

			if ($result->num_rows > 0) {
				// Usuario autenticado con éxito
				// Iniciar la sesión
				$user = $result->fetch_assoc();
				session_start();
				$_SESSION['user_id'] = $user['id'];
				$_SESSION['name'] = $user['nombre'];
				echo json_encode(["status" => "success", "message" => "Bienvenido", "data" => $user]);
			} else {
				// Credenciales incorrectas
				echo json_encode(["status" => "error", "message" => "Credenciales incorrectos"]);
			}

			// Liberar recursos
			$stmt->close();
		} else {
			echo json_encode(["status" => "error", "message" => "El usuario y la contraseña no pueden estar vacíos"]);
		}
	} else {
		echo json_encode(["status" => "error", "message" => "Faltan parámetros"]);
	}
} else {
	echo json_encode(["status" => "error", "message" => "No se recibieron datos"]);
}
