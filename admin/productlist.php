<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>

<?php 
 $product = new Productclass;

if(isset($_GET['delproid'])){
    $proid = $_GET['delproid'];
	$delproduct = $product->delproduct($proid);
}

?>



<div class="grid_10">
    <div class="box round first grid">
        <h2>Post List</h2>
        <div class="block">  
            <table class="data display datatable" id="example">
			<thead>
				<tr>
					<th>Product Name</th>
					<th>Category Name</th>
					<th>Brand Name</th>
					<th>Description</th>
					<th>Price</th>
					<th>Image</th>
					<th>Weight</th>
					<th>Action</th>
				</tr>
			</thead>
			<tbody>

			<?php 
			
		   

			$getproduct = $product->getproduct();

		

				while($fetchproduct = mysqli_fetch_array($getproduct)){

            ?>
				<tr class="odd gradeX">
					<td><?php echo $fetchproduct['productname']; ?></td>
					<td><?php echo $fetchproduct['category']; ?></td>
					<td><?php echo $fetchproduct['brandname']; ?></td>
					<td><?php echo substr($fetchproduct['description'],0,25); ?>..</td>
					<td><?php echo $fetchproduct['price']; ?></td>
					<td class=""><img style='width: 80px;
					height: 60px;' src="upload/<?php echo $fetchproduct['image']; ?>" alt=""> </td>
					<td><?php echo $fetchproduct['weight']; ?></td>
					<td><a href="productedit.php?proeditid=<?php echo $fetchproduct['productid'];?>">Edit</a> || <a href="?delproid=<?php echo $fetchproduct['productid'];?>" onclick="return confirm('Are you sure to Delete!');">Delete</a></td>
				</tr>


			<?php

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
