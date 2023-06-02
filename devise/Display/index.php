<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
  
<form action="/products" method="POST" enctype="multipart/form-data">
    <label for="name">Name:</label>
    <input type="text" id="name" name="name"><br><br>
    <label for="price">Price:</label>
    <input type="text" id="price" name="price"><br><br>
    <input type="file" name="image" id="image">
    <input type="hidden" name="csrf" value= <?= $_COOKIE['csrf']; ?> >
    <input type="submit" value="Submit" id="submit-btn">

</form>
</body>
</html>

 <!-- @CSRF ketika valuenya SECARA KITA MELAKUKAN SET VALUE PADA COOKIE () -->





 <!-- // Gemstone key pair ()
 // Tambahkan file sample Gemstone() -->