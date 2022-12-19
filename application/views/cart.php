<section class="vh-100" style="background-color: #eee;">
  <div class="container h-100 py-5">
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
                  <form id="order-form">
                  <div class="card rounded-3 mb-4">
                    <div class="card-body p-4">
                      <div class="row d-flex justify-content-between align-items-center">
                        <div class="col-md-2 col-lg-2 col-xl-2">
                          <img src="<?= $row['image']; ?>" class="img-fluid rounded-3" alt="">
                        </div>
                        <div class="col-md-3 col-lg-3 col-xl-3">
                          <input type="hidden" name="product_id[]" id="product_id<?php echo $row['product_id'] ?>" value="<?php echo $row['product_id'] ?>">
                          <strong class="text-uppercase"><?= $row['product_name']; ?></strong>
                            <div class="sizes text-muted">
                                <strong class="text-uppercase">Size :</strong>&nbsp; 
                                <select class="form-select form-select-sm" name="size[]" id="size<?php echo $row['size'] ?>" aria-label="Default select example"> 
                                <?php 
                                    $size = explode(',', $row['size']);
                                  foreach ($size as $value ) {
                                    
                                    ?>
                                    <option value="<?php echo $value; ?>"><?php echo $value; ?></option>
                                  <?php
                                  }
                                
                                ?>
                                </select>
                            </div>
                            <div class="color text-muted mb-2">
                                <strong class="text-uppercase">Color :</strong>&nbsp;
                                <select class="form-select form-select-sm" name="color[]" id="color<?php echo $row['size'] ?>" aria-label="Default select example"> 
                                <?php 
                                    $color = explode(',', $row['color']);
                                    foreach ($color as $value ) {
                                    ?>
                                    <option value="<?php echo $value; ?>"><?php echo $value; ?></option>
                                  <?php
                                  }
                                ?>
                                </select>
                            </div>
                            <strong class="mb-0 text-danger">&#8377; <?= $row['price'] ?></strong>
                          <input type="hidden" name="price[]" id="price<?php echo $row['size'] ?>" value="<?php echo $row['price'] ?>">
                        </div>
                        <div class="col-md-3 col-lg-3 col-xl-2 d-flex">
                          <button type="button" class="btn btn-link px-2"
                            onclick="this.parentNode.querySelector('input[type=number]').stepDown()">
                            <i class="fas fa-minus"></i>
                          </button>

                          <input id="form1" min="0" name="quantity[]" id="quantity<?= $index; ?>" value="1" type="number"
                            class="form-control form-control-sm" />

                          <button type="button" class="btn btn-link px-2"
                            onclick="this.parentNode.querySelector('input[type=number]').stepUp()">
                            <i class="fas fa-plus"></i>
                          </button>
                        </div>
                        <div class="col-md-3 col-lg-2 col-xl-2 offset-lg-1">
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
                    <button type="submit" class="btn btn-warning btn-block btn-lg order_btn">Order to Place</button>
                  </div>
                </div>
                </form>
            <?php
          }
        ?>
      </div>
    </div>
  </div>
</section>