<section id="cart" class="py-3">
  <div class="container-fluid w-75">
    <h5 class="font-baloo font-size-20">Shopping Cart</h5>

    <div class="row">
      <div class="col-sm-9">
        <div class="row border-top py-3 mt-3">
          <div class="col-sm-7 text-center mx-auto py-2">
            <img src="./assets/bos_kart.png" alt="Empty Cart" class="img-fluid">
            <p class="font-baloo font-size-16 text-black-50">Empty Cart</p>
          </div>
        </div>
      </div>

      <div class="col-sm-3">
        <div class="sub-total text-center mt-2 bg-light">
          <h6 class="font-size-12 font-raleway text-success py-3"><i class="fas fa-check"></i> Free shipping</h6>
          <div class="border-top py-4">
            <h5 class="font-baloo font-size-20">Subtotal (<?php echo $ogesayisi; ?> item)&nbsp;
              <span class="text-danger">$<span class="text-danger" id="deal-price">
                  <?php  if(isset($aratoplam)) {
                    echo $Cart->toplamHesap($aratoplam);
                  }
                  else
                    echo 0;
                  ?></span></span></h5>
            <button type="submit" class="btn btn-warning mt-3">Proceed to Buy</button>
          </div>
        </div>
      </div>
    </div>

  </div>
</section>