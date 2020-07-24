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
                    <h5 class="text-truncate">Edit Category</h5>
                </div>
                    </div>

                    <div class="col-md-12">
                        <div class="form-block mb-4">

<form enctype="multipart/form-data" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post">


<div class="form-row">
  <div class="form-group col-md-12">
    <div class="block col-md-12" style="padding-bottom: 35px">

   <input type="hidden" value="<?php echo $category['id']; ?>" name="id">
   <label class="control-label">Title</label>
   <input type="text" value="<?php echo $category['name']; ?>" placeholder="" name="name" class="form-control" required="">
   <label class="control-label" style="display: none;">Parent</label>
  <select class="form-control" name="parent" id="parent" style="display: none;">
    <option value="0">No Parent</option>
    <?php foreach($parent as $p): ?>
    <option value="<?php echo $p['id']?>"><?php echo $p['name']?></option>
    <?php endforeach; ?>
  </select>
  <script type="text/javascript">
    var selParent = <?php echo $category['parent']?>;
    $(function() {
      $('#parent').val(selParent);
    })
  </script>

        <label >Image</label>

<div class="new-image" id="image-preview" style="background: url(../images/<?php echo $category['image'] ?>);background-size: cover; background-position: center;">
  <label for="image-upload" id="image-label">Choose File</label>
  <input type="hidden" value="<?php echo $category['image']; ?>" name="image_save">
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
   swal({ title: "Are you sure?", text: "You will not be able to recover this item!", type: "warning",cancelButtonClass: "btn-default btn-sm", showCancelButton: true, confirmButtonClass: "btn-danger btn-sm", confirmButtonText: "Yes, delete it!", closeOnConfirm: false }, function(){window.location.href = "<?php echo SITE_URL ?>/controller/delete_category.php?id=<?php echo $category['id']; ?>" });}
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

