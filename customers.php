<?php
  require_once("./debugger.php");

  $globals = [
      'title' => 'Customers',
      'menu' => 1
  ];

  require_once('./parts/header.php');
?>


<main>
<div class="row">
    <div class="wrap bordered-container">
      <form class="conatiner customers-form" action="" method="POST" enctype="multipart/form-data" id="customerForm">
        <fieldset>
          <legend class="heading">Create New Customer</legend>

          <div class="field">
            <div class="w-30"><label for="name">Name</label></div>
            <div class="w-70">
              <input type="text" name="name" id="name">
              <span class="error"></span>
            </div>
          </div>

          <div class="field">
            <div class="w-30"><label>Image</label></div>
            <div class="w-70">
              <input type="file" name="image" id="image">
              <span class="error"></span>
            </div>
          </div>
        </fieldset>

        <fieldset class="w-10 m-auto send">
          <input type="submit" value="Create" name="create" class="button">
        </fieldset>
      </form>
    </div>
  </div>
  <div class="row" id="display_customers">
    <?php require_once('./api/read.php')?>
  </div>
</main>   
<?php require_once('./parts/footer.php') ?>
