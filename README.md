## 基于  https://github.com/github-muzilong/laravel55-layuiadmin.git 改版升级
## 变更记录
 - laravel 版本 6.* 
 - layui 版本升级至 v.2.9
 - permission 版本升级至 v.5.0
 - 添加 Font Awesome v.6.5 图标
 - 左侧菜单栏图标兼容 Font Awesome
 - 页面的添加、编辑等变更成弹窗模式
 - 后台前缀可更改默认backend
 - 添加后台操作日志


# 注意事项
 - 添加权限菜单 图标是 Font Awesome class 前必须添加ufa类名

## 安装步骤
 - git clone ...
 - 复制.env.example为.env
 - 配置.env里的数据库连接信息
 - composer install
 - 数据库迁移填充 php artisan migrate --seed
 - php artisan key:generate
 - 后台登录: host/backend root 123456

## 示例
- 用户
![Image text](https://github.com/NormanQing/laravel6_layuiadmi/blob/master/public/show/1.png?raw=true)
- 权限
![Image text](https://github.com/NormanQing/laravel6_layuiadmi/blob/master/public/show/2.png?raw=true)
