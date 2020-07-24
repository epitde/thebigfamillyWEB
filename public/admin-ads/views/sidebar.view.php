<style type="text/css">
    .role {
        color: rgba(255,255,255,0.5);
        text-align: center;
    }
    .navigation-sidebar .navigation-menu .menu-items li.sel {
        background: rgba(255,255,255,0.1);
    }
</style>
<nav id="navigation" class="navigation-sidebar bg-primary">
        <div class="navigation-header">
        <a href="<?php echo SITE_URL ?>">
            <h1 style="font-size: 20px;color: #fff; text-align: center;">The Big Family</h1>
            <!-- <img src="../assets/images/wbdashboard.png" style="max-width: 130px;"> -->
        </a>
    </div>

    <!--Navigation Profile area-->
    <div class="navigation-profile" style="    padding-bottom: 12px;">
        
        <img class="profile-img rounded-circle" src="../assets/images/avatar.png" alt="profile image">

        <a href="../controller/logout.php" class="circle-white-btn profile-setting"><i class="fa fa-sign-out star-color"></i></a>
        <div class="role">Admin</div>

    </div>


    <!--Navigation Menu Links-->
    <div class="navigation-menu">

        <ul class="menu-items custom-scroll mCustomScrollbar _mCS_1"><div id="mCSB_1" class="mCustomScrollBox mCS-dark mCSB_vertical mCSB_inside" style="max-height: none;" tabindex="0"><div id="mCSB_1_container" class="mCSB_container" style="position:relative; top:0; left:0;" dir="ltr">

            <li id="menu_home">
                <a href="../controller/home.php">
                    <span class="icon-thumbnail"><i class="dripicons-home"></i></span>
                    <span class="title">Dashboard</span>
                </a>
            </li>
            <!-- 
            <li id="menu_banner">
                <a href="javascript:void(0);" class="have-submenu">
                    <span class="icon-thumbnail"><i class="dripicons-photo-group"></i></span>
                    <span class="title">Banner</span>
                </a>
                
                <ul class="sub-menu">

                    <li>
                        <a href="../controller/banner.php">
                            <span class="icon-thumbnail"><i class="dripicons-dot"></i></span>
                            <span class="title">Show All</span>
                        </a>
                    </li>

                    <li>
                        <a href="../controller/new_banner.php">
                            <span class="icon-thumbnail"><i class="dripicons-dot"></i></span>
                            <span class="title">New Banner</span>
                        </a>
                    </li>

                </ul>
            </li>

            <li id="menu_adbanner">
                <a href="javascript:void(0);" class="have-submenu">
                    <span class="icon-thumbnail"><i class="dripicons-photo-group"></i></span>
                    <span class="title">Ad Banner</span>
                </a>
                
                <ul class="sub-menu">

                    <li>
                        <a href="../controller/bannerad.php">
                            <span class="icon-thumbnail"><i class="dripicons-dot"></i></span>
                            <span class="title">Show All</span>
                        </a>
                    </li>

                    <li>
                        <a href="../controller/new_bannerad.php">
                            <span class="icon-thumbnail"><i class="dripicons-dot"></i></span>
                            <span class="title">New Ad Banner</span>
                        </a>
                    </li>

                </ul>
            </li>


            <li id="menu_category">
                <a href="javascript:void(0);" class="have-submenu">
                    <span class="icon-thumbnail"><i class="dripicons-folder"></i></span>
                    <span class="title">Categories</span>
                </a>
                
                <ul class="sub-menu">

                    <li>
                        <a href="../controller/categories.php">
                            <span class="icon-thumbnail"><i class="dripicons-dot"></i></span>
                            <span class="title">Show All</span>
                        </a>
                    </li>

                    <li>
                        <a href="../controller/new_category.php">
                            <span class="icon-thumbnail"><i class="dripicons-dot"></i></span>
                            <span class="title">New Category</span>
                        </a>
                    </li>

                </ul>
            </li>

            <li id="menu_product">
                <a href="javascript:void(0);" class="have-submenu">
                    <span class="icon-thumbnail"><i class="dripicons-suitcase"></i></span>
                    <span class="title">Products</span>
                </a>
                
                <ul class="sub-menu">

                    <li>
                        <a href="../controller/products.php">
                            <span class="icon-thumbnail"><i class="dripicons-dot"></i></span>
                            <span class="title">Show All</span>
                        </a>
                    </li>

                    <li>
                        <a href="../controller/new_product.php">
                            <span class="icon-thumbnail"><i class="dripicons-dot"></i></span>
                            <span class="title">New Product</span>
                        </a>
                    </li>

                </ul>
            </li>
 -->
            <li id="menu_user">
                <a href="javascript:void(0);" class="have-submenu">
                    <span class="icon-thumbnail"><i class="dripicons-user-group"></i></span>
                    <span class="title">Users</span>
                </a>
                
                <ul class="sub-menu">

                    <li>
                        <a href="../controller/users.php">
                            <span class="icon-thumbnail"><i class="dripicons-dot"></i></span>
                            <span class="title">Show All</span>
                        </a>
                    </li>

                    <!-- <li>
                        <a href="../controller/new_user.php">
                            <span class="icon-thumbnail"><i class="dripicons-dot"></i></span>
                            <span class="title">New User</span>
                        </a>
                    </li> -->

                </ul>
            </li>
<!-- 
            <li id="menu_request">
                <a href="javascript:void(0);" class="have-submenu">
                    <span class="icon-thumbnail"><i class="dripicons-inbox"></i></span>
                    <span class="title">Requests</span>
                </a>
                
                <ul class="sub-menu">

                    <li>
                        <a href="../controller/org_requests.php">
                            <span class="icon-thumbnail"><i class="dripicons-dot"></i></span>
                            <span class="title">Orgnization</span>
                        </a>
                    </li>

                </ul>
            </li>
 -->

        </div><div id="mCSB_1_scrollbar_vertical" class="mCSB_scrollTools mCSB_1_scrollbar mCS-dark mCSB_scrollTools_vertical" style="display: block;"><div class="mCSB_draggerContainer"><div id="mCSB_1_dragger_vertical" class="mCSB_dragger" style="position: absolute; min-height: 30px; display: block; height: 90px; max-height: 203.172px; top: 0px;"><div class="mCSB_dragger_bar" style="line-height: 30px;"></div></div><div class="mCSB_draggerRail"></div></div></div></div></ul>
    </div>
</nav>
<script type="text/javascript">
    var url = "<?php echo $_SERVER['REQUEST_URI'];?>";
    var ary = url.split('/');
    url = ary[ary.length-1];

    if (url.indexOf('home') > -1) {
        $('#menu_home').addClass('sel');
    } else if (url.indexOf('bannerad') > -1) {
        $('#menu_adbanner').addClass('sel');
    } else if (url.indexOf('banner') > -1) {
        $('#menu_banner').addClass('sel');
    } else if (url.indexOf('category') > -1 || url.indexOf('categories') > -1) {
        $('#menu_category').addClass('sel');
    } else if (url.indexOf('product') > -1) {
        $('#menu_product').addClass('sel');
    } else if (url.indexOf('user') > -1) {
        $('#menu_user').addClass('sel');
    } else if (url.indexOf('request') > -1) {
        $('#menu_request').addClass('sel');
    }
</script>