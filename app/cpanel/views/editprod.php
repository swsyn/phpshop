<?php
	require_once ROOT . DS . APP_DIR . DS . 'cpanel' . DS . 'views' . DS . 'header.php';
	require_once ROOT . DS . APP_DIR . DS . 'cpanel' . DS . 'views' . DS . 'sidebar.php';
?>
						<td height="600px">
							<h2>Редактирование товара</h2>
							<form enctype="multipart/form-data" method="post">
							<div>Название товара*</div>
							<input type="text" name="title" value="<?php echo $product['title']; ?>" style="width: 50%;" autocomplete="off">
							<div>Описание товара</div>
							<textarea name="descr" style="width: 90%; height: 200px; resize: none;"><?php echo $product['description']; ?></textarea>
							<div>Категория</div>
							<div>
								<select name="cat">
									<?php
										foreach( $catlist as $id => $title ) {
											if( $catlist[$product['category']] != $title ) echo '<option>',$title,'</option>';
											else echo '<option selected>',$title,'</option>';
										}
									?>
								</select>
							</div>
							<input type="hidden" name="MAX_FILE_SIZE" value="5000000">
                            <div>Новое изображение товара</div>
                            <input name="img" type="file">
                            <div>Цена</div>
							<input type="text" name="price" value="<?php echo $product['price']; ?>" style="width: 20%;" autocomplete="off">
                            <div><b>* Поля, помеченные звездочкой не должны быть пустыми</b></div>
							<div style="color: #FF0000; font-weight: bold;"><?php echo $prods->error_msg; ?></div>
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