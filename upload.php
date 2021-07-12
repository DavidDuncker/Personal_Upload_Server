<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>Insert title here</title>
</head>
<body>
<?php 
if (!isset($_FILES['my_file'])) {
    echo <<< EOT
    <h1>Upload a file</h1>
    <form method="post" enctype="multipart/form-data">
    <input type="file" name="my_file[]" multiple>
    <input type="submit" value="Upload">
    </form>
EOT;
}
else {
    for ($i=0; $i<count($_FILES['my_file']['name']); $i++) {
        $name=preg_replace('/\s/', '', basename($_FILES["my_file"]["name"][$i]));
        echo "Temp name: " . $_FILES["my_file"]["tmp_name"][$i] . "<br>";
        echo "New location: /home/dave/www/uploads/" . $name . "<br>";
        echo "Working directory: ".getcwd()."<br>";
        if (move_uploaded_file($_FILES["my_file"]["tmp_name"][$i], "/home/dave/www/uploads/" . $name)) {
            echo "The file ". $name . " has been uploaded and moved from ". $_FILES["my_file"]["tmp_name"][$i]."<br><br>";
        } else {
            echo "Error<br>"; 
        }
    }    
}


?>

</body>
</html><?php
