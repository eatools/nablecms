/*
Copyright (c) 2003-2009, CKSource - Frederico Knabben. All rights reserved.
For licensing, see LICENSE.html or http://ckeditor.com/license
*/

CKEDITOR.editorConfig = function( config )
{
	//config.extraPlugins = 'eaimage', //EAFiles插件
    config.toolbar = 'MyToolbar';
	config.enterMode = CKEDITOR.ENTER_BR;
    config.toolbar_MyToolbar =
    [
    ['Source','-','NewPage','Preview'],
    ['Cut','Copy','Paste','PasteText','PasteFromWord','-','Print'],
    ['Undo','Redo','-','Find','Replace','-','SelectAll','RemoveFormat'],
	['Maximize', 'ShowBlocks','-','About'],
    '/',
    ['Bold','Italic','Underline','Strike','-','Subscript','Superscript'],
    ['NumberedList','BulletedList','-','Outdent','Indent','Blockquote'],
    ['JustifyLeft','JustifyCenter','JustifyRight','JustifyBlock'],
    ['Link','Unlink','Anchor'],
   
    '/',
    ['Styles','Format','Font','FontSize'],
    ['TextColor','BGColor'],
    ['Image','Flash','Table','HorizontalRule','Smiley','SpecialChar','PageBreak']

    ];
};