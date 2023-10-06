


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        
    </style>
</head>
<body>
    <!-- <a href=""></a>
    <img src="svg/gear-wide.svg" alt="">
    <img src="svg/sign-out-alt-solid.svg" alt="">
    <img src="svg/user-solid.svg" alt="">


    <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-gear-wide" viewBox="0 0 16 16">
        <path d="M8.932.727c-.243-.97-1.62-.97-1.864 0l-.071.286a.96.96 0 0 1-1.622.434l-.205-.211c-.695-.719-1.888-.03-1.613.931l.08.284a.96.96 0 0 1-1.186 1.187l-.284-.081c-.96-.275-1.65.918-.931 1.613l.211.205a.96.96 0 0 1-.434 1.622l-.286.071c-.97.243-.97 1.62 0 1.864l.286.071a.96.96 0 0 1 .434 1.622l-.211.205c-.719.695-.03 1.888.931 1.613l.284-.08a.96.96 0 0 1 1.187 1.187l-.081.283c-.275.96.918 1.65 1.613.931l.205-.211a.96.96 0 0 1 1.622.434l.071.286c.243.97 1.62.97 1.864 0l.071-.286a.96.96 0 0 1 1.622-.434l.205.211c.695.719 1.888.03 1.613-.931l-.08-.284a.96.96 0 0 1 1.187-1.187l.283.081c.96.275 1.65-.918.931-1.613l-.211-.205a.96.96 0 0 1 .434-1.622l.286-.071c.97-.243.97-1.62 0-1.864l-.286-.071a.96.96 0 0 1-.434-1.622l.211-.205c.719-.695.03-1.888-.931-1.613l-.284.08a.96.96 0 0 1-1.187-1.186l.081-.284c.275-.96-.918-1.65-1.613-.931l-.205.211a.96.96 0 0 1-1.622-.434L8.932.727zM8 12.997a4.998 4.998 0 1 1 0-9.995 4.998 4.998 0 0 1 0 9.996z"/>
      </svg> -->

      <form action="#" method="POST" enctype="multipart/form-data">
        <input type="file" name="uploadfile" id="uploadfile" onchange="getImagePreview(event)"><br><br>
        <div id="preview" style="border-radius: 50%"></div>
        <input type="submit" value="uplaod file" name="Submit">
      </form>



    
      
</body>
</html>

<script>
        function getImagePreview(event){
            let image = URL.createObjectURL(event.target.files[0]);
            let imgDiv = document.getElementById('preview');
            imgDiv.innerHTML = '';
            let newImg = document.createElement('img');
            newImg.src = image;
            newImg.width = 100;
            newImg.height = 100;
            imgDiv.appendChild(newImg);
        }
    </script>

<?php
    // if($_SERVER['REQUEST_METHOD'] == "POST"){
    //     $filename = $_FILES['uploadfile'];
    //     echo $filesname;
    // }

    // print_r($_FILES["uploadfile"]);
    // $filename = $_FILES["uploadfile"]["name"];
    // $tempname = $_FILES["uploadfile"]["tmp_name"];
    // $folder = "images/".$filename;
    // move_uploaded_file($tempname, $folder);
    // // echo "<br>";
    // // print_r($folder);
?>