<?php include "connection.php" ?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta http-equiv="x-ua-compatible" content="ie=edge" />
    <title>Material Design for Bootstrap</title>
    <!-- MDB icon -->
    <link rel="icon" href="img/mdb-favicon.ico" type="image/x-icon" />
    <!-- Font Awesome -->
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css"
    />
    <!-- Google Fonts Roboto -->
    <link
      rel="stylesheet"
      href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700;900&display=swap"
    />
    <!-- MDB -->
    <link rel="stylesheet" href="css/mdb.min.css" />
  </head>
  <body style="background-color: #f2f2f2 ;">
    <!-- Start your project here-->
    <div class="container">
      
      <div class="d-flex justify-content-center align-items-center " style="height: 100vh">
      
      <div class=" card  ">
        <div class="text-center  m-5">
          <!-- Pills navs -->
          <ul class="nav nav-pills nav-justified mb-3" id="ex1" role="tablist">
            <li class="nav-item" role="presentation">
              <a class="nav-link active" id="tab-login" data-mdb-toggle="pill" href="#pills-login" role="tab"
                aria-controls="pills-login" aria-selected="true">Login</a>
            </li>
            <li class="nav-item" role="presentation">
              <a class="nav-link" id="tab-register" data-mdb-toggle="pill" href="#pills-register" role="tab"
                aria-controls="pills-register" aria-selected="false">Register</a>
            </li>
          </ul>
          <!-- Pills navs -->

          <!-- Pills content -->
          <div class="tab-content">
            <div class="tab-pane fade show active" id="pills-login" role="tabpanel" aria-labelledby="tab-login">
              <form action="" name="form1" method="POST">
              

                <!-- Email input -->
                <div class="form-outline mb-4">
                  <input type="text" name="npm" class="form-control" />
                  <label class="form-label" for="loginName">NPM</label>
                </div>

                <!-- Password input -->
                <div class="form-outline mb-4">
                  <input type="password" name="password" class="form-control" />
                  <label class="form-label" for="loginPassword">Password</label>
                </div>

                <!-- 2 column grid layout -->
                <div class="row mb-4">
                  <div class="col-md-6 d-flex justify-content-center">
                    <!-- Checkbox -->
                    
                  </div>
                </div>
                <!-- Submit button -->
                <button type="submit" name="login" class="btn btn-primary btn-block mb-4">Sign in</button>
                <div class="alert alert-danger alert-size" id="failure" style="margin-top: 10px; display:none">
                <strong>Invalid </strong>username or password
                </div>
              </form>
              
            </div>
               
            <?php 
              if(isset($_POST["login"])){
                  $count=0;
                  $res = mysqli_query($conn, "SELECT * FROM user  WHERE npm='$_POST[npm]' && password='$_POST[password]' ");

                  $count=mysqli_num_rows($res);

                  if($count==0){
                      ?>
                      <script type="text/javascript">
                        document.getElementById("failure").style.display="block"; 
                      </script>
                      <?php
                  }else{
                      ?>
                      <script type="text/javascript">
                          window.location="index.php";
                      </script>
                      <?php
                  }
              }
            ?>

            <!-- register --> 
            <div class="tab-pane fade" id="pills-register" role="tabpanel" aria-labelledby="tab-register">
              <form>
                
                <!-- Name input -->
                <div class="form-outline mb-4">
                  <input type="text" name="namamhs" class="form-control" />
                  <label class="form-label" for="registerName">Nama Mahasiswa</label>
                </div>

                <!-- Username input -->
                <div class="form-outline mb-4">
                  <input type="text" name="npm1" class="form-control" />
                  <label class="form-label" for="registerUsername">NPM</label>
                </div>

                <!-- Email input -->
                <div class="form-outline mb-4">
                  <input type="email" name="email" class="form-control" />
                  <label class="form-label" for="registerEmail">Email</label>
                </div>
                <div class="form-outline mb-4">
                  <input type="text" name="jurusan" class="form-control" />
                  <label class="form-label" for="registerEmail">Jurusan</label>
                </div>

                <!-- Password input -->
                <div class="form-outline mb-4">
                  <input type="password" name="passwordmhs" class="form-control" />
                  <label class="form-label" for="registerPassword">Password</label>
                </div>

                
                

                <!-- Checkbox -->
                <div class="form-check d-flex justify-content-center mb-4">
                  <input class="form-check-input me-2" type="checkbox" value="" id="registerCheck" checked
                    aria-describedby="registerCheckHelpText" />
                  <label class="form-check-label" for="registerCheck">
                    I have read and agree to the terms
                  </label>
                </div>

                <!-- Submit button -->
                <button type="submit" name="submit1" class="btn btn-primary btn-block mb-3">Sign in</button>
              </form>
              <div class="alert alert-danger alert-size" id="error" style="margin-top: 10px; display:none">
              <strong>Invalid </strong>NPM is already axist!!
              </div>
              <div class="alert alert-succes alert-size" id="success" style="margin-top: 10px; display:none">
              <strong>GOOD JOB </strong>You has resgitered!!
              </div>
            </div>
          </div>
          <!-- Pills content -->
             
          <?php 
    if(isset($_POST["submit1"])){
        $count=0;
        $res=mysqli_query($conn, "SELECT * FROM user WHERE npm='$_POST[npm]'") or die(mysqli_error($conn));

        $count=mysqli_num_rows($res);

        if($count>0){
            ?>
            <script type="text/javascript">
                document.getElementById("success").style.display="none";
                document.getElementById("error").style.display="block";
            </script>
            <?php
        }else{
            mysqli_query($conn, "INSERT INTO user VALUES(NULL,'$_POST[nama]','$_POST[npm]','$_POST[email]','$_POST[jurusan]','$_POST[password]')")or die(mysqli_error($conn))
            ?>
            <script type="text/javascript">
                document.getElementById("success").style.display="block";
                document.getElementById("error").style.display="none";
            </script>
            <?php
        }
    }
    ?>


        </div>
        </div>
      </div>
      
      
    </div>
    <!-- End your project here-->

    <!-- MDB -->
    <script type="text/javascript" src="js/mdb.min.js"></script>
    <!-- Custom scripts -->
    <script type="text/javascript"></script>
  </body>
</html>
