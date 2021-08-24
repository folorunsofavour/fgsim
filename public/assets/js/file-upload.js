/**
 * admin.js
 * @author: Hamed Musa <cartzedan@gmail.com>
 * @date: 14th Mar, 2020
 */
(function($) {
'use strict';

var propMainImage = '';
var propOtherImages = [];
var propOtherImagesName = [];
var propMainImgDivDefaultText = "Click/Drop Main Image Here";
var maxImageSizeAllowed = 5000000;
var maxOtherImagesAllowed = 50;
var geocoder;
var map;

const spinnerClass = "fa fa-spinner faa-spin animated";

  $(function() {
    $('.file-upload-browse').on('click', function() {
      var file = $(this).parent().parent().parent().find('.file-upload-default');
      file.trigger('click');
    });
    $('.file-upload-default').on('change', function() {
      $(this).parent().find('.form-control').val($(this).val().replace(/C:\\fakepath\\/i, ''));
    });
  });
})(jQuery);

//When the toggle on/off button is clicked to publish/unpublish a Admin
    $("#allProperties").on('click', '.publishProp', function(){
        var elem = $(this);
        var propId = elem.closest('tr').prop('id').split("-")[1];//get the property Id
        
        //show spinner
        elem.html(spinner);
        
        if(propId){
            $.ajax({
                url: appRoot+"admin/properties/publishProp",
                method: "POST",
                data: {pId:propId}
            }).done(function(rd){
                if(rd.status === 1){
                    //change the icon to "on" if it's "off" before the change and vice-versa
                    var newIconClass = rd.ns === 1 ? "mdi mdi-toggle-switch" : "mdi mdi-toggle-switch-off";
                    
                    //change the icon
                    elem.html("<i class='"+ newIconClass +"'></i>");
                }
                
                else{
                    //change the icon back to the previous state
                    var prevIconClass = rd.ns === 1 ? "mdi mdi-toggle-switch" : "mdi mdi-toggle-switch-off";
                    
                    elem.html("<i class='fa fa-exclamation-triangle text-danger'></i>");
                    
                    setTimeout(function(){
                        elem.html("<i class='"+ prevIconClass +"'></i>");
                    }, 2000);
                }
            });
        }
    });
    
    
    /*
    ******************************************************************************************************************************
    ******************************************************************************************************************************
    ******************************************************************************************************************************
    ******************************************************************************************************************************
    ******************************************************************************************************************************
    */
    
    
    //When the trash icon in front of a property is clicked in order to delete the property
    $("#allProperties").on('click', '.deleteProp', function(e){
        e.preventDefault();
        
        //get the property Id
        var propId = $(this).closest('tr').prop('id').split("-")[1];
        
        //set the ID of the property to delete as the value of the hidden form input
        $("#delPropId").val(propId);
        
        //launch the delete modal
        $("#deletePropModal").modal('show');
    });
    
   
    /*
    ******************************************************************************************************************************
    ******************************************************************************************************************************
    ******************************************************************************************************************************
    ******************************************************************************************************************************
    ******************************************************************************************************************************
    */
   
    //When the toggle on/off button is clicked to change the account status of an admin (i.e. suspend or lift suspension)
    $("#allAdmin").on('click', '.suspendAdmin', function(){
        var elem = $(this);
        var elemHTML = $(this).html();
        var adminId = elem.closest('tr').prop('id').split("-")[1];//get the user(admin) Id
        
        //show spinner
        elem.html(spinner);
        
        if(adminId){
            $.ajax({
                url: appRoot+"admin/administrators/suspend",
                method: "POST",
                data: {aId:adminId}
            }).done(function(rd){
                if(rd.status === 1){
                    //change the icon to "on" if it's "off" before the change and vice-versa
                    var newIconClass = rd.ns === 1 ? "fa fa-toggle-on pointer" : "fa fa-toggle-off pointer";
                    
                    //change the icon
                    elem.html("<i class='"+ newIconClass +"'></i>");
                }
                
                else{
                    elem.html("<i class='fa fa-exclamation-triangle text-danger'></i>");
                    
                    //change the icon back to the previous state
                    setTimeout(function(){
                        elem.html(elemHTML);
                    }, 2000);
                }
            });
        }
    });
    
    /*
    ******************************************************************************************************************************
    ******************************************************************************************************************************
    ******************************************************************************************************************************
    ******************************************************************************************************************************
    ******************************************************************************************************************************
    */
   
    //When the trash icon in front of an admin account is clicked on the admin list table (i.e. to delete the account)
    $("#allAdmin").on('click', '.deleteAdmin', function(e){
        e.preventDefault();
        
        var confirm = window.confirm("Proceed? Note that this cannot be reversed");
        
        if(confirm){
            var elem = $(this);
            var adminId = elem.closest('tr').prop('id').split("-")[1];//get the user(admin) Id

            //show spinner
            elem.html(spinner);

            if(adminId){
                $.ajax({
                    url: appRoot+"admin/administrators/delete",
                    method: "POST",
                    data: {aId:adminId}
                }).done(function(rd){
                    if(rd.status === 1){
                        laad();
                    }

                    else{
                        elem.html("<i class='fa fa-trash'></i>");
                    }
                });
            }
        }
    });
    
   


