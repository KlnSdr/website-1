<?php
    session_start();
    if (!isset($_SESSION['user'])) {
        $_SESSION['redirect'] = "shs/anmeldung/";
        header("Location: ../../login/");
        die();
    }
?>

<html lang="de">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./anmeldung.css">

    <link rel="stylesheet" href="https:///fonts.googleapis.com/css?family=Roboto:300,400">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>
    <script src="https://kit.fontawesome.com/64d58efce2.js" crossorigin="anonymous"></script>

    <script src="../../include/jquery-4.3.1.min.js"></script>


    <title>Anmeldung ShS</title>
</head>

<ody>
    <nav>
        <div class="menu-bar">
            <ul class="nav-links">
                <li class="active"><a href="../../index.php">Home</a>
                </li>
                <li>
                    <a href="../../shs/index.php">ShS</a>
                    <div class="sub-menu-1">
                        <ul>
                            <li><a href="../../shs/information/index.php">Informationen</a></li>
                            <!--##-->
                            <li><a href="../anmeldung/index.php">Anmeldung</a></li>
                            <li><a href="../../shs/team/index.php">Team</a></li>
                            <li><a href="../../signup/index.php">Registrierung</a></li>
                            <li><a href="../../login/index.php">Login</a></li>
                        </ul>
                    </div>
                </li>
                <li><a href="../../schuelerrat/aktuelles/index.php">Schülerrat</a>
                    <!--##-->
                    <div class="sub-menu-1">
                        <ul>
                            <li><a href="../../schuelerrat/aktuelles/index.php">Aktuelles</a></li>
                            <li><a href="../../schuelerrat/allgemein/index.php">Allgemein</a></li>
                            <li><a href="../../schuelerrat/vorstand/index.php">Vorstand</a></li>
                            <li><a href="../../schuelerrat/arbeitsgruppen/index.php">Arbeitsgruppen</a></li>
                            <li><a href="../../schuelerrat/kontakt/index.php">Kontakt</a></li>
                            <?php
                                if (isset($_SESSION['user'])) {
                                    if (in_array(strval("1"), explode(",", $_SESSION['berechtigungen'])) === TRUE) {
                                        echo '<li><a href="../../editor/index.php?name=reden">neu: Statements</a></li>';
                                    }


                                    if (in_array(strval("0"), explode(",", $_SESSION['berechtigungen'])) === TRUE) {
                                        echo '<li><a href="../../editor/index.php?name=schuelerrat">neu: Relevantes</a></li>';
                                    }
                                }
                            ?>
                        </ul>
                    </div>
                </li>
                <li>
                    <a href="../../error/index.php">Schülerzeitung</a>
                    <div class="sub-menu-1">
                        <ul>
                            <li><a href="../../error/index.php">Informationen</a></li>
                            <li><a href="../../error/index.php">Vorstellung</a></li>
                            <li class="hover-me"><a href="../../error/index.php">Blog</a><i class="fa-angel-right"></i>
                                <div class="sub-menu-2">
                                    <ul>
                                        <li><a href="../../error/index.php">Schulleben</a></li>
                                        <li><a href="../../error/index.php">Tipps und Tricks</a></li>
                                    </ul>
                                </div>

                            </li>
                            <li><a href="../../error/index.php">internes System</a></li>
                        </ul>
                    </div>
                </li>
                <li>
                    <a href="../../error/index.php">Projekte</a>
                    <div class="sub-menu-1">
                        <ul>
                            <li><a href="../../error/index.php">Schulband</a></li>
                            <li><a href="../../error/index.php">Schulclub</a></li>
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

    <div class="kontaktformular">
        <div class="form-box">
            <div class="button-box">
                <div id="platt">
                </div>
                <button type="button" id="x" class="nachhilfe" onclick="login()">Lehrer</button>
                <button type="button" id="y" class="nachhilfe" onclick="register()">Schüler</button>
            </div>

            <form id="lehrer" class="input-group">
                <input type="text" class="input-field" name="vorname" placeholder="Vorname" id="vorname1">
                <input type="text" class="input-field" name="nachname" placeholder="Nachname" id="nachname1">


                <input type="mail" class="input-field" name="email" placeholder="E-Mailadresse" id="mail1">
                <input type="handy" class="input-field" name="handy" placeholder="Telefonnummer" id="handy1">

                <!--<input type="text" class="input-field" name="klassenstufe" placeholder="Fächer" required>-->
                <!--<input type="text" class="input-field" name="klassenstufe" placeholder="Klassenstufe" required>-->
                <label type="text" class="input-label" name="nachhilfe">Form der Nachhilfe</label>
                </br>
                <input type="radio" class="box" name="box1" id="one1"><span id="box"> Einzelnachhilfe</span>
                </br>
                <input type="radio" class="box" name="box1" id="multiple1"><span id="box"> Gruppennachhilfe</span>
                <!--- <input type="text" class="input-field" name="klassenstufe" placeholder="Klassenstufe" required>-->
                <div class="klassen">
                    <!--container-->
                    <div class="select-box oben-abstand">
                        <div class="options-container">

                            <div class="option">
                                <input type="radio" class="radio" value="8a" name="category" />
                                <label for="8a">8a</label>
                            </div>
                            <div class="option">
                                <input type="radio" class="radio" value="8b" name="category" />
                                <label for="8b">8b</label>
                            </div>
                            <div class="option">
                                <input type="radio" class="radio" value="8c" name="category" />
                                <label for="8c">8c</label>
                            </div>
                            <div class="option">
                                <input type="radio" class="radio" value="8d" name="category" />
                                <label for="8d">8d</label>
                            </div>
                            <div class="option">
                                <input type="radio" class="radio" value="9a" name="category" />
                                <label for="9a">9a</label>
                            </div>
                            <div class="option">
                                <input type="radio" class="radio" value="9b" name="category" />
                                <label for="9b">9b</label>
                            </div>
                            <div class="option">
                                <input type="radio" class="radio" value="9c" name="category" />
                                <label for="9c">9c</label>
                            </div>
                            <div class="option">
                                <input type="radio" class="radio" value="9d" name="category" />
                                <label for="9d">9d</label>
                            </div>
                            <div class="option">
                                <input type="radio" class="radio" value="10a" name="category" />
                                <label for="10a">10a</label>
                            </div>
                            <div class="option">
                                <input type="radio" class="radio" value="10b" name="category" />
                                <label for="10b">10b</label>
                            </div>
                            <div class="option">
                                <input type="radio" class="radio" value="10c" name="category" />
                                <label for="10c">10c</label>
                            </div>
                            <div class="option">
                                <input type="radio" class="radio" value="10d" name="category" />
                                <label for="10d">10d</label>
                            </div>
                            <div class="option">
                                <input type="radio" class="radio" value="11LkMa1" name="category" />
                                <label for="11LkMa1">11LkMa1</label>
                            </div>
                            <div class="option">
                                <input type="radio" class="radio" value="11LkMa2" name="category" />
                                <label for="11LkMa2">11LkMa2</label>
                            </div>
                            <div class="option">
                                <input type="radio" class="radio" value="11LkDe1" name="category" />
                                <label for="11LkDe1">11LkDe1</label>
                            </div>
                            <div class="option">
                                <input type="radio" class="radio" value="11LkDe2" name="category" />
                                <label for="11LkDe2">11LkDe2</label>
                            </div>
                            <div class="option">
                                <input type="radio" class="radio" value="11LkDe3" name="category" />
                                <label for="11LkDe3">11LkDe3</label>
                            </div>
                            <div class="option">
                                <input type="radio" class="radio" value="12LkBio" name="category" />
                                <label for="12LkBio">12LkBio</label>
                            </div>
                            <div class="option">
                                <input type="radio" class="radio" value="12LkEn1" name="category" />
                                <label for="12LkEn1">12LkEn1</label>
                            </div>
                            <div class="option">
                                <input type="radio" class="radio" value="12En2" name="category" />
                                <label for="12LkEn2">12LkEn2</label>
                            </div>
                            <div class="option">
                                <input type="radio" class="radio" value="12LkGe" name="category" />
                                <label for="12LkGe">12LkGe</label>
                            </div>
                            <div class="option">
                                <input type="radio" class="radio" value="12LkKu" name="category" />
                                <label for="12LkKu">12LkKu</label>
                            </div>
                            <div class="option">
                                <input type="radio" class="radio" value="12LKPh" name="category" />
                                <label for="12LkPh">12LkPh</label>
                            </div>
                        </div>


                        <div class="selected" id="klasse1">
                            Such deine Klasse aus
                        </div>

                        <div class="search-box">
                            <input type="text" placeholder="Gib deine Klasse ein..." />
                        </div>
                    </div>
                </div>
                </br>
                <div class="klassen">


                    <div class="select-box oben-abstand">
                        <div class="options-container">
                            <div class="option">
                                <input type="radio" class="radio" value="Deutsch" name="fach" />
                                <label for="Deutsch">Deutsch</label>
                            </div>

                            <div class="option">
                                <input type="radio" class="radio" value="Englisch" name="fach" />
                                <label for="Englisch">Englisch</label>
                            </div>

                            <div class="option">
                                <input type="radio" class="radio" value="Französisch" name="fach" />
                                <label for="Französisch">Französisch</label>
                            </div>

                            <div class="option">
                                <input type="radio" class="radio" value="Russisch" name="fach" />
                                <label for="Russisch">Russisch</label>
                            </div>

                            <div class="option">
                                <input type="radio" class="radio" value="naturwissenschaftliche Profil" name="fach" />
                                <label for="nProfil">naturwissenschaftliche Profil</label>
                            </div>

                            <div class="option">
                                <input type="radio" class="radio" value="künstlerisches Profil" name="fach" />
                                <label for="künstlerisches Profil">künstlerisches Profil</label>
                            </div>

                            <div class="option">
                                <input type="radio" class="radio" value="gesellschaftliches Profil" name="fach" />
                                <label for="gesellschaftliches Profil">gesellschaftliches Profil</label>
                            </div>

                            <div class="option">
                                <input type="radio" class="radio" value="Mathe" name="fach" />
                                <label for="Mathe">Mathe</label>
                            </div>

                            <div class="option">
                                <input type="radio" class="radio" value="Informatik" name="fach" />
                                <label for="Informatik">Informatik</label>
                            </div>
                            <div class="option">
                                <input type="radio" class="radio" value="Biologie" name="fach" />
                                <label for="Biologie">Biologie</label>
                            </div>
                            <div class="option">
                                <input type="radio" class="radio" value="Chemie" name="fach" />
                                <label for="Chemie">Chemie</label>
                            </div>
                            <div class="option">
                                <input type="radio" class="radio" value="Physik" name="fach" />
                                <label for="Physik">Physik</label>
                            </div>
                            <div class="option">
                                <input type="radio" class="radio" value="Geschichte" name="fach" />
                                <label for="Geschichte">Geschichte</label>
                            </div>
                            <div class="option">
                                <input type="radio" class="radio" value="Geografie" name="fach" />
                                <label for="Geografie">Geografie</label>
                            </div>
                            <div class="option">
                                <input type="radio" class="radio" value="Ethik" name="fach" />
                                <label for="Ethik">Ethik</label>
                            </div>
                            <div class="option">
                                <input type="radio" class="radio" value="Religion" name="fach" />
                                <label for="Religion">Religion</label>
                            </div>
                            <div class="option">
                                <input type="radio" class="radio" value="Kunst" name="fach" />
                                <label for="Kunst">Kunst</label>
                            </div>
                            <div class="option">
                                <input type="radio" class="radio" value="Musik" name="fach" />
                                <label for="Musik">Musik</label>
                            </div>
                            <div class="option">
                                <input type="radio" class="radio" value="Technik und Computer" name="fach" />
                                <label for="Technik und Computer">Technik und Computer</label>
                            </div>
                            <div class="option">
                                <input type="radio" class="radio" value="GRW" name="fach" />
                                <label for="GRWss">GRW</label>
                            </div>
                            <div class="option">
                                <input type="radio" class="radio" value="Bionik" name="fach" />
                                <label for="Bionik">Bionik</label>
                            </div>
                            <div class="option">
                                <input type="radio" class="radio" value="Philosophie" name="fach" />
                                <label for="Philosophie">Philosophie</label>
                            </div>
                        </div>


                        <div class="selected" id="fach1">
                            In welchem Fach Nachhilfe geben:
                        </div>

                        <div class="search-box">
                            <input type="text" placeholder="Such das Fach aus..." />
                        </div>
                    </div>
                </div>
                </br>
                <div class="klassen">
                    <!--container-->
                    <div class="select-box oben-abstand">
                        <div class="options-container">
                            <div class="option">
                                <input type="radio" class="radio" value="5" name="klassenstufen" />
                                <label for="5">5</label>
                            </div>

                            <div class="option">
                                <input type="radio" class="radio" value="6" name="klassenstufen" />
                                <label for="6">6</label>
                            </div>

                            <div class="option">
                                <input type="radio" class="radio" value="7" name="klassenstufen" />
                                <label for="7">7</label>
                            </div>

                            <div class="option">
                                <input type="radio" class="radio" value="8" name="klassenstufen" />
                                <label for="8">8</label>
                            </div>

                            <div class="option">
                                <input type="radio" class="radio" value="9" name="klassenstufen" />
                                <label for="9">9</label>
                            </div>

                            <div class="option">
                                <input type="radio" class="radio" value="10" name="klassenstufen" />
                                <label for="10">10</label>
                            </div>

                            <div class="option">
                                <input type="radio" class="radio" value="11" name="klassenstufen" />
                                <label for="11">11</label>
                            </div>

                            <div class="option">
                                <input type="radio" class="radio" value="12" name="klassenstufen" />
                                <label for="12">12</label>
                            </div>


                        </div>


                        <div class="selected" id="klassenstufen1">
                            Welche Klassenstufe unterrichten:
                        </div>

                        <div class="search-box">
                            <input type="text" placeholder="Such dir eine Klassenstufe aus..." />
                        </div>



                    </div>
                </div>
                </br>


                <!--<input type="text" class="input-field" name="bemerkungen" placeholder="Bemerkungen">-->
                <input type="checkbox" class="chech-box" id="datenschutz2"><span id="datenschutz">Ich stimme der <a id="datenverlinkung" href="../../general/datenschutz/index.php">Datenschutzverordnung</a> zu
                </span>


                <button type="button" id="save1" class="anmeldungshs">Anmeldung als Nachhilfelehrer</button>
            </form>
            <form id="schueler" class="input-group">
                <input type="text" class="input-field" name="vorname" placeholder="Vorname" id="vorname2">
                <input type="text" class="input-field" name="nachname" placeholder="Nachname" id="nachname2">
                <!--<input type="text" class="input-field" name="klassenstufe" placeholder="Klassenstufe" required>-->
                <input type="mail" class="input-field" name="email" placeholder="E-Mailadresse" id="mail2">
                <input type="handy" class="input-field" name="handy" placeholder="Telefonnummer*" id="handy2">
                <label type="text" class="input-label" name="nachhilfe">Form der Nachhilfe</label>
                </br>
                <input type="radio" class="box" name="box2" id="one2"><span id="box"> Einzelnachhilfe</span>
                </br>
                <input type="radio" class="box" name="box2" id="multiple2"><span id="box"> Gruppennachhilfe</span>

                <div class="klassen">
                    <!--container-->
                    <div class="select-box oben-abstand">
                        <div class="options-container">
                            <div class="option">
                                <input type="radio" class="radio" value="5a" name="teacher" />
                                <label for="5a">5a</label>
                            </div>

                            <div class="option">
                                <input type="radio" class="radio" value="5b" name="teacher" />
                                <label for="5b">5b</label>
                            </div>

                            <div class="option">
                                <input type="radio" class="radio" value="5c" name="teacher" />
                                <label for="5c">5c</label>
                            </div>

                            <div class="option">
                                <input type="radio" class="radio" value="6a" name="teacher" />
                                <label for="6a">6a</label>
                            </div>

                            <div class="option">
                                <input type="radio" class="radio" value="6b" name="teacher" />
                                <label for="6b">6b</label>
                            </div>

                            <div class="option">
                                <input type="radio" class="radio" value="6c" name="teacher" />
                                <label for="6c">6c</label>
                            </div>

                            <div class="option">
                                <input type="radio" class="radio" value="6d" name="teacher" />
                                <label for="6d">6d</label>
                            </div>

                            <div class="option">
                                <input type="radio" class="radio" value="7a" name="teacher" />
                                <label for="7a">7a</label>
                            </div>

                            <div class="option">
                                <input type="radio" class="radio" value="7b" name="teacher" />
                                <label for="7b">7b</label>
                            </div>
                            <div class="option">
                                <input type="radio" class="radio" value="7c" name="teacher" />
                                <label for="7c">7c</label>
                            </div>
                            <div class="option">
                                <input type="radio" class="radio" value="7d" name="teacher" />
                                <label for="7d">7d</label>
                            </div>
                            <div class="option">
                                <input type="radio" class="radio" value="7e" name="teacher" />
                                <label for="7e">7e</label>
                            </div>
                            <div class="option">
                                <input type="radio" class="radio" value="8a" name="teacher" />
                                <label for="8a">8a</label>
                            </div>
                            <div class="option">
                                <input type="radio" class="radio" value="8b" name="teacher" />
                                <label for="8b">8b</label>
                            </div>
                            <div class="option">
                                <input type="radio" class="radio" value="8c" name="teacher" />
                                <label for="8c">8c</label>
                            </div>
                            <div class="option">
                                <input type="radio" class="radio" value="8d" name="teacher" />
                                <label for="8d">8d</label>
                            </div>
                            <div class="option">
                                <input type="radio" class="radio" value="9a" name="teacher" />
                                <label for="9a">9a</label>
                            </div>
                            <div class="option">
                                <input type="radio" class="radio" value="9b" name="teacher" />
                                <label for="9b">9b</label>
                            </div>
                            <div class="option">
                                <input type="radio" class="radio" value="9c" name="teacher" />
                                <label for="9c">9c</label>
                            </div>
                            <div class="option">
                                <input type="radio" class="radio" value="9d" name="teacher" />
                                <label for="9d">9d</label>
                            </div>
                            <div class="option">
                                <input type="radio" class="radio" value="10a" name="teacher" />
                                <label for="10a">10a</label>
                            </div>
                            <div class="option">
                                <input type="radio" class="radio" value="10b" name="teacher" />
                                <label for="10b">10b</label>
                            </div>
                            <div class="option">
                                <input type="radio" class="radio" value="10c" name="teacher" />
                                <label for="10c">10c</label>
                            </div>
                            <div class="option">
                                <input type="radio" class="radio" value="10d" name="teacher" />
                                <label for="10d">10d</label>
                            </div>
                            <div class="option">
                                <input type="radio" class="radio" value="11LkMa1" name="teacher" />
                                <label for="11LkMa1">11LkMa1</label>
                            </div>
                            <div class="option">
                                <input type="radio" class="radio" value="11LkMa2" name="teacher" />
                                <label for="11LkMa2">11LkMa2</label>
                            </div>
                            <div class="option">
                                <input type="radio" class="radio" value="11LkDe1" name="teacher" />
                                <label for="11LkDe1">11LkDe1</label>
                            </div>
                            <div class="option">
                                <input type="radio" class="radio" value="11LkDe2" name="teacher" />
                                <label for="11LkDe2">11LkDe2</label>
                            </div>
                            <div class="option">
                                <input type="radio" class="radio" value="11LkDe3" name="teacher" />
                                <label for="11LkDe3">11LkDe3</label>
                            </div>
                            <div class="option">
                                <input type="radio" class="radio" value="12LkBio" name="teacher" />
                                <label for="12LkBio">12LkBio</label>
                            </div>
                            <div class="option">
                                <input type="radio" class="radio" value="12LkEn1" name="teacher" />
                                <label for="12LkEn1">12LkEn1</label>
                            </div>
                            <div class="option">
                                <input type="radio" class="radio" value="12En2" name="teacher" />
                                <label for="12LkEn2">12LkEn2</label>
                            </div>
                            <div class="option">
                                <input type="radio" class="radio" value="12LkGe" name="teacher" />
                                <label for="12LkGe">12LkGe</label>
                            </div>
                            <div class="option">
                                <input type="radio" class="radio" value="12LkKu" name="teacher" />
                                <label for="12LkKu">12LkKu</label>
                            </div>
                            <div class="option">
                                <input type="radio" class="radio" value="12LKPh" name="teacher" />
                                <label for="12LkPh">12LkPh</label>
                            </div>
                        </div>


                        <div class="selected" id="klasse2">
                            Such deine Klasse aus
                        </div>

                        <div class="search-box">
                            <input type="text" placeholder="Gib deine Klasse ein..." />
                        </div>
                    </div>
                </div>
                </br>
                <div class="klassen">
                    <!--container-->

                    <div class="select-box oben-abstand">
                        <div class="options-container">
                            <div class="option">
                                <input type="radio" class="radio" value="Deutsch" name="lesson" />
                                <label for="Deutsch">Deutsch</label>
                            </div>

                            <div class="option">
                                <input type="radio" class="radio" value="Englisch" name="lesson" />
                                <label for="Englisch">Englisch</label>
                            </div>

                            <div class="option">
                                <input type="radio" class="radio" value="Französisch" name="lesson" />
                                <label for="Französisch">Französisch</label>
                            </div>

                            <div class="option">
                                <input type="radio" class="radio" value="Russisch" name="lesson" />
                                <label for="Russisch">Russisch</label>
                            </div>

                            <div class="option">
                                <input type="radio" class="radio" value="naturwissenschaftliche Profil" name="lesson" />
                                <label for="nProfil">naturwissenschaftliche Profil</label>
                            </div>

                            <div class="option">
                                <input type="radio" class="radio" value="künstlerisches Profil" name="lesson" />
                                <label for="künstlerisches Profil">künstlerisches Profil</label>
                            </div>

                            <div class="option">
                                <input type="radio" class="radio" value="gesellschaftliches Profil" name="lesson" />
                                <label for="gesellschaftliches Profil">gesellschaftliches Profil</label>
                            </div>

                            <div class="option">
                                <input type="radio" class="radio" value="Mathe" name="lesson" />
                                <label for="Mathe">Mathe</label>
                            </div>

                            <div class="option">
                                <input type="radio" class="radio" value="Informatik" name="lesson" />
                                <label for="Informatik">Informatik</label>
                            </div>
                            <div class="option">
                                <input type="radio" class="radio" value="Biologie" name="lesson" />
                                <label for="Biologie">Biologie</label>
                            </div>
                            <div class="option">
                                <input type="radio" class="radio" value="Chemie" name="lesson" />
                                <label for="Chemie">Chemie</label>
                            </div>
                            <div class="option">
                                <input type="radio" class="radio" value="Physik" name="lesson" />
                                <label for="Physik">Physik</label>
                            </div>
                            <div class="option">
                                <input type="radio" class="radio" value="Geschichte" name="lesson" />
                                <label for="Geschichte">Geschichte</label>
                            </div>
                            <div class="option">
                                <input type="radio" class="radio" value="Geografie" name="lesson" />
                                <label for="Geografie">Geografie</label>
                            </div>
                            <div class="option">
                                <input type="radio" class="radio" value="Ethik" name="lesson" />
                                <label for="Ethik">Ethik</label>
                            </div>
                            <div class="option">
                                <input type="radio" class="radio" value="Religion" name="lesson" />
                                <label for="Religion">Religion</label>
                            </div>
                            <div class="option">
                                <input type="radio" class="radio" value="Kunst" name="lesson" />
                                <label for="Kunst">Kunst</label>
                            </div>
                            <div class="option">
                                <input type="radio" class="radio" value="Musik" name="lesson" />
                                <label for="Musik">Musik</label>
                            </div>
                            <div class="option">
                                <input type="radio" class="radio" value="Technik und Computer" name="lesson" />
                                <label for="Technik und Computer">Technik und Computer</label>
                            </div>
                            <div class="option">
                                <input type="radio" class="radio" value="GRW" name="lesson" />
                                <label for="GRWss">GRW</label>
                            </div>
                            <div class="option">
                                <input type="radio" class="radio" value="Bionik" name="lesson" />
                                <label for="Bionik">Bionik</label>
                            </div>
                            <div class="option">
                                <input type="radio" class="radio" value="Philosophie" name="lesson" />
                                <label for="Philosophie">Philosophie</label>
                            </div>
                        </div>
                        <div class="selected" id="fach2">
                            In welchem Fach Nachhilfe nehmen:
                        </div>

                        <div class="search-box">
                            <input type="text" placeholder="Such das Fach aus..." />
                        </div>

                    </div>
                </div>
                </br>



                <!--<input type="text" class="input-field" name="bemerkungen" placeholder="Bemerkungen" >-->
                <input type="checkbox" class="chech-box" id="datenschutz2"><span id="datenschutz">Ich stimme der <a id="datenverlinkung" href="../../general/datenschutz/index.php">Datenschutzverordnung</a> zu
                </span>
                <button type="button" id="save2" class="anmeldungshs">Anmeldung als Nachhilfeschüler</button>

            </form>
        </div>


        <script>
            var x = document.getElementById("lehrer");
            var y = document.getElementById("schueler");
            var z = document.getElementById("platt");

            function register() {
                x.style.left = "-400px";
                y.style.left = "50px";
                z.style.left = "110px"
            }

            function login() {
                x.style.left = "50px";
                y.style.left = "450px";
                z.style.left = "0"
            }
        </script>
        <footer>
            <div class="footer">
                <ul>
                    <li>
                        <div class="titleR">
                            Rechtliches
                        </div>
                        <div class="buttonsR">
                            <a href="../../general/datenschutz/index.php">Datenschutzerklärung</a><br>
                            <a href="../../general/impressum/index.php">Impressum</a><br>
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
        <script src="main.js"></script>
        <script src="abschicken.js"></script>

</html>