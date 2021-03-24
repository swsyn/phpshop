<?php
	require_once ROOT . DS . APP_DIR . DS . 'cpanel' . DS . 'views' . DS . 'header.php';
	require_once ROOT . DS . APP_DIR . DS . 'cpanel' . DS . 'views' . DS . 'sidebar.php';
?>
						<td height="600px">
							<h2>Редактирование информации о пользователе</h2>
							<form method="post">
							<table border="0" style="font-size: 11px;">
							<tr>
							<td colspan="2"><div style="color: #FF0000; font-weight: bold;"><?php echo $users->error_msg; ?></div></td>
							</tr>
							<tr>
							<td align="right" valign="top"><b>Email: </b></td>
							<td><?php echo $user['email']; ?></td>
							</tr>
							<tr>
							<td align="right" valign="top"><b>Фамилия: </b></td>
							<td><input type="text" name="lastname" value="<?php echo $user['lastname']; ?>"></td>
							</tr>
							<tr>
							<td align="right" valign="top"><b>Имя: </b></td>
							<td><input type="text" name="firstname" value="<?php echo $user['firstname']; ?>"></td>
							</tr>
							<tr>
							<td align="right" valign="top"><b>Отчество: </b></td>
							<td><input type="text" name="middlename" value="<?php echo $user['middlename']; ?>"></td>
							</tr>
							<tr>
							<td align="right" valign="top"><b>Адрес: </b></td>
							<td><input type="text" name="address" value="<?php echo $user['address']; ?>"></td>
							</tr>
							<tr>
							<td align="right" valign="top"><b>Телефон: </b></td>
							<td><input type="text" name="phone" value="<?php echo $user['phone']; ?>"></td>
							</tr>
							<tr>
							<td align="right" valign="top"><b>Новый пароль: </b></td>
							<td><input type="password" name="pass1"></td>
							</tr>
							<tr>
							<td align="right" valign="top"><b>Новый пароль еще раз: </b></td>
							<td><input type="password" name="pass2"></td>
							</tr>
							<tr>
							<td align="right"><br><input type="reset" value="Очистить"></td>
							<td><br><input type="submit" name="edit" value="Изменить"></td>
							</tr>
							</table>
							</form>
						</td>
					</tr>
				</table>
			</td>
		</tr>
<?php
	require_once ROOT . DS . APP_DIR . DS . 'cpanel' . DS . 'views' . DS . 'footer.php';
?>