<?php 
  include_once("include/header.php");
  include_once("include/sidebar.php");
      $id = (int)$_GET['user'];
	  if($_SESSION['id'] != $id){
		  header("Location: index.php");
	  }
	  
	  $user_info = mysqli_query($conn, "SELECT * FROM `users` WHERE `user_id` = '$id'");
	  if(mysqli_num_rows($user_info) != 1){
		  header("Location: index.php");
	  }
     $user = mysqli_fetch_assoc($user_info);
?>


<article class="col-md-9 col-lg-9">
		    <ol class="breadcrumb">
			  <li><a href="index.php">الرئيسية</a></li>
			  <li class="active"> تعديل الصفحة الشخصية للعضو<?php echo ucwords($user['username']); ?></li>
			</ol>
	<div class="col-lg-12 art_bg">
	 <form action="include/update-user.php" method="post"  id="update_user" class="form-horizontal col-md-9"   enctype="multipart/form-data" style="margin-top: 20px" >
	   <input type="hidden" value="<?php echo $user['user_id']; ?>" name="user"/>
			  <div class="form-group">
				<label for="username" class="col-sm-2 control-label"> <span style="color: red">*</span> اسم المستخدم:</label>
				<div class="col-sm-7">
				  <input type="text" class="form-control" name="username" value="<?php echo $user['username']; ?>" id="username" placeholder="username">
				</div>
			  </div>
			   <div class="form-group">
				<label for="email" class="col-sm-2 control-label"> <span style="color: red">*</span> الايميل:</label>
				<div class="col-sm-7">
				  <input type="text" class="form-control" name="email" value="<?php echo $user['email']; ?>" id="email" placeholder="Email">
				</div>
			  </div>
			  <div class="form-group">
				<label for="password" class="col-sm-2 control-label">كلمة المرور :</label>
				<div class="col-sm-7">
				  <input type="password" class="form-control" name="password" id="password" placeholder="Password">
				</div>
			  </div>
			  <div class="form-group">
				<label for="pass" class="col-sm-2 control-label"> تأكيد كلمة المرور:</label>
				<div class="col-sm-7">
				  <input type="password" class="form-control" name="pass" id="pass" placeholder="confirm Password">
				</div>
			  </div>
			   <div class="form-group">
				<label for="gender"  class="col-sm-2 control-label">الجنس:</label>
				<div class="col-sm-7">
				  <select class="form-control" name="gender"  id="gender">
				    <option value=""> اختر الحنس</option> 
					<option value="male"<?php echo ($user['gender'] == 'male' ? 'selected' : '' );?>> ذكر</option> 
					<option value="female"<?php echo ($user['gender'] == 'female' ? 'selected' : '' );?>> أنثى</option>
				  </select>
				</div>
				</div>
			  <div class="form-group">
				<label for="avatar" class="col-sm-2 control-label">الصورة الرمزية:</i></label>
				<div class="col-sm-9">
				  <input type="file" class="form-control" name="image" id="image" >
				</div>
			  </div>
			 
			   <div class="form-group">
				<label for="about-you" class="col-sm-2 control-label"> الوصف:</label>
				<div class="col-sm-9">
				  <textarea class="form-control" name="about" id="about" rows="4"><?php echo strip_tags($user['about_user']); ?></textarea>
				</div>
			  </div>
			   <div class="form-group">
				<label for="facebook" class="col-sm-2 control-label"><i class="fa fa-facebook-official" aria-hidden="true"></i></label>
				<div class="col-sm-9">
				  <input type="text" class="form-control" name="facebook" value="<?php echo $user['facebook']; ?>" id="facebook" placeholder="facebook-أدخل رابط حسابك هنا">
				</div>
			  </div>
			  <div class="form-group">
				<label for="twitter" class="col-sm-2 control-label"><i class="fa fa-twitter" aria-hidden="true"></i></label>
				<div class="col-sm-9">
				  <input type="text" class="form-control" name="twitter" id="twitter" value="<?php echo $user['twitter']; ?>"  placeholder="twitter-أدخل رابط حسابك هنا">
				</div>
			  </div>
			  <div class="form-group">
				<label for="youtube" class="col-sm-2 control-label"><i class="fa fa-youtube" aria-hidden="true"></i></label>
				<div class="col-sm-9">
				  <input type="text" class="form-control" name="youtube" id="youtube" value="<?php echo $user['youtube']; ?>" placeholder="youtube-أدخل رابط حسابك هنا">
				</div>
			  </div>
			  <div class="col-sm-2" id="up_result"> </div>
			  <div class="form-group">
				<div class="col-sm-offset-2 col-sm-9">
				  <button type="submit" name="submit" id="submit" value="submit" class="btn btn-danger btn-block"> تعديل البيانات <i class="fa fa-pencil" aria-hidden="true"></i></button>
				</div>
			  </div>
			</form>
	   </div>
</article>



<?php 
  include_once("include/footer.php");
 
?>