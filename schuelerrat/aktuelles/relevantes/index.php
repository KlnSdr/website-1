<?php
    session_start();
?>

<!doctype html>
<html lang="de">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Schülerrat - Relevantes</title>
    <link rel="stylesheet" href="https:///fonts.googleapis.com/css?family=Roboto:300,400">
    <link rel="stylesheet" href="./aktuelles.css">
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>
    <script src="https://kit.fontawesome.com/64d58efce2.js" crossorigin="anonymous"></script>

    <script src="../../../include/jquery-4.3.1.min.js"></script>
    <script src="../dom.js"></script>
    <script src="./index.js"></script>
</head>

<body onload="preload()">
    <nav>
        <div class="menu-bar">
            <ul class="nav-links">
                <li class="active"><a href="../../../index.php">Home</a>
                </li>
                <li>
                    <a href="../../../shs/index.php">ShS</a>
                    <div class="sub-menu-1">
                        <ul>
                            <li><a href="../../../shs/information/index.php">Informationen</a></li>
                            <li><a href="../../../shs/anmeldung/index.php">Anmeldung</a></li>
                            <li><a href="../../../shs/team/index.php">Team</a></li>
                            <li><a href="../../../signup/index.php">Registrierung</a></li>
                            <li><a href="../../../login/index.php">Login</a></li>
                        </ul>
                    </div>
                </li>
                <li><a href="../../../schuelerrat/aktuelles/index.php">Schülerrat</a>
                    <div class="sub-menu-1">
                        <ul>
                            <li><a href="../../../schuelerrat/aktuelles/index.php">Aktuelles</a></li>
                            <li><a href="../../../schuelerrat/allgemein/index.php">Allgemein</a></li>
                            <li><a href="../../../schuelerrat/vorstand/index.php">Vorstand</a></li>
                            <li><a href="../../../schuelerrat/arbeitsgruppen/index.php">Arbeitsgruppen</a></li>
                            <li><a href="../../../schuelerrat/kontakt/index.php">Kontakt</a></li>
                            <?php
                                if (isset($_SESSION['user'])) {
                                    if (in_array(strval("1"), explode(",", $_SESSION['berechtigungen'])) === TRUE) {
                                        echo '<li><a href="../../../editor/index.php?name=reden">neu: Statements</a></li>';
                                    }


                                    if (in_array(strval("0"), explode(",", $_SESSION['berechtigungen'])) === TRUE) {
                                        echo '<li><a href="../../../editor/index.php?name=schuelerrat">neu: Relevantes</a></li>';
                                    }
                                }
                            ?>
                        </ul>
                    </div>
                </li>
                <li>
                    <a href="../../../error/index.php">Schülerzeitung</a>
                    <div class="sub-menu-1">
                        <ul>
                            <li><a href="../../../error/index.php">Informationen</a></li>
                            <li><a href="../../../error/index.php">Vorstellung</a></li>
                            <li class="hover-me"><a href="../../../error/index.php">Blog</a><i class="fa-angel-right"></i>
                                <div class="sub-menu-2">
                                    <ul>
                                        <li><a href="../../../error/index.php">Schulleben</a></li>
                                        <li><a href="../../../error/index.php">Tipps und Tricks</a></li>
                                    </ul>
                                </div>
                            </li>
                            <li><a href="../../../error/index.php">internes System</a></li>
                        </ul>
                    </div>
                </li>
                <li>
                    <a href="../../../error/index.php">Projekte</a>
                    <div class="sub-menu-1">
                        <ul>
                            <li><a href="../../../error/index.php">Schulband</a></li>
                            <li><a href="../../../error/index.php">Schulclub</a></li>
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
        <script>
            const navSlide = () => {
                const burger = document.querySelector('.burger');
                const nav = document.querySelector('.nav-links');
                const navLinks = document.querySelectorAll('.nav-links li');

                burger.addEventListener('click', () => {
                    nav.classList.toggle('nav-active');

                    navLinks.forEach((link, index) => {
                        link.style.animation = `navLinkFade 0.5s ease forwards`;
                    });

                    burger.classList.toggle('toggle');
                });
            }
            navSlide();
        </script>
    </nav>

    <div class="outersplash">
        <div class="splash">
            <h2>Willkommen zur <b>Relevantes Seite</b> des</h2>
            <h1>Schülerrat</h1>

            <div class="desktop">
                <a href="#" class="button1">Relevantes</a>
                <a href="../reden" class="button2">Reden/Statements</a>
                <a href="#" class="button3">Protokolle</a>
            </div>

            <ul class="mobil">
                <li>
                    <a href="##" class="button2">Reden/Statements</a>
                </li>
                <li>
                    <a href="../reden" class="button1">Relevantes</a>
                </li>
                <li>
                    <a href="#" class="button3">Protokolle</a>
                </li>
            </ul>
        </div>
    </div>

    <!-- Serverseitig vorschau auf 700 Zeichen begrenzen -->
    <div class="fieldS" id="relevantesParent">
        <h3>Relevantess</h3>
        <h4 id="Reden/Statements">Relevantes</h4>

        <div class="items2" id="relevantes">
            <!-- <div class="item2">
                <div class="placeholder"></div>
                <img src="../../../assets/info.jpg">
                <div class="f">Titel</div><br>
                <div class="d">
                    Hier könnte ihre Werbung stehen! Hier könnte ihre Werbung stehen! Hier könnte ihre Werbung stehen! Hier könnte ihre Werbung stehen! Hier könnte ihre Werbung stehen! Hier könnte ihre Werbung stehen! Hier könnte ihre Werbung stehen! Hier könnte ihre Werbung
                    stehen! Hier könnte ihre Werbung stehen! Hier könnte ihre Werbung stehen! Hier könnte ihre Werbung stehen! Hier könnte ihre Werbung stehen! Hier könnte ihre Werbung stehen! Hier könnte ihre Werbung stehen! Hier könnte ihre Werbung
                    stehen! Hier könnte ihre Werbung stehen! Hier könnte ihre Werbung stehen! Hier könnte ihre Werbung stehen! Hier könnte ihre Werbung stehen! Hier könnte ihre Werbung stehen!
                </div>
                <a href="#Protokolle" class="button1">Beitrag anzeigen</a>
            </div> -->
        </div>
    </div>
    <br>
    <br>
    <br>

    <footer>
        <div class="footer">
            <ul>
                <li>
                    <div class="titleR">
                        Rechtliches
                    </div>
                    <div class="buttonsR">
                        <a href="../../../general/datenschutz/index.php">Datenschutzerklärung</a><br>
                        <a href="../../../general/impressum/index.php">Impressum</a><br>
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
