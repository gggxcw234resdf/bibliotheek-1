<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <style>
    .popup {
      display: none;
      position: fixed;
      left: 50%;
      top: 50%;
      transform: translate(-50%, -50%);
      width: 800px;
      height: 800px;
      padding: 20px;
      background-color: white;
      border: 1px solid #ccc;
    }
  </style>
</head>
<body>
  <nav>
    <ul>
      <li><a href="#" onclick="openPopup('./view/create.php')">Create</a></li>
      <li><a href="#" onclick="openPopup('./view/read.php')">Read</a></li>
      <li><a href="#" onclick="openPopup('../account (1)/login/login.php')">Login</a></li>
      <li><a href="#" onclick="openPopup('../employees-crud/home.php')">Employees CRUD</a></li>
      <li><a href="#" onclick="openPopup('./view/schrijvercrudview.php')">Schrijver CRUD</a></li>
      <li><a href="index.php">Home</a></li>
      <!-- Add more navigation links as needed -->
    </ul>
  </nav>

  <div id="popupContainer" class="popup">
    <iframe id="popupContent" frameborder="0" width="100%" height="100%"></iframe>
  </div>

  <script>
    function openPopup(url) {
      var popup = document.getElementById('popupContainer');
      var content = document.getElementById('popupContent');
      
      content.src = url;
      popup.style.display = 'block';
    }
  </script>
</body>
</html>