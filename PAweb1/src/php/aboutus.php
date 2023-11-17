<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../style/aboutusstyle.css">
</head>
<body>
    <?php
        session_start();

        $url = "../php/index.php";
        $url_login = "../php/indexlogin.php";


        if(isset($_SESSION["logged"])) {
            $login = $_SESSION["logged"];
        }
    ?>

<a href="<?= isset($login) ? $url_login : $url ?>" class="back-to-menu">Back to Menu</a>

    <section id="our-Team">
        <h2>Our Member</h2>
        <div class="teamContainer">
            <div class="team-item">
                <img src="../assets/me.jpg" alt="">
                <h5 class="member-name">Dwiki</h5>
                <span class="role">BackN</span>
            </div>
            <div class="team-item">
                <img src="../assets/revi.png" alt="">
                <h5 class="member-name">Revi</h5>
                <span class="role">Hosting</span>
                <!-- <p class="desc-text"></p> -->
            </div>
            <div class="team-item">
                <img src="../assets/jack.png" alt="">
                <h5 class="member-name">Jack</h5>
                <span class="role">FrontN</span>
                <!-- <p class="desc-text">deskripsi disini</p> -->
            </div>
        </div>
    </section>



    <footer>
        <p> &copy; 2023 - All rights reserved -</p>
    </footer>

</body>
</html>