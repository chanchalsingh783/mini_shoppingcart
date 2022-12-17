<section class="vh-100 pt-5">
  <div class="container py-5">
    <h4 class="text-center mb-5"><strong>Add Product</strong></h4>
      <div class="container">
        <?php if($this->session->flashdata('error')) {
            echo $this->session->flashdata('error') ;
            }
        ?>
        <?php if($this->session->flashdata('success')) {
            echo $this->session->flashdata('success') ;
            }
        ?>
        <div class="card-body shadow" style="background-color: #eee;">
            <form action="<?= base_url('product/addproduct'); ?>" method="post" enctype="multipart/form-data">
                <div class="row mb-3">
                    <label for="product_name" class="col-sm-2 col-form-label">Product Name</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="product_name" name="product_name">
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="description" class="col-sm-2 col-form-label">Product Description</label>
                    <div class="col-sm-10">
                        <textarea class="form-control" id="description" rows="3" name="description"></textarea>
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="product_image" class="col-sm-2 col-form-label">Product Image</label>
                    <div class="col-sm-10">
                        <input type="text" name="product_image" id="product_image" class="form-control" palceholder="">
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="product_price" class="col-sm-2 col-form-label">Product Price</label>
                    <div class="col-sm-10">
                        <input type="text" name="product_price" id="product_price" class="form-control">
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="product_color" class="col-sm-2 col-form-label">Product color</label>
                    <div class="col-sm-10">
                        <input type="text" name="product_color" id="product_color" class="form-control">
                        <small class="form-text text-muted">Enter Multiple color with comma sepreator.</small>
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="product_size" class="col-sm-2 col-form-label">Product Size</label>
                    <div class="col-sm-10">
                        <input type="text" name="product_size" id="product_size" class="form-control">
                        <small class="form-text text-muted">Enter Multiple size with comma sepreator.</small>
                    </div>
                </div>
                
                <div class="row mb-5">
                    <label for="product_quantity" class="col-sm-2 col-form-label">Product Quantity</label>
                    <div class="col-sm-10">
                        <input type="text" name="product_quantity" id="product_quantity" class="form-control">
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-sm-12 text-center">
                        <button type="submit" class="btn btn-primary">Add Product</button>
                    </div>
                </div>
            </form>
        </div>
      </div>
  </div>
</section>