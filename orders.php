<?php 
  $globals = [
    'title' => 'Orders',
    'menu' => 2
  ]
?>

<?php require_once('./parts/header.php') ?>
<main>
<div class="row">
    <div class="wrap bordered-container">
      <form class="conatiner" action="" method="POST" enctype="multipart/form-data" id="orderForm">
        <fieldset>
          <legend class="heading">Order</legend>

          <div class="field">
            <div class="w-30"><label for="product">Name</label></div>
            <div class="w-70">
              <input type="text" name="product" id="product">
            </div>
          </div>

          <div class="field">
            <div class="w-30"><label for="desc">Description</label></div>
            <div class="w-70">
              <input type="text" name="desc" id="desc">
            </div>
          </div>

          <div class="field">
            <div class="w-30"><label for="price">Price</label></div>
            <div class="w-70">
              <input type="number" min="<?= $min ?>" max="<?= $max ?>" name="price" id="price">
            </div>
          </div>
          <div class="field flex">
            <div class="w-30"><label>Upload image</label></div>
            <div class="w-70">
                <div class="flex">
                  <input type="file" name="image" id="image">
                </div>
              </div>
          </div>
        </fieldset>

        <fieldset class="w-10 m-auto send">
          <input type="submit" value="Add" name="add" class="button">
        </fieldset>
      </form>
    </div>
  </div>
  <div class="row" id="display_orders">
    <?php require_once('./api/read_orders.php')?>
  </div>
</main>
<?php require_once('./parts/footer.php') ?>