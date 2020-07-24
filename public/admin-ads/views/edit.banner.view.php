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
                    <h5 class="text-truncate">Edit banner</h5>
                </div>
                    </div>

                    <div class="col-md-12">
                        <div class="form-block mb-4">

<form enctype="multipart/form-data" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post">


<div class="form-row">
  <div class="form-group col-md-12">
    <div class="block col-md-12" style="padding-bottom: 35px">

   <input type="hidden" value="<?php echo $banner['id']; ?>" name="id">
   <label class="control-label">Title</label>
   <input type="text" value="<?php echo $banner['name']; ?>" placeholder="" name="name" class="form-control" required="">
   <label class="control-label">Product ID</label>
   <input type="text" value="<?php echo $banner['pid']; ?>" placeholder="" name="pid" class="form-control" required="">

        <label >Image</label>

<div class="new-image" id="image-preview" style="background: url(../images/<?php echo $banner['image'] ?>);background-size: cover; background-position: center;">
  <label for="image-upload" id="image-label">Choose File</label>
  <input type="hidden" value="<?php echo $banner['image']; ?>" name="image_save">
  <input type="file" name="image" id="image-upload" />
</div>

<br/>
<br/>
   <div class="action-button">
   <input type="submit" name="update" value="Update" class="btn btn-embossed btn-primary">
   <a onclick="alertdelete();">
   <input name="trash" value="Delete" class="btn btn-embossed btn-danger" style="width: 80px;"></a>
    <script type="text/javascript">
   function alertdelete() {
   swal({ title: "Are you sure?", text: "You will not be able to recover this item!", type: "warning",cancelButtonClass: "btn-default btn-sm", showCancelButton: true, confirmButtonClass: "btn-danger btn-sm", confirmButtonText: "Yes, delete it!", closeOnConfirm: false }, function(){window.location.href = "<?php echo SITE_URL ?>/controller/delete_banner.php?id=<?php echo $banner['id']; ?>" });}
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

<style type="text/css">
  #image-preview {
    width: 100%;
    max-width: 500px;
    height: 250px;
    text-align: center;
  }
  #image-preview video {
    max-width: 100%;
    max-height: 100%;
  }
</style>
