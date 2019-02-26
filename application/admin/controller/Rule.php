<?php
namespace app\admin\controller;
use think\Contoller;
use app\admin\model\AuthRule as AuthRuleModel;

class Rule extends Base{
	/**
	 * 权限列表
	 * @author ning
	 * @DateTime 2016-06-23T13:20:01+0800
	 * @return   [type]                   [description]
	 */
	public function index(){
		$authRuleData = \think\Db::query('select id,name,title,pid,sort,path,type,concat(path,"-",id) as bpath from auth_rule where status=1 order by bpath');
		foreach ($authRuleData as $key => $value) {
			$authRuleData[$key]['count'] = count(explode('-', $value['path']));
		}
//		print_r(session('sidebar'));
        $sidebar = session('sidebar');//拥有的权限
        $ids = '';//获取拥有的权限id
        if(!empty($sidebar)&&is_array($sidebar)){
            foreach($sidebar as $k=>$v){
                $ids.= $v['id'].',';
                if(isset($v['child'])){
                    foreach($v['child'] as $child_k=>$child_v){
                        $ids.= $child_v['id'].',';
                        if(isset($child_v['child'])){
                            foreach($child_v['child'] as $child2_k=>$child2_v){
                                $ids.= $child2_v['id'].',';
                            }
                        }
                    }
                }
            }
        }
        $ids = trim($ids,',');
        $this->assign('ids',$ids);//拥有的权限
		$this->assign('data', $authRuleData);
		return view('index');
	}

	/**
	 * 添加权限
	 * @author ning
	 * @DateTime 2016-06-22T22:26:12+0800
	 */
	public function add(){
		if(request()->isPost()){
			$authRuleModel = new AuthRuleModel;
			if($id = $authRuleModel->validate(true)->save(input('post.'))){
				// 给管理员添加全部权限
				$authGroupData = \think\Db::name('auth_group')->field('rules')->where('id',1)->find();
				$rules = $authGroupData['rules'] . ',' . $id;
				\think\Db::name('auth_group')->where('id',1)->update(['rules'=>$rules]);
				$this->getSidebar();
				session('_auth_list_'.session('user_auth')['uid'].'1', null);
				return $this->success('添加成功',url('index'));
			}else{
				return $this->error($authRuleModel->getError());
			}
		}else{
			$pidData = \think\Db::query('select id,title,path,concat(path,"-",id) as bpath from auth_rule where status=1 and type=1 and is_show=1 order by bpath');
			foreach ($pidData as $key => $value) {
				$pidData[$key]['count'] = count(explode('-', $value['path']));
			}
			$this->assign('pidData', $pidData);
			return view('add');
		}
	}

	/**
	 * 编辑权限
	 * @author ning
	 * @DateTime 2016-06-23T21:33:15+0800
	 * @return   [type]                   [description]
	 */
	public function edit(){
		if(request()->isPost()){
			$id = input('?post.id') ? input('post.id') : '';
			if(!$id){
				return $this->error('参数错误');
			}
			if(in_array($id, explode(',', '1,2,3,4,5,6,7,8,9,10,11,12,13,14,15,16,17'))){
				return $this->error('改权限不允许编辑');
			}
			$authRuleModel = new AuthRuleModel;
			if($authRuleModel->validate(true)->save(input('post.'), ['id'=>$id])){
				$this->getSidebar();
				session('_auth_list_'.session('user_auth')['uid'].'1', null);
				return $this->success('修改成功',url('index'));
			}else{
				return $this->error($authRuleModel->getError());
			}			
		}else{
			$id = input('?param.id') ? input('param.id') : '';
			if(!$id){
				return $this->error('参数错误');
			}
			$data = \think\Db::name('auth_rule')->field('id,name,title,type,condition,pid,sort,is_show')->where('id',$id)->find();
			$pidData = \think\Db::query('select id,title,path,concat(path,"-",id) as bpath from auth_rule where status=1 and type=1 and is_show=1 order by bpath');
			foreach ($pidData as $key => $value) {
				$pidData[$key]['count'] = count(explode('-', $value['path']));
			}
			$this->assign('pidData', $pidData);			
			$this->assign('data',$data);
			return view('edit');
		}
	}

	/**
	 * 删除权限
	 * @author ning
	 * @DateTime 2016-06-26T11:12:01+0800
	 * @return   [type]                   [description]
	 */
	public function del(){
		$id = input('?param.id') ? input('param.id') : '';
		if(!$id){
			return $this->error('参数错误');
		}
		if(in_array($id, explode(',', '1,2,3,4,5,6,7,8,9,10,11,12,13,14,15,16,17'))){
			return $this->error('改权限不允许编辑');
		}
		if(\think\Db::name('auth_rule')->where('id',$id)->delete()){
			return $this->success('删除成功');
		}else{
			return $this->error('删除失败');
		}
	}

}