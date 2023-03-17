$(document).on('click','#submit_login',function(e){
       e.preventDefault();
       const email = document.getElementById("email").value.toLowerCase();
       const password = document.getElementById("password").value;
      alert("Hello");
      console.log(email + "   "+password);
      $.ajax({
        type: 'POST',
        url: './php/login.php',
        data: {
          email: email,
          password: password,
        },
        success: function(response){
            $('#message').html(response);
            setTimeout(myURL, 2000);
            // setTimeout(window.location.replace("http://localhost/guvi/login.html"),10000);
        },
      });
      function myURL() {
        window.open('http://localhost/guvi/profile.html', name = self);
     }
    $('#login')[0].reset();
    });



  