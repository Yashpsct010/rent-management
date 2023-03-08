<?php 
// foreach($tenants as $t){
// 	echo $t['name'];
// 	echo "<br>";
// }
// die();
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.84.0">
	<title></title>
	<link rel="canonical" href="https://getbootstrap.com/docs/5.0/examples/sidebars/">

<!-- Bootstrap core CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <style>
	 main{
		display:flex;
		width:100%;
		height:100%;
	}
	.homediv{
	width:75%;
	height:100%;
	margin:3%;    
    }
	td{
		vertical-align: middle !important;
	}
	td p{
		margin: unset
	}
	img{
		max-width:100px;
		max-height: :150px;
	}
	.card{
		margin-left: 15px;
		margin-right: 15px;
	}
	#overlay {
  position: fixed;
  display: none;
  width: 100%;
  height: 100%;
  top: 0;
  left: 0;
  right: 0;
  bottom: 0;
  background-color: rgba(0,0,0,0.5);
  z-index: 2;
  cursor: pointer;
}
#text{
  position: absolute;
  top: 50%;
  left: 50%;
  height:70vh;
  width:40vw;
  border-radius:10px;
  /* font-size: 50px; */
  background-color: white;
  transform: translate(-50%,-50%);
  -ms-transform: translate(-50%,-50%);
  display:flex;
  justify-content:center;
  align-items:center;
}
form{
	width:80%;
}
#name{
	width:70%;
	height:5vh;
}
</style>

    <!-- Custom styles for this template -->
    <link href="<?php echo base_url('css/sidebar.css') ?>" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css" rel="stylesheet">
</head>
<body>
<div id="overlay">
  <div id="text">
  <form action="<?php echo base_url('Payments/add_new_entry'); ?>" method="POST">
  <div class="form-group" style="font-size:20px;font-weight:bold;">New Invoice</div>
  <hr>
    <div class="form-group">
    <label for="name"><b>Full Name<span style="color:red;">*</span> : </b></label>&emsp;
    <select name="tenant_id" id="name">
		<option value="">Select tenant for payment</option>
		<?php foreach($tenants as $t){ ?>
			<option value="<?php echo $t['id']; ?>"><?php echo $t['name']; ?></option>
		<?php } ?>
	</select>
     </div>
	 <br>
    <!-- <div class="form-group">
    <label for="name"><b>Month<span style="color:red;">*</span> : </b></label>&emsp;
    <input id="month" type="month" name="month" min="2000-01" max="<?php echo date("Y-m"); ?>" value="<?php echo date("Y-m"); ?>" required />
     </div>
	 <br> -->
     <div class="form-group">
    <label for="invoice"><b>Invoice :</b></label>
    <input type="text" class="form-control" id="invoice" name="invoice"  placeholder="Enter invoice number">
     </div>
 	 <br>
    <div class="form-group">
    <label for="amount"><b>Amount Paid<span style="color:red;">*</span> :</b></label>
    <input type="number" class="form-control" id="amount" name="amount"  placeholder="Enter amount" required>
    </div>
  <br>
  <button type="submit" class="btn btn-primary">Submit</button>&emsp;
  <button class="btn btn-danger"  onclick="off()">Cancel</button>
</form>
  </div>
</div>
	<main>

	<div class="d-flex flex-column flex-shrink-0 p-3 text-white bg-dark" style="width: 280px;height:100vh;">
    <div class="dropdown">
      <a href="#" class="d-flex align-items-center text-white text-decoration-none dropdown-toggle" id="dropdownUser1" data-bs-toggle="dropdown" aria-expanded="false" style="margin: 0% 5%;">
        <strong><?php echo $_SESSION['user']; ?></strong>
      </a>
      <ul class="dropdown-menu dropdown-menu-dark text-small shadow" aria-labelledby="dropdownUser1">
        <li><a class="dropdown-item" href="#">Sign out</a></li>
      </ul>
    </div>
    <hr>
    <ul class="nav nav-pills flex-column mb-auto">
      <li class="nav-item">
        <a href="<?php echo base_url('Home') ?>" class="nav-link text-white" aria-current="page">Home</a>
      </li>
      <li>
        <a href="<?php echo base_url('Payments') ?>" class="nav-link text-white">Payments</a>
      </li>
      <li>
        <a href="#" class="nav-link text-white">Report</a>
      </li>
    </ul>
    <hr>
  </div>

<div class="homediv">
  <div class="containe-fluid">
	<div class="row mt-3 ml-3 mr-3">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">

						<b style="font-style:italic; font-size: 20px;">List of Payments</b>&emsp;

						<span>
							<!-- <a class="btn btn-primary btn-block btn-sm col-sm-2 float-right" href="<?php echo base_url("Payments/new_entry") ?>">
							<i class="fa fa-plus"></i> New Entry </a> -->
							<button class="btn btn-primary"  onclick="on()">New Entry</button>
						</span>
					</div>
					<div class="card-body" style="height:70vh; overflow-x: hidden; overflow-y: auto;">
						<table class="table table-condensed table-bordered table-hover">
							<thead>
								<tr>
									<th class="text-center">S.No</th>
									<th class="">Date</th>
									<th class="">Tenant</th>
									<th class="">Invoice</th>
									<th class="">Amount</th>
									<th class="text-center">Action</th>
								</tr>
							</thead>
							<tbody>
								
									<?php $i=1; foreach ($payment_details as $row) { ?>
										

										<tr>
									<td class="text-center"><?php echo $i++ ?></td>
									<td>
										<?php echo date('M d, Y',strtotime($row['date_created'])) ?>
									</td>
									<td class="">
										 <p> <b><?php echo ucwords($row['name']) ?></b></p>
									</td>
									<td class="">
										 <p> <b><?php echo ucwords($row['invoice']) ?></b></p>
									</td>
									<td class="text-right">
										 <p> <b><?php echo number_format($row['amount'],2) ?></b></p>
									</td>
									<td class="text-center">
										<button class="btn btn-sm btn-outline-primary edit_invoice" type="button" id="<?php echo $row['id'] ?>" >Edit</button>
										<button class="btn btn-sm btn-outline-danger delete_invoice" type="button" id="<?php echo $row['id'] ?>">Delete</button>
									</td>
								</tr>
								<?php	} ?>
								
								
							</tbody>
						</table>
					</div>
				</div>
			</div>
			<!-- Table Panel -->
		</div>
	</div>	

</div>


	</main>

	<script>
	$(document).ready(function(){
		$('table').dataTable()
	})
	
	$('#new_invoice').click(function(){
		uni_modal("New invoice","manage_payment.php","mid-large")
		
	})
	$('.edit_invoice').click(function(){
		uni_modal("Manage invoice Details","manage_payment.php?id="+$(this).attr('data-id'),"mid-large")
		
	})
	$('.delete_invoice').click(function(){
		_conf("Are you sure to delete this invoice?","delete_invoice",[$(this).attr('data-id')])
	})
	
	function delete_invoice($id){
		start_load()
		$.ajax({
			url:'ajax.php?action=delete_payment',
			method:'POST',
			data:{id:$id},
			success:function(resp){
				if(resp==1){
					alert_toast("Data successfully deleted",'success')
					setTimeout(function(){
						location.reload()
					},1500)

				}
			}
		})
	}

	function on() {
  document.getElementById("overlay").style.display = "block";
}

function off() {
  document.getElementById("overlay").style.display = "none";
}
</script>
</body>
</html>