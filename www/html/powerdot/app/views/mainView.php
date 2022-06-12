<?php
session_start();
unset($_SESSION['powerPoint']);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../styles/style.css">
    <title>Power Dot</title>
</head>

<body>
    <div class="divPrincipal">
        <div class="">
            <h1>PowerDot</h1>
        </div>
        <hr class="rounded">
        <div class="divContent">
            
        <p><a href="example.html">Referència</a></p>
            <p><a href="repostoryView.php">Repositori de presentacions</a></p>
            
            <h5>Insereix text en el
                <div class="tooltip">format correcte (AsciiDoc)
                    <span class="tooltiptext">Title: =<br>Sub Title: ==<br>Slide text content: /<br>Slide type: [cover] or [normal]<br>Next Slide: >>><br>Image: *</span>
                </div>:
            </h5>
           
            <form role="form" action="../controllers/mainController.php" method="POST">
                <div class="divTextArea" rows="5" cols="100">
                    <textarea required name="txtContent" id="txtAreaContent"></textarea>
                </div>
                <br>
                <div class="divButton">
                    <button type="submit" class="button1" id="enviar">Veure presentació</button>
                </div>
            </form>

        </div>
    </div>
</body>

</html>