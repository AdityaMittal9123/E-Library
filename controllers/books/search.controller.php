<?php
if (!isset($_SESSION['email'])) {
	?>
	<script type="text/javascript">
		alert("Please login first to access booklist!");
		 window.location.href="login";
		</script>
		<?php
	exit;
}
if(isset($_POST['submit'])){
    $str = $_POST['str'];
        $search=App::get('books')->SearchBook($str);
		$row=count($search);
		if($row==0){
			echo "no data found";
		}else{
			require './view/search.php';
		}	
	    }
?>