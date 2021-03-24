<?php
	require_once ROOT . DS . APP_DIR . DS . 'cpanel' . DS . 'views' . DS . 'header.php';
	require_once ROOT . DS . APP_DIR . DS . 'cpanel' . DS . 'views' . DS . 'sidebar.php';
?>
						<td height="600px">
							<h2>Добавление пользователя</h2>
							<form method="post">
							<table border="0" style="font-size: 11px;">
							<tr>
							<td colspan="2"><div style="color: #FF0000; font-weight: bold;"><?php echo $users->error_msg; ?></div></td>
							</tr>
							<tr>
							<td align="right" valign="top"><b>Email*: </b></td>
							<td><input type="text" name="email" autocomplete="off"></td>
							</tr>
							<tr>
							<td align="right" valign="top"><b>Фамилия: </b></td>
							<td><input type="text" name="lastname"></td>
							</tr>
							<tr>
							<td align="right" valign="top"><b>Имя: </b></td>
							<td><input type="text" name="firstname"></td>
							</tr>
							<tr>
							<td align="right" valign="top"><b>Отчество: </b></td>
							<td><input type="text" name="middlename"></td>
							</tr>
							<tr>
							<td align="right" valign="top"><b>Адрес*: </b></td>
							<td><input type="text" name="address"></td>
							</tr>
							<tr>
							<td align="right" valign="top"><b>Телефон*: </b></td>
							<td><input type="text" name="phone"></td>
							</tr>
							<tr>
							<td align="right" valign="top"><b>Пароль*: </b></td>
							<td><input type="password" name="pass1"></td>
							</tr>
							<tr>
							<td align="right" valign="top"><b>Пароль еще раз*: </b></td>
							<td><input type="password" name="pass2"></td>
							</tr>
							<tr>
							<td valign="top" colspan="2"><br><b>* Поля, помеченные звездочкой обязательны к заполнению</b></td>
							</tr>
							<tr>
							<td align="right"><br><input type="reset" value="Очистить"></td>
							<td><br><input type="submit" name="add" value="Добавить"></td>
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