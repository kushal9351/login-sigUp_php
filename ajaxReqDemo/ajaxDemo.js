// alert("hello world");

$(document).ready(function(){
    $("button").click(function(){
        // $.ajax({
        //     url: "getPost.php",
        //     type: "GET",

        //     success: function(data){
        //         $('p').html(data);
        //     }
        // })
        // console.log("hello ");
        // $.get("getPost.php", function(data, status){
        //     $('p').html(data);
        //     alert(status);
        // });

        $.ajax({
            url: "getPost.php",
            type: "POST",
            data: {
                name: "Donald Duck",
                city: "Duckburg" 
            },
            success: function(data){
                // alert(data);
                $('p').html(data);
            }

        })
    })
});