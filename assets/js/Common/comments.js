        //***************Create comment view*********************              
            $(document).on('click','.comment_view_icon',function(){
               var id = $(this).attr("attr-index"); 
               var content_id = $(this).attr("content_id"); 
               $("#comment_submit_btn").attr("content_id",content_id);
               $("#comment_submit_btn").attr("content_index",id);
               var comment_list = {};
               comment_list = allcomments[id]['comments'];
               $("#comment_view_ul").empty();
               $.each(comment_list, function(key,value){
                   var user_image = $("#js_base_url").val()+'assets/upload/'+value['user_img'];
                   create_comment_view(value['type_value'],value['notification_id'],value['user_name'],value['activity_time'],user_image);
               });
            });
            
            
            
            function create_comment_view(comment,index,name,time,user_image){               
                $("#comment_view_ul").prepend($("#comment_view").clone());
                $("#comment_view_ul li:first").attr("attr-index",index);
                $("#comment_view_ul li:first").find("img").attr("src",user_image);
                $("#comment_view_ul li:first").removeAttr("id");
                $("#comment_view_ul li:first").removeAttr("style"); 
                $("#comment_view_ul li:first").find(".chat-body").text(comment); 
                $("#comment_view_ul li:first").find(".chat-name").text(name); 
                $("#comment_view_ul li:first").find(".chat-datetime").text(time);
                $("#comment_view_ul li:first").find(".delete_comment_icon").attr('attr-index',index);  
            }     
            document.getElementById("input-chat2").addEventListener( "keydown", function( e ) {
               var keyCode = e.keyCode || e.which;
               if ( keyCode === 13 ) {
                   if($("#input-chat2").val().trim() != ''){
                       save_comment();
                   }
               }
            }, false);
           
            $(document).on('click','#comment_submit_btn',function(){
                if($("#input-chat2").val().trim() != '')
                    save_comment();   
                
            }); 
        
        function create_comment_view_page(comment,index,name,time,userimage){ // This function is used to create dynamically view for listof comments in page section.
            var content_id = $("#comment_submit_btn").attr("content_index");   
            $(".all_comment_list").find("ul").each(function(){
                if($(this).attr("attr-id") == content_id){
                    $($("#comment_view_page").clone()).insertAfter($(this).find(".header_info"));
                    $(this).find(".header_info").next().attr("attr-id",index);
                    $(this).find(".header_info").next().removeAttr("id");
                    $(this).find(".header_info").next().removeClass("hide"); 
                    $(this).find(".header_info").next().find(".chat-body").text(comment); 
                    $(this).find(".header_info").next().find(".chat-name").text(name); 
                    $(this).find(".header_info").next().find(".chat-datetime").text(time);
                    $(this).find(".header_info").next().find(".delete_comment_icon").attr('attr-index',index);               
                    $(this).find(".header_info").next().find(".img-responsive").attr('attr-index',index);               
                    $(this).find(".header_info").next().find(".img-responsive").attr('src',userimage);               
                }
            });
        }
        
       
        
        function save_comment(){
            var alldata = {};
            var content_id = $("#comment_submit_btn").attr("content_id");
            var attr_index = $("#comment_submit_btn").attr("content_index");
            alldata['content_id'] = content_id;
            alldata['type'] = "comment";
            alldata['type_value'] = $("#input-chat2").val();
            var date = new Date();
            $("#input-chat2").val("");
            var response = $.fn.ajax_form_submit(
            alldata,
            $("#js_base_url").val()+$("#js_insert_comment").val(),'false');
            response = $.parseJSON(response);     
            allcomments[attr_index]['comments'] = response['content']['comments']
            var username= $("#js_user_name").val();
            create_comment_view(alldata['type_value'],response['current_inserted_id'],username,response['activity_time'],response['user_image']);                
            create_comment_view_page(alldata['type_value'],response['current_inserted_id'],username,response['activity_time'],response['user_image']);  
             $(this).notification('Comment created successfully','Analytics');
        }           
        
        $(document).on('click','.delete_comment_icon',function(){
            $("#delete_comment_submit").attr("attr-index",$(this).attr("attr-index"));
        });
            
        $(document).on('click','#delete_comment_submit',function(){
            var deleteid = {};
            var id = $(this).attr('attr-index');
            deleteid["notification_id"] = id;
            
            //Delete view from popup comment list
            $("#comment_view_ul").find("li").each(function(){
                if($(this).attr("attr-index") == id)
                    $(this).remove();
            });
            
            //Delete view from comment list of page
            $(".all_comment_list").find("li").each(function(){
                if($(this).attr("attr-id") == id)
                    $(this).remove();
            });
            
            var response = $.fn.ajax_form_submit(
            deleteid,
            $("#js_base_url").val()+$("#js_delete_comment").val(),'false');
            response = $.parseJSON(response);     
            allcomments = response['contents'];  
             $(this).notification('Comment deleted successfully','Analytics'); 
        });
