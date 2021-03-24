<?php
	require_once ROOT . DS . APP_DIR . DS . 'cpanel' . DS . 'views' . DS . 'header.php';
	require_once ROOT . DS . APP_DIR . DS . 'cpanel' . DS . 'views' . DS . 'sidebar.php';
	$c = count($pagelist);
?>
						<td height="600px">
							<h2>Список страниц на сайте</h2>
							<div><a href="<?php echo Settings::$BASE_URL;?>/cpanel/page/showall/">Все</a> (<?php echo $pages->num_all_pages; ?>)</div>
							<div>
							<form method="post" name="form" id="form">
							<table border="1" width="50%">
								<tr style="font-weight: bold;">
									<td width="10px" align="center"></td>
									<td width="50px">№ п/п</td>
									<td width="85%">Название</td>
								</tr>
								<?php
									$k = 1;
									for ($i = 0; $i < $c; ++$i, ++$k ) {	
										if ($pagelist[$i]['id'] != 1) echo '<tr><td align="center"><input type="checkbox" name="box[]" value="',$pagelist[$i]['id'],'"></td><td>',$k,'</td><td><a href="',Settings::$BASE_URL,'/cpanel/page/edit/',$pagelist[$i]['id'],'/">',$pagelist[$i]['name'],'</a> <a href="',Settings::$BASE_URL,'/cpanel/page/delete/',$pagelist[$i]['id'],'/" onclick="return confirm(\'Удалить страницу безвозвратно?\');" style="color: red">Удалить</a>';
										else echo '<tr><td align="center"></td><td>',$k,'</td><td><a href="',Settings::$BASE_URL,'/cpanel/page/edit/',$pagelist[$i]['id'],'/">',$pagelist[$i]['name'],'</a>';
										echo '</td></tr>';
									}
								?>
							</table>
							<div><input type="submit" name="delete" value="Удалить отмеченные" onclick="return confirm('Удалить выбранные страницы?');"></div>
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