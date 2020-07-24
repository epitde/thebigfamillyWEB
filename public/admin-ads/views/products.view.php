<?php require'sidebar.php'; ?>

<script type="text/javascript">
  $(document).ready( function () {
    $('#table_id').DataTable();
} );
</script>

<!--Page Container--> 
<section class="page-container">
    <div class="page-content-wrapper">

        

        <!--Main Content-->

 <div class="content sm-gutter">
            <div class="container-fluid padding-25 sm-padding-10">
                <div class="row">
                    <div class="col-12">
                        <div class="section-title">
                            <h5>Products</h5>
                        </div>
                    </div>

<div class="col-12">
                        <div class="block table-block mb-4" style="margin-top: 20px;">

                            <div class="row">
                                <div class="table-responsive">
<table id="table_id" class="table table-striped table-bordered" cellspacing="0" width="100%" style="border-radius: 5px;">
    <thead>
            <tr>
              <th>No</th>
              <th>Id</th>
                <th>Image</th>
                <th>Video</th>
                <th>Title</th>
                <th>User</th>
                <th>Created at</th>
                <th>Check Status</th>
                <th>Status</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tfoot>
            <tr>
              <th>No</th>
              <th>Id</th>
                <th>Image</th>
                <th>Video</th>
                <th>Title</th>
                <th>User</th>
                <th>Created at</th>
                <th>Check Status</th>
                <th>Status</th>
                <th>Actions</th>
            </tr>
        </tfoot>

        <tbody>
        <?php
          $idx=1;
          foreach($products as $product): ?>
            <tr>
              <td><?php echo $idx; $idx++ ?></td>
              <td><?php echo $product['id']; ?></td>
                <td width="40px" align="center"><img src="../images/<?php echo $product['image']; ?>" style="width: 40px; height: 40px; padding: 2px;"></td>
                <td width="40px" align="center" style="position: relative;">
                  <?php if ($product['video_thumb'] != '') {
                  ?>
                  <a href="../images/<?php echo $product['video']; ?>" target="_blank">
                    <i class="fa fa-play" style="position: absolute;left: 24px;top:24px"></i><img src="../images/<?php echo $product['video_thumb']; ?>" style="width: 40px; height: 40px; padding: 2px;">
                  </a>
                  <?php }
                  ?>
                </td>
                <td><?php echo getproductName($product); ?></td>
                <td><?php echo $product['fullname']."<br/><span style='font-size:12px;color:gray'>".$user_role[$product['role']]; ?></span></td>
                <td><?php echo getDateTime($product['created_at']); ?></td>
                <td><span class="<?php echo $product['check_status']; ?>"><?php echo $product['check_status']; ?></span></td>
                <td class="status status_<?php echo $product['status']; ?>"><?php echo $product['status']; ?></td>
                <td>
                <a href="../controller/edit_product.php?id=<?php echo $product['id']; ?>" style="font-size: 14px;color: #000000;"><i class="fa fa-cog"></i></a>
          <a onclick="alertdelete_<?php echo $product['id']; ?>();" style="cursor: pointer;font-size: 14px;color: #000000;"><i class="fa fa-trash-o"></i></a>
              <script type="text/javascript">
  function alertdelete_<?php echo $product['id']; ?>() {
  swal({ title: "Are you sure?", text: "You will not be able to recover this item!", type: "warning",cancelButtonClass: "btn-default btn-sm", showCancelButton: true, confirmButtonClass: "btn-danger btn-sm", confirmButtonText: "Yes, delete it!", closeOnConfirm: false }, function(){window.location.href = "<?php echo SITE_URL ?>/controller/delete_product.php?id=<?php echo $product['id']; ?>" });}
  </script>
          </td>
            </tr>
        <?php endforeach; ?>

<?php
function getproductName($cate) {
  return $cate['name'];
}
?>
        </tbody>
</table>

</div>
</div>
</div>
</div>
</div>
</div>
</div>
</div>
</section>
<style type="text/css">
  .sold {
    padding: 3px 6px;
    background: #1ebb1e;
    color: #fff;
    font-size: 12px;
  }
</style>
