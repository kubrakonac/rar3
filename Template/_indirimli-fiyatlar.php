<?php
  shuffle($urunler);

  $markalartemp = array_map(function ($tempurun){ return $tempurun['item_brand']; }, $urunler);
  $markalar = array_unique($markalartemp);
  sort($markalar);

  if($_SERVER['REQUEST_METHOD'] == "POST"){
    if(isset($_POST['special_price_submit'])) {
      $Cart->addToCart($_POST['user_id'],$_POST['item_id']);
    }
  }
  $cartUrunler = $product->veriGetir('cart');
  $cartKontrol = $Cart->getCartId($cartUrunler);
?>
<section id="indirimli-fiyatlar">
  <div class="container font-raleway">
    <h4 class="font-rubik font-size-20">Indirimli Fiyatlar</h4>
    <div id="filters" class="button-group text-right font-rubik font-size-16">
      <button class="btn is-checked" data-filter="*">Tümü</button>
      <?php array_map(function ($marka){
        echo '<button class="btn" data-filter=".'.$marka.'">'.$marka.'</button>';
      }, $markalar) ?>
    </div>
    <div class="grid">
      <?php array_map(function ($urun) use ($cartKontrol) { ?>
      <div class="grid-item border <?php echo $urun['item_brand'] ?? "Marka"; ?>">
        <div class="item py-2" style="width: 200px;">
          <div class="product font-raleway">
            <a href="<?php echo 'urunler.php?item_id='.$urun['item_id'];?>"><img src="<?php echo $urun['item_image'] ?? "./assets/products/1.png"; ?>" alt="product1" class="img-fluid"></a>
            <div class="text-center">
              <h6><?php echo $urun['item_name'] ?? "Bilinmiyor"; ?></h6>
              <div class="rating text-warning font-size-12">
                <?php for($i=0; $i<4; $i++){
                  echo '<span><i class="fas fa-star"></i></span>';}?>
                <span><i class="fas fa-star-half"></i></span>
              </div>
              <div class="price py-2">
                <span>$<?php echo $urun['item_price'] ?? "0"; ?></span>
              </div>
              <form method="post">
                <input type="hidden" name="item_id" value="<?php echo $urun['item_id'] ?? '1'; ?>">
                <input type="hidden" name="user_id" value="<?php echo 1; ?>">
                <?php
                  if(in_array($urun['item_id'], $cartKontrol ?? [])){
                    echo '<button type="submit" class="btn disabled btn-secondary font-size-12">Kartta Mevcut</button>';
                  }else{
                    echo '<button type="submit" name="special_price_submit" class="btn btn-warning font-size-12">Karta Ekle</button>';
                  }
                ?>
              </form>
            </div>
          </div>
        </div>
      </div>
      <?php }, $urunler) ?>
    </div>
  </div>
</section>
