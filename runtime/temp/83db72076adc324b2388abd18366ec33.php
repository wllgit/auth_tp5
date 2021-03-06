<?php if (!defined('THINK_PATH')) exit(); /*a:6:{s:65:"F:\demo\auth_tp5\public/../application/admin\view\rule\index.html";i:1551078980;s:66:"F:\demo\auth_tp5\public/../application/admin\view\base\common.html";i:1467023127;s:66:"F:\demo\auth_tp5\public/../application/admin\view\public\head.html";i:1467023127;s:68:"F:\demo\auth_tp5\public/../application/admin\view\public\navbar.html";i:1467023127;s:69:"F:\demo\auth_tp5\public/../application/admin\view\public\sidebar.html";i:1551063807;s:68:"F:\demo\auth_tp5\public/../application/admin\view\public\script.html";i:1467023127;}*/ ?>
<!DOCTYPE HTML>
<html>
<head>
	    <meta charset="utf-8" />
    <title>Dashboard</title>

    <meta name="description" content="Dashboard" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <link rel="shortcut icon" href="/assets/img/favicon.png" type="image/x-icon">


    <!--Basic Styles-->
    <link href="/assets/css/bootstrap.min.css" rel="stylesheet" />
    <link href="/assets/css/font-awesome.min.css" rel="stylesheet" />
    <link href="/assets/css/weather-icons.min.css" rel="stylesheet" />

    <!--Beyond styles-->
    <link id="beyond-link" href="/assets/css/beyond.min.css" rel="stylesheet" type="text/css" />
    <link href="/assets/css/demo.min.css" rel="stylesheet" />
    <link href="/assets/css/typicons.min.css" rel="stylesheet" />
    <link href="/assets/css/animate.min.css" rel="stylesheet" />
</head>
<body>
	<!-- 头部 -->
	<div class="navbar">
    <div class="navbar-inner">
        <div class="navbar-container">
            <!-- Navbar Barnd -->
            <div class="navbar-header pull-left">
                <a href="#" class="navbar-brand">
                    <small>
                            <img src="/assets/img/logo.png" alt="" />
                        </small>
                </a>
            </div>
            <!-- /Navbar Barnd -->
            <!-- Sidebar Collapse -->
            <div class="sidebar-collapse" id="sidebar-collapse">
                <i class="collapse-icon fa fa-bars"></i>
            </div>
            <!-- /Sidebar Collapse -->
            <!-- Account Area and Settings -->
            <div class="navbar-header pull-right">
                <div class="navbar-account">
                    <ul class="account-area">
                        <li>
                            <a class="login-area dropdown-toggle" data-toggle="dropdown">
                                <div class="avatar" title="View your public profile">
                                    <img src="/assets/img/avatars/adam-jansen.jpg">
                                </div>
                                <section>
                                    <h2><span class="profile"><span><?php echo \think\Session::get('user_auth.username'); ?></span></span></h2>
                                </section>
                            </a>
                            <!--Login Area Dropdown-->
                            <ul class="pull-right dropdown-menu dropdown-arrow dropdown-login-area">
                                <li class="username"><a>David Stevenson</a></li>
                                <li class="dropdown-footer">
                                    <a href="<?php echo url('user/logout'); ?>">
                                            退出登录
                                        </a>
                                </li>
                                <li class="dropdown-footer">
                                    <a href="<?php echo url('user/changePwd'); ?>">
                                            修改密码
                                        </a>
                                </li>
                            </ul>
                            <!--/Login Area Dropdown-->
                        </li>
                        <!-- /Account Area -->
                        <!--Note: notice that setting div must start right after account area list.
                            no space must be between these elements-->
                        <!-- Settings -->
                    </ul>
                </div>
            </div>
            <!-- /Account Area and Settings -->
        </div>
    </div>
</div>

	<!-- /头部 -->
	
	<div class="main-container container-fluid">
		<div class="page-container">
			            <!-- Page Sidebar -->
            <div class="page-sidebar" id="sidebar">
                <!-- Page Sidebar Header-->
                <div class="sidebar-header-wrapper">
                    <input type="text" class="searchinput" />
                    <i class="searchicon fa fa-search"></i>
                    <div class="searchhelper">Search Reports, Charts, Emails or Notifications</div>
                </div>
                <!-- /Page Sidebar Header -->
                <!-- Sidebar Menu -->
                <ul class="nav sidebar-menu">
                    <!--Dashboard-->
                    <?php if(is_array($sidebar) || $sidebar instanceof \think\Collection): $i = 0; $__LIST__ = $sidebar;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$item): $mod = ($i % 2 );++$i;?>
                    <li <?php if($parent_id_1 == $item['id'] || $parent_id_2 == $item['id']): ?>class="open"<?php endif; ?>>
                        <a href='<?php if(!empty($item["name"])): ?><?php echo url($item['name']); else: ?>#<?php endif; ?>' <?php if(isset($item['child'])): ?>class="menu-dropdown"<?php endif; ?>>
                            <i class="menu-icon fa fa-gear"></i>

                            <span class="menu-text">
                                <?php echo $item['title']; ?>
                            </span>

                            <i class="menu-expand"></i>
                        </a>
                        <?php if(isset($item['child'])): ?>
                        <ul class="submenu">
                            <?php if(is_array($item['child']) || $item['child'] instanceof \think\Collection): $i = 0; $__LIST__ = $item['child'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$level2): $mod = ($i % 2 );++$i;?>
                            <li <?php if($parent_id_1 == $level2['id'] || $parent_id_2 == $level2['id']): ?>class="open"<?php endif; if($uri == $level2['name']): ?>class="active"<?php endif; ?>>
                                <a href='<?php if(!empty($level2["name"])): ?><?php echo url($level2['name']); else: ?>#<?php endif; ?>' <?php if(isset($level2['child'])): ?>class="menu-dropdown"<?php endif; ?>>
                                    <span class="menu-text">
                                        <?php echo $level2['title']; ?>
                                    </span>
                                    <i class="menu-expand"></i>
                                </a>
                                <?php if(isset($level2['child'])): ?>
                                <ul class="submenu">
                                    <?php if(is_array($level2['child']) || $level2['child'] instanceof \think\Collection): $i = 0; $__LIST__ = $level2['child'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$level3): $mod = ($i % 2 );++$i;?>
                                    <li <?php if($uri == $level3['name']): ?>class="active"<?php endif; ?>>
                                        <a href='<?php if(!empty($level3["name"])): ?><?php echo url($level3['name']); ?>?id=<?php echo $uid; else: ?>#<?php endif; ?>'>
                                            <span class="menu-icon glyphicon glyphicon-hand-right"></span>
                                            <span class="menu-text"><?php echo $level3['title']; ?></span>
                                        </a>
                                    </li>
                                    <?php endforeach; endif; else: echo "" ;endif; ?>
                                </ul>
                                <?php endif; ?>
                            </li>
                            <?php endforeach; endif; else: echo "" ;endif; ?>

                        </ul>                            
                        <?php endif; ?>
                    </li>                        
                    <?php endforeach; endif; else: echo "" ;endif; ?>

                </ul>
                <!-- /Sidebar Menu -->
            </div>
            <!-- /Page Sidebar -->
            <!-- Page Content -->
            <div class="page-content">
                <!-- Page Breadcrumb -->
                <div class="page-breadcrumbs">
                    <ul class="breadcrumb">
                    <?php if(isset($resource3)): ?>
                    <li>
                        <a href="#"><?php echo $resource3['title']; ?></a>
                    </li>
                    <?php endif; if(isset($resource2)): ?>
                    <li>
                        <a href='#'><?php echo $resource2['title']; ?></a>
                    </li>
                    <?php endif; if(isset($resource1)): ?>
                    <li class="active"><?php echo $resource1['title']; ?></li>
                    <?php endif; ?>
                    </ul>
                </div>
                <!-- /Page Breadcrumb -->

                <!-- Page Body -->
                <div class="page-body">
                    
<button type="button" tooltip="添加角色" class="btn btn-sm btn-azure btn-addon" onclick="javascript:window.location.href = '<?php echo url('auth_rule/add'); ?>'"> <i class="fa fa-plus"></i> Add
</button>
<div class="row">
    <div class="col-lg-12 col-sm-12 col-xs-12">
        <div class="widget">
            <div class="widget-body">
                <div class="flip-scroll">
                    <table class="table table-bordered table-hover">
                        <thead class="">
                            <tr>
                                <th class="text-center">规则ID</th>
                                <th class="text-center">名称</th>
                                <th class="text-center">节点</th>
                                <th class="text-center">类型</th>
                                <th class="text-center">操作</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if(is_array($data) || $data instanceof \think\Collection): $i = 0; $__LIST__ = $data;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
                            <!--{notin name="vo.id" value="1,2,3,4,5,6,7,8,9,10,11,12,13,14,15,16,17"}-->
                            <!--{in name="vo.id" value="1,2,3,4,5,6,7,8,9,10,11,12,13,14,15,16,17"}-->
                            <?php if(in_array(($vo['id']), is_array($ids)?$ids:explode(',',$ids))): ?>
                            <tr>
                                <td align="center"><?php echo $vo['id']; ?></td>
                                <td align="left">
                                	<?php if($vo['count'] == 2): ?>——<?php elseif($vo['count'] == 3): ?>————<?php endif; ?><?php echo $vo['title']; ?>
                                </td>
                                <td align="left"><?php echo $vo['name']; ?></td>
                                <td align="center"><?php if($vo['type'] == 1): ?>按节点<?php else: ?>其他<?php endif; ?></td>
                                <td align="center">
                                    
                                    <a href="<?php echo url('rule/edit',['id'=>$vo['id']]); ?>" class="btn btn-primary btn-sm shiny">
                                        <i class="fa fa-edit"></i> 编辑
                                    </a>
                                    <a href="#" onclick="warning('确实要删除吗', '<?php echo url('del',['id'=>$vo['id']]); ?>')" class="btn btn-danger btn-sm shiny">
                                        <i class="fa fa-trash-o"></i> 删除
                                    </a>
                                </td>
                            </tr>
                            <?php endif; endforeach; endif; else: echo "" ;endif; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

                </div>
                <!-- /Page Body -->
            </div>
            <!-- /Page Content -->
		</div>	
	</div>

	    <!--Basic Scripts-->
    <script src="/assets/js/jquery.min.js"></script>
    <script src="/assets/js/bootstrap.min.js"></script>
    <script src="/assets/js/slimscroll/jquery.slimscroll.min.js"></script>
    <!--Beyond Scripts-->
    <script src="/assets/js/beyond.js"></script>
    
</body>
</html>
