# php-hexo
php写的hexo后台管理界面，可以在web界面编辑修改bolg



## 主要用途：

### 本地搭建  
可以在本地的web界面编辑、修改、生成、预览hexo博客。  
比直接在命令行操作，然后在本地编辑器里编辑方便。  

### 搭建在vps上  
可以在不同设备上，不同的地方都很方便的管理hexo博客。  
至于为什么不直接在vps上建一个博客系统呢？   
1.vps可能经常换，迁移麻烦。  
2.是博客放到GitHub上比放在自己的服务器上稳定，安全。  


### 系统需求
1. nodejs环境
2. git
3. hexo-cli



### todo  

- [x] 登录页面
- [ ] 修改密码
- [ ] 新建文章
- [ ] 编辑文章
- [ ] 文章列表 
- [ ] 配置页面
- [ ] 状态管理
- [ ] 关于我
- [ ] 初始化页面








### hexo的基本配置
1. 初始化   
```
hexo init
```  
2. 配置网站信息  
```
vim _config.yml
```
3. 新文章模板
```
vim  scaffold/post.md
```
4. 主题  
创建 `Hexo` 主题非常容易，您只要在 `themes` 文件夹内，新增一个任意名称的文件夹，并修改` _config.yml `内的` theme `设定，即可切换主题。


###  hexo的指令
1. 新建文章
```
hexo new [layout] <title>
```
2. 生成静态文件
```
hexo generate
# 或者
hexo g
```
3. 发布草稿
```
hexo publish [layout] <filename>
```
4. 预览服务
```
hexo server
预览草稿
hexo server --draft
```
5. 部署
```
hexo deploy
```
6. 渲染文件
```
hexo render <file1> [file2] ...
-o, --output	设置输出路径
```
7. 数据迁移（这个暂时不弄）
```
hexo migrate <type>
```
8. 清除缓存
```
hexo clean
```
清除缓存文件 (db.json) 和已生成的静态文件 (public)。

9.列出网站资料
``` 
hexo list <type> 
Available types: page, post, route, tag, category
```


