<?php
  if($_SERVER['REQUEST_METHOD'] == 'POST'){
    if(isset($_POST['delete-cart-submit'])){
      $silinen = $Cart->deleteFromCard($_POST['item_id']);
    }
  }

  $deger = 0;
?>


<section id="cart2">
  <div class="container-fluid bg-light font-rubik">
    <div class="row">
      <div class="col-md-10 col-11 mx-auto">
        <div class="row mt-5 gx-3">
          <!-- left side div -->
          <div class="col-md-12 col-lg-8 col-11 mx-auto main_cart mb-lg-0 mb-5 shadow">
            <h2 class="py-4 font-weight-bold">Cart (<?php echo count($product->veriGetir("cart")); ?> items)</h2>
            <?php
            foreach ($product->veriGetir("cart") as $urun):
              $kart = $product->urunGetir($urun['item_id']);
              $aratoplam[] = array_map(function ($urun){

                ?>


            <div class="card p-4">

              <div class="row">
                <!-- cart images div -->
                <div
                  class="col-md-5 col-11 mx-auto bg-light d-flex justify-content-center align-items-center shadow product_img">
                  <a href="<?php echo 'urunler.php?item_id='.$urun['item_id']; ?>">
                    <img src="<?php echo $urun['item_image']?? "./assets/products/2.png";?>" class="img-fluid" alt="cart img">
                  </a>

                </div>
                <!-- cart product details -->
                <div class="col-md-7 col-11 mx-auto px-4 mt-2">
                  <div class="row">
                    <!-- product name  -->
                    <div class="col-6 card-title">
                      <h1 class="mb-4 product_name" style="font-size: 22px;"><?php echo $urun['item_name'] ?? "Bilinmiyor"; ?></h1>
                      <p class="mb-3">RENK: MAVI</p>
                      <p class="mb-3">DEPOLAMA: 64GB</p>
                      <p class="mb-3">RAM: 4GB</p>
                    </div>
                    <!-- quantity inc dec -->
                    <div class="col-12 qty">
                      <ul class="pagination justify-content-end set_quantity">
                        <li class="page-item">
                          <button class="page-link qty-down" data-id="<?php echo $urun['item_id'] ?? 0; ?>">
                            <i class="fas fa-minus"></i> </button>
                        </li>
                        <li class="page-item"><input type="text" name="" class="page-link qty_input" data-id="<?php echo $urun['item_id'] ?? 0;?>"
                                                     value="1" placeholder="1" id="textbox<?php echo $urun['item_id']; ?>">

                        </li>
                        <li class="page-item">
                          <button class="page-link qty-up" data-id="<?php echo $urun['item_id'] ?? 0; ?>">
                            <i class="fas fa-plus"></i></button>
                        </li>
                      </ul>
                    </div>
                  </div>
                  <!-- //remover move and price -->
                  <div class="row mt-5">
                    <div class="col-8 d-flex justify-content-between remove_wish">
                      <form method="post">
                        <input type="hidden" value="<?php echo $urun['item_id'] ?? 0;?>" name="item_id">
                        <button type="submit" name="delete-cart-submit" class="btn font-baloo text-danger px-3 border-right">Sil</button>
                        <button type="button" class="btn font-baloo text-danger px-3">Sonra Kaydet</button>
                      </form>

                    </div>
                    <div class="col-4 d-flex justify-content-end price_money">
                      <h3>$<span data-id="<?php echo $urun['item_id'] ?? 0;?>" id="itemval<?php echo $urun['item_id']; ?>"  class="product_price"><?php echo $urun['item_price']?? "0";?></span>
                    </div>
                  </div>
                </div>
              </div>

            </div>
            <hr />

            <?php
            return $urun['item_price'];
            },$kart);
            endforeach;

            ?>


          </div>

          <!-- right side div -->
          <div class="col-md-12 col-lg-4 col-11 mx-auto mt-lg-0 mt-md-5">
            <div class="right_side p-3 shadow bg-white">
              <h2 class="product_name mb-5">Toplam Tutar</h2>
              <div class="price_indiv sub-total d-flex justify-content-between">
                <p>Urun Tutarı</p>
                <p>$
                  <span id="deal-price">
                  <?php  if(isset($aratoplam)) {
                    echo $Cart->toplamHesap($aratoplam);
                  }
                  else
                    echo 0;
                  ?>
                  </span>
                </p>
              </div>
              <div class="price_indiv d-flex justify-content-between">
                <p>Kargo Tutarı</p>
                <p>$<span id="shipping_charge">5.0</span></p>
              </div>
              <hr />
              <div class="total-amt d-flex justify-content-between font-weight-bold">
                <p>Toplam Tutar(Kargo Dahil)</p>
                <p>$<span id="total_cart_amt"> <?php  if(isset($aratoplam)) {
                      echo $Cart->toplamHesap($aratoplam);
                    }
                    else
                      echo 0;
                    ?></span></p>
              </div>
              <button class="btn btn-primary text-uppercase">Satın Al</button>
            </div>

          </div>
        </div>
      </div>

    </div>

  </div>

</section>