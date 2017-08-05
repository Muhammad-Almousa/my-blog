<?php 
	  include_once("inc/header.php");
	  include_once("inc/sidebar.php");
	  $msg = '';
	  $id = intval($_GET['user']);
	  $get_user = mysqli_query($conn,"SELECT * FROM `users` WHERE `user_id` = '$id'"); 
	 $user = mysqli_fetch_assoc($get_user);
	
	if(isset($_POST['submit'])){
		$username = $_POST['username'];
		$email    = $_POST['email'];
		if(empty($username)){
			 $msg = '<div class="alert alert-danger" role="alert"> الرجاء إدخال اسم المستخدم</div>';
		}elseif(empty($email)){
			 $msg = '<div class="alert alert-danger" role="alert"> الرجاء أدخل بريدك الالكتروني</div>';
		}elseif(!filter_var($email, FILTER_VALIDATE_EMAIL)){
			 $msg = '<div class="alert alert-danger" role="alert"> الرجاء إدخال بريد إلكتروني صحيح</div>';
		}else{
			$sql = mysqli_query($conn, "SELECT * FROM `users` WHERE `username` = '$username' OR `email` = '$email'");
			if(mysqli_num_rows($sql) > 0){
				if($username == $user['username'] AND $email == $user['email']){
					if($_POST['password'] != '' OR $_POST['pass'] = ''){
						 if($_POST['password'] != $_POST['pass']){
							 $msg = '<div class="alert alert-danger" role="alert">كلمة المرور غير متطابقة</div>';
						 }else{
								   $password   =  md5($_POST['password']) ;
								   $image      =   $_FILES['image'];
								   $image_name =   $image['name'];
								   $image_tmp  =   $image['tmp_name'];
								   $image_size =  $image['size'];
								   $image_error =  $image['error'];
								   if($image_name != ''){
									   $image_exe = explode('.' , $image_name);
									   $image_exe = strtolower(end($image_exe));
							  
						      $allowd = array('gif','png','jpg','jpeg');
							  
						      if(in_array($image_exe , $allowd)){
									if($image_error === 0){
									if($image_size <= 3000000){
										$new_name = uniqid('user',false) . '.' . $image_exe;
										$image_dir = '../images/avatar/'. $new_name;
						                $image_db = 'images/avatar/'. $new_name;
										      if(move_uploaded_file($image_tmp , $image_dir)){
												  $update_user = "UPDATE `users` SET `password` = '$password' , `gender` = '$_POST[gender]' , `avatar` = '$image_db' , `about_user` = '$_POST[about]' , `facebook` ='$_POST[facebook]' , `twitter` ='$_POST[twitter]' , `youtube` = '$_POST[youtube]' , `role` = '$_POST[role]' WHERE `user_id` ='$id'";
												$sql = mysqli_query($conn, $update_user); 
												if(isset($sql)){
											 $msg =	'<div class="alert alert-success" role="alert">تم تحديث بياناتك بنجاح</div>';	
											  echo  '<meta http-equiv=refresh content="3; \'users.php\' "/>';
										  }	
									   }else{
										  $msg = '<div class="alert alert-danger" role="alert">عذرا حدث خطـأ أثناء نقل الملف</div>';
									   }
									}else{
										$msg = '<div class="alert alert-danger" role="alert"> عذرا و لكن حجم الصورة كبير جدا .يجب أن لا يتعدى 2 MG</div>'; 
									  }
									}else{
										$msg = '<div class="alert alert-danger" role="alert"> عذرا حدث خطـأ غير متوقع أثناء تحميل الصورة</div>'; 
									}
								}else{
									$msg = '<div class="alert alert-danger" role="alert">عذرا و لكن امتداد الصورة غير صحيح</div>';
							  }
						    }else{
								 $update_user = "UPDATE `users` SET `password` = '$password' , `gender` = '$_POST[gender]' , `about_user` = '$_POST[about]' , `facebook` ='$_POST[facebook]' , `twitter` ='$_POST[twitter]' , `youtube` = '$_POST[youtube]' , `role` = '$_POST[role]' WHERE `user_id` ='$id'";
										$sql = mysqli_query($conn, $update_user); 
										 if(isset($sql)){
										   $msg =	'<div class="alert alert-success" role="alert">تم تحديث بياناتك بنجاح</div>';	
											echo  '<meta http-equiv=refresh content="3; \'users.php\' "/>';
								}
							}
						 }
					}else{
								   $image      =   $_FILES['image'];
								   $image_name =   $image['name'];
								   $image_tmp  =   $image['tmp_name'];
								   $image_size =  $image['size'];
								   $image_error =  $image['error'];
								   if($image_name != ''){
									   $image_exe = explode('.' , $image_name);
									   $image_exe = strtolower(end($image_exe));
							  
						      $allowd = array('gif','png','jpg','jpeg');
							  
						      if(in_array($image_exe , $allowd)){
									if($image_error === 0){
									if($image_size <= 3000000){
										$new_name = uniqid('user',false) . '.' . $image_exe;
										$image_dir = '../images/avatar/'. $new_name;
						                $image_db = 'images/avatar/'. $new_name;
										      if(move_uploaded_file($image_tmp , $image_dir)){
												  $update_user = "UPDATE `users` SET `gender` = '$_POST[gender]' , `avatar` = '$image_db' , `about_user` = '$_POST[about]' , `facebook` ='$_POST[facebook]' , `twitter` ='$_POST[twitter]' , `youtube` = '$_POST[youtube]' , `role` = '$_POST[role]' WHERE `user_id` ='$id'";
												$sql = mysqli_query($conn, $update_user); 
												if(isset($sql)){
											 $msg =	'<div class="alert alert-success" role="alert">تم تحديث بياناتك بنجاح</div>';	
											  echo  '<meta http-equiv=refresh content="3; \'users.php\' "/>';
										  }	
									   }else{
										  $msg = '<div class="alert alert-danger" role="alert">عذرا حدث خطـأ أثناء نقل الملف</div>';
									   }
									}else{
										$msg = '<div class="alert alert-danger" role="alert"> عذرا و لكن حجم الصورة كبير جدا .يجب أن لا يتعدى 2 MG</div>'; 
									  }
									}else{
										$msg = '<div class="alert alert-danger" role="alert"> عذرا حدث خطـأ غير متوقع أثناء تحميل الصورة</div>'; 
									}
								}else{
									$msg = '<div class="alert alert-danger" role="alert">عذرا و لكن امتداد الصورة غير صحيح</div>';
							  }
						    }else{
								 $update_user = "UPDATE `users` SET `gender` = '$_POST[gender]' , `about_user` = '$_POST[about]' , `facebook` ='$_POST[facebook]' , `twitter` ='$_POST[twitter]' , `youtube` = '$_POST[youtube]' , `role` = '$_POST[role]' WHERE `user_id` ='$id'";
										$sql = mysqli_query($conn, $update_user); 
										 if(isset($sql)){
										   $msg =	'<div class="alert alert-success" role="alert">تم تحديث بياناتك بنجاح</div>';	
											echo  '<meta http-equiv=refresh content="3; \'users.php\' "/>';
								}
							}
					}
					
			}elseif($username != $user['username'] AND $email == $user['email']){
				$sql = mysqli_query($conn, "SELECT `username` FROM `users` WHERE `username` = '$username'");
				 if(mysqli_num_rows($sql) > 0){
					  $msg = '<div class="alert alert-danger" role="alert">عذراً و لكن اسم المستخدم مسجل بالفعل</div>';
				 }else{
						if($_POST['password'] != '' OR $_POST['pass'] = ''){
						 if($_POST['password'] != $_POST['pass']){
							 $msg = '<div class="alert alert-danger" role="alert">كلمة المرور غير متطابقة</div>';
						 }else{
								   $password   =  md5($_POST['password']) ;
								   $image      =   $_FILES['image'];
								   $image_name =   $image['name'];
								   $image_tmp  =   $image['tmp_name'];
								   $image_size =  $image['size'];
								   $image_error =  $image['error'];
								   if($image_name != ''){
									   $image_exe = explode('.' , $image_name);
									   $image_exe = strtolower(end($image_exe));
							  
						      $allowd = array('gif','png','jpg','jpeg');
							  
						      if(in_array($image_exe , $allowd)){
									if($image_error === 0){
									if($image_size <= 3000000){
										$new_name = uniqid('user',false) . '.' . $image_exe;
										$image_dir = '../images/avatar/'. $new_name;
						                $image_db = 'images/avatar/'. $new_name;
										      if(move_uploaded_file($image_tmp , $image_dir)){
												  $update_user = "UPDATE `users` SET `username` = '$username' , `password` = '$password' , `gender` = '$_POST[gender]' , `avatar` = '$image_db' , `about_user` = '$_POST[about]' , `facebook` ='$_POST[facebook]' , `twitter` ='$_POST[twitter]' , `youtube` = '$_POST[youtube]' , `role` = '$_POST[role]' WHERE `user_id` ='$id'";
												$sql = mysqli_query($conn, $update_user); 
												if(isset($sql)){
											 $msg =	'<div class="alert alert-success" role="alert">تم تحديث بياناتك بنجاح</div>';	
											  echo  '<meta http-equiv=refresh content="3; \'users.php\' "/>';
										  }	
									   }else{
										  $msg = '<div class="alert alert-danger" role="alert">عذرا حدث خطـأ أثناء نقل الملف</div>';
									   }
									}else{
										$msg = '<div class="alert alert-danger" role="alert"> عذرا و لكن حجم الصورة كبير جدا .يجب أن لا يتعدى 2 MG</div>'; 
									  }
									}else{
										$msg = '<div class="alert alert-danger" role="alert"> عذرا حدث خطـأ غير متوقع أثناء تحميل الصورة</div>'; 
									}
								}else{
									$msg = '<div class="alert alert-danger" role="alert">عذرا و لكن امتداد الصورة غير صحيح</div>';
							  }
						    }else{
								 $update_user = "UPDATE `users` SET `username` = '$username' , `password` = '$password' , `gender` = '$_POST[gender]' , `about_user` = '$_POST[about]' , `facebook` ='$_POST[facebook]' , `twitter` ='$_POST[twitter]' , `youtube` = '$_POST[youtube]' , `role` = '$_POST[role]' WHERE `user_id` ='$id'";
										$sql = mysqli_query($conn, $update_user); 
										 if(isset($sql)){
										   $msg =	'<div class="alert alert-success" role="alert">تم تحديث بياناتك بنجاح</div>';	
											echo  '<meta http-equiv=refresh content="3; \'users.php\' "/>';
								}
							}
						 }
					}else{
								   $image      =   $_FILES['image'];
								   $image_name =   $image['name'];
								   $image_tmp  =   $image['tmp_name'];
								   $image_size =  $image['size'];
								   $image_error =  $image['error'];
								   if($image_name != ''){
									   $image_exe = explode('.' , $image_name);
									   $image_exe = strtolower(end($image_exe));
							  
						      $allowd = array('gif','png','jpg','jpeg');
							  
						      if(in_array($image_exe , $allowd)){
									if($image_error === 0){
									if($image_size <= 3000000){
										$new_name = uniqid('user',false) . '.' . $image_exe;
										$image_dir = '../images/avatar/'. $new_name;
						                $image_db = 'images/avatar/'. $new_name;
										      if(move_uploaded_file($image_tmp , $image_dir)){
												  $update_user = "UPDATE `users` SET `username` = '$username' ,`gender` = '$_POST[gender]' , `avatar` = '$image_db' , `about_user` = '$_POST[about]' , `facebook` ='$_POST[facebook]' , `twitter` ='$_POST[twitter]' , `youtube` = '$_POST[youtube]' , `role` = '$_POST[role]' WHERE `user_id` ='$id'";
												$sql = mysqli_query($conn, $update_user); 
												if(isset($sql)){
											 $msg =	'<div class="alert alert-success" role="alert">تم تحديث بياناتك بنجاح</div>';	
											  echo  '<meta http-equiv=refresh content="3; \'users.php\' "/>';
										  }	
									   }else{
										  $msg = '<div class="alert alert-danger" role="alert">عذرا حدث خطـأ أثناء نقل الملف</div>';
									   }
									}else{
										$msg = '<div class="alert alert-danger" role="alert"> عذرا و لكن حجم الصورة كبير جدا .يجب أن لا يتعدى 2 MG</div>'; 
									  }
									}else{
										$msg = '<div class="alert alert-danger" role="alert"> عذرا حدث خطـأ غير متوقع أثناء تحميل الصورة</div>'; 
									}
								}else{
									$msg = '<div class="alert alert-danger" role="alert">عذرا و لكن امتداد الصورة غير صحيح</div>';
							  }
						    }else{
								 $update_user = "UPDATE `users` SET `username` = '$username' , `gender` = '$_POST[gender]' , `about_user` = '$_POST[about]' , `facebook` ='$_POST[facebook]' , `twitter` ='$_POST[twitter]' , `youtube` = '$_POST[youtube]' , `role` = '$_POST[role]' WHERE `user_id` ='$id'";
										$sql = mysqli_query($conn, $update_user); 
										 if(isset($sql)){
										   $msg =	'<div class="alert alert-success" role="alert">تم تحديث بياناتك بنجاح</div>';	
											echo  '<meta http-equiv=refresh content="3; \'users.php\' "/>';
								}
							}
					   }
				 }
				
			}elseif($username == $user['username'] AND $email != $user['email']){	
							$sql = mysqli_query($conn, "SELECT `email` FROM `users` WHERE `email` = '$email'");
				 if(mysqli_num_rows($sql) > 0){
					  $msg = '<div class="alert alert-danger" role="alert">عذراً, ولكن البريد الالكتروني مسجل بالفعل</div>';
				 }else{
						if($_POST['password'] != '' OR $_POST['pass'] = ''){
						 if($_POST['password'] != $_POST['pass']){
							 $msg = '<div class="alert alert-danger" role="alert">كلمة المرور غير متطابقة</div>';
						 }else{
								   $password   =  md5($_POST['password']) ;
								   $image      =   $_FILES['image'];
								   $image_name =   $image['name'];
								   $image_tmp  =   $image['tmp_name'];
								   $image_size =  $image['size'];
								   $image_error =  $image['error'];
								   if($image_name != ''){
									   $image_exe = explode('.' , $image_name);
									   $image_exe = strtolower(end($image_exe));
							  
						      $allowd = array('gif','png','jpg','jpeg');
							  
						      if(in_array($image_exe , $allowd)){
									if($image_error === 0){
									if($image_size <= 3000000){
										$new_name = uniqid('user',false) . '.' . $image_exe;
										$image_dir = '../images/avatar/'. $new_name;
						                $image_db = 'images/avatar/'. $new_name;
										      if(move_uploaded_file($image_tmp , $image_dir)){
												  $update_user = "UPDATE `users` SET `email` = '$email' , `password` = '$password' , `gender` = '$_POST[gender]' , `avatar` = '$image_db' , `about_user` = '$_POST[about]' , `facebook` ='$_POST[facebook]' , `twitter` ='$_POST[twitter]' , `youtube` = '$_POST[youtube]' , `role` = '$_POST[role]' WHERE `user_id` ='$id'";
												$sql = mysqli_query($conn, $update_user); 
												if(isset($sql)){
											 $msg =	'<div class="alert alert-success" role="alert">تم تحديث بياناتك بنجاح</div>';	
											  echo  '<meta http-equiv=refresh content="3; \'users.php\' "/>';
										  }	
									   }else{
										  $msg = '<div class="alert alert-danger" role="alert">عذرا حدث خطـأ أثناء نقل الملف</div>';
									   }
									}else{
										$msg = '<div class="alert alert-danger" role="alert"> عذرا و لكن حجم الصورة كبير جدا .يجب أن لا يتعدى 2 MG</div>'; 
									  }
									}else{
										$msg = '<div class="alert alert-danger" role="alert"> عذرا حدث خطـأ غير متوقع أثناء تحميل الصورة</div>'; 
									}
								}else{
									$msg = '<div class="alert alert-danger" role="alert">عذرا و لكن امتداد الصورة غير صحيح</div>';
							  }
						    }else{
								 $update_user = "UPDATE `users` SET `email` = '$email' , `password` = '$password' , `gender` = '$_POST[gender]' , `about_user` = '$_POST[about]' , `facebook` ='$_POST[facebook]' , `twitter` ='$_POST[twitter]' , `youtube` = '$_POST[youtube]' , `role` = '$_POST[role]' WHERE `user_id` ='$id'";
										$sql = mysqli_query($conn, $update_user); 
										 if(isset($sql)){
										   $msg =	'<div class="alert alert-success" role="alert">تم تحديث بياناتك بنجاح</div>';	
											echo  '<meta http-equiv=refresh content="3; \'users.php\' "/>';
								}
							}
						 }
					}else{
								   $image      =   $_FILES['image'];
								   $image_name =   $image['name'];
								   $image_tmp  =   $image['tmp_name'];
								   $image_size =  $image['size'];
								   $image_error =  $image['error'];
								   if($image_name != ''){
									   $image_exe = explode('.' , $image_name);
									   $image_exe = strtolower(end($image_exe));
							  
						      $allowd = array('gif','png','jpg','jpeg');
							  
						      if(in_array($image_exe , $allowd)){
									if($image_error === 0){
									if($image_size <= 3000000){
										$new_name = uniqid('user',false) . '.' . $image_exe;
										$image_dir = '../images/avatar/'. $new_name;
						                $image_db = 'images/avatar/'. $new_name;
										      if(move_uploaded_file($image_tmp , $image_dir)){
												  $update_user = "UPDATE `users` SET `email` = '$email' ,`gender` = '$_POST[gender]' , `avatar` = '$image_db' , `about_user` = '$_POST[about]' , `facebook` ='$_POST[facebook]' , `twitter` ='$_POST[twitter]' , `youtube` = '$_POST[youtube]' , `role` = '$_POST[role]' WHERE `user_id` ='$id'";
												$sql = mysqli_query($conn, $update_user); 
												if(isset($sql)){
											 $msg =	'<div class="alert alert-success" role="alert">تم تحديث بياناتك بنجاح</div>';	
											  echo  '<meta http-equiv=refresh content="3; \'users.php\' "/>';
										  }	
									   }else{
										  $msg = '<div class="alert alert-danger" role="alert">عذرا حدث خطـأ أثناء نقل الملف</div>';
									   }
									}else{
										$msg = '<div class="alert alert-danger" role="alert"> عذرا و لكن حجم الصورة كبير جدا .يجب أن لا يتعدى 2 MG</div>'; 
									  }
									}else{
										$msg = '<div class="alert alert-danger" role="alert"> عذرا حدث خطـأ غير متوقع أثناء تحميل الصورة</div>'; 
									}
								}else{
									$msg = '<div class="alert alert-danger" role="alert">عذرا و لكن امتداد الصورة غير صحيح</div>';
							  }
						    }else{
								 $update_user = "UPDATE `users` SET `email` = '$email' , `gender` = '$_POST[gender]' , `about_user` = '$_POST[about]' , `facebook` ='$_POST[facebook]' , `twitter` ='$_POST[twitter]' , `youtube` = '$_POST[youtube]' , `role` = '$_POST[role]' WHERE `user_id` ='$id'";
										$sql = mysqli_query($conn, $update_user); 
										 if(isset($sql)){
										   $msg =	'<div class="alert alert-success" role="alert">تم تحديث بياناتك بنجاح</div>';	
											echo  '<meta http-equiv=refresh content="3; \'users.php\' "/>';
								}
							}
					   }
				 }
				
			}else{
					 $msg = '<div class="alert alert-danger" role="alert"> اسم المستخدم أو البريد الالكتروني مسجل بالفعل</div>';
			  }
			}else{
									if($_POST['password'] != '' OR $_POST['pass'] = ''){
						 if($_POST['password'] != $_POST['pass']){
							 $msg = '<div class="alert alert-danger" role="alert">كلمة المرور غير متطابقة</div>';
						 }else{
								   $password   =  md5($_POST['password']) ;
								   $image      =   $_FILES['image'];
								   $image_name =   $image['name'];
								   $image_tmp  =   $image['tmp_name'];
								   $image_size =  $image['size'];
								   $image_error =  $image['error'];
								   if($image_name != ''){
									   $image_exe = explode('.' , $image_name);
									   $image_exe = strtolower(end($image_exe));
							  
						      $allowd = array('gif','png','jpg','jpeg');
							  
						      if(in_array($image_exe , $allowd)){
									if($image_error === 0){
									if($image_size <= 3000000){
										$new_name = uniqid('user',false) . '.' . $image_exe;
										$image_dir = '../images/avatar/'. $new_name;
						                $image_db = 'images/avatar/'. $new_name;
										      if(move_uploaded_file($image_tmp , $image_dir)){
												  $update_user = "UPDATE `users` SET `username` = '$username' , `email` = '$email' , `password` = '$password' , `gender` = '$_POST[gender]' , `avatar` = '$image_db' , `about_user` = '$_POST[about]' , `facebook` ='$_POST[facebook]' , `twitter` ='$_POST[twitter]' , `youtube` = '$_POST[youtube]' , `role` = '$_POST[role]' WHERE `user_id` ='$id'";
												$sql = mysqli_query($conn, $update_user); 
												if(isset($sql)){
											 $msg =	'<div class="alert alert-success" role="alert">تم تحديث بياناتك بنجاح</div>';	
											  echo  '<meta http-equiv=refresh content="3; \'users.php\' "/>';
										  }	
									   }else{
										  $msg = '<div class="alert alert-danger" role="alert">عذرا حدث خطـأ أثناء نقل الملف</div>';
									   }
									}else{
										$msg = '<div class="alert alert-danger" role="alert"> عذرا و لكن حجم الصورة كبير جدا .يجب أن لا يتعدى 2 MG</div>'; 
									  }
									}else{
										$msg = '<div class="alert alert-danger" role="alert"> عذرا حدث خطـأ غير متوقع أثناء تحميل الصورة</div>'; 
									}
								}else{
									$msg = '<div class="alert alert-danger" role="alert">عذرا و لكن امتداد الصورة غير صحيح</div>';
							  }
						    }else{
								 $update_user = "UPDATE `users` SET `username` = '$username' , `email` = '$email' , `password` = '$password' , `gender` = '$_POST[gender]' , `about_user` = '$_POST[about]' , `facebook` ='$_POST[facebook]' , `twitter` ='$_POST[twitter]' , `youtube` = '$_POST[youtube]' , `role` = '$_POST[role]' WHERE `user_id` ='$id'";
										$sql = mysqli_query($conn, $update_user); 
										 if(isset($sql)){
										   $msg =	'<div class="alert alert-success" role="alert">تم تحديث بياناتك بنجاح</div>';	
											echo  '<meta http-equiv=refresh content="3; \'users.php\' "/>';
								}
							}
						 }
					}else{
								   $image      =   $_FILES['image'];
								   $image_name =   $image['name'];
								   $image_tmp  =   $image['tmp_name'];
								   $image_size =  $image['size'];
								   $image_error =  $image['error'];
								   if($image_name != ''){
									   $image_exe = explode('.' , $image_name);
									   $image_exe = strtolower(end($image_exe));
							  
						      $allowd = array('gif','png','jpg','jpeg');
							  
						      if(in_array($image_exe , $allowd)){
									if($image_error === 0){
									if($image_size <= 3000000){
										$new_name = uniqid('user',false) . '.' . $image_exe;
										$image_dir = '../images/avatar/'. $new_name;
						                $image_db = 'images/avatar/'. $new_name;
										      if(move_uploaded_file($image_tmp , $image_dir)){
												  $update_user = "UPDATE `users` SET `username` = '$username' , `email` = '$email' ,`gender` = '$_POST[gender]' , `avatar` = '$image_db' , `about_user` = '$_POST[about]' , `facebook` ='$_POST[facebook]' , `twitter` ='$_POST[twitter]' , `youtube` = '$_POST[youtube]' , `role` = '$_POST[role]' WHERE `user_id` ='$id'";
												$sql = mysqli_query($conn, $update_user); 
												if(isset($sql)){
											 $msg =	'<div class="alert alert-success" role="alert">تم تحديث بياناتك بنجاح</div>';	
											  echo  '<meta http-equiv=refresh content="3; \'users.php\' "/>';
										  }	
									   }else{
										  $msg = '<div class="alert alert-danger" role="alert">عذرا حدث خطـأ أثناء نقل الملف</div>';
									   }
									}else{
										$msg = '<div class="alert alert-danger" role="alert"> عذرا و لكن حجم الصورة كبير جدا .يجب أن لا يتعدى 2 MG</div>'; 
									  }
									}else{
										$msg = '<div class="alert alert-danger" role="alert"> عذرا حدث خطـأ غير متوقع أثناء تحميل الصورة</div>'; 
									}
								}else{
									$msg = '<div class="alert alert-danger" role="alert">عذرا و لكن امتداد الصورة غير صحيح</div>';
							  }
						    }else{
								 $update_user = "UPDATE `users` SET  `username` = '$username' , `email` = '$email' , `gender` = '$_POST[gender]' , `about_user` = '$_POST[about]' , `facebook` ='$_POST[facebook]' , `twitter` ='$_POST[twitter]' , `youtube` = '$_POST[youtube]' , `role` = '$_POST[role]' WHERE `user_id` ='$id'";
										$sql = mysqli_query($conn, $update_user); 
										 if(isset($sql)){
										   $msg =	'<div class="alert alert-success" role="alert">تم تحديث بياناتك بنجاح</div>';	
											echo  '<meta http-equiv=refresh content="3; \'users.php\' "/>';
								}
							}
					   }
			}
		}	
	}
	$get_user = mysqli_query($conn,"SELECT * FROM `users` WHERE `user_id` = '$id'"); 
		     $user = mysqli_fetch_assoc($get_user);
    ?>
	 <article class="col-lg-9">
	  <?php echo $msg;  ?>
	 <div class="panel panel-info">
		  <div class="panel-heading"><b> تعديل بيانات العضو :  <?php echo $user['username'];  ?></b></div>
		  <div class="panel-body">
		 <form action="" method="post" class="form-horizontal col-md-9"   enctype="multipart/form-data" >
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
				  <textarea class="form-control" name="about" id="about" rows="4"><?php echo $user['about_user']; ?></textarea>
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
			    <div class="form-group">
				<label for="role"  class="col-sm-2 control-label">الصلاحية </label>
				<div class="col-sm-7">
				  <select name="role" class="form-control"   id="role">
					<option value="user" <?php echo ($user['role'] == 'user' ? 'selected' : '' );?>> عضو</option> 
				   <option value="admin" <?php echo ($user['role'] == 'admin' ? 'selected' : '' );?>> مدير</option> 
				   <option value="writer" <?php echo ($user['role'] == 'writer' ? 'selected' : '' );?>> كاتب</option> 
				  </select>
				</div>
				</div>
			  <div class="form-group">
				<div class="col-sm-offset-2 col-sm-9">
				  <button type="submit" name="submit" id="submit" value="submit" class="btn btn-danger btn-block"> تعديل البيانات <i class="fa fa-pencil" aria-hidden="true"></i></button>
				</div>
			  </div>
			</form>
			<div class="panel panel-defaultv col-md-3">
			  <div class="panel-body">
				<img src="../<?php echo $user['avatar']; ?>" width="100%" />
			  </div>
			</div>
		  </div>
		</div>
	   </article>
	
<?php 
  include_once("inc/footer.php");

    ?>