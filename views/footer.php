<footer class="footer">

    <div class="container">
        
        <p>&copy; My Website 2022 </p>
    
    </div>

</footer>
     
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
 
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.2/js/bootstrap.min.js" integrity="sha384-vZ2WRJMwsjRMW/8U7i6PWi6AlO1L79snBrmgiDpgIWJ82z8eA5lenwvxbMV1PAh7" crossorigin="anonymous"></script>
<!-- Modal -->

<div class="modal fade" id="exampleModal" tabindex="-1" 
role="dialog" aria-labelledby="exampleModalLabel"
 aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
      <h4 class="modal-title" id="loginModaltitle">Login</h4>
        <button type="button" class="close" data-dismiss="modal"
         aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
          
      </div>
      <div class="modal-body">
            <div class="alert alert-danger" id="loginAlert"></div>

      <form>
           <input type="hidden" id="loginActive"
            name="LoginActive" value="1">
   <fieldset class="form-group">
    <label for="email">Email</label>
    <input type="email" class="form-control" id="email" placeholder="Email address">
  </fieldset>
  <fieldset class="form-group">
    <label for="password">Password</label>
    <input type="password" class="form-control" id="password" placeholder="password">
</fieldset>
</form>
      </div>
      <div class="modal-footer">
          
       <a id="toggleLogin">Sign up</a>
        <button type="button" class="btn btn-secondary" 
        data-dismiss="modal">Close</button>
        <button type="button" id="loginSignupButton" 
        class="btn btn-primary">Login</button>
      </div>
      </div>

  </div>
</div>
     <script>

   $("#toggleLogin").click(function() {
    
    if ($("#loginActive").val() == "1") {
       
        $("#loginActive").val("0")
        $("#loginModaltitle").html("Sign up");
        $("#loginSignupButton").html("Sign up");
        $("#toggleLogin").html("Login");


      
    } else {


        
      $("#loginActive").val("1")
        $("#loginModaltitle").html("Login");
        $("#loginSignupButton").html("Login");
        $("#toggleLogin").html("Sign up");




    }
      

   })


       $("#loginSignupButton").click(function() {
              
           $.ajax({

                 type: "POST",
                 url: "actions.php?action=loginSignup",
                 data: "email=" + $("#email").val() +  "&password=" + $("#password").val() + "&loginActive=" + $("#loginActive").val(),
                          success: function(result) {
                          
                            if (result == "1") {

                             windows.location.assign("http://localhost/myprojects/views/style.css")
                             
                             


                            } else {

                              $("#loginAlert").html(result).show();


                            }

                     }


           })



       })


   


     </script>


      
  </body>
</html>