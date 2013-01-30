<?php
/**
 * The default template for displaying content. Used for both single and index/archive/search.
 *
 * @package WordPress
 * @subpackage Twenty_Twelve
 * @since Twenty Twelve 1.0
 */
?>

	<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
		<?php if ( is_sticky() && is_home() && ! is_paged() ) : ?>
		<div class="featured-post">
			<?php _e( 'Featured post', 'twentytwelve' ); ?>
		</div>
		<?php endif; ?>
		<header class="entry-header">
			<?php the_post_thumbnail(); ?>
			<?php if ( is_single() ) : ?>
			<h1 class="entry-title"><?php the_title(); ?></h1>
			<?php else : ?>
			<h1 class="entry-title">
				<a href="<?php the_permalink(); ?>" title="<?php echo esc_attr( sprintf( __( 'Permalink to %s', 'twentytwelve' ), the_title_attribute( 'echo=0' ) ) ); ?>" rel="bookmark"><?php the_title(); ?></a>
			</h1>
			<?php endif; // is_single() ?>
			<?php if ( comments_open() ) : ?>
				<div class="comments-link">
					<?php comments_popup_link( '<span class="leave-reply">' . __( 'Leave a reply', 'twentytwelve' ) . '</span>', __( '1 Reply', 'twentytwelve' ), __( '% Replies', 'twentytwelve' ) ); ?>
				</div><!-- .comments-link -->
			<?php endif; // comments_open() ?>
		</header><!-- .entry-header -->
		<?php if ( is_search() ) : // Only display Excerpts for Search ?>
		
		<div class="entry-summary">
			<?php the_excerpt(); ?>

		</div><!-- .entry-summary -->
		<?php else : ?>
		<div class="entry-content">
		
			<?php the_content( __( 'Continue reading <span class="meta-nav">&rarr;</span>', 'twentytwelve' ) ); ?>
			<?php wp_link_pages( array( 'before' => '<div class="page-links">' . __( 'Pages:', 'twentytwelve' ), 'after' => '</div>' ) ); ?>
			<div class="champs-persos">
				<?php

					$realisateur = get_post_meta($post->ID, 'Réalisateur', true);
					$natio = get_post_meta($post->ID, 'Nationalité', true);
					$annee = get_post_meta($post->ID, 'Année', true);

					$version = get_post_meta($post->ID, 'Version', true);
					$genre= get_post_meta($post->ID, 'genre',true);
					$acteurs = get_post_meta($post->ID, 'Interprètes', true);
					
				?>
				<?php if(false === empty($realisateur)): ?>
				<span class="champs-persos-item">
					<i class="champs-persos-label">Réalisateur(s) : </i>
					<?php echo $realisateur ?><br/>
				</span>
				<?php endif; ?>
				<?php if(false === empty($natio)): ?>
				<span class="champs-persos-item">
					<i class="champs-persos-label">Nationalité : </i>
					<?php echo $natio ?><br/>
				</span>
				<?php endif; ?>
				<?php if(false === empty($annee)): ?>
				<span class="champs-persos-item">
					<i class="champs-persos-label">Année : </i>
					<?php echo $annee ?><br/>
				</span>
				<?php endif; ?>
				<?php if(false === empty($version)): ?>
				<span class="champs-persos-item">
					<i class="champs-persos-label">Version : </i>
					<?php echo $version ?><br/>
				</span>
				<?php endif; ?>
				<?php if(false === empty($genre)): ?>
				<span class="champs-persos-item">
					<i class="champs-persos-label">Genre : </i>
					<?php echo $genre ?><br/>
				</span>
				<?php endif; ?>
				<?php if(false === empty($acteurs)): ?>
				<span class="champs-persos-item">
					<i class="champs-persos-label">Acteur(s) : </i>
					<?php echo $acteurs ?><br/>
				</span>
				<?php endif; ?>
			</div> <!-- .champs-perso -->
		</div><!-- .entry-content -->
		<?php endif; ?>

		<footer class="entry-meta">
			<?php twentytwelve_entry_meta(); ?>
			<?php edit_post_link( __( 'Edit', 'twentytwelve' ), '<span class="edit-link">', '</span>' ); ?>
			<?php if ( is_singular() && get_the_author_meta( 'description' ) && is_multi_author() ) : // If a user has filled out their description and this is a multi-author blog, show a bio on their entries. ?>
				<div class="author-info">
					<div class="author-avatar">
						<?php echo get_avatar( get_the_author_meta( 'user_email' ), apply_filters( 'twentytwelve_author_bio_avatar_size', 68 ) ); ?>
					</div><!-- .author-avatar -->
					<div class="author-description">
						<h2><?php printf( __( 'About %s', 'twentytwelve' ), get_the_author() ); ?></h2>
						<p><?php the_author_meta( 'description' ); ?></p>
						<div class="author-link">
							<a href="<?php echo esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ); ?>" rel="author">
								<?php printf( __( 'View all posts by %s <span class="meta-nav">&rarr;</span>', 'twentytwelve' ), get_the_author() ); ?>
							</a>
						</div><!-- .author-link	-->
					</div><!-- .author-description -->
				</div><!-- .author-info -->
			<?php endif; ?>
		</footer><!-- .entry-meta -->
	</article><!-- #post -->
