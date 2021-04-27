<!DOCTYPE html>
<html>

<head>
<link rel="stylesheet" href="index.css">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.min.js" integrity="sha384-+YQ4JLhjyBLPDQt//I+STsc9iw4uQqACwlvpslubQzn4u2UU2UFM80nGisd026JF" crossorigin="anonymous"></script>

</head>

<body>
  <header>
    <div class="container">
      <div class="jumbotron">
        <h1>MY CRUD APPLICATION</h1>
      </div>
    </div>


  </header>
  <?php require_once 'process.php'; ?>

  <?php

  if (isset($_SESSION['message'])) :  ?>

    <div class="alert alert-<?= $_SESSION['msg_type'] ?>">
      <?php
      echo $_SESSION['message'];
      unset($_SESSION['message']);
      ?>
    </div>
  <?php endif ?>
  <div class="container">
    <?php
    $mysqli = new mysqli('localhost', 'root', '', 'crud') or die(mysqli_error($mysqli));
    $result = $mysqli->query("SELECT * FROM data") or die($mysqli->error);
    //pre_r($result);
    // pre_r($result->fetch_assoc());
    //pre_r($result->fetch_assoc());
    ?>

    <?php
    function pre_r($array)
    {
      echo '<pre>';
      print_r($array);
      echo '<pre>';
    }
    ?>

    <!-- <div class="row justify-content-center"> -->
    <form class="" action="process.php" method="POST">

      <input type="hidden" name="id" value="<?php echo $id ?>" />
      <div class="form-group">
        <label class="control-label col-sm-2">Name</label>
        <input type="text" name="name" class="form-control" value="<?php echo $name ?>" placeholder="Enter your name">
      </div>

      <div class="form-group">
        <label class="control-label col-sm-2">Email</label>
        <input type="email" name="email" class="form-control" value="<?php echo $email ?>" placeholder="Enter your email">
      </div>
      <div class="form-group">
        <label class="control-label col-sm-2">Mobile</label>
        <input type="number" name="mobile" class="form-control" value="<?php echo $mobile ?>" placeholder="Enter your Mobile number">
      </div>
      <div class="form-group">
        <label class="control-label col-sm-2">Select State</label>
        <select name="state">
          <option>UTTARAKHAND</option>
          <option>MAHARASHTRA</option>
          <option>KARNATKA</option>
          <option>ASSAM</option>
          <option>PUNJAB</option>
          <option>HARYANA</option>
          <option>DELHI</option>
        </select>
      </div>
      <div class="form-group">
        <label class="control-label col-sm-2">Select City</label>
        <select name="city">
          <option>DEHERADUN</option>
          <option>MUMBAI</option>
          <option>CEHNNAI</option>
          <option>PUNE</option>
          <option>BANGALORE</option>
        </select>
      </div>
      <div class="form-group">
        <label class="control-label col-sm-2">Address</label>
        <input type="text" name="address" class="form-control" value="<?php echo $address ?>" placeholder="Enter your address">
      </div>

      <div class="form-group">
        <?php
        if ($update == true) :
        ?>
          <button type="submit" name="update" class="btn btn-info ">Update</button>
        <?php else : ?>
          <button type="submit" name="save" class="btn btn-primary ">save</button>
        <?php endif ?>
      </div>

    </form>
  </div>
  <div class="row justify-content-center">
    <table class="table" id="xyz">
      <thread>
        <tr>
          <th>NAME</th>
          <th>EMAIL</th>
          <th>MOBILE</th>
          <th>STATE</th>
          <th>CITY</th>
          <th>ADDRESS</th>
          <th colspan="2">Action</th>
        </tr>
      </thread>

      <?php
      while ($row = $result->fetch_assoc()) :
      ?>
        <tr>
          <td><?php echo $row['Name']; ?></td>
          <td><?php echo $row['Email']; ?></td>
          <td><?php echo $row['mobile']; ?></td>
          <td><?php echo $row['state']; ?></td>
          <td><?php echo $row['city']; ?></td>
          <td><?php echo $row['address']; ?></td>
          <td>
            <a href="index.php?edit=<?php echo $row['id']; ?>" class="btn btn-info">Edit</a>
            <a href="process.php?delete=<?php echo $row['id']; ?>" class="btn btn-danger">Delete</a>
          </td>
        </tr>
      <?php endwhile; ?>
    </table>
  </div>
  <!-- </div> -->
</body>

</html>