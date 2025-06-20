<?php include 'inc/header.php';?>
		<?php include 'inc/sidebar.php';?>
		<?php require_once '../classes/Contactclass.php'; ?>


        <?php 
		if(isset($_GET['seenid'])){
         $contact = new Contactclass;
		 $seenid = $_GET['seenid'];
		 $seencontact =$contact->seencontact($seenid);
		}
		
		?>


		<!-- Inbox-->
		<div class="grid_10">
		<div class="box round first grid">
		<h2>Inbox</h2>
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

		$contact = new Contactclass;

		$getcontact = $contact->getcontact();
		if($getcontact){
		$i = 1;
		while($contactrow = mysqli_fetch_array($getcontact)){
		?>

		<tr class="odd gradeX" style="text-align: center;">
		<td><?php echo $i; ?></td>
		<td><?php echo $contactrow['name']; ?></td>
		<td><?php echo $contactrow['email']; ?></td>
		<td><a href="viewmessage.php?viewid=<?php echo $contactrow['contactid']; ?>">View</a> || <a href="?seenid=<?php echo $contactrow['contactid']; ?>">Send To Seen Box</a></td>
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





		<!-- Seen Message-->
		<div class="grid_10">
		<div class="box round first grid">
		<h2>Seen Box</h2>
		<div class="block">        
		<table class="data display datatable" id="example">
		<thead>
	<tr>
	<th>Serial No.</th>
		<th>Name</th>
		<th>Email</th>
		<th>Action</th>
	</tr>
		</thead>
		<tbody style="text-align: center !important;">
		<?php 

		$contact = new Contactclass;

		$getseen = $contact->getseen();
		if($getseen){
		$i = 1;
		while($seenrow = mysqli_fetch_array($getseen)){
		?>

		<tr class="odd gradeX " >
		<td><?php echo $i; ?></td>
		<td><?php echo $seenrow['name']; ?></td>
		<td><?php echo $seenrow['email']; ?></td>
		<td><a href="viewmessage.php?viewid=<?php echo $seenrow['contactid']; ?>">View</a>  
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
