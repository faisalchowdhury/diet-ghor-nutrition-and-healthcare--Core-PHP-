<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>
<div class="grid_10">
    <div class="box round first grid">
        <h2>Product Category List</h2>
        <div class="block">  
            <table class="data display datatable" id="example">
			<thead>
				<tr>
					<th>No.</th>
					<th>Product Category Name</th>
					<th>Action</th>
				</tr>
			</thead>
			<tbody>
              <?php

              $product = new Productclass;

              if(isset($_GET['delproductcat'])){
                  $catid = $_GET['delproductcat'];
                  $delproductcat = $product->delproductcat($catid);
              }

              $getproductcategory = $product->getproductcategory();
              $i = 1;
              while($fetchcategory = mysqli_fetch_array($getproductcategory)){
                  ?>

           
       
				<tr class="odd gradeX">
					<td><?php echo $i++; ?></td>
					<td><?php echo $fetchcategory['category']; ?></td>
									
				<td>
					<a href="editproductcategory.php?editcat=<?php echo $fetchcategory['catid']; ?>">Edit</a> || 
					<a href="?delproductcat=<?php echo $fetchcategory['catid']; ?>" onclick="return confirm('Are you sure to Delete!');" >Delete</a> 
				</td>
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
