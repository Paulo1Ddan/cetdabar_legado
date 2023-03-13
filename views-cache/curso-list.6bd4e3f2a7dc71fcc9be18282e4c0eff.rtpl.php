<?php if(!class_exists('Rain\Tpl')){exit;}?>    <section class="containerCurso padraoSite">
        <div class="imgCurso">
            <img src="/cetdabar/res/site/<?php echo htmlspecialchars( $curso["imgcurso"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" alt="">
        </div>
        <div class="txtCurso">
            <h3><?php echo htmlspecialchars( $curso["nomecurso"], ENT_COMPAT, 'UTF-8', FALSE ); ?></h3>
            <p class="descCurso">
                <?php echo $curso["desccurso"]; ?>
            </p>
            <p class="instrutorCurso">
                <span>Instrutor: </span><?php echo htmlspecialchars( $curso["instrutor"], ENT_COMPAT, 'UTF-8', FALSE ); ?>
            </p>
            <p class="duracaoCurso">
                <span>Duração do curso:</span> <?php echo htmlspecialchars( $curso["duracao"], ENT_COMPAT, 'UTF-8', FALSE ); ?>
            </p>
            <div class="matricula">
                <p class="txtMatricula">Para se matricular, entre em contato pelo <a class="whatsapp" href="https://api.whatsapp.com/send?phone=5511930546947&text=<?php echo htmlspecialchars( $curso["msgcurso"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" target="_blank">Whatsapp</a> ou <a class="facebook" href="https://www.facebook.com/CETDABAR" target="_blank">Facebook</a></p>
            </div>
        </div>
    </section>