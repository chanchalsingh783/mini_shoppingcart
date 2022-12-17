    
    <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-3.6.2.js"></script>
    <!-- Bootstrap -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script>
        $(document).ready(function() {
            $('.add-to-cart').click(function(){
                var dataId = $(this).attr("data-info"); 
                var data = JSON.parse(dataId);
                $.ajax({ 
                    url: "<?php echo base_url('product/addToCart') ?>",
                    method: "post",
                    dataType: "json",
                    data: data,
                    success:function(data){
                        console.log(data.message);
                        window.location.href= "<?php echo base_url('/Cart') ?>"
                    }
                });
            });

            $('.remove_item').click(function(){
                var id = $(this).attr('id')
                $.ajax({ 
                    url: "<?php echo base_url('product/removeItem') ?>",
                    method: "post",
                    dataType: "json",
                    data: {id},
                    success:function(data){
                        console.log(data.message);
                        window.location.href= "<?php echo base_url('/Cart') ?>"
                    }
                });
            })
        });
    </script>
</body>
</html>