var editor;
function createEditor( EditName )
{
	if ( editor ) editor.destroy();
	editor = CKEDITOR.replace( EditName,{
			toolbar: 'MyToolbar'
	});
}