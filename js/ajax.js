$(document).ready(function(){
    let conatiner = $("#display_customers"),
        orders_conatiner = $("#display_orders");

    $("#customerForm").submit(function(e){
        e.preventDefault();
        $.ajax({
            type : "POST",
            url : "./api/create.php",
            data: new FormData(this),
            processData : false,
            contentType : false,
            success: function(res) {
                $("#customerForm")[0].reset();
                if(res) {
                    conatiner.append(res);
                }
            }
        })
    });

    $("body").on("click", ".delete-button", function(e){
        e.preventDefault();
        let id = $(this).attr("data-value"),
        form_id = "#customer_"+id,
        form_container = $(`#${id}`);
        $.ajax({
            type : "POST",
            url : "./api/delete.php",
            data: {
                "id" : id

            },
            success: function(res) {
                if(res == "TRUE") {
                    form_container.fadeOut("fast", function() {
                        $(this).remove();
                    });
                }
            }
        })
    });
    $("body").on("click",".save-button", function(e){
        e.preventDefault();
        let id = $(this).attr("data-val"),
            form_id = ("#customer_"+id),
            form = $(form_id),
            form_0 = $(form_id)[0],
            form_data = new FormData(form_0);
        $.ajax({
            type : "POST",
            url : "./api/update.php",
            processData : false,
            contentType : false,
            data: form_data,
            success: function(res) {
                // $(`#${id}`).replaceWith(res);
                console.log(res);
            }
        })
    });

    //order
    $("#orderForm").submit(function(e){
        e.preventDefault();
        $.ajax({
            type : "POST",
            url : "./api/create_orders.php",
            data: new FormData(this),
            processData : false,
            contentType : false,
            success: function(res) {
                $("#orderForm")[0].reset();
                orders_conatiner.append(res);
            }
        })
    });

    $("body").on("click", ".delete-order", function(e){
        e.preventDefault();
        let id = $(this).attr("data-val"),
        form_id = "#order_"+id,
        form_container = $("#order_item_"+id);
        $.ajax({
            type : "POST",
            url : "./api/delete_orders.php",
            data: {
                "id" : id

            },
            success: function(res) {
                if(res == "TRUE") {
                    form_container.remove();
                }
            }
        })
    });

    $("body").on("click",".update-order", function(e){
        e.preventDefault();
        let id = $(this).attr("data-val"),
            form_id = ("#customer_"+id),
            form = $(form_id),
            form_0 = $(form_id)[0],
            form_data = new FormData(form_0);
        $.ajax({
            type : "POST",
            url : "./api/update_orders.php",
            processData : false,
            contentType : false,
            data: form_data,
            success: function(res) {
                // $(`#${id}`).replaceWith(res);
                console.log(res);
            }
        })
    });

});
