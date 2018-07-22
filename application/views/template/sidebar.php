<script>
    $(document).ready(function () {
        var className = "<?PHP echo $this->uri->segment(1); ?>";//console.log(className);
        if (className != '') {
            var methodName = "<?PHP echo $this->uri->segment(2); ?>" == '' ? 'index' : "<?PHP echo $this->uri->segment(2); ?>";// console.log(methodName);
            var thirdPanel = "<?PHP echo $this->uri->segment(3); ?>" == '' ? 'index' : "<?PHP echo $this->uri->segment(3); ?>";//console.log(thirdPanel);
            var fourthPanel = "<?PHP echo $this->uri->segment(4); ?>" == '' ? 'index' : "<?PHP echo $this->uri->segment(4); ?>";//console.log(fourthPanel);
            $('.' + className).addClass('active');
            $('.sidemenu .' + className + ' a').removeClass('active');
            $('.' + className + ' .' + methodName).addClass('active');
            $('.' + className + ' .' + thirdPanel).addClass('active');

        } else {
            $('#side-menu > .analytics').addClass('active');
        }
        //************

    });
</script> 

<style type="text/css">
    .shadow{
        box-shadow:0 5px 7px -1px rgba(0, 0, 0, 0.9) !important;
    }
</style>
<!--BEGIN SIDEBAR MENU-->
<nav id="sidebar" role="navigation" class="navbar-default navbar-static-side">
    <div class="sidebar-collapse menu-scroll">
        <ul id="side-menu" class="nav">
            <li class="user-panel">
                <div class="thumb">
                    <?php $image = $this->session->userdata('user_img'); ?>
                    <img src="<?php echo base_url(); ?>assets/upload/<?php echo ($image != '') ? $image : 'users/admin.png'; ?>" alt="" class="img-circle" />
                </div>
                <div class="info">
                    <p style=" width: 140px; overflow: hidden; padding: 0px; margin: 0px; text-overflow: ellipsis; height: 20px;"><?php echo $this->session->userdata('username'); ?></p>
                    <p style=" width: 140px; overflow: hidden; padding: 0px; margin: 0px; text-overflow: ellipsis; height: 20px;">(<?php
                    if ($this->session->userdata('type') == "owner")
                        echo "Owner";
                    else
                        echo "Admin";
                    ?>)</p>
                </div>
                <div class="clearfix"></div>
            </li>
            <li class="analytics sidemenu"><a href="<?php echo base_url(); ?>"><i class="fa fa-tachometer fa-fw"><div class="icon-bg bg-orange"></div></i><span class="menu-title">Dashboard</span></a>
            </li>
            <li class="content_briefcases sidemenu"><a href="<?php echo base_url(); ?>content_briefcases/library"><i class="fa fa-briefcase fa-fw"><div class="icon-bg bg-pink"></div></i><span class="menu-title" >Contents & Briefcases</span><span class="fa arrow"></span></a>
                <!--<ul class="nav nav-second-level" style="box-shadow: 0 5px 7px -1px rgba(0, 0, 0, 0.9) !important">-->
                <ul class="nav nav-second-level" >
                    <li class="briefcase sidemenu"><a href="<?php echo base_url(); ?>content_briefcases/briefcase"><i class="fa fa-briefcase fa-fw"></i><span class="submenu-title">Briefcase</span></a>
                    </li>
                    <li class="library sidemenu"><a href="<?php echo base_url(); ?>content_briefcases/library"><i class="fa fa-list-alt"></i><span class="submenu-title">Library</span></a>
                    </li>
                    <li class="trash sidemenu"><a href="<?php echo base_url(); ?>content_briefcases/trash"><i class="fa fa-trash-o"></i><span class="submenu-title">Trash</span></a>
                    </li>
                </ul>
            </li>
            <li class="users sidemenu"><a href="<?php echo base_url(); ?>users/all_users"><i class="fa fa-user fa-fw"><div class="icon-bg bg-green"></div></i><span class="menu-title">Users</span><span class="fa arrow"></span></a>
                <ul class="nav nav-second-level">
                    <li class="all_users sidemenu"><a href="<?php echo base_url(); ?>users/all_users"><i class="fa fa-user"></i><span class="submenu-title">All Users</span></a>
                    </li>
                    <li class="group sidemenu"><a href="<?php echo base_url(); ?>users/group"><i class="fa fa-users"></i><span class="submenu-title">Groups</span></a>
                    </li>
                </ul>
            </li>
            <li class="announcements sidemenu"><a href="<?php echo base_url(); ?>announcements"><i class="fa fa-bullhorn fa-fw"><div class="icon-bg bg-green"></div></i><span class="menu-title">Announcements</span></a>
            </li>
        </ul>
    </div>
</nav>
<!--END SIDEBAR MENU-->
<!--loading bootstrap js-->
<script src="<?php echo base_url(); ?>assets/vendors/bootstrap/js/bootstrap.min.js"></script>
<script src="<?php echo base_url(); ?>assets/vendors/bootstrap-hover-dropdown/bootstrap-hover-dropdown.js"></script>
<script src="<?php echo base_url(); ?>assets/js/html5shiv.js"></script>
<script src="<?php echo base_url(); ?>assets/js/respond.min.js"></script>
<script src="<?php echo base_url(); ?>assets/vendors/metisMenu/jquery.metisMenu.js"></script>
<script src="<?php echo base_url(); ?>assets/vendors/slimScroll/jquery.slimscroll.js"></script>
<script src="<?php echo base_url(); ?>assets/vendors/jquery-cookie/jquery.cookie.js"></script>
<script src="<?php echo base_url(); ?>assets/vendors/iCheck/icheck.min.js"></script>
<script src="<?php echo base_url(); ?>assets/vendors/iCheck/custom.min.js"></script>
<script src="<?php echo base_url(); ?>assets/vendors/jquery-notific8/jquery.notific8.min.js"></script>
<script src="<?php echo base_url(); ?>assets/vendors/sco.message/sco.message.js"></script>
<script src="<?php echo base_url(); ?>assets/vendors/jquery-notific8/notific8.js"></script>
<script src="<?php echo base_url(); ?>assets/vendors/jquery-highcharts/highcharts.js"></script>

<script src="<?php echo base_url(); ?>assets/js/jquery.menu.js"></script>
<!--<script src="<?php echo base_url(); ?>assets/vendors/jquery-pace/pace.min.js"></script>-->
<script src="<?php echo base_url(); ?>assets/vendors/holder/holder.js"></script>
<script src="<?php echo base_url(); ?>assets/vendors/responsive-tabs/responsive-tabs.js"></script>
<script src="<?php echo base_url(); ?>assets/vendors/jquery-news-ticker/jquery.newsTicker.min.js"></script>
<script src="<?php echo base_url(); ?>assets/vendors/moment/moment.js"></script>
<script src="<?php echo base_url(); ?>assets/vendors/bootstrap-datepicker/js/bootstrap-datepicker.js"></script>
<script src="<?php echo base_url(); ?>assets/vendors/bootstrap-daterangepicker/daterangepicker.js"></script>
<!--CORE JAVASCRIPT-->
<script src="<?php echo base_url(); ?>assets/js/main.js"></script>
<!--validation-->
<script src="<?php echo base_url(); ?>assets/vendors/jquery-validate/jquery.validate.min.js"></script>
<script src="<?php echo base_url(); ?>assets/js/form-validation.js"></script>
<!--validation-->
<script src="<?php echo base_url(); ?>assets/js/custom.js"></script>
<script src="<?php echo base_url(); ?>assets/js/jstz-1.0.4.min.js"></script>
<script>
    $(document).ready(function () {
//          $(document).on('click','#menu-toggle',function(e){ console.log('hello');
        $('#menu-toggle').click(function (e) { //console.log('hello');
            e.preventDefault();
            $('#side-menu').find('ul').toggleClass('shadow');
            $('#side-menu').find('.menu-title').toggleClass('shadow');

        })

    })
</script>