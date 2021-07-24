<?php

if (!isset($_SESSION['email'])) {
	header("location:/login");
	exit;
}

//retrieving the data in the edit form fields
if(isset($_GET['b_id'])){
    $b_id=$_GET['b_id'];
    
    $data=App::get('books')->bookDetails($b_id);
    require './view/edit.php';
    }else{
        echo "no id is there";
    }

//editing data code
if(isset($_POST['Edit'])){
    	$name = $_POST['name'];
		$author_name = $_POST['author_name'];
		$description = $_POST['description'];
		$cover_image = $_POST['cover_image'];
        $total_count=$_POST['total_count'];
		$pdf = $_POST['pdf'];

    //Backend Validation
    if(empty($name)){
        $nameError="Please Enter the name of book!";
        $_SESSION['msg']=$nameError;
    }
    if(empty($author_name)){
        $authError="Please Enter the Author name !";
        $_SESSION['msg']=$authError;
    }
    if(empty($cover_image)){
        $imageError="Please Enter book cover image!";
        $_SESSION['msg']=$imageError;
    }
    if(empty($total_count)){
        $countError="Please Enter the count of book!";
        $_SESSION['msg']=$countError;
    }

    if(empty($nameError) && empty($authError) && empty($imageError) && empty($countError)){

        $edit = App::get('books')->UpdateBook($name,$author_name,$cover_image,$description,$pdf,$total_count,$b_id);
                $edit->execute([':name'=>$name,':author_name'=>$author_name,'cover_image'=>$cover_image,':description'=>$description,':pdf'=>$pdf,':total_count'=>$total_count]);
                //header("location:/admin_booklist");
    
        ?>
					<script type="text/javascript">
 						alert("Data Updated successfully!");
 						window.location.href="book_details?b_id=<?php echo $data->b_id ?>";
 						</script>
					}
 			<?php
    }
    
}


?>