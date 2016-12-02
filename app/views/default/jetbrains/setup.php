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

    <div class="row">
        <div class="col-xs-12 text-center">
            <h5>Windows下<?= isset($item) && $item ? $item->product->display_name : ''; ?>激活教程</h5>
        </div>
    </div>

    <div class="row">
        <div class="col-xs-3">
        </div>
        <div class="col-xs-6">
            <div class="alert alert-success">
                <h5>操作步骤</h5>
                <hr style="width:100%; color: #5151A2; ">
                <ol>
                    <li>下载软件</li>
                    <li>安装WebStorm软件（根据提示安装即可）。</li>
                    <li>打开软件</li>
                    <li>安装</li>
                    <li>安装</li>
                </ol>
            </div>
        </div>
        <div class="col-xs-3">
        </div>
    </div>

    <?php if(isset($item) && $item){ ?>
        <div class="row">
            <div class="col-xs-3">
            </div>
            <div class="col-xs-6">
                <div class="alert alert-warning">
                    <h5>下载地址</h5>
                    <hr style="width:100%; color: #5151A2; ">
                    <ol>
                        <?php foreach ($item->product->downloads as $value) { ?>
                            <li>
                                <label class="tag tag-danger"><?= Model_ProductDownload::$_maps['froms'][$value->from]; ?></label>
                                <?php if($value->bit){ ?>
                                    <label class="tag tag-pill tag-info"><?= $value->bit; ?>位</label>
                                <?php } ?>
                                <a href="<?= $value->url; ?>" target="_blank">点击下载</a>
                                <?php if($value->password){ ?>
                                    <label class="tag tag-info">密码: <?= $value->password; ?></label>
                                <?php } ?>
                            </li>
                        <?php } ?>
                    </ol>
                </div>
            </div>
            <div class="col-xs-3">
            </div>
        </div>

    <?php } ?>
</div>

<div class="container-fluid hide" id="mac" style="padding-top: 10px">
    <div class="row">
        <div class="col-xs-12 text-center">
            <video src="http://www.w3school.com.cn/i/movie.ogg" controls="controls" style="min-width: 50%;">
                视频教程
            </video>
        </div>
    </div>

    <div class="row">
        <div class="col-xs-12 text-center">
            <h5>Mac下Sublime Text激活教程</h5>
        </div>
    </div>

    <div class="row">
        <div class="col-xs-3">
        </div>
        <div class="col-xs-6">
            <div class="alert alert-success">
                <h5>操作步骤</h5>
                <hr style="width:100%; color: #5151A2; ">
                <ol>
                    <li>下载</li>
                    <li>安装</li>
                    <li>安装</li>
                    <li>安装</li>
                    <li>安装</li>
                </ol>
            </div>
        </div>
        <div class="col-xs-3">
        </div>
    </div>
</div>

<div class="container-fluid hide" id="linux" style="padding-top: 10px">
    <div class="row">
        <div class="col-xs-12 text-center">
            <video src="http://www.w3school.com.cn/i/movie.ogg" controls="controls" style="min-width: 50%;">
                视频教程
            </video>
        </div>
    </div>

    <div class="row">
        <div class="col-xs-12 text-center">
            <h5>Linux下Sublime Text激活教程</h5>
        </div>
    </div>

    <div class="row">
        <div class="col-xs-3">
        </div>
        <div class="col-xs-6">
            <div class="alert alert-success">
                <h5>操作步骤</h5>
                <hr style="width:100%; color: #5151A2; ">
                <ol>
                    <li>下载</li>
                    <li>安装</li>
                    <li>安装</li>
                    <li>安装</li>
                    <li>安装</li>
                </ol>
            </div>
        </div>
        <div class="col-xs-3">
        </div>
    </div>
</div>