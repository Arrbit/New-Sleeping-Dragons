jQuery(document).ready(function(){
    
var ppp = 3; // Post per page
var pageNumber = 1;


function load_posts(){
    pageNumber++;
    var str = '&pageNumber=' + pageNumber + '&ppp=' + ppp + '&action=more_post_ajax';
    jQuery.ajax({
        type: "post",
        dataType: "html",
        url: ajax_posts.ajaxurl,
        data: str,
        success: function(data){
            var $data = jQuery(data);
            if($data.length){
                jQuery("#ajax-posts").append($data);
                jQuery("#more_posts").attr("disabled",false);
            } else{
                jQuery("#more_posts").attr("disabled",true);
            }
        },
        error : function(jqXHR, textStatus, errorThrown) {
            $loader.html(jqXHR + " :: " + textStatus + " :: " + errorThrown);
        }

    });
    return false;
}

jQuery(window).on('scroll', function () {
    console.log(jQuery(window).scrollTop() + jQuery(window).height());
    console.log(jQuery(document).height() - 100);
    if (jQuery(window).scrollTop() + jQuery(window).height()  >= jQuery(document).height() - 100) {
        load_posts();        
    }
});
  });