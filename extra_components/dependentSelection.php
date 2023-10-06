<?php

$server = "localhost";
$username = "root";
$password = "";
$db = "formdb"; 

$con = mysqli_connect($server, $username, $password, $db);

if(!$con){
    die("error " . mysqli_connect_error());
}
// echo "successfully connected";

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <title>Document</title>
</head>
<body>

    <div class="container text-center">
        <h2>Get data from Database</h2>

        <form action="">
            username :<input type="text" name="" id="" class="form-control"><br><br>
            password :<input type="text" name="" id="" class="form-control"><br>

            Degree: <select class="form-control" name="" id="" onchange="myfun(this.value)">
                <option value="select any one">select any one</option>

                <?php
                    $sql = "SELECT * FROM degree";
                    $result = $con->query($sql);

                    while($row = $result->fetch_assoc()){
                        ?>
                        <option value="<?php echo $row['mid']; ?>"><?php echo $row['degrees']; ?></option>
                        <?php
                    }

                    ?>
                
            </select><br>

            class: <select class="form-control" name="" id="dataget">
                <option value="select any one">select any one</option>
            </select>

            <br><br>
            <button class="btn btn-primary">submit</button>
        </form>

    </div>


    

    
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>

    <script>
        function myfun(dataValue){
            console.log("here");
            $.ajax({
                url: 'class.php',
                type: 'POST',
                data: {datapost : dataValue},

                success: function(result) {
                    $('#dataget').html(result);
                }
            })
        }
    </script>

</body>
</html>