<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>
<?php require_once '../classes/Blogclass.php' ; ?>

<?php  

if (isset($_GET['delblog'])){

$blogid = $_GET['delblog'];
$blog = new Blogclass;

$delblog = $blog->delblog($blogid);

}

       


?>



<div class="grid_10">
    <div class="box round first grid">
        <h2>Blog List</h2>
        <div class="block">
		<span style="color: red">
		<?php
		
		if(isset($delproduct)){
			echo $delproduct;
		}

		?>

		</span>
		  
		<table class="data display datatable" id="example">
			<thead>
			
				<tr>
					<th>SL No</th>
					<th>Title</th>
					<th>Description</th>
					<th>Image</th>
                    <th>Type</th>
					<th>Action</th>
				</tr>

			
			</thead>
			<tbody>
			<?php 
			
			$blog = new Blogclass;

			$getblog = $blog->getblog();

			if($getblog){
				$i = 0;
              while($row = mysqli_fetch_array($getblog)){
				 $i++; 
			
			?>
				<tr class="odd gradeX">
					<td><?php echo $i; ?></td>
					<td><?php echo $row['title']; ?></td>
					<td><?php echo substr($row['description'],0,20); ?>...</td>
					<td><img src="upload/<?php echo $row['featureimage']; ?>" height="50px"  width="50px" alt="product Image"></td>
                    <td><?php echo $row['type']; ?></td>
					<td><a href="blogedit.php?blogedit=<?php echo $row['blogid']?>">Edit</a> || <a onclick="return confirm('Are you Sure To Delete')" href="?delblog=<?php echo $row['blogid']; ?>">Delete</a></td>
				</tr>

				<?php 
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
