
<h4 class="tm-gallery-title"><center>Lastest Product</center></h4>

			<div class="row tm-gallery">
			<?php
			include_once("connection.php");
			$result = mysqli_query($conn, "SELECT * FROM product" );
			while($row = mysqli_fetch_array($result, MYSQLI_ASSOC)){
			?>
				<div id="tm-gallery-page-Phone">
					<article class="col-lg-3 col-md-4 col-sm-6 col-12 tm-gallery-item">
						<figure>
							<img src="Picture\<?php echo $row['Pro_image']?>"  alt="Image" width="250px" height="250px"/>
							<figcaption>
								<h4 class="tm-gallery-title"><center><?php echo $row['Product_Name']?></center></h4>
								<p class="tm-gallery-description"> <?php echo $row['SmallDesc']?></p>
								<p class="tm-gallery-price"><?php echo $row['Price']?>$</p>
							</figcaption>
						</figure>
					</article>
					
				 </div>
				<?php } ?>
				</div>
