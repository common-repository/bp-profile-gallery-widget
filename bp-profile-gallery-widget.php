<?php

/* Hooks & Filters */

add_action( 'widgets_init', 'slush_bpprofilegallerywidget_fn' );

/***** BP Profile Gallery Widget *****/

/* Creates the widget itself */

class Slushman_bpprofilegallery_Widget extends WP_Widget {

	function Slushman_bpprofilegallery_Widget() {
		$widget_ops = array( 'classname' => 'slushman-bpprofilegallery-widget', 'description' => __( 'BP Profile Gallery Widget', 'slushman-bpprofilegallery-widget' ) );
		$this->WP_Widget( 'bpprofilegallery_widget', __( 'BP Profile Gallery Widget' ), $widget_ops );
	}
	
	function widget( $args, $instance ) {
		extract( $args );
		
		echo $before_widget;
		
		$title = empty( $instance['title'] ) ? '' : apply_filters( 'widget_title', $instance['title'] );
		if ( !empty( $title ) ) { echo $before_title . $title . $after_title; };
		
		do_action( 'bp_before_sidebar_me' ); ?>
		<div id="sidebar-me"><?php
						
		$width = $instance['width'];
		$height = $instance['height'];
		$description = xprofile_get_field_data( 'Gallery Description' );
		
		$flickrsetID = xprofile_get_field_data( 'Flickr Set ID' );
		$flickrusername = xprofile_get_field_data( 'Flickr Username' );
		$picasaalbumID = xprofile_get_field_data( 'Picasa Album ID' );
		$picasausername = xprofile_get_field_data( 'Picasa Username' );
		$photobucketRSS = xprofile_get_field_data( 'Photobucket RSS URL' );
		$photobucketalbumURL = xprofile_get_field_data( 'Photobucket Album URL' );		
		
		
		if ( isset( $flickrsetID ) && !empty( $flickrsetID ) && isset( $flickrusername ) && !empty( $flickrusername ) ) : ?>
			
			<object type="application/x-shockwave-flash" data="http://www.flickr.com/apps/slideshow/show.swf?v=61927" height="<?php echo $height; ?>" width="<?php echo $width; ?>">
				<param name="flashvars" value="&amp;offsite=true&amp;intl_lang=en-us&amp;page_show_url=%2Fphotos%2F<?php echo $flickrusername; ?>%2Fsets%2F<?php echo $flickrsetID; ?>%2Fshow%2F&amp;page_show_back_url=%2Fphotos%2F<?php echo $flickrusername; ?>%2Fsets%2F<?php echo $flickrsetID; ?>%2F&amp;set_id=<?php echo $flickrsetID; ?>&amp;jump_to=" />
				<param name="movie" value="http://www.flickr.com/apps/slideshow/show.swf?v=61927" />
				<param name="bgcolor" value="#000000" />
				<param name="allowFullScreen" value="true" />
			</object>
			
		<?php elseif ( isset( $picasaalbumID ) && !empty( $picasaalbumID ) && isset( $picasausername ) && !empty( $picasausername ) ) : ?>
			
			<embed type="application/x-shockwave-flash" src="https://picasaweb.google.com/s/c/bin/slideshow.swf" width="<?php echo $width; ?>" height="<?php echo $height; ?>" flashvars="host=picasaweb.google.com&hl=en_US&feat=flashalbum&RGB=0x000000&feed=https%3A%2F%2Fpicasaweb.google.com%2Fdata%2Ffeed%2Fapi%2Fuser%2F<?php echo $picasausername; ?>%2Falbumid%2F<?php echo $picasaalbumID; ?>%3Falt%3Drss%26kind%3Dphoto%26hl%3Den_US" pluginspage="http://www.macromedia.com/go/getflashplayer">
			</embed>
			
		<?php elseif (isset( $photobucketRSS ) && !empty( $photobucketRSS ) && isset( $photobucketalbumURL ) && !empty( $photobucketalbumURL ) ) : ?>
			
			<div style="width:<?php echo $width; ?>px;text-align:right;">
				<embed width="<?php echo $width; ?>" height="<?php echo $height; ?>" src="http://static.pbsrc.com/flash/rss_slideshow.swf" flashvars="rssFeed=<?php echo $photobucketRSS; ?>" type="application/x-shockwave-flash" wmode="transparent" />
				<a href="http://photobucket.com/redirect/album?showShareLB=1" target="_blank"><img src="http://pic.pbsrc.com/share/icons/embed/btn_geturs.gif" style="border:none;" /></a>
				<a href="<?php echo $photobucketalbumURL; ?>" target="_blank"><img src="http://pic.pbsrc.com/share/icons/embed/btn_viewall.gif" style="border:none;" /></a>
			</div>
							
		<?php else : ?>
		
			<p>This user has not activated their photo gallery.</p>
		
		<?php endif; ?>
			
			<br /><br />
			<?php if (isset( $description ) && !empty( $description ) ) :
				echo $description;
			endif;
			do_action( 'bp_sidebar_me' ); ?>
			</div>
			<?php do_action( 'bp_after_sidebar_me' );
		
		echo $after_widget;
	}
	
	/* Updates the widget */
	
	function update( $new_instance, $old_instance ) {
		$instance = $old_instance;
		$instance['title'] = strip_tags( $new_instance['title'] );
		$instance['width'] = strip_tags( $new_instance['width'] );
		$instance['height'] = strip_tags( $new_instance['height'] );
		return $instance;
	}
	
	/* Creates the widget options form */
	
	function form( $instance ) {
		$defaults = array( 'title' => 'BuddyPress' );
		$instance = wp_parse_args( ( array )$instance, array( 'title','width','height' ) );
		$title = esc_attr( $instance['title'] );
		$width = esc_attr( $instance['width'] );
		$height = esc_attr( $instance['height'] );
		?>
			<p><label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e( 'Title' ); ?>: <input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo $title; ?>" /></label></p>
			
			<p><label for="<?php echo $this->get_field_id( 'width' ); ?>"><?php _e( 'Width' ); ?>: <input class="widefat" id="<?php echo $this->get_field_id( 'width' ); ?>" name="<?php echo $this->get_field_name( 'width' ); ?>" type="text" value="<?php echo $width; ?>" /></label></p>
			
			<p><label for="<?php echo $this->get_field_id( 'height' ); ?>"><?php _e( 'Height' ); ?>: <input class="widefat" id="<?php echo $this->get_field_id( 'height' ); ?>" name="<?php echo $this->get_field_name( 'height' ); ?>" type="text" value="<?php echo $height; ?>" /></label></p>
		<?php
	}

}

function slush_bpprofilegallerywidget_fn() {

	register_widget( 'Slushman_bpprofilegallery_Widget' );
	
}

?>