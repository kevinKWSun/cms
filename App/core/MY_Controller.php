<?php
defined('BASEPATH') OR exit('No direct script access allowed');
//后台验证
class MY_Controller extends CI_Controller {
	public function __construct(){
        parent::__construct();
        $this->load->helper(array('common', 'url'));
        $this->load->library(array('parser', 'auth'));
        if(defined('UID')) return ;
	    define('UID',is_login());
		if( ! UID){
		   $url = base_url('login.html');
		   redirect($url);
		}
        define('IS_ROOT', is_administrator());
        if(! IS_ROOT){
            $a = $this->uri->segment(1);
            $b = $this->uri->segment(2);
            if($b){
                if($b == 'index'){
                    $rule  = strtolower('/' . $a);
                }else{
                    $rule  = strtolower('/' . $a . '/' .$b);
                }
            }else{
                $rule  = strtolower('/' . $a);
            }
            if (! $this->checkRule($rule) && $rule != '/adminr/center' && $rule != '/adminr' && $rule != '/menus'){
                exit('<center><font color=red size=+2>403_未授权访问!</font></center>');
            }
        }
    }
    /**
     * 权限检测
     * @param string  $rule    检测的规则
     * @param string  $mode    check模式
     * @return boolean
     */
    final protected function checkRule($rule, $type=1, $mode='url'){
        if(! $this->auth->check($rule, UID, $type, $mode)){
            return false;
        }
        return true;
    }
}
/* //会员中心验证
class Baseaccount extends CI_Controller {
    public function __construct(){
        parent::__construct();
        $this->load->helper(array('common', 'url'));
        $this->load->library(array('parser', 'auth'));
        if(defined('QUID')) return ;
        define('QUID',is_qlogin());
        if( ! QUID){
           $url = base_url('/suny/login.html');
           redirect($url);
        }else{
			$this->load->model(array('member/member_model'));
			$m = $this->member_model->get_member_info_byuid(QUID);
			define('TELS', $m['phone']);
		}
    }
}
//验证UID
class Baseaccounts extends CI_Controller {
    public function __construct(){
        parent::__construct();
        $this->load->helper(array('common', 'url'));
        $this->load->library(array('parser', 'auth'));
        if(defined('QUID')) return ;
        define('QUID',is_qlogin());
		//$this->load->model(array('member/member_model'));
		//$m = $this->member_model->get_member_info_byuid(QUID);
		//define('TELS', $m['phone']);
    }
} */