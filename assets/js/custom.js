
$(document).ready(function(){
    //**********form slidedown************
    $('.form_button').click(function(){
        $("."+$(this).attr('rel')).removeClass('hide');
        $("."+$(this).attr('rel')).slideDown('slow');
        $('html, body').animate({
            scrollTop: $("."+$(this).attr('rel')).offset().top -20
        }, 1000);
    })
    //*************form slideup*****************
    $('.close_form').click(function(e){
        e.preventDefault();
        $("."+$(this).attr('rel')).slideUp('slow');
        $("."+$(this).attr('rel')).addClass('hide');
        $('html, body').animate({ 
            scrollTop: $($(this).attr('data-focus') ).offset().top
        }, 1000);
    })
    //************add group, filter and album***************
    $('.add_menu').click(function(){
        $("."+$(this).attr('rel')).slideUp('slow');
        $('#'+$(this).data('menu-title')).text($('#'+$(this).data('title-name')).val());
        $('#'+$(this).data('ul-id')+' li:first').clone().appendTo('#'+$(this).data('ul-id')).removeClass('hide');
    })
    //*************manage tags****************
    $('.manage_tag').click(function(){
        $('#showtag').removeClass('hide');
        
    })
    //******form edit field functions start************************************
    $.fn.fillEditForm = function (rowJson) {   
        $(this).clear_form_elements();
        var obj = $(this).parse_json_custom(rowJson); 
        $.each(obj, function(key, value){  console.log(key+'-----------custom.js-----------'+value);
             window.console.log(
                   'There is an input without a value!', 
                   this);

               $(this).val($(this).attr('placeholder'));
            var fieldName = $("[name='"+key+"']");
            switch(fieldName.prop("type"))  
            {   
                case "radio" : case "checkbox":
                    fieldName.each(function(){
                        fieldName.val(value);
                        if($(this).attr('value') == 1) {
                            $(this).parent().addClass('checked');
                        } else {
                            $(this).parent().removeClass('checked');
                        } 
                    });   
                    break;  
                case "select-one" ://console.log(key+'---'+value);
                    fieldName.find('option[value="'+value+'"]').prop('selected', true);//console.log(key+'----select---'+value);
                    break;
                case "select-multiple" :
                    var arr = new Array;
                    if(value == null){
                        arr = {};
                    }
                    else {
                     arr = value.split(',');//console.log(value);
                    }
                    fieldName.select2('val',arr);                   
                   //console.log(key+'---multiselect----'+value);
                    break;
               case "file":
                   arr = value.split('/');//console.log(arr[arr.length - 1]);
                    fieldName.val(arr[arr.length - 1]);
                    break;
                default:
                    fieldName.val(value); //console.log(key+'---fields----'+value);
                    break;
            }  
        });  
    }//*************reset form elements
    $.fn.clear_form_elements = function () {
        if($(this).prop('tagName')=='FORM'){
        // $(this)[0].reset();
        }else{
            $(this).find(':input').each(function() {
                switch($(this).prop('type')) {
                    case 'checkbox':
                    case 'radio':
                        $(this).prop('checked',false);
                        break;
                    default :
                        $(this).val('');
                        break;
                }
            });
        }
    }
    //*******parse json

    $.fn.parse_json_custom= function(str){//alert('json parse');
        return $.parseJSON(str.replace(/\&apos/g, "'"));
    }
//******form edit field functions end************************************

})


