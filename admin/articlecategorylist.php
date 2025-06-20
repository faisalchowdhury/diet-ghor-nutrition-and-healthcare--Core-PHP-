<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>
<div class="grid_10">
    <div class="box round first grid">
        <h2>Article Category List</h2>
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

              $blog = new Blogclass;

              if(isset($_GET['delarticlecat'])){
                  $catid = $_GET['delarticlecat'];
                  $delarticlecat = $blog->delarticlecat($catid);
              }

              $getarticlecategory = $blog->getarticlecategory();
              $i = 1;
              while($fetchcategory = mysqli_fetch_array($getarticlecategory)){
                  ?>

           
       
				<tr class="odd gradeX">
					<td><?php echo $i++; ?></td>
					<td><?php echo $fetchcategory['category']; ?></td>
									
				<td>
					<a href="editarticlecategory.php?editcat=<?php echo $fetchcategory['catid']; ?>">Edit</a> || 
					<a href="?delarticlecat=<?php echo $fetchcategory['catid']; ?>" onclick="return confirm('Are you sure to Delete!');" >Delete</a> 
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
