<?php


/**
 * 列表按钮
 * @param String $controller 控制器名称
 * @param string $input 所需按钮 a,e,d(add,edit,delete)
 * @return html 
 */
function admin_list_button($controller,$input="aed",$id="")
{
    if($id!='') $id="/$id";
    $array = array(
            'a'=>anchor(ADMIN_ROUTES."/$controller/add$id",'<img alt="添加" title="添加" src="'.EA_BASE_URL.'/media/images/icon/add.gif">'),
            'e'=>anchor(ADMIN_ROUTES."/$controller/edit$id",'<img  alt="修改" title="修改" src="'.EA_BASE_URL.'/media/images/icon/edit.gif">'),
            'd'=>anchor(ADMIN_ROUTES."/$controller/delete$id",'<img  alt="删除" title="删除" src="'.EA_BASE_URL.'/media/images/icon/drop.gif">'),
        );
    $html ='';
    for($x=0;$x<strlen($input);$x++) $html.=$array[$input[$x]]."&nbsp;";
    return $html;
}

/**
 * 通用状态样式
 */
function admin_static($static=0)
{
    $flag = array('<img alt="否" title="否" src="'.EA_BASE_URL.'/media/images/drop.png">','<img alt="是" title="是" src="'.EA_BASE_URL.'/media/images/yes.gif">');
    return $flag[$static];
}
