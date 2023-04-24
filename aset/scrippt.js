function register(){
    var log = document.getElementById('login') //div login
    var reg = document.getElementById('register') //div register
    reg.style.display="block"
    document.getElementById("login").remove()
  
    }
    
    function submitData(){
        $(document).ready(function(){
          var data = {
            name: $("#name").val(),
            username: $("#username").val(),
            password: $("#password").val(),
            action: $("#action").val(),
          };
    
          $.ajax({
            url: 'function.php',
            type: 'post',
            data: data,
            success:function(response){
    
              var namesr = document.getElementById("username").value
              if(response == "Login Successful"){
              Swal.fire({
                        icon: 'success',
                        type: 'success',
                        title: response,
                        text: "Welcome Back " + namesr,
                        timer: 5000,
                        showCancelButton: false,
                        showConfirmButton: false,})
                        setTimeout (myfunction,5000)
                       
              }else if(response == "Registration Successful"){
                Swal.fire({
                        icon: 'success',
                        type: 'success',
                        title: response,
                        timer: 000,
                        showCancelButton: false,
                        showConfirmButton: false,})
                        setTimeout (myfunction,000)
                
              }else if(response == "Please Fill Out The Form!"){
                Swal.fire({
                    icon: 'warning',
                    type: 'warning',
                    title: response,
                    timer: 1000,
                    showCancelButton: false,
                    showConfirmButton: false,})
                  
                    var user = document.getElementById("password")
                    document.getElementById("username").style.border = "1px solid red"
                    document.getElementById("name").style.border = "1px solid red"
                    user.style.border = "1px solid red"
                    document.getElementById("fillname").style.display="block"
                  
              }else if(response == "Username Has Already Taken"){
                Swal.fire({
                    icon: 'warning',
                    type: 'warning',
                    title: response,
                    timer: 1000,
                    showCancelButton: false,
                    showConfirmButton: false,})
                  
                    var user = document.getElementById("username")
                    user.style.border = "1px solid red"
                    
                    document.getElementById("fillname").style.display="none"
                    document.getElementById("sudah").style.display="block"
                    
              }else if(response == "User Not Registered"){
                Swal.fire({
                        icon: 'warning',
                        type: 'warning',
                        title: response,
                        timer: 1000,
                        showCancelButton: false,
                        showConfirmButton: false,})
                      
                        var user = document.getElementById("username")
                        user.style.border = "1px solid red"
                        document.getElementById("usersalah").style.display="block"
                        
              }else if (response == "Wrong Password"){
                Swal.fire({
                    icon: 'warning',
                    type: 'warning',
                    title: response,
                    timer: 1000,
                    showCancelButton: false,
                    showConfirmButton: false,})
                  
                    var user = document.getElementById("password")
                    user.style.border = "1px solid red"
                    document.getElementById("passwordsalah").style.display="block"
                        
              }
            }
          });
        });
      }
    function myfunction(){
      window.location.reload();
    }

    function sweet(){
        var wel = document.getElementById("welcome").value
        Swal.fire({
                        icon: 'success',
                        type: 'success',
                        title: "Welcome " + wel,
                        timer: 5000,
                        showCancelButton: false,
                        showConfirmButton: false,})
    }


    function inputuser(){
        document.getElementById("sudah").style.display="none"
        document.getElementById("username").style.border="2px solid grey"
        document.getElementById("usersalah").style.display="none"
    }
    function inputuser2(){
        document.getElementById("sudah").style.display="none"
        document.getElementById("username").style.border="none"
        document.getElementById("usersalah").style.display="none"
    }
    function inputpass(){
        document.getElementById("password").style.border="1px solid grey"
        document.getElementById("passwordsalah").style.display="none"
    }

    function namess(){
        document.getElementById("name").style.border="none"
    }

