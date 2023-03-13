<?php if(!class_exists('Rain\Tpl')){exit;}?>    <section class="containerArtigo padraoSite">
        <div class="imgBanner">
            <img src="/cetdabar/res/site/assets/blog/banner/<?php echo htmlspecialchars( $artigo["imgbanner"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" alt="">
        </div>
        <article class="artigo">
            <h3><?php echo htmlspecialchars( $artigo["tituloartigo"], ENT_COMPAT, 'UTF-8', FALSE ); ?></h3>

            <p><?php echo $artigo["artigo"]; ?></p>
        </article>
    </section>