<input
  id="fileupload"
  type="file"
  name="files[]"
  data-url="<?=base_url()?>admin/upload"
  >
<div id="progress">
    <div class="bar" style="width: 0%;"></div>
</div>
<script>
$(docuemnt).ready({
	
 	$("#fileupload").fileupload('option','maxNumberOfFiles',1)
  
	$("#fileupload").fileupload({
	  dataType: "json",
	  add: function(e, data) {
	    data.context = $('<p class="file">')
	      .append($('<a target="_blank">').text(data.files[0].name))
	      .appendTo(document.body);
	    data.submit();
	  },
	  progress: function(e, data) {
	    var progress = parseInt((data.loaded / data.total) * 100, 10);
	    data.context.css("background-position-x", 100 - progress + "%");
	  },
	  done: function(e, data) {
	    data.context
	      .addClass("done")
	      .find("a")
	      .prop("href", data.result.files[0].url);
	  }
	});
});
</script>