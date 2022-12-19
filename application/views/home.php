<!-- section -->
<section style="background-color: #eee;">
  <div class="container py-5">
    <h4 class="text-center mt-5 mb-5"><strong>Product listing</strong></h4>     
      <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
        <?php
          if(count($products) > 0) {
            foreach ($products as $row) {
              ?>
                <div class="col col-md-3">
                  <div class="card">
                    <img src="<?= $row->image ?>" class="card-img-top" alt="<?= $row->product_name ?>">
                    <div class="card-body">
                      <strong class="card-title text-capitalize"><?= $row->product_name ?></strong><br>
                      <small class="card-text text-capitalize text-muted"><?= $row->description ?></small><br>
                      <strong class="card-text text-capitalize">&#8377; <?= $row->price ?></strong><br>
                      <button type="button" data-info='<?php echo json_encode($row) ?>' class="btn btn-sm btn-primary add-to-cart">Add To Cart</button>
                    </div>
                  </div>
                </div>
              <?php
            }
          }
        ?>
      </div>
  </div>
</section>