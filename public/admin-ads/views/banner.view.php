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
                            <h5>Banner</h5>
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
                <th>Image/Video</th>
                <th>Name</th>
                <th>Product ID</th>
                <th>Action</th>
            </tr>
        </thead>
        <tfoot>
            <tr>
              <th>Id</th>
                <th>Image/Video</th>
                <th>Name</th>
                <th>Product ID</th>
                <th>Action</th>
            </tr>
        </tfoot>

        <tbody>
        <?php
          $idx=1;
          foreach($banners as $banner): ?>
            <tr>
              <td><?php echo $idx; $idx++ ?></td>
                <td align="center">
                  <?php
                  $imagefile = explode(".", $banner['image']);
                  if (end($imagefile) == "mp4" || end($imagefile) == "mpg" || end($imagefile) == "avi" || end($imagefile) == "mov") {
                  ?>
                  <video controls style="height: 100px; width: auto;"><source src="../images/<?php echo $banner['image']; ?>"/></video>
                  <?php
                  } else {
                  ?>
                  <img src="../images/<?php echo $banner['image']; ?>" style="height: 100px; width: auto;">
                  <?php
                  }
                  ?>
                </td>
                <td><?php echo $banner['name']; ?></td>
                <td><?php echo $banner['pid']; ?></td>
                <td>
                <a href="../controller/edit_banner.php?id=<?php echo $banner['id']; ?>" style="font-size: 14px;color: #000000;"><i class="fa fa-cog"></i></a>
          <a onclick="alertdelete_<?php echo $banner['id']; ?>();" style="cursor: pointer;font-size: 14px;color: #000000;"><i class="fa fa-trash-o"></i></a>
              <script type="text/javascript">
  function alertdelete_<?php echo $banner['id']; ?>() {
  swal({ title: "Are you sure?", text: "You will not be able to recover this item!", type: "warning",cancelButtonClass: "btn-default btn-sm", showCancelButton: true, confirmButtonClass: "btn-danger btn-sm", confirmButtonText: "Yes, delete it!", closeOnConfirm: false }, function(){window.location.href = "<?php echo SITE_URL ?>/controller/delete_banner.php?id=<?php echo $banner['id']; ?>" });}
  </script>
          </td>
            </tr>
        <?php endforeach; ?>

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
