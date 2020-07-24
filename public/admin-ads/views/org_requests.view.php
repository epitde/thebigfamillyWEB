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
                            <h5>Orgnization Requests</h5>
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
                <th>Company Name</th>
                <th>Registration Number</th>
                <th>Mobile</th>
                <th>Email</th>
                <th>Address</th>
                <th>Created at</th>
                <th>Created by</th>
                <th>Status</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tfoot>
            <tr>
              <th>Id</th>
                <th>Company Name</th>
                <th>Registration Number</th>
                <th>Mobile</th>
                <th>Email</th>
                <th>Address</th>
                <th>Created at</th>
                <th>Created by</th>
                <th>Status</th>
                <th>Actions</th>
            </tr>
        </tfoot>

        <tbody>
        <?php foreach($users as $user): ?>
            <tr>
              <td><?php echo $user['id']; ?></td>
                <td><?php echo $user['fullname']; ?></td>
                <td><?php echo $user['postal_code']; ?></td>
                <td><?php echo $user['mobile']; ?></td>
                <td><?php echo $user['email']; ?></td>
                <td><?php echo $user['address']; ?></td>
                <td><?php echo getDateTime($user['created_at']); ?></td>
                <td><?php echo $user['request_by_name']; ?></td>
                <td class="status status_<?php echo $user['status']; ?>"><?php echo $user['status']; ?></td>
                <td>
                <a href="../controller/edit_org_request.php?id=<?php echo $user['id']; ?>" style="font-size: 14px;color: #000000;"><i class="fa fa-cog"></i></a>
                <!-- <a onclick="alertdelete_<?php echo $user['id']; ?>();" style="cursor: pointer;font-size: 14px;color: #000000;"><i class="fa fa-trash-o"></i></a> -->
                <script type="text/javascript">
                  function alertdelete_<?php echo $user['id']; ?>() {
                  swal({ title: "Are you sure?", text: "You will not be able to recover this item!", type: "warning",cancelButtonClass: "btn-default btn-sm", showCancelButton: true, confirmButtonClass: "btn-danger btn-sm", confirmButtonText: "Yes, delete it!", closeOnConfirm: false }, function(){window.location.href = "<?php echo SITE_URL ?>/controller/delete_user.php?id=<?php echo $user['id']; ?>" });}
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
