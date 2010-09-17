<?php

/*
 * 验证代码
 *=============================================================
 * 版权所有: (c) eatools.cn Able Gao 保留所有权利
 * 网站地址: http://www.eatools.cn
 *=============================================================
 * $Version: 
 * $Create : 2010-04-22 23:45 Able Gao <ablegao@gmail.com>
 * $Edit   : 2010/1/10
 * $File   : 
*/

class vcode extends Controller
{
    public function  index()
    {
        $this->load->model('ConfirmCode_Model','code');
        $this->code->fontUrl = APPPATH.'/fonts/';
        $this->session->set_userdata('checkcode',$this->code->make());
        $this->code->show();
    }
}
