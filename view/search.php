<!DOCTYPE html>
<html>
  <head>
</head>
 <body class="center">
 <div class="container">
      	<div class="row">
      		<?php foreach($search as $data) {?>
      			<div class="col col-12 col-md-3 col-lg-2">

      				<div class="card z-depth=0">
      					<div class="card-content">
      						<div class="card-image"><img src="<?php echo htmlspecialchars($data->cover_image); ?>"></div>
      						<h6><?php echo htmlspecialchars($data->name); ?></h6>
      						 <div><?php echo htmlspecialchars($data->author_name); ?></div>
                   <div>Total books:-<?php echo htmlspecialchars($data->total_count); ?></div>
      						 </div>
                      </div>
                  </div>
                  <?php } ?>
          </div>
 </div>

    </body>
</html>