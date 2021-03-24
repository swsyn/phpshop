<?php
	require_once ROOT . DS . APP_DIR . DS . 'cpanel' . DS . 'views' . DS . 'header.php';
	require_once ROOT . DS . APP_DIR . DS . 'cpanel' . DS . 'views' . DS . 'sidebar.php';
?>
						<td height="600px">
							<h2>Список заказов</h2>
							<div><a href="<?php echo Settings::$BASE_URL; ?>/cpanel/order/showall/">Все</a> (<?php echo $orders->num_all_orders; ?>)</div>
							<div>
							<form method="post" name="form" id="form">
							<table border="1" width="100%">
								<tr style="font-weight: bold;">
									<td width="20px" align="center"></td>
                                    <td width="70px">№</td>
									<td width="10%">Дата заказа</td>
                                    <td width="20%">Товар</td>
                                    <td width="10%">Телефон</td>
									<td width="10%">E-mail</td>
                                    <td width="10%">Имя</td>
									<td width="30%">Адрес</td>
								</tr>
								<?php
									$c = count($orderlist);
									$k = 1;
									for ($i = 0; $i < $c; ++$i, ++$k) {	
										echo '<tr><td align="center"><input type="checkbox" name="box[]" value="',$orderlist[$i]['id'],'"></td><td>',$orderlist[$i]['id'],' <a href="',Settings::$BASE_URL,'/cpanel/order/delete/',$orderlist[$i]['id'],'/" onclick="return confirm(\'Удалить товар безвозвратно?\');" style="color: red">Удалить</a></td><td>',$orderlist[$i]['post_date'],'</td>';
										echo '<td>',$prodlist[$orderlist[$i]['product']],'</td>';
										echo '<td>',$orderlist[$i]['phone'],'</td><td>',$orderlist[$i]['email'],'</td><td>',$orderlist[$i]['firstname'],'</td>';
                                        echo '<td>',$orderlist[$i]['address'],'</td></tr>';
									}
								?>								
							</table>
                            <div><input type="submit" name="delete" value="Удалить отмеченные" onclick="return confirm('Удалить выбранные заказы?');"></div>
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