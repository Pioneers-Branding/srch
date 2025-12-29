  <?php include('header.php');?>
  <div class="container">
  <div class="row">
   
      <table class="table">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Name</th>
      <th scope="col">Enegry</th>
      <th scope="col">Protein</th>
      <th scope="col">CHO</th>
      <th scope="col">Fat</th>
    </tr>
  </thead>

  <tbody>
      <?php print_r($_POST);?>
         <?php $count=1; while($dt = towfetch($diet)){ ?>
      
    <!--<tr>-->
    <!--  <th scope="row"><?= $count ?></th>-->
    <!--  <td>-->
    <!--      <input type="checkbox" name="productId[]" value="<?= $dt['brand_id']?>" />-->
    <!--      <?= $dt['brand_name']?>-->
    <!--      </td>-->
    <!--  <td><?= $dt['enegry']?></td>-->
    <!--  <td><?= $dt['protein']?></td>-->
    <!--  <td><?= $dt['cho']?></td>-->
    <!--  <td><?= $dt['fat']?></td>-->
      
    <!--</tr>-->
      <?php $count++; } ?>
      
  </tbody>
  <tfoot>
          <tr>
               <input type="hidden" name="calculate-ref" value="calculate-ref" />
              <td colspan="3"> Total</td>
              <td colspan="3"> Total</td>
          </tr>
      </tfoot>

</table>
	</div>
	 <?php include('footer.php');?>