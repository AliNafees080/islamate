<?php 

//die("kk");

?>
<div id="wrapper">

    <!--BEGIN PAGE WRAPPER-->
    <div id="page-wrapper">
        <!--BEGIN TITLE & BREADCRUMB PAGE-->
        <div id="title-breadcrumb-option-demo" class="page-title-breadcrumb">
            <div class="page-header pull-left">
                <div class="page-title">Reports</div>
            </div>
            <ol class="breadcrumb page-breadcrumb pull-left">
                <li><i class="fa fa-home"></i>&nbsp;<a href="#">Home</a>&nbsp;&nbsp;<i class="fa fa-angle-right"></i>&nbsp;&nbsp;</li>
                <li class="hidden"><a href="#">Reports</a>&nbsp;&nbsp;<i class="fa fa-angle-right"></i>&nbsp;&nbsp;</li>
                <li class="active">Reports</li>

                <div class="clearfix"></div>
        </div>
        <!--END TITLE & BREADCRUMB PAGE-->
        <!--BEGIN CONTENT-->
        <div class="page-content">
            <div id="tab-general">
                <div id="sum_box" class="row mbl">

                </div>
                <!--date range picker-->
                <div class="row mbl">
                    <div class="form-group">
                        <label class="col-md-3 control-label" style="font-size: 18px">Select Dates</label>
                        <div class="col-md-6">
                            <div class="btn btn-grey" id="report_range">
                                <i class="fa fa-calendar"></i>&nbsp;<span></span>&nbsp;report&nbsp;<i class="fa fa-angle-down"></i>
                                <input type="hidden" name="datestart" />
                                <input type="hidden" name="endstart" />
                            </div>
                        </div>
                    </div>
                </div>
                <!--date range picker-->
                <!-- graph-->
                <div class="row mbl">
                    <div class="col-lg-12">
                    <div class="portlet box">
                                <div class="portlet-header">
                                    <div class="caption">Basic column</div>
                                    <div class="tools"><i class="fa fa-chevron-up"></i><i class="fa fa-refresh"></i><i class="fa fa-times"></i>
                                    </div>
                                </div>
                                <div class="portlet-body">
                                    <div id="basic-bar-chart">                                        
                                    </div>
                                </div>
                            </div>
                    </div>
                </div>
                <!--graph-->
                <!--active user and channels table-->
                <div class="row mbl">
                    <!--active user table-->
                    <div class="col-lg-6">
                            <div class="panel panel-grey">
                                <div class="panel-heading">Most Active Users
                                     <div class="btn-group pull-right">
                                            <a href="#" data-toggle="dropdown" class="btn btn-default btn-sm dropdown-toggle"><i class="fa fa-wrench"></i>&nbsp;Export</a>
                                            <ul class="dropdown-menu">

                                                <li>
                                                    <a href="#" onclick="$('#example-export').tableExport({type:'csv'});">
                                                        <img src="<?php echo base_url(); ?>assets/vendors/tableExport/icon/csv.png" width="24px" class="mrx" />Export to csv</a>
                                                </li>

                                                <li>
                                                    <a href="#" onclick="$('#example-export').tableExport({type:'excel',escape:'false'});">
                                                        <img src="<?php echo base_url(); ?>assets/vendors/tableExport/icon/xls.png" width="24px" class="mrx" />Export to Excel</a>
                                                </li>

                                            </ul>
                                        </div>
                                </div>
                                <div class="panel-body">
                                    <table class="table table-hover">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Username</th>
                                                <th>Usage</th>
                                                <th>Viewing</th>
                                                 <th>Sharing</th>
                                                  <th>Activity</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>1</td>
                                                <td>Henry</td>
                                                <td>23</td>
                                                <td>2</td>
                                                <td>2</td>
                                                <td><button type="button" class="btn btn-grey btn-xs"><i class="fa fa-list"></i>
                                                </button></td>
                                            </tr>
                                            <tr>
                                                <td>2</td>
                                                <td>John</td>
                                                <td>45</td>
                                                <td>2</td>
                                                <td>2</td>
                                                <td><button type="button" class="btn btn-grey btn-xs"><i class="fa fa-list"></i>
                                                    </button></td>
                                            </tr>
                                            <tr>
                                                <td>3</td>
                                                <td>Larry</td>
                                                <td>30</td>
                                                <td>2</td>
                                                <td>2</td>
                                                <td><button type="button" class="btn btn-grey btn-xs"><i class="fa fa-list"></i>
                                                    </button></td>
                                            </tr>
                                            <tr>
                                                <td>4</td>
                                                <td>Lahm</td>
                                                <td>15</td>
                                                <td>2</td>
                                                <td>2</td>
                                                <td><button type="button" class="btn btn-grey btn-xs"><i class="fa fa-list"></i>
                                                    </button></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                    </div>
                    <!--active user table-->
                    <!--most used channels-->
                     <div class="col-lg-6">
                         <div class="panel panel-grey">
                             <div class="panel-heading">Most Used Channels
                             <div class="btn-group pull-right">
                                            <a href="#" data-toggle="dropdown" class="btn btn-default btn-sm dropdown-toggle"><i class="fa fa-wrench"></i>&nbsp;Export</a>
                                            <ul class="dropdown-menu">
                                               
                                                <li>
                                                    <a href="#" onclick="$('#example-export').tableExport({type:'csv'});">
                                                        <img src="<?php echo base_url(); ?>assets/vendors/tableExport/icon/csv.png" width="24px" class="mrx" />Export to csv</a>
                                                </li>

                                                <li>
                                                    <a href="#" onclick="$('#example-export').tableExport({type:'excel',escape:'false'});">
                                                        <img src="<?php echo base_url(); ?>assets/vendors/tableExport/icon/xls.png" width="24px" class="mrx" />Export to Excel</a>
                                                </li>
                                            </ul>
                                        </div>
                             </div>
                             <div class="panel-body">
                                 <table class="table table-hover">
                                     <thead>
                                         <tr>
                                             <th>#</th>
                                             <th>Name</th>
                                             <th>Time Used</th>
                                             <th>Unique users</th>
                                         </tr>
                                     </thead>
                                     <tbody>
                                         <tr>
                                             <td>1</td>
                                             <td>Henry</td>
                                             <td>23</td>
                                             <td>2</td>
                                         </tr>
                                         <tr>
                                             <td>2</td>
                                             <td>John</td>
                                             <td>45</td>
                                             <td>2</td>
                                         </tr>
                                         <tr>
                                             <td>3</td>
                                             <td>Larry</td>
                                             <td>30</td>
                                             <td>2</td>
                                         </tr>
                                         <tr>
                                             <td>4</td>
                                             <td>Lahm</td>
                                             <td>15</td>
                                             <td>2</td>
                                         </tr>
                                     </tbody>
                                 </table>
                             </div>
                         </div>
                        
                        </div>
                    <!--most used channels-->
                </div>
                <!--active user and channels table-->
                <?php //echo'<pre>'; print_r($assets); echo'</pre>'; ?>
                <!--Most popular assets table-->
                <div class="row">
                    <div class="col-lg-12">
                       <div class="panel panel-grey">
                                <div class="panel-heading">Most Popular assets
                                 <div class="btn-group pull-right">
                                            <a href="#" data-toggle="dropdown" class="btn btn-default btn-sm dropdown-toggle"><i class="fa fa-wrench"></i>&nbsp;Export</a>
                                            <ul class="dropdown-menu">
                                                
                                                <li>
                                                    <a href="#" onclick="$('#example-export').tableExport({type:'csv'});">
                                                        <img src="<?php echo base_url(); ?>assets/vendors/tableExport/icon/csv.png" width="24px" class="mrx" />Export to csv</a>
                                                </li>

                                                <li>
                                                    <a href="#" onclick="$('#example-export').tableExport({type:'excel',escape:'false'});">
                                                        <img src="<?php echo base_url(); ?>assets/vendors/tableExport/icon/xls.png" width="24px" class="mrx" />Export to Excel</a>
                                                </li>
                                            </ul>
                                        </div>
                                </div>
                                <div class="panel-body">
                                    <table class="table table-hover">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Content name</th>
                                                <th>Views</th>
                                                <th>Times shared</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php foreach($assets as $key => $assets) { ?>
                                            <tr>
                                                <td><?php echo $key + 1; ?></td>
                                                <td><?php echo $assets['filename']; ?></td>
                                                <td><?php echo $assets['views']; ?></td>
                                                <td>0</td>
                                                <td>
                                                <a class="btn btn-grey btn-xs" href="<?php echo base_url(); ?>assets/upload/<?php echo $assets['filename']; ?>"><i class="fa fa-eye"></i>
                                                </a>
                                                <a type="button" class="btn btn-grey btn-xs" href="<?php echo base_url(); ?>assets/upload/<?php echo $assets['filename']; ?>"><i class="fa fa-list"></i>
                                                </a>
                                                </td>
                                            </tr>
                                            <?php } ?>
                                          
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                    </div>
                </div>
                <!--Most popular assets table-->
                <div class="row mbl">

                    <div class="col-md-12">

                    </div>
                </div>
                <div class="row mbl">



                </div>

            </div>
        </div>
        <!--END CONTENT-->
    </div>
    <!--END PAGE WRAPPER-->
</div>
<script>    
    $(document).ready(function(){  
        
        $('#report_range').daterangepicker(
        {
            ranges: {
                'Today': [moment(), moment()],
                'Last 7 Days': [moment().subtract('days', 6), moment()],
                'Last 30 Days': [moment().subtract('days', 29), moment()],
                'This Month': [moment().startOf('month'), moment().endOf('month')],
                'Last Month': [moment().subtract('month', 1).startOf('month'), moment().subtract('month', 1).endOf('month')]
            },
            startDate: moment().subtract('days', 29),
            endDate: moment(),
            opens: 'left'
        },
        function(start, end) {
            $('#report_range span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'));
            $('input[name="datestart"]').val(start.format("YYYY-MM-DD"));
            $('input[name="endstart"]').val(end.format("YYYY-MM-DD"));
           // console.log(start.format('D MM YYYY') + ' - ' + end.format('D MMMM YYYY'));
            
        }
    );
    $('#report_range span').html(moment().subtract('days', 29).format('MMMM D, YYYY') + ' - ' + moment().format('MMMM D, YYYY'));
        
    $(function () {
        /* Basic column */
    $('#basic-bar-chart').highcharts({
        chart: {
            type: 'column'
        },
        credits: {
            enabled: false
        },
        colors: ['#20b889'],
        title: {
            text: ''
        },
        subtitle: {
            text: ''
        },//categories: ['Jan','','','','','','','Jul','','','','','','','Feb','','','','','','','Aug','','','','','','','Feb','','','','','','','Sep','','',''],
        xAxis: {
            categories: [<?php echo $date_string; ?>],           
            type: 'category',
            labels: {
                rotation: -60,
                style: {
                    fontSize: '11px',
                    fontFamily: 'Verdana, sans-serif'
                }
            }
        },        
        yAxis: {
            min: 0,
            title: {
                text: ''
            }
        },
        tooltip: {
            headerFormat: '<span style="font-size:10px">{point.key}</span><table>',
            pointFormat: '<tr><td style="color:{series.color};padding:0">{series.name}: </td>' +
                '<td style="padding:0"><b>{point.y:.1f} mm</b></td></tr>',
            footerFormat: '</table>',
            shared: true,
            useHTML: true
        },
        plotOptions: {
            column: {
                pointPadding: 0.2,
                borderWidth: 0
            }
        },
        series: [{
            name: 'Web Application',
            data: [<?php echo $barchart; ?>]

        }]
    });
    });
});
    </script>