<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <title>TrafficNet | Dashboard</title>
    <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
    <!-- Bootstrap 3.3.2 -->
    <link href="../bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />    
    <!-- FontAwesome 4.3.0 -->
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
    <!-- Ionicons 2.0.0 -->
    <link href="http://code.ionicframework.com/ionicons/2.0.0/css/ionicons.min.css" rel="stylesheet" type="text/css" />    
    <!-- Theme style -->
    <link href="../dist/css/AdminLTE.min.css" rel="stylesheet" type="text/css" />
    <!-- AdminLTE Skins. Choose a skin from the css/skins 
         folder instead of downloading all of them to reduce the load. -->
    <link href="../dist/css/skins/_all-skins.min.css" rel="stylesheet" type="text/css" />
    <!-- iCheck -->
    <link href="../plugins/iCheck/flat/blue.css" rel="stylesheet" type="text/css" />
    <!-- Morris chart -->
    <link href="../plugins/morris/morris.css" rel="stylesheet" type="text/css" />
    <!-- jvectormap -->
    <link href="../plugins/jvectormap/jquery-jvectormap-1.2.2.css" rel="stylesheet" type="text/css" />
    <!-- Date Picker -->
    <link href="../plugins/datepicker/datepicker3.css" rel="stylesheet" type="text/css" />
    <!-- Daterange picker -->
    <link href="../plugins/daterangepicker/daterangepicker-bs3.css" rel="stylesheet" type="text/css" />
    <!-- bootstrap wysihtml5 - text editor -->
    <link href="../plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css" rel="stylesheet" type="text/css" />

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
    <![endif]-->
    <?php
	//phpinfo();
    $conn = mysql_connect('localhost:3306',
      'root','umtri');
    if(!$conn){
      die('Could no connect:'.mysql_error());
    }
    mysql_select_db('das1');
    ?>
  </head>
  <body class="skin-blue">
    <div class="wrapper">
      
      <header class="main-header">
        <!-- Logo -->
        <a href="../index.html" class="logo"><b>Traffic</b>Net</a>
        <!-- Header Navbar: style can be found in header.less -->
        <nav class="navbar navbar-static-top" role="navigation">
          <!-- Sidebar toggle button-->
          <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
            <span class="sr-only">Toggle navigation</span>
          </a>
          <div class="navbar-custom-menu">
            <ul class="nav navbar-nav">

            </ul>
          </div>
        </nav>
      </header>
      <!-- Left side column. contains the logo and sidebar -->
      <aside class="main-sidebar">
        <!-- sidebar: style can be found in sidebar.less -->
        <section class="sidebar">
          <!-- Sidebar user panel -->
          <!-- search form -->
          <form action="#" method="get" class="sidebar-form">
            <div class="input-group">
              <input type="text" name="q" class="form-control" placeholder="Search..."/>
              <span class="input-group-btn">
                <button type='submit' name='search' id='search-btn' class="btn btn-flat"><i class="fa fa-search"></i></button>
              </span>
            </div>
          </form>
          <!-- /.search form -->
          <!-- sidebar menu: : style can be found in sidebar.less -->
          <ul class="sidebar-menu">
            <li class="header">MAIN NAVIGATION</li>
            <li class="active treeview">
              <a href="#">
                <i class="fa fa-dashboard"></i> <span>Dashboard</span> <i class="fa fa-angle-left pull-right"></i>
              </a>
            </li>
            <li class="treeview">
              <a href="#">
                <i class="fa fa-files-o"></i>
                <span>Scenario Store</span>
                <span class="label label-primary pull-right">8</span>
              </a>
              <ul class="treeview-menu">
                <li><a href="free_flow.php"><i class="fa fa-circle-o"></i> Free Flow</a></li>
                <li><a href="lane_departure.php"><i class="fa fa-circle-o"></i> Lane Departure</a></li>
                <li><a href="lane_change.php"><i class="fa fa-circle-o"></i> Lane Change</a></li>
                <li><a href="left_turn.php"><i class="fa fa-circle-o"></i> Left Turn</a></li>
                <li><a href="pedestrain_crossing.php"><i class="fa fa-circle-o"></i> Pedestrain Crossing</a></li>
                <li><a href="car_following.php"><i class="fa fa-circle-o"></i> Car Following</a></li>
                <li><a href="intersection.php"><i class="fa fa-circle-o"></i> Intersection</a></li>
                <li><a href="cyclist.php"><i class="fa fa-circle-o"></i> Cyclist</a></li>
              </ul>
            </li>
            <li>
              <a href="https://github.com/jyh0082007/TrafficNet">
                <i class="fa fa-th"></i> <span>Contribute</span> <small class="label pull-right bg-green">new</small>
              </a>
            </li>
          </ul>
        </section>
        <!-- /.sidebar -->
      </aside>

      <!-- Right side column. Contains the navbar and content of the page -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            Dashboard
            <small>Control panel</small>
          </h1>
          <ol class="breadcrumb">
            <li><a href="../index.html"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="#"><i class="fa fa-dashboard"></i> Scenario Store</a></li>
            <li class="active">Lane change</li>
          </ol>
        </section>

        <!-- Main content -->
        <section class="content">
          <div class="row">
            <div class="col-xs-12">
              <div class="box">
                <div class="box-header">
                <?php
                    $rs = mysql_query("SELECT count(*) FROM LaneChangeEventLeftSeq " );
                    $rows = mysql_fetch_array($rs);
                    $count = intval($rows[0]);
                ?>
                  <h3 class="box-title">Lane Change Left Sequence (shown 10 out of <b><?=$count?></b> entries)</h3>
                </div><!-- /.box-header -->
                <div class="box-body">
                  <table id="example2" class="table table-bordered table-hover">
                    <thead>
                      <tr>
                        <th>Device</th>
                        <th>Trip</th>
                        <th>StartTime</th>
                        <th>LeftWheelPassTime</th>
                        <th>RightWheelPassTime</th>
                      </tr>
                    </thead>
                    <tbody>
                    <?php
                    $rs = mysql_query("SELECT * FROM LaneChangeEventLeftSeq limit 10" );
                    $myrow = mysql_fetch_array($rs);
                    do{

                    ?>
                      <tr>
                        <td><?=$myrow["device"];?></td>
                        <td><?=$myrow["trip"];?></td>
                        <td><?=$myrow["startTime"];?></td>
                        <td><?=$myrow["leftWheelPassTime"];?></td>
                        <td><?=$myrow["rightWheelPassTime"];?></td>
                      </tr>
                    <?php
                  }
                  while($myrow = mysql_fetch_array($rs));
                    ?>
                    </tfoot>
                  </table>
                </div><!-- /.box-body -->
              </div><!-- /.box -->

          <div class="row">
            <div class="col-xs-12">
              <div class="box">
                <div class="box-header">
                <?php
                    $rs = mysql_query("SELECT count(*) FROM LaneChangeEventRightSeq " );
                    $rows = mysql_fetch_array($rs);
                    $count = intval($rows[0]);
                ?>
                  <h3 class="box-title">Lane Change Right Sequence (shown 10 out of <b><?=$count?></b> entries)</h3>
                </div><!-- /.box-header -->
                <div class="box-body">
                  <table id="example2" class="table table-bordered table-hover">
                    <thead>
                      <tr>
                        <th>Device</th>
                        <th>Trip</th>
                        <th>StartTime</th>
                        <th>LeftWheelPassTime</th>
                        <th>RightWheelPassTime</th>
                      </tr>
                    </thead>
                    <tbody>
                    <?php
                    $rs = mysql_query("SELECT * FROM LaneChangeEventRightSeq limit 10" );
                    $myrow = mysql_fetch_array($rs);
                    do{

                    ?>
                      <tr>
                        <td><?=$myrow["device"];?></td>
                        <td><?=$myrow["trip"];?></td>
                        <td><?=$myrow["startTime"];?></td>
                        <td><?=$myrow["leftWheelPassTime"];?></td>
                        <td><?=$myrow["rightWheelPassTime"];?></td>
                      </tr>
                    <?php
                  }
                  while($myrow = mysql_fetch_array($rs));
                    ?>
                    </tfoot>
                  </table>
                </div><!-- /.box-body -->
              </div><!-- /.box -->

        </section><!-- /.content -->
      </div><!-- /.content-wrapper -->
      <footer class="main-footer">
        <div class="pull-right hidden-xs">
          <b>Version</b> 1.0
        </div>
        <strong>Copyright &copy; 2016-2017 <a href="#">UMICH</a>.</strong> All rights reserved.
      </footer>
    </div><!-- ./wrapper -->

    <!-- jQuery 2.1.3 -->
    <script src="../plugins/jQuery/jQuery-2.1.3.min.js"></script>
    <!-- jQuery UI 1.11.2 -->
    <script src="http://code.jquery.com/ui/1.11.2/jquery-ui.min.js" type="text/javascript"></script>
    <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
    <script>
      $.widget.bridge('uibutton', $.ui.button);
    </script>
    <!-- Bootstrap 3.3.2 JS -->
    <script src="../bootstrap/js/bootstrap.min.js" type="text/javascript"></script>    
    <!-- Morris.js charts -->
    <script src="http://cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
    <script src="../plugins/morris/morris.min.js" type="text/javascript"></script>
    <!-- Sparkline -->
    <script src="../plugins/sparkline/jquery.sparkline.min.js" type="text/javascript"></script>
    <!-- jvectormap -->
    <script src="../plugins/jvectormap/jquery-jvectormap-1.2.2.min.js" type="text/javascript"></script>
    <script src="../plugins/jvectormap/jquery-jvectormap-world-mill-en.js" type="text/javascript"></script>
    <!-- jQuery Knob Chart -->
    <script src="../plugins/knob/jquery.knob.js" type="text/javascript"></script>
    <!-- daterangepicker -->
    <script src="../plugins/daterangepicker/daterangepicker.js" type="text/javascript"></script>
    <!-- datepicker -->
    <script src="../plugins/datepicker/bootstrap-datepicker.js" type="text/javascript"></script>
    <!-- Bootstrap WYSIHTML5 -->
    <script src="../plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js" type="text/javascript"></script>
    <!-- iCheck -->
    <script src="../plugins/iCheck/icheck.min.js" type="text/javascript"></script>
    <!-- Slimscroll -->
    <script src="../plugins/slimScroll/jquery.slimscroll.min.js" type="text/javascript"></script>
    <!-- FastClick -->
    <script src='../plugins/fastclick/fastclick.min.js'></script>
    <!-- AdminLTE App -->
    <script src="../dist/js/app.min.js" type="text/javascript"></script>

    <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
    <script src="../dist/js/pages/dashboard.js" type="text/javascript"></script>

    <!-- AdminLTE for demo purposes -->
    <script src="../dist/js/demo.js" type="text/javascript"></script>
  </body>
</html>
