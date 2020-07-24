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
                    <h5 class="text-truncate">Orgnization request settings</h5>
                </div>
                    </div>

                    <div class="col-md-12">
                        <div class="form-block mb-4">


<input type="hidden" id="id" value="<?php echo $_GET['id'] ?>" />

<form id="form_1" enctype="multipart/form-data" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post">
  <div class="form-row">
    <div class="form-group col-md-12">
      <div class="div_card block col-md-12" style="padding-bottom: 35px">

        <input type="hidden" value="<?php echo $user['id']; ?>" name="id">

        <div class="user-section" style="margin-top: 0">User Information</div>

        <label class="control-label">Company name</label>
        <input type="text" value="<?php echo $user['fullname']; ?>" name="fullname" class="form-control" required>
        <label class="control-label">Mobile</label>
        <input type="text" value="<?php echo $user['mobile']; ?>" name="mobile" class="form-control" required>
        <label class="control-label">Email</label>
        <input type="text" value="<?php echo $user['email']; ?>" name="email" class="form-control" required>
        <label class="control-label">Registration number</label>
        <input type="text" value="<?php echo $user['postal_code']; ?>" name="postal_code" class="form-control" required>
        <label class="control-label">Address</label>
        <input type="text" value="<?php echo $user['address']; ?>" name="address" class="form-control" required>
        

        <label class="control-label">Status</label>
        <select class="form-control" name="status" id="status">
          <option value="approved">Approved</option>
          <option value="reject">Reject</option>
          <option value="pending">Pending</option>
        </select>
        <script type="text/javascript">
          var status = "<?php echo $user['status']?>";
          $(function() {
            $('#status').val(status);
          })
        </script>

        <br/><br/>
        <div class="action-button">
          <input type="submit" name="update" value="Update" class="btn btn-embossed btn-primary">
        </div>

      </div>

    </div>
  </div>
</form>

<script type="text/javascript">
  var site_url = "<?php echo SITE_URL ?>";
</script>


</div>
</div>
</div>
</div>
</div>
</div>
</section>


<link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/timepicker/1.3.5/jquery.timepicker.min.css">
<script src="//cdnjs.cloudflare.com/ajax/libs/timepicker/1.3.5/jquery.timepicker.min.js"></script>

<link rel="stylesheet" href="../assets/css/user.css?r=<?php echo time()?>">