<p class="breadcrumbs"><a href="http://<?=$rout->domain.$rout->start?>">Главная</a> >
    <a href="http://<?=$rout->domain.$rout->start?>/admin/index"> Админ панель</a> >
    <a href="http://<?=$rout->domain.$rout->start?>/admin/viewimages">Изображения</a> >
    Добавление изображение </p>
<h3>Добавить изображение</h3>
<form method="post" action="http://<?=$rout->domain.$rout->start?>/admin/inputimage">
    <table>
        <tr><td colspan="2"><img src="/<?php if (isset($newSFileName)){
                    echo $newSFileName;
                } else
                    echo "img/noimage.png";?>"><input type="hidden" name="imgType" value="<?=$imgType?>" readonly></td></tr>
        <tr>
            <td>URL: </td>
            <td><input type="text" name="inpUrl" value="<?php if (isset($url)) echo $url; ?>" readonly></td>
        </tr>
        <tr>
            <td>Расширение файла:</td>
            <td><input type="text" name="inpExt" value="<?php if (isset($ext)) echo $ext; ?>" readonly></td>
        </tr>
        <tr>
            <td>Наименование:</td>
            <td><input type="text" name="inpTitle" value="" style="width: 500px;"></td>
        </tr>
        <tr>
            <td></td>
            <td><input type="submit" value="Добавить" /></td>
        </tr>
    </table>
</form>