<p class="breadcrumbs"><a href="http://<?=$rout->domain.$rout->start?>">Главная</a> > Пользователь</p>
        <section class="userdata">
            <div class="userdata__avatar">
                <img src="./img/image-icon.png" alt="">
            </div>
            <div class="userdata__details">
                <h3>Пользователь <?= $usr->login ?></h3>
                <table>
                    
                    <tr><td colspan="2" class="userdata__details-avatar"><?php 
                        if ($usr->avatar == 0){
                            echo "<img src='/img/static/image-icon.png' alt=''/>";                        
                        } else {
                            echo "<img src='/img/".$img->uri.".".$img->extension."'>";
                        }
                        ?></td></tr>
                    <tr>
                        <td class="userdata__details-fieldname">Логин:</td>
                        <td class="userdata__details-fielddata"><?= $usr->login ?></td>
                    </tr>
                    <tr>
                        <td class="userdata__details-fieldname">@mail:</td>
                        <td class="userdata__details-fielddata"><?= $usr->email ?></td>
                    </tr>
                    <!-- <tr>
                        <td class="userdata__details-fieldname">Название:</td>
                        <td class="userdata__details-fielddata">ШахтОборудование</td>
                    </tr>
                    <tr>
                        <td class="userdata__details-fieldname">Адрес:</td>
                        <td class="userdata__details-fielddata">г. Москва</td>
                    </tr>
                    <tr>
                        <td class="userdata__details-fieldname">Телефон:</td>
                        <td class="userdata__details-fielddata">+79511862578</td>
                    </tr>
                    <tr>
                        <td class="userdata__details-fieldname">Вид клиента</td>
                        <td class="userdata__details-fielddata">Производитель</td>
                    </tr>                     -->
                </table>
                <div class="userdata__details-buttons">
                    <? if (functions::isUserAdmin()){
                        echo "<a href='http://".$rout->domain.$rout->start."/admin/index'>Админ-панель</a>";
                    } ?>
                    <a href="http://<?=$rout->domain.$rout->start?>/auth/logout">Выйти</a>
                    <a href="http://<?=$rout->domain.$rout->start?>/user/edituser/<?=$usr->ID?>">Редактирование</a>                    
                </div>
            </div>
        </section>