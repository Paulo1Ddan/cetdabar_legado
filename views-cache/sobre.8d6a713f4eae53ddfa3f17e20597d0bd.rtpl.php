<?php if(!class_exists('Rain\Tpl')){exit;}?>    <section class="containerSobre">
        <div class="padraoSite">
            <div class="imgSobre">
                <img src="res/site/assets/sobre/sobre.jpg" alt="">
            </div>
            <?php $counter1=-1;  if( isset($sobre) && ( is_array($sobre) || $sobre instanceof Traversable ) && sizeof($sobre) ) foreach( $sobre as $key1 => $value1 ){ $counter1++; ?>
                <div class="txtSobre">
                    <h3 class="tituloSobre">CETDABAR - Centro Educacional de Teologia DABAR</h3>
                    <p><?php echo $value1["sobre"]; ?></p>
                </div>
                <div class="txtIdentidade">
                    <h3 class="tituloIdentidade">Identidade da Escola</h3>
                    <p><?php echo $value1["identidade"]; ?></p>
                </div>
                <div class="txtRequisitos">
                    <h3 class="tituloRequisitos">Sistema de Funcionamento da Escola</h3>
                    <p><?php echo $value1["requisitos"]; ?></p>
                </div>
                <div class="sobreAutor">
                    <h3 class="tituloSobreAutor">Sobre o Autor</h3>
                    <div class="containerAutor">
                        <div class="imgAutor">
                            <img src="res/site/assets/sobre/imgAutor.jpg" alt="">
                        </div>
                        <div class="txtAutor">
                            <p><?php echo $value1["sobreInstrutor"]; ?></p>
                        </div>
                    </div>
                </div>
            <?php } ?>
            <h3 class="tituloGaleria">Galeria</h3>
            <div class="galeria">
                <div class="imgGaleria">
                    <a href="res/site/assets/sobre/galeria/galeria1.jpg" data-lity><img src="res/site/assets/sobre/galeria/galeria1.jpg" alt=""></a>
                    <a href="res/site/assets/sobre/galeria/galeria2.jpg" data-lity><img src="res/site/assets/sobre/galeria/galeria2.jpg" alt=""></a>
                    <a href="res/site/assets/sobre/galeria/galeria3.jpg" data-lity><img src="res/site/assets/sobre/galeria/galeria3.jpg" alt=""></a>
                    <a href="res/site/assets/sobre/galeria/galeria4.jpg" data-lity><img src="res/site/assets/sobre/galeria/galeria4.jpg" alt=""></a>
                    <a href="res/site/assets/sobre/galeria/galeria5.jpg" data-lity><img src="res/site/assets/sobre/galeria/galeria5.jpg" alt=""></a>
                    <a href="res/site/assets/sobre/galeria/galeria6.jpg" data-lity><img src="res/site/assets/sobre/galeria/galeria6.jpg" alt=""></a>
                    <a href="res/site/assets/sobre/galeria/galeria7.jpg" data-lity><img src="res/site/assets/sobre/galeria/galeria7.jpg" alt=""></a>
                    <a href="res/site/assets/sobre/galeria/galeria8.jpg" data-lity><img src="res/site/assets/sobre/galeria/galeria8.jpg" alt=""></a>
                    <a href="res/site/assets/sobre/galeria/galeria9.jpg" data-lity><img src="res/site/assets/sobre/galeria/galeria9.jpg" alt=""></a>
                </div>
            </div>
        </div>
    </section>