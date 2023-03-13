<?php if(!class_exists('Rain\Tpl')){exit;}?>
    <!-- Banner -->
    <section class="banner">
        <img src="/cetdabar/res/site/assets/banner/banner1.jpg" alt="">
        <img src="/cetdabar/res/site/assets/banner/banner2.jpg" alt="">
        <img src="/cetdabar/res/site/assets/banner/banner3.jpg" alt="">
        <img src="/cetdabar/res/site/assets/banner/banner4.jpg" alt="">
    </section>
    <!-- Cursos -->
    <section class="cursos">
        <div class="padraoSite">
            <h3 class="tituloCursos">Cursos</h3>
            <div class="containerCursos">
                <?php $counter1=-1;  if( isset($cursos) && ( is_array($cursos) || $cursos instanceof Traversable ) && sizeof($cursos) ) foreach( $cursos as $key1 => $value1 ){ $counter1++; ?>
                    <div class="curso" data-aos="fade-up" data-aos-duration="2000">
                        <div class="imgCurso">
                            <img src="/cetdabar/res/site/<?php echo htmlspecialchars( $value1["imgcurso"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" alt="">
                        </div>
                        <div class="descCurso">
                            <div class="txtCurso">
                                <h3>
                                    <?php echo htmlspecialchars( $value1["nomecurso"], ENT_COMPAT, 'UTF-8', FALSE ); ?>
                                </h3>
                                <p>
                                    <?php echo $value1["desccurso"]; ?>
                                </p>
                            </div>
                            <a href="/cetdabar/cursos/<?php echo htmlspecialchars( $value1["idcurso"], ENT_COMPAT, 'UTF-8', FALSE ); ?>"><button btn-bg-color="secondary" class="btnCurso">Conferir</button></a>
                        </div>
                    </div>
                <?php } ?>
            </div>
        </div>
    </section>
    <!-- Contato -->
    <div class="contato">
        <div class="padraoSite" data-aos="fade-down" data-aos-duration="2000">
            <h3 class="tituloContato">Contato</h3>
            <p class="txtForm">Entre em contato para dúvidas ou efetuar a matrícula</p>
            <form action="" method="POST" class="formContato">
                <div class="inputs">
                    <div class="formInput">
                        <input type="text" name="nome" required id="" placeholder="Nome">
                    </div>
                    <div class="formInput">
                        <input type="email" name="email" required id="" placeholder="Email">
                    </div>
                    <div class="formInput">
                        <input type="tel" name="telefone" id="" placeholder="Telefone">
                    </div>
                </div>
                <div class="boxMensagem">
                    <div class="formTextarea">
                        <textarea name="mensagem" id="" cols="30" rows="10" placeholder="Mensagem"></textarea>
                    </div>
                    <div class="formBtn">
                        <button class="btnEnviar" name="enviarContato" btn-bg-color="secondary"
                            type="submit">Enviar</button>
                    </div>
                </div>
            </form>
            <p class="txtForm">
                Ou
            </p>
            <div class="socialContato">
                <div class="socialContato">
                    <a href="https://www.facebook.com/CETDABAR" target="_blank" class="contatoFacebook">
                        <i class="fa-brands fa-facebook-f"></i> Facebook
                    </a>
                    <a href="https://api.whatsapp.com/send?phone=5511930546947&text=Olá, gostaria de saber mais sobre a Dabar"
                        target="_blank" class="contatoWhatsapp">
                        <i class="fa-brands fa-whatsapp"></i> Whatsapp
                    </a>
                    <a href="https://www.instagram.com/fabio.dabar/" target="_blank" class="contatoInstagram">
                        <i class="fa-brands fa-instagram"></i> Instagram
                    </a>
                </div>
            </div>
        </div>
    </div>
    <!-- Sobre -->
    <section class="sobre">
        <div class="padraoSite" data-aos="fade-down" data-aos-duration="2000">
            <h3 class="tituloSobre">Sobre a Dabar</h3>
            <div class="containerSobre">
                <div class="imgSobre">
                    <img src="/cetdabar/res/site/assets/sobre/sobre.jpg" alt="">
                </div>
                <?php $counter1=-1;  if( isset($sobre) && ( is_array($sobre) || $sobre instanceof Traversable ) && sizeof($sobre) ) foreach( $sobre as $key1 => $value1 ){ $counter1++; ?>
                <div class="txtSobre">
                    <?php echo $value1["sobre"]; ?>
                </div>
                <?php } ?>
                <div class="btnSobre">
                    <button onclick="getLink(this, 'sobre')" btn-bg-color="secondary">Veja mais</button>
                </div>
            </div>
        </div>
    </section>