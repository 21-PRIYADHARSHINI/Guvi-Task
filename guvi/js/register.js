$(document).on('click','#submit_register',function(e){
    e.preventDefault();
        const username = document.getElementById("userid").value.toLowerCase().trim();
        const email = document.getElementById("email").value.toLowerCase();
        const password = document.getElementById("password").value;
        const phone = document.getElementById("phone").value;
        const cpassword = document.getElementById("cpassword").value;
        //regular expression to prevent wrong email address entry
        const re = /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
        //regular expression to prevent all special characters in username
        const re2 = /^[^*|\":<>[\]{}`\\()';@&$]+$/;
        const noSpace = (username.includes(" "));
        const nameLength = username.length<4;  
        if(!re2.test(username) || noSpace || nameLength){
            alert("Username must contain no special characters or space and must be greater than 4");
        }else if(!re.test(email)){
            alert("Please enter correct email address");
        }else if(phone.length!=10){
            alert("Please enter 10 digits phone number");
        }else if(password.length<8){
            alert("Please enter a 8 or more character password");
        }else if(password != cpassword){
            alert("Passwords do not match");
        }else{			
        $.ajax({
            url: '/guvi/php/register.php',
            type: 'post',
            data: 
                {userid:username, 
                 email:email, 
                 password:password,
                 phone:phone
                },
            success: function(response){
                $('#message').html(response);
                setTimeout(myURL, 2000);
                // setTimeout(window.location.replace("http://localhost/guvi/login.html"),10000);
            }
        });
        function myURL() {
            window.open('http://localhost/guvi/login.html', name = self);
         }
        $('#register')[0].reset();
    }
});