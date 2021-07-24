<?php
if (!isset($_SESSION['email'])) {
	?>
	<script type="text/javascript">
		alert("Please login first to access booklist!");
		 window.location.href="admin_booklist";
		</script>
		<?php
	exit;
}
//geting id
$b_id = $_GET['b_id'];
//Query to delete the book

$delete=App::get('books')->DeleteBook($b_id);
?>
	<script type="text/javascript">
		alert("Book deleted successfully!");
		 window.location.href="admin_booklist";
		</script>
<?php
?>

