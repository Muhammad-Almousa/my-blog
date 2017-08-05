<?php

     function register(){
		 if(isset($_SESSION['id'])){
			 echo '<div class="alert alert-danger" role="alert">عذرا يا '. $_SESSION['user'] .'و لكنك مسجل لدينا بالفعل </div>';
		 }else{
			 echo '
		 <form action="include/registor.php" method="post" class="form-horizontal"   id="register" enctype="multipart/form-data" >
			  <div class="form-group">
				<label for="username" class="col-sm-2 control-label"> <span style="color: red">*</span> اسم المستخدم:</label>
				<div class="col-sm-6">
				  <input type="text" class="form-control" name="username" id="username" placeholder="username">
				</div>
			  </div>
			   <div class="form-group">
				<label for="email" class="col-sm-2 control-label"> <span style="color: red">*</span> الايميل:</label>
				<div class="col-sm-6">
				  <input type="text" class="form-control" name="email" id="email" placeholder="Email">
				</div>
			  </div>
			  <div class="form-group">
				<label for="password" class="col-sm-2 control-label"> <span style="color: red">*</span> كلمة المرور :</label>
				<div class="col-sm-5">
				  <input type="password" class="form-control" name="password" id="password" placeholder="Password">
				</div>
			  </div>
			  <div class="form-group">
				<label for="pass" class="col-sm-2 control-label"> <span style="color: red">*</span> تأكيد كلمة المرور:</label>
				<div class="col-sm-5">
				  <input type="password" class="form-control" name="pass" id="pass" placeholder="confirm Password">
				</div>
			  </div>
			   <div class="form-group">
				<label for="gender"  class="col-sm-2 control-label">الجنس:</label>
				<div class="col-sm-5">
				  <select class="form-control" name="gender"  id="gender">
				    <option value=""> اختر الحنس</option> 
					<option value="male"> ذكر</option> 
					<option value="female"> أنثى</option>
				  </select>
				</div>
				</div>
			  <div class="form-group">
				<label for="avatar" class="col-sm-2 control-label">الصورة الرمزية:</i></label>
				<div class="col-sm-5">
				  <input type="file" class="form-control" name="image" id="image" >
				</div>
			  </div>
			 
			   <div class="form-group">
				<label for="about-you" class="col-sm-2 control-label"> وصف مختصر عنك:</label>
				<div class="col-sm-6">
				  <textarea class="form-control" name="about" id="about" rows="4"> </textarea>
				</div>
			  </div>
			   <div class="form-group">
				<label for="facebook" class="col-sm-2 control-label"><i class="fa fa-facebook-official" aria-hidden="true"></i></label>
				<div class="col-sm-6">
				  <input type="text" class="form-control" name="facebook" id="facebook" placeholder="facebook-أدخل رابط حسابك هنا">
				</div>
			  </div>
			  <div class="form-group">
				<label for="twitter" class="col-sm-2 control-label"><i class="fa fa-twitter" aria-hidden="true"></i></label>
				<div class="col-sm-6">
				  <input type="text" class="form-control" name="twitter" id="twitter" placeholder="twitter-أدخل رابط حسابك هنا">
				</div>
			  </div>
			  <div class="form-group">
				<label for="youtube" class="col-sm-2 control-label"><i class="fa fa-youtube" aria-hidden="true"></i></label>
				<div class="col-sm-6">
				  <input type="text" class="form-control" name="youtube" id="youtube" placeholder="youtube-أدخل رابط حسابك هنا">
				</div>
			  </div>
			 <div class="col-md-8 "  >
			 <div id="result" style=" margin: 10px 150px 10px 0px;"> </div>
			 
			 </div>
			  <div class="form-group">
				<div class="col-sm-offset-2 col-sm-6">
				  <button type="submit" name="submit" id="submit" value="submit" class="btn btn-danger btn-block"> تسجيل <i class="fa fa-pencil" aria-hidden="true"></i></button>
				</div>
			  </div>
			</form>
			 ';
		 }
	 }
	 
	 
	 function login_area(){
		 if(isset($_SESSION['id'])){
			 echo'
					 <div class="panel panel-default">
						  <div class="panel-heading text-center"><b>أهلا وسهلا بك يا'.ucwords($_SESSION['user']).' </b> </div>
							<div class="panel-body">
							 <div class="text-center" style="margin-bottom: 20px;">
							 
							   <img src=" '.$_SESSION['avatar'].'" width="85px"></img>
							 </div>
							 <hr/>
						   <div class="col-md-12">
							  <div class="row">
								 <p> <b>البريد الالكتروني : </b> '.$_SESSION['email'].'</p>
								   <p> <b>روابط التواصل لديك :</b>
									 <a href="'.$_SESSION['facebook'].'" target="_blank" style="margin: 0px 6px;"> <i class="fa fa-facebook-official fa-lg"></i> </a>
									 <a href="'.$_SESSION['twitter'].'" target="_blank" style="margin: 0px 6px; color: #49C8DE;"> <i class="fa fa-twitter-square fa-lg"></i> </a>
									 <a href="'.$_SESSION['youtube'].'" target="_blank" style="margin: 0px 6px; color: #f10544;"> <i class="fa fa-youtube-square fa-lg"></i> </a>
								   </p>
								 </div>
							  </div>
							</div>
						 <div class="panel-footer ">
						   <div class="col-md-12">
							 <div class="row">
							   <div class="col-md-6">
							   ';
							   if($_SESSION['role'] == 'admin'){
								   echo '<a href="admin-cp/index.php" type="button" class="btn btn-danger btn-sm pull-left">لوحة التحكم</a>';
							   }
								echo '
							   </div>
							<div class="col-md-6">
								 <a href="profile.php" type="button" class="btn btn-info btn-sm pull-right">الصفحة الشخصية</a>
							  </div>
							 </div>
						   </div>
							  <div class="clearfix"> </div>
						   </div>
						 </div> ';
					
		 }else{
			 echo ' 
			 <div class="panel panel-default">
				  <div class="panel-heading">
					<h3 class="panel-title text-center"><b>sign in</b></h3>
				  </div>
				  <div class="text-center" style="margin-bottom: 20px;">
				    <img src="images/non-avatar.png" width="85px"></img>
				  </div>
				  <hr/>
				  <div class="panel-body">
					<form action="include/login.php" method="post" class="form-horizontal" id="login">
					  <div class="form-group">
						<label for="username" class="col-sm-2 control-label text-center"><i class="fa fa-user fa-2x"></i></label>
						<div class="col-sm-10">
						  <input type="text" class="form-control" id="username" name="user" placeholder="أدخل اسم المستخدم أو البريد الالكتروني">
						</div>
					  </div>
					  <div class="form-group">
						<label for="password" class="col-sm-2 control-label text-center"><i class="fa fa-lock fa-2x"></i></label>
						<div class="col-sm-10">
						  <input type="password" class="form-control" name="password" id="password" placeholder="كلمة المرور">
						</div>
					  </div>
                      <div id="log_result"    style= " text-align: center;"> </div>
					  <div class="form-group">
						<div class="col-sm-10 pull-left">
						  <button type="submit" name="login"  class="btn btn-info">تسجيل دخول</button>
						</div>
					  </div>
					</form>
				  </div>
				   <div class="panel-footer text-center"><i class="fa fa-exclamation-triangle" style="color: red;"></i>إذا لم تكن مسجل إضغط  <a href="register.php" > هنا</a></div>
                 </div>';
		 }
	 }
	 
	 
	 function comment_area(){
		 global $_SESSION;
		 global $id;
		 if(!isset($_SESSION['id'])){
			 echo '<h4> لإضافة التعليقات يرجى تسجيل الدخول</h4>';
			 
		 }else{
			 echo
			 '
			 <form action="include/comment.php" method="post" class="form-horizontal" id="comments">
			  <div class="form-group">
				<label for="text" class="col-sm-2 control-label">عنوان التعليق:</label>
				<div class="col-sm-6">
				  <input type="text" class="form-control" name="title" id="title" placeholder="اكتب عنوان التعليق">
				</div>
			  </div>
			  <div class="form-group">
				<label for="inputEmail3" class="col-sm-2 control-label">التعليق</label>
				<div class="col-sm-6">
				  <textarea type="text" class="form-control" name="comment" id="comment" rows="4"> </textarea>
				</div>
			  </div>
             <input type="hidden" value="'.$id.'" name="id" /> 
			  <div class="form-group">
				<div class="col-sm-offset-2 col-sm-10">
				 <div id="com_resu"></div>
				  <button type="submit" name="submit" class="btn btn-danger">أضف تعليق</button>
				</div>
			  </div>
			</form>
			 ';
		 }
	 }
?>