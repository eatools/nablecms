<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/*
 * 路由扩展控制
 *=============================================================
 * 版权所有: (c) eatools.cn Able Gao 保留所有权利
 * 网站地址: http://www.eatools.cn
 *=============================================================
 * $Version: 
 * $Create : 10:25 2010/5/22 Able Gao <ablegao@gmail.com>
 * $Edit   : 10:25 2010/5/22
 * $File   : EA_Router
*/
	
	
class EA_Router extends CI_Router {  

    function MY_Router() {  
        parent::CI_Router();  
    }  
    /**
	 * 控制器获取扩展，当控制器不存在时，跳转到默认控制器
	 * the controller.
	 *
	 * @access	private
	 * @param	array
	 * @return	array
	 */	
	function _validate_request($segments)
	{
		
		// Does the requested controller exist in the root folder?
		if (file_exists(APPPATH.'controllers/'.$segments[0].EXT))
		{
			return $segments;
		}
		
		// Is the controller in a sub-folder?
		if (is_dir(APPPATH.'controllers/'.$segments[0]))
		{		
			// Set the directory and remove it from the segment array
			$this->set_directory($segments[0]);
			$segments = array_slice($segments, 1);
			
			if (count($segments) > 0)
			{
				// Does the requested controller exist in the sub-folder?
				if ( ! file_exists(APPPATH.'controllers/'.$this->fetch_directory().$segments[0].EXT))
				{
					
					show_404($this->fetch_directory().$segments[0]);
				}
			}
			else
			{
				$this->set_class($this->default_controller);
				$this->set_method('index');
			
				// Does the default controller exist in the sub-folder?
				if ( ! file_exists(APPPATH.'controllers/'.$this->fetch_directory().$this->default_controller.EXT))
				{
					$this->directory = '';
					return array();
				}
			
			}

			return $segments;
		}

		// Can't find the requested controller...
		return array('mydefault','index');
		//show_404($segments[0]);
	}
}  
