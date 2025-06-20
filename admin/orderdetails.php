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
		<th>Product Id</th>
        <th>Product Name</th>
		<th>Quantity</th>
		<th>Total Price</th>
        <th>Total Weight</th>
        <th>Image</th>
        <th>Action</th>
		

		</thead>
		<tbody>
		<?php 

		$order = new Ordermanageclass;

		if(isset($_GET['ordersessionid'])){
            $id = $_GET['ordersessionid'];
            $getorder = $order->getorder($id);
        }

		if($getorder){
		$i = 1;
		$sum = 0;
		
		while($fetchorder = mysqli_fetch_array($getorder)){
		?>

		<tr class="odd gradeX" style="text-align: center;">
		<td><?php echo $i; ?></td>
		<td><a href="viewproduct.php?proeditid=<?php echo $fetchorder['productid']; ?>"><?php echo $fetchorder['productid']; ?></a></td>
        <td><?php echo $fetchorder['productname']; ?></td>
		<td><?php echo $fetchorder['quantity']; ?></td>
        <td><?php echo $fetchorder['price']; ?></td>
        <td><?php echo $fetchorder['weight']; ?></td>
        <td><img width="100px" src="upload/<?php echo $fetchorder['image']; ?>" alt=""></td>
        
		<td><a href="viewproduct.php?proeditid=<?php echo $fetchorder['productid']; ?>">View Product</a>  </td>
		</tr>

		<div style="background:green;color:white"><?php
		$sum = $sum + $fetchorder['price'];
		
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
