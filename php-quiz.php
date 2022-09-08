<?php
$json_url = "https://noavarpub.com/interview/php/json.php";
$ch       = curl_init();
curl_setopt($ch, CURLOPT_URL, $json_url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
$res         = curl_exec($ch);
$status_code = curl_getinfo($ch, CURLINFO_HTTP_CODE);
if ($status_code != 200) {
    var_dump($status_code);
    echo 'error on get data from json';
    die();
}
$products    = json_decode($res, true);
$result      = $products['result'];
$sort_column = array_column($result, 'product_price');
array_multisort($sort_column, SORT_DESC, $result);?>
<table border="1" align="center">
    <thead>
    <tr>
        <th>product title</th>
        <th>product price</th>
    </tr>
    </thead>
    <tbody>
    <?php foreach ($result as $product) {?>
    <tr>
        <td><?php echo $product['product_title']; ?></td>
        <td><?php echo $product['product_price']; ?></td>
    </tr>
    <?php } ?>
    </tbody>
</table>