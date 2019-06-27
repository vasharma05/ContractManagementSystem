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
                    promt("<?php echo $_SESSION["status"]; ?>");
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
                    <p class="col-md-4 input-head">Unique ID</p>    
                    <input class="col-md-6 offset-md-2 align-self-center" style="background-color: rgb(200,200,200);" type="number" name="id" id="id"  >
                </div>
                <div class="row">
                    <p class="col-md-4 input-head">Name</p>    
                    <input class="col-md-6 offset-md-2 align-self-center" type="text" name="name" placeholder="Name">
                </div>
                <div class="row">
                    <p class="col-md-4 input-head">Project Name</p>    
                    <input class="col-md-6 offset-md-2 align-self-center" type="text" name="project_name" placeholder="Project Name">
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
                    <input class="col-md-6 offset-md-2 align-self-center"  type="text" id="add_period" readonly="readonly">
                </div>
                <div id="vendor-info" style="display: none;">
                    <div class="row">
                        <p class="col-md-4 input-head">Client ID</p>    
                        <input class="col-md-6 offset-md-2 align-self-center" type="number" name="client_id" id="client-id">
                    </div>
                </div>
                <div id="client-info">
                    <div class="row">
                        <p class="col-md-4 input-head">Vendor ID</p>    
                        <input class="col-md-6 offset-md-2 align-self-center" type="number" name="vendor_id" id="vendor-id">
                    </div>
                    <div class="row">
                        <p class="col-md-4 input-head">Work Order No.</p>    
                        <input class="col-md-6 offset-md-2 align-self-center" type="number" name="work-no">
                    </div>
                    <div class="row">
                        <p class="col-md-4 input-head">Date</p>    
                        <input class="col-md-6 offset-md-2 align-self-center" type="date" name="client-date">
                    </div>
                </div>
                <h4>Bank Guarantee</h4>
                <div class="row">
                    <p class="col-md-4 input-head">BG No.</p>    
                    <input class="col-md-6 offset-md-2 align-self-center" type="number" name="bg-no" placeholder="BG NO.">
                </div>
                <div class="row">
                    <p class="col-md-4 input-head">Confirmation from Bank</p>    
                    <select class="col-md-6 offset-md-2 align-self-center" name="confirm" id="confirmation">
                        <option value="No" selected="selected">No</option>
                        <option value="Yes">Yes</option>
                    </select>
                </div>
                <div id="if_confirm" style="display: none;" class="row">
                    <p class="col-md-4 input-head">Date</p>    
                    <input class="col-md-6 offset-md-2 align-self-center" type="date" name="confirm_date" placeholder="Confirmation Date">
                </div>
                <div class="row">
                    <p class="col-md-4 input-head">BG Amount</p>    
                    <input class="col-md-6 offset-md-2 align-self-center" type="number" name="bg-amount"  placeholder="BG Amount">
                </div>
                <div class="row">
                    <p class="col-md-4 input-head">BG Date</p>    
                    <input class="col-md-6 offset-md-2 align-self-center" type="date" name="bg-date" placeholder="BG Date">
                </div>
                <div class="row">
                    <p class="col-md-4 input-head">BG Expiry Date</p>    
                    <input class="col-md-6 offset-md-2 align-self-center" type="date" name="bg-expiry" placeholder="BG Expiry Date">
                </div>
                <div class="row">
                    <p class="col-md-4 input-head">Remarks</p>    
                    <input class="col-md-6 offset-md-2 align-self-center" style="height: 72px" type="text" name="remarks" placeholder="Remarks">
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
                        <p class="col-md-4 input-head">Add Details for: </p>    
                        <select class="col-md-6 offset-md-2 align-self-center" id="edit-select" name="option">
                            <option value="client" selected="selected">Client</option>
                            <option value="vendor">Vendor</option>
                        </select> 
                    </div>
                    <div class="row">
                        <p class="col-md-4 input-head">Unique Id</p>    
                        <input class="col-md-6 offset-md-2 col-10 align-self-center" type="number" name="id" id="update_id">
                    </div>
                    <button type = "submit" id="search_id" class="col-10 offset-1 align-self-center add-button">Search</button>
                    <?php }?>
                    <?php 
                    if(isset($_SESSION["info_found"])){
                        
                        if($_SESSION["info_found"]=== "Not Found"){ ?>
                            <div class="row">
                                <p class="col-md-4 input-head">Add Details for: </p>    
                                <select class="col-md-6 offset-md-2 align-self-center" id="edit-select" name="option">
                                    <option value="client" selected="selected">Client</option>
                                    <option value="vendor">Vendor</option>
                                </select> 
                            </div>
                            <div class="row">
                                <p class="col-md-4 input-head">Unique Id</p>    
                                <input class="col-md-6 offset-md-2 col-10 align-self-center" type="number" name="id" id="update_id">
                            </div>
                            <button id="search_id" class="col-10 offset-1 align-self-center add-button">Search</button>
                            <p style="color: red; text-align: center">Not Found</p>

                        <?php }else{ ?>
                        <div class="row">
                            <p class="col-md-4 input-head">Unique Id</p>    
                            <input class="col-md-6 offset-md-2 col-10 align-self-center" type="number" name="id" id="update_id" placeholder= <?php echo $_SESSION['result']['id'] ?> value= <?php echo $_SESSION['result']['id'] ?> readonly="readonly">
                        </div>
                        <div class="row">
                            <p class="col-md-4 input-head">Added By</p>    
                            <input class="col-md-6 offset-md-2 col-10 align-self-center" type="number" id="update_id" placeholder= <?php echo $_SESSION['result']['added_by'] ?> value= <?php echo $_SESSION['result']['added_by'] ?> disabled>
                        </div>
                        <div class="row">
                            <p class="col-md-4 input-head">Name</p>    
                            <input class="col-md-6 offset-md-2 align-self-center" type="text" name="name" placeholder=<?php echo $_SESSION['result']["name"] ?> value=<?php echo $_SESSION['result']["name"] ?> >
                        </div>
                        <div class="row">
                            <p class="col-md-4 input-head">Project Name</p>    
                            <input class="col-md-6 offset-md-2 align-self-center" type="text" name="project_name" placeholder=<?php echo $_SESSION['result']["project_name"] ?> value=<?php echo $_SESSION['result']["project_name"] ?> >
                        </div>
                        <div class="row">
                            <p class="col-md-4 input-head">Contract Start Date</p>    
                            <input class="col-md-6 offset-md-2 align-self-center" type="date" id="update_start_date" name="start_date" placeholder=<?php echo $_SESSION['result']["start_date"] ?> value=<?php echo $_SESSION['result']["start_date"] ?>>
                        </div>
                        <div class="row">
                            <p class="col-md-4 input-head">Contract End Date</p>    
                            <input class="col-md-6 offset-md-2 align-self-center" type="date" id="update_end_date" name="end_date" placeholder=<?php echo $_SESSION['result']["end_date"]; ?> value=<?php echo $_SESSION['result']["end_date"]; ?>>
                        </div>
                        <?php 
                            if($_SESSION["option"]==="client"){ ?>
                                <div class="row">
                                    <p class="col-md-4 input-head">Work Order No.</p>    
                                    <input class="col-md-6 offset-md-2 align-self-center" type="number"  name="work-no" placeholder=<?php echo $_SESSION['result']["work_no"] ?> value=<?php echo $_SESSION['result']["work_no"] ?>>
                                </div>
                                 <div class="row">
                                    <p class="col-md-4 input-head">Date</p>    
                                    <input class="col-md-6 offset-md-2 align-self-center" type="date"  name="client-date" placeholder=<?php echo $_SESSION['result']["client_date"]; ?> value=<?php echo $_SESSION['result']["client_date"]; ?>>
                                </div>
                            <?php } ?>
                        <div class="row">
                            <p class="col-md-4 input-head">BG NO.</p>    
                            <input class="col-md-6 offset-md-2 col-10 align-self-center" type="number" name="bg-no" placeholder= <?php echo $_SESSION['result']['bg_no'] ?> value= <?php echo $_SESSION['result']['bg_no'] ?>>
                        </div>
                        <div class="row">
                            <p class="col-md-4 input-head">BG Amount</p>    
                            <input class="col-md-6 offset-md-2 col-10 align-self-center" type="number" name="bg-amount" placeholder= <?php echo $_SESSION['result']['bg_amount'] ?> value= <?php echo $_SESSION['result']['bg_amount'] ?> >
                        </div>
                        <div class="row">
                            <p class="col-md-4 input-head">BG Date</p>    
                            <input class="col-md-6 offset-md-2 col-10 align-self-center" type="date" name="bg-date" placeholder= <?php echo $_SESSION['result']['bg_date'] ?> value= <?php echo $_SESSION['result']['bg_date'] ?> >
                        </div>
                        <div class="row">
                            <p class="col-md-4 input-head">BG Expiry Date</p>    
                            <input class="col-md-6 offset-md-2 col-10 align-self-center" type="date" name="bg-expiry" placeholder= <?php echo $_SESSION['result']['bg_expiry'] ?> value= <?php echo $_SESSION['result']['bg_expiry'] ?> >
                        </div>
                        <div class="row">
                            <p class="col-md-4 input-head">BG Amount</p>    
                            <input style="height: auto;" class="col-md-6 offset-md-2 col-10 align-self-center" type="text" name="Remarks" placeholder= <?php echo $_SESSION['result']['remarks'] ?> value= <?php echo $_SESSION['result']['remarks'] ?> >
                        </div>
                        <div class="row">
                            <input class="col-md-8 offset-md-2" style="margin-top: 16px;" placeholder="Update" type="submit">
                        </div>
                        <?php }unset($_SESSION["info_found"]); } ?>
                        </div>
                </div>
            </div>
        </section>

<section class="container"  id="report">
    <h2>Reports</h2>
    <hr>
       <?php
        $con = mysqli_connect("localhost", "root","","cms");
        $query1 = "SELECT * FROM vendors, employees, bg_info
            WHERE vendors.added_by = employees.username AND vendors.id = bg_info.id";

        $result1 = mysqli_query($con,$query1);

        $query2 = "SELECT * FROM clients, employees, bg_info 
            WHERE clients.added_by = employees.username AND clients.id = bg_info.id";

        $result2 = mysqli_query($con,$query2);

       if($result1 === false){
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
                    <th scope="col">Project Name</th>
                    <th scope="col">Start Date</th>
                    <th scope="col">End Date</th>
                    <th scope="col">BG No.</th>
                    <th scope="col">BG Amount</th>
                    <th scope="col">BG Date</th>
                    <th scope="col">BG Expiry Date</th>
                    <th scope="col">Confirmation</th>
                    <th scope="col">Confirmation Date</th>
                    <th scope="col">Remarks</th>
                  </tr>
                </thead>
                <tbody>
                <?php  while($rows = mysqli_fetch_assoc($result1)){ ?>
                    <tr>
                        <td><?php echo $rows['emp_name']; ?> </td>
                        <td><?php echo $rows['id'] ?></td>
                        <td><?php echo $rows['name'] ?></td>
                        <td><?php echo $rows['project_name'] ?></td>
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
                        <td><?php echo $rows['confirmation']; ?> </td>
                        <td><?php echo $rows['confirm_date']; ?> </td>
                        <td><?php echo $rows['remarks']; ?> </td>
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
                    <th scope="col">Client Id</th>
                    <th scope="col">Name</th>
                    <th scope="col">Project Name</th>
                    <th scope="col">Start Date</th>
                    <th scope="col">End Date</th>
                    <th scope="col">Work No.</th>
                    <th scope="col">Date</th>
                    <th scope="col">BG No.</th>
                    <th scope="col">BG Amount</th>
                    <th scope="col">BG Date</th>
                    <th scope="col">BG Expiry Date</th>
                    <th scope="col">Confirmation</th>
                    <th scope="col">Confirmation Date</th>  
                    <th scope="col">Remarks</th>
                  </tr>
                </thead>
                <tbody>
                <?php  while($rows = mysqli_fetch_assoc($result2)){ ?>
                    <tr>
                        <td><?php echo $rows['emp_name']; ?> </td>
                        <td><?php echo $rows['id'] ?></td>
                        <td><?php echo $rows['name'] ?></td>
                        <td><?php echo $rows['project_name'] ?></td>
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
                        <td><?php echo $rows['bg_no']; ?> </td>
                        <td><?php echo $rows['bg_amount']; ?> </td>
                        <td><?php echo $rows['bg_date']; ?> </td>
                        <td><?php echo $rows['bg_expiry']; ?> </td>
                        <td><?php echo $rows['confirmation']; ?> </td>
                        <td><?php echo $rows['confirm_date']; ?> </td>
                        <td><?php echo $rows['remarks']; ?> </td>
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