<?php
	require_once ROOT . DS . APP_DIR . DS . 'cpanel' . DS . 'views' . DS . 'header.php';
	require_once ROOT . DS . APP_DIR . DS . 'cpanel' . DS . 'views' . DS . 'sidebar.php';
?>
						<td height="600px">
							<h2>Редактирование страницы</h2>
							<form method="post">
							<div>Название страницы*</div>
							<input type="text" name="title" value="<?php echo $page['name']; ?>" style="width: 50%;" autocomplete="off">
							<div>Текст страницы</div>
							<div><textarea name="content" style="width: 90%; height: 200px; resize: none;"><?php echo $page['content']; ?></textarea></div>
							<div>Короткое название латиницей*</div>
							<input type="text" name="uri" value="<?php echo $page['uri']; ?>" style="width: 50%;" autocomplete="off">
                            <div><b>* Поля, помеченные звездочкой обязательны к заполнению</b></div>
							<div style="color: #FF0000; font-weight: bold;"><?php echo $pages->error_msg; ?></div>
							<div><input type="reset" value="Очистить поля">
							<input type="submit" name="edit" value="Изменить"></div>
							</form>
						</td>
					</tr>
				</table>
			</td>
		</tr>
<?php
	require_once ROOT . DS . APP_DIR . DS . 'cpanel' . DS . 'views' . DS . 'footer.php';
?>