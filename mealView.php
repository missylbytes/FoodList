<div class="col-md-6">
        <div class="gallery">

          	<div class="row">
          			
          			<div class="price">
          				$<? echo $row["id"]; ?>
          			</div>
          			<img src="uploads/<? echo $row["location"]; ?>" alt="">

   				 		
   				 		<div class="galleryBrowse" >         			
          					
          					<div class="col-md-10 mealInfo">
          						<div class="mealName">
          							<b><? echo $row["mealName"]; ?></b>
          						</div>
          						<div class="ingredients col-md-10">
          							<? echo $row["mealText"]; ?>
          						</div>
          						<div class="keywords col-md-10">
          							<span class="glyphicon glyphicon-tags" style="margin-right:3px;"></span>
          							<b>Tags:</b>
          							<a href="#"> Vegan</a>, 
          							<a href="#"> Gluten-Free</a>,
          							<a href="#"> Ready-to-Eat</a>
          						</div>
          					</div>
          					
          					<div class="reserveMealDiv col-md-12 ">
          						<p><a class="reserveMealBtn btn btn-default" href="#" role="button">Reserve Meal »</a></p>
          					</div>
          					
          				</div>

        		</div>
        </div>
</div>
       