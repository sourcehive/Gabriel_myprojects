<footer class="footer">

    <div class="container">
        
        <p>&copy; My Website 2022 </p>
    
    </div>

</footer>
     
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
 
<!-- Modal -->

<div class="modal fade" id="exampleModal" tabindex="-1" 
role="dialog" aria-labelledby="exampleModalLabel"
 aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Login</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <form>
  <div class="form-group">
    <label for="formGroupExampleInput">Email</label>
    <input type="text" class="form-control" id="formGroupExampleInput" placeholder="Email address">
  </div>
  <div class="form-group">
    <label for="formGroupExampleInput2">Password</label>
    <input type="password" class="form-control" id="formGroupExampleInput2" placeholder="password">
  </div>
</form>
      </div>
      <div class="modal-footer">
          
       <a id="togglelogin">Sign Up</a>
        <button type="button" class="btn btn-secondary" 
        data-dismiss="modal">Close</button>
        <button type="button" id="loginSignupButton" 
        class="btn btn-primary">Login</button>
      </div>
    

  </div>
</div>
     

   
<script>

$("#toggleLogin").click(function() {
    
    if ($("#loginActive").val() == "1") {
        
        $("#loginActive").val("0");
        $("#loginModalTitle").html("Sign Up");
        $("#loginSignupButton").html("Sign Up");
        $("#toggleLogin").html("Login");
        
        
    } else {
        
        $("#loginActive").val("1");
        $("#loginModalTitle").html("Login");
        $("#loginSignupButton").html("Login");
        $("#toggleLogin").html("Sign up");
        
    }
    
    
})

$("#loginSignupButton").click(function() {
    
    $.ajax({
        type: "POST",
        url: "actions.php?action=loginSignup",
        data: "email=" + $("#email").val() + "&password=" + $("#password").val() + "&loginActive=" + $("#loginActive").val(),
        success: function(result) {
            if (result == "1") {
                
                window.location.assign("http://localhost/projects/12-twitter/");
                
            } else {
                
                $("#loginAlert").html(result).show();
                
            }
        }
        
    })
    
})

$(".toggleFollow").click(function() {
    
    var id = $(this).attr("data-userId");
    
    $.ajax({
        type: "POST",
        url: "actions.php?action=toggleFollow",
        data: "userId=" + id,
        success: function(result) {
            
            if (result == "1") {
                
                $("a[data-userId='" + id + "']").html("Follow");
                
            } else if (result == "2") {
                
                $("a[data-userId='" + id + "']").html("Unfollow");
                
            }
        }
        
    })
    
})

$("#postTweetButton").click(function() {
    
    $.ajax({
        type: "POST",
        url: "actions.php?action=postTweet",
        data: "tweetContent=" + $("#tweetContent").val(),
        success: function(result) {
            
            if (result == "1") {
                
                $("#tweetSuccess").show();
                $("#tweetFail").hide();
                
            } else if (result != "") {
                
                $("#tweetFail").html(result).show();
                $("#tweetSuccess").hide();
                
            }
        }
        
    })
    
})

</script>


      
  </body>
</html>