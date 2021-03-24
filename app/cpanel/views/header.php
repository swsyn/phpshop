<!DOCTYPE html>
<html>
    <head>
        <title>Панель управления сайтом</title>
        <link rel="stylesheet" href="<?php echo Settings::$BASE_URL; ?>/app/cpanel/views/style.css">
        <script src="https://cdn.tiny.cloud/1/no-api-key/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
        <script>tinymce.init({selector:'textarea'});</script>
    </head>
    <body>
        <table width="100%">
            <tr>
                <td>
                    <table width="100%">
                        <tr valign="bottom">
                            <td><h1><a href="<?php echo Settings::$BASE_URL;?>/cpanel/">Панель управления</a></h1></td>
                            <td width="200px" align="right"><a href="<?php echo Settings::$BASE_URL;?>/" target="_blank" class="green">Просмотр сайта</a> | <a href="<?php echo Settings::$BASE_URL;?>/cpanel/main/logout/">Выход</a></td>
                        </tr>
                    </table>
                </td>
            </tr>