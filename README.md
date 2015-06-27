# laravel5的UEditor包
UEditor是由百度web前端研发部开发所见即所得富文本web编辑器
本项目，是为了支持laravel5，使用的UEditor是php版本的1.4.3
支持本地和七牛云存储(在配置文件中配置),默认为本地上传 public/uploads

# 修改日志
v1.0.0 依据参考项目，实现了功能
v1.0.1 修改了其中路径错误，将其中所有幻数全部使用常量

# 重要提示
本项目，受益并参考于[stevenyangecho/laravel-u-editor](https://github.com/stevenyangecho/laravel-u-editor)项目。
而我，仅仅是做了锦上添花的事情


# 增加及修改功能
* 项目需要Fileinfo的支持，因此将此约束明文写进composer。(请大家在使用laravel5进行文件上传操作时，打开php.ini中的此扩展)
* 在riverslei\laravel-ueditor\resources\public\themes目录下，补充了iframe.css内容，使之能够将上传的图片，自适应屏幕
* 修改了对于项目不是部署于根目录时，上传图片回显路径不正确
* 将配置文件命名为：ueditor.php，并在其中新增变量baseurl，以及对部分变量的说明


# 安装
**前提条件：** php版本>=5.4，项目已安装composer，将php.ini中的extension=php_fileinfo.dll前分号去掉
```composer
"riverslei/laravel-ueditor": "*"
```
然后运行composer install或者composer update

安装完成后，打开config/app.php配置服务提供者
```php
Riverslei\UEditor\UEditorServiceProvider::class,
```
最后记得运行
```artisan
php artisan vendor:publish
```

# 配置
若以上安装没问题,自定义项目配置文件会在 config/ueditor.php  (会自动生成)
```php
'core' => [
        'route' => [
                'middleware' => 'auth',
        ],
],
```
middleware 相当重要,请根据自己的项目设置,比如如果在后台使用,请设置为后台的auth middleware.
如果是单纯本机测试,请将 
`// 'middleware' => 'auth',` 直接注释掉,如果留 `'middleware'=>''`空值,会产生bug,原因不详.
 
所有UEditor 的官方资源,会放在 public/laravel-ueditor/ ,可以根据自己的需求,更改.(我已重新写了iframe.css，已让上传的内容自适应)


# 如何使用
首先在要使用的页面添加
```blad
@include('UEditor::head')
```
这个头部文件主要是引入需要的资源文件。然后在要使用的地方，添加如下代码：
<!-- 加载编辑器的容器 -->
```js
<script id="container" name="content" type="text/plain">
        这里写你的初始化内容
</script>
```
<!-- 实例化编辑器 -->
```js
<script type="text/javascript">
        var ue = UE.getEditor('container'，{
                initialFrameWidth : 500,
                initialFrameHeight : 450,
        });
        ue.ready(function() {
                //此处为支持laravel5 csrf ,根据实际情况修改,目的就是设置 _token 值. 
                ue.execCommand('serverparam', '_token', '{{ csrf_token() }}');   
        });
</script>
```

# 注意
* 这里UEditor界面显示的语言文件，与 `config/app.php` 中的 `locale` 相关，默认显示为英文，请将其修改为 `'locale' => 'zh-CN'`。同时，请在 `resources/lang` 下面配置对应的中文语言包
