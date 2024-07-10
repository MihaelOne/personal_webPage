$(document).ready(function () {
    $(document).on('click', '.increment-btn', function (e) { 
        e.preventDefault();

        var qty = $(this).closest('.product_data').find('.input-qty').val();
        var value = parseInt(qty, 10);
        value = isNaN(value) ? 0 : value;
        if(value < 10) {
            value++;
            $(this).closest('.product_data').find('.input-qty').val(value);
        } 
        
    });
    $(document).on('click', '.decrement-btn', function (e) { 
        e.preventDefault();
        var qty = $(this).closest('.product_data').find('.input-qty').val();
        var value = parseInt(qty, 10);
        value = isNaN(value) ? 0 : value;
        if(value > 1) {
            value--;
            $(this).closest('.product_data').find('.input-qty').val(value);
        } 
        
    });
    $(document).on('click', '.addToCartbtn', function (e) {
        e.preventDefault();
        var qty = $(this).closest('.product_data').find('.input-qty').val();
        var prod_id = $(this).val();
        console.log(prod_id);
        
        
        $.ajax({
            method: "POST",
            url: "functions/handleCart.php",
            data: {
                prod_qty: qty,
                prod_id: prod_id,
                "scope" : "add"
            },
            
            success: function (response) {
                if(response == 201) {
                    alertify.success("Dodano u košaricu");
                }
                else if(response == "existing") {
                    alertify.success("Proizvod je već u košari");
                }
                else if(response == 401) {
                    alertify.success("Logiraj se za nastavak");
                }
                else if(response == 500) {
                    alertify.success("Nešto nije u redu");
                }
                
            }
        });
    });
    
    $(document).on('click', '.updateQty', function () { 
        var qty = $(this).closest('.product_data').find('.input-qty').val();
        var prod_id = $(this).closest('.product_data').find('.prodID').val();
        console.log(qty);
        $.ajax({
            method: "POST",
            url: "functions/handleCart.php",
            data: {
                prod_qty: qty,
                prod_id: prod_id,
                "scope" : "update"
            },
            success: function (response) {
                if (response == 200) {
                    // Ažuriraj vrijednost u gumbu
                    $(this).closest('.product_data').find('.input-qty').val();
                    console.log(response);
                }
            }
        });
    });
    $(document).on('click', '.deleteFromCart', function (e) { 
        e.preventDefault();
        var cart_id = $(this).val();
        $.ajax({
            method: "POST",
            url: "functions/handleCart.php",
            data: {
                cart_id: cart_id,
                "scope" : "delete"
            },
            success: function (response) {
                if(response == 200) {
                    alertify.success("Proizvod izbrisan iz košare");
                    $('#myCart').load(location.href + " #myCart");
                }
                else {
                    alertify.success(response);
                }
            }
        });
    });
});