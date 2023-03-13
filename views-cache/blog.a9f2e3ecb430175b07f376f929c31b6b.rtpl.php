<?php if(!class_exists('Rain\Tpl')){exit;}?><section class="containerBlog padraoSite">
    <?php $counter1=-1;  if( isset($blog) && ( is_array($blog) || $blog instanceof Traversable ) && sizeof($blog) ) foreach( $blog as $key1 => $value1 ){ $counter1++; ?>
        <div class="blog">
            <div class="imgBlog">
                <img src="res/site/assets/blog/capa/<?php echo htmlspecialchars( $value1["imgcapa"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" alt="">
            </div>
            <div class="txtBlog">
                <h3>
                    <?php echo htmlspecialchars( $value1["tituloartigo"], ENT_COMPAT, 'UTF-8', FALSE ); ?>
                </h3>
                <p>
                    <?php echo $value1["artigo"]; ?>
                </p>
                <a href="/cetdabar/blog/<?php echo htmlspecialchars( $value1["idartigo"], ENT_COMPAT, 'UTF-8', FALSE ); ?>"><button class="btnTxtBlog" btn-bg-color="secondary">Ver mais</button></a>
            </div>
        </div>
    <?php } ?>
</section>