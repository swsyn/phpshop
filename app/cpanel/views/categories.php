<?php
	require_once ROOT . DS . APP_DIR . DS . 'cpanel' . DS . 'views' . DS . 'header.php';
	require_once ROOT . DS . APP_DIR . DS . 'cpanel' . DS . 'views' . DS . 'sidebar.php';
?>
						<td height="600px">
							<h2>Список категорий записей</h2>
							<div><a href="<?php echo Settings::$BASE_URL;?>/cpanel/category/showall/">Все</a> (<?php echo $cats->num_all_cats; ?>)</div>
							<div>Одиночное удаление возможно только при отстутствии записей в категории</div>
							<div>
							<form method="post" name="form" id="form">
							<table border="1" width="80%">
								<tr style="font-weight: bold;">
									<td width="20px" align="center"></td>
									<td width="30px">№</td>
									<td width="50%">Название</td>
									<td width="40%">Родительская категория</td>
								</tr>
								<?php
									$c = count($categories);
									$k = 1;
									for ($i = 0; $i < $c; ++$i,++$k ) {	
										echo '<tr><td align="center"><input type="checkbox" name="box[]" value="',$categories[$i]['id'],'"></td><td>',$k,'</td><td><a href="',Settings::$BASE_URL,'/cpanel/category/edit/',$categories[$i]['id'],'/">',$categories[$i]['title'],'</a> <a href="',Settings::$BASE_URL,'/cpanel/category/delete/',$categories[$i]['id'],'/" onclick="return confirm(\'Удалить категорию безвозвратно?\');" style="color: red">Удалить</a></td>';
										if ($categories[$i]['parent'] != NULL) echo '<td><a href="',Settings::$BASE_URL,'/cpanel/category/edit/',$categories[$i]['parent'],'/">',$catlist[$categories[$i]['parent']],'</a></td></tr>';
										else echo '<td>Нет</td></tr>';
									}
								?>
							</table>
							<div><input type="submit" name="delete" value="Удалить отмеченные" onclick="return confirm('Удалить выбранные категории?');"></div>
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