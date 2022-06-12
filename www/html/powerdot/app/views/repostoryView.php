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
    <link rel="stylesheet" href="../styles/styleRepo.css">
    <title>Power Dot</title>
</head>

<body>
    <div class="">

        <h2>Repositori de presentacions</h2>
        <hr class="rounded">
        <p><a href="mainView.php">Enrere</a></p>

        <table>
            <tr>
                <th></th>
                <th></th>
            </tr>
            <tr>
                <td>
                    <div class="divContent">
                        <h5>Insereix text en
                            <div class="tooltip">format AsciiDoc
                                <span class="tooltiptext">Title: =<br>Sub Title: ==<br>Slide text content: /<br>Slide type: [cover] or [normal]<br>Next Slide: >>><br>Image: *</span>
                            </div>:
                        </h5>

                        <form action="../controllers/insertarController.php" method="POST">
                            <div class="divTextArea" rows="5" cols="100">
                                <textarea required name="txtContent" id="txtContent"></textarea>
                            </div>
                            <br>
                            <input hidden required type="text" id="time" name="time">
                            <label for="titol">Títol:</label>
                            <input required type="text" id="titol" name="titol"><br><br>
                            <label for="usuari">Usuari:</label>
                            <input required type="text" id="usuari" name="usuari"><br><br>
                            <div class="divButton">
                                <button type="submit" onclick="setTime()" class="button1" id="enviar">Guardar presentació</button>
                            </div>
                        </form>
                        <script>
                            function setTime() {
                                let tmp = new Date(Date.now());
                                document.getElementById("time").value = tmp.toString();
                            }
                        </script>
                    </div>
                </td>
                <td>

                    <?php
                    require_once __DIR__ . '/../../vendor/autoload.php';
                    $presentacions = (new MongoDB\Client(("mongodb://localhost:27017")))->powerdot->presentacio;

                    if ($presentacions->count() > 0) {
                        $dades = $presentacions->find();
                    ?>
                        <table class="pres">
                            <?php
                            foreach ($dades as $dada) {
                            ?>
                                <tr>
                                    <td>
                                        <p><label><b>ID: </b></label><?php echo $dada["_id"]; ?></p>
                                    </td>
                                    <td>
                                        <p><label><b>Títol: </b></label><?php echo $dada["titol"]; ?></p>
                                    </td>
                                    <td>
                                        <p><label><b>Usuari: </b></label><?php echo $dada["usuari"]; ?></p>
                                    </td>
                                    <td>
                                        <p><label><b>Data de creació: </b></label><?php echo $dada["data"]; ?></p>
                                    </td>
                                    <td>
                                        <form role="form" action="../controllers/mainController.php" method="POST">
                                            <textarea hidden required name="txtContent" id="txtAreaContent"><?php echo $dada["content"]; ?></textarea>
                                            <button type="submit" class="button1" id="enviar">Veure presentació</button>
                                        </form>         
                                    </td>
                                </tr>
                            <?php
                            }
                            ?>
                        </table>
                    <?php
                    } else {
                    ?>
                        <h4>No hi han diapositives a la base de dades</h4>
                    <?php
                    }
                    ?>
                </td>
            </tr>
        </table>
    </div>
</body>

</html>