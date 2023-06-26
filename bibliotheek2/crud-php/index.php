
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="Home.css">
    <title>Bibliotheek home</title>

</head>
<body> 

  <?php
  include_once("navbar.php")
  ?>

    <img class="achtergrond" src="uploads/simple-bookshelf.jpg" alt="achtergrond">
    <div class="front">
        <div class="front_img">
            <img src="uploads/FirdaGeel_Groen-07_0_0.png" alt="firdalogo">
            <h1>welkom op de Firda bibliotheek site</h1>
        </div>

        <div class="knoppen_front">
            <a class="btn verzameling" href="view/read.php">bekijk onze verzameling</a>
           <?if (empty($_SESSION['role'])) {
    echo ' <a class="btn word_lid" href="../account (1)/signup/register.index.php">Word lid</a>';
} 
        ?>
        </div>
    </div>

    <div class="informatie">
        <h3>Informatie</h3>
      
      <!-- de doos in het informatie gedeelte-->
        <div class="box">
      <!-- een van de 3 kollommen in de doos -->
          <div class="column">
            <img class="info-img" src="uploads/FirdaGeel_Groen-07_0_0.png" alt="firda">
            <h1>informatie over de bibliotheek.</h1>
            <p>deze bibliotheek is volledig gesponserd door school en nog meer maar
            ik type hier alleen maar wat dus het is niet waar of wel ik weet het niet zeker.</p>
          </div>
      <!-- een van de 3 kollommen in de doos -->
          <div class="column">
            <img class="info-img" src="uploads/FirdaGeel_Groen-07_0_0.png" alt="firda">
            <h1>informatie over de bibliotheek.</h1>
            <p>deze bibliotheek is volledig gesponserd door school en nog meer maar
            ik type hier alleen maar wat dus het is niet waar of wel ik weet het niet zeker.</p>
          </div>
      <!-- een van de 3 kollommen in de doos -->
          <div class="column">
            <img class="info-img" src="uploads/FirdaGeel_Groen-07_0_0.png" alt="firda">
            <h1>informatie over de bibliotheek.</h1>
            <p>deze bibliotheek is volledig gesponserd door school en nog meer maar
            ik type hier alleen maar wat dus het is niet waar of wel ik weet het niet zeker.</p>
          </div>
      
        </div>
      </div>


    <div class="footer">
        <h1>FIRDA</h1>
    </div>


</body>