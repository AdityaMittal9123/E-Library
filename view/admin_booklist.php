<!DOCTYPE html>
<html>
  <head>
</head>
 <body class="center">
 <!-- sorting functionality -->
    <form action="/admin_booklist" method="post"  class="right">
    <div style="padding-top:0px;margin-right:250px;">
      <a class='dropdown-trigger btn ' href='#' data-target='dropdown2' style="height:28px">SORT BY</a>
        <ul id='dropdown2' class='dropdown-content'>
          <li><div class='divider'></div></li>
          <li><input type="submit" name="A-Z" value="A-Z"></li>
          <li><input type="submit" name="Z-A" value="Z-A"></li>
        </ul>
        </div>
    </form>
        <!-- searching functionality -->
        <div class="right"style="margin-right:500px">
          <form class='center' method="post" action="/search">
            <input type="textbox" name="str" placeholder="book name or author name" required />
            <input type="submit" name="submit" value="search"  style="height:25px" />
         </form>
        </div>
      <!-- container containing books -->
      <div class="container" style="padding-top:100px;">
      	<div class="row">
      		<?php foreach ($datas as $data) {?>
      			<div class="col s12 m6 l4">
              <div class="card z-depth=0 hoverable"style="height:520px;">
      					<div class="card-content">
      						<div class="card-image"><img src="resources\images/<?= $data->cover_image;?>"></div>
      						<h6><?php echo htmlspecialchars($data->name); ?></h6>
      						 <div><?php echo htmlspecialchars($data->author_name); ?></div>
                   <div>Total books:-<?php echo htmlspecialchars($data->total_count); ?></div>
      						 </div>
      					<div class="card-action right-align">
      						  <span><a href="book_details?b_id=<?php echo $data->b_id ?>"><i class="material-icons">arrow_forward</i></a></span>
      					</div> 
      				</div>
      			</div>

      		<?php }?>
      	</div>
      </div>
<!-- floating button for addbook page -->
      <?php
if ($_SESSION['usertype']=='admin') {
	echo '<div class="fixed-action-btn" style="padding-bottom:60px;padding-right:20px;">
  <a class="btn-floating btn-large red "href="/addbook">
  <i class="large material-icons ">add_circle</i>
 </a>';
}
?>
</div>
<!-- pagination code -->
<ul class="pagination">
<?php if($page>1){?>
  <li class="waves-effect"><a href="/admin_booklist?page=<?php echo ($page-1) ;?>"><i class="material-icons">chevron_left</i></a></li>
 <?php } ?>
  <?php
   for ($i=1;$i<=$_SESSION['total_page'];$i++){
    if($i==$page){
      $active ="active";
    }else{
      $active = " ";
    } ?>
   <li class="<?php echo "$active";?>"><a href="admin_booklist?page=<?php echo $i ;?>"><?php echo $i ;?></a></li>
  <?php } ?>
  <?php if($page<$_SESSION['total_page']){ ?>
  <li class="waves-effect"><a href="/admin_booklist?page=<?php echo ($page+1) ;?>"><i class="material-icons">chevron_right</i></a></li>
 <?php } ?>
  </ul>
  </body>
</html>



