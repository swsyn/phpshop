<?php
    class UserModel extends Model
    {
        public $error_msg = '';
        public $error_msg2 = '';
        
        public function get_user($params)
        {
            $result = $this->query("SELECT * FROM users WHERE id={$params['id']} LIMIT 1");
            $array = mysqli_fetch_assoc($result);
            return $array;
        }
        
        public function is_authorized()
        {
            if (!isset($_SESSION['auth']) or (isset($_SESSION['auth']) and $_SESSION['auth'] != 1)) {
                if (isset($_POST['email']) and !isset($_POST['pass'])) {
                    $this->error_msg = 'Введите пароль!';
                    return 0;
                } elseif (!isset($_POST['email']) and isset($_POST['pass'])) {
                    $this->error_msg = 'Введите логин!';
                    return 0;
                } elseif (!isset($_POST['email']) and !isset($_POST['pass']) and isset($_POST['logon'])) {
                    $this->error_msg = 'Введите логин и пароль!';
                    return 0;
                } elseif (isset($_POST['email']) and isset($_POST['pass']) and isset($_POST['logon'])) {
                    //die('1');
                    $result = $this->query('SELECT id,email,pass FROM users WHERE email=\''.$_POST['email'].'\' LIMIT 1');
                    $num_rows = mysqli_num_rows( $result );
                    if ($num_rows == 0) {
                        $this->error_msg = 'Пользователь не зарегистрирован!';
                        return 0;
                    } elseif ($num_rows > 1) {
                        $this->error_msg = 'Ошибка базы данных!';
                        return 0;
                    }
                    $user = mysqli_fetch_assoc( $result );
                    if ($user['pass'] != md5(md5($_POST['pass']))) {
                        $this->error_msg = 'Неправильный пароль!';
                        return 0;
                    }
                    $_SESSION['auth'] = 1;
                    $_SESSION['email'] = $user['email'];
                    $_SESSION['id'] = $user['id'];
                    if ($_SESSION['id'] != 1) {
                        return 1;
                    } else {
                        return 2;
                    }
                }
            } elseif (isset($_SESSION['auth']) and $_SESSION['auth'] == 1) {
                if ($_SESSION['id'] != 1) {
                    return 1;
                } else {
                    return 2;
                }
            }
        }
        
        public function logout()
        {
            $_SESSION['auth'] = NULL;
            $_SESSION['email'] = NULL;
            $_SESSION['id'] = NULL;
        }
        
        public function is_registered() {
        
            if( !isset($_POST['register']) ) {
                # Пользователь еще не зарегистрирован 
                return false;
            } else {
                if( !$_POST['email'] ) {
                    $this->error_msg = 'Введите e-mail';
                    return false;
                }
                if( !$_POST['phone'] ) {
                    $this->error_msg = 'Введите телефон';
                    return false;
                }
                if( !$_POST['pass1'] ) {
                    $this->error_msg = 'Введите пароль';
                    return false;
                }
                if( !$_POST['pass2'] ) {
                    $this->error_msg = 'Введите пароль повторно';
                    return false;
                }
                if( $_POST['pass1'] !== $_POST['pass2'] ) {
                    $this->error_msg = 'Не совпадают пароли';
                    return false;
                }
                $result = $this->query( "SELECT id FROM users WHERE email='{$_POST['email']}' ORDER BY id" );
                if( mysqli_num_rows($result) > 0 ) {
                    $this->error_msg = 'Пользователь с таким e-mail уже существует';
                    return false;
                }
                $this->query( "INSERT INTO users(pass,email,lastname,firstname,middlename,address,phone) VALUE (md5(md5('{$_POST['pass1']}')),'{$_POST['email']}','{$_POST['lastname']}','{$_POST['firstname']}','{$_POST['middlename']}','{$_POST['address']}','{$_POST['phone']}')" );
                return true;
            }
        }
        
        
    }