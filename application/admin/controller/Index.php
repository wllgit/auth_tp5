<?php
namespace app\admin\controller;
use think\Controller;
use app\admin\api\UserApi;

class Index extends Controller{
	/**
	 * 后台登录
	 * @author ning
	 * @DateTime 2016-06-21T22:09:24+0800
	 * @return   [type]                   [description]
	 */
	public function index(){
		// 检测登录状态
		if(session('user_auth') && session('user_auth_sign')){
			$this->redirect(url('main/index'));
		}
		if(request()->isPost()){
			$username = input('post.username');
			$password = input('post.password');
			if(!$username || !$password){
				return $this->error('请填写用户名或密码');
			}
			$user = new UserApi;
			$uid = $user->login($username, $password);
			if($uid>0){
				/*记录session和cookie*/
				$auth = [
					'uid'=>$uid,
					'username'=>$username,
					'last_login_time'=>time(),
				];
				session('user_auth',$auth);
				session('user_auth_sign', data_auth_sign($auth));
				print_r(session('_auth_list_'));
				return $this->success('登录成功',url('main/index'));
			}else{
				switch ($uid) {
					case '-1':
						$error = '用户不存在或被禁用';
						break;
					case '-2':
						$error = '密码错误';
						break;
					
					default:
						$error = '未知错误';
						break;
				}
				return $this->error($error);
			}
		}else{
			return view('index');
		}
	}
}