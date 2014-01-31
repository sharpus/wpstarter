<?php
/**
 * The main template file.
 *
 * This is the most generic template file in a WordPress theme and one of the
 * two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * For example, it puts together the home page when no home.php file exists.
 *
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package WordPress
 * @subpackage HDStarter
 * @since HDStarter 1.0
 */
get_header();
?>
<div id="main-container" class="clearfix">
    <section id="content-container">
        <?php if (is_search()) : ?>
            <header class="page-header">
                <h1 class="page-title">Szukana fraza: <span><?php the_search_query(); ?></span></h1>
            </header>
        <?php endif; ?>          
        <?php
        if (have_posts()) : while (have_posts()) : the_post();
                get_template_part('content', get_post_format());
                if (is_singular()) {
                    comments_template('', true);
                }
            endwhile;
        else :
            ?>
            <article id="post-0" class="post no-results not-found">
                <header>
                    <h2 class="entry-title">Nic nie znaleziono</h2>
                </header>
                <p>Nic tu nie ma, sorry</p>
                <?php get_search_form(); ?>
            </article>
        <?php endif; ?>
    </section>

    <?php get_sidebar(); ?>
</div>

<?php get_footer(); ?>
