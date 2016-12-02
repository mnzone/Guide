<style type="text/css">
    .download {
        margin-bottom: 5px;
        clear: both;
    }
</style>
<div class="container-fluid">
    <div class="row">
        <div class="col-xs-12" style="padding-bottom: 10px;">
            <a href="javascript:;" class="btn btn-primary" data-toggle="modal" data-target="#newModal">添加产品</a>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-12">
            <table class="table table-bordered">
                <thead>
                <tr>
                    <th>ID</th>
                    <th>产品名称</th>
                    <th>GUID</th>
                    <th>下载地址</th>
                    <th>创建时间</th>
                    <th>操作</th>
                </tr>
                </thead>
                <tbody>
                <?php foreach ($items as $value) { ?>
                    <tr>
                        <td><?= $value->id ?></td>
                        <td>
                            <?= $value->full_name ?><br>
                            <?= $value->short_name ?><br>
                            <?= $value->display_name ?>
                        </td>
                        <td><?= $value->product_code ?></td>
                        <td>
                        </td>
                        <td><?= $value->created_at ? date('Y-m-d H:i:s', $value->created_at) : ''; ?></td>
                        <td>
                            <a href="javascript:;" class="btn btn-sm btn-primary" data-toggle="modal"
                               data-target="#addLinkModal">关联授权记录</a>
                            <a href="javascript:;" class="btn btn-sm btn-success" data-toggle="modal"
                               data-target="#sendModal">发送授权信息</a>
                        </td>
                    </tr>
                <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="addLinkModal" tabindex="-1" role="dialog" aria-labelledby="addLinkModalLabel"
     aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span
                        class="sr-only">Close</span></button>
                <h4 class="modal-title" id="addLinkModalLabel">关联授权链接</h4>
            </div>
            <div class="modal-body">
                <table class="table table-bordered">
                    <thead>
                    <tr>
                        <th>授权ID</th>
                        <th>授权产品</th>
                        <th>激活码ID</th>
                        <th>到期时间</th>
                    </tr>
                    </thead>

                    <tbody>
                    <tr>
                        <td>A1231343fsdf</td>
                        <td>Jetbrains WebStorm</td>
                        <td>1</td>
                        <td>2016-11-01</td>
                    </tr>
                    </tbody>
                </table>

                <div>
                    <form id="frmCode">
                        <div class="form-group">
                            <label>关联产品</label>
                            <input type="text" class="form-control" value="Jetbrains WebStorm 2.4" disabled>
                        </div>
                        <div class="form-group">
                            <label for="txtAccount">关联激活码</label>
                            <select class="form-control">
                                <option value="1">2017-11-24（已关联5项产品）</option>
                                <option value="2">2017-11-24（已关联0项产品）</option>
                            </select>
                        </div>
                        <div style="text-align: right">
                            <button type="button" class="btn btn-default" data-dismiss="modal">关闭</button>
                            <button type="submit" id="btnLinkSubmit" class="btn btn-primary" data-dismiss="modal">保存
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="sendModal" tabindex="-1" role="dialog" aria-labelledby="sendModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span
                        class="sr-only">Close</span></button>
                <h4 class="modal-title" id="addLinkModalLabel">向指定邮箱发送激活码</h4>
            </div>
            <div class="modal-body">
                <form id="frmCode">
                    <div class="form-group">
                        <label>产品名称</label>
                        <input type="text" class="form-control" value="Jetbrains WebStorm 2.4" disabled>
                    </div>
                    <div class="form-group">
                        <label for="txtAccount">激活码</label>
                        <select class="form-control">
                            <option value="1">2017-11-24（默认）</option>
                            <option value="2">2017-11-24</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="txtAccount">接收邮箱</label>
                        <input type="email" value="" id="targetEmail" class="form-control" placeholder="请填写邮箱地址"/>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">关闭</button>
                <button type="button" id="btnSend" class="btn btn-success" data-dismiss="modal">发送</button>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="newModal" tabindex="-1" role="dialog" aria-labelledby="newModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form id="frmCode">
                <div class="modal-body">
                    <div class="form-group">
                        <label for="txtFullName">产品全名</label>
                        <input type="text" class="form-control" id="txtFullName" name="full_name" placeholder="全称">
                    </div>
                    <div class="form-group">
                        <label for="txtShortName">产品名称</label>
                        <div class="clearfix">
                            <input type="text" class="form-control pull-left" style="width: 49%; margin-right: 10px;"
                                   id="txtShortName" name="sort_name" placeholder="简称">
                            <input type="text" class="form-control pull-right" style="width: 49%;" id="txtDisplayName"
                                   name="display_name" placeholder="显示名称">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="txtEmail">产品GUID</label>
                        <input type="text" class="form-control" id="txtProductCode" name="productCode" placeholder="请输入产品GUID">
                    </div>
                    <div class="form-group">
                        <label for="txtName">下载地址</label>
                        <div id="divDownloads">
                            <div class="download clearfix">
                                <div class="pull-left" style="margin-right: 10px;">
                                    <select class="form-control">
                                        <option value="baidu">百度网盘</option>
                                        <option value="website">官方</option>
                                        <option value="myServer">私服</option>
                                    </select>
                                </div>
                                <div class="pull-left">
                                    <div class="input-group" style="width: 420px;">
                                        <input type="text" class="form-control" placeholder="请输入下载地址">
                                        <a class="input-group-addon" style="border-top-right-radius: 0px;">
                                            <i class="fa fa-plus"></i>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div style="text-align: right">
                        <button type="button" class="btn btn-default" data-dismiss="modal">关闭</button>
                        <button type="submit" id="btnSubmit" class="btn btn-primary" data-dismiss="modal">保存</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

<script type="text/x-jquery-tmpl" id="item">
<div class="download clearfix">
    <div class="pull-left" style="margin-right: 10px;">
        <select class="form-control">
            <option value="baidu">百度网盘</option>
            <option value="website">官方</option>
            <option value="myServer">私服</option>
        </select>
    </div>
    <div class="pull-left">
        <div class="input-group" style="width: 420px;">
            <input type="text" class="form-control" placeholder="请输入下载地址">
            <a class="input-group-addon" style="border-top-right-radius: 0px;">
                <i class="fa fa-plus"></i>
            </a>
        </div>
    </div>
</div>
</script>
<?php

$script = <<<js
js;

\Asset::js($script, [], 'before-script', true);
\Asset::js([
    'jquery-tmpl/jquery.tmpl.min.js',
    'jquery-tmpl/jquery.tmplPlus.min.js',
    'console/product/index.js',
], [], 'js-files', false);

?>
