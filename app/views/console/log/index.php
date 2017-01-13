<style type="text/css">
    .new{
        color: #5cb85c;
    }
</style>

<div class="container-fluid">
    <div class="row" style="padding-bottom: 10px;">
        <div class="col-xs-12">
            <a href="javascript:;" class="btn btn-primary" style=" margin-top: -10px;" data-toggle="modal" data-target="#newModal">关联新激活码</a>
            <select id="product" class="form-control" style="width: 200px; display: inline;">
                <option value="">产品列表</option>
                <?php foreach ($products as $product) { ?>
                    <option value="<?= $product->id; ?>"<?= $product->id == \Input::get('cid', 0) ? ' selected' : ''; ?>><?= $product->display_name; ?></option>
                <?php } ?>
            </select>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-12">
            <div>
                <?= \Config::get('base_url'); ?>jetbrains/activation/
            </div>
            <table class="table table-bordered">
                <thead>
                <tr>
                    <th>ID</th>
                    <th>产品名称</th>
                    <th>激活码ID</th>
                    <th>授权ID</th>
                    <th>授权码</th>
                    <th>到期时间</th>
                    <th>关键字</th>
                    <th>操作</th>
                </tr>
                </thead>
                <tbody>
                <?php foreach ($items as $value) { ?>
                    <tr>
                        <td><?= $value->id ?></td>
                        <td>
                            <?= $value->product->display_name; ?>

                        </td>
                        <td><?= $value->code->id ?></td>
                        <td><?= $value->code->license_id ?></td>
                        <td data-code="<?= $value->code->code ?>">
                            <a href="javascript:;" class="btn btn-primary" data-toggle="modal" data-target="#codeModal">点击查看激活码</a>
                        </td>
                        <td><?= $value->code->expired_at ? date('Y-m-d H:i:s', $value->code->expired_at) : '永久有效'; ?></td>
                        <td><?= $value->license_id;?></td>
                        <td>
                            <a class="btn btn-primary">发送激活码</a>
                        </td>
                    </tr>
                <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="codeModal" tabindex="-1" role="dialog" aria-labelledby="codeModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                <h4 class="modal-title" id="codeModalLabel">激活码</h4>
            </div>
            <div class="modal-body">
                <textarea id="txtCode" class="form-control" style="width: 100%; height: 400px;"></textarea>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">关闭</button>
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
                        <label for="txtEmail">邮箱地址</label>
                        <input type="email" class="form-control" id="txtEmail" name="email" aria-describedby="emailHelp" placeholder="Enter email">
                    </div>
                    <div class="form-group">
                        <label for="txtEmail">激活码所属软件系列</label>
                        <select class="form-control" name="category_id" id="category_id">
                            <?php foreach ($cats as $product) { ?>
                                <option value="<?= $product->id; ?>"<?= $product->id == \Input::get('cid', 0) ? ' selected' : ''; ?>><?= $product->name; ?></option>
                            <?php } ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="txtAccount">登录信息</label>
                        <div class="clearfix">
                            <input type="text" class="form-control pull-left" style="width: 49%; margin-right: 10px;" id="txtAccount" name="account" placeholder="登录用户名">
                            <input type="text" class="form-control pull-right" style="width: 49%;" id="txtPwd" name="password" placeholder="登录密码">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="txtName">授权信息</label>
                        <div class="clearfix">
                            <input type="text" class="form-control pull-left" style="width: 32%; margin-right: 10px;" id="txtName" name="username" placeholder="授权名">
                            <input type="text" class="form-control pull-left" style="width: 32%; margin-right: 10px;" id="txtLicenseId" name="license_id" placeholder="授权ID">
                            <input type="date" class="form-control pull-left" style="width: 32%;" id="txtExpiredAt" name="expired_at" placeholder="有效期截止时间">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="txtProductCode">激活码</label>
                        <textarea class="form-control" id="txtProductCode" name="code" rows="3"></textarea>
                    </div>
                    <div class="form-group">
                        <label for="txtRemark">备注</label>
                        <textarea class="form-control" id="txtRemark" name="remark" style="height: 60px;"></textarea>
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
<?php

$script = <<<js
js;

\Asset::js($script, [], 'before-script', true);
\Asset::js([
    'console/code/index.js'
], [], 'js-files', false);

?>
