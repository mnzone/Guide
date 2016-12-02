<style type="text/css">
    ol li{
        font-size: 15px;
        font-weight: 900;
        padding: 20px 0px;
    }
</style>
<div class="container-fluid" id="window" style="padding-top: 10px">
    <?php if(isset($item) && $item){ ?>
        <div class="row hide">
            <div class="col-xs-12 text-center">
                <video src="http://www.w3school.com.cn/i/movie.ogg" controls="controls" style="min-width: 50%;">
                    视频教程
                </video>
            </div>
        </div>
    <?php } ?>

    <div style="max-width: 800px;">
        <h3>新装软件，且未能进入向导页，请直接看第3步</h3>
        <ol>
            <li>
                打开已安装的软件，并进入向导页。如图所示：
                <img src="/uploads/product/<?= $item->product->short_name; ?>/<?= $item->product->short_name; ?>_guide.png" alt="" style="width: 100%;"/>
            </li>
            <li>
                打开Configure，并找到Manage License...菜单。如图所示：
                <img src="/uploads/product/<?= $item->product->short_name; ?>/<?= $item->product->short_name; ?>_manage_license.png" alt="" style="width: 100%;"/>
            </li>
            <?php if(true){ ?>
                <li>
                    将激活码(<span style="color:red; font-size: 18px;">激活码在本页面底部</span>)粘贴至红线框标识的文本框中，并点击OK按钮。如图所示：
                    <img src="/uploads/product/<?= $item->product->short_name; ?>/<?= $item->product->short_name; ?>_activation_code.png" alt="" style="width: 100%;"/>
                </li>
            <?php } else {?>
                <li>
                    将激活链接(<span style="color:red">http://www.baidu.com</span>)粘贴至红线框标识的文本框中，并点击Activate按钮。如图所示：
                    <img src="/uploads/product/<?= $item->product->short_name; ?>/<?= $item->product->short_name; ?>_license_server.png" alt="" style="width: 100%;"/>
                </li>
            <?php } ?>

            <li>激活完毕。</li>
        </ol>
    </div>

    <div style="margin-bottom: 50px;">
        <p style="color: red; font-weight: 700;">注意：以下全部内容为一个激活码。请全部复制并粘贴至指定位置。</p>
        <textarea class="form-control" style="height: 450px;"><?= $item->code->code;?></textarea>
    </div>
</div>