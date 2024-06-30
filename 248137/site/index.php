<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_FILES['pdf_file']) && $_FILES['pdf_file']['error'] == 0) {
        $allowedMimeTypes = ['application/pdf'];
        $fileMimeType = mime_content_type($_FILES['pdf_file']['tmp_name']);
        
        if (in_array($fileMimeType, $allowedMimeTypes)) {
            $uploadDirectory = 'uploads/';
            $fileName = basename($_FILES['pdf_file']['name']);
            $uploadPath = $uploadDirectory . $fileName;
            
            if (move_uploaded_file($_FILES['pdf_file']['tmp_name'], $uploadPath)) {
                echo "El archivo PDF se ha subido correctamente.";
            } else {
                echo "Hubo un error al mover el archivo.";
            }
        } else {
            echo "Solo se permiten archivos PDF.";
        }
    } else {
        echo "Hubo un error al subir el archivo.";
    }
} else {
    echo "Método de solicitud no válido.";
}
?>   