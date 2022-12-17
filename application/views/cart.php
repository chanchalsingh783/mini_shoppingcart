<section class="h-100" style="background-color: #eee;">
  <div class="container h-100 py-5 mt-5">
    <div class="row d-flex justify-content-center align-items-center h-100">
      <div class="col-10">

        <div class="text-center mb-4">
            <h4 class="text-center mb-3"><strong>Shopping Cart</strong></h4>
        </div>
        <?php
          if ($this->session->userdata('cartItem')) {
            if(count($this->session->userdata('cartItem')) > 0) {
              $index = 0;
              foreach ($this->session->userdata('cartItem') as $row) {
                
                ?>
                  <div class="card rounded-3 mb-4">
                    <div class="card-body p-4">
                      <div class="row d-flex justify-content-between align-items-center">
                        <div class="col-md-2 col-lg-2 col-xl-2">
                          <img
                            src="<?= $row['image']; ?>"
                            class="img-fluid rounded-3" alt="Cotton T-shirt">
                        </div>
                        <div class="col-md-3 col-lg-3 col-xl-3">
                          <p class="lead fw-normal mb-2"><?= $row['product_name']; ?></p>
                          <!-- <p><span class="text-muted">Size: </span>M <span class="text-muted">Color: </span></p> -->
                        </div>
                        <div class="col-md-3 col-lg-3 col-xl-2 d-flex">
                          <button class="btn btn-link px-2"
                            onclick="this.parentNode.querySelector('input[type=number]').stepDown()">
                            <i class="fas fa-minus"></i>
                          </button>

                          <input id="form1" min="0" name="quantity" value="2" type="number"
                            class="form-control form-control-sm" />

                          <button class="btn btn-link px-2"
                            onclick="this.parentNode.querySelector('input[type=number]').stepUp()">
                            <i class="fas fa-plus"></i>
                          </button>
                        </div>
                        <div class="col-md-3 col-lg-2 col-xl-2 offset-lg-1">
                          <h5 class="mb-0">$499.00</h5>
                        </div>
                        <div class="col-md-1 col-lg-1 col-xl-1 text-end">
                          <a href="#!" class="text-danger remove_item" id="<?= $index; ?>" ><i class="fas fa-trash fa-lg"></i></a>
                        </div>
                      </div>
                    </div>
                  </div>
                <?php
                $index++;
              }
            }
            ?>
            <div class="card">
              <div class="card-body">
                <button type="button" class="btn btn-warning btn-block btn-lg">Proceed to Pay</button>
              </div>
            </div>
            <?php
          }
        ?>
      </div>
    </div>
  </div>
</section>