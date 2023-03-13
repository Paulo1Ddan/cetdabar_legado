<?php if(!class_exists('Rain\Tpl')){exit;}?>    <div class="containerLogin">
        <div class="padraoSite">
            <div class="boxLogin">
                <h3 class="titleLogin">Login</h3>
                <form action="/cetdabar/login" method="post" class="loginForm">
                    <div class="imgLogin">
                        <img src="/cetdabar/res/site/assets/login/login-enter-svgrepo-com.svg" alt="">
                    </div>
                    <div class="containerInput">
                        <div class="inputLogin">
                            <label>E-mail</label>
                            <input type="text" name="login">
                        </div>
                        <div class="inputLogin">
                            <label>Senha</label>
                            <input type="password" name="pass">
                        </div>
                        <p><a href="/cetdabar/login/forgot">Esqueci minha senha</a></p>
                        <button btn-bg-color="secondary" type="submit" class="btnLogin">Login</button>
                    </div>
                </form>
            </div>
        </div>
    </div>