<?php

class UserController {

	public function showall( $params ) {

		require ROOT . DS . APP_DIR . DS . 'cpanel' . DS . 'models' . DS . 'user.php';
		$users = new UserModel;
		$users->set_num_users( 'all' );
		$userlist = $users->get_users( $params );
		require ROOT . DS . APP_DIR . DS . 'cpanel' . DS . 'views' . DS . 'users.php';

	}
	
	public function add( $params ) {

		require ROOT . DS . APP_DIR . DS . 'cpanel' . DS . 'models' . DS . 'user.php';
		
		$users = new UserModel;
		if( $users->is_created() == false ) {
			require ROOT . DS . APP_DIR . DS . 'cpanel' . DS . 'views' . DS . 'adduser.php';
		}
		else { header( 'Location: '.Settings::$BASE_URL.'/cpanel/user/showall/' ); }

	}
	
	public function edit( $params ) {
		
		require ROOT . DS . APP_DIR . DS . 'cpanel' . DS . 'models' . DS . 'user.php';
		$users = new UserModel;
		if( $users->is_updated( $params ) == false ) {
			$user = $users->get_user( $params );
			require ROOT . DS . APP_DIR . DS . 'cpanel' . DS . 'views' . DS . 'edituser.php';
		}
		else { header( 'Location: '.Settings::$BASE_URL.'/cpanel/user/showall/' ); }
		
	}
	
	public function delete( $params ) {
		require ROOT . DS . APP_DIR . DS . 'cpanel' . DS . 'models' . DS . 'user.php';
		$user_model = new UserModel;
		$user_model->delete( $params );
		header( 'Location: '.Settings::$BASE_URL.'/cpanel/user/showall/' );
	}

}

?>