<?php
if (empty($_POST["mac"])) {
  # code...
  //   header("Location: http://localhost/cruzwiki/message.php");
  //   exit; // Finaliza el script para evitar que el resto del código se ejecute
}
?>


<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Formulario con Términos de Privacidad</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  <script type='text/javascript' src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js'></script>
  <link rel="stylesheet" href="https://cdn.datatables.net/1.10.2/css/jquery.dataTables.min.css">
  <link rel="stylesheet" href="assets/hostpot/css/styles.css">
</head>

<body>
  <div class="form-container">

    <img src="LOGO_CRUZ_Wifi.png" alt="Logo">
    <h2>Bienvenido a Wifi Cruz</h2>
    <form id="registrationForm">
      <!-- <div class="form-group">
        <label for="name">Nombre:</label>
        <input type="text" id="name" name="name" placeholder="Ingrese su nombre" required>
      </div> -->
      <!-- <div class="form-group">
        <label for="phone">Teléfono:</label>
        <input type="tel" id="phone" name="phone" placeholder="" required>
      </div> -->


      <div class="form-group">
        <label for="phone">Ingrese su rut:</label>
        <input type="text" id="rut" name="rut" placeholder="RUT" required>
      </div>
      <div class="alert d-none" id="responseMessage" role="alert"></div>
      <div class="form-group">
        <input type="checkbox" id="terms" name="terms" required>
        <label for="terms">Acepto los <span class="terms-link" onclick="openModal()">Términos de Privacidad</span></label>
      </div>
      <input type="hidden" id="mac" name="mac" value="<?php echo $_POST["mac"]; ?>">
      <button type="submit">Conectar</button>
    </form>

  </div>

  <!-- Modal -->
  <div class="modal" id="termsModal">
    <div class="modal-content">
      <h3>Términos y Condiciones de Privacidad</h3>
      <p><strong>Última actualización:</strong> [Fecha]</p>
      <p>
        En <strong>CRUZ WiFi</strong>, nos comprometemos a proteger su privacidad y garantizar la seguridad de sus datos personales. Este documento describe cómo recopilamos, usamos y protegemos la información que usted nos proporciona.
      </p>

      <h4>1. Información que recopilamos</h4>
      <p>
        Cuando utiliza nuestros servicios o se registra en nuestro formulario, podemos recopilar la siguiente información:
      <ul>
        <li>Nombre completo</li>
        <li>Número de teléfono</li>
        <li>Dirección MAC de su dispositivo (recopilada de forma automatizada)</li>
      </ul>
      </p>

      <h4>2. Uso de la información</h4>
      <p>
        La información que recopilamos será utilizada para:
      <ul>
        <li>Proporcionar acceso a nuestros servicios de WiFi.</li>
        <li>Contactarlo para soporte técnico o notificaciones relacionadas con el servicio.</li>
        <li>Mejorar la calidad y seguridad de nuestra red.</li>
      </ul>
      </p>

      <h4>3. Protección de datos</h4>
      <p>
        En <strong>CRUZ WiFi</strong>, implementamos medidas técnicas y organizativas adecuadas para proteger su información contra accesos no autorizados, alteraciones, divulgaciones o destrucciones.
      </p>

      <h4>4. Compartir información</h4>
      <p>
        No compartimos su información personal con terceros, excepto en los siguientes casos:
      <ul>
        <li>Cuando sea requerido por la ley o una autoridad gubernamental.</li>
        <li>Para proteger los derechos, propiedad o seguridad de <strong>CRUZ WiFi</strong>.</li>
      </ul>
      </p>

      <h4>5. Derechos del usuario</h4>
      <p>
        Usted tiene derecho a:
      <ul>
        <li>Acceder a los datos personales que hemos recopilado sobre usted.</li>
        <li>Solicitar la corrección o eliminación de su información.</li>
        <li>Retirar su consentimiento para el uso de sus datos en cualquier momento.</li>
      </ul>
      Para ejercer estos derechos, puede contactarnos a través de [correo electrónico o número de contacto].
      </p>

      <h4>6. Cambios en esta política</h4>
      <p>
        Nos reservamos el derecho de actualizar esta política de privacidad en cualquier momento. Le notificaremos sobre cualquier cambio importante a través de nuestro sitio web o por otros medios de comunicación.
      </p>

      <h4>7. Contacto</h4>
      <p>
        Si tiene alguna pregunta sobre esta política de privacidad, puede contactarnos a través de:
        <br><strong>Email:</strong> soporte@cruzwifi.com
        <br><strong>Teléfono:</strong> +52 123 456 7890
      </p>

      <button class="modal-close" onclick="closeModal()">Cerrar</button>
    </div>

  </div>
  <script src="assets/hostpot/js/hostpot.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

</body>

</html>