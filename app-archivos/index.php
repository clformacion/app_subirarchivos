

<?php
	$formatos   = array('.jpg', '.png', '.gif', '.pdf', '.sql','.docx');
	$directorio = 'archivos'; 
	if (isset($_POST['boton'])){
		$nombreArchivo    = $_FILES['archivo']['name'];
		$nombreTmpArchivo = $_FILES['archivo']['tmp_name'];
		$ext              = substr($nombreArchivo, strrpos($nombreArchivo, '.'));
		if (in_array($ext, $formatos)){
			if (move_uploaded_file($nombreTmpArchivo, "$directorio/$nombreArchivo")){
				
			}else{
				echo 'Ocurrió un error subiendo el archivo, valida los permisos de la carpeta "archivos"';
			}
		}else{
			echo 'Aquí va el mensaje que quieres mostrar cuando un usuario suba un archivo con una extensión diferente';
		}
	}
?>


<!doctype html>
<html lang="en">
    <head>
        <title>Title</title>
        <!-- Required meta tags -->
        <meta charset="utf-8" />
        <meta
            name="viewport"
            content="width=device-width, initial-scale=1, shrink-to-fit=no"
        />

        <!-- Bootstrap CSS v5.2.1 -->
        <link
            href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css"
            rel="stylesheet"
            integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN"
            crossorigin="anonymous"
        />
    </head>

    <body>



       <?php
       if ($dir = opendir($directorio)){
           while ($archivo = readdir($dir)) {
               if ($archivo != '.' && $archivo != '..'){
                   //este div es para darle caché y que se vea bien en todos los dispositivos. son clases del nuevo bootstrap -> framewrok css
                   echo '<div class="col-sm-3 col-xs-12">';
                       echo "Archivo: <strong>$archivo</strong><br />";
                       echo '<img src="img/02.jfif" style= " width: 30px; height:30px;" '.$directorio.'/'.$archivo.'" title="archivo" alt="archivo"/>';
                   echo '</div>';
               }
           }
       }
   ?>


<br><br><br><br>
		<div align=center>
		<p>Seleccione la tarea a enviar al profesor</p>
		<form method="post" action="" enctype="multipart/form-data">
			<div class="form-group">
				<label for="archvio">Archivo</label>
				<input type="file" class="form-control-file" id="archvio" aria-describedby="fileHelp" name="archivo">
				<small id="fileHelp" class="form-text text-muted">Archivos permitidos (.jpg .png .gif .sql)</small>
			</div>
			<button type="submit" class="btn btn-primary" name="boton">Subir archivo</button>
		</form>
	</div>
	</div>








        








        <script
            src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
            integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r"
            crossorigin="anonymous"
        ></script>

        <script
            src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js"
            integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+"
            crossorigin="anonymous"
        ></script>
    </body>
</html>
