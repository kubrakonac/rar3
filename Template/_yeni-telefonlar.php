<?php
  shuffle($urunler);

  if($_SERVER['REQUEST_METHOD'] == "POST"){
    if(isset($_POST['new_phones_submit'])) {
      $Cart->addToCart($_POST['user_id'],$_POST['item_id']);
    }
  }
?>
<section id="yeni-telefonlar">
  <div class="container">
    <h4 class="font-rubik font-size-20">Yeni Telefonlar</h4>
    <hr>
    <!-- Owl Carousel -->
    <div class="owl-carousel owl-theme">
      <?php foreach ($urunler as $urun){ ?>
        <div class="item py-2 bg-light">
          <div class="product font-rale">
            <a href="<?php echo 'urunler.php?item_id='.$urun['item_id'];?>"><img src="<?php echo $urun['item_image'] ?? "./assets/products/1.png"; ?>" alt="product1" class="img-fluid"></a>
            <div class="text-center">
              <h6><?php echo $urun['item_name'] ?? "Bilinmiyor";?></h6>
              <div class="rating text-warning font-size-12">
                <span><i class="fas fa-star"></i></span>
                <span><i class="fas fa-star"></i></span>
                <span><i class="fas fa-star"></i></span>
                <span><i class="fas fa-star"></i></span>
                <span><i class="far fa-star"></i></span>
              </div>
              <div class="price py-2">
                <span>$<?php echo $urun['item_price'] ?? '0';?></span>
              </div>
              <form method="post">
                <input type="hidden" name="item_id" value="<?php echo $urun['item_id'] ?? '1'; ?>">
                <input type="hidden" name="user_id" value="<?php echo 1; ?>">
                <?php
                  $cartUrunler = $product->veriGetir('cart');
                  if(in_array($urun['item_id'], $Cart->getCartId($cartUrunler) ?? [])){
                    echo '<button type="submit" class="btn disabled btn-secondary font-size-12">Kartta Mevcut</button>';
                  }else{
                    echo '<button type="submit" name="new_phones_submit" class="btn btn-warning font-size-12">Karta Ekle</button>';
                  }
                ?>
              </form>
            </div>
          </div>
        </div>
      <?php }?>
    </div>
    <!-- !Owl Carousel -->
  </div>
</section>