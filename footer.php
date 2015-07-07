<footer style="display:block; margin-top:100px;">
    <p>©AppVengers Inc. d/b/a MealMouse 2015</p>
</footer>





    <!-- Bootstrap core JavaScript-->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
 

        
        
    <!-- My JS Funcs-->
 	<script type="text/javascript">
 	
 	
 	var distance = $('.browseOptions').offset().top,
    $window = $(window);

	$window.scroll(function() {
    if ( $window.scrollTop() >= distance ) {
         $(".navbar-container").slideUp();
         $(".browseOptions").appendTo(".navbar");
          }
    });
 	
 	$(".loginLink").click(function() {
  		$(".loginDiv").slideDown('slow');
  	});
  	
  	$(".loginDivClose").click(function() {
  		$(".loginDiv").slideUp('slow');
  	});
 
 	$(".howitworks").click(function(){
        $("#howItWorksModal").modal('show');
    });
    
    $(".reserveMealBtn").click(function(){
        $("#reserveMealModal").modal('show');
    });
  
    
    
    </script>
    
    

</body>			  
</html>

