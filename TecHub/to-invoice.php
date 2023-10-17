<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    
    <title>Document</title>
</head>
<body>
    <div class="container">
        <div class="row my-4">
            <div class="col">
                <div class="card shadow">
                    <div class="card-header">
                        <h4>Invoice</h4>
                    </div>
                    <div class="card-body p-4">
                        <div id="show_alert"></div>
                        <form action="#" method="post" id="add_form">
                            <div class="show_item" id="show_item">
                                <div class="row">                                    
                                    <div class="col-2 mb-3">
                                        <input type="text" name="Item_Service[]" class="form-control" placeholder="Item/Service" required>
                                    </div>
                                    <div class="col-3 mb-3">
                                        <input type="text" name="Inv_des[]" class="form-control" placeholder="Description" required>
                                    </div>
                                    <div class="col-1 mb-3">
                                        <input type="text" name="Qty[]" class="form-control" placeholder="Qnty" required>
                                    </div>
                                    <div class="col-2 mb-3">
                                        <input type="text" name="Price[]" class="form-control" placeholder="Price" required>
                                    </div>
                                    <div class="col-2 mb-3">
                                        <input type="text" name="Amountt[]" class="form-control" placeholder="Amount" required>
                                    </div>
                                    <div class="col-2 mb-3 d-grid ">
                                        <button type="button" class="btn btn-success add_item">Add More</button>
                                    </div>
                                </div>
                            </div>
                            <input type="submit" value="Add" class="btn btn-warning w-25" id="addBtn">
                            <a href="inv_pdf.php" class="btn btn-danger w-25" target="_blank">Invoice pdf</a>
                        </form>
                    </div>

                </div>
            </div>
        </div>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script>
        $(document).ready(function(e){   /* waits for the document to be fully loaded.  */
            $(".add_item").click(function(e){
                e.preventDefault();
                $("#show_item").append(`
                    <div class="row append_item">
                        <div class="col-2 mb-3">
                            <input type="text" name="Item_Service[]" class="form-control" placeholder="Item/Service" required>
                        </div>
                        <div class="col-3 mb-3">
                            <input type="text" name="Inv_des[]" class="form-control" placeholder="Description" required>
                        </div>
                        <div class="col-1 mb-3">
                            <input type="text" name="Qty[]" class="form-control" placeholder="Qnty" required>
                        </div>
                        <div class="col-2 mb-3">
                            <input type="text" name="Price[]" class="form-control" placeholder="Price" required>
                        </div>
                        <div class="col-2 mb-3">
                            <input type="text" name="Amountt[]" class="form-control" placeholder="Amount" required>
                        </div>
                        <div class="col-2 mb-3 d-grid">
                            <button class="btn btn-danger remove_item">Remove</button>
                        </div>
                    </div>
                `);
            })
            $(document).on('click', '.remove_item', function(e){    /* a CSS selector that targets elements with the class remove_item */
                e.preventDefault();
                let row_item = $(this).parent().parent();  //go to the parent classes
                $(row_item).remove();
            })
            //ajax request to insert all form data
            $("#add_form").submit(function(e){
                e.preventDefault();
                $("#addBtn").val("Adding...");
                $.ajax({
                    url: 'inv_action.php',
                    method: 'post',
                    //data: $(this).serialize(),
                    data: new FormData(this),   // Use FormData to handle arrays
                    processData: false,
                    contentType: false,
                    success: function(response){
                        $("#addBtn").val('Add');
                        $("#add_form")[0].reset();
                        $(".append_item").remove();
                        $("#show_alert").html(`<div class="alert alert-success" role="alert">${response}</div>`);
                    }
                })
            })
        });
    </script>
</body>
</html>