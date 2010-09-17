/*****************
EAFramework
Able Gao
********************/

CKEDITOR.plugins.add( 'eaimage',
{
	init : function( editor )
	{
	// Add the link and unlink buttons.
		editor.addCommand( 'eaimage', new CKEDITOR.dialogCommand( 'eaimage' ) );
		editor.ui.addButton( 'EAImage',
		{
			//label : editor.lang.link.toolbar,
			label : 'EAImage',
			icon: this.path+'images/eaimg.png',
			command : 'eaimage'
		} );
		CKEDITOR.dialog.add( 'eaimage', this.path + 'dialogs/files.js' );
	},
	requires : [ 'fakeobjects' ]
});

