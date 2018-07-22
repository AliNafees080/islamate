<div class="row col-md-9 pull-right">
    <div data-color="#ff3246" data-color-format="rgba" class="input-group colorpicker-component">
        <input type="text" name="statuscolor" id="statuscolor" readonly="true" value="#ff3246" class="form-control" />
        <span class="input-group-btn">
            <button type="button" class="btn">
                <i style="color:#ff3246" class="fa fa-flag"></i>
            </button>
        </span>
    </div>                                                    

</div>

<div class="row col-md-9 pull-right">
    <label class="send-to" rel="group-select">
        <input id="optionsRadios3" type="radio" name="optionsRadios" value="option3"  />&nbsp;in the following groups ...
    <div id="group-select" class=" hide-select col-md-9">
        <input type="hidden" value="red, blue" class="select2-tagging-support form-control" />
    </div>
        </label>
    <input class="send-to" type="radio" id="ossm" name="ossm"> 
<label for="ossm">CSS is Awesome</label>
</div>



<a class="btn btn-default btn-xs pull-right"  data-toggle="modal" href="#modal-colorpicker">&nbsp;Add Status +</a>

<div id="modal-colorpicker" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" data-dismiss="modal" aria-hidden="true" class="close">&times;</button>
                <h4 class="modal-title">Add Contact status</h4>
            </div>
            <div class="modal-body">
                <table class="table table-striped table-hover">
                    <tbody>
                        <tr>
                            <td>
                                <div class="form-group">
                                    <label for="statuscolor" class="col-md-3 control-label text-center">Color
                                    </label>
                                    <div class="col-md-9">
                                        <div data-color="#ff3246" data-color-format="rgba" class="input-group colorpicker-component">
                                            <input type="text" name="statuscolor" id="statuscolor" readonly="true" value="#ff3246" class="form-control" />
                                            <span class="input-group-btn">
                                                <button type="button" class="btn">
                                                    <i style="color:#ff3246" class="fa fa-flag"></i>
                                                </button>
                                            </span>
                                        </div>                                                    

                                    </div>
                                </div>
                            </td>
                        </tr>

                        <tr>
                            <td>
                                <div class="form-group">
                                    <label for="status_name" class="col-md-3 control-label text-center">Status Name
                                    </label>
                                    <div class="col-md-9">
                                        <input id="status_name" name="status_name" type="text" placeholder="Field name" class="form-control" />
                                    </div>
                                </div>
                            </td>
                        </tr>

                    </tbody>
                </table>                       
            </div>
            <div class="modal-footer">
                <button type="button" data-dismiss="modal" class="btn btn-primary">Cancel</button>
                <button type="button" data-dismiss="modal" class="btn btn-default addstatus">Create</button>
            </div>
        </div>
    </div>
</div>
<!--charts-->
<script src="<?php echo base_url(); ?>assets/vendors/jquery-highcharts/highcharts-more.js"></script>
<script src="<?php echo base_url(); ?>assets/vendors/jquery-highcharts/data.js"></script>
<script src="<?php echo base_url(); ?>assets/vendors/jquery-highcharts/drilldown.js"></script>
<script src="<?php echo base_url(); ?>assets/vendors/jquery-highcharts/exporting.js"></script>
<script src="<?php echo base_url(); ?>assets/js/charts-highchart-column-bar.js"></script>
<script src="<?php echo base_url(); ?>assets/js/charts-highchart-pie.js"></script>
<!--charts-->
<!--LOADING SCRIPTS FOR Animation-->
<script src="<?php echo base_url(); ?>assets/js/animation.js"></script>
<!--LOADING SCRIPTS FOR Table sorting-->
<script src="<?php echo base_url(); ?>assets/vendors/jquery-tablesorter/jquery.tablesorter.js"></script>
<script src="<?php echo base_url(); ?>assets/js/table-advanced.js"></script>
<!--LOADING SCRIPTS FOR icheck radio buttons-->
<script src="<?php echo base_url(); ?>assets/vendors/iCheck/icheck.min.js"></script>
<script src="<?php echo base_url(); ?>assets/vendors/iCheck/custom.min.js"></script>
<script src="<?php echo base_url(); ?>assets/js/ui-checkbox-radio.js"></script>
<!--LOADING SCRIPTS FOR datepicker default-->
<script src="<?php echo base_url(); ?>assets/vendors/bootstrap-datetimepicker/build/js/bootstrap-datetimepicker.min.js"></script>
<script src="<?php echo base_url(); ?>assets/vendors/bootstrap-timepicker/js/bootstrap-timepicker.js"></script>
<script src="<?php echo base_url(); ?>assets/vendors/bootstrap-clockface/js/clockface.js"></script>
<script src="<?php echo base_url(); ?>assets/vendors/bootstrap-colorpicker/js/bootstrap-colorpicker.js"></script>
<script src="<?php echo base_url(); ?>assets/vendors/bootstrap-switch/js/bootstrap-switch.min.js"></script>
<script src="<?php echo base_url(); ?>assets/vendors/jquery-maskedinput/jquery-maskedinput.js"></script>
<script src="<?php echo base_url(); ?>assets/vendors/charCount.js"></script>
<script src="<?php echo base_url(); ?>assets/js/form-components.js"></script>
<!--LOADING SCRIPTS FOR tag select box-->
<script src="<?php echo base_url(); ?>assets/vendors/select2/select2.min.js"></script>
<script src="<?php echo base_url(); ?>assets/vendors/bootstrap-select/bootstrap-select.min.js"></script>
<script src="<?php echo base_url(); ?>assets/vendors/multi-select/js/jquery.multi-select.js"></script>
<script src="<?php echo base_url(); ?>assets/js/ui-dropdown-select.js"></script>

<!--export table-->
<script src="<?php echo base_url(); ?>assets/vendors/tableExport/tableExport.js"></script>
<script src="<?php echo base_url(); ?>assets/vendors/tableExport/jquery.base64.js"></script>
<script src="<?php echo base_url(); ?>assets/vendors/tableExport/html2canvas.js"></script>
<script src="<?php echo base_url(); ?>assets/vendors/tableExport/jspdf/libs/sprintf.js"></script>
<script src="<?php echo base_url(); ?>assets/vendors/tableExport/jspdf/jspdf.js"></script>
<script src="<?php echo base_url(); ?>assets/vendors/tableExport/jspdf/libs/base64.js"></script>
<!--channel gallery-->
<script src="<?php echo base_url(); ?>assets/vendors/mixitup/src/jquery.mixitup.js"></script>
<script src="<?php echo base_url(); ?>assets/vendors/lightbox/js/lightbox.min.js"></script>
<script src="<?php echo base_url(); ?>assets/js/page-gallery.js"></script>
<!--LOADING SCRIPTS FOR dashboard-->
<script src="<?php echo base_url(); ?>assets/vendors/intro.js/intro.js"></script>
<script src="<?php echo base_url(); ?>assets/vendors/flot-chart/jquery.flot.js"></script>
<script src="<?php echo base_url(); ?>assets/vendors/flot-chart/jquery.flot.categories.js"></script>
<script src="<?php echo base_url(); ?>assets/vendors/flot-chart/jquery.flot.pie.js"></script>
<script src="<?php echo base_url(); ?>assets/vendors/flot-chart/jquery.flot.tooltip.js"></script>
<script src="<?php echo base_url(); ?>assets/vendors/flot-chart/jquery.flot.resize.js"></script>
<script src="<?php echo base_url(); ?>assets/vendors/flot-chart/jquery.flot.fillbetween.js"></script>
<script src="<?php echo base_url(); ?>assets/vendors/flot-chart/jquery.flot.stack.js"></script>
<script src="<?php echo base_url(); ?>assets/vendors/flot-chart/jquery.flot.spline.js"></script>
<script src="<?php echo base_url(); ?>assets/vendors/calendar/zabuto_calendar.min.js"></script>
<script src="<?php echo base_url(); ?>assets/vendors/sco.message/sco.message.js"></script>
<script src="<?php echo base_url(); ?>assets/vendors/intro.js/intro.js"></script>
<script src="<?php echo base_url(); ?>assets/js/index.js"></script>
