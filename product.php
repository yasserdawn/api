<?php
$json = file_get_contents("http://rdapi.herokuapp.com/product/read.php");

$data = json_decode($json,true);
$list = $data['records'];
 
if(isset($_POST['search'])){
   $search = $_POST['search'];
   $jsearch = file_get_contents('http://rdapi.herokuapp.com/product/search.php?s='.$search);
   $res = json_decode($jsearch,true);

   $list = $res['records'];
   
}else{
   $list = $data['records'];
}
?>

  <link rel="stylesheet" type="text/css" href="css/style.css">
  <meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  

<h1> Product List </h1>

    <div id="cover">
    <form action="index.php?page=product" method="POST">
    <div class="tb">
      <div class="td"><input type="text" name="search" placeholder="Search"></div>
      <div class="td" id="s-cover">
        <button type="submit" name="submit" value="Search">
          <div id="s-circle"></div>
          <span></span>
        </button>
      </div>
    </div>
  </form>
</div>


<table id="list">
    <tr>
        <th>ID</th>
        <th>Product</th>
        <th>Description</th>
        <th>Price</th>
        <th>Category</th>
    </tr>
<?php
foreach($list as $value){
    ?>
    <tr>
        <td><?php echo $value['id'];?></td>
        <td id ="link"><a href="product-details.php?id=<?php echo $value['id'];?>"><?php echo $value['name'];?></a></td>
        <td><?php echo $value['description'];?></td>
        <td><?php echo $value['price'];?></td>
        <td><?php echo $value['category_name'];?></td>
    </tr>
<?php
}
    ?>
</table>
