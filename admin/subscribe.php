<?php include 'inc/header.php';?>
		<?php include 'inc/sidebar.php';?>
		<?php require_once '../classes/Contactclass.php'; ?>
        


        <?php 
	
		
		?>


		<!-- Subscriber-->
		<div class="grid_10">
		<div class="box round first grid">
		<h2>Subscriber</h2>
		<div class="block">        
		<table class="data display datatable" id="example">
		<thead>

		
		<th>Serial No.</th>
		<th>Email</th>
		<th>Action</th>
		

		</thead>
		<tbody>
		<?php 

		$general = new Generalclass;
        if(isset($_GET['deletesub'])){
			$subid = $_GET['deletesub'];
			$delsubscriber = $general->delsubscriber($subid); 
		}
		$subscriber = $general->subscriber();
		if($subscriber){
		$i = 1;
		while($fetchsubscriber = mysqli_fetch_array($subscriber)){
		?>

		<tr class="odd gradeX" style="text-align: center;">
		<td><?php echo $i; ?></td>
		<td><?php echo $fetchsubscriber['email']; ?></td>
		<td><a onclick="return confirm('Are you sure to Delete!');" href="?deletesub=<?php echo $fetchsubscriber['subscriberid']; ?>">Delete</a></td>
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
