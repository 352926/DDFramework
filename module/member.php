<?php
/**
 * User: Huangdd <352926@qq.com>
 * Date: 13-1-22
 * Time: 下午4:03
 */
class memberClass extends Module
{
    public function init()
    {
        //echo 'aa';
        $this->layout = 'aaa';
    }

    public function loginAction()
    {
        $username = isset($this->params['username']) ? $this->params['username'] : '';
        $password = isset($this->params['password']) ? $this->params['password'] : '';
        $autologin = isset($this->params['autologin']) ? $this->params['autologin'] : '';
        $logtime = isset($this->params['logtime']) ? $this->params['logtime'] : '';
        if ($_SERVER['REQUEST_METHOD'] == "POST") {
            $db = new DB();
//        print_r($this->params);
            $salt = $db->GetOne("user", "salt", "username='{$username}'");
            if ($salt) {
                $cook_pwd = $password;
                $password = md5(base64_decode($password) . $salt);
                $info = $db->GetRow("user", array('uid', 'groupid', 'lognum', 'email'), "username='{$username}' AND password='{$password}'");
                if ($info) {
                    if ($autologin == 'on') {
                        if (isset($_COOKIE['user']) && is_array($_COOKIE['user']) && !empty($_COOKIE['user'])) {
                            $user = (array)json_decode($_COOKIE['user']);
                            $user[] = array(
                                $username => array(
                                    'password' => $cook_pwd,
                                    'autologin' => $autologin,
                                    'logtime' => $logtime
                                ),
                            );
                            $user = json_encode($user);
                        } else {
                            $user = json_encode(array(
                                $username => array(
                                    'password' => $cook_pwd,
                                    'autologin' => $autologin,
                                    'logtime' => $logtime
                                )
                            ));
                        }
                        switch ($logtime) {
                            case 'day':
                                $log_t = time() + 24 * 3600;
                                break;
                            case 'week':
                                $log_t = time() + 7 * 24 * 3600;
                                break;
                            case 'month':
                                $log_t = time() + 30 * 24 * 3600;
                                break;
                            case 'year':
                                $log_t = time() + 365 * 24 * 3600;
                                break;
                            default:
                                $log_t = 0;
                        }
                        $a = setcookie("user", $user, $log_t);
                    }
                    setcookie("lastUser", $username, $log_t);
                    $_SESSION['username'] = $username;
                    $_SESSION['uid'] = $info['uid'];
                    $_SESSION['groupid'] = $info['groupid'];
                    $_SESSION['authcode'] = md5($username);
                    echo '<script type="text/javascript" src="/public/js/jquery-1.8.3.min.js"></script><script type="text/javascript" src="/public/js/jquery.cookie.js"></script>';
                    DD::JsonMsg(200, print_r($a . $user . $log_t, true));
                } else {
                    DD::JsonMsg(300, "密码错误");
                }
            } else {
                DD::JsonMsg(300, "该用户不存在！");
            }
        } else {
            $this->assign('aa', '^_^');
            $this->display('index',array('bb'=>'bb','cc'=>'cc'));
        }
//        print_r($salt);
    }

    public function authAction()
    {
        if ($this->ajax) {
        }
    }
}
