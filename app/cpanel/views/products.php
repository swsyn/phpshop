<?php
	require_once ROOT . DS . APP_DIR . DS . 'cpanel' . DS . 'views' . DS . 'header.php';
	require_once ROOT . DS . APP_DIR . DS . 'cpanel' . DS . 'views' . DS . 'sidebar.php';
?>
						<td height="600px">
							<h2>Список товаров</h2>
							<div><a href="<?php echo Settings::$BASE_URL;?>/cpanel/product/showall/">Все</a> (<?php echo $prods->num_all_prods; ?>)</div>
							<div>
							<form method="post" name="form" id="form">
							<table border="1" width="100%">
								<tr style="font-weight: bold;">
									<td width="20px" align="center"></td>
									<td width="50px">№ п/п</td>
									<td width="50%">Название</td>
                                    <td width="10%">Цена</td>
									<td width="20%">Категория</td>
									<td width="120px">Добавлено</td>
								</tr>
								<?php
									$c = count($prodlist);
									$k = 1;
									for ($i = 0; $i < $c; ++$i, ++$k) {	
										echo '<tr><td align="center"><input type="checkbox" name="box[]" value="',$prodlist[$i]['id'],'"></td><td>',$k,'</td><td><a href="',Settings::$BASE_URL,'/cpanel/product/edit/',$prodlist[$i]['id'],'/" title="Редактировать">',$prodlist[$i]['title'],'</a> <a href="',Settings::$BASE_URL,'/cpanel/product/delete/',$prodlist[$i]['id'],'/" onclick="return confirm(\'Удалить товар безвозвратно?\');" style="color: red">Удалить</a></td><td>',$prodlist[$i]['price'],' &#8381;</td>';
										echo '<td>',$catlist[$prodlist[$i]['category']],'</td><td>',$prodlist[$i]['post_date'],'</td></tr>';
									}
								?>								
							</table>
							<div><input type="submit" name="delete" value="Удалить отмеченные" onclick="return confirm('Удалить выбранные товары?');"></div>
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