<?php
  $urun_id = $_GET['item_id'] ?? 2;
  foreach($urunler as $urun):
    if($urun['item_id'] == $urun_id):
      if($_SERVER['REQUEST_METHOD'] == "POST"){
        if(isset($_POST['product-submit'])) {
          $Cart->addToCart2($_POST['user_id'],$_POST['item_id']);
        }
      }
      $urunFiyat = $urun['item_price'];
      $urunYuksek =  $urunFiyat +  $urunFiyat / 5 ;
      $urunYuksek = number_format($urunYuksek, 2, '.', '');
      $urunIndirim = $urunYuksek -  $urunFiyat;
      $urunIndirim = number_format($urunIndirim, 2, '.', '');
?>

<section id="product">
  <div class="container font-baloo font-size-18 my-4">
    <div class="card" id="product-cart">
      <div class="row">
        <aside class="col-md-5 col-sm-12 border-right">
          <article class="gallery-wrap">
            <div class="img-big-wrap mt-5">
              <img src="<?php echo $urun['item_image'] ?? "./assets/products/2.png" ;?>" alt="" class="img-fluid">
            </div> <!-- slider-product.// -->
            <!-- slider-nav.// -->
          </article> <!-- gallery-wrap .end// -->
        </aside>
        <aside class="col-md-7 col-sm-12">
          <article class="card-body p-5" style="padding-top: 15px !important;">
            <h3 class="title mb-3"><?php echo $urun['item_name'] ?? "Bilinmiyor" ;?></h3>

            <p class="price-detail-wrap">
            <div>
              <strike>$<?php
                echo $urunYuksek ?? "0.00" ;?></strike>
            </div>
              <span class="price h3 text-warning">
                <span class="currency">$<?php echo $urun['item_price'] ?? "0" ;?></span>

              </span>
            </p> <!-- price-detail-wrap .// -->
            <dl class="item-property">
              <dt>Description</dt>
              <dd>
                DEPOLAMA: 64GB
              </dd>
              <dd>
                RAM: 4GB
              </dd>
            </dl>
            <dl class="param param-feature">
              <dt>Marka</dt>
              <dd><?php echo $urun['item_brand'] ?? "Bilinmiyor" ;?></dd>
            </dl> <!-- item-property-hor .// -->
            <dl class="param param-feature">
              <dt>Renk</dt>
              <dd>Siyah ve Beyaz</dd>
            </dl> <!-- item-property-hor .// -->
            <dl class="param param-feature">
              <dt>Kargo</dt>
              <dd>Rusya, ABD, ve Avrupa</dd>
            </dl> <!-- item-property-hor .// -->

            <hr>
            <div class="row ml-2">
              <div class="col-sm-5">
                <div class="row">
                  <dd> 200+ Stokta</dd>

                </div>
              </div> <!-- col.// -->
              <div class="col-sm-7">
                <dl class="param param-inline">
                  <dt>Renk: </dt>
                  <dd>
                    <label class="form-check form-check-inline">
                      <input class="form-check-input" type="radio" name="inlineRadioOptions"
                             id="inlineRadio2" value="option2">
                      <span class="form-check-label">Mavi</span>
                    </label>
                    <label class="form-check form-check-inline">
                      <input class="form-check-input" type="radio" name="inlineRadioOptions"
                             id="inlineRadio2" value="option2">
                      <span class="form-check-label">Siyah</span>
                    </label>
                    <label class="form-check form-check-inline">
                      <input class="form-check-input" type="radio" name="inlineRadioOptions"
                             id="inlineRadio2" value="option2">
                      <span class="form-check-label">Gri</span>
                    </label>
                  </dd>
                </dl> <!-- item-property .// -->
              </div> <!-- col.// -->
            </div> <!-- row.// -->
            <hr>


            <form method="post" action="<?php echo 'urunler.php?item_id='.$urun_id ?>">
              <input type="hidden" name="item_id" value="<?php echo $urun['item_id'] ?? '1'; ?>">
              <input type="hidden" name="user_id" value="<?php echo 1; ?>">
              <a href="#" class="btn btn-lg btn-primary text-uppercase"> Şimdi Al </a>
              <?php $cartUrunler = $product->veriGetir('cart');
              if(in_array($urun['item_id'], $Cart->getCartId($cartUrunler)?? []))
                   echo '<button class="btn btn-lg btn-outline-primary text-uppercase"><i
                  class="fas fa-shopping-cart"></i>Kartta Mevcut</button>';
              else
                  echo '<button type="submit" name="product-submit" class="btn btn-lg btn-outline-primary text-uppercase"><i
                  class="fas fa-shopping-cart"></i>Karta Ekle</button>';
                ?>

            </form>

          </article> <!-- card-body.// -->
        </aside> <!-- col.// -->

      </div> <!-- row.// -->
    </div> <!-- card.// -->


  </div>
</section>

<?php
   endif;
   endforeach;
?>
