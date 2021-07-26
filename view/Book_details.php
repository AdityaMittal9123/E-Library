<!DOCTYPE html>
<html>
 <head>
   <!-- script for modal used deleting a book -->
   <script>
    $(document).ready(function(){
      $('.modal').modal();
    });
   </script>

   <script>
  $(document).ready(function(){
    $('select').material_select();
  });
</script>

   <title>Book Details</title>
 </head>
 <body class="background" style="background-color:#ffe6e6;">

 <a class="waves-effect waves-light btn right" href="editbook?b_id=<?php echo $Book_detail->b_id; ?>">Edit Book</a>

   <!-- select box for marking the book as issue, returnde or wishlist -->
    

    <!-- container for the book details -->
    <div class="row">
      <div class="container">
          <div class="col m12 l5">
            <div class="card z-depth=0"> 
              <div class="card-content center" >
                <div class="card-image" style="height:350px;width:250px"><img src="resources\images/<?= $Book_detail->cover_image;?>"></div>
                <a class="waves-effect waves-light btn center" href="<?php echo ($Book_detail->pdf); ?>" target="_blank">Read Book</a>

              </div>
            </div>

          </div>
          <div class="center-align"><h4><?php echo htmlspecialchars($Book_detail->name); ?><br><br>by<br></h4>
          <h4><?php echo htmlspecialchars($Book_detail->author_name); ?></h4>
          <h5>Description</h5></center>
          <h5 class="black-text darken-4"><?php echo htmlspecialchars($Book_detail->description); ?><br><br></h5>
        </div>
        
       <div class="modal" id="terms">

        <div class="modal-content black-text">

          <!-- Confirmaton message -->

         <center><h4>Are you sure ?</h4>
          <p>This data will not be retrieved back after deleted once.</p>
            <a href="delete.php?b_id=<?php echo $data['b_id'] ?>" class="modal-close btn">Sure</a>
            <a href="#" class="modal-close btn">Cancel</a>
         </center>
        </div>
       </div>
      </div>
    </div>
    <form action="" method="POST">
      <span>Mark As:-</span>
      <label>
        <input name="action" type="checkbox" value='reading'/>
        <span>Reading</span>
      </label>
      <label>
        <input name="action" type="checkbox" value="returned"/>
        <span>Retured</span>
      </label>
       <label>
        <input  name="action" type="checkbox" value="wishlist"/>
        <span>Wishlist</span>
      </label>
      <a href="profile?b_id=<?php echo $Book_detail->b_id; ?>"><input class="btn modal-trigger" type ="submit" name="mark" value="submit"></a>
    </form>
    

</body>
</html>
