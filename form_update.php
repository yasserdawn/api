<?php
	$id = $_GET['id'];
	$json = file_get_contents('http://rdapi.herokuapp.com/product/read_one.php?id='.$id);
	$data = json_decode($json,true);
	$details = array('records' => $data);
	$result = $details['records'];
	//category
	$json2 = file_get_contents('http://rdapi.herokuapp.com/category/read.php');
	$data2 = json_decode($json2,true);
	$category = $data2['records'];
?>
<html> 
    <head>  
      <link rel="stylesheet" type="text/css" href="css/style.css">
    </head>
	<br>
<div id="container">
			<div id="content">
					<div class="navbar">
						<a href="index.php?page=home" id = "home">Home</a>
						<a href="index.php?page=product" id = "product">Show</a>
						<a href="index.php?page=categories" id = "category">Category</a>
						<a href="index.php?page=create" id = "create">Create</a>
					</div>
					
					
		<div class="form-style-5">		
				<h1> Update Product </h1>
				<form action="pro_update.php?id=<?php echo $id ?>" method="POST">
					Product:<input type="text" name="name" value="<?php echo $result['name'];?>"/>
					Description:<input type="text" name="description" value="<?php echo $result['description']; ?>"/>
					Price:<input type="text" name="price" value="<?php echo $result['price']; ?>"/>
					Category:<select name="category">
					<option value="<?php echo $result['category_id'];?>"><?php echo $result['category_name'];?></option>
						<?php
						foreach($category as $cview){
						?>
							<option value="<?php echo $cview['id']?>"><?php echo $cview['name']?></option>
						<?php
						}
						?>
						</select>
					<input type="submit" name="submit" value="submit"/>

				</form>
		</div>	
			</div>	
</div>	
</html>
