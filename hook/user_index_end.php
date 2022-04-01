<?php exit;

// 先判断目标用户必须存在
empty($_user) AND message(-1, "用户不存在");

switch ($method) {
  case 'POST':
    // 向此用户添加什么..? 上传头像?
  case 'PATCH':
    // 修改用户信息
  default:
    // 是 GET, 向下放行
}

?>