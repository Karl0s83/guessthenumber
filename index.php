<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="css/pregunta.png" type="image/png">
    <link rel="stylesheet" href="css/style.css">
    <title>Adivina el número</title>
</head>

<body>

    <?php

    $numero = null;

    define("minimo", 1);
    define("maximo", 100);

    if (isset($_POST['aleat'])) {
        $aleat = $_POST['aleat'];
    } else {
        $aleat = rand(minimo, maximo);
    }

    if (isset($_POST['cont'])) {
        $contador = $_POST['cont'];
    } else {
        $contador = 5;
    }







    isset($_POST['pistes']);
    ?>
    <br>
    <form action="index.php" method="post" class=" adivina1">
        <div class="form">
            <h2>Adivina el número</h2>
            <div class="input">
                <label for="numero" class="label">Número: </label>
                <input type="text" placeholder="Introduce el número..." name="numero" class="inputext">
                <input type="submit" value="Enviar" name="submit" class="submit" id="submitBtn" <?php if ($contador <= 0) {
                                                                                                    echo "disabled='true'";
                                                                                                } ?>>
            </div>
            <div>
                <p class="pista"><?php
                                    if ($numero != "") {
                                        if ($numero == "s") {
                                            echo "El numero que estaba pensando es $aleat";
                                        } else {
                                        }
                                    }
                                    ?></p>

                <?php
                if (isset($_POST['submit'])) {
                    if ($_POST['numero'] === "s") {
                        echo "<p class='pista'>El número que estaba pensando es $aleat</p>";
                        echo "<script>document.getElementById('submitBtn').disabled = true;</script>";
                    } else {
                        echo "<p class='intentos'>Tus intentos son $contador <br></p>";
                        $numero = $_POST['numero'];
                        $contador--;
                    }
                } else {
                    echo "Se te acabaron los intentos! El numero era $aleat";
                }

                $disabled = $contador == 0 ? "disabled='disabled'" : "";


                if ($numero != "s") {
                    $result = abs($aleat - $numero);
                }

                if (isset($_POST['pistas']) && $_POST['pistas'] == 'on') {
                    $checked = "checked";
                    if ($result > 20) {
                        echo "<p class='box'>Estás a una distancia considerable 😓</p>";
                    } elseif ($result > 10 && $result <= 20) {
                        echo "<p class='box red'>Estás a una distancia entre 10 y 20 🤨</p>";
                    } elseif ($result > 5 && $result <= 10) {
                        echo "<p class='box orange'>Estás a una distància entre 5 y 10 🥶</p>";
                    } elseif ($result > 0 && $result <= 5) {
                        echo "<p class='box green'>Pista: Estás a una distància entre 1 y 5 🤯</p>";
                    } elseif ($aleat == $numero) {
                        echo "<p class='box done'>¡Has adivinado el número! 🎉</p>";
                    }
                } else {
                    $checked = "";
                }
                ?>
                </p>

                <input type="hidden" name="aleat" value="<?= $aleat; ?>" />
                <input type="hidden" name="cont" value="<?= $contador; ?>" />
            </div>
        </div>
        <a href="index.php" class="reset" name="reset">Vuelve a empezar</a>
        <div>
            <input type="checkbox" name="pistas" id="pistas" <?= $checked; ?>>
            <label for="">Quieres pistas avanzadas❓ 🧐</label>
        </div>
        <br>
        <?php
        echo "<pre>";
        print_r($_POST);
        echo "</pre>";
        ?>

    </form>
    <br>


</body>

</html>