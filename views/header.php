<header>
            <div class="headerup">
                <div class="headerup__logo">                
                    <img src="./img/logo.png" alt="">
                </div>
                <div class="headerup__usericons">
                    <div class="searchfield">
                        <input type="text" name="" id="searchData">
                        <button><img src="./img/static/search.svg" alt=""></button>
                    </div>
                    <img src="./img/static/search.svg" alt="" id="quicksearchshow" onclick="quickSearchShow()">
                    <a href="./cart.html"><img src="./img/static/bag.svg" alt=""></a>
                    <img src="./img/static/user.svg" alt="" onclick="modalWindowOpenClose()">
                </div>
            </div>
            <div class="header__cats">
                <p><a href="">Крепи</a></p>
                <p><a href="">Конвейеры</a></p>
                <p><a href="">Проходческие комбайны</a></p>
                <p><a href="">Очистные комбайны</a></p>
                <p><a href="">Электрооборудование</a></p>
                <p><a href="">Электротранспорт</a></p>
            </div>
        </header>
        <div id="openModal" class="modal-container">
            <div class="modal-dialog">
                <div class="uppericons">
                    <p onclick="modalWindowOpenClose()">X</p>
                </div>            
                <h4>Авторизация</h4>
                <div class="modal-dialog__datafield">
                    <input type="text" placeholder="Login" id="login">
                </div>
                <div class="modal-dialog__datafield">
                    <input type="password" placeholder="Password" id="password">
                </div>
                <div class="modal-dialog__datafield">
                    <a href="">Зарегистрироваться</a>
                    <button>LogIn</button>
                </div>                
            </div>
        </div>