
<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Student Information System Dashboard</title>
  <link rel="stylesheet" type="text/css" href="style.css">

  <style>
    *{
      padding:0;
      margin:0;
    }


    nav{
      position: relative;
      width: 100%;
    }

    .dashboard{
      display: flex;
      flex-direction: column;
      justify-content: center;
      align-items: center;
    }

    .graphs{
      display: flex;
      justify-content: center;
      align-items: center;
      height: 50vh;
      width: 100%;
      max-width: 1200px;
      text-align: center;
    }
    .graphs .parent-pwd, .graphs .male-female{
      height: 200px;
      width: 100%;
    }

    .total{
      height:280px;
      width: 70%;
    }

  </style>
</head>
<body>
  <!-- <img src="asset/isabela-state-university-logo-67371D9323-seeklogo.com.png" alt="" style="position:absolute;left:30%;top:20%;height:30em;width:30rem;opacity:.2;"> -->
  <div class="nav" style="width:100%;">
    <?php include_once "navigation.php"; ?>
  </div>
  <div class="dashboard">
    <div class="graphs" >
      <div class="parent-pwd">
        <?php include_once "graph.php"; ?>
      </div>
      <div class="male-female">
        <?php include_once "graph2.php"; ?>
      </div>
      <div class="total">
      <?php include_once "total_count.php"; ?>
      </div>
    </div>
  </div>
</body>
</html>