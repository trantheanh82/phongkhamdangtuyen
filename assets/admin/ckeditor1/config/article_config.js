/**
 * @license Copyright (c) 2003-2015, CKSource - Frederico Knabben. All rights reserved.
 * For licensing, see LICENSE.md or http://ckeditor.com/license
 */
CKEDITOR.editorConfig = function( config ) {
	// Define changes to default configuration here.
	// For complete reference see:
	// http://docs.ckeditor.com/#!/api/CKEDITOR.config
	
	
	// The toolbar groups arrangement, optimized for two toolbar rows.
	config.toolbarGroups = [
		
		{ name: 'document',	   groups: [ 'mode', 'document', 'doctools' ] },
		{ name: 'tools' },
		{ name: 'clipboard',   groups: [ 'undo', 'clipboard' ] },
		{ name: 'links' },
		{ name: 'insert', groups: ['images']},
		/*{ name: 'forms' },*/		
		{ name: 'others' },
		'/',
		{ name: 'basicstyles', groups: [ 'basicstyles', 'cleanup' ] },
		{ name: 'paragraph',   groups: [ 'list', 'indent', 'blocks','align'] },
		{ name: 'styles' },
		{ name: 'colors' },
		{ name: 'about' }
	];
	
	config.width = '100%';

	// Remove some buttons provided by the standard plugins, which are
	// not needed in the Standard(s) toolbar.
	config.removeButtons = 'Underline,Subscript,Superscript';

	// Set the most common block elements.
	config.format_tags = 'p;h1;h2;h3;pre';

	// Simplify the dialog windows.
	config.removeDialogTabs = 'link:advanced;image:file;image:Upload';
	
	config.filebrowserBrowseUrl = '/thienanphu/filemanager/dialog.php?type=1&akey=abc&editor=ckeditor&fldr=';
	config.filebrowserUploadUrl = '/thienanphu/filemanager/dialog.php?type=1&akey=abc&editor=ckeditor&fldr=';
	config.filebrowserImageBrowseUrl = '/thienanphu/filemanager/dialog.php?type=1&akey=abc&editor=ckeditor&fldr=';
	
	//config styleset
	//config.stylesSet = 'my_styles';
	config.allowedContent = true;
	config.extraAllowedContent = 'div(*)';

	config.extraPlugins = 'stylesheetparser';
	config.contentsCss = '/thienanphu/assets/admin/css/forckeditor.css';
	   //config.stylesSet = [];
	//config.options.fileRoot = '/assets/upload/';
};
