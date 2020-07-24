<?php require'sidebar.view.php'; ?>  

<!--Page Container-->
<section class="page-container">
    <div class="page-content-wrapper">

        <?php require'navbar.view.php'; ?>

        <!--Main Content-->
        <div class="content sm-gutter">
            <div class="container-fluid padding-25 sm-padding-10">
                <div class="row">

                    <div class="col-12">
                        <div class="section-title">
                            <h4>Dashboard</h4>
                        </div>
                    </div>


                    <!-- <div class="col-12 col-sm-6 col-md-3 col-lg-3">
                        <div class="block counter-block mb-4">
                            <div class="value"><?php echo $categories_total; ?></div>
                            <i class="dripicons-folder i-icon"></i>
                            <p class="label">Categories</p>
                        </div>
                    </div> -->

                    <div class="col-12 col-sm-6 col-md-3 col-lg-3">
                        <div class="block counter-block mb-4">
                            <div class="value"><?php echo $users_total; ?></div>
                            <i class="dripicons-user i-icon"></i>
                            <p class="label">Users</p>
                        </div>
                    </div>

                    <!-- <div class="col-12 col-sm-6 col-md-3 col-lg-3">
                        <div class="block counter-block mb-4">
                            <div class="value"><?php echo $products_total; ?></div>
                            <i class="dripicons-suitcase i-icon"></i>
                            <p class="label">Products</p>
                        </div>
                    </div>

                    <div class="col-12 col-sm-6 col-md-3 col-lg-3">
                        <div class="block counter-block mb-4">
                            <div class="value"><?php echo count($requests); ?></div>
                            <i class="dripicons-inbox i-icon"></i>
                            <p class="label">Orgnization Requests</p>
                        </div>
                    </div> -->

                    <div class="col-12">
                        <div class="section-title">
                            <h4>Summary</h4>
                        </div>
                    </div>

                    <div class="col-12 col-md-12 col-lg-12">
                        <div class="block table-block mb-4">
                            <div class="block-heading d-flex align-items-center" style="border:0; padding-bottom: 0;">
                                <h5 class="text-truncate">Users</h5>
                                <div class="graph-pills graph-home">
                                    <ul class="nav nav-pills" id="pills-tab" role="tablist">
                                        <li class="nav-item">
                                            <a class="nav-link active active-2" href="../controller/users.php">View All <i class="fa fa-angle-right" style="margin-left: 5px"></i></a>
                                        </li>
                                    </ul>
                                </div>
                            </div>

                            <div class="custom-scroll" style="max-height: 250px;">
                                <div class="table-responsive text-no-wrap">
                                    <table class="table">
                                        <tbody class="text-middle">
                                        <?php foreach(array_slice($users, 0, 5) as $user): ?>
                                        <tr>
                                            <td class="product">
                                                <img class="product-img" src="../assets/images/avatar.png">
                                            </td>
                                            <td><span class="span-title"><?php echo $user['email']; ?></span></td>
                                            <td><span class="span-title"><?php echo $user_role[$user['role']]; ?></span></td>
                                            <td class="price price-td-home"><a href="../controller/edit_user.php?id=<?php echo $user['id']; ?>"><i class="fa fa-cog a-i-color"></i></a> </td>
                                        </tr>

  
                            <?php endforeach; ?>
                                        
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                       </div>
                    </div>  
                    <!--
                    <div class="col-12 col-md-6 col-lg-6">
                        <div class="block table-block mb-4">
                            <div class="block-heading d-flex align-items-center" style="border:0; padding-bottom: 0;">
                                <h5 class="text-truncate">Products</h5>
                                <div class="graph-pills graph-home">
                                    <ul class="nav nav-pills" id="pills-tab" role="tablist">
                                        <li class="nav-item">
                                            <a class="nav-link active active-2" href="../controller/products.php">View All <i class="fa fa-angle-right" style="margin-left: 5px"></i></a>
                                        </li>
                                    </ul>
                                </div>
                            </div>

                            <div class="custom-scroll" style="max-height: 250px;">
                                <div class="table-responsive text-no-wrap">
                                    <table class="table">
                                        <tbody class="text-middle">
                                        <?php foreach(array_slice($products, 0, 5) as $product): ?>
                                        <tr>
                                            <td class="product">
                                                <img class="product-img" src="../images/<?php echo $product['image']; ?>">
                                            </td>
                                            <td class="name"><span class="span-title"><?php echo $product['name']; ?></span></td>
                                            <td class="price price-td-home"><a href="../controller/edit_product.php?id=<?php echo $product['id']; ?>"><i class="fa fa-cog a-i-color"></i></a> <a style="cursor: pointer;" onclick="alertdelete_w<?php echo $product['id']; ?>();"><i class="fa fa-trash-o a-i-color"></i></a></td>
                                        </tr>

                                        <script type="text/javascript">
                                  function alertdelete_w<?php echo $product['id']; ?>() {
                                  swal({ title: "Are you sure?", text: "You will not be able to recover this item!", type: "warning",cancelButtonClass: "btn-default btn-sm", showCancelButton: true, confirmButtonClass: "btn-danger btn-sm", confirmButtonText: "Yes, delete it!", closeOnConfirm: false }, function(){window.location.href = "../controller/delete_product.php?id=<?php echo $product['id']; ?>" });}
                                  </script>
  
                            <?php endforeach; ?>
                                        
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                       </div>
                    </div> 


                    <div class="col-12 col-md-6 col-lg-6">
                        <div class="block table-block mb-4">
                            <div class="block-heading d-flex align-items-center" style="border:0; padding-bottom: 0;">
                                <h5 class="text-truncate">Categories</h5>
                                <div class="graph-pills graph-home">
                                <ul class="nav nav-pills" id="pills-tab" role="tablist">
                                    <li class="nav-item">
                                        <a class="nav-link active active-2" href="../controller/categories.php">View All <i class="fa fa-angle-right" style="margin-left: 5px"></i></a>
                                    </li>
                                </ul>
                            </div>
                            </div>

                            <div class="custom-scroll" style="max-height: 250px;">
                                <div class="table-responsive text-no-wrap">
                                    <table class="table">
                                        <tbody class="text-middle">
                                        <?php foreach(array_slice($categories, 0, 5) as $category): ?>
                                        <tr>
                                            <td class="product">
                                                <img class="product-img" src="../images/<?php echo $category['image']; ?>">
                                            </td>
                                            <td class="name"><span class="span-title"><?php echo $category['name']; ?></span></td>
                                            <td class="price price-td-home"><a href="../controller/edit_post.php?id=<?php echo $category['id']; ?>"><i class="fa fa-cog a-i-color"></i></a> <a style="cursor: pointer;" onclick="alertdelete_p<?php echo $category['id']; ?>();"><i class="fa fa-trash-o a-i-color"></i></a></td>
                                        </tr>

                                        <script type="text/javascript">
                                  function alertdelete_p<?php echo $category['id']; ?>() {
                                  swal({ title: "Are you sure?", text: "You will not be able to recover this item!", type: "warning",cancelButtonClass: "btn-default btn-sm", showCancelButton: true, confirmButtonClass: "btn-danger btn-sm", confirmButtonText: "Yes, delete it!", closeOnConfirm: false }, function(){window.location.href = "../controller/delete_post.php?id=<?php echo $category['id']; ?>" });}
                                  </script>
  
                            <?php endforeach; ?>
                                        
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div> 


                    <div class="col-12 col-md-6 col-lg-6">
                        <div class="block table-block mb-4">
                            <div class="block-heading d-flex align-items-center" style="border:0; padding-bottom: 0;">
                                <h5 class="text-truncate">Orgnization requests</h5>
                                <div class="graph-pills graph-home">
                                <ul class="nav nav-pills" id="pills-tab" role="tablist">
                                    <li class="nav-item">
                                        <a class="nav-link active active-2" href="../controller/org_requests.php">View All <i class="fa fa-angle-right" style="margin-left: 5px"></i></a>
                                    </li>
                                </ul>
                            </div>
                            </div>

                            <div class="custom-scroll" style="max-height: 250px;">
                                <div class="table-responsive text-no-wrap">
                                    <table class="table">
                                        <tbody class="text-middle">
                                        <?php foreach(array_slice($requests, 0, 5) as $request): ?>
                                            <tr>
                                                <td class="name"><span class="span-title"><?php echo $request['fullname']; ?></span></td>
                                                <td class="name"><span class="span-title"><?php echo $request['mobile']; ?></span></td>
                                                <td class="name"><span class="span-title"><?php echo $request['email']; ?></span></td>
                                                <td class="name"><span class="span-title"><?php echo $request['status']; ?></span></td>
                                                <td class="price price-td-home"><a href="../controller/edit_org_request.php?id=<?php echo $request['id']; ?>"><i class="fa fa-cog a-i-color"></i></a> </td>
                                            </tr>  
                                        <?php endforeach; ?>                                        
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div> 
                    -->

                </div>
            </div>
        </div>
    </div>

</section>
<style type="text/css">
    h5 {
        padding-bottom: 5px;
    }
</style>