<?php    
        // Data Stored into Database
        $servername = "premium87.web-hosting.com";
    $dBUserName = "mmachbon_UK_Dessertioner";
    $dBPassword = "gc_J4Kvz22VH";
    $dBName = "mmachbon_UK_Dissertation";
        
        $connect = new mysqli($servername, $dBUserName, $dBPassword, $dBName);
        if ($connect->connect_error) {
            die("Connection failed: " . $connect->connect_error);
        }
        
    session_start();  
    if(isset($_SESSION["name"]))
    {  
    ?>  
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>Data Leads</title>
  </head>
  <body style="padding: 25px;">
      <p align='center'><a href='logout.php' class='btn btn-primary mb-5'>Logout</a></p>
    <table class="table table-striped table-hover">
      <thead>
        <tr>
          <th scope="col">ID</th>
          <th scope="col">Customer Name</th>
          <th scope="col">Customer Email</th>
          <th scope="col">Customer Phone</th>
          <th scope="col">Customer Subject</th>
          <th scope="col">Customer Message</th>
        </tr>
      </thead>
      <tbody>
          <?php
                    $query = "SELECT * FROM `Lead_Table` ORDER BY `ID` DESC";
                    $result = mysqli_query($connect, $query);
                    while ($row = mysqli_fetch_array($result)){
                            echo "<tr>";
                            echo '<td scope="row">' . $row['ID'] .'</td>';
                            echo '<td>' . $row['Lead_Name'] . '</td>';
                            echo '<td>' . $row['Lead_Email'] . '</td>';
                            echo '<td>' . $row['Lead_Phone'] . '</td>';
                            echo '<td>' . $row['Lead_Subject'] . '</td>';
                            echo '<td>' . $row['Lead_Message'] . '</td>';
                            echo "</tr>";
                    }
                    ?>
      </tbody>
    </table>
    <script src="assets/js/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script>  
$(document).ready(function(){
 
 var is_session_expired = 'no';
    function check_session()
    {
        $.ajax({
            url:"check_session.php",
            method:"POST",
            success:function(data)
            {
    if(data == '1')
    {
     $('#loginModal').modal({
      backdrop: 'static',
      keyboard: false,
     });
     is_session_expired = 'yes';
    }
   }
        })
    }
 
 var count_interval = setInterval(function(){
        check_session();
  if(is_session_expired == 'yes')
  {
   clearInterval(count_interval);
  }
    }, 10000);
 
 $('#login_form').on('submit', function(event){
  event.preventDefault();
  $.ajax({
   url:"check_login.php",
   method:"POST",
   data:$(this).serialize(),
   success:function(data){
    if(data != '')
    {
     $('#error_message').html(data);
    }
    else
    {
     location.reload();
    }
   }
  });
 });

});  
</script>
  </body>
</html>
<?php
    }  
    else  
    {  
        header('location: Login-Form.php');  
    }  
?>