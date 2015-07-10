<!doctype html>
<html lang="en">
   <head>
      <meta charset="utf-8">
      <title>jQuery UI Slider functionality</title>
      <link href="http://code.jquery.com/ui/1.10.4/themes/ui-lightness/jquery-ui.css" rel="stylesheet">
      <script src="http://code.jquery.com/jquery-1.10.2.js"></script>
      <script src="http://code.jquery.com/ui/1.10.4/jquery-ui.js"></script>
      <!-- Javascript -->
      <script>
      	
         $(function() {
            $( "#slider-6" ).slider({
               range:true,
               min: 0,
               max: 100,
               step:20,
               values: [ 0 , 60 ],
         		
         	   
              
               slide: function( event, ui ) {
                  
                 
                  
                  if(ui.values[1] == 0) {
                   $( "#slidevalue" )
                     .val('.5' );
                  }
                  else if(ui.values[1] == 20) {
                  $( "#slidevalue" )
                     .val('1');
                  }
                  else if(ui.values[1] == 40)  {
                  $( "#slidevalue" )
                     .val('3');
                  }
                  else if(ui.values[1] == 60)  {
                  $( "#slidevalue" )
                     .val('5');
                  }
                  else if(ui.values[1] == 80)  {
                  $( "#slidevalue" )
                     .val('10');
                  }
                  else {
                  $( "#slidevalue" )
                     .val('25');
                  }
                  
               }
           });
         });
      </script>
   </head>
   <body>
      <!-- HTML --> 
      <div id="slider-6"></div>

      <p>
         <label for="slidevalue">Slide:</label>
         <input type="text" id="slidevalue" placeholder="5" 
            style="border:0; color:#b9cd6d; font-weight:bold;">
      </p>
   </body>
</html>