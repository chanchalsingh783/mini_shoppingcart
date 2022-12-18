    
    <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-3.6.2.js"></script>
    <!-- Bootstrap -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script>
        $(document).ready(function() {
            $('.add-to-cart').click(function(){
                var dataId = $(this).attr("data-info"); 
                var data = JSON.parse(dataId);
                console.log(dataId);
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
            });

            $(document).on('submit', '#order-form', function(event){
                event.preventDefault();
                var form_data = $(this).serialize();
                console.log(form_data);
                $.ajax({
                    url:"<?php echo base_url('product/orderPlace') ?>",
                    method:"POST",
                    data:form_data,
                    dataType: "json",
                    success:function(data)
                    { 
                        if (data.status) {
                            window.location.href = '<?php echo base_url('product/thankyou'); ?>/'+data.orderId
                        }else{
                            alert('Something went wrong')
                        }
                    }
                });
            });
        });
    </script>
</body>
</html>