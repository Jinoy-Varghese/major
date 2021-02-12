<?php
defined('BASEPATH') or exit('No direct script access allowed');
if(!isset($_SESSION['u_id']))
{
  redirect('Home/login','refresh');
}

?>
<style>
@keyframes bell-shake {
    0% {
        transform: rotate(0deg);
    }
    5% {
        transform: rotate(10deg);
    }
    10% {
        transform: rotate(-10deg);
    }
    15% {
        transform: rotate(10deg);
    }
    20% {
        transform: rotate(-10deg);
    }
    25% {
        transform: rotate(0deg);
    }
    75% {
        transform: rotate(0deg);
    }
    80% {
        transform: rotate(10deg);
    }
    85% {
        transform: rotate(-10deg);
    }
    90% {
        transform: rotate(10deg);
    }
    95% {
        transform: rotate(-10deg);
    }
    100% {
        transform: rotate(0);
    }
}
.alert-bell {
  animation: bell-shake 1.5s cubic-bezier(0.250, 0.460, 0.450, 0.940) infinite;
  animation-delay: 4s;
}
.dropdown-menu-arrow {
  top: -26px;
  left: 7%;
  width: 0;
  height: 0;
  position: relative;
}
.dropdown-menu-arrow:before,
.dropdown-menu-arrow:after {
  content: "";
  position: absolute;
  display: block;
  width: 0;
  height: 0;
  border-width: 7px 8px;
  border-style: solid;
  border-color: transparent;
  z-index: 1001;
}
.dropdown-menu-arrow:after {
  bottom: -18px;
  right: -8px;
  border-bottom-color: #fff;
}
.dropdown-menu-arrow:before {
  bottom: -17px;
  right: -8px;
  border-bottom-color: coral;
}

</style>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="<?php echo base_url('assets/js/sweetalert2.all.min.js'); ?>"></script>
<?php 
  $sql=$this->db->get_where('users',array('email'=>$_SESSION["u_id"]));
  foreach($sql->result() as $user_name)
  {
    $user_name->name;
  }

?>
  <!-- Custom styles for this template -->

  <link href="<?php echo base_url('assets/css/simple-sidebar.css'); ?>" rel="stylesheet">
  <!--navigation-->
  <nav class="navbar navbar-expand-lg navbar-dark bg-primary sticky-top"><!-- sticky top can be replaced with fixed-botto or fixed-top -->
    <button class="btn btn-primary" id="menu-toggle">Menu</button>
    <a href="#" class="navbar-brand mx-auto">Logo</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo02" aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse justify-content-end" id="navbarTogglerDemo02">
      <ul class="navbar-nav my-2 my-lg-0">
        <li class="nav-item active"><a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a></li>
       
       
        <li class="nav-item dropdown ">
            <a class="nav-link " href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
             <i class="fas fa-bell 
             
             <?php
                $sql=$this->db->select('meet_status')->from('professor_data')->where('email',$_SESSION['u_id'])->get();
                foreach($sql->result() as $value)
                {
                  $status=$value->meet_status;
                }
                if($status==1)
                {
             ?>
             text-warning alert-bell
             <?php 
                }
              ?>
             
             "></i>
            </a>
            <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink" style="border-top-color: coral;">
            <span class="dropdown-menu-arrow "></span>
            <?php
              if($status==1)
              {
            ?>
              <a class="dropdown-item" href="#">The meeting is running<br> on background</a>
              <?php 
              }
              else
              {
              ?>
               <a class="dropdown-item" href="#">No Notifications</a>
              <?php
              }
               ?>
            </div>
          </li>



        <li class="nav-item dropdown mr-4">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
            <?php echo $user_name->name; ?>
            
            </a>
            <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink" style="border-top-color: coral;">
            <span class="dropdown-menu-arrow" ></span>
              <a class="dropdown-item" href="<?php echo site_url(); ?>Super_admin/my_profile"><i class="fa fa-user mr-1"></i>My Profile</a>
              <a href="<?php echo base_url(); ?>home/logout" class="dropdown-item" id="logoutbtn_id"><i class="fa fa-power-off mr-1"></i>Logout</a>
            </div>
          </li>
      </ul>
      <form class="form-inline my-2 my-lg-0">
        <input class="form-control mr-sm-2" type="search" placeholder="Search">
        <button class="btn btn-outline-light my-2 my-sm-0" type="submit">Search</button>
      </form>
    </div>
  </nav>

  <!--/navigation-->
  <div class="d-flex" id="wrapper">

    <!-- Sidebar -->
    <div class="bg-light border-right" id="sidebar-wrapper">
      <div class="sidebar-heading">
        Hi <?php echo $user_name->name; ?>
      </div>
      <div class="list-group list-group-flush">
        <a href="<?php echo site_url(); ?>Professor/" class="list-group-item list-group-item-action bg-light">Dashboard</a>
        <a href="<?php echo site_url(); ?>Professor/calendar" class="list-group-item list-group-item-action bg-light">Calendar</a>
 
        <div class="list-group-item  bg-light sub-menu"><a href='#drop-down' class="drop-down-n w-100">Add Users<div class='angle fas fa-angle-down right'></div></a></div>
          <ul class="drop-down-ul">

            <a href='<?php echo site_url(); ?>Professor/add_student' class="drop-down-a"><li class="drop-down-li">Student</li></a>
            <a href='<?php echo site_url(); ?>Professor/add_parent' class="drop-down-a"><li class="drop-down-li">Parent</li></a>


          </ul>
        <a href="<?php echo site_url(); ?>Professor/mark_attendance" class="list-group-item list-group-item-action bg-light">Attendance</a>
        <a href="<?php echo site_url(); ?>Professor/live_meeting" class="list-group-item list-group-item-action bg-light">Live Meating <i class="fas fa-video float-right"></i></a>
        <a href="#" class="list-group-item list-group-item-action bg-light">Notes</a>
        
        
      </div>
    </div>
    <!-- /#sidebar-wrapper -->
    <script>
$('#logoutbtn_id').on('click',function(e)
{
    e.preventDefault();
    const href=$(this).attr('href')

    Swal.fire({
  title: 'ARE YOU SURE?',
  text: "Do you want to Log Out",
  icon: 'warning',
  showCancelButton: true,
  confirmButtonColor: '#dc3545',
  cancelButtonColor: '#6c757d',
  confirmButtonText: 'Log Out'
}).then((result) => {
  if (result.value) {
    document.location.href=href;
  }
})
})
</script>
    <!-- Page Content -->
    <div id="page-content-wrapper">

      <div class="container-fluid">
