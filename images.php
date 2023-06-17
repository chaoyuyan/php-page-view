<?php
$source = $_GET["source"];

// 验证source参数的合法性
if (!preg_match('/^[a-zA-Z0-9]+\.(jpg|jpeg|png|gif)$/', $source)) {
  // 如果source参数不合法，可以返回一个默认的错误图片地址或其他处理方式
  $source = "error.jpg";
}

// 真实的图片地址
$imagePaths = [
  "images.jpg" => "dog.jpg",
  "2b.jpg" => "2b.jpg",
];

$imagePath = isset($imagePaths[$source]) ? $imagePaths[$source] : "default.jpg";

// 获取当前日期
$date = date("Y-m-d");

// 统计每天加载图片的次数和每个图片的加载次数
$data = json_decode(file_get_contents("data.json"), true);
if (!isset($data["total"])) {
  $data["total"] = 0;
}
$data["total"]++;

if (!isset($data[$date])) {
  $data[$date] = [];
}

if (!isset($data[$date][$source])) {
  $data[$date][$source] = 0;
}
$data[$date][$source]++;

file_put_contents("data.json", json_encode($data));

// 返回真实的图片地址
header("Content-Type: image/jpeg"); // 设置图片类型为JPEG，根据实际情况调整类型
//header("Cache-Control: max-age=86400"); // 启用缓存，根据实际情况调整缓存时间
header("Location: " . $imagePath);
exit;
