<div align="center">

<div>
  <br>
  <br>
</div>

 <table id="datatable-buttons" align="center" border="1" align="center" width="100%" class="table table-bordered table-striped verticle-middle table-responsive-sm">
  <thead>
    <tr>
                      <th>Tanggal Penjualan</th>
                      <th>Total Harga</th>
<!--       <th class="text-center">Total SPP Payment</th>
 -->    </tr>
  </thead>

  <tbody>


                    <?php
                    $no=1;
                    foreach ($ferdi as $jes){
                      ?>
                      <tr>
                        <td><?php echo $jes->tanggal_penjualan?></td>
                        <td><?php echo $jes->total_harga?></td>
                        
                      </tr>
    <?php }?>
</tbody>
</table>
</div>
<script>
  window.print();
</script>