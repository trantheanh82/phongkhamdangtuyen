$(document).ready(function() {
	startjs();	// Make Ajax load on all page
	$('a[data-load="ajax"]').click(function(){
		href = $(this).attr('href');
		page_title = $(this).attr('title');
		window.history.pushState({urlPath:href}, page_title, href);
		document.title = page_title;
		$.ajax({
			url: href,
			method: "GET",
			dataType: 'html',
			contentType: "text/html"
		}).success(function(html){
			$('.content-wrapper').fadeOut(function(){
				$('.content-wrapper').html(html);
					$('div.content-wrapper').find('table#data').DataTable({
					    'language'		: {'url':'//cdn.datatables.net/plug-ins/1.10.16/i18n/Vietnamese.json'},
					    'paging'      	: true,
					    'order'			: [[4,'DESC']],
					    'searching'   : true,
					    'ordering'    : true,
					    'info'        : true
					});

					$('.content-wrapper').fadeIn();
					startjs();
				});
		});

		return false;
	});


	$('#data').DataTable({
	    'language'		: {'url':'//cdn.datatables.net/plug-ins/1.10.16/i18n/English.json'},
	    'paging'      	: true,
	    'order'			: [[0,'ASC']],
	    'searching'   : true,
	    'ordering'    : true,
	    'info'        : true,
	    'pageLength'			: 50,
			'lengthMenu'	: [20,50,100]
	});

});

function startjs(){

	$(window).on('popstate', function(event) {
		console.log(window.history);

		$.ajax({
			url: window.history.state.urlPath,
			method: "GET",
			dataType: 'html',
			contentType: "text/html"
		}).success(function(html){
			$('.content-wrapper').fadeOut(function(){
				$('.content-wrapper').html(html);
					$('.content-wrapper').fadeIn();
				});


		});
	});

	$('.select2').select2();

   /*$('#data').DataTable({
	    'language'		: {'url':'//cdn.datatables.net/plug-ins/1.10.16/i18n/Vietnamese.json'},
	    'paging'      	: true,
	    'order'			: [[4,'DESC']]
	});*/

    //Date picker
    $('#datepicker').datepicker({
      autoclose: true
    })

    //iCheck for checkbox and radio inputs
    $('input[type="checkbox"].minimal, input[type="radio"].minimal').iCheck({
      checkboxClass: 'icheckbox_minimal-blue',
      radioClass   : 'iradio_minimal-blue'
    })
    //Red color scheme for iCheck
    $('input[type="checkbox"].minimal-red, input[type="radio"].minimal-red').iCheck({
      checkboxClass: 'icheckbox_minimal-red',
      radioClass   : 'iradio_minimal-red'
    })
    //Flat red color scheme for iCheck
    $('input[type="checkbox"].flat-red, input[type="radio"].flat-red').iCheck({
      checkboxClass: 'icheckbox_flat-green',
      radioClass   : 'iradio_flat-green'
    });

	//Make slug
	$(".make_slug").keyup(function(){
			id = $(this).attr('id')
	    var Text = $(this).val();
	    Text = convertToSlug(Text);
	    Text = change_alias(Text);

	    $('.'+id).val(Text);
	});


	/*Ajax form*/
	$('#ajax_submit').on('submit',function(){
		url = $(this).attr('action');
		dataString = $(this).serialize();

		$.ajax({
			type: "POST",
			url: url,
			data:dataString,
			success: function(data){
				if(data.success){
					$('#modal-success').modal('show');
					$('#print').show();
					$('#generate_pdf').show();
					$('button[name="submit_invoice"]').hide();

				}else{
					$('#modal-danger').modal('show');

				}
			}
		})

		return false;
	})

	$('button[name=submit_invoice]').click(function(){
		$('#ajax_submit').submit();
		return false;
	});

	$('button.back').on("click",function(){
		window.history.back();
	});

	//$('.modal').modal('show');

	$('.confirm_delete').click(function(){
		if(!confirm("Bạn có chắc muốn xoá sản phẩm này không")){
			return false;
		}
	});

	$('#makeup_price').on('keyup',function(){
		$('input[name=price]').val(removecommas($(this).val()));
	});


	$(document).on('mouseover','.border-trans',function(){
		$(this).addClass('border-notrans').on('mouseleave',function(){$(this).removeClass('border-notrans')});

	})
	/**
		Begin CKEDITOR
	**/


}//end of startjs()

window.onload = function(){
		$('.product-editor').each(function(){

			CKEDITOR.replace($(this).attr('id'),{
				customConfig: "/assets/admin/ckeditor/config/product_config.js"
			});
		});

		$('.article-editor').each(function(){

			CKEDITOR.replace($(this).attr('id'),{
				customConfig: "/assets/admin/ckeditor/config/article_config.js"
			});
		});

		$('.basic-editor').each(function(){
			CKEDITOR.replace($(this).attr('id'),{
				customConfig: "/assets/admin/ckeditor/config/basic.js"
			});

		});

}


function makeupcurrency(obj){

}

function removecommas(val){
	return val.toString().replace(/,/g,'');
}

function convertToSlug(Text)
{
    return Text
        .toLowerCase()
        .replace(/ /g,'-')
        ;
}

function change_alias(alias) {
    var str = alias;
    str = str.toLowerCase();
    str = str.replace(/à|á|ạ|ả|ã|â|ầ|ấ|ậ|ẩ|ẫ|ă|ằ|ắ|ặ|ẳ|ẵ/g,"a");
    str = str.replace(/è|é|ẹ|ẻ|ẽ|ê|ề|ế|ệ|ể|ễ/g,"e");
    str = str.replace(/ì|í|ị|ỉ|ĩ/g,"i");
    str = str.replace(/ò|ó|ọ|ỏ|õ|ô|ồ|ố|ộ|ổ|ỗ|ơ|ờ|ớ|ợ|ở|ỡ/g,"o");
    str = str.replace(/ù|ú|ụ|ủ|ũ|ư|ừ|ứ|ự|ử|ữ/g,"u");
    str = str.replace(/ỳ|ý|ỵ|ỷ|ỹ/g,"y");
    str = str.replace(/đ/g,"d");
    str = str.replace(/!|@|%|\^|\*|\(|\)|\+|\=|\<|\>|\?|\/|,|\.|\:|\;|\'|\"|\&|\#|\[|\]|~|\$|_|`|-|{|}|\||\\/g," ");
    str = str.replace(/ +/g,"-");
    str = str.trim();
    return str;
}
