<?php
require $_SERVER["DOCUMENT_ROOT"]."/controller/sConstrMain.php";
include $_SERVER["DOCUMENT_ROOT"]."/imports/navigation.php";
include $_SERVER["DOCUMENT_ROOT"]."/imports/copyright.php";
$s = new sConstrMain( "testing", "Dies ist die Testingseite");
?>
<!DOCTYPE html>
<html lang="de">
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta charset="UTF-8">
    <link rel="stylesheet" href="<?php print($s->getStyleFolder()) ?>stylesheet.css">
    <title><?php print($s->getSiteTitle()); ?></title>
</head>
<body class="<?php print($s->getBodyClass()); ?>">
<div class="container">
    <header class="header">
        <?php
        print($s->getHeader());
        ?>
    </header>
    <div class="siteContent">
        <nav class="nav">
            <?php
            print($s->getNavigation());
            ?>
        </nav>
        <div class="mainContent">
            <div class="content">
                <article class="article">
                    <h2>Zähler mit for-Schleife</h2>
                        <p>
                        <?php
                        echo "<select name='alter'>";
                        for($min = 1, $max = 10; $min < 70; $min += 10, $max += 10){
                            echo "<option>".$min."-".$max."</option>";

                        }
                        echo "</select>";
                        echo "<br>";
                        ?>
                        </p>
                    <h2>Das kleine 1x1</h2>
                        <p>
                            <?php
                            echo "<table border='1'>";
                            for($i = 1; $i <= 10; $i++){
                                echo "<tr>";
                                for($j = 1; $j <= 10; $j++){
                                    $result = $i*$j;
                                    echo "<td>$result</td>";
                                }
                                echo "</tr>";
                            }

                            echo "</table>";
                            ?>
                        </p>
                    <h2>Break & Continue</h2>
                        <p>
                            <?php
                            for ($i = 1; $i <= 10; $i++){
                                if($i == 2){
                                    continue;
                                }
                                echo "$i. Durchlauf<br>";
                                if($i == 5) {
                                    break;
                                }
                            }
                            ?>
                        </p>
                </article>
                <article class="article">
                    <h2>Zufallswürfeln</h2>
                        <p>
                            <?php
                            $min = 1;
                            $max = 6;
                            $zähler = 0;
                            while(1){
                                $zahl1 = rand($min, $max);
                                $zahl2 = rand($min, $max);
                                echo "$zahl1 $zahl2<br>";
                                $zähler++;
                                if($zahl1==$zahl2){
                                    break;
                                }
                            }
                            echo "Beim $zähler.ten Versuch geklappt";
                            ?>
                        </p>
                </article>
                <?php
                $c = new sArticleMain("Last Post");
                $c->setImage("default.png");
                print($c->createArticle());
                ?>
            </div>
            <div class="content">


                </article>
            </div>
        </div>
    </div>
    <footer class="footer">
        <?php print(copyright()); ?>
    </footer>
</div>
</body>
</html>