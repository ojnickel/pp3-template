<?php
/**
 * @package     Joomla.Site
 * @subpackage  mod_articles_category
 *
 * @copyright   Copyright (C) 2005 - 2015 Open Source Matters, Inc. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 * Webwerk: Anpassung für Insel
 */

defined( '_JEXEC' ) or die;
?>
<?php if ( count( $list ) >= 1 ) : ?>
	<section class="blog_aktuelles">
		<div class="items-leading">
<?php foreach ( $list as $item ) : ?>
	<article>
		<?php
		// 2. Argument ist die Kategorie-ID.
		$link = JRoute::_( ContentHelperRoute::getArticleRoute( $item->slug, 387, $item->language ) );
		echo '<a href="' . $link . '" data-id="' . $item->catid . '">';

		preg_match( '/<h4>(.*)<\/h4>/i', $item->introtext, $matches );
		if ( array_key_exists( 1, $matches ) ) {
			$headline = strip_tags( preg_replace( '/<br\W*?\/>/', ' ', $matches[1] ) );

			echo '<h3>' . $headline . '</h3>';
		}

		preg_match( '/(<img[^>]+>)/i', $item->introtext, $matches );
		if ( array_key_exists( 1, $matches ) ) {
			echo $matches[1];
		}

		echo '<p>';

		preg_match( '/<div class="presse_datum">(.+?)<\/div>/i', $item->introtext, $matches );
		if ( array_key_exists( 1, $matches ) ) {
			echo strip_tags( preg_replace( '/<br\W*?\/>/', ' ', $matches[1] ) );
		}

		preg_match( '/<div class="presse_teaser">(.+?)<\/div>/i', $item->introtext, $matches );
		if ( array_key_exists( 1, $matches ) ) {
			echo ' – ' . strip_tags( preg_replace( '/<br\W*?\/>/', ' ', $matches[1] ) );
		}

		echo '</p></a>';
		?>
	</article>
<?php endforeach; ?>
</div>
</section>
<?php endif; ?>
