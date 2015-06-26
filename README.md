# laravel5的UEditor包
UEditor是由百度web前端研发部开发所见即所得富文本web编辑器
本项目，是为了支持laravel5，使用的UEditor是php版本的1.4.3
支持本地和七牛云存储(在配置文件中配置),默认为本地上传 public/uploads

# 重要提示
本项目，受益并参考于[stevenyangecho/laravel-u-editor]https://github.com/stevenyangecho/laravel-u-editor项目。
而我，仅仅是做了锦上添花的事情


# 增加及修改功能
* 项目需要Fileinfo的支持，因此将此约束明文写进composer。(请大家在使用laravel5进行文件上传操作时，打开php.ini中的此扩展)
* 在riverslei\laravel-ueditor\resources\public\themes目录下，补充了iframe.css内容，使之能够将上传的图片，自适应屏幕
* 修改了对于项目不是部署于根目录时，上传图片回显路径不正确
* 将配置文件命名为：ueditor.php，并在其中新增变量baseurl，以及对部分变量的说明

===========


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

