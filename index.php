<?php 

    const API_URL = "https://whenisthenextmcufilm.com/api";
    #Inicializar una nueva sesion de cURL; ch = cURL handle
    $ch = curl_init(API_URL);
    //Indicar que queremos recibir el resultado de la peticion y no mostrarlo por pantalla
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    //ejecutar la peticion y guardamos el resultado

    $result = curl_exec($ch);
    $data = json_decode($result, true);
    curl_close($ch);

    
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>La Proxima pelicula de marvel</title>
    <!-- Centered viewport --> 
    <link
      rel="stylesheet"
      href="https://cdn.jsdelivr.net/npm/@picocss/pico@2/css/pico.classless.min.css"
    />
</head>
<body>
    <main>
        <pre style="font-size: 15px; overflow: scroll; height: 350px;">
            <?php var_dump($data); ?>
        </pre>
        <section>
            <img src="<?= $data["poster_url"]; ?>" width="300px" alt="Poster de <?= $data["title"]; ?>" 
            style="border-radius: 16px" >
        </section>

        <hgroup>
            <h2><?= $data["title"]; ?> Se estrena en <?= $data["days_until"]; ?> días </h2>
            <p>Fecha de estreno <?= $data["release_date"] ?></p>
            <br>
            <p>La siguiente pelicula es <?= $data["following_production"]["title"] ?></p>
            <p><?= $data["following_production"]["release_date"] ?></p>
        </hgroup>

    </main>
</body>
</html>