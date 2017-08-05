<?php 
  include_once("inc/header.php");
  include_once("inc/sidebar.php");
         $msg = '';
		 $msg2 = '';
        if(isset($_POST['add_cate'])){
			if(empty($_POST['category'])){
				 $msg ='<div class="alert alert-danger" role="alert">الرجاء إدخال اسم التصنيف</div>';
			}else{
				$insert = mysqli_query($conn, "INSERT INTO `category` (`category`) VALUES ('$_POST[category]')");
				if(isset($insert)){
					$msg ='<div class="alert alert-success" role="alert"> تم إضافة التصنيف بنجاح</div>';
			     }
			 }
			
		  }
		  if(isset($_GET['delete'])){
			  $del_cate = mysqli_query($conn, "DELETE  FROM `category` WHERE `cate_id` = '$_GET[delete]'");
			  if(isset($del_cate)){
				  $msg2 ='<div class="alert alert-success" role="alert"> تم حذف التصنيف بنجاح</div>';
				  
			  }
		  }
    ?>
	
	 <article class="col-lg-9">
	 <div class="row">
	   <div class="col-md-8">
	   <?php echo $msg2; ?>
	    <div class="panel panel-info">
		  <div class="panel-heading">التصنيفات بالموقع</div>
		  <div class="panel-body">
			<table class="table table-hover">
			<thead>
             <tr>
			      <th>#</th>
				  <th>اسم التصنيف</th>
				  <th>التعديل</th>
				  <th>الحذف</th>
			 </tr>
			 </thead>
			 <tbody>
 <?php 
			 $cat = mysqli_query($conn,"SELECT * FROM `category`ORDER BY `cate_id` DESC");
			 $num = 1;
			while($category = mysqli_fetch_assoc($cat)){
				echo '
				 <tr>
			       <td>'.$num.'</td>
				    <td>'.$category['category'].'</td>
				    <td><a href="edite_category.php?cate='.$category['cate_id'].'" class="btn btn-warning btn-xs ">تعديل</a> </td>
					 <td><a href="category.php?delete='.$category['cate_id'].'" class="btn btn-danger btn-xs ">حذف</a> </td>
					 
			  </tr>';
			  $num++;
			}
 ?>
			 </tbody>
           </table>
		  </div>
		</div>
	  </div>
	 <div class="col-md-4"> 
	   <div class="panel panel-info">
		  <div class="panel-heading">اضافة تصنيف جديد</div>
		  <div class="panel-body">
			<form action="" method="post" class="form-horizontal">
			  <div class="form-group">
				<label for="category" class="col-sm-4 control-label">اسم التصنيف </label>
				<div class="col-sm-8">
				  <input type="text" class="form-control" name="category" id="category" placeholder="ادخل اسم التصنيف الجديد">
				</div>
			  </div>
			  <hr/>
			  <div class="form-group">
				<div class="col-sm-offset-4 col-sm-8">
				 <?php  echo $msg; ?>
				  <input type="submit" class="btn btn-info" name="add_cate" value="اضافة التصنيف" >  </input>
				</div>
			  </div>
			</form>
		  </div>
		</div>
	 </div>
	 </div>
	   </article>
	
		
<?php 
  include_once("inc/footer.php");

    ?>