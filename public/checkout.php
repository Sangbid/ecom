<?php require_once("../resources/config.php"); ?>
<?php include(TEMPLATE_FRONT . DS . "header.php");


if(isset($_POST['submit']))
{
	
	$p=$_SESSION['item_total'];
	$q=$_SESSION['item_quantity'] ;
	$sl=mysqli_query($connection,"insert into list (item_total,item_qty) values('$p','$q')");

}


 ?>



 <!-- Page Content -->
    <div class="container">


<!-- /.row --> 

<div class="row">
      <h4 class="text-center bg-danger"><?php display_message(); ?></h4>
      <h1>Checkout</h1>

<form action="" method="post">
<input type="hidden" name="cmd" value="_cart">
<input type="hidden" name="business" value="edwindiaz123-facilitator@gmail.com">
<input type="hidden" name="currency_code" value="US">
    <table class="table table-striped">
        <thead>
          <tr>
           <th>Product</th>
           <th>Price</th>
           <th>Quantity</th>
           <th>Sub-total</th>
     
          </tr>
        </thead>
        <tbody>


          <?php cart(); ?>



        </tbody>
    </table>


    <input type="submit" name="submit">

		</form>
	</div>


<div class="panel-body">
							<form method='get' action='invoice-db.php'>
								<div class="form-group">
									<label for="pp">
								Invoice ID
							</label><br>
			<select name='id' class="form_control">
				
				<option value="">Invoice ID</option>
				<?php
					//show invoices list as options
					$query = mysqli_query($connection,"select max(invoiceID) from list");
					while($invoice = mysqli_fetch_array($query)){
						echo "<option value='".$invoice['max(invoiceID)']."'>".$invoice['max(invoiceID)']."</option>";
					}
				?>
			</select>
		</div>
			<button type="submit" name="submit" class="btn btn-o btn-primary">
															Bill Copy
														</button>
		</form>
	</div>



<!--  ***********CART TOTALS*************-->
            
<div class="col-xs-4 pull-right ">
<h2>Cart Totals</h2>

<table class="table table-bordered" cellspacing="0">

<tr class="cart-subtotal">
<th>Items:</th>
<td><span class="amount"><?php 
echo isset($_SESSION['item_quantity']) ? $_SESSION['item_quantity'] : $_SESSION['item_quantity'] = "0";?></span></td>
</tr>
<tr class="shipping">
<th>Shipping and Handling</th>
<td>Free Shipping</td>
</tr>

<tr class="order-total">
<th>Order Total</th>
<td><strong><span class="amount">&#36;<?php 
echo isset($_SESSION['item_total']) ? $_SESSION['item_total'] : $_SESSION['item_total'] = "0";?>



</span></strong> </td>
</tr>


</tbody>

</table>

</div><!-- CART TOTALS-->


 </div><!--Main Content-->


    </div>
    <!-- /.container -->



<?php include(TEMPLATE_FRONT . DS . "footer.php") ?>
