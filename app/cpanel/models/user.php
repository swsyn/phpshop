<?php

class UserModel extends Model {

	public $error_msg = '';
	public $num_all_users = 0;
	
	public function set_num_users( $user_type ) {
		
		if( $user_type === 'all' ) {
			$result = $this->query( 'SELECT count(*) AS num FROM users' );
			$array = mysqli_fetch_row( $result );
			$this->num_all_users = $array[0];
			return true;
		} else return false;
		
	}
	
	public function get_user( $params ) {
		$result = $this->query("SELECT * FROM users WHERE id={$params['id']} LIMIT 1");
		$array = mysqli_fetch_assoc($result);
		return $array;
	}
	
	public function get_userlist() {
	
		$result = $this->query("SELECT id,login FROM users WHERE deleted IS NULL ORDER BY login ASC");
		while($buf = mysql_fetch_assoc($result)) {
			$array[$buf['id']] = $buf['login'];
		}
		return $array;
	
	}
	
	public function get_users( $params ) {
        $result = $this->query('SELECT id,email,address,phone FROM users ORDER BY id ASC');
		while($buf = mysqli_fetch_assoc($result)) {
			$array[] = $buf;
		}
		return $array;
	}
	
	public function logout() {
		$_SESSION['auth'] = NULL;
		$_SESSION['login'] = NULL;
		$_SESSION['id'] = NULL;
	}
	
	public function is_created() {

		if( !isset($_POST['add']) ) {
			# Кнопка не нажата 
			return false;
		} else {
			if( !$_POST['email'] ) {
				$this->error_msg = 'Введите e-mail';
				return false;
			}
            if( !$_POST['address'] ) {
				$this->error_msg = 'Введите адрес';
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
		
	public function is_updated( $params ) {

		if( !isset($_POST['edit']) ) {
			# Кнопка не нажата 
			return false;
		} else {
			if( $_POST['pass1'] !== $_POST['pass2'] ) {
				$this->error_msg = 'Не совпадают пароли';
				return false;
			}
			$buf = "UPDATE users SET lastname='".$_POST['lastname']."',firstname='".$_POST['firstname']."',middlename='".$_POST['middlename']."',address='".$_POST['address']."',phone='".$_POST['phone']."'";
			if( $_POST['pass1'] ) $buf .= ",pass=md5(md5('".$_POST['pass1']."'))";
			$buf .= " WHERE id=".$params['id'];
			$this->query( $buf );
			return true;
		}
	}
		
	public function delete( $params ) {
		$this->query( "DELETE FROM users WHERE id={$params['id']}" );
		return true;
	}
}

?>