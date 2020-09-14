/*(function($) {
    
    "use strict";
    
    $('.active').bind('click',function(){
	    var active_status = $(this).attr('data-active');
	    
	    if(active_status==1){
			active_status = 0;
		}else{
			    active_status = 1;
		}
		
	    $.ajax({
		    url: $(this).attr('data-url')+'/'+active_status,
		    cache: false
	    }).done(function(html){
		    if(html.updated == "done"){
			    
			    $('.modal').modal();
		    }
	    });
	    
	    $(this).attr('data-active',active_status);
    });
    
})(window.jQhtml);*/

$(document).ready(function() {
	
})