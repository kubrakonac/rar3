<?php
require("../database/DBBaglanti.php");
require("../database/Urun.php");

$db = new DBBaglanti();
$product = new Urun($db);


if(isset($_POST['itemid'])){
  $result = $product->urunGetir($_POST['itemid']);
  echo json_encode($result);
}