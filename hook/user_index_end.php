<?php exit;

// 先判断目标用户必须存在
empty($_user) AND message(-1, "用户不存在");

// 执行对应操作模式
switch ($method) {
  case 'POST':
    // 向此用户添加什么..? 上传头像?
  case 'PATCH':
    // 如果修改密码
    $password = param('password');
    if(!empty(password)) {
      $salt = $_user['salt'];
      $password = md5($password.$salt);
      user_update($_uid, array('password'=>$password));
      !is_password($password, $err) AND message('password', $err);
      message(0, lang('modify_successfully'));
    }

    // 如果修改用户名
    // 如果修改签名

  default:
    // 是 GET, 向下放行
}

?>


