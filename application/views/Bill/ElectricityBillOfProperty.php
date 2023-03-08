<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.84.0">
    <title>Sidebars · Bootstrap v5.0</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/5.0/examples/sidebars/">

    

    <!-- Bootstrap core CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <style>
        main{
            display:flex;
            width:100%;
            height:100%;
        }
      .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        user-select: none;
      }

      @media (min-width: 768px) {
        .bd-placeholder-img-lg {
          font-size: 3.5rem;
        }
      }
    
    .homediv{
        width:75%;
        height:100%;
        margin:3%;    
    }
    </style>

    
    <!-- Custom styles for this template -->
    <link href="<?php echo base_url('css/sidebar.css') ?>" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css" rel="stylesheet">
  </head>
  <body>

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
      <!-- <li>
        <a href="#" class="nav-link text-white">Electricity Bill</a>
      </li>
      <li>
        <a href="<?php echo base_url('Bill/WaterBill') ?>" class="nav-link text-white">Water & Other Bills</a>
      </li> -->
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
                    <div style="font-style:italic; font-size: 20px; color:red; font-size: 25px;" ><b>Electricity Bill</b>                    
                    </div>
                    <hr>
                    <div style="display:flex; justify-content:center;">
                    <form action="<?php echo base_url("Bill/getElectricityBill"); ?>" method="get">
                    <input type="hidden" name="property_id" value="<?php echo $property_id; ?>">
                    <input
                        id="month"
                        type="month"
                        name="month"
                        min="2000-01"
                        max="<?php echo date("Y-m"); ?>"
                        value="<?php echo $month; ?>"
                        style="height:100%;margin-right:10px;"
                        required
                        />
                    <input type="submit" value="Submit" class="btn btn-primary">
                    </form>
                    </div>
                    <br>
                    <div class="row">
                    <table class="table table-striped table-hover table-bordered" style="width:90%" align="center">
                        <thead class="thead-dark">
                            <tr>
                            <th scope="col" style="text-align:center;">S.No.</th>
                            <th scope="col" style="text-align:center;">Property</th>
                            <th scope="col" style="text-align:center;">Month</th>
                            <th scope="col" style="text-align:center;">Amount</th>
                            <th scope="col" style="text-align:center;">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                            <th scope="row" style="text-align:center;">1</th>
                            <td style="text-align:center;"><?php echo $property_name; ?></td>
                            <td style="text-align:center;"><?php echo $month_name; ?></td>
                            <td style="text-align:center;"><?php echo $electricity_charges; ?></td>
                            <td align="center"><?php if(!empty($electricity_charges)){?>
                              <a href="<?php echo base_url("Bill/addElectricityBill/").$property_id."/".$month; ?>" class="btn btn-warning">Edit Amount</a>
                            <?php }else{?>
                              <a href="<?php echo base_url("Bill/addElectricityBill/").$property_id."/".$month; ?>" class="btn btn-primary">Add Amount</a>
                            <?php } ?></td>
                            </tr>   
                        </tbody>
                        </table>
                    </div>

                    
                </div>
            </div>      			
        </div>
    </div>
</div>
  </div>
</main>
<script>
    $("#datepicker").datepicker( {
    format: "mm-yyyy",
    startView: "months", 
    minViewMode: "months"
});
</script>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>

      <script src="<?php echo base_url('js/sidebars.js') ?>"></script>
  </body>
</html>
 