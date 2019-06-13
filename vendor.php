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

    <script>
        function clicked_button(i) {
    if(i==0){
        document.getElementById("add_form").classList.toggle("disabled");
        // if(add_form){
        //     add_form = false;
        // }else{
        //     add_form = false;
        // }
    }else if(i==1){
        document.getElementById("update_form").classList.toggle("disabled");
    }else{
        document.getElementById("report").classList.toggle("disabled");
    }
}

    </script>
    <?php
            
            session_start();
            if(isset($_SESSION["status"])){ ?>
                <script>
                    alert("<?php echo $_SESSION["status"]; ?>");
                </script>
            <?php 
                unset($_SESSION["status"]);
            }
    ?>
</head>
<body>
    <div class="container">
        <div class = "row">
            <img src="img/tcil.png" class="col-md-2" width="150px" height="150px">
            <h4 class="col-md-4 offset-md-6 align-self-center" style="text-align: right; " > Welcome <?php echo $_SESSION["user"] ?>!</h4>
    </div>
    
    <section class="container" style="margin-top: 24px;">
        <div class="row">
            <button onclick='clicked_button(0)' class="col-md-2 offset-md-1 col-xs-10 offset-xs-1 add-button">Add Vendors</button>
            <button onclick='clicked_button(1)' class="col-md-2 offset-md-2 col-xs-10 offset-xs-1 update-button">Edit/Update</button>
            <button onclick='clicked_button(2)' class="col-md-2 offset-md-2 col-xs-10 offset-xs-1 report-button">Reports</button>
        </div>
    </section>
    <section class="container disabled" id = "add_form">
        <h2>Enter the Vendor's details</h2>
        <hr>
        <div class="row">
            <div class="col-md-6 offset-md-3 box">
            <form class="col-10 offset-1" action="php/add-vendor.php" method="POST">
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
                <form class="col-10 offset-1" action="php/update-vendor.php" method="POST">
                    <div class="row">
                        <p class="col-md-4 input-head">Unique Id</p>    
                        <input class="col-md-6 offset-md-2 align-self-center" type="number" name="id">
                    </div>
                    <div class="row">
                        <p class="col-md-4 input-head">Name</p>    
                        <input class="col-md-6 offset-md-2 align-self-center" type="text" name="name" placeholder="Name">
                    </div>
                    <div class="row">
                        <p class="col-md-4 input-head">Contract Start Date</p>    
                        <input class="col-md-6 offset-md-2 align-self-center" type="date" id="update_start_date" name="start_date" placeholder="Start Date">
                    </div>
                    <div class="row">
                        <p class="col-md-4 input-head">Contract End Date</p>    
                        <input class="col-md-6 offset-md-2 align-self-center" type="date" id="update_end_date" name="end_date" placeholder="End Date">
                    </div>
                    <div class="row">
                        <p class="col-md-4 input-head">Period</p>    
                        <input class="col-md-6 offset-md-2 align-self-center" style="background-color: rgb(200,200,200);" id="update_period" type="text" name="period" readonly="readonly">
                    </div>
                    <div class="row">
                        <input class="col-md-8 offset-md-2" style="margin-top: 16px;" type="submit">
                    </div>
                </form>
                </div>
            </div>
        </section>

            <section class="container"  id="report">
                <h2>Reports</h2>
                <hr>
       <?php
        $con = mysqli_connect("localhost", "root","","cms");
       $query = "SELECT * FROM vendors";

       $result = mysqli_query($con,$query);
       $current_date = date("Y-m-d");
       $current_date = strtotime($current_date);
       ?>
    <div class="table-responsive">
        <table class="table table-bordered table-hover">
                <thead>
                  <tr>
                    <th scope="col">Added By</th>
                    <th scope="col">Vendor Id</th>
                    <th scope="col">Name</th>
                    <th scope="col">Start Date</th>
                    <th scope="col">End Date</th>
                  </tr>
                </thead>
                <tbody>
                <?php  while($rows = mysqli_fetch_assoc($result)){ ?>
                    <tr>
                        <td><?php echo $rows['added_by']; ?> </td>
                        <td><?php echo $rows['id'] ?></td>
                        <td><?php echo $rows['name'] ?></td>
                        <td><?php echo $rows['start_date'] ?></td>
                        <td <?php 
                                    $last_date = $rows['end_date']." 00:00:00";
                                    $last_date = strtotime($last_date);
                                    $diff = $current_date - $last_date;
                                    $diff=$diff/86400;
                                    if($diff<=30){
                                        if($diff<=15){ ?>
                                            style="background-color: red; color: white"
                                        <?php }else{ ?>
                                            style = "background-color:orange; color: white"
                                        <?php } 
                                    } ?>><?php echo $rows['end_date'] ?></td>
                    </tr>
                <?php  } ?>
                </tbody>
              </table>
              </div>

                                </section>

              <script
  src="https://code.jquery.com/jquery-3.4.1.js"
  integrity="sha256-WpOohJOqMqqyKL9FccASB9O0KwACQJpFTUBLTYOVvVU="
  crossorigin="anonymous"></script>
        <script src="js/vendor.js"></script>
</body>
</html>