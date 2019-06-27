<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Vendors</title>
      
    <link href="https://fonts.googleapis.com/css?family=Roboto&display=swap" rel="stylesheet">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" type="text/css" rel="stylesheet">
    <link href="css/login.css" type="text/css" rel="stylesheet">
    <link href="css/vendor.css" type="text/css" rel="stylesheet"> 

    
    <?php
            
            session_start();
            if(isset($_SESSION["status"])){ ?>
                <script>
                    alert("<?php echo $_SESSION["status"]; ?>");
                </script>
            <?php 
                unset($_SESSION["status"]);
            }
            if(!isset($_SESSION["login_status"])){
                header("Location: login_form.php");
            } ?>
               
</head>
<body>
    <div class="container">
        <div class = "row">
            <img src="img/tcil.png" class="col-md-2" width="150px" height="150px">
            <h1 class="col-md-5 offset-1 col-10 align-self-center" style="text-align: center;">Contract Management System</h1>
            <div class="col-md-4 align-self-center" style="text-align: right; ">
                <h4> Welcome <?php echo $_SESSION["user"] ?>!</h4>
                <a href="php/sign_out.php">Sign Out</a>
    </div>
    
    <section class="container" style="margin-top: 24px;">
        <div class="row">
            <button onclick='clicked_button(0)' class="col-md-2 offset-md-1 col-xs-10 offset-xs-1 add-button">Add Vendors</button>
            <button onclick='clicked_button(1)' class="col-md-2 offset-md-2 col-xs-10 offset-xs-1 update-button">Edit/Update</button>
            <button onclick='clicked_button(2)' class="col-md-2 offset-md-2 col-xs-10 offset-xs-1 report-button">Reports</button>
        </div>
    </section>
    <section class="container" id = "add_form">
        <h2>Enter the Vendor's details</h2>
        <hr>
        <div class="row">
            <div class="col-md-6 offset-md-3 box">
            <div class="col-10 offset-1">
                <div class="row">
                    <p class="col-md-4 input-head">Add Details for: </p>    
                    <select class="col-md-6 offset-md-2 align-self-center" id="add-select">
                        <option value="client" selected="selected">Client</option>
                        <option value="vendor">Vendor</option>
                    </select> 
                </div>
            </div>
            <form class="col-10 offset-1" action = "php/add-client.php" method="POST">
                <div class="row">
                    <p class="col-md-4 input-head">Unique Id</p>    
                    <input class="col-md-6 offset-md-2 align-self-center" style="background-color: rgb(200,200,200);" type="number" name="id" id="id" readonly="readonly" >
                </div>
                <div class="row">
                    <p class="col-md-4 input-head">Name</p>    
                    <input class="col-md-6 offset-md-2 align-self-center" type="text" name="name" placeholder="Name">
                </div>
                <div class="row">
                    <p class="col-md-4 input-head">Contract Start Date</p>    
                    <input class="col-md-6 offset-md-2 align-self-center" type="date" id="add_start_date" name="start_date" >
                </div>
                <div class="row">
                    <p class="col-md-4 input-head">Contract End Date</p>    
                    <input class="col-md-6 offset-md-2 align-self-center" type="date" id="add_end_date" name="end_date" placeholder="End Date">
                </div>
                <div class="row">
                    <p class="col-md-4 input-head">Period</p>    
                    <input class="col-md-6 offset-md-2 align-self-center" style="background-color: rgb(200,200,200);" type="text" id="add_period" name="period" readonly="readonly">
                </div>
                <div id="client-info">
                    <div class="row">
                        <p class="col-md-4 input-head">Work Order No.</p>    
                        <input class="col-md-6 offset-md-2 align-self-center" type="number" name="work-no">
                    </div>
                    <div class="row">
                        <p class="col-md-4 input-head">Date</p>    
                        <input class="col-md-6 offset-md-2 align-self-center" type="date" name="client-date">
                    </div>
                </div>
                <div id="vendor-info" style="display: none;">
                    <h4>Bank Guarantee</h4>
                    <div class="row">
                        <p class="col-md-4 input-head">BG No.</p>    
                        <input class="col-md-6 offset-md-2 align-self-center" disabled type="number" name="bg-no">
                    </div>
                    <div class="row">
                        <p class="col-md-4 input-head">BG Amount</p>    
                        <input class="col-md-6 offset-md-2 align-self-center" disabled type="number" name="bg-amount">
                    </div>
                    <div class="row">
                        <p class="col-md-4 input-head">BG Date</p>    
                        <input class="col-md-6 offset-md-2 align-self-center" disabled type="date" name="bg-date">
                    </div>
                    <div class="row">
                        <p class="col-md-4 input-head">BG Expiry Date</p>    
                        <input class="col-md-6 offset-md-2 align-self-center" disabled type="date" name="bg-expiry">
                    </div>
                </div>
                
                <div class="row">
                    <input class="col-md-8 offset-md-2" style="margin-top: 16px;" type="submit">
                </div>
                
            </form>
            </div>
        </div>
    </section>

    <section class="container disabled" id="update_form">
            <h2>Edit/Update the Vendor's details</h2>
            <hr>
            <div class="row">
                <div class="col-md-6 offset-md-3 box">
                <form class="col-10 offset-1" action = <?php if(isset($_SESSION["info_found"])){ echo "php/update-vendor.php"; }else{ echo "php/search_id.php";} ?> method ="POST">
                <?php if(!isset($_SESSION["info_found"])){?>
                    <div class="row">
                        <p class="col-md-4 input-head">Unique Id</p>    
                        <input class="col-md-6 offset-md-2 col-10 align-self-center" type="number" name="id" id="update_id">
                    </div>
                    <button type = "submit" id="search_id" class="col-10 offset-1 align-self-center add-button"onclick="search_id()">Search</button>
                    <?php }?>
                    <?php 
                    if(isset($_SESSION["info_found"])){
                        
                        if($_SESSION["info_found"]=== "Not Found"){ ?>
                            <button id="search_id" class="col-10 offset-1 align-self-center add-button"onclick="search_id()">Search</button>
                            <p style="color: red; text-align: center">Not Found</p>

                        <?php }else{ ?>
                        <div class="row">
                            <p class="col-md-4 input-head">Unique Id</p>    
                            <input class="col-md-6 offset-md-2 col-10 align-self-center" type="number" name="id" id="update_id" placeholder= <?php echo $_SESSION['id'] ?> value= <?php echo $_SESSION['id'] ?> readonly="readonly">
                        </div>
                        <div class="row">
                            <p class="col-md-4 input-head">Added By</p>    
                            <input class="col-md-6 offset-md-2 col-10 align-self-center" type="number" id="update_id" placeholder= <?php echo $_SESSION['added_by'] ?> value= <?php echo $_SESSION['added_by'] ?> disabled>
                        </div>
                        <div class="row">
                            <p class="col-md-4 input-head">Name</p>    
                            <input class="col-md-6 offset-md-2 align-self-center" type="text" name="name" placeholder=<?php echo $_SESSION["name"] ?> value=<?php echo $_SESSION["name"] ?> >
                        </div>
                        <div class="row">
                            <p class="col-md-4 input-head">Contract Start Date</p>    
                            <input class="col-md-6 offset-md-2 align-self-center" type="date" id="update_start_date" name="start_date" placeholder=<?php echo $_SESSION["start_date"] ?> value=<?php echo $_SESSION["start_date"] ?>>
                        </div>
                        <div class="row">
                            <p class="col-md-4 input-head">Contract End Date</p>    
                            <input class="col-md-6 offset-md-2 align-self-center" type="date" id="update_end_date" name="end_date" placeholder=<?php echo $_SESSION["end_date"]; ?> value=<?php echo $_SESSION["end_date"]; ?>>
                        </div>
                        <!-- <div class="row">
                            <p class="col-md-4 input-head">Period</p>    
                            <input class="col-md-6 offset-md-2 align-self-center" style="background-color: rgb(200,200,200);" id="update_period" type="text" name="period" readonly="readonly">
                        </div> -->
                        <div class="row">
                            <input class="col-md-8 offset-md-2" style="margin-top: 16px;" type="submit">
                        </div>
                    <?php unset($_SESSION["info_found"]); }} ?>
                        </div>
                </div>
            </div>
        </section>

<section class="container"  id="report">
    <h2>Reports</h2>
    <hr>
       <?php
        $con = mysqli_connect("localhost", "root","","cms");
       $query1 = "SELECT * FROM vendors JOIN employees
         ON vendors.added_by = employees.username";

       $result1 = mysqli_query($con,$query1);

       $query2 = "SELECT * FROM clients JOIN employees
         ON clients.added_by = employees.username";

       $result2 = mysqli_query($con,$query2);
       if($result2 === false){
           echo mysqli_error($con);
       }
       $current_date = date("Y-m-d");
       $current_date = strtotime($current_date);
       ?>
    <h4>Vendors</h4>
    <div class="table-responsive">
        <table class="table table-bordered table-hover">
                <thead>
                  <tr>
                    <th scope="col">Added By</th>
                    <th scope="col">Vendor Id</th>
                    <th scope="col">Name</th>
                    <th scope="col">Start Date</th>
                    <th scope="col">End Date</th>
                    <th scope="col">BG No.</th>
                    <th scope="col">BG Amount</th>
                    <th scope="col">BG Date</th>
                    <th scope="col">BG Expiry Date</th>
                  </tr>
                </thead>
                <tbody>
                <?php  while($rows = mysqli_fetch_assoc($result1)){ ?>
                    <tr>
                        <td><?php echo $rows['emp_name']; ?> </td>
                        <td><?php echo $rows['id'] ?></td>
                        <td><?php echo $rows['name'] ?></td>
                        <td><?php echo $rows['start_date'] ?></td>
                        <td <?php 
                                    $last_date = $rows['end_date']." 00:00:00";
                                    $last_date = strtotime($last_date);
                                    $diff =  $last_date - $current_date;
                                    $diff=$diff/86400;
                                    if($diff<=30 && $diff >=0){
                                        if($diff<=15){ ?>
                                            style="background-color: red; color: white"
                                        <?php }else{ ?>
                                            style = "background-color:orange; color: white"
                                        <?php } 
                                    }if($diff < 0){ ?>
                                        style="background-color: grey; color: white"
                                    <?php } ?>><?php echo $rows['end_date'] ?></td>
                        <td><?php echo $rows['bg_no']; ?> </td>
                        <td><?php echo $rows['bg_amount']; ?> </td>
                        <td><?php echo $rows['bg_date']; ?> </td>
                        <td><?php echo $rows['bg_expiry']; ?> </td>
                    </tr>
                <?php  } ?>
                </tbody>
              </table>
              </div>
    <h4>Clients</h4>
    <div class="table-responsive">
        <table class="table table-bordered table-hover">
                <thead>
                  <tr>
                    <th scope="col">Added By</th>
                    <th scope="col">Vendor Id</th>
                    <th scope="col">Name</th>
                    <th scope="col">Start Date</th>
                    <th scope="col">End Date</th>
                    <th scope="col">Work No.</th>
                    <th scope="col">Date</th>
                  </tr>
                </thead>
                <tbody>
                <?php  while($rows = mysqli_fetch_assoc($result2)){ ?>
                    <tr>
                        <td><?php echo $rows['emp_name']; ?> </td>
                        <td><?php echo $rows['id'] ?></td>
                        <td><?php echo $rows['name'] ?></td>
                        <td><?php echo $rows['start_date'] ?></td>
                        <td <?php 
                                    $last_date = $rows['end_date']." 00:00:00";
                                    $last_date = strtotime($last_date);
                                    $diff = $last_date - $current_date;
                                    $diff=$diff/86400;
                                    if($diff<=30 && $diff >=0){
                                        if($diff<=15){ ?>
                                            style="background-color: red; color: white"
                                        <?php }else{ ?>
                                            style = "background-color:orange; color: white"
                                        <?php } 
                                    }if($diff < 0){ ?>
                                        style="background-color: grey; color: white"
                                    <?php } ?>><?php echo $rows['end_date'] ?></td>
                        <td><?php echo $rows['work_no']; ?> </td>
                        <td><?php echo $rows['client_date']; ?> </td>
                    </tr>
                <?php  } ?>
                </tbody>
              </table>
              </div>

</section>



              <script src="https://code.jquery.com/jquery-3.4.1.js" integrity="sha256-WpOohJOqMqqyKL9FccASB9O0KwACQJpFTUBLTYOVvVU=" crossorigin="anonymous"></script>
<script src="js/vendor.js"></script>

</body>
</html>