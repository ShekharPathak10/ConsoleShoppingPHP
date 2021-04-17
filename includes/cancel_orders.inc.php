<?php
mysqli_query($link, "SET AUTOCOMMIT = 0");
$select_playstation = "SELECT playstation_id, quantity from playstation_orders_playstation WHERE playstation_orders_id = $playstation_orders_id";
$exec_select_playstation = @mysqli_query($link, $select_playstation);
if(!$exec_select_playstation){
	rollback('Ordered playstation could not be retrieved becase '.mysqli_error($link));
}else{
	while($one_record = mysqli_fetch_assoc($exec_select_playstation)){
		$quantity = $one_record['quantity'];
		$playstation_id = $one_record['playstation_id'];
		$update_playstation = "UPDATE playstation set stock_quantity = (stock_quantity+$quantity) WHERE playstation_id = $playstation_id";
		$exec_update_playstation = @mysqli_query($link, $update_playstation);
		if(!$exec_select_playstation){
			rollback('Update was not successful becase '.mysqli_error($link));
		}
	}
	$delete_order = "DELETE playstation_shipping_addresses.*, playstation_billing_addresses.*, playstation_transactions.* FROM playstation_orders 
	INNER JOIN playstation_billing_addresses USING (playstation_billing_addresses_id)
	INNER JOIN playstation_shipping_addresses USING (playstation_shipping_addresses_id)
	INNER JOIN playstation_transactions USING (playstation_transactions_id)
	WHERE playstation_orders_id = $playstation_orders_id";
	$exec_delete_order = @mysqli_query($link, $delete_order);
	if(!$exec_delete_order){
		rollback('Delete was not successful becase '.mysqli_error($link));
	}else{
		mysqli_query($link, "COMMIT");
		redirect('successfully deleted...', 'view_current_orders.php', 1);
	}	
}
?>