<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    <header>
        <h1 class="entry-title">
            <?php the_title(); ?>
        </h1>
        <?php if (is_single()) : ?>
            <p class="entry-meta">
                Opublikowano: <time datetime="<?php echo get_the_date(); ?>"><?php the_time(); ?>,</time>
                autor: <?php the_author_link(); ?>
                <?php if (comments_open()) : ?>
                    &bull; <?php comments_popup_link('Brak komentarzy', '1 komentarz', 'komentarzy: %'); ?>
                <?php endif;
                if (is_singular('post')) :
                    ?>
                    <br>kategorie: <?php the_category(', '); ?>
                <?php the_tags(' Tagi: ', ', ', ''); ?>
                </p>
                <?php endif;
        endif; ?>
    </header>
<?php the_content(); ?>
</article> 