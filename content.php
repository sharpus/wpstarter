<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    <header>
        <h2 class="entry-title">
            <a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>" rel="bookmark">
                <?php the_title(); ?>
            </a>
        </h2>
        <p class="entry-meta">
            Opublikowano: <time datetime="<?php echo get_the_date(); ?>"><?php the_time(); ?>,</time>
            autor: <?php the_author_link(); ?>
            <?php if (comments_open()) : ?>
                &bull; <?php comments_popup_link('Brak komentarzy', '1 komentarz', 'komentarzy: %'); ?>
            <?php endif; ?>
        </p>
    </header>
    <?php the_content(); ?>
</article> 