<?php

require_once('dbconn.php');

$sth = $dbconn->prepare("SELECT `cocktailid`, `cocktailname`, `containsalcohol`, `fullingredients`, `preparation` FROM cocktails");
$sth->execute();

$result = $sth->fetchAll();


?>
<!DOCTYPE html>
<html>
<head>
    <style>
.container{
  margin: 20px auto;
}
h2 {
  text-align: center;
}
table {
    font-family: arial, sans-serif;
    border-collapse: collapse;
    width: 100%;
}

td, th {
    border: 1px solid #dddddd;
    text-align: left;
    padding: 8px;
}

tr:nth-child(even) {
    background-color: #dddddd;
}

body{
  font-family:Arial, Helvetica, sans-serif;
  font-size:13px;
}
.success, .error{
  border: 1px solid;
  margin: 10px 0px;
  padding:15px 10px 15px 50px;
  background-repeat: no-repeat;
  background-position: 10px center;
}

.success {
  color: #4F8A10;
  background-color: #DFF2BF;
  background-image:url('success.png');
  display: none;
}
.error {
  display: none;
  color: #D8000C;
  background-color: #FFBABA;
  background-image: url('error.png');
}
</style>

    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="CSS.css">
    <title>Add New and See List of Cocktails</title>
  </head>
<body>
    <header>
  <div class="collapse bg-dark" id="navbarHeader">
    <div class="container">
      <div class="row">
        <div class="col-sm-8 col-md-7 py-4">
          <h4 class="text-white">About</h4>
          <p class="text-muted">We are fans of all things Cocktail related.  This website site aims to showcase the best in modern and classic cocktails that you can make at home.  </p>
        </div>
        <div class="col-sm-4 offset-md-1 py-4">
          <h4 class="text-white">Contact</h4>
          <ul class="list-unstyled">
            <li><a href="#" class="text-white">Email me</a></li>
          </ul>
        </div>
      </div>
    </div>
  </div>
  <div class="navbar navbar-dark bg-dark shadow-sm">
    <div class="container d-flex justify-content-between">
      <a href="#" class="navbar-brand d-flex align-items-center">
        <svg height="70" width="200">
  <text x="0" y="15" fill="red" transform="rotate(30 20,40)">I love cocktails</text>
</svg>
        <strong>Awesome Cocktails</strong>
      </a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarHeader" aria-controls="navbarHeader" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
    </div>
  </div>
</header>
    
    
  <div class="container">
    
    <h2>Add a New Cocktail</h2>
    <div class="success"></div>
    <div class="error"></div>
    <form>
    <table>
        <tr>
            <td colspan="4" style="text-align: center">
            <input type="hidden" id ='cocktailid' value='' />
                  <input type='text' id='cocktailname' placeholder='Name' required />&nbsp;&nbsp;
                  <input type='text' id='containsalcohol' placeholder='Alcoholic Y or N' required /><br>
                  <textarea name='fullingredients' id='fullingredients' placeholder= 'Enter all the ingredients here. Example 35ml Vodka, 10ml lime....' rows="5" cols="15" required></textarea>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                  <textarea name='preparation' type='text' id='preparation' placeholder= 'Enter how you make the cocktail here' rows="5" cols="15" required /></textarea><br>
                  <input type='button' id='saverecords' value='Add Records'/>
                  <input type='button' id='reset' value='reset'/></td>
        </tr>
    </table>
</form>
    <h2>View Records</h2>
    <table>
      <tr>
        <th>#</th>
        <th>Cocktail Name</th>
        <th>Contains Alcohol</th>
        <th>Full Ingredients</th>
        <th>Preparation</th>
      </tr>
  <?php
  /* FetchAll foreach with edit and delete using Ajax */
  if($sth->rowCount()):
   foreach($result as $row){ ?>
     <tr>
       <td><?php echo $row['cocktailid']; ?></td>
       <td><?php echo $row['cocktailname']; ?></td>
       <td><?php echo $row['containsalcohol']; ?></td>
       <td><?php echo $row['fullingredients']; ?></td>
       <td><?php echo $row['preparation']; ?></td>
     </tr>
   <?php }  ?>
  <?php endif;  ?>
  </table>
  </div>
    <footer class="text-muted">
  <div class="container">
    <p class="float-right">
      <a href="#">Back to top</a>
    </p>
    <a href="index.html"></a>
    <p>To search for your cocktail go to <a href="index.html">View Cocktail</a></p>
  </div>
</footer>
  <script src="https://code.jquery.com/jquery-3.1.1.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>
  <script>
    $(function(){

      /* Delete button ajax call */
      $('.delbtn').on( 'click', function(){
        if(confirm('This action will delete this record. Are you sure?')){
          var pid = $(this).data('pid');
          $.post( "delete_ajax.php", { pid: pid })
          .done(function( data ) {
            if(data > 0){
              $('.success').show(3000).html("Record deleted successfully.").delay(3200).fadeOut(6000);
            }else{
              $('.error').show(3000).html("Record could not be deleted. Please try again.").delay(3200).fadeOut(6000);;
            }
            setTimeout(function(){
                window.location.reload(1);
            }, 5000);
          });
        }
      });

     /* Edit button ajax call */
      $('.editbtn').on( 'click', function(){
          var pid = $(this).data('pid');
          $.get( "getrecord_ajax.php", { id: pid })
            .done(function( cocktailname ) {
              data = $.parseJSON(cocktailname);

              if(data){
                $('#cocktailid').val(data.cocktailid);
                $('#cocktailname').val(data.cocktailname);
                $('#containsalcohol').val(data.containsalcohol);
                $('#fullingredients').val(data.fullingredients);
                $('#preparation').val(data.preparation);
                $("#saverecords").val('Save Records');
            }
          });
      });

      /* Edit button ajax call */
       $('#saverecords').on( 'click', function(){
           var cocktailid  = $('#cocktailid').val();
           var cocktailname = $('#cocktailname').val();
           var containsalcohol = $('#containsalcohol').val();
           var fullingredients   = $('#fullingredients').val();
           var preparation = $('#preparation').val();
           if(!cocktailname || !fullingredients || !preparation){
             $('.error').show(3000).html("All fields are required.").delay(3200).fadeOut(3000);
           }else{
                if(cocktailid){
                var url = 'edit_record_ajax.php';
              }else{
                var url = 'add_records_ajax.php';
              }
                $.post( url, {cocktailid:cocktailid, cocktailname: cocktailname, containsalcohol: containsalcohol, fullingredients: fullingredients, preparation: preparation  })
               .done(function( data ) {
                 if(data > 0){
                   $('.success').show(3000).html("Record saved successfully.").delay(2000).fadeOut(1000);
                 }else{
                   $('.error').show(3000).html("Record could not be saved. Please try again.").delay(2000).fadeOut(1000);
                 }
                 $("#saverecords").val('Add Records');
                 setTimeout(function(){
                     window.location.reload(1);
                 }, 15000);
             });
          }
       });
    });
 </script>
</body>
</html>
