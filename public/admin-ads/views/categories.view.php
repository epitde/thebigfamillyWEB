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
                            <h5>Categories</h5>
                        </div>
                    </div>

<div class="col-12">
                        <div class="block table-block mb-4" style="margin-top: 20px;">

                            <div class="row">
                                <div class="table-responsive">
<table id="table_id" class="table table-striped table-bordered" cellspacing="0" width="100%" style="border-radius: 5px;">
    <thead>
            <tr>
              <th>Id</th>
                <th>Image</th>
                <th>Title</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tfoot>
            <tr>
              <th>Id</th>
                <th>Image</th>
                <th>Title</th>
                <th>Actions</th>
            </tr>
        </tfoot>

        <tbody>
        <?php
          $idx=1;
          foreach($categories as $category): ?>
            <tr>
              <td><?php echo $idx; $idx++ ?></td>
                <td width="40px" align="center"><img src="../images/<?php echo $category['image']; ?>" style="width: 40px; height: 40px; padding: 2px;"></td>
                <td><?php echo getCategoryName($category); ?></td>
                <td>
                <a href="../controller/edit_category.php?id=<?php echo $category['id']; ?>" style="font-size: 14px;color: #000000;"><i class="fa fa-cog"></i></a>
          <a onclick="alertdelete_<?php echo $category['id']; ?>();" style="cursor: pointer;font-size: 14px;color: #000000;"><i class="fa fa-trash-o"></i></a>
              <script type="text/javascript">
  function alertdelete_<?php echo $category['id']; ?>() {
  swal({ title: "Are you sure?", text: "You will not be able to recover this item!", type: "warning",cancelButtonClass: "btn-default btn-sm", showCancelButton: true, confirmButtonClass: "btn-danger btn-sm", confirmButtonText: "Yes, delete it!", closeOnConfirm: false }, function(){window.location.href = "<?php echo SITE_URL ?>/controller/delete_category.php?id=<?php echo $category['id']; ?>" });}
  </script>
          </td>
            </tr>
        <?php endforeach; ?>

<?php
function getCategoryName($cate) {
  global $categories;
  if ($cate['parent'] == '0') {
    return "<b>".$cate['name']."</b>";
  } else {
    $p = $cate['parent'];
    for ($i=0; $i<count($categories); $i++) {
      if ($categories[$i]['id'] == $p) {
        return "<font color='gray'>" . " ----- " . $cate['name']. "</font>";
        break;
      }
    }
  }
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