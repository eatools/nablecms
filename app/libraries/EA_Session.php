<?php

/*
 * 功能说明
 *=============================================================
 * 版权所有: (c) eatools.cn Able Gao 保留所有权利
 * 网站地址: http://www.eatools.cn
 *=============================================================
 * $Version: 
 * $Create : 2010-04-22 23:45 Able Gao <ablegao@gmail.com>
 * $Edit   : 2010/1/10
 * $File   : 
*/

/**
 * 接口规则，项功能必须，与ci 基础session相同，
 *　新session程序请先基于该规则后扩展，以提高可扩展性。
 */
interface SessionInter
{   
    /**
     * 保存session
     *@param String/Array   $var    当值是一个数组时，以键名为session名，循环存入session,$value将无效
     *@param                $value  当$var值不是一个数组时，该值为$_SESSION['$var']的值
     *@param                $namespace session所有值的命名空间，不指定时，session将存入$_SESSION[$this->namespace]
     */
    function set_userdata($var=array(),$value='');
    /**
     * 获取session数据
     *@param string $var  当值不为null时，取$var的session,否则，取得是命名空间的所有session
     *@return array/null
     */
    function userdata($var);
    /**
     * 删除session数据
     *@param string $var  当值不为null时，删除键名为$var的session,否则，删除命名空间的所有session
     *@return array/null
     */
    function unset_userdata($var = array());
    
}

//系统模式session
class PhpSession {

// constructor
    var $namespace = '__weibo__';
    var $userdata = array();
    function PhpSession() {
        session_start();
        $this->userdata = & $_SESSION[$this->namespace];
    }
    
    function set_userdata($var=array(), $val='') {
        if(is_array($var))
        {
            foreach($var as $k=>$v) $_SESSION[$this->namespace][$k]=$v;
        }else{
            $_SESSION[$this->namespace][$var] = $val;
        }
        
    }
    function userdata($item)
    {
        return (isset($this->userdata[$item]))?$this->userdata[$item]:false;
    }
    
    /**
	 * Fetch all session data
	 *
	 * @access	public
	 * @return	mixed
	 */
	function all_userdata()
	{
		return ( ! isset($this->userdata)) ? FALSE : $this->userdata;
	}
    
    function unset_userdata($var =array() ) {
        if(is_string($var)) unset($_SESSION[$this->namespace][$var]);
        if(is_array($var) && count($var)> 0 ) foreach ($var as $k=>$v)  unset($_SESSION[$this->namespace][$k]);
        else unset($_SESSION[$this->namespace]);
    }
    
}

    
class EA_Session extends PhpSession implements SessionInter {
    public function __construct()
    {
        parent::__construct();
    }
}
