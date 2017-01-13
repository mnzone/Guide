<style type="text/css">
    .new{
        color: #5cb85c;
    }
    .btn{
        color: #fff;
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
                    <tr data-pname="<?= $value->product->display_name; ?>" data-code="<?= $value->code->code ?>" data-keyword="<?= $value->license_id; ?>">
                        <td><?= $value->id ?></td>
                        <td>
                            <?= $value->product->display_name; ?>
                        </td>
                        <td><?= $value->code->id ?></td>
                        <td><?= $value->code->license_id ?></td>
                        <td>
                            <a href="javascript:;" class="btn btn-primary" data-toggle="modal" data-target="#codeModal">点击查看激活码</a>
                        </td>
                        <td><?= $value->code->expired_at ? date('Y-m-d H:i:s', $value->code->expired_at) : '永久有效'; ?></td>
                        <td><?= $value->license_id;?></td>
                        <td>
                            <a class="btn btn-primary" data-toggle="modal" data-target="#sendModal">发送激活码</a>
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

<div class="modal fade" id="sendModal" tabindex="-1" role="dialog" aria-labelledby="sendModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form id="frmSendModal">
                <div class="modal-body">
                    <input type="hidden" id="txtSubject" name="subject" value=""/>
                    <div class="form-group">
                        <label for="txtEmail">邮箱地址</label>
                        <input type="email" class="form-control" id="txtEmail" name="to" aria-describedby="emailHelp" placeholder="Enter email">
                    </div>
                    <div class="form-group">
                        <label for="txtEmail">激活码</label>
                        <input type="email" class="form-control" id="txtKeyword" name="keyword" value="" aria-describedby="keyword" placeholder="激活码关键字">
                    </div>
                    <div class="form-group">
                        <label for="txtProductCode">邮件内容</label>
                        <textarea class="form-control" id="txtBody" name="body" rows="3"></textarea>
                    </div>
                    <div style="text-align: right">
                        <button type="button" class="btn btn-default" data-dismiss="modal">关闭</button>
                        <button type="submit" id="btnSendEmail" class="btn btn-primary" data-dismiss="modal">发送</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
<?php

$domain = \Config::get('base_url');
$script = <<<js
    var domain = '{$domain}';
js;

\Asset::js($script, [], 'before-script', true);
\Asset::js([
    'console/log/index.js'
], [], 'js-files', false);

?>
