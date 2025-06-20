<?php include 'inc/header.php';?>
		<?php include 'inc/sidebar.php';?>
		


        <?php 
		
		
		?>


		<!-- Inbox-->
		<div class="grid_10">
		<div class="box round first grid">
		<h2>Inbox</h2>
		<div class="block">        
		<table class="data display datatable" id="example">
		<thead>

		
		<th>Sl No</th>
		
        <th>Date-Time</th>
		<th>Customer Id</th>
		<th>Bkash Number</th>
        <th>Bkash TID</th>
        <th>Sent Amount</th>
        <th>Action</th>
		

		</thead>
		<tbody>
		<?php 

		$order = new Ordermanageclass;

		$getordersession = $order->getordersession();
		if($getordersession){
		$i = 1;


		if(isset($_GET['processing'])){
			$processingid = $_GET['processing'];
			$processing = $order->processing($processingid);

		}
		if(isset($_GET['delivered'])){
			$deliveredid = $_GET['delivered'];
			$delivered = $order->delivered($deliveredid);

		}
		if(isset($_GET['cancel'])){
			$cancelid = $_GET['cancel'];
			$cancel = $order->cancel($cancelid);

		}

		while($fetchorder = mysqli_fetch_array($getordersession)){
		?>

		<tr class="odd gradeX" style="text-align: center;">
		<td><?php echo $i; ?></td>
		
        <td><?php echo $fetchorder['date']; ?></td>
		<td><a href="customerdetails.php?cmrid=<?php echo $fetchorder['cmrid']; ?>">(<?php echo $fetchorder['cmrid']; ?> View customer)</a></td>
        <td><?php echo $fetchorder['bkashno']; ?></td>
        <td><?php echo $fetchorder['bkashtid']; ?></td>
        <td><?php echo $fetchorder['senttk']; ?></td>
        
		<td><a href="orderdetails.php?ordersessionid=<?php echo $fetchorder['ordersessionid']; ?>">View</a>

		<?php if ($fetchorder['status'] == 'pending'){

?> 
<span style="background:#a900ff;padding:5px;color:white"><a href="?processing=<?php echo $fetchorder['ordersessionid'];?>">Panding</a></span>
<?php 
}else if($fetchorder['status'] == 'processing'){
 ?>

<span style="background:orange;padding:5px;color:white"><a href="?delivered=<?php echo $fetchorder['ordersessionid'];?>"> Processing </a></span>
 <?php 
}else if($fetchorder['status'] == 'delivered'){
 ?>

<span style="background:green;padding:5px;color:white"><a href=""> Delivered </a></span>
 <?php 
}
if ($fetchorder['status'] != 'delivered'){

 ?>

<span style="background:red;padding:5px;color:white"><a href="?cancel=<?php echo $fetchorder['ordersessionid'];?>"> Cancel </a></span>
 <?php


}


?> </td>
		</tr>

		<?php
		$i++;
		}
		}
		?>
		</tbody>
		</table>
		</div>
		</div>
		</div>





		




		<script type="text/javascript">
		$(document).ready(function () {
		setupLeftMenu();

		$('.datatable').dataTable();
		setSidebarHeight();
		});
		</script>
		<?php include 'inc/footer.php';?>
