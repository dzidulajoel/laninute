<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>La minute</title>
    <link rel="stylesheet" href="./../ergonomie/css/style.css">
    <link rel="stylesheet" href="./../ergonomie/css/actus.css">
    <link rel="stylesheet" href="./../ergonomie/css/theme.css">
    <link rel="stylesheet" href="./../ergonomie/css/responsive.css">
    <link href="https://api.fontshare.com/v2/css?f[]=satoshi@400,700,900&f[]=general-sans@500,600,700,1&f[]=cabinet-grotesk@500,800,900&f[]=switzer@500&display=swap" rel="stylesheet">
</head>

<body>
    <div class="index">
        <nav>
            <div class="logo"><img src="./../ergonomie/image/logo.svg" alt="logo"></div>
            <?php include("./../composants/__nav.php") ?>
            <div class="left_element">
                <div class="theme">
                    <div class="theme_button"></div>
                </div>
            </div>
        </nav>
        <main>
            <div class="corps">
                <?php include("./../composants/__actualite.php")?>
                <?php include("./../composants/__profil.php")?>
            </div>
        </main>

    </div>
    <script src="./../ergonomie/js/script.js"></script>
</body>

</html>