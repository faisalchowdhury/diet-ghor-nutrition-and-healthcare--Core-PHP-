<?php include 'inc/header.php';?>
		<?php include 'inc/sidebar.php';?>
		


        <?php 
	    
		
		?>


		
		<div class="grid_10">
		<div class="box round first grid">
		<h2>Trainer Request</h2>
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

        if(isset($_GET['confirmid'])){
        $confirmid = $_GET['confirmid'];
        $confirmreq = $trainer->confirmreq($confirmid);  
        }
        if(isset($_GET['delid'])){
            $delid = $_GET['delid'];
            $deletereq = $trainer->deletereq($delid);  
            }

		$tainerreq = $trainer->tainerreq();
		if($tainerreq){
		$i = 1;
		while($fetchreq = mysqli_fetch_array($tainerreq)){
		?>

		<tr class="odd gradeX" style="text-align: center;">
		<td><?php echo $i; ?></td>
		<td><?php echo $fetchreq['fname'].' '.$fetchreq['lname']; ?></td>
		<td><?php echo $fetchreq['email']; ?></td>
		<td><a class="btn btn-info" href="viewprofile.php?trainerid=<?php echo $fetchreq['trainerid']; ?>">View</a> 
        
        <?php 
        
        if($fetchreq['status'] != 'confirm'){
        ?>
         ||<a class="btn btn-success" href="?confirmid=<?php echo $fetchreq['trainerid']; ?>">Confirm</a> 
         <?php 
        
        if($fetchreq['status'] != 'delete'){
        ?>
         || <a class="btn btn-danger" href="?delid=<?php echo $fetchreq['trainerid']; ?>">Delete</a></td>
		</tr>

        <?php
        }
        }
        
        ?>
        
       

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
