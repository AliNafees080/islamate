<div id="wrapper">
    <!--js hidden input type fields are used in js file to get values-->
    <input type="hidden" value="<?php echo base_url(); ?>" id="js_base_url"/>
    <input type="hidden" value="<?php echo $this->session->userdata("username"); ?>" id="js_user_name"/>
    <input type="hidden" value="dashboard/delete_comment" id="js_delete_comment"/>
    <input type="hidden" value="dashboard/insert_comment" id="js_insert_comment"/>

    <li class="in" style=" display: none;" id="comment_view">
        <img src="" class="avatar img-responsive" style=" border: solid #1b9d75 1px;" />
        <div class="message">
            <span class="chat-arrow"></span>
            <a class="chat-name"></a>&nbsp;
            <span class="chat-datetime">at July 06, 2014 17:06</span> 
            <i class="fa fa-times delete_comment_icon" data-target="#modal-delete-comment" data-toggle="modal" attr-index="" style="float: right; cursor: pointer;" title="Delete comment"></i>
            <span class="chat-body wrapword"></span>
        </div>
    </li> 

    <li id="comment_view_page" class="in hide" style="  padding: 10px 0 10px 0px; margin: 10px;" attr-id="">
        <img src="" class="avatar img-responsive" style=" border: solid #1b9d75 1px;" />
        <div class="message">
            <span class="chat-arrow"></span>
            <a class="chat-name"> comment </a>&nbsp;<span class="chat-datetime"> at time</span>
            <span class="chat-body wrapword" style=" width: 80%; word-wrap: break-word;"></span>
        </div>
    </li>

    <!--BEGIN PAGE WRAPPER-->
    <div id="page-wrapper">
        <!--BEGIN TITLE & BREADCRUMB PAGE-->
        <div id="title-breadcrumb-option-demo" class="page-title-breadcrumb">
            <div class="page-header pull-left">
                <div class="page-title"><i class="fa fa-home" style=" margin-top: 7px;"></i>&nbsp;&nbsp;Dashboard</div>
            </div>
            <div class="clearfix"></div>
        </div>
        <!--END TITLE & BREADCRUMB PAGE-->
        <!--BEGIN CONTENT-->
        <div class="page-content">
            <!--comment box-->
            <div id="modal-comments" class="modal fade" style="">
                <div class="modal-dialog" style=" z-index: 100;">
                    <div class="modal-content">                           
                        <div class="modal-header">
                            <button type="button" data-dismiss="modal" aria-hidden="true" class="close">&times;</button>
                            <h4 class="modal-title">Comments</h4>
                        </div>
                        <div class="modal-body">
                            <div class="chat-scroller" style=" max-height: 350px;">
                                <ul class="chats" id="comment_view_ul"></ul>
                            </div>
                        </div>
                        <div class="modal-footer" style=" border-top: none;">
                            <div class="chat-form">
                                <div class="input-group">
                                    <input id="input-chat2" maxlength="255" type="text" name="input-chat2" placeholder="Type a comment here..." class="form-control" />
                                    <span id="btn-chat" class="input-group-btn">
                                        <button type="submit" class="btn btn-grey" id="comment_submit_btn"><i class="fa fa-check"></i></button></span>
                                </div>
                            </div>
                        </div>                           
                    </div>
                </div>
            </div>
            <!--comment box-->
            <!--        Model to delete comment    -->
            <div id="modal-delete-comment" tabindex="-1" data-keyboard="false" class="modal fade" style=" z-index: 2000;">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-body">
                            <p>Would you like to delete selected content comment?</p>
                        </div>
                        <div class="modal-footer">
                            <button id="delete_comment_submit" type="button" data-dismiss="modal" class="btn btn-grey" value="">OK</button>
                            <button type="button" data-dismiss="modal" class="btn btn-default">Cancel</button>

                        </div>
                    </div>
                </div>
            </div>
            <!--            End model-->
            <!--        Model to show analytics content -->
            <div id="modal-image-content" tabindex="-1" data-keyboard="false" class="modal fade" style=" z-index: 2000;">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button class="close" aria-hidden="true" data-dismiss="modal" type="button">×</button>
                            <h4 id="modal-image-label" class="modal-title">Modal Responsive</h4>
                        </div>
                        <div class="modal-body">
                            <img id="modal-image-path" src="<?php echo base_url() . "assets/images/icons/loader1.GIF"; ?>" style=" width: 100%; height: 100%;"/>
                        </div>                        
                    </div>
                </div>
            </div>
            <!--            End model-->
            <!--        Model to show analytics content -->
            <div id="modal-audio-content" tabindex="-1" data-keyboard="false" class="modal fade" style=" z-index: 2000; text-align: center;">
                <div class="modal-dialog" style=" width: 333px;">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button class="close" aria-hidden="true" data-dismiss="modal" type="button">×</button>
                            <h4 id="modal-audio-label" class="modal-title">Modal Responsive</h4>
                        </div>
                        <div class="modal-body">
                            <audio controls id="audio_player">
                                <source id="modal-audio-path" src="" type="audio/mpeg">                               
                            </audio>
                        </div>                       
                    </div>
                </div>
            </div>
            <!--            End model-->
            <!--        Model to show analytics content -->
            <div id="modal-video-content" tabindex="-1" data-keyboard="false" class="modal fade" style=" z-index: 2000; text-align: center">
                <div class="modal-dialog" style=" width: 500px;">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button class="close" aria-hidden="true" data-dismiss="modal" type="button">×</button>
                            <h4 id="modal-video-label" class="modal-title">Modal Responsive</h4>
                        </div>
                        <div class="modal-body">                          
                            <video width="420" height="240" controls id="video_player" style=" width: 100%; height: 90%;">
                                <source id="modal-video-path" src="" type="video/mp4">
                            </video> 
                        </div>                        
                    </div>
                </div>
            </div>
            <!--            End model-->
            <div id="tab-general">
                <div id="sum_box" class="row mbl"></div>
                <div class="row mbl">
                    <!--  below code for bar chart-->
                    <div class="col-lg-8">
                        <div class="portlet box">
                            <div class="portlet-header">
                                <div class="caption">APP USAGE LAST MONTH</div>
                                <div class="tools"><i class="fa fa-chevron-up"></i>
                                </div>
                            </div>
                            <div class="portlet-body">
                                <div id="basic-bar-chart"></div>
                            </div>
                        </div>
                    </div>
                    <!--                    End bar chart code-->
                    <!--                    Below code for pie chart-->
                    <div class="col-lg-4">
                        <div class="portlet box">
                            <div class="portlet-header">
                                <div class="caption">USED STORAGE SPACE</div>
                                <div class="tools"><i class="fa fa-chevron-up"></i></div>
                            </div>
                            <div class="portlet-body">
                                <div id="piegraph"></div>
                            </div>
                        </div>
                    </div>
                    <!--                    End code for pie chart-->
                </div>
                <!--                Code for content list-->
                <div class="row mbl">
                    <div class="col-md-12">
                        <div class="portlet box">
                            <div class="portlet-header prolet-primary">
                                <div class="caption text-uppercase">
                                    <i style="font-size: 17px; margin-top: 2px; color:#ffffff;" class="fa fa-list-alt"></i>
                                    Latest Contents
                                </div>
                                <div class="tools"><i class="fa fa-chevron-up"></i></div>
                            </div>
                            <div style="overflow: hidden;" class="portlet-body">
                                <ul class="list-group">
                                    <?php foreach ($content as $value) { ?>
                                        <li class="list-group-item">
                                            <?php
                                            $extension = explode('.', $value['filepath']);
                                            $file = end($extension);
                                            ?>
                                            <div  class="icons" style="display:inline-block;">
                                                <div class="file-icon file-icon-sm view_lib" data-type="<?php echo $file; ?>"></div>
                                            </div>
                                            <span class="contents-name" style=" width: 50%; overflow: hidden; display: inline-block;">
                                            <?php echo $value['name'] ?>
                                            </span>
                                            <?php if ($value['type'] == "image") { ?>
                                                <i class="fa fa-eye view_image_icon" data-target="#modal-image-content" data-toggle="modal" attr-path="<?php echo base_url() . 'assets/upload/' . $value['filepath']; ?>" attr-name="<?php echo $value['name']; ?>" attr-index="" style="float: right; cursor: pointer;" title="View content"></i>
                                            <?php } else if ($value['type'] == "audio") { ?>
                                                <i class="fa fa-eye view_audio_icon" data-target="#modal-audio-content" data-toggle="modal" attr-path="<?php echo base_url() . 'assets/upload/' . $value['filepath']; ?>" attr-name="<?php echo $value['name']; ?>"attr-index="" style="float: right; cursor: pointer;" title="View content"></i>
                                            <?php } else if ($value['type'] == "video") { ?>
                                                <i class="fa fa-eye view_video_icon" data-target="#modal-video-content" data-toggle="modal" attr-path="<?php echo base_url() . 'assets/upload/' . $value['filepath']; ?>" attr-name="<?php echo $value['name']; ?>" attr-index="" style="float: right; cursor: pointer;" title="View content"></i>
                                            <?php } else { ?>
                                                <a href="<?php echo base_url() . 'assets/upload/' . $value['filepath']; ?>" target="_blank" ><i class="fa fa-eye" style="float: right; cursor: pointer;"></i></a>
    <?php } ?>
                                            <span class="contents-user pull-right wrapword" style=" width: 14%; overflow: hidden; height: 18px; text-overflow: ellipsis;"><?php
                                                if ($value['user_name'] != "")
                                                    echo $value['user_name'];
                                                else
                                                    echo "&nbsp;";
                                                ?></span>
                                            <span class="contents-date pull-right" style=" width: 18%; overflow: hidden;"><?php echo date('d F Y H:i:s', strtotime($value['last_update'])); ?></span>
                                        </li>                                    
<?php } ?>


                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <!--                End code for content list-->
                <div class="row mbl">
                    <!--                        Below view for content and comment section-->
                    <div class="col-lg-12">
                        <div class="portlet box prolet-primary">
                            <div class="portlet-header">
                                <div class="caption text-uppercase"> <i style="font-size: 17px; margin-top: 2px; color:#ffffff;" class="fa fa-comments"></i>Comments</div>
                                <div class="tools"><i class="fa fa-chevron-up"></i>
                                </div>
                            </div>
                            <div class="portlet-body " >
                                <div class="chat-scroller all_comment_list" style=" max-height: 500px;">
                                    <?php
                                    foreach ($contents as $key => $value) {
                                        $fil_name = explode('.', $value['name']);
                                        $last_element = end($fil_name);
                                        $file_name = strtoupper($last_element);
                                        $absolutePath = dirname($_SERVER['SCRIPT_FILENAME']) . "/";
                                        $thumbnail = base_url() . 'assets/file/' . $file_name . '.png';
                                        if (!file_exists($absolutePath . 'assets/file/' . $file_name . '.png'))
                                            $thumbnail = base_url() . 'assets/file/DEFAULT.png';
                                        if (sizeof($value['comments']) > 0) {
                                            ?>
                                            <ul class="chats" style=" border: solid #1b9d75 1px; padding: 0px; margin-bottom: 20px; background-color: #fff;" attr-id="<?php echo $key; ?>">
                                                <li style=" border-bottom: solid #1b9d75 1px; margin: 0px; height: 80px;" class="header_info">
                                                    <div  class="icons">
                                                        <div class="file-icon file-icon-lg view_lib" style="width: 70px; height: 70px; float: left; margin: 5px;" data-toggle="modal" data-target="#modal-items" data-type="<?php echo $last_element; ?>"></div>
                                                    </div>
                                                    <div class="message" style=" height: 100%; width: 100%;">
                                                        <span class="chat-body wrapword" style=" word-wrap: break-word; margin-left: 70px; color:#1b9d75;"><h4><?php echo $value['name']; ?></h4></span>
                                                        <span class="chat-body wrapword" style=" word-wrap: break-word;">
                                                            <a href="<?php echo base_url(); ?>content_briefcases/library"><i class="fa fa-eye"></i> View in library</a>
                                                            <span href="#modal-comments" data-toggle="modal" class="comment_view_icon" style=" margin-right: 20px; cursor: pointer; float: right;" title="Click to comment" attr-index="<?php echo $key; ?>" content_id="<?php echo $value['content_id']; ?>">
                                                                <i  class="fa fa-comments" ></i>&nbsp;&nbsp;Comments
                                                            </span>                                                            
                                                        </span>
                                                    </div>
                                                </li>                                                
                                                <?php
                                                $value['comments'] = array_reverse($value['comments']);
                                                foreach ($value['comments'] as $commentvalue) {
                                                    ?>                                                        
                                                    <li class="in" style="  padding: 10px 0 10px 0px; margin: 10px;" attr-id="<?php echo $commentvalue['notification_id']; ?>">
                                                        <img src="<?php echo base_url(); ?>assets/upload/<?php echo $commentvalue['user_img']; ?>" class="avatar img-responsive img-circle text-center mbl" style=" border: solid #1b9d75 1px;"/>
                                                        <div class="message">                                                            
                                                            <span class="chat-arrow"></span>
                                                            <a class="chat-name"><?php echo $commentvalue['user_name']; ?></a>&nbsp;<span class="chat-datetime">at <?php echo $commentvalue['activity_time']; ?></span>
                                                            <span class="chat-body wrapword" style=" width: 80%; word-wrap: break-word;"><?php
                                                                if ($commentvalue['type_value'] != "")
                                                                    echo $commentvalue['type_value'];
                                                                else
                                                                    echo "&nbsp;";
                                                                ?></span>
                                                        </div>
                                                    </li>

                                            <?php } ?>                                               
                                            </ul>
                                            <?php
                                        }
                                    }
                                    ?>
                                </div>
                                <br style="clear: both">
                            </div>
                        </div>
                    </div>
                    <!--                    End content and comment section    -->

                </div>

            </div>
        </div>
        <!--END CONTENT-->
    </div>
    <!--END PAGE WRAPPER-->
</div>

<script>
    var allcomments = <?php echo json_encode($contents) ?>;
    // console.log(allcomments); 
    $(document).ready(function () {
        //***************Create comment view*********************              

        $(document).on('click', '.view_image_icon', function () {
            $("#modal-image-path").attr("src", $(this).attr("attr-path"));
            $("#modal-image-label").text($(this).attr("attr-name"));
        });

        $(document).on('click', '.view_audio_icon', function () {
            $("#modal-audio-path").attr("src", $(this).attr("attr-path"));
            $("#modal-audio-label").text($(this).attr("attr-name"));
            var audio = $("#audio_player");
            audio[0].pause();
            audio[0].load();
            audio[0].play();
        });

        $(document).on('click', '.view_video_icon', function () {
            $("#modal-video-path").attr("src", $(this).attr("attr-path"));
            $("#modal-video-label").text($(this).attr("attr-name"));
            var video = $("#video_player");
            video[0].pause();
            video[0].load();
            video[0].play();
        });

        $('#modal-image-content').on('hidden.bs.modal', function (e) {
            set_timer_image();
        });

        function set_timer_image() {
            $("#modal-image-path").attr("src", "<?php echo base_url() . "assets/images/icons/loader1.GIF"; ?>");
            $("#modal-image-path:hidden").attr("src", "<?php echo base_url() . "assets/images/icons/loader1.GIF"; ?>");
        }


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
                },
                xAxis: {
                    categories: <?php echo json_encode($date_string); ?>,
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
                            '<td style="padding:0"><b>{point.y} time view</b></td></tr>',
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
                        data: <?php echo json_encode($barchart); ?>,
                    }]
            });

            $('#piegraph').highcharts({
                chart: {
                    plotBackgroundColor: null, // To change backgornd color of pie chart
                    plotBorderWidth: null,
                    plotShadow: false
                },
                credits: {
                    enabled: false
                },
                colors: ['#20b889', '#f2f2f2', '#1b9d75', '#70737a', "#393939"],
                title: {
                    text: ''
                },
                tooltip: {
                    pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'
                },
                plotOptions: {
                    pie: {
                        allowPointSelect: true,
                        cursor: 'pointer',
                        dataLabels: {
                            enabled: false
                        },
                        showInLegend: true
                    }
                },
                series: [{
                        type: 'pie',
                        name: ' share',
                        data: [
                            ['Documents', <?php echo (int) $piechart["application"]; ?>],
                            ['Photos', <?php echo (int) $piechart["image"] ?>],
                            ['Audio', <?php echo (int) $piechart["audio"] ?>],
                            ['Video', <?php echo (int) $piechart["video"] ?>],
                            ['URL', <?php echo (int)    $piechart["link"] ?>]
                        ]
                    }]
            });
        });
console.log(<?php echo json_encode($contents) ?>);
    });
</script>
<script src="<?php echo base_url(); ?>assets/js/Common/comments.js"></script>
