<h2>Users</h2>
<table>
    <tr>
        <th>ID</th>
        <th>Lastname</th>
        <th>Firstname</th>
        <th>Phone</th>
        <th>eMail</th>
        <th>Street</th>
        <th>Login</th>
        <th>Password</th>
    </tr>
    <?php foreach ($users as $user) : ?>
        <tr>
            <td><?=$user->users_id; ?></td>
            <td><?=$user->getLastname(); ?></td>
            <td><?=$user->getFirstname(); ?></td>
            <td><?=$user->getUsrPhone(); ?></td>
            <td><?=$user->getUsrMail(); ?></td>
            <td><?=$user->getUsrAddresse() ." ". $user->getUsrAddresseNr(); ?></td>
            <td><?=$user->getUsrLogin(); ?></td>
            <td><?=str_repeat('*', strlen(hash('crc32b',$user->getUsrPw()))); ?></td>
            </tr>
    <?php endforeach;?>
</table>
<hr>

<h2>Customers</h2>
<table>
    <tr>
        <th>Customer Name</th>
        <th>Customer Adresse</th>
        <th>Customer PLZ/City</th>
        <th>Customer Phone</th>
        <th>Customer Mail</th>
    </tr>
    <?php foreach ($customers as $customer) : ?>
    <tr>
        <td><?=$customer->getCustomerFirstname() ." ". $customer->getCustomerLastname(); ?></td>
        <td><?=$customer->getCustomerAdresse()." ".$customer->getCustomerAdresseNr(); ?></td>
        <td><?=$customer->getCustomerPostalcode()." ".$customer->getCustomerCity(); ?></td>
        <td>+41<?=$customer->getCustomerPhone(); ?></td>
        <td><?=$customer->getCustomerMail(); ?></td>
    </tr>
    <?php endforeach;?>
</table>

<hr>
<h2>Strings</h2>
<table>
    <tr>
        <th>ID</th>
        <th>Brand</th>
        <th>String</th>
        <th>Color</th>
        <th>Thickness</th>
        <th>Type</th>
    </tr>
    <?php foreach ($strings as $string) : ?>
        <tr>
            <td><?=$string->strings_id; ?></td>
            <td><?=$string->getBrandName(); ?></td>
            <td><?=$string->getStringsName(); ?></td>
            <td><?=$string->getStringsColor(); ?></td>
            <td><?=$string->getStringsThickness(); ?></td>
            <td><?=$string->getStringsType(); ?></td>
        </tr>
    <?php endforeach;?>
</table>
<hr>
<h2>Rackets</h2>
<table>
    <tr>
        <th>ID</th>
        <th>Brand</th>
        <th>Name</th>
        <th>Type</th>
        <th>Size</th>
        <th>Weight</th>
    </tr>
    <?php foreach ($rackets as $racket) : ?>
        <tr>
            <td><?=$racket->racket_id; ?></td>
            <td><?=$racket->getBrandName(); ?></td>
            <td><?=$racket->getRacketName(); ?></td>
            <td><?=$racket->getRacketType(); ?></td>
            <td><?=$racket->getRacketSize(); ?></td>
            <td><?=$racket->getRacketWeight(); ?></td>
        </tr>
    <?php endforeach;?>
</table>
<hr>
<h2>Orders</h2>
<table>
    <tr>
        <th>Order ID</th>
        <th>Date of Order</th>
        <th>Firstname</th>
        <th>Lastname</th>
        <th>Racket</th>
        <th>Main String Name</th>
        <th>Main Tension</th>
        <th>Cross String Name</th>
        <th>Cross Tension</th>
    </tr>
    <?php foreach ($mains as $main) :?>
    <?=$main->getStringName(); ?>
    <?php endforeach; ?>
    <?php foreach ($crosses as $cross) : ?>
    <?php endforeach; ?>
    <?php foreach ($orders as $order) : ?>
        <tr>
            <td><?=$order->orders_id; ?></td>
            <td><?=$order->getOrdersDate() ?></td>
            <td><?=$order->getCustomerFirstname() ?></td>
            <td><?=$order->getCustomerLastname() ?></td>
            <td><?=$order->getRacketBrand() ." ". $order->getRacketName(); ?></td>
            <td><?=$order->getOrdersMainString(); ?></td>
            <td><?=$order->getOrdersMainTension() ?> Kg</td>
            <td><?=$order->getOrdersCrossString(); ?></td>
            <td><?=$order->getOrdersCrossTension() ?> Kg</td>
        </tr>
    <?php endforeach;?>
</table>