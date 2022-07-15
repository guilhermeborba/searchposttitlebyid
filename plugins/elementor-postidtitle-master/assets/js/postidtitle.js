function restPage(id){
    const request =jQuery.ajax({
        async: true,
        global: false,
        cache: false,
        url: 'http://localhost:85/pipefy/wp-json/wp/v2/posts/' + id,
        type: "GET",
        dataType: "json",
        header: "Content-Type: application/json",
    });    
    request.success(data => {
        var title = data.title.rendered;
        jQuery("#resultTitlePost").append("The post title for the ID "+id+" is: <span>"+title+"</span>");
        jQuery("#resultTitlePost").fadeIn();            
    });
    request.error(data => {
        jQuery("#resultTitlePost").append("We couldn't find posts with ID "+id);
        jQuery("#resultTitlePost").fadeIn();            
    });
}    
jQuery('#searchButton').click(function () {    
    jQuery('.formTitle').fadeOut();
    jQuery('#resultTitlePost').empty();
    var thisID = jQuery("#floatingInput").val();
    //console.log(thisID);
    restPage(thisID);
});
