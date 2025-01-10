            <p class="breadcrumbs"><a href="http://<?=$rout->domain.$rout->start?>">Главная</a> > Регистрация</p>            
            <section class="registration">
                <h2>Регистрация пользователя</h2>
                <form method="post" action="http://<?=$rout->domain.$rout->start?>/auth/registration">                
                    <div class="registration__cell"><input type="text" name="login" placeholder="login"></div>
                    <div class="registration__cell"><input type="password" name="passw" placeholder="password"></div>
                    <div class="registration__cell"><input type="password" name="confpas" placeholder="confirm password"></div>
                    <div class="registration__cell"><input type="email" name="email" placeholder="@mail"></div>
                    <div class="registration__cell-buttons"><button id="registration__cell-reset" onclick="regFieldsReset()">Reset</button>
                        <button id="registration__cell-signin" >SignIn</button>
                    </div>
                </form>                
            </section> 