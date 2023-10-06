// setTimeout(()=>{
//     // console.log(<div class='alert alert-danger alert-dismissible fade show' role='alert'>
//     //     <strong>Error: </strong> $errorMessage
//     //     <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
//     // </div>)
//     console.log("hello");
// }, 2000);

// console.log("hello");


// $('body').css('background-color', 'red');

function setTime(){
    setTimeout(()=>{
        $('#loginError').html("");
        $('#signupError').html("");
        $('#editProfileError').html("");

        if($('#loginError').hasClass('text-success')){
            $('#loginError').removeClass("text-success");
            $('#loginError').addClass("text-danger");
        }
        if($('#editProfileError').hasClass('text-success')){
            $('#editProfileError').removeClass('text-success');
            $('#editProfileError').addClass('text-danger');
        }
    }, 5000);
}

$(document).ready(function(){


    $('#loginBtn').click(function(e){
        e.preventDefault();

        $.post("getData.php", {
            l_username: $('#l_username').val(),
            l_password: $('#l_password').val()
        }, function(data, status){
            // alert(data, "space ", status);
            // console.log(status);

            if(data == "you are logged in"){
                $('#loginError').removeClass("text-danger");
                $('#loginError').addClass("text-success");
                setTime();
                window.location.href = "index.php";
            }
            // }
            $('#loginError').text(data);
            setTime();
        });
    });


    $("#signUpBtn").click(function(e){
        e.preventDefault();

        let val = validation();

        if(val){
            $.post("getData.php", {
                s_username: $('#s_username').val(),
                s_password: $('#s_password').val(),
                s_cpassword: $('#s_cpassword').val()
            }, function(data, status){
                // alert(data, "space ", status);
                if(data === "Your account is now created and you can login"){
                    $('#loginError').addClass("text-success");
                    $('#loginError').removeClass("text-danger");
                    // window.location.href = "index.php";
                    // console.log("here");
                    $('#popUplogin').click();
                    $('#loginError').text("Your account is now created and you can login");
                    // break;
                }
                $('#signupError').text(data);   
                // console.log(data);
                setTime();
                
            });
        }
    })

    $('.status').click(function(e){
        e.preventDefault();
        let isActive = $(this).attr('data-isAcivte');
        let id = this.id;
        // console.log(e.target.href);
        // console.log(this);
        let link = this.href+"&isActive="+isActive;
        // console.log(link, "h", id);
        $.get(link, function(data, status){
            console.log(data, " ", status );
            if(status == "success"){
                // btn-success
                console.warn(status, $("#"+id).attr('data-isAcivte') == "1");
                // if($(this).hasClass('btn-success')){
                if($("#"+id).attr('data-isAcivte') == "1"){
                    $("#"+id).removeClass('btn-danger');
                    $("#"+id).addClass('btn-success');
                    $("#"+id).attr('data-isAcivte', "0");
                    $("#"+id).html('YES');
                }
                else{
                    
                    $("#"+id).attr('data-isAcivte', "1");
                    $("#"+id).removeClass('btn-success');
                    $("#"+id).addClass('btn-danger');
                    // $("#"+id).text('YES');
                    $("#"+id).html('NO');
                }
            }
        });
    });



    $('#popUplogin').click();
    // $('#myModal').modal('show')


    // data tables code

    $('#myTable').dataTable({
        dom: 'Bfrtip',
        buttons: [
            'copyHtml5',
            'excelHtml5',
            'csvHtml5',
            'pdfHtml5'
        ]
    });


    // dependent selection
    

    
    // $('.toggle').click(function(e){
    //     let status = $(this).val();
    //     let id = $(this).data('id');
    //     console.log("Data", id, status);
    // });

    





    // $('#myTable').DataTable( {
    //     dom: 'Bfrtip',
    //     buttons: [
    //         'copyHtml5',
    //         'excelHtml5',
    //         'csvHtml5',
    //         'pdfHtml5'
    //     ]
    // } );


    // $('#profileEditBtn').click(function(e){
        $("#form").on('submit',(function(e) {
        e.preventDefault();
        let val = Edit_validation();

        // if(val){
            console.log("hello");

            // $.post("getData.php", {
            //     p_name : $('#p_name').val(),
            //     p_username : $('#p_username').val(),
            //     p_email : $('#p_email').val(),
            //     p_state : $('#p_state').val(),
            //     p_city : $('#p_city').val(),
            //     p_bio : $('#p_bio').val(),
            //     p_addLink : $('#p_addLink').val(),
            //     p_gender: $('#p_gender').val()
            // }, function(data, status){
            //     $('#editProfileError').html(data);
            // }); 

            $.ajax({
                url: "getData.php",
                type: "POST",
                data:  new FormData(this),
                contentType: false,
                cache: false,
                processData: false,
                success: function(data){
                    if(data == "successfully profile updated"){
                        $('#editProfileError').removeClass('text-danger');
                        $('#editProfileError').addClass('text-success');
                        setTime();
                    }
                    $('#editProfileError').html(data);
                }

            })

        // }
    // })
    }))


    
});

function validation() {
    let userName = $('#s_username').val();
    let password = $('#s_password').val();
    let cpassword = $('#s_cpassword').val();
    // let userName = document.$("s_username").value;
    // console.log("HERE");
    let returnValue = true;

    // username blank check
    if(userName === ""){
        $('#signupError').text('Please fill the email');
        return false;
    }

    // length check
    if(userName.length <= 3){
        $('#signupError').text(`${userName} length is too short!`);
        returnValue = false;
    }

    // let userRegex  = /^[A-Za-z]+$/;
    // let userRegex  = /^[a-zA-Z0-9]+([._]?[a-zA-Z0-9]+)*$/;
    let userRegex  = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
    if(!(userName.match(userRegex))){
        $('#signupError').text(`You have entered an invalid email address!`);
        returnValue = false;
    }



    

    // password blank check
    if(password === ""){
        $('#signupError').text('Please fill the password');
        return false;
    }

    // confirm password blank check
    if(cpassword === ""){
        $('#signupError').text('Please fill the confirm password');
        return false;
    }


    // Validate lowercase letters
    var lowerCaseLetters = /[a-z]/g;
    if(!(password.match(lowerCaseLetters))){
        $('#signupError').text('please include a lowercase letter in password');
        returnValue = false;

    }
  
    // Validate capital letters
    var upperCaseLetters = /[A-Z]/g;
    if(!(password.match(upperCaseLetters))) {
        $('#signupError').text('please include a capital (uppercase) letter in password');
        returnValue = false;
    }

    // Validate numbers
    var numbers = /[0-9]/g;
    if(!(password.match(numbers))) {
        $('#signupError').text('please include a number in password');
        returnValue = false;
    }
  
    // /[!@#$%^&*]/
    var special_Character = /[!@#$%^&*]/g;
    if(!(password.match(special_Character))) {
        $('#signupError').text('please include a special Character in password');
        returnValue = false;
    }

    // Validate length
    if(password.length < 8) {
        $('#signupError').text('Minimum 8 characters ');
        returnValue = false;
    }

    

    return returnValue;
 }


// let toggle = Array.from(document.getElementsByClassName("toggle"))
// toggle.forEach((element) => {
//     element.addEventListener('click', function(){
//         let status = $(this).val();
//         let id = $(this).data('id');
//         console.log("Data", id, status);
//     })
// });



function getImagePreview(event){
    let image = URL.createObjectURL(event.target.files[0]);
    let imgDiv = document.getElementById('preview');
    imgDiv.innerHTML = '';
    let newImg = document.createElement('img');
    newImg.style.borderRadius = "50%";
    newImg.style.border = "4px solid hsla(0,60%,70%, .5)";
    newImg.src = image;
    newImg.width = 70;
    newImg.height = 70;
    imgDiv.appendChild(newImg);
}


function depSel(val){
    console.log("here");
    $.ajax({
        url: "components/depSelection.php",
        type: "POST",
        data: {id : val},

        success: function(result){
            $('#p_city').html(result);
        }
    });
}



function Edit_validation(e){
    // e.preventDefault();
    let name = $('#p_name').val();
    let u_name = $('#p_username').val();
    let userName = $('#p_email').val();

    let returnValue = true;
    // console.log("here");

    // console.log("here");
    if(name == ""){
        $('#editProfileError').html('Please fill the Name js');
        returnValue = false;
    }

    if(u_name === ""){
        $('#editProfileError').html('Please fill the Name');
        returnValue = false;
    }

    // length check
    if(userName.length <= 3){
        $('#editProfileError').text(`${userName} length is too short!`);
        returnValue = false;
    }

    return returnValue;
}

