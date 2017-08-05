<?php 
  include_once("include/header.php");
  include_once("include/sidebar.php");
  
  $id = intval($_GET['id']);
  $select_post = mysqli_query($conn, "SELECT * FROM `posts` p INNER JOIN `users` u ON p.author = u.user_id WHERE `post_id` = '$id' ORDER BY `post_id`");
  $post = mysqli_fetch_assoc($select_post);
?>

 
<article class="col-md-9 col-lg-9">
		 <ol class="breadcrumb">
			  <li><a href="index.php">الرئيسية</a></li>
			  <li><a href="#"><?php echo $post['category']; ?></a></li>
			  <li class="active"><?php echo $post['title']; ?></li>
			</ol>
		 <div class="col-lg-12 art_bg">
		   <div class="cate-post" style=" padding: 5px; margin: 10px 0px; background: white; border: solid 1px #e7e7e7;" >
			 <div class="col-lg-12">
				<h2 style="margin: 0px; padding: 5px; background: #286090; color: #fff; margin-bottom: 10px"> <?php echo $post['title']; ?> </h2>
		             <img src="<?php echo ($post['image'] == '' ? 'images/No_image.png' : $post['image']);?>" width="100%">
				      <div class="col-md-12 well well-sm" >
			           <p  class="pull-right" style="margin-top: 9px;" ><i class="fa fa-user" ></i> الكاتب : <a href="profile.php?user=<?php echo $post['user_id']; ?>" ><?php echo $post['username']; ?></a> </p>
					    <p  class="pull-left" style="margin-top: 9px;"><i class="fa fa-clock-o"></i> 26.01.2017 </p>

			         </div>
		           </div>
			      <p>
			    <?php echo strip_tags($post['post']); ?> </p>
			  </div>
			 <div class="clearfix"></div>
		   </div>
		   
        <!-- comment -->  
		<div class="col-md-12">
		<div class="row">
		
		<?php 
		$sel_com = mysqli_query($conn, " SELECT * FROM `comments` c INNER JOIN `users` u ON c.user_id = u.user_id WHERE `post_id` = '$id' AND `status` = 'published'");
		 while($comments = mysqli_fetch_assoc($sel_com)){
		?>
		
			    <div class="cate-post" style=" padding: 5px; margin: 10px 0px; background: white; border: solid 1px #e7e7e7;" >
	             <div class="col-md-2">
		           <img src="<?php echo $comments['avatar'];  ?>" width="100%"  />
		         </div>
		       <div class="col-md-10">
				<h2 style="margin: 0px; padding: 5px; background: #767682; color: #fff; margin-bottom: 10px"> <i class="fa fa-comments-o" aria-hidden="true"></i><?php echo $comments['title'];  ?></h2>
			      <p>
			  <?php echo $comments['comment'];  ?>
			     </p>
			   </div>
             <div class="col-md-12"> 
			   <hr style="margin-bottom:5px;"/>
				 <p class="pull-left" ><?php echo $comments['com_date'];  ?><i class="fa fa-clock-o" aria-hidden="true"></i></p>
				  <p href="" class="pull-right" ><i class="fa fa-user" aria-hidden="true"></i> تم التعليق بواسطة :<a href="profile.php?user=<?php echo $comments['user_id'];  ?>"><?php echo $comments['username'];  ?></a></p>		    
			    </div>			 
			   <div class="clearfix"></div>
		     </div>
			 <?php 
			 }
			 ?>
		  </div>
		</div>

		<!--  end of comment -->
        <div class="col-lg-12 art_bg" style=" margin-top: 20px; padding: 20px;">
		        <h2><i class="fa fa-comment" style="color: #a57272;"></i> إضافة تعليق جديد</h2>
				<hr/>
			<?php comment_area(); ?>

      	 
</article>

<?php 
  include_once("include/footer.php");

?>