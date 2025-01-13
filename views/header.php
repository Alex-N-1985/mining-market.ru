        <header>
            <div class="headerup">
                <div class="headerup__logo">
                    <a href="http://<?=$rout->domain.$rout->start?>">
                        <img src='/img/static/logo.png' alt=''>
                    </a>
                </div>
                <div class="headerup__usericons">
                    <div class="searchfield">
                        <input type="text" name="" id="searchData">
                        <button><img src="/img/static/search.svg" alt=""></button>
                    </div>
                    <img src="/img/static/search.svg" alt="" id="quicksearchshow" onclick="quickSearchShow()">
                    <a href=""><img src="/img/static/bag.svg" alt=""></a>
                    <?php                         
                        if (!functions::isUserLogIn()){
                            echo "<img src='/img/static/user.svg' alt='' onclick='modalWindowOpenClose()'>";
                        } else {
                            if ($rout->class !== "user")
                                echo "<a href='http://".$rout->domain.$rout->start."/user/viewuser'><img src='/img/static/user.svg' alt='' style='border: 1px solid red; border-radius:50%'></a>";
                            else {
                                echo "<img src='/img/static/user.svg' alt=''>";
                            }
                        }                    
                    ?>
                    
                </div>
            </div>
            <div class="header__cats">
                <p><a href="http://<?=$rout->domain.$rout->start?>/products/index">Крепи</a></p>
                <p><a href="http://<?=$rout->domain.$rout->start?>/products/index">Конвейеры</a></p>
                <p><a href="http://<?=$rout->domain.$rout->start?>/products/index">Проходческие комбайны</a></p>
                <p><a href="http://<?=$rout->domain.$rout->start?>/products/index">Очистные комбайны</a></p>
                <p><a href="http://<?=$rout->domain.$rout->start?>/products/index">Электрооборудование</a></p>
                <p><a href="http://<?=$rout->domain.$rout->start?>/products/index">Электротранспорт</a></p>
            </div>
        </header>
        <div id="openModal" class="modal-container">
            <div class="modal-dialog">
                <div class="uppericons">
                    <p onclick="modalWindowOpenClose()">X</p>
                </div>            
                <h4>Авторизация</h4>
                <form method="post" action="http://<?=$rout->domain.$rout->start?>/auth/logIn">
                    <div class="modal-dialog__datafield">
                        <input type="text" placeholder="Login" name="login">
                    </div>
                    <div class="modal-dialog__datafield">
                        <input type="password" placeholder="Password" name="password">
                    </div>
                    <div class="modal-dialog__datafield">
                        <a href="http://<?=$rout->domain.$rout->start?>/auth/registration">Зарегистрироваться</a>
                        <input type="submit" title="LogIn" />
                    </div>
                </form>                
            </div>
        </div>