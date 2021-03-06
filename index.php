<!DOCTYPE html>
<html lang="en">

<head>
  <title>Site Outage Excel Exporter</title>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="icon" type="image/png" href="images/icons/favicon.ico" />
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="vendor/datatables/dataTables.bootstrap4.css" rel="stylesheet">
  <link href="css/sb-admin.css" rel="stylesheet">

</head>

<body id="page-top">

  <nav class="navbar navbar-expand navbar-dark bg-dark static-top">

    <a class="navbar-brand mr-1" href="index.php">Welcome</a>

    <button class="btn btn-link btn-sm text-white order-1 order-sm-0" id="sidebarToggle" href="#">
      <i class="fas fa-bars"></i>
    </button>


    <!-- Navbar -->
    <ul class="navbar-nav ml-auto ml-md-0">

      <li class="nav-item dropdown no-arrow">
        <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          <i class="fas fa-user-circle fa-fw"></i>
        </a>
      </li>
    </ul>

  </nav>

  <div id="wrapper">
    <!-- Sidebar -->
    <ul class="sidebar navbar-nav">
      <li class="nav-item active">
        <a class="nav-link" href="index.php">
          <i class="fas fa-fw fa-table"></i>
          <span>Excel Exporter</span></a>
        </a>
      </li>
    </ul>

    <div id="content-wrapper">

      <div class="container-fluid">

        <!-- Breadcrumbs-->
        <ol class="breadcrumb">
          <li class="breadcrumb-item">
            <a href="dashboard.php">Dashboard</a>
          </li>
          <li class="breadcrumb-item active">Overview</li>
        </ol>

        <!-- Export  -->
        <div class="card col-xl-12 col-sm-12 mb-3">
          <div class="card-header">
            <i class="fas fa-table"></i>
            Date Range Excel Exporter</div>
          <div class="card-body">
            <form method="post" action="export.php">
              <div class="form-group row">
                <label class="col-sm-2 col-form-label" style="margin-right: -94px;">Date Range:</label>
                <div class="col-sm-3">
                  <input class="form-control" type="date" name="date1" maxlength="10" required>
                </div>
                <label class="col-sm-0 col-form-label"> to </label>
                <div class="col-sm-3">
                  <input class="form-control" type="date" name="date2" maxlength="10" required>
                </div>
                <div class="col-sm-2">
                  <input class="btn btn-success" type=submit value="Export" name="export">
                </div>
              </div>
            </form>
          </div>
        </div>

        <!-- Export  -->
        <div class="card col-xl-12 col-sm-12 mb-3">
          <div class="card-header">
            <i class="fas fa-table"></i>
            Full Site Outage Excel Exporter (Unclear Sites)</div>
          <div class="card-body">
            <form method="post" action="export_all_clear.php">
              <div class="form-row">
                <label class="col-sm-2 col-form-label">Export Full File Type:</label>
                <div class="col-sm-2">
                  <input class="btn btn-success" type="submit" name="export1" value="Export">
                </div>
              </div>
            </form>
          </div>
        </div>

        <!-- Export  -->
        <div class="card col-xl-12 col-sm-12 mb-3">
          <div class="card-header">
            <i class="fas fa-table"></i>
            Full Site Outage Excel Exporter (All Records)</div>
          <div class="card-body">
            <form method="post" action="export_all.php">
              <div class="form-row">
                <label class="col-sm-2 col-form-label">Export Full File Type:</label>
                <div class="col-sm-2">
                  <input class="btn btn-success" type="submit" name="export2" value="Export">
                </div>
              </div>
            </form>
          </div>
        </div>

        <!-- DataTables  -->
        <div class="card col-xl-12 col-sm-12 mb-3">
          <div class="card-header">
            <i class="fas fa-table"></i>
            Site Outage Table</div>
          <div class="card-body">
            <div class="table-responsive">
              <?php

              require_once('connect.php');

              $date = date('Y-m-d');
              $qry = "SELECT * FROM `downsites_2019_10_01` WHERE `user_clear_date` IS NULL";
              // idDownSites`, `wender`, `type`, `date`, `site_name`, `region`, `subregion`, `mainregion`, 
              // `fault_occurred_time`, `fault_report_time`, `reported_by`, `reported_to`, `fault_clr_by`, 
              // `fault_clr_time`, `category`, `sub_category`, `reason_for_fault`, `updated_by`, `tm_report_by`,
              //  `tr_comment`, `tr_comment_by`, `reg_cmt_usr`, `reg_comment`, `status`, `corrective_action`, 
              //  `attend_person`, `attend`, `comment`, `location_infor`, `user_clear_date`
              echo '<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
              <thead>   
              <tr> 
              <th>ID Down Sites</th> 
              <th>Wender</th> 
              <th>Type </th> 
              <th>Date </th> 
              <th>Site name</th> 
              <th>Region</th>  
              <th>Sub Region</th>
              <th>Fault Occurred Time</th>
              <th>Fault Report Time</th>
              <th>Reported By</th>    
              <th>Reported To</th>  
              <th>Fault_clr_By</th>      
              <th>Fault_clr_Time</th>  
              <th>Category</th>
              <th>Sub Category</th>
              <th>Reason for Fault</th>  
              </tr>
              </thead>
                  <tfoot> 
                  <tr> 
                  <th>ID Down Sites</th> 
                  <th>Wender</th> 
                  <th>Type </th> 
                  <th>Date </th> 
                  <th>Site name</th> 
                  <th>Region</th> 
                  <th>Sub Region</th>
                  <th>Fault Occurred Time</th>
                  <th>Fault Report Time</th>
                  <th>Reported By</th>    
                  <th>Reported To</th>  
                  <th>Fault clr By</th>      
                  <th>Fault clr Time</th>  
                  <th>Category</th>
                  <th>Sub Category</th>
                  <th>Reason for Fault</th>  
                  </tr>
                  </tfoot>';

              if ($res = $con->query($qry)) {
                while ($row = $res->fetch_assoc()) {
                  // idDownSites`, `wender`, `type`, `date`, `site_name`, `region`, `subregion`, `mainregion`, 
                  // `fault_occurred_time`, `fault_report_time`, `reported_by`, `reported_to`, `fault_clr_by`, 
                  // `fault_clr_time`, `category`, `sub_category`, `reason_for_fault`, 
                  $field1name = $row["idDownSites"];
                  $field2name = $row["wender"];
                  $field3name = $row["type"];
                  $field4name = $row["date"];
                  $field5name = $row["site_name"];
                  $field6name = $row["region"];
                  $field7name = $row["subregion"];
                  $field9name = $row["fault_occurred_time"];
                  $field10name = $row["fault_report_time"];
                  $field11name = $row["reported_by"];
                  $field12name = $row["reported_to"];
                  $field13name = $row["fault_clr_by"];
                  $field14name = $row["fault_clr_time"];
                  $field15name = $row["category"];
                  $field16name = $row["sub_category"];
                  $field17name = $row["reason_for_fault"];

                  echo "<tr>
                                <td>" . $field1name . "</td> 
                                <td>" . $field2name . "</td> 
                                <td>" . $field3name . "</td> 
                                <td>" . $field4name . "</td> 
                                <td>" . $field5name . "</td> 
                                <td>" . $field6name . "</td>
                                <td>" . $field7name . "</td>  
                                <td>" . $field9name . "</td> 
                                <td>" . $field10name . "</td> 
                                <td>" . $field11name . "</td> 
                                <td>" . $field12name . "</td>
                                <td>" . $field13name . "</td> 
                                <td>" . $field14name . "</td> 
                                <td>" . $field15name . "</td> 
                                <td>" . $field16name . "</td>
                                <td>" . $field17name . "</td> 
                                </tr>";
                }

                $res->free();
              }
              ?></table>

            </div>
          </div>
        </div>

      </div>
      <!-- /.container-fluid -->

      <!-- Sticky Footer -->
      <footer class="sticky-footer">
        <div class="container my-auto">
          <div class="copyright text-center my-auto">
            <span>Copyright © Mobitel 2019 (Developed by Uva Wellassa University)</span>
          </div>
        </div>
      </footer>

    </div>
    <!-- /.content-wrapper -->

  </div>
  <!-- /#wrapper -->

  <!-- Scroll to Top Button-->
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>

  <!-- Logout Modal-->
  <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
        <div class="modal-footer">
          <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
          <a class="btn btn-primary" href="login.php">Logout</a>
        </div>
      </div>
    </div>
  </div>

  <!-- Bootstrap core JavaScript-->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Page level plugin JavaScript-->
  <script src="vendor/datatables/jquery.dataTables.js"></script>
  <script src="vendor/datatables/dataTables.bootstrap4.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="js/sb-admin.min.js"></script>

  <!-- Demo scripts for this page-->
  <script src="js/demo/datatables-demo.js"></script>

</body>

</html>