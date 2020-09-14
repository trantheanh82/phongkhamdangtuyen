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
		{ name: 'document', groups: [ 'mode', 'document', 'doctools' ] },
		{ name: 'clipboard', groups: [ 'clipboard', 'undo' ] },
		{ name: 'editing', groups: [ 'find', 'selection', 'spellchecker', 'editing' ] },
		{ name: 'forms', groups: [ 'forms' ] },
		{ name: 'insert', groups: [ 'insert' ] },
		{ name: 'tools', groups: [ 'tools' ] },
		{ name: 'links', groups: [ 'links' ] },
		{ name: 'about', groups: [ 'about' ] },
		'/',
		{ name: 'basicstyles', groups: [ 'basicstyles', 'cleanup' ] },
		{ name: 'colors', groups: [ 'colors' ] },
		{ name: 'styles', groups: [ 'styles' ] },
		{ name: 'paragraph', groups: [ 'align', 'list', 'indent', 'blocks', 'bidi', 'paragraph' ] },
		{ name: 'others', groups: [ 'others' ] },
		'/'
	];
		// Simplify the dialog windows.
	config.removeDialogTabs = 'link:advanced;image:Upload';


		config.removeButtons = 'Save,NewPage,Templates,Form,Checkbox,Radio,TextField,Textarea,Select,ImageButton,Button,HiddenField,CreateDiv,Language,Replace,Scayt,Flash,Smiley,SpecialChar,PageBreak,Iframe,SelectAll,BidiLtr,BidiRtl,Subscript,Superscript';
		
		config.filebrowserBrowseUrl = '/billfee/filemanager/dialog.php?akey=abc';
		config.filebrowserUploadUrl = '/billfee/filemanager/dialog.php?akey=abc';

}