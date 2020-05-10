
$().ready(function(){
    // jQuery.validator.addMethod("uniqueMobile", function(value, element) {
    //     var response;
    //     $.ajax({
    //         type: "POST",
    //         url:" <YOUR SERVER SCRIPT/METHOD>",
    //         data:"mobile="+value,
    //         async:false,
    //         success:function(data){
    //             response = data;
    //         }
    //     });
    //     if(response == 0)
    //     {
    //         return true;
    //     }
    //     else if(response == 1)
    //     {
    //         return false;
    //     }
    //     else if(response == 'logout')
    //     {
    //         return false;
    //     }
    // }, "Mobile is Already Taken");


    $(function(){
        $("#registerForm").validate({
            rules:{
                name:{
                    required:true,
                    minlength:5
                },

                fname:{
                    required:true,
                    minlength:3
                },
                lname:{
                    required:true,
                    minlength:3
                },
                password:{
                    // password:true,
                    minlength:6,
                    required:true
                },
                repassword:{
                    // password:true,
                    required:true,
                    minlength:5,
                    equalTo:"#password"
                },
                email:{
                    // required:true,
                    email:true,
                },
                // dob:{
                //     required:true,
                // },
            },
            messages:{
                    name:{
                        required:"Username required",
                        minlength:"Name must be atleast 5 characters"
                    },
                    fname:{
                        required:"Firstname is required",
                        minlength:"Name must be atleast 3 characters"
                    },
                    lname:{
                        required:"Last name required",
                        minlength:"Name must be atleast 5 characters"
                    },
                    password:{
                        required:"Password required",
                        minlength:"Your password must greater than 5 characters",
                        password:"Password must be combination of keys"
                    },
                    repassword:{
                        minlength:"Your password must greater than 5 characters",
                        equalTo:"Password Mismatched",
                        password:"password must be keys",
                        required:"password area must be filled"
                    },
                    email:{
                        required:"Email must not be empty",
                        email:"Please enter valid email address like eg@eample.com"
                    },
                    dob:{
                        required:"Date of birth is required"
                  }
            },
        })
    })
})





$().ready(function(){
    $(function(){
        $.validator.setDefaults({
            errorClass:'help-block',
            highlight:function(element){
                $(element)
                .closest('form-group')
                .addClass('has-error');
            }
        });
        
        $("#loginForm").validate({
            rules:{
                name:{
                    required:true,
                    minlength:5
                },

                fname:{
                    required:true,
                    minlength:3
                },
                lname:{
                    required:true,
                    minlength:3
                },
                password:{
                    // password:true,
                    minlength:6,
                    required:true
                },
                repassword:{
                    // password:true,
                    required:true,
                    minlength:5,
                    equalTo:"#password"
                },
                email:{
                    // required:true,
                    email:true,
                },
                // dob:{
                //     required:true,
                // },
            },
            messages:{
                    name:{
                        required:"Username required",
                        minlength:"Name must be atleast 5 characters"
                    },
                    fname:{
                        required:"Firstname is required",
                        minlength:"Name must be atleast 3 characters"
                    },
                    lname:{
                        required:"Last name required",
                        minlength:"Name must be atleast 5 characters"
                    },
                    password:{
                        required:"Password required",
                        minlength:"Your password must greater than 5 characters",
                        password:"Password must be combination of keys"
                    },
                    repassword:{
                        minlength:"Your password must greater than 5 characters",
                        equalTo:"Password Mismatched",
                        password:"password must be keys",
                        required:"password area must be filled"
                    },
                    email:{
                        required:"Email must not be empty",
                        email:"Please enter valid email address like eg@eample.com"
                    },
                    dob:{
                        required:"Date of birth is required"
                    }
            }
        })
    })
})


// $.validator.setDefaults({
//     submitHandler: function(){
//         $.ajax({
//             type:'POST',
//             url: 'signup.php',
//             data: $('#registerForm').serialize(),
//             success: function (data) {
//             var result=data;
//             $(".error").text(result);
//             if(result=="success"){
//             window.alert('register successfully');
//             }
//             }
//         });
//     alert("Good day and thanks");
//       } 
// });