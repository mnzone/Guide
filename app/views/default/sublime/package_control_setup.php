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
            <h5>Windows下<?= isset($item) && $item ? $item->product->display_name : ''; ?>安装教程</h5>
        </div>
    </div>

    <div class="row">
        <div class="col-xs-3">
        </div>
        <div class="col-xs-6">
            <div class="alert alert-success">
                <h5>操作步骤</h5>
                <hr style="width:100%; color: #5151A2; ">
                <h3>安装方式一</h3>
                <ol>
                    <li>打开Sublime Text</li>
                    <li>按下Ctrl + `或者点击菜单栏中的View > Show Console</li>
                    <li>
                        在打开的控制台中，复制粘贴如下代码：
                        <div>
                            import urllib.request,os,hashlib; h = 'df21e130d211cfc94d9b0905775a7c0f' + '1e3d39e33b79698005270310898eea76'; pf = 'Package Control.sublime-package'; ipp = sublime.installed_packages_path(); urllib.request.install_opener( urllib.request.build_opener( urllib.request.ProxyHandler()) ); by = urllib.request.urlopen( 'http://packagecontrol.io/' + pf.replace(' ', '%20')).read(); dh = hashlib.sha256(by).hexdigest(); print('Error validating download (got %s instead of %s), please try manual install' % (dh, h)) if dh != h else open(os.path.join( ipp, pf), 'wb' ).write(by)
                        </div>
                    </li>
                    <li>等待安装完成</li>
                </ol>
                <h3>安装方式二</h3>
                <ol>
                    <li>点击菜单栏中的Preferences > Browse Packages…</li>
                    <li>在打开的文件夹中，返回上级目录（mac电脑请按下Command + 向上键），并打开Installed Packages文件夹</li>
                    <li>
                        下载并复制<a href="https://packagecontrol.io/Package%20Control.sublime-package">Package Control.sublime-package</a>文件到Installed Packages/目录中。
                    </li>
                    <li>重启Sublime text</li>
                </ol>
            </div>
        </div>
        <div class="col-xs-3">
        </div>
    </div>
</div>