<?php

/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package UNDERSCORES
 */
?>
<h1 class="trace">Alex's front-page.php </h1>
<?php get_header(); ?>


<main class="site__main">
    <?php

    ?>
    <section class="liste">
    <?php
        echo "Resultat de recherche   -  ",  the_search_query(); 
		if ( have_posts() ) :
            while ( have_posts() ) :
				the_post(); ?>
                <!-- <article class="liste__cours"> -->
                    <h1><a href="<?php the_permalink(); ?>">
                    <?php the_title(); ?></a></h1>

                    <?php global $wp_query;
                        $total_results = $wp_query->found_posts;

                        echo wp_trim_words(get_the_excerpt(), 30, "  -  &#9755;");
                    // }
                    echo "<br>";
                    echo "-------------------------------------------------------------------------";
                    ?>
                <!-- </article> -->
            <?php endwhile; ?>
        <?php endif; ?>
        <h4> Nombre de resultat <?php echo $total_results?> </h4>
    </section>
</main>

<?php
get_footer();
?>
