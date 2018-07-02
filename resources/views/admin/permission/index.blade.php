<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="../../css/admin/ch-ui.admin.css">
    <link rel="stylesheet" href="../../css/admin/font-awesome.min.css">
    <script type="text/javascript" src="../../js/admin/jquery.js"></script>
    <script type="text/javascript" src="../../js/admin/ch-ui.admin.js"></script>
</head>
<body>
<!--面包屑导航 开始-->
<div class="crumb_warp">
    <!--<i class="fa fa-bell"></i> 欢迎使用登陆网站后台，建站的首选工具。-->
    <i class="fa fa-home"></i> <a href="#">首页</a> &raquo; <a href="#">权限管理</a> &raquo; 添加权限
</div>
<!--面包屑导航 结束-->
@if( session('message'))
    <div class="result_title">
        <div class="mark">
            <p>{{ session('message') }}</p>
        </div>
    </div>
@endif

<!--结果页快捷搜索框 开始-->
<div class="search_wrap">
    <form action="" method="post">
        <table class="search_tab">
            <tr>
                <th width="120">选择分类:</th>
                <td>
                    <select onchange="javascript:location.href=this.value;">
                        <option value="">全部</option>
                        <option value="http://www.baidu.com">百度</option>
                        <option value="http://www.sina.com">新浪</option>
                    </select>
                </td>
                <th width="70">关键字:</th>
                <td><input type="text" name="keywords" placeholder="关键字"></td>
                <td><input type="submit" name="sub" value="查询"></td>
            </tr>
        </table>
    </form>
</div>
<!--结果页快捷搜索框 结束-->

<!--搜索结果页面 列表 开始-->
<form action="#" method="post">
    {{--快捷操作--}}
    @include('admin.common.permission')
    <div class="result_wrap">
        <div class="result_content">
            <table class="list_tab">
                <tr>
                    <th class="tc" width="5%"><input type="checkbox" name=""></th>
                    <th class="tc">id</th>
                    <th>权限名</th>
                    <th>权限详细信息</th>
                    <th>权限访问的url</th>
                    <th>创建时间</th>
                    <th>更新时间</th>
                    <th>操作</th>
                </tr>

                @foreach( $permissions as $permission)
                    <tr>
                        <td class="tc"><input type="checkbox" name="id[]" value="59"></td>
                        <td class="tc">{{ $permission->id }}</td>
                        <td>{{ $permission->name }}</td>
                        <td>{{ $permission->description }}</td>
                        <td>{{ $permission->url }}</td>
                        <td>{{ $permission->created_at }}</td>
                        <td>{{ $permission->updated_at }}</td>
                        <td>
                            <a href="{{ url('admin/permission/edit', $permission->id) }}">修改</a>
                            <a href="{{ url('admin/permission/delete', $permission->id) }}" onclick="return confirm('确定要删除当前权限吗?')">删除</a>
                        </td>
                    </tr>
                @endforeach
            </table>

        </div>
    </div>
</form>
<!--搜索结果页面 列表 结束-->



</body>
</html>