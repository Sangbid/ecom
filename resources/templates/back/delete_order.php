<?php require_once("../../config.php");


if(isset($_GET['id'])) {


$query = query("DELETE FROM list WHERE invoiceID = " . escape_string($_GET['id']) . " ");
confirm($query);


set_message("Order Deleted");
redirect("../../../public/admin/index.php?orders");


} else {

redirect("../../../public/admin/index.php?orders");


}






 ?>