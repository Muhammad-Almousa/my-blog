<?php 
  include_once("include/header.php");
  include_once("include/sidebar.php");

      $id = $_GET['cate'];
	 $per_page = 2;
		  
		if(!isset($_GET['page'])){
			$page = 1;
		}else{
			$page = (int)$_GET['page'];
		}

		$start_from = ($page-1) * $per_page;
  
	  $select_category = mysqli_query($conn, "SELECT * FROM `posts` p INNER JOIN `users` u ON p.author = u.user_id WHERE `status` = 'published' AND `category` = '$id' ORDER BY `post_id` DESC LIMIT $start_from , $per_page");
?>


<article class="col-md-9 col-lg-9">
		    <ol class="breadcrumb">
			  <li><a href="index.php">الرئيسية</a></li>
			  <li class="active"><?php echo $id; ?></li>
			</ol>
	<div class="col-lg-12 art_bg">
	
			<?php 
			while($post = mysqli_fetch_assoc($select_category)){
			
			?>

			    <div class="cate-post" style=" padding: 5px; margin: 10px 0px; background: white; border: solid 1px #e7e7e7;" >
	             <div class="col-md-3">
		           <img src="<?php echo ($post['image'] == '' ? 'images/No_image.png' : $post['image']);?>" width="100%"  />
		         </div>
		       <div class="col-md-9">
				<h2 style="margin: 0px; padding: 5px; background: #4b694c; color: #fff; margin-bottom: 10px"> <?php echo strip_tags($post['title']); ?></h2>
			      <p>
			    <?php  echo strip_tags(substr($post['post'],0,400));?>
			     </p>
			   </div>
             <div class="col-md-12"> 
			   <hr style="margin-bottom:5px;"/>
				 <a href="post.php?id=<?php echo $post['post_id']; ?>" class="btn btn-warning pull-left" >إقرأ المزيد</a>
				  <p href="" class="pull-right" ><i class="fa fa-user" ></i> : <a href="profile.php?user=<?php echo $post['user_id']; ?>"><?php echo $post['username']; ?></a> | <i class="fa fa-clock-o" ></i><?php echo $post['post_date']; ?></p>		    
			    </div>			 
			   <div class="clearfix"></div>
		     </div>
			 <?php 
			}
			 ?>
					  <?php 
		     $page_sql = mysqli_query($conn, "SELECT * FROM `posts` WHERE `category` = '$id'");
			 $count_page = mysqli_num_rows($page_sql);
			 
			 $total_page = ceil($count_page / $per_page);

		  ?> 
		   <nav class="text-center">
		     <ul class="pagination">
		    <?php 
			
			for($i = 1; $i <= $total_page; $i++){
				
				echo '<li '.($page == $i ? 'class="active"' : '').'><a href="category.php?cate='.$id.'&page='.$i.'">'.$i.'</a></li>';
			}

			?>

			 </ul>
		  </nav> 
			 
		   </div>
</article>



<?php 
  include_once("include/footer.php");
 
?>