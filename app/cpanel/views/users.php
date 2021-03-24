<?php
	require_once ROOT . DS . APP_DIR . DS . 'cpanel' . DS . 'views' . DS . 'header.php';
	require_once ROOT . DS . APP_DIR . DS . 'cpanel' . DS . 'views' . DS . 'sidebar.php';
?>
						<td height="600px">
							<h2>Список пользователей сайта</h2>
							<div><a href="<?php echo Settings::$BASE_URL; ?>/cpanel/user/showall/">Все</a> (<?php echo $users->num_all_users; ?>)</div>
							<div>
							<form method="post" name="form" id="form">
							<table border="1" width="100%">
								<tr style="font-weight: bold;">
									<td width="50px">№</td>
									<td width="20%">E-mail</td>
									<td width="60%">Адрес</td>
									<td width="120px">Телефон</td>
								</tr>
								<?php
									$c = count($userlist);
									$k = 1;
									for( $i=0; $i<$c; ++$i,++$k ) {	
										if( $userlist[$i]['id'] != 1 ) echo '<tr><td>',$k,'</td><td><a href="',Settings::$BASE_URL,'/cpanel/user/edit/',$userlist[$i]['id'],'/">',$userlist[$i]['email'],'</a> <a href="',Settings::$BASE_URL,'/cpanel/user/delete/',$userlist[$i]['id'],'/" onclick="return confirm(\'Удалить пользователя безвозвратно?\');" style="color: red">Удалить</a>'; 
										else echo '<tr><td>',$k,'</td><td><a href="',Settings::$BASE_URL,'/cpanel/user/edit/',$userlist[$i]['id'],'/">',$userlist[$i]['email'],'</a>';
										echo'</td><td>',$userlist[$i]['address'],'</td>';
										echo '<td>',$userlist[$i]['phone'],'</td></tr>';
									}
								?>								
							</table>
							</form>
							</div>
						</td>
					</tr>
				</table>
			</td>
		</tr>
<?php
	require_once ROOT . DS . APP_DIR . DS . 'cpanel' . DS . 'views' . DS . 'footer.php';
?>