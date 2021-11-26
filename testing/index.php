<?php
//declare(strict_types=1)
require $_SERVER['DOCUMENT_ROOT'] . "/controller/sqlControllers/sOrders.php";
require $_SERVER['DOCUMENT_ROOT'] . "/controller/sqlControllers/sRackets.php";
require $_SERVER['DOCUMENT_ROOT'] . "/controller/sqlControllers/sStrings.php";
require $_SERVER['DOCUMENT_ROOT'] . "/controller/sqlControllers/sUsers.php";
require $_SERVER['DOCUMENT_ROOT'] . "/controller/sqlControllers/sCustomers.php";
require $_SERVER['DOCUMENT_ROOT'] . "/controller/sConstrMain.php";
//require $_SERVER['DOCUMENT_ROOT'] . "/config/config.php";
include $_SERVER["DOCUMENT_ROOT"]."/imports/navigation.php";
include $_SERVER["DOCUMENT_ROOT"]."/imports/copyright.php";
$s = new sConstrMain("gen","TestHome","Testing Home");
$s->getSiteBeginning();

$pdo = new PDO('mysql:host=' . $s->getDbCredentials('host') . ';dbname=' . $s->getDbCredentials('db') . ';', '' . $s->getDbCredentials('user') . '', '' . $s->getDbCredentials('pw') . '');
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
$pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);


$sql = "SELECT *
        FROM tbl_login_users
        INNER JOIN tbl_users
            ON tbl_login_users.users_id = tbl_users.users_id
        INNER JOIN tbl_login
            ON tbl_login_users.login_id = tbl_login.login_id;";
$stmt = $pdo->prepare($sql);
$stmt->execute();
$users = $stmt->fetchAll(PDO::FETCH_CLASS, 'sUsers');

/*
echo "<pre>";
var_dump($users);
echo "</pre>";
*/

$sql = "SELECT t.customers_lastname,
       t.customers_firstname,
       t.customers_adresse,
       t.customers_adresse_nr,
       tc.city_plz,
       tc.city_name,
       t.customers_mail,
       t.customers_phone
FROM tbl_customers t
INNER JOIN tbl_cities tc on t.city_id = tc.city_id;";
$stmt = $pdo->prepare($sql);
$stmt->execute();
$customers = $stmt->fetchAll(PDO::FETCH_CLASS, 'sCustomers');

/*
echo "<pre>";
var_dump($customers);
echo "</pre>";
*/
$sql = "SELECT *
        FROM tbl_strings
        INNER JOIN tbl_brand
            ON tbl_strings.brand_id = tbl_brand.brand_id;";
$stmt = $pdo->prepare($sql);
$stmt->execute();
$strings = $stmt->fetchAll(PDO::FETCH_CLASS, 'sStrings');
/*
echo "<pre>";
var_dump($strings);
echo "</pre>";
*/
echo "<hr>";
$sql = "SELECT
            tbl_orders.orders_id,
            orders_date,
            customers_lastname,
            customers_firstname,
            mainstrings.strings_name AS 'mainstring',
            tbl_orders_main.orders_main_tension AS 'maintension',
            crossstrings.strings_name AS 'crossstring',
            tbl_orders_cross.orders_cross_tension AS 'crosstension',
            racket.racket_name,
            racketbrand.brand_name AS 'racketbrand'
        FROM 
            tbl_orders
        INNER JOIN
            tbl_orders_cross
        ON
            tbl_orders.orders_id = tbl_orders_cross.orders_id
        INNER JOIN
            tbl_orders_main
        ON
            tbl_orders.orders_id = tbl_orders_main.orders_id
        INNER JOIN
            tbl_customers
        ON
            tbl_orders.customer_id = tbl_customers.customers_id
        INNER JOIN
            tbl_strings mainstrings
        ON
            tbl_orders_main.string_main_id = mainstrings.strings_id
        INNER JOIN
            tbl_strings crossstrings
        ON
            tbl_orders_cross.string_cross_id = crossstrings.strings_id
        INNER JOIN
            tbl_racket racket
        ON
            tbl_orders.racket_id = racket.racket_id
        INNER JOIN
            tbl_brand racketbrand
        ON
            racket.brand_id = racketbrand.brand_id;;";
$stmt = $pdo->prepare($sql);
$stmt->execute();
$orders = $stmt->fetchAll(PDO::FETCH_CLASS, 'sOrders');
/*
echo "<pre>";
var_dump($orders);
echo "</pre><hr>";
*/
/*
$sql = "SELECT strings_name AS strings_main_name
        FROM tbl_strings
        INNER JOIN tbl_orders_main
        ON tbl_strings.strings_id = tbl_orders_main.string_main_id;";
$stmt = $db->prepare($sql);
$stmt->execute();
$orders = $stmt->fetchAll(PDO::FETCH_CLASS, 'sOrders');
echo "<pre>";
var_dump($orders);
echo "</pre><hr> CROSS";
$sql = "SELECT strings_name AS strings_cross_name
        FROM tbl_strings
        INNER JOIN tbl_orders_cross
        ON tbl_strings.strings_id = tbl_orders_cross.string_cross_id;";
$stmt = $db->prepare($sql);
$stmt->execute();
$orders = $stmt->fetchAll(PDO::FETCH_CLASS, 'sOrders');
echo "<pre>";
var_dump($orders);
echo "</pre><hr>Racket";

*/
$sql = "SELECT racket_id, racket_name, racket_size, racket_weight, racket_type, brand_name
        FROM tbl_racket
        INNER JOIN tbl_brand
        ON tbl_racket.brand_id = tbl_brand.brand_id;";
$stmt = $pdo->prepare($sql);
$stmt->execute();
$rackets = $stmt->fetchAll(PDO::FETCH_CLASS, 'sRackets');
/*
echo "<pre>";
var_dump($rackets);
echo "</pre><hr>";
*/
?>
    <article class="article">
        <?php
        include "users.view.php";
        ?>
    </article>
<hr>
<?php
$s->getSiteEnd();
?>