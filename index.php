<?php
require $_SERVER["DOCUMENT_ROOT"]."/controller/sConstrMain.php";
include $_SERVER["DOCUMENT_ROOT"]."/imports/navigation.php";
include $_SERVER["DOCUMENT_ROOT"]."/imports/copyright.php";
$s = new sConstrMain( "home", "Dies ist die Startseite");
?>
<!DOCTYPE html>
<html lang="de">
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta charset="UTF-8">
    <link rel="stylesheet" href="style/stylesheet.css">
    <title><?php print($s->getSiteTitle()); ?></title>
</head>
<body class="<?php print ($s->getBodyClass()); ?>">
<div class="container">
    <header class="header">
        <?php
            print($s->getHeader());
        ?>
    </header>
    <div class="siteContent">
        <nav class="nav">
            <?php
            print $s->getNavigation();
            ?>
        </nav>
        <div class="mainContent">
        <div class="content">
            <div class="articleContainer">
                <?php
                $articleTitles = array("Meine erste Seite","Newspaper", "Covid-19");
                for($i=0;$i<count($articleTitles);$i++):
                    if($i == 0):
                ?>
                <article class="article">
                    <h2><?php print($articleTitles[$i]); ?></h2>
                    <p>Lorem ipsum dolor sit amet, consetetur sadipscing elitr,
                        sed diam nonumy eirmod tempor invidunt ut labore et dolore
                        magna aliquyam erat, sed diam voluptua. At vero eos et accusam
                        et justo duo dolores et ea rebum. Stet clita kasd gubergren, no
                        sea takimata sanctus est Lorem ipsum dolor sit amet. Lorem
                        ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod
                        tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua.
                        At vero eos et accusam et justo duo dolores et ea rebum. Stet clita
                        kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet.</p>
                    <p>Lorem ipsum dolor sit amet, consetetur sadipscing elitr,
                        sed diam nonumy eirmod tempor invidunt ut labore et dolore
                        magna aliquyam erat, sed diam voluptua. At vero eos et accusam
                        et justo duo dolores et ea rebum. Stet clita kasd gubergren, no
                        sea takimata sanctus est Lorem ipsum dolor sit amet. Lorem
                        ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod
                        tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua.
                        At vero eos et accusam et justo duo dolores et ea rebum. Stet clita
                        kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet</p>
                </article>
                <?php continue;
                endif;?>
                <article class="article">
                    <h2><?php print($articleTitles[$i]); ?></h2>
                    <p>Lorem ipsum dolor sit amet, consetetur sadipscing elitr,
                        sed diam nonumy eirmod tempor invidunt ut labore et dolore
                        magna aliquyam erat, sed diam voluptua. At vero eos et accusam
                        et justo duo dolores et ea rebum. Stet clita kasd gubergren, no
                        sea takimata sanctus est Lorem ipsum dolor sit amet. Lorem
                        ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod
                        tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua.
                        At vero eos et accusam et justo duo dolores et ea rebum. Stet clita
                        kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet.</p>
                </article>
                <?php endfor; ?>
            </div>
            <?php

            ?>

        </div>
    </div>
    </div>
    <footer class="footer">
        <?php print(copyright()); ?>
    </footer>
</div>
</body>
</html>

