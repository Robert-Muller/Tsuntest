<!DOCTYPE html>
<html> 
        <head> 
              <meta charset="UTF-8"> 
              <title>Trang chủ</title> 
			  <link rel="stylesheet" href="Trangchu.css">
			  <link rel="stylesheet" href="products.css">
              <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css"> 
              <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css">
        </head> 
        <?php
		include 'a.php';
        include 'header.php';
    ?>
			<section class="sliders">
				 <div class="aspect-ratio-169">
					 <img  src="slide1.jpg" /> 
					 <img  src="slide2.jpg" /> 
					 <img  src="slide3.jpg" /> 
					 <img  src="slide4.jpg" /> 
				</div>
				<div class="dot-container">
					<div class="dot active"></div>
					<div class="dot"></div>
					<div class="dot"></div>
					<div class="dot"></div>
                </div>
				<h1 style='text-align: center; margin:40px; font-size: 30px; color:rgb(46, 223, 214);'><?php 
           			echo "Sản phẩm mới";
					$sql="SELECT * FROM product ORDER BY id DESC limit 16";
					$result = mysqli_query($conn, $sql);
					?>
				</h1>
        <div class="product">
        <?php
            while($row = mysqli_fetch_assoc($result)){
        ?>
            <div class="slot">
                <a href="productdetails.php?id=<?php echo $row["ID"] ?>">
                <div class="image-product">
                    <div class="item-image">
                    <p>-<?php echo (round(100-$row["Price_Sale"]/$row["Price_default"]*100))?>%</p>
                    <i class="fa fa-search-plus plus-details"></i>
                    </div>
                    <img class="simage-product"
                    src="<?php echo $row["image_name"] ?>" onmouseover="this.src='<?php echo $row['image_name2'] ?>'" onmouseout="this.src='<?php echo $row['image_name'] ?>'">
                </div>
                </a>
                <div class="product-name">
                    <a href="productdetails.php?id=<?php echo $row["ID"] ?>"><h2><?php echo $row["Name"] ?></h2></a>
                    <p><?php echo $row["Price_Sale"]."đ" ?> <del><?php echo $row["Price_default"]."đ" ?></del></p>
                </div>
            </div>
        <?php
            }
        ?>
        </div>
			</section>
             <script type="text/javascript"> 
			  const imgItem = document.querySelectorAll(".aspect-ratio-169 img")
				 const imgItemContainer = document.querySelector(".aspect-ratio-169")
				 const dotItem = document.querySelectorAll(".dot")
				 let index = 0;
				 let imgLeng = imgItem.length
				 imgItem.forEach(function(image,index){
					 image.style.left = index*100 + "%"
					 dotItem[index].addEventListener("click",function(){
					 slideRun (index)
					 })
				 })
				 function slider (){
					 index++;
					 if(index >= imgLeng){index=0}
				   
					 slideRun (index)
				 }
				 function slideRun (index) {
					 imgItemContainer.style.left = "-" + index*100 + "%"
					 const dotActive = document.querySelector(".active")
					 dotActive.classList.remove("active")
					 dotItem[index].classList.add("active");
				 }
				 setInterval (slider,5000)
				const toP = document.querySelector(".top")
				window.addEventListener("scroll",function(){
					const X = this.pageYOffset;
				  if(X>1){toP.classList.add("active")}
				  else {
					  toP.classList.remove("active")
				  }
				}) 
				</script>
			
    <?php 
    include 'footer.php';
    ?>