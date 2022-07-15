<!DOCTYPE html>
<html>

<head>
	<meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <title>Phu Deeptry Store</title>
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:400" rel="stylesheet" />    
	<link href="css/templatemo-style.css" rel="stylesheet" />
	<link rel="stylesheet" href="style.css" type="text/css" media="all" />
</head>
<?php
Session_Start();
include_once("connection.php");
?>
<body> 


		<main>
			<div class="container">
	<!-- Top box -->
		<!-- Logo & Site Name -->
		<div class="placeholder">
			<div class="parallax-window" data-parallax="scroll" data-image-src="Picture/LOGO/anhbia.png">
				<div class="tm-header">
					<div class="row tm-header-inner">
						<div class="col-md-6 col-12">
						</div>
						<nav class="col-md-6 col-12 tm-nav">
							<ul class="tm-nav-ul">
								<li class="tm-nav-li"><a href="index.php" class="tm-nav-link">Home &nbsp;</a></li>
								<li class="tm-nav-li" ><a href="?page=category_management"class="tm-nav-link">&nbsp;Category&nbsp;management&nbsp;</a></li>
								<li class="tm-nav-li"><a href="?page=product_management" class="tm-nav-link">&nbsp;Product&nbsp;management&nbsp;</a></li>
								<?php
                              	if(isset($_SESSION['us']) && $_SESSION['us'] != "") {
                            	?>
								<ul>
                                 <li class="tm-nav-li"><a class="tm-nav-link" href="?page=update_customer">&nbsp;Hello,&nbsp;<?php echo $_SESSION['us'];?></a> 
                              </li>
							  </ul>
							  <br>
                                 <li class="tm-nav-li"><a class="tm-nav-link"  href="?page=logout" >
                                 <i class="fa fa-crosshairs">&nbsp;</i>&nbsp;Logout</a></li>
                            <?php
                                }
                                 else
                                {
                            ?>
							<li class="tm-nav-li"><a href="?page=login" class="tm-nav-link">&nbsp;Login&nbsp;</a></li>
							<li class="tm-nav-li"><a href="?page=register" class="tm-nav-link">&nbsp;Register</a></li>
							<?php
							}
							?>
							</ul>
						</nav>	
					</div>
				</div>
			</div>
		</div>
				
			</header>
		<?php
		if(isset($_GET['page']))
		{ 
			
			$page=$_GET['page'];
			if($page=="register"){
				include_once("Register.php");
			}
			elseif($page=="login"){
				include_once("login.php");
			}
			elseif($page=="category_management"){
				include_once("Category_Management.php");
			}
			elseif($page=="product_management"){
				include_once("Product_Management.php");
			}
			else if($page=="update_category"){
				include_once("Update_Category.php");
			}
			else if($page=="add_product"){
				include_once("Add_Product.php");
			}
			else if($page=="update_product"){
				include_once("Update_Product.php");
			}
			else if($page=="logout") {
				include_once("Logout.php");
			}
			else if($page=="add_category") {
				include_once("Add_Category.php");
			}
			else if($page=="update_customer") {
				include_once("Update_customer.php");
			}
		}
		else{
			include_once("content.php");
		}
		?>
			
			
			
			</div>
		</main>

		
	</div>
	<script src="js/jquery.min.js"></script>
	<script src="js/parallax.min.js"></script>
	<script>
		$(document).ready(function(){
			// Handle click on paging links
			$('.tm-paging-link').click(function(e){
				e.preventDefault();
				
				var page = $(this).text().toLowerCase();
				$('.tm-gallery-page').addClass('hidden');
				$('#tm-gallery-page-' + page).removeClass('hidden');
				$('.tm-paging-link').removeClass('active');
				$(this).addClass("active");
			});
		});
	</script>
</body>
<footer>
	<h4 style= "color: black"> 
	<center><a href="https://www.facebook.com/Typhu.Urs/" target="_blank"><img src="Picture/LOGO/fbb.png" width="1%"></a>&nbsp;Facebook: HA TY PHU<br> 
			Tel: <a href="tel:0948459460" target="_blank"><img src="Picture/phone.png" width="1%">(+84) 948 459 460</a><br>
			<H4 style="color: black">Address: Alley 51 Street 3/2, Ninh Kieu district, Can Tho city.</center></H4>
	</h4>
</footer>	
</html>