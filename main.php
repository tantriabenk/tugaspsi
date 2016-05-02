<?php
session_start();
error_reporting(0);
/*
if(empty($_SESSION['no_pegawai']) AND empty($_SESSION['password'])){
  session_unset();
  session_destroy();
  echo "<script>document.location.href='index.php';</script>";
}else{*/
  include_once "config.php";

?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  <!-- Meta, title, CSS, favicons, etc. -->
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <title>Cuti Online!</title>

  <?php include_once "TopResource.php"; ?>
</head>


<body class="nav-md">

  <div class="container body">


    <div class="main_container">

      <div class="col-md-3 left_col">
        <div class="left_col scroll-view">

          <div class="navbar nav_title" style="border: 0;">
            <a href="index.html" class="site_title"><i class="fa fa-paw"></i> <span>Cuti Online!</span></a>
          </div>
          <div class="clearfix"></div>

          <!-- menu prile quick info -->
          <div class="profile">
            <div class="profile_pic">
              <img src="images/img.jpg" alt="..." class="img-circle profile_img">
            </div>
            <div class="profile_info">
              <span>Welcome,</span>
              <h2>John Doe</h2>
            </div>
          </div>
          <!-- /menu prile quick info -->

          <br />

          <!-- sidebar menu -->
          <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">

            <div class="menu_section">
              <h3>General</h3><?php echo $_SESSION['jabatan']; ?>
              <ul class="nav side-menu">
                <li><a><i class="?mod=dashboard"></i> Dashboard</a></li>
                <li><a><i class="fa fa-table"></i> Master <span class="fa fa-chevron-down"></span></a>
                  <ul class="nav child_menu" style="display: none">
                    <li><a href="?mod=jabatan">Master Jabatan</a></li>
                    <li><a href="?mod=golongan">Master Golongan</a></li>
                    <li><a href="?mod=instansi">Master Instansi</a></li>
                    <li><a href="?mod=pegawai">Master Pegawai</a></li>
                    <li><a href="?mod=jenis_cuti">Master Jenis Cuti</a></li>
                  </ul>
                </li>
                <li><a><i class="fa fa-edit"></i> Halaman <span class="fa fa-chevron-down"></span></a>
                  <ul class="nav child_menu" style="display: none">
                    <li><a href="?mod=pengajuan">Pengajuan Cuti</a></li>
                    <li><a href="?mod=validasi">Validasi Cuti</a></li>
                    <li><a href="?mod=persetujuan">Persetujuan Camat</a></li>
                    <li><a href="?mod=cetak_laporan">Cetak Laporan</a></li>
                    <li><a href="?mod=cetak_surat">Cetak Surat</a></li>
                  </ul>
                </li>
              </ul>
            </div>

          </div>
          <!-- /sidebar menu -->

          <!-- /menu footer buttons -->
          <div class="sidebar-footer hidden-small">
            <a data-toggle="tooltip" data-placement="top" title="Settings">
              <span class="glyphicon glyphicon-cog" aria-hidden="true"></span>
            </a>
            <a data-toggle="tooltip" data-placement="top" title="FullScreen">
              <span class="glyphicon glyphicon-fullscreen" aria-hidden="true"></span>
            </a>
            <a data-toggle="tooltip" data-placement="top" title="Lock">
              <span class="glyphicon glyphicon-eye-close" aria-hidden="true"></span>
            </a>
            <a data-toggle="tooltip" data-placement="top" title="Logout">
              <span class="glyphicon glyphicon-off" aria-hidden="true"></span>
            </a>
          </div>
          <!-- /menu footer buttons -->
        </div>
      </div>

      <!-- top navigation -->
      <div class="top_nav">

        <div class="nav_menu">
          <nav class="" role="navigation">
            <div class="nav toggle">
              <a id="menu_toggle"><i class="fa fa-bars"></i></a>
            </div>

            <ul class="nav navbar-nav navbar-right">
              <li class="">
                <a href="javascript:;" class="user-profile dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                  <img src="images/img.jpg" alt="">John Doe
                  <span class=" fa fa-angle-down"></span>
                </a>
                <ul class="dropdown-menu dropdown-usermenu animated fadeInDown pull-right">
                  <li><a href="javascript:;">  Profile</a></li>
                  <li>
                    <a href="javascript:;">
                      <span class="badge bg-red pull-right">50%</span>
                      <span>Settings</span>
                    </a>
                  </li>
                  <li><a href="login.html"><i class="fa fa-sign-out pull-right"></i> Log Out</a>
                  </li>
                </ul>
              </li>

            </ul>
          </nav>
        </div>

      </div>
      <!-- /top navigation -->

      <!-- page content -->
      <div class="right_col" role="main">
        <div class="">
          <div class="page-title">
            <div class="title_left">
              <h3>Cuti Online Kecamatan Sukolilo</h3>
            </div>
          </div>
          <div class="clearfix"></div>

          <div class="row">

            <div class="col-md-12 col-sm-12 col-xs-12">

              <!-- MOD CONTENT -->
              <?php
  						if(empty($_GET['mod'])){ include'mod/mod_dashboard/default.php'; }
  						elseif($_GET['mod']=='persetujuan'){ include'mod/mod_persetujuan/default.php'; }
  						elseif($_GET['mod']=='pengajuan'){ include'mod/mod_pengajuan/default.php'; }
  						elseif($_GET['mod']=='jabatan'){ include'mod/mod_jabatan/default.php'; }
  						elseif($_GET['mod']=='golongan'){ include'mod/mod_golongan/default.php'; }
  						elseif($_GET['mod']=='instansi'){ include'mod/mod_instansi/default.php'; }
  						elseif($_GET['mod']=='jenis_cuti'){ include'mod/mod_jenis_cuti/default.php'; }
  						else { include'mod/mod_dashboard/default.php';}
  						?>
              <!-- END MOD CONTENT -->

              <!-- footer content -->
              <footer>
                <div class="copyright-info">
                  <p class="pull-right">Cuti Online Kecamatan Sukolilo</p>
                </div>
                <div class="clearfix"></div>
              </footer>
              <!-- /footer content -->

            </div>
            <!-- /page content -->
          </div>

        </div>

        <div id="custom_notifications" class="custom-notifications dsp_none">
          <ul class="list-unstyled notifications clearfix" data-tabbed_notifications="notif-group">
          </ul>
          <div class="clearfix"></div>
          <div id="notif-group" class="tabbed_notifications"></div>
        </div>

        <!-- Modal -->
        <div class="modal fade bs-example-modal-sm" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        	<div class="modal-dialog" role="document">
        		<div class="modal-content">
        			<div class="modal-header">
        				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        				<h3 class="modal-title" id="myModalLabel" style="text-align:center;">Hapus Jabatan</h3>
        			</div>
        			<div class="modal-body">
        				<h4 style="text-align:center;">Apakah anda yakin menghapus?</h4>
        			</div>
        			<div class="modal-footer">
        				<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        				<button type="button" class="btn btn-danger" style="margin-bottom:5px;">Delete</button>
        			</div>
        		</div>
        	</div>
        </div>

        <?php include_once "BottomResource.php"; ?>


</body>

</html>
<?php/*
}
*/
?>
