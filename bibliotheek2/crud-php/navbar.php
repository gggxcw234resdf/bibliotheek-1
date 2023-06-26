
<?php 

include "db_conn.php";

$_SESSION['role'] = 'Admin';

$role = $_SESSION['role'];

if ($role === 'Admin' ) {echo 
    '<div class="header">
        <h1 style="float: left;">FIRDA admin</h1>
<!-- de navbar in de header -->
<div class="navbar">
<!-- de links in de navbar -->
      <a class="active" href="" >Home</a>
      <a href="admin-pannel.php">admin pannel</a>
      <a href="view/read.php">Boeken</a>
      <a href="../account (1)\logout.php">log uit</a>
      <a href="">Reservaties (komt nog)</a>
  </div>
    </div>';
}

else if ($role === "Medewerker") {echo
    '<div class="header">
            <h1 style="float: left;">FIRDA medewerker</h1>
    <!-- de navbar in de header -->
    <div class="navbar">
    <!-- de links in de navbar -->
          <a class="active" href="" >Home</a>
          <a href="view/read.php">Boeken</a>
          <a href="../account (1)\logout.php">log uit</a>
          <a href="">Reservaties (komt nog)</a>
      </div>
        </div>';
    }

else if ($role === "Lid") {echo
    '<div class="header">
            <h1 style="float: left;">FIRDA lid</h1>
    <!-- de navbar in de header -->
    <div class="navbar">
    <!-- de links in de navbar -->
          <a class="active" href="" target="_blank" rel="noopener noreferrer">Home</a>
          <a href="view/read.php">Boeken</a>
          <a href="../account (1)\logout.php">log uit</a>
          <a href="">Reservaties (komt nog)</a>
      </div>
        </div>';
    }

else {echo
'<div class="header">
        <h1 style="float: left; ">FIRDA </h1>
<!-- de navbar in de header -->
<div class="navbar">
<!-- de links in de navbar -->
      <a class="active" href="" >Home</a>
      <a href="view/read.php">Boeken</a>
      <a href="" target="_blank" rel="noopener noreferrer">word lid</a>
      <a href="" target="_blank" rel="noopener noreferrer">login</a>
  </div>
    </div>';
}

?>

