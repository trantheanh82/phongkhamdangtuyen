<?php
	/* 
	 * Params: 
	 *  - file: file_field
	 *  - id: 
	 *  - multifile: false
	 *	- acceptFileType: /(\.|\/)(gif|jpe?g|png)$/i,
	 */	
	 
	 if(empty($acceptFileType)){
	 	$acceptFileType = "/(\.|\/)(gif|jpe?g|png)$/i";
	 }
	 
	 if(empty($paramName)){
		 $paramName = 'files';
	 }
	 
	 if(empty($type_file)){
		 $type_file = 'image';
	 }
	 	
?>
<!-- The fileinput-button span is used to style the file input field as button -->
    <span class="btn btn-success fileinput-button" id="input_placeholder">
        <i class="glyphicon glyphicon-plus"></i>
        <span>Add files...</span>
        <!-- The file input field used as target for the file upload widget -->
        <input id="fileupload_<?=$id?>" type="file" name="files_<?=$file?>" <?=$multiple ? "multiple":""?> />
        <?php
	        // generate form if files is array
	        if(is_array($value)):
	        	foreach($value as $k => $v):
	    ?>
			<input type='hidden' name="<?=$file?>[<?=$k?>]" value="<?=$v?>" />

	    <?php
		    	endforeach;
		    	//end foreach generate multi files
		    else:
		    ?>
        <input type='hidden' name='<?=$file?><?=$multiple?"[]":""?>' value="<?=$value?>" />
        <input type='hidden' name='type_file' value='<?=$type_file?>' />
        <?php
	        endif;
	    ?>
    </span>
    <br>
    <br>
    <!-- The global progress bar -->
    <div id="progress_<?=$id?>" class="progress">
        <div class="progress-bar progress-bar-success"></div>
    </div>
    <!-- The container for the uploaded files -->
    <div id="files_<?=$id?>" class="files">
	    
	    
    </div>
<script>
/*jslint unparam: true, regexp: true */
/*global window, $ */
if(typeof jQuery!=='undefined'){
    console.log('jQuery Loaded');
}
else{
    console.log('not loaded yet');
}

$(document).ready(function(){ 
	var autoUpload = true;
	$(function () {
	    'use strict';
	    // Change this to the location of your server-side upload handler:
	    var url = window.location.hostname === 'blueimp.github.io' ?
	                '//jquery-file-upload.appspot.com/' : '<?=$this->config->base_url().$current_lang['slug']?>/admin/upload/',
	        uploadButton = $('<button/>')
	            .addClass('btn btn-primary')
	            .prop('disabled', true)
	            .text('Processing...')
	            .on('click', function () {
	                var $this = $(this),
	                    data = $this.data();
	                $this
	                    .off('click')
	                    .text('Abort')
	                    .on('click', function () {
	                        $this.remove();
	                        data.abort();
	                        
	                    });
	                data.submit().always(function () {
	                    $this.remove();
	                });
	                return false;
	            });
	            
	       $('#fileupload_<?=$id?>').fileupload({
	        url: url,
	        <?=$multiple ? "":"maxNumberOfFiles:1,"?>
	        dataType: 'json',
	        paramName: '<?=$paramName?>',
	        acceptFileTypes: <?=$acceptFileType?>,
	        autoUpload: autoUpload,
	        maxFileSize: 99900000000,
	        // Enable image resizing, except for Android and Opera,
	        // which actually support image resizing, but fail to
	        // send Blob objects via XHR requests:
	        disableImageResize: /Android(?!.*Chrome)|Opera/
	            .test(window.navigator.userAgent),
	        previewMaxWidth: 100,
	        previewMaxHeight: 100,
	        previewCrop: true
	        
	    }).on('fileuploadadd', function (e, data) {
	        <?php
	        	if(!$multiple):
	        ?>
	        $('#files_<?=$id?>').empty();
	        <?php
	        	endif;
	        ?>
	        data.context = $('<div class="col-md-4"/>').appendTo('#files_<?=$id?>');
	        $.each(data.files, function (index, file) {
	        	
	            var node = $('<p/>')
	                    .append($('<span/>').text(file.name.substring(0,10)+'...'+file.name.substring(file.name.length -4,file.name.length)));
	            if (!index) {
		            if(!autoUpload){
	                node
	                    .append($('<br />')) 
	                    .append(uploadButton.clone(true).data(data)) 
	                    }          
	            }
	            
	            node.appendTo(data.context);
	        });
	    }).on('fileuploadprocessalways', function (e, data) {
	    	
	        var index = data.index,
	            file = data.files[index],
	            node = $(data.context.children()[index]);
	        	
	        if (file.preview) {
	            node
	                .prepend('<br>')
	                .prepend(file.preview);
	        }
	        if (file.error) {
	            node
	                .append('<br>')
	                .append($('<span class="text-danger"/>').text(file.error));
	        }
	        if (index + 1 === data.files.length) {
	            data.context.find('button')
	                .text('Upload')
	                .prop('disabled', !!data.files.error);
	        }
	    }).on('fileuploadprogressall', function (e, data) {
	        var progress = parseInt(data.loaded / data.total * 100, 10);
	        $('#progress_<?=$id?> .progress-bar').css(
	            'width',
	            progress + '%'
	        );
	    }).on('fileuploaddone', function (e, data) {
	        //console.log(data.result);
	        $.each(data.result.files, function (index, file) {
		        
	            if (file.url) {
		            //console.log(index++);
		           /* var file_name = $('<p>').text(file.name);
		           
	                var link = $('<a>')
	                    .attr('target', '_blank')
	                    .prop('href', file.url);
	                   // link  = $('<p/>')
	                var delete_link = $('<a>').attr('target','_blank')
	                .prop('href',"<?=base_url()?>admin/upload/delete/"+file.name);*/
	               
	                var content = "<br /><a class='fileupload-command-delete' style='color:#f00' href='<?=base_url().$current_lang['slug']?>/admin/upload/delete?filename="+file.name+"&model=<?=$type_file?>'>Delete</a></p>"; 
	                console.log(content);
	                $(data.context.children()[index])
	                    .append(content);
	                    
	                <?php if($multiple){?>
			                	if(!$('input[name="<?=$file?>[]"]:last').val()){
			                		$('input[name="<?=$file?>[]"]:last').val(file.name);
			                	}else{
			                		$('input[name="<?=$file?>[]"]:last').clone().appendTo('#input_placeholder').attr('value',file.name);
			                	}
	                <?php }else{?>
	                	$('input[name~="<?=$file?>"]').attr('value',file.name);
	                	$('#<?=$id?> img').attr('src','<?=base_url()?>assets/upload/<?=$id?>/thumbnail/'+file.name).attr('height','80').attr('class','border-notrans');
	                <?php 
						} 
	                ?>
	            } else if (file.error) {
	                var error = $('<span class="text-danger"/>').text(file.error);
	                $(data.context.children()[index])
	                    .append('<br>')
	                    .append(error);
	            }
	        });
	    }).on('fileuploadfail', function (e, data) {
		    console.log("Failed");
		    console.log(data);
	        $.each(data.files, function (index) {
	            var error = $('<span class="text-danger"/>').text('File upload failed.');
	            $(data.context.children()[index])
	                .append('<br>')
	                .append(error);
	        });
	    }).prop('disabled', !$.support.fileInput)
	        .parent().addClass($.support.fileInput ? undefined : 'disabled');
	});
});

// Delete File 
$(document).ready(function(){
	
	
	$(document).on('click','.fileupload-command-delete',function(){
		
		obj = $(this);
		
		$.ajax({
			url: $(this).attr('href')
		})
		.done(function(data){
			if(data == 'done'){
				
				obj.parent('p').parent('div.col-md-4').fadeOut('fast');
			}
		});
		return false;
	})
	
	
})
</script>
<?php //unset($file)?>