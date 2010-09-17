CKEDITOR.plugins.add( 'eafiles',
{
init : function( editor )
{
// Add the link and unlink buttons.
	editor.addCommand( 'eafiles', new CKEDITOR.dialogCommand( 'eafiles' ) );
	editor.ui.addButton( 'EAFiles',
	{
		//label : editor.lang.link.toolbar,
		label : 'EAFiles',
		icon: this.path+'images/eaimg.png',
		command : 'eafiles'
	} 
);


//CKEDITOR.dialog.add( 'link', this.path + 'dialogs/link.js' );
CKEDITOR.dialog.add( 'eafiles', function( editor )
{
return {
	title : '文件添加',
	minWidth : 350,
	minHeight : 100,
	contents : [{
		id : 'tab1',
		label : 'First Tab',
		title : 'First Tab',
		elements :
		[{
			id : 'select_file',
			type : 'file',
			label : '选择文件'
		}]
	}],
	onOk : function()
	{
		editor.insertHtml("[page="+this.getValueOf( 'tab1', 'select_file' )+"]");
	}
	};
	} );
	},

	requires : [ 'fakeobjects' ]
});

