<?php exit;

// 先判断目标用户必须存在
empty($_user) AND message(-1, "用户不存在");

// 执行对应操作模式
switch ($method) {
  case 'POST':
    // 向此用户添加什么或上传头像
    message(0, 'POST');
    break;
  case 'PATCH':
    // 获取 JSON 数据
    $data = json_decode(file_get_contents("php://input"));

    // 如果修改密码
    if (isset($data->password)) {
      $salt = $_user['salt'];
      $password = md5($data->password.$salt);
      user_update($_uid, array('password'=>$password));
      !is_password($password, $err) AND message('password', $err);
    }
    
    // 如果修改用户名(格式刷 html转码, sql转码)
    if (isset($data->username)) {
      user_update($_uid, array('username'=>$data->username));
    }

    // 如果修改签名(格式刷 html转码, sql转码)
    if (isset($data->emotional)) {
      user_update($_uid, array('emotional'=>$data->emotional));
    }
    
    message(0, '修改成功');
    break;
}

// 放行 GET

?>


