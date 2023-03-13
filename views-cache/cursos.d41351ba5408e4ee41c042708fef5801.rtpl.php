<?php if(!class_exists('Rain\Tpl')){exit;}?>    <div class="containerCursos">
        <div class="padraoSite">
            <h3>Nossos cursos</h3>
            <?php $counter1=-1;  if( isset($cursos) && ( is_array($cursos) || $cursos instanceof Traversable ) && sizeof($cursos) ) foreach( $cursos as $key1 => $value1 ){ $counter1++; ?>
                <div class="curso">
                    <div class="imgCurso">
                        <img src="/cetdabar/res/site/<?php echo htmlspecialchars( $value1["imgcurso"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" alt="">
                    </div>
                    <div class="descCurso">
                        <div class="txtCurso">
                            <h3>
                                <?php echo htmlspecialchars( $value1["nomecurso"], ENT_COMPAT, 'UTF-8', FALSE ); ?>
                            </h3>
                            <article>
                                <?php echo $value1["desccurso"]; ?>
                            </article>
                        </div>
                        <a href="/cetdabar/cursos/<?php echo htmlspecialchars( $value1["idcurso"], ENT_COMPAT, 'UTF-8', FALSE ); ?>"><button btn-bg-color="secondary" class="btnCurso">Conferir</button></a>
                    </div>
                </div>
            <?php } ?>
        </div>
    </div>