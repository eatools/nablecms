CKEDITOR.plugins.add( 'apage',
{
init : function( editor )
{
// Add the link and unlink buttons.
	editor.addCommand( 'apage', new CKEDITOR.dialogCommand( 'apage' ) );
	editor.ui.addButton( 'Page',
	{
		//label : editor.lang.link.toolbar,
		label : 'Page',

		//icon: 'images/anchor.gif',
		command : 'apage'
	} 
);


//CKEDITOR.dialog.add( 'link', this.path + 'dialogs/link.js' );
CKEDITOR.dialog.add( 'apage', function( editor )
{
return {
	title : '文章分页',
	minWidth : 350,
	minHeight : 100,
	contents : [{
		id : 'tab1',
		label : 'First Tab',
		title : 'First Tab',
		elements :
		[{
			id : 'pagetitle',
			type : 'text',
			label : '请输入下一页文章标题<br />(不输入默认使用当前标题+数字形式)'
		}]
	}],
	onOk : function()
	{
		editor.insertHtml("[page="+this.getValueOf( 'tab1', 'pagetitle' )+"]");
	}
	};
	} );
	},

	requires : [ 'fakeobjects' ]
});

