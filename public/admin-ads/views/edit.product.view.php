<?php require'sidebar.php'; ?>

<!--Page Container--> 
<section class="page-container">
    <div class="page-content-wrapper">

        

        <!--Main Content-->

 <div class="content sm-gutter">
            <div class="container-fluid padding-25 sm-padding-10">
                <div class="row">
                    <div class="col-12">
                                        <div class="block-heading d-flex align-items-center title-pages">
                    <h5 class="text-truncate">Edit Product</h5>
                </div>
                    </div>

                    <div class="col-md-12">
                        <div class="form-block mb-4">

<form enctype="multipart/form-data" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post">


<div class="form-row">
  <div class="form-group col-md-12">
    <div class="block col-md-12" style="padding-bottom: 35px">

  <label class="control-label">Category</label>
  <select class="form-control" name="category" id="category">
    <?php foreach($parent as $p): ?>
    <option value="<?php echo $p['id']?>"><?php echo $p['name']?></option>
    <?php endforeach; ?>
  </select>
  <script type="text/javascript">
    var sel = <?php echo $product['category']?>;
    $(function() {
      $('#category').val(sel);
    })
  </script>

   <input type="hidden" value="<?php echo $product['id']; ?>" name="id">
   <label class="control-label">Title</label>
   <input type="text" value="<?php echo $product['name']; ?>" placeholder="" name="name" class="form-control" required="">

   <label class="control-label">Status</label>
  <select class="form-control" name="status" id="status">
    <option value="active">Active</option>
    <option value="inactive">Inactive</option>
    <option value="block">Block</option>
  </select>
  <script type="text/javascript">
    var status = "<?php echo $product['status']?>";
    $(function() {
      $('#status').val(status);
    })
  </script>

        <label >Image</label>

<div class="new-image" id="image-preview" style="background: url(../images/<?php echo $product['image'] ?>);background-size: cover; background-position: center;">
  <label for="image-upload" id="image-label">Choose File</label>
  <input type="hidden" value="<?php echo $product['image']; ?>" name="image_save">
  <input type="file" name="image" id="image-upload" />
</div>

<span class="text-danger recomendedsize">Recommended size: <b>350 x 250</b> </span>
<br/>
<br/>
   <div class="action-button">
   <input type="submit" name="update" value="Update" class="btn btn-embossed btn-primary">
   <a onclick="alertdelete();">
   <input name="trash" value="Delete" class="btn btn-embossed btn-danger" style="width: 80px;"></a>
    <script type="text/javascript">
   function alertdelete() {
   swal({ title: "Are you sure?", text: "You will not be able to recover this item!", type: "warning",cancelButtonClass: "btn-default btn-sm", showCancelButton: true, confirmButtonClass: "btn-danger btn-sm", confirmButtonText: "Yes, delete it!", closeOnConfirm: false }, function(){window.location.href = "<?php echo SITE_URL ?>/controller/delete_product.php?id=<?php echo $product['id']; ?>" });}
   </script>
   </div>


</div>
</div>
</div>
</form>
</div>
</div>
</div>
</div>
</div>
</div>
</section>

