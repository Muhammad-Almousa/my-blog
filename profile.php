<?php 
  include_once("include/header.php");
  include_once("include/sidebar.php");
      $id = (int)$_GET['user'];
	  
	  $user_info = mysqli_query($conn, "SELECT * FROM `users` WHERE `user_id` = '$id'");
	  if(mysqli_num_rows($user_info) != 1){
		  header("Location: index.php");
	  }
     $user = mysqli_fetch_assoc($user_info);
?>


<article class="col-md-9 col-lg-9">
		    <ol class="breadcrumb">
			  <li><a href="index.php">الرئيسية</a></li>
			  <li class="active"> الصفحة الشخصية للعضو<?php echo ucwords($user['username']); ?></li>
			</ol>
	<div class="col-lg-12 art_bg">
		<div class="page-header">
		<?php if($_SESSION['id'] == $user['user_id']) { 
		    echo ' <a href="edite-pofile.php?user='.$user['user_id'].'"><i  class="fa fa-pencil-square fa-lg" style=" position: absolute; left: 5px; top: 5px;" aria-hidden="true"></i></a>';
			}
			?>
		 
	
	    <div class="col-lg-12">
		  <div class="col-md-2">
		     <img src="<?php echo $user['avatar']; ?>" class="img-thumbnail" width="100%"/>
		  </div>
		    <div class="col-md-10">
		        <h1><?php echo ucwords($user['username']); ?> <small><?php if($user['role'] == 'admin') { echo 'المدير العام';}elseif($user['role'] == 'writer') { echo 'كاتب';}else{ echo 'مستخدم';}?></small></h1>
			    <img src="<?php if($user['gender'] == 'male'){ echo ' images/male.png'; }else {echo 'images/female.png';}?>" width="25px" />
		    </div>
		</div>
		<div class="clearfix"></div>
	   </div>
	  </div>
	  
	   <div class="col-lg-12" style=" margin-top: 20px;">
	     <div class="row">

		  
		  <div class="col-md-6">
		   <div class="panel panel-info">
			  <!-- Default panel contents -->
			  <div class="panel-heading"><b>معلومات العضو</b></div>

			  <!-- List group -->
			  <ul class="list-group">
				<li class="list-group-item"><b>تاريخ التسجيل :<?php echo $user['reg_date']; ?></b></li>
				<li class="list-group-item"><b>Facebook :<a href="<?php echo $user['facebook']; ?>" target="_blank" style="margin: 0px 6px;"> <i class="fa fa-facebook-official fa-lg"></i> </a></b></li>
				<li class="list-group-item"><b>Twitter :<a href="<?php echo $user['twitter']; ?>" target="_blank" style="margin: 0px 6px; color: #49C8DE;"> <i class="fa fa-twitter-square fa-lg"></i> </a></b></li>
				<li class="list-group-item"><b>youtube : <a href="<?php echo $user['youtube']; ?>" target="_blank" style="margin: 0px 6px; color: #f10544;"> <i class="fa fa-youtube-square fa-lg"></i> </a></b></li>
				
			  </ul>
			</div>
		  </div>
		 <div class="col-md-6">
		     <div class="panel panel-primary">
		       <div class="panel-heading">
			      <h3 class="panel-title">عن العضو</h3>
		       </div>
		       <div class="panel-body">
			     <p class="text-right"><?php echo strip_tags($user['about_user']); ?></p>
		     </div>
		    </div>
		   </div>
		
	    </div>
	   </div>
</article>



<?php 
  include_once("include/footer.php");
 
?>