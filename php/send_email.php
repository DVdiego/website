<?php
  //Importamos las variables del formulario de contacto

  $name = htmlspecialchars($_POST['name']);
  $email_from = htmlspecialchars($_POST['email']); //La persona que envia el correo
  $message = htmlspecialchars($_POST['message']);
  $title = "Contacto desde la web";

  //Preparamos el mensaje de contacto
  $headers = "From: $email_from\n". "Reply-To: $email_from\n";
  $subject = "From: iSoft $message\n"; //asunto aparecera en la bandeja del servidor de correo
  $email_to = "contacto@isoftsolutions.es"; //cambiar por tu email
  $content = "$name ha enviado un mensaje desde el sitio web isoftsolutions.es\n"
  . "\n"
  . "Nombre: $name\n"
  . "Título: $title\n"
  . "Correo: $email_from\n"
  . "Mensaje: $message\n"
  . "\n";
  //Enviamos el mensaje y comprobamos el resultado
  if (@mail($email_to, $subject ,$content ,$headers )) {
    //Si el mensaje se envía muestra una confirmación
    echo '<div class="modal fade" id="alert2" role="dialog">
            <div class="modal-dialog">
              <div class="alert alert-success alert-dismissable" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                <h4 class="alert-heading">¡Enviado!</h4>
                <hr />
                El mensaje ha sido enviado con éxito. Le contestaremos lo antes posible.
              </div>
            </div>
          </div>';
  }
  else{
    //Si el mensaje no se envía muestra el mensaje de error
    echo '<div class="modal fade" id="alert2" role="dialog">
            <div class="modal-dialog">
              <div class="alert alert-danger alert-dismissable" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                <h4 class="modal-title">¡Error!</h4>
                <hr />
                Ha ocurrido un error al enviar el mensaje. Por favor inténtelo de nuevo.
              </div>
            </div>
          </div>';
  }

?>
