<?php
$args = array(
	'walker'            => null,
	'max_depth'         => '',
	'style'             => 'ul',
	'callback'          => 'show_comments',
	'end-callback'      => null,
	'type'              => 'comment',
	'reply_text'        => 'Antworten',
	'page'              => '',
	'per_page'          => '',
	'avatar_size'       => 32,
	'reverse_top_level' => null,
	'reverse_children'  => '',
	'format'            => 'html5', //or xhtml if no HTML5 theme support
	'short_ping'        => false // @since 3.6
); 


$comments = get_comments(
		array(
			'post_id' => get_the_ID(),
			'status' => 'approve',
			'type' => 'comment'
		));
$comments_count = count($comments);	

?>

<h2>
	<?php comments_number( 'Verfassen Sie den ersten Kommentar', 'Eine Reaktion', '% Reaktionen' ); ?>		
	(<?=$comments_count?> Kommentare)
</h2>
<ul class="comments">
	<?php wp_list_comments( $args );?>
</ul>
