<?php

/**
 * 用户登录欢迎界面
 * ============================================================================
 * 版权所有 (C) 2005-2009 北京格特资优网络技术有限公司，并保留所有权利。
 * 网站地址: www.ziyouedu.com
 * ============================================================================
 * $Version: v1.0.0 Beta
 * $Author: Able Gao <ablegao@gmail.com> $
 * $Date: 2009-12-7 11:58 $
 * $Id: controller/admin/webcom.php 2009-12-7 11:58 Able Gao $
*/

class Welcome extends Controller {

	public function __construct()
	{
		parent::__construct();
	}

    public function index()
    {

        $this->db;
        $this->load->view('admin/header');
        $this->load->view('admin/welcome');

    }
	
	
}
