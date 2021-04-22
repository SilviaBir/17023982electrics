<?php
  //Administration: view all products, add new or edit

  //start session
  session_start();
  //title
  $title = "Manage inventory";
  // The current page.
  $page = "inventory";
?>
<!DOCTYPE html>
<html lang="" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Inventory-Admin - Assessment 2020</title>

    <?php
      // Get the common head elements
      include "../includes/template/head.php";
    ?>
    <!-- css -->
    <link rel="stylesheet" href="../17023982electrics/css/our-furniture.css">
  </head>

  <body class="inventory">
    <?php
      // Get the header
      include "../includes/template/navbar-admin.php";
    ?>
    <!--Title -->
    <div class="container my-auto">
      <div class="row pt-3">
        <div class="col-lg-12 text-center">
          <h4>
            <strong><?php echo $title;?></strong>
          </h4>
          <hr>
        </div>
      </div>
    </div>

    <!--Fast navigation to other pages-->
    <div class="container d-flex col-md-10">
      <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
         <li class="breadcrumb-item"><a href="../admin/administration.php" class="text-success"><strong>Administration</strong></a></li>
         <li class="breadcrumb-item active" aria-current="page"><strong>Inventory</strong></li>
        </ol>
      </nav>
   </div>

  <!--Inventory table -->
  <div class="container">
      <div class="col-md-12">
        <h2 class="text-center">The list of all products</h2>
      </div>
      <div align="right" style="margin-bottom:5px;">
        <button type="button" name="add_button" id="add_button" class="btn btn-success btn-xs">Add</button>
      </div>
      <div class="row">
      <div class="col-md-12">
        <table class="table-responsive table-bordered">
          <thead>
            <tr>
              <th>Product Name</th>
              <th>Product Image</th>
              <th>Product Price</th>
              <th>Product Category</th>
              <th>Product Type</th>
              <th>Alt text</th>
              <th>Edit</th>
              <th>Delete</th>
            </tr>
          </thead>
          <tbody></tbody>
        </table>
      </div>
    </div>
  </div>
  <!-- Form for inserting a new product-->
  <div id="apicrudModal" class="modal fade" role="dialog">
    <div class="modal-dialog">
      <div class="modal-content">
        <form method="post" id="api_crud_form">
          <div class="modal-header">
            <h4 align="left">Add Data</h4>
            <button type="button" class="close" data-dismiss="modal">&times;</button>
          </div>
          <div class="modal-body">
            <div class="form-group">
              <label>Enter Product Name</label>
              <input type="text" name="productName" id="productName" class="form-control" />
            </div>
            <div class="form-group">
              <label>Enter Product Image name</label>
              <input type="text" name="productImg" id="productImg" class="form-control" />
            </div>
            <div class="form-group">
              <label>Enter Product Price</label>
              <input type="text" name="productPrice" id="productPrice" class="form-control" />
            </div>
            <div class="form-group">
              <label>Enter Product Category</label>
              <input type="text" name="productCategory" id="productCategory" class="form-control" />
            </div>
            <div class="form-group">
              <label>Enter Product Type</label>
              <input type="text" name="productType" id="productType" class="form-control" />
            </div>
            <div class="form-group">
              <label>Enter an alternative text for the image</label>
              <input type="text" name="alt_tag" id="alt_tag" class="form-control" />
            </div>
          </div>
          <div class="modal-footer">
            <input type="hidden" name="hidden_id" id="hidden_id" />
            <input type="hidden" name="action" id="action" value="insert" />
            <input type="submit" name="button_action" id="button_action" class="btn btn-info" value="Insert" />
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
          </div>
        </form>
      </div>
     </div>
    </div>

    <?php
      // Get the footer
      include "../includes/template/footer.php";
    ?>
    <script src="js/admin.js"></script>
  </body>
</html>
<!-- javascript for the products form -->
<script type="text/javascript">
$(document).ready(function(){

	fetch_data();

	function fetch_data()
	{
		$.ajax({
			url:"work-inventory/fetch.php",
			success:function(data)
			{
				$('tbody').html(data);
			}
		})
	}

	$('#add_button').click(function(){
		$('#action').val('insert');
		$('#button_action').val('Insert');
		$('.modal-title').text('Add Data');
		$('#apicrudModal').modal('show');
	});

	$('#api_crud_form').on('submit', function(event){
		event.preventDefault();
		if($('#productName').val() == '')
		{
			alert("Enter Product Name");
		}
		else if($('#productImg').val() == '')
		{
			alert("Enter Product Image name");
		}
		else if($('#productPrice').val() == '')
		{
			alert("Enter Product Price");
		}
		else if($('#productCategory').val() == '')
		{
			alert("Enter Product Category");
		}
		else if($('#productType').val() == '')
		{
			alert("Enter Product Type");
		}
		else if($('#alt_tag').val() == '')
		{
			alert("Enter Alternative Text For The Image");
		}
		else
		{
			var form_data = $(this).serialize();
			$.ajax({
				url:"work-inventory/action.php",
				method:"POST",
				data:form_data,
				success:function(data)
				{
					fetch_data();
					$('#api_crud_form')[0].reset();
					$('#apicrudModal').modal('hide');
					if(data == 'insert')
					{
						alert("Data Inserted using PHP API");
					}
					if(data == 'update')
					{
						alert("Data Updated using PHP API");
					}
				}
			});
		}
	});

	$(document).on('click', '.edit', function(){
		var productId = $(this).attr('id');
		var action = 'fetch_single';
		$.ajax({
			url:"work-inventory/action.php",
			method:"POST",
			data:{productId:productId, action:action},
			dataType:"json",
			success:function(data)
			{
				$('#hidden_id').val(productId);
				$('#productName').val(data.productName);
				$('#productImg').val(data.productImg);
				$('#productPrice').val(data.productPrice);
				$('#productCategory').val(data.productCategory);
				$('#productType').val(data.productType);
				$('#alt_tag').val(data.alt_tag);
				$('#action').val('update');
				$('#button_action').val('Update');
				$('.modal-title').text('Edit Data');
				$('#apicrudModal').modal('show');
			}
		})
	});

	$(document).on('click', '.delete', function(){
		var productId = $(this).attr("id");
		var action = 'delete';
		if(confirm("Are you sure you want to remove this data using PHP API?"))
		{
			$.ajax({
				url:"work-inventory/action.php",
				method:"POST",
				data:{productId:productId, action:action},
				success:function(data)
				{
					fetch_data();
					alert("Data Deleted using PHP API");
				}
			});
		}
	});

});
</script>
