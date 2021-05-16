<?php
session_start();
if (isset($_SESSION["username"]) && isset($_SESSION["id"])) {
    $id = $_SESSION["id"];
    $email = $_SESSION["username"];
} else {
    header("Location: index.php?role=professor");
    die();
}


?>

<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Testovanie</title>
    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <!-- Custom styles for this template -->
    <link href="css/dashboard.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" crossorigin="anonymous"></script>
    <script src="js/bootstrap.bundle.min.js"></script>

    <script src="script/notification.js"></script>
</head>
<body>
<header class="navbar navbar-dark sticky-top bg-dark flex-md-nowrap p-0 shadow">
    <a class="navbar-brand col-md-3 col-lg-2 me-0 px-3" href="index.php">Profesor</a>
    <ul class="navbar-nav px-3">
        <li class="nav-item text-nowrap">
            <a class="nav-link" href="logout.php">Odhlásiť sa</a>
        </li>
    </ul>
</header>

<div class="container-fluid">
    <div class="row">
        <nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
            <div class="position-sticky pt-3">
                <ul class="nav flex-column">
                    <li class="nav-item">
                        <a class="nav-link" href="index.php">
                            Domov
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="teacher_new_test.php">
                            Nový test
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="teacher_detail.php">
                            Detaily testov
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link  active" aria-current="page" href="teacher_reports.php">
                            Rozdelenie úloh
                        </a>
                    </li>
                </ul>

            </div>
        </nav>

        <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
            <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                <h1 class="h2">Rozdelenie úloh</h1>
            </div>

            <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3">
                <table class="table">
                    <thead>
                    <tr>
                        <th scope="col">AIS ID</th>
                        <th scope="col">Meno a Priezvisko</th>
                        <th scope="col">Prihlasovanie do aplikácie</th>
                        <th scope="col">Realizácia otázok s viacerými odpoveďami</th>
                        <th scope="col">Realizácia otázok s krátkymi odpoveďami</th>
                        <th scope="col">Realizácia párovacích otázok</th>
                        <th scope="col">Realizácia otázok s kreslením</th>
                        <th scope="col">Realizácia otázok s príkladom</th>
                        <th scope="col">Ukončenie testu</th>
                        <th scope="col">Viac testov aktivácia/deaktivácia</th>
                        <th scope="col">Info pre učiteľa (notifikácie, ukončenie)</th>
                        <th scope="col">PDF export</th>
                        <th scope="col">CSV export</th>
                        <th scope="col">Docker</th>
                        <th scope="col">Finalizácia</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <td>97743</td>
                        <td>Juraj Budai</td>
                        <td>&#10060;</td>
                        <td>&#10003;</td>
                        <td>&#10003;</td>
                        <td>&#10003;</td>
                        <td>&#10060;</td>
                        <td>&#10003;</td>
                        <td>&#10060;</td>
                        <td>&#10060;</td>
                        <td>&#10003;</td>
                        <td>&#10003;</td>
                        <td>&#10060;</td>
                        <td>&#10060;</td>
                        <td>&#10003;</td>
                    </tr>
                    <tr>
                        <td>97855</td>
                        <td>Juraj Lapčák</td>
                        <td>&#10060;</td>
                        <td>&#10003;</td>
                        <td>&#10003;</td>
                        <td>&#10003;</td>
                        <td>&#10060;</td>
                        <td>&#10060;</td>
                        <td>&#10003;</td>
                        <td>&#10003;</td>
                        <td>&#10003;</td>
                        <td>&#10060;</td>
                        <td>&#10060;</td>
                        <td>&#10003;</td>
                        <td>&#10003;</td>
                    </tr>
                    <tr>
                        <td>97947</td>
                        <td>Ľubomír Ševčík</td>
                        <td>&#10060;</td>
                        <td>&#10003;</td>
                        <td>&#10003;</td>
                        <td>&#10003;</td>
                        <td>&#10060;</td>
                        <td>&#10003;</td>
                        <td>&#10003;</td>
                        <td>&#10060;</td>
                        <td>&#10060;</td>
                        <td>&#10003;</td>
                        <td>&#10060;</td>
                        <td>&#10060;</td>
                        <td>&#10003;</td>
                    </tr>
                    <tr>
                        <td>97817</td>
                        <td>Marek Kačmár</td>
                        <td>&#10003;</td>
                        <td>&#10060;</td>
                        <td>&#10060;</td>
                        <td>&#10060;</td>
                        <td>&#10060;</td>
                        <td>&#10060;</td>
                        <td>&#10003;</td>
                        <td>&#10003;</td>
                        <td>&#10060;</td>
                        <td>&#10060;</td>
                        <td>&#10003;</td>
                        <td>&#10060;</td>
                        <td>&#10003;</td>
                    </tr>
                    <tr>
                        <td>86213</td>
                        <td>Martin Kuchár</td>
                        <td>&#10060;</td>
                        <td>&#10060;</td>
                        <td>&#10060;</td>
                        <td>&#10060;</td>
                        <td>&#10060;</td>
                        <td>&#10060;</td>
                        <td>&#10060;</td>
                        <td>&#10060;</td>
                        <td>&#10060;</td>
                        <td>&#10060;</td>
                        <td>&#10060;</td>
                        <td>&#10060;</td>
                        <td>&#10060;</td>
                    </tr>
                    </tbody>
                </table>

            </div>
            <div class="pt-3 pb-2 mb-3 border-bottom">
                <div class="mb-4">
                    <h4 class="mb-2">Dodatočná inštalácia</h4>
                    <article class="mb-2">
                        <p>Bol updatovaný docker.</p>
                        <p>V súbore /etc/apache2/sites-available/000-default-le-ssl.conf dopísané riadky:
                            <br>
                            <code>
                                ProxyPreserveHost on<br>

                                ProxyPass /finale-docker/ http://127.0.0.1:8000/<br>
                                ProxyPassReverse /docker/ http://127.0.0.1:8000/<br>

                                ProxyPass /finale-phpmyadmin/ http://127.0.0.1:8080/<br>
                                ProxyPassReverse /finale-phpmyadmin/ http://127.0.0.1:8080/<br>
                            </code>
                        </p>
                        <p>
                            A vykonané následné príkazy nasledujúce reštartom apache:
                            <br>
                            <code>
                                sudo a2enmod proxy<br>

                                sudo a2enmod proxy_http<br>
                            </code>
                        </p>
                    </article>
                </div>
                <hr>
                <div class="mb-4">
                    <h4 class="mb-2">Prihlasovanie do aplikácie</h4>
                    <article class="mb-2">Realizácia pomocou POST metódy. Na ukladanie do databázy bol použitý algoritmus bcrypt </article>
                </div>
                <div class="mb-4">
                    <h4 class="mb-2">Realizácia otázok s viacerými odpoveďami</h4>
                    <article class="mb-2">
                        Dynamicky generujeme počet otázok v javascripte. Každá otázka môže mať 8
                        správnych odpovedí, ktorých počet získavame selectom. Zo znenia otázky a odpovedí generujeme
                        JSON, ktorý ukladáme do JSONU s typom otázky 1, ktorý reprezentuje celý test.
                    </article>
                </div>
                <div class="mb-4">
                    <h4 class="mb-2">Realizácia otázok s krátkymi odpoveďami</h4>
                    <article class="mb-2">
                        Dynamicky generujeme počet otázok v javascripte. Každá otázka môže mať 8
                        správnych odpovedí, ktorých počet získavame selectom. Správne odpovede je možné označiť rádiobuttonom.
                        Zo znenia otázky, správnych a nesprávnych odpovedí generujeme JSON s typom otázky 2, ktorý ukladáme do JSONU, ktorý reprezentuje celý test.
                    </article>
                </div>
                <div class="mb-4">
                    <h4 class="mb-2">Realizácia párovacích otázok</h4>
                    <article class="mb-2">
                        Dynamicky generujeme počet otázok v javascripte. Každá otázka môže mať 8
                        párov otázok, ktorých počet získavame selectom.
                        Zo znenia otázky a párov odpovedí generujeme JSON s typom otázky 3, ktorý ukladáme do JSONU, ktorý reprezentuje celý test.
                        Na strane študenta je párovanie realizovane pomocou JQUERY UI - sortable.
                    </article>
                </div>
                <div class="mb-4">
                    <h4 class="mb-2">Realizácia otázok s kreslením</h4>
                    <article class="mb-2">Nemáme</article>
                </div>
                <div class="mb-4">
                    <h4 class="mb-2">Realizácia otázok s príkladom</h4>
                    <article class="mb-2">
                        Dynamicky generujeme počet otázok v javascripte. Každá otázka pozostáva z otázky a príkladu.
                        Zadávanie príkladu realizujeme pomocou knižnice MathLive a Cortex JS.
                        Zo znenia otázky a zadania príkladu generujeme JSON s typom otázky 5, ktorý ukladáme do JSONU, ktorý reprezentuje celý test.
                    </article>
                </div>
                <div class="mb-4">
                    <h4 class="mb-2">Ukončenie testu</h4>
                    <article class="mb-2">
                        Každý test ma definovanú časomieru, ktorá sa zadáva pri vytváraní testov. Výpočet časomiery je realizovaný vypočítaním rozdielu časov
                        predpokladaného ukončenia a začatia testu, ktorý sa pri každom kliknutí tlačidla
                        na spustenie testu aktualizuje, čím sa následne upraví časomiera.
                </div>
                <div class="mb-4">
                    <h4 class="mb-2">Viac testov aktivácia/deaktivácia</h4>
                    <article class="mb-2">Káždý test má v tabuľke tests stĺpec status, ktorý vyjadruje,
                        či je active alebo inactive. Jeho zmenu možno uskutočniť v podstránke s detailom testov.</article>
                </div>
                <div class="mb-4">
                    <h4 class="mb-2">Info pre učiteľa (notifikácie, ukončenie)</h4>
                    <article class="mb-2">
                        Informácie o monitorovaní ALT+Tab študenta získavame pomocou Page-visibility API. Informácie o tom,
                        ktorý študent opustil stránku počas testu sa odošle pomocou fetch requestu na PHP, v ktorom mu v databáze do tabuľky pridáme hodnotu odišiel.
                        Notifikácie realizujeme pomocou GET requestu na tieto údaje v databáze každých pár sekúnd a zapisujeme do Bootstrap elementu toast.
                        Ak sa notifikácia pošle do tabuľky v databáze sa zapíše údaj o tom, že notifikácia bola poslaná.
                        Ukončenie je realizované pomocou zapísania timestampu do tabuľky v databáze.
                        Ukončenie, začatie a trackovanie je možné sledovať v detaile študenta pre daný test.
                    </article>
                </div>
                <div class="mb-4">
                    <h4 class="mb-2">PDF export</h4>
                    <article class="mb-2">Stručný popis realizácie</article>
                </div>
                <div class="mb-4">
                    <h4 class="mb-2">CSV export</h4>
                    <article class="mb-2">
                        Export do CSV súboru je realizovaný získaním všetkých odovzdaných ohodnotených testov s daným id testu
                        a následným vytvorením 4 stĺpcov(id, meno, priezvisko, hodnotenia), do ktorých sa v cykle zapisujú hodnoty uložené v databáze. Následne sa určí
                        hlavička, ktorou sa nastaví kódovanie, typ súboru a nastavenie uloženia vytvoreného súboru namiesto zobrazenia.
                    </article>
                </div>
                <div class="mb-4">
                    <h4 class="mb-2">Docker</h4>
                    <article class="mb-2">Stručný popis realizácie</article>
                </div>
                <div class="mb-4">
                    <h4 class="mb-2">Finalizácia</h4>
                    <article class="mb-2">Stručný popis realizácie</article>
                </div>
            </div>

            <?php include("partials/notification-html.php")?>
        </main>
    </div>
</div>
</body>
<script src="script/notification.js"></script>
</html>
