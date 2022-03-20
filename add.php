<?php
require "database.php";
$err = null;

if($_SERVER["REQUEST_METHOD"] == "POST"){

  if(empty($_POST["name"]) || empty($_POST["phone_number"])){
    $err = "Please fill all the fields";
  } else if (strlen($_POST["phone_number"]) < 8){
    $err = "Phone Number must be att least 8 characters";
  } else{
    $name = $_POST["name"];
    $phoneNumber = $_POST["phone_number"];

    $statement = $conn->prepare(
      "INSERT INTO contacts (name, phone_number)
      VALUES(:name, :phone_number)"
    );
    $statement->bindParam(":name", $name);
    $statement->bindParam(":phone_number", $phoneNumber);
    $statement->execute();

    header("Location: home.php");
  }

}

?>


<?php require "header.php"?>
<!-- Code here -->
<div class="container pt-5">
  <div class="row justify-content-center">
    <div class="col-md-8">

      <div class="card">
        <div class="card-header">Add New Contact</div>
        <div class="card-body">

          <?php if ($err): ?>
            <p class="text-danger">
              <?= $err ?>
            </p>
          <?php endif ?>

          <form method="POST" action="add.php">
            <div class="mb-3 row">
              <label 
                for="name" 
                class="col-md-4 col-form-label text-md-end">Name
              </label>

              <div class="col-md-6">

                <input 
                id="name" 
                type="text" 
                class="form-control" 
                name="name" 
                autocomplete="name" 
                autofocus>
              </div> 
            </div>

            <div class="mb-3 row">
              <label 
                for="phone_number" 
                class="col-md-4 col-form-label text-md-end">Phone Number
              </label>

              <div class="col-md-6">
                <input 
                  id="phone_number" 
                  type="tel" 
                  class="form-control" 
                  name="phone_number" 
                  autocomplete="phone_number" 
                  autofocus>
              </div>
            </div>

            <div class="mb-3 row">
              <div class="col-md-6 offset-md-4">
                <button 
                  type="submit" 
                  class="btn btn-primary">Send
                </button>
              </div>
            </div>
          </form>

        </div>
      </div>

    </div>
  </div>
</div>


<?php require "footer.php"?>

