<?php
	require_once ROOT . DS . APP_DIR . DS . 'cpanel' . DS . 'views' . DS . 'header.php';
	require_once ROOT . DS . APP_DIR . DS . 'cpanel' . DS . 'views' . DS . 'sidebar.php';
?>
						<td height="600px">
							<h2>Добавление товара</h2>
							<form enctype="multipart/form-data" method="post">
							<div>Название товара*</div>
							<input type="text" name="title" style="width: 50%;" autocomplete="off">
							<div>Описание товара</div>
							<textarea name="descr" style="width: 90%; height: 200px; resize: none;"></textarea>
							<div>Категория</div>
							<div>
								<select name="cat">
									<?php
										foreach( $catlist as $id => $title ) {
											echo '<option>',$title,'</option>';
										}
									?>
								</select>
							</div>
							<input type="hidden" name="MAX_FILE_SIZE" value="5000000">
                            <div>Изображение товара</div>
                            <input name="img" type="file">
                            <div>Цена</div>
							<input type="text" name="price" style="width: 20%;" autocomplete="off">
                            <div><b>* Поля, помеченные звездочкой обязательны к заполнению</b></div>
							<div style="color: #FF0000; font-weight: bold;"><?php echo $prods->error_msg; ?></div>
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