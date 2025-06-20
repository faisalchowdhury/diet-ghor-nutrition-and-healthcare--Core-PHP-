
<?php include 'inc/header.php';?>
		<?php include 'inc/sidebar.php';?>
		


        <?php 
	  
		?>

        <!--Active Trainer-->

        <div class="grid_10">
		<div class="box round first grid">
		<h2>Active Trainer</h2>
		<div class="block">        
		<table class="data display datatable" id="example">
		<thead>

		
		<th>Serial No.</th>
		<th>Name</th>
		<th>Email</th>
		<th>Action</th>
		

		</thead>
		<tbody>
		<?php 
	    $trainer = new Trainerclass;
		if(isset($_GET['delid'])){
            $delid = $_GET['delid'];
            $deletereq = $trainer->deletereq($delid);  
            }
        
       
		$activetrainer = $trainer->activetrainer();
		if($activetrainer){
		$i = 1;
		while($fetchactive = mysqli_fetch_array($activetrainer)){
		?>

		<tr class="odd gradeX" style="text-align: center;">
		<td><?php echo $i; ?></td>
		<td><?php echo $fetchactive['fname'].' '.$fetchactive['lname']; ?></td>
		<td><?php echo $fetchactive['email']; ?></td>
		<td><a class="btn btn-info" href="viewprofile.php?trainerid=<?php echo $fetchactive['trainerid']; ?>">View</a>|| <a class="btn btn-danger" href="?delid=<?php echo $fetchactive['trainerid']; ?>">Delete</a></td> 
        
       
        <?php
		$i++;
        }
        }
        
        ?>
        
       

		<?php
		
		
		
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
