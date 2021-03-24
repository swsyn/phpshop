<?php
	require_once ROOT . DS . APP_DIR . DS . 'cpanel' . DS . 'views' . DS . 'header.php';
	require_once ROOT . DS . APP_DIR . DS . 'cpanel' . DS . 'views' . DS . 'sidebar.php';
?>
						<td height="600px">
							<h2>Добавление категории</h2>
							<form method="post">
							<div>Название категории*</div>
							<input type="text" name="title" style="width: 50%;" autocomplete="off">
							<div>Описание категории</div>
							<div><textarea name="descr" style="width: 90%; height: 200px; resize: none;"></textarea></div>
							<div>Родительская категория</div>
							<select name="parent">
								<option selected>Нет</option>
								<?php
									foreach( $catlist as $id => $title ) {
										echo '<option>',$title,'</option>';
									}
								?>
							</select>
							<div>Короткое название латиницей*</div>
							<input type="text" name="uri" style="width: 50%;" autocomplete="off">
                            <div><b>* Поля, помеченные звездочкой обязательны к заполнению</b></div>
							<div style="color: #FF0000; font-weight: bold;"><?php echo $cats->error_msg; ?></div>
							<div><input type="reset" value="Очистить поля">
							<input type="submit" name="add" value="Добавить"></div>
							</form>
						</td>
					</tr>
				</table>
			</td>
		</tr>
<?php
	require_once ROOT . DS . APP_DIR . DS . 'cpanel' . DS . 'views' . DS . 'footer.php';
?>