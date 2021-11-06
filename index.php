<?php
    session_start();
?>

<!DOCTYPE html>
<html lang="de">

<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:300,400">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>
    <script src="https://kit.fontawesome.com/64d58efce2.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="./home.css">
    <title>Home kantiges Schulleben</title>
</head>

<body>
    <nav>
        <div class="menu-bar">
            <ul class="nav-links">
                <li class="active"><a href="./index.php">Home</a>
                </li>
                <li>
                    <a href="./shs/index.php">ShS</a>
                    <div class="sub-menu-1">
                        <ul>
                            <li><a href="./shs/information/index.php">Informationen</a></li>
                            <!--##-->
                            <li><a href="./shs/anmeldung/index.php">Anmeldung</a></li>
                            <li><a href="./shs/team/index.php">Team</a></li>
                            <li><a href="./signup/index.php">Registrierung</a></li>
                            <li><a href="./login/index.php">Login</a></li>
                        </ul>
                    </div>
                </li>
                <li><a href="./schuelerrat/aktuelles/index.php">Schülerrat</a>
                    <!--##-->
                    <div class="sub-menu-1">
                        <ul>
                            <li><a href="./schuelerrat/aktuelles/index.php">Aktuelles</a></li>
                            <li><a href="./schuelerrat/allgemein/index.php">Allgemein</a></li>
                            <li><a href="./schuelerrat/vorstand/index.php">Vorstand</a></li>
                            <li><a href="./schuelerrat/arbeitsgruppen/index.php">Arbeitsgruppen</a></li>
                            <li><a href="./schuelerrat/kontakt/index.php">Kontakt</a></li>
                            <?php
                                if (isset($_SESSION['user'])) {
                                    if (in_array(strval("1"), explode(",", $_SESSION['berechtigungen'])) === TRUE) {
                                        echo '<li><a href="./editor/index.php?name=reden">neu: Statements</a></li>';
                                    }


                                    if (in_array(strval("0"), explode(",", $_SESSION['berechtigungen'])) === TRUE) {
                                        echo '<li><a href="./editor/index.php?name=schuelerrat">neu: Relevantes</a></li>';
                                    }
                                }
                            ?>
                        </ul>
                    </div>
                </li>
                <li>
                    <a href="./error/index.php">Schülerzeitung</a>
                    <div class="sub-menu-1">
                        <ul>
                            <li><a href="./error/index.php">Informationen</a></li>
                            <li><a href="./error/index.php">Vorstellung</a></li>
                            <li class="hover-me"><a href="./error/index.php">Blog</a><i class="fa-angel-right"></i>
                                <div class="sub-menu-2">
                                    <ul>
                                        <li><a href="./error/index.php">Schulleben</a></li>
                                        <li><a href="./error/index.php">Tipps und Tricks</a></li>
                                    </ul>
                                </div>

                            </li>
                            <li><a href="./error/index.php">internes System</a></li>
                        </ul>
                    </div>
                </li>
                <li>
                    <a href="./error/index.php">Projekte</a>
                    <div class="sub-menu-1">
                        <ul>
                            <li><a href="./error/index.php">Schulband</a></li>
                            <li><a href="./error/index.php">Schulclub</a></li>
                        </ul>
                    </div>
                </li>
            </ul>
        </div>
        <div class="burger">
            <div class="line1"></div>
            <div class="line2"></div>
            <div class="line3"></div>
        </div>
        <script src="./include/navi.js"></script>
    </nav>
    <header>
        <h1>Herzlich Willkommen</h1>
        <h2>Kantiges Schulleben Website</h2>

        <p>Du befindest dich auf der Kantigen Schulleben Website des Immanuel-Kant-Gymnasiums.
            <br> Hier findest du alle wichtigen Informationen zu den Projekten. Die Website funktioniert noch nicht auf Handys. Wir sind dran!
        </p>
    </header>
    <section>
        <div class="cards">
            <a href="./shs/index.php">
                <div class="col">
                    <div class="card aqua">
                        <h2>ShS</h2>
                        <p>Nachhilfe von Schüler*innen für Schüler*innen, direkt vor Ort an unserer Schule oder digital von Zuhause.</p>
                        <img src="./assets/Main/shs.png" alt="">
                    </div>
                </div>
            </a>
            <a href="./schuelerrat/aktuelles/index.php">
                <div class="col">
                    <div class="card red">
                        <h2>Schülerrat</h2>
                        <p>Wir lernen Demokratie. Wir nehmen Demokratie wahr. Wir leben Demokratie am KANT! Wir sind der Schülerrat.</p>
                        <img src="./assets/Main/rat.png" alt="">
                    </div>
                </div>
            </a>
        </div>
        <div class="cards">
            <a href="./error/index.php">
                <div class="col">
                    <div class="card orange">
                        <h2>Projekte</h2>
                        <p>Der Schulclub soll ein Ort sein, indem Schüler*innen zusammenkommen und ihre Freiräume gestalten.</p>
                        <img src="./assets/Main/kant.png" alt="">
                    </div>
                </div>
            </a>
            <a href="./error/index.php">
                <div class="col">
                    <div class="card blue">
                        <h2>Schülerzeitung</h2>
                        <p>Hier ist eure Schülerzeitung. Offiziell sind wir nun auch ein Teil dieser ganz besonderen Website und immer für euch erreichbar :) Unsere Artikel werden jetzt auf dieser Website erscheinen.</p>
                        <img src="./assets/Main/provo.jpg" alt="">
                    </div>
                </div>
            </a>
        </div>
    </section>
    <footer>
        <div class="footer">
            <ul>
                <li>
                    <div class="titleR">
                        Rechtliches
                    </div>
                    <div class="buttonsR">
                        <a href="./general/datenschutz/index.php">Datenschutzerklärung</a><br>
                        <a href="./general/impressum/index.php">Impressum</a><br>
                    </div>
                </li>
                <li>
                    <div class="titleS">
                        Socialmedia
                    </div>
                    <div class="buttonsS">
                        <a href="https://www.kantgym-leipzig.de">Webseite unserer Schule</a><br>
                        <a href="https://www.instagram.com/schuelerrat_kantgym/">Instagram</a><br>
                    </div>
                </li>
            </ul>
            <div class="cc">
                <span class="far fa-copyright"></span><span>2021 All rights reserved.</span>
            </div>
        </div>
    </footer>
</body>

</html>
