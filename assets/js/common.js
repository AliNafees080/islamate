$(function(){
    $.preloadCssImages();
    $("#wysiwyg").wysiwyg({
        css:"css/wysiwyg.css"
    });
    $(".nav li a").each(function(){
        $(this).click(function(){
            $(".nav li a").removeClass("selected");
            $(".popup").css("display","none");
            $(this).addClass("selected");
            var a=$(this).parent().find(".popup");
            if(a.length>0){
                var d=$(this).parent().offset();
                var b=$(this).parent().width();
                var c=d.left-80+(b/2)+1;
                a.css({
                    left:c+"px",
                    top:d.top+60+"px"
                    });
                a.show();
                return false
                }
            })
    });
$("#shortcut_item li a").tipsy({
    gravity:"w"
});
$(document).click(function(){
    $(".popup").css("display","none");
    $(".popup").parent().find("a").removeClass("selected")
    });
$("table.global tbody tr").mouseenter(function(){
    $(this).css("background","#ded7ca")
    });
$("table.global tbody tr").mouseleave(function(){
    $(this).css("background","#ffffff")
    });
$(window).resize(function(){
    $(".wysiwyg").css("width","100%")
    });
    
$("div.option").find("div.text").html($("div.option").find("select:selected").val());
    $("div.option").find("select:first").change(function(){
    $(this).parent().find("div.text").html($(this).val())
    });
    
$("div.file").find("input:first").change(function(){
    $(this).css("top","0px");
    var a=$(this).val().replace(/^.*\\/,"").substr(0,24);
    $(this).parent().find("div.text").html(a)
    });
$(".media_photos li").mouseenter(function(){
    $(this).find(".action").css("visibility","visible")
    });
$(".media_photos li").mouseleave(function(){
    $(this).find(".action").css("visibility","hidden")
    });
$(".datepicker").datepicker({
    nextText:"&raquo;",
    prevText:"&laquo;",
    showAnim:"slideDown"
});
$("#datepicker2").datepicker({
    nextText:"&raquo;",
    prevText:"&laquo;",
    showAnim:"slideDown"
});
$("div.date").find("input:first").change(function(){
    if(BrowserDetect.browser!="Explorer"){
        $(this).css("top","-21px")
        }else{
        if(BrowserDetect.version>7){
            $(this).css("top","-21px")
            }else{
            $(this).css("top","-10px")
            }
        }
    $(this).parent().find("div.text").html($(this).val())
    });
$(".alert_warning").click(function(){
    $(this).fadeOut("fast")
    });
$(".alert_info").click(function(){
    $(this).fadeOut("fast")
    });
$(".alert_success").click(function(){
    $(this).fadeOut("fast")
    });
$(".alert_error").click(function(){
    $(this).fadeOut("fast")
    });
$(".media_photos li a[rel=slide]").fancybox({
    padding:0,
    titlePosition:"outside",
    overlayColor:"#333333",
    overlayOpacity:0.2
})
});
$(document).ready(function(){
    $('input[title!=""]').hint();
    setTimeout(function(){
        $("#graph_data").visualize({
            type:"line",
            width:"760px",
            height:"240px",
            colors:["#26ADE4","#D1E751"]
            }).appendTo("#graph_wrapper");
        $(".visualize").trigger("visualizeRefresh")
        },500);
    $(".wysiwyg").css("width","100%")
    
    $('.form').submit(function(){
        var formid=($(this).attr('id'));
       
        var emptycounter=0;
        var numcounter=0;
        var alphanumeric = 0;
        $("#"+formid+" .required").each(function() {
               if( $.trim($(this).val())==''){
                    emptycounter++;
                    return false;
                }
                else{
                    if($(this).hasClass('numeric')){
                        if(isNaN($(this).val())){
                            numcounter++;
                            return false;
                        }
                    }
                    else  if($(this).hasClass('alphanumeric')){
                        var regex = new RegExp("^[a-zA-Z0-9]+$");
                        var str = $(this).val();
                        if (!(regex.test(str))) {
                            alphanumeric++
                            return false;                                                        
                        }
                    }
                }
        });
       
        if(emptycounter>0){
            alert("Please fill the required fields.")
            return false;
        }
        if(numcounter>0){
            alert("Please enter numeric value in the correct field.")
            return false;
        }
        if(alphanumeric>0){
            alert("Please enter alpha numeric value in the correct field.")
            return false;
        }
    })    
    
    
    $('.edituser').click(function(e){      
        $("html, body").animate({ scrollTop: 0 }, "slow");
        var divname=$(this).attr('rel');
        //alert(divname);
        $('#editwindow').hide();
        $('#edituserspaformid').hide();
        $(divname).slideDown();
        $('#importwindow').hide();
        $('#addwindow').hide();
        
        e.preventDefault();
         var value=decodeURIComponent($(this).attr("data-jsonvalue"));
         console.log(value);
         value = $.parseJSON(value);

        $.each(value, function(i, item) {
          $('#'+i).val(item);
          
          
          if(i=='dateMfg'){
              $('#'+i).closest('.date').find(".text").text(item);
          }
          else if($('#'+i).is('select')){
               $('#'+i).closest('.option').find(".text").text(item);
          }
   
});
    })
    
    $('.edituserdetail').click(function(e){
       
        $("html, body").animate({ scrollTop: 0 }, "slow");
        var divname=$(this).attr('rel');
        $('#editwindow').hide();
        $('#edituserspaformid').hide();
        $(divname).slideDown();
        $('#importwindow').hide();
        $('#addwindow').hide();
        
        e.preventDefault();
         var value=decodeURIComponent($(this).attr("data-jsonvalue"));
         console.log(value);
         value = $.parseJSON(value);

        $.each(value, function(i, item) {
          $('#'+i).val(item);
          
          if($('#'+i).is('select'))
          {
              if(item == 0)
                { 
                    item = "DISABLE";                     
                }
              else 
                {                 
                    item = "ENABLE";                  
                }
               $('#'+i).closest('.option').find(".text").text(item);
               if(item == "ENABLE")
                   $("#selectenable").attr("selected","selected");
               else
                   $("#selectdisable").attr("selected","selected");
          }
        });
    })
    });