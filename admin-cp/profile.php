<?php 
  include_once("inc/header.php");
  include_once("inc/sidebar.php");
     $get_user = mysqli_query($conn, "SELECT * FROM `users` WHERE `user_id` = '$_SESSION[id]' ");
     $user = mysqli_fetch_object($get_user);
	 
	   $msg = '';
    
		  if(isset($_GET['status']) AND isset($_GET['post'])){
			  $sql = mysqli_query($conn, "UPDATE `posts` SET `status` = '$_GET[status]' WHERE `post_id` = '$_GET[post]'");
			   if(isset($sql)){
				  $msg = '<div class="alert alert-success" role="alert">تم تحديث الحالة بنجاح  .. جاري تحديث الصفحة</div>';
				  echo  '<meta http-equiv=refresh content="2; \'profile.php\' "/>';
			  }
		  }
		  if(isset($_GET['delete'])){
			  $sql = mysqli_query($conn, "DELETE FROM `posts` WHERE `post_id` = '$_GET[delete]'" );
			  if(isset($sql)){
				  $msg = '<div class="alert alert-success" role="alert">تم الحذف بنجاح, جاري تحديث الصفحة</div>';
				  echo  '<meta http-equiv=refresh content="2; \'profile.php\' "/>';
			  }
		  }

    ?>
	 <article class="col-lg-9">
	  <?php echo $msg;  ?>
	   <div class="col-md-1"></div>
		  <div class="col-md-10">
           <div class="row">
            <div class="panel panel-info">
		     <div class="panel-heading"><b> أهلا و سهلا يك يا <?php echo $user->username; ?></b></div>
		      <div class="panel-body">
			  <div class="col-md-9">
			   <p> <b> اسم المستخدم : <?php echo $user->username; ?></b></p>
			   <p> <b> البريد الالكتروني : <?php echo $user->email; ?></b></p>
			   <p> <b> الجنس : <?php echo $user->gender; ?></b></p>
			   <p> <b> تاريخ التسجيل : <?php echo $user->reg_date; ?></b></p>
			   <p> <b> روابط التواصل : <a href="<?php echo $user->facebook; ?>" target="_blank"><i class="fa fa-facebook-square fa-lg" style="margin: 0px 6px;"></i> </a> | 
			                           <a href="<?php echo $user->twitter; ?>" target="_blank"><i class="fa fa-twitter-square fa-lg" style="margin: 0px 6px; color: #49C8DE;"></i> </a> | 
									   <a href="<?php echo $user->youtube; ?>" target="_blank"><i class="fa fa-youtube-square fa-lg" style="margin: 0px 6px; color: #f10544;"></i> </a> 
									   </b></p>
			   <p> <b> الجنس :</b></p>
			  </div>
			  <div class="col-md-3">
			    <img src="../<?php echo $user->avatar; ?>" class="img-thumbnail" width="100%" />
			  </div>
			    <div class="col-md-12">
				 <hr>
				    <p><b>وصف مختصر :</b></p>
					<p> <?php echo strip_tags($user->about_user); ?></p>
					<a href="edite_user.php?user=<?php echo $user->user_id; ?>" class="btn btn-danger pull-left" >تعديل البيانات</a>
					
				</div>
		      </div>
		    </div>
		   </div>
		 </div>
		 <div class="col-md-12">
		 <div class="row">
		  <div class="col-md-1"></div>
		   <div class="col-md-10">
		    <div class="panel panel-warning">
			  <div class="panel-heading">المواضيع التي قمت بكتابتها</div>
			   <div class="panel-body">
			  <div class="col-md-12">
			<table class="table table-hover">
			<thead>
             <tr>
			      <th>#</th>
				  <th>صورة المقال</th>
				  <th>عنوان المقال</th>
				  <th>تاريخ النشر</th>
				  <th>مشاهدة</th>
				  <th>الحالة</th>
				  <th>تعديل</th>
				  <th>حذف</th>
			 </tr>
			 </thead>
			 <tbody>
 <?php 
			 $posts = mysqli_query($conn,"SELECT * FROM `posts` WHERE author = '$_SESSION[id]' ORDER BY `post_id` DESC LIMIT 5");
			 $num = 1;
			while($post = mysqli_fetch_assoc($posts)){
				echo '
				 <tr>
			       <td>'.$num.'</td>
				    <td><img src="../'.($post['image'] == '' ? 'images/no-image.png ' : $post['image']).'" class="img-rounded" width="70px"</td>
					 <td>'.substr($post['title'],0,40).'.....</td>
					<td>'.$post['post_date'].'</td>
					<td><a href="../post.php?id='.$post['post_id'].'" class="btn btn-primary btn-xs" target="_blank">مشاهدة المقال</a> </td>
				    <td>'.($post['status'] == 'dreft' ? '<a href="profile.php?status=puplished&post='.$post['post_id'].'" class="btn btn-success btn-xs ">نشر</a>' : '<a href="profile.php?status=dreft&post='.$post['post_id'].'" class="btn btn-info btn-xs">تعطيل</a>').'</td>	
				    <td><a href="edite_post.php?post='.$post['post_id'].'" class="btn btn-warning btn-xs ">تعديل</a> </td>
					 <td><a href="profile.php?delete='.$post['post_id'].'" class="btn btn-danger btn-xs ">حذف</a> </td>
					 
			  </tr>';
			  $num++;
			}
 ?>
			    </tbody>
               </table>
			 </div>
		    </div>  
			</div>
		   </div>
	   </article>
	
<?php 
  include_once("inc/footer.php");

    ?>