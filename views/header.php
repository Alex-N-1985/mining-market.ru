<header>
            <div class="headerup">
                <div class="headerup__logo">                
                    <img src="./img/logo.png" alt="">
                </div>
                <div class="headerup__usericons">
                    <div class="searchfield">
                        <input type="text" name="" id="searchData">
                        <button><img src="./img/search.svg" alt=""></button>
                    </div>
                    <img src="./img/search.svg" alt="" id="quicksearchshow" onclick="quickSearchShow()">
                    <a href="./cart.html"><img src="./img/bag.svg" alt=""></a>
                    <img src="./img/user.svg" alt="" onclick="modalWindowOpenClose()">
                </div>
            </div>
            <div class="header__cats">
                <p><a href="./goods.html">Крепи</a></p>
                <p><a href="./goods.html">Конвейеры</a></p>
                <p><a href="./goods.html">Проходческие комбайны</a></p>
                <p><a href="./goods.html">Очистные комбайны</a></p>
                <p><a href="./goods.html">Электрооборудование</a></p>
                <p><a href="./goods.html">Электротранспорт</a></p>
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
                    <a href="./signin.html">Зарегистрироваться</a>
                    <button>LogIn</button>
                </div>                
            </div>
        </div>