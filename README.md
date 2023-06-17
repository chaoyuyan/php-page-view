# php-page-view
浏览量统计 PHP 脚本
这份代码是用 PHP 编写的，用于统计网站中每个页面的访问量。以下是使用此代码的步骤：

# 如何使用
将上面的 PHP 代码保存为一个 .php 文件，例如 pv_counter.php。
将 pv_counter.php 文件放在你的网站服务器上。
在需要统计浏览量的页面中，使用 PHP include 或 require 函数引入 pv_counter.php 文件。例如，在页面头部或页脚添加以下代码：
`<?php include 'pv_counter.php'; ?>` 图片统计的方法是`<img src=images.php?source=images.jpg />`

# 设置时区
在使用此代码之前，需要设置时区。在代码的第一行，使用 date_default_timezone_set 函数设置时区。例如，如果你的网站所在地是中国上海，可以使用以下代码设置时区：
date_default_timezone_set('Asia/Shanghai');

# 定义日志文件路径和锁文件路径
在代码中，需要定义两个文件的路径：日志文件和锁文件。日志文件用于记录每个页面的访问量，锁文件用于在多个进程同时写入日志文件时

$log_file = 'pv.log';        // 日志文件路径
$lock_file = $log_file . '.lock';    // 锁文件路径
其中，$log_file 变量定义了日志文件的路径，可以根据需要修改。$lock_file 变量则是在日志文件路径后加上 .lock 后缀，用于生成锁文件的路径。建议不要修改锁文件路径。

# 注意事项
在使用此代码之前，需要确保日志文件所在的目录有写入权限。另外，如果多个进程同时运行此代码，可能会出现写入冲突，建议在代码中使用锁文件避免冲突。
该脚本仅适用于简单的浏览量统计需求，对于大型网站或需要更详细的数据分析，建议使用第三方分析工具，如 Google Analytics。
