<?php
/**
 * Adds YouTube widget.
 */
class Youtube_Subs_Widget extends WP_Widget {

	/**
	 * Register widget with WordPress.
	 */
	function __construct() {
		parent::__construct(
			'youtubesubs_widget', // Base ID
			esc_html__( 'YouTube Subs', 'yts_domain' ), // Name
			array( 'description' => esc_html__( 'A Youtube Subs Widget', 'yts_domain' ), ) // Args
		);
	}

	/**
	 * Front-end display of widget.
	 *
	 * @see WP_Widget::widget()
	 *
	 * @param array $args     Widget arguments.
	 * @param array $instance Saved values from database.
	 */
	public function widget( $args, $instance ) {
        echo $args['before_widget']; // display before widget
        
		if ( ! empty( $instance['title'] ) ) {
			echo $args['before_title'] . apply_filters( 'widget_title', $instance['title'] ) . $args['after_title'];
        }
        
        // Widget content output
		echo '<div class="g-ytsubscribe" data-channel="'.$instance['channel'].'" data-layout="'.$instance['layout'].'" data-theme="'.$instance['theme'].'" data-count="'.$instance['count'].'"></div>';
		echo $args['after_widget']; // display after widget
	}

	/**
	 * Back-end widget form.
	 *
	 * @see WP_Widget::form()
	 *
	 * @param array $instance Previously saved values from database.
	 */
	public function form( $instance ) {
        $title = ! empty( $instance['title'] ) ? $instance['title'] : esc_html__( 'New title', 'yts_domain' );
        $channel = ! empty( $instance['channel'] ) ? $instance['channel'] : esc_html__( 'Vevo', 'yts_domain' );
        $layout = ! empty( $instance['layout'] ) ? $instance['layout'] : esc_html__( 'default', 'yts_domain' );
        $theme = ! empty( $instance['theme'] ) ? $instance['theme'] : esc_html__( 'light', 'yts_domain' );
        $count = ! empty( $instance['count'] ) ? $instance['count'] : esc_html__( 'default', 'yts_domain' );

		?>
        <!-- TITLE -->
		<p>
            <label for="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>">
                <?php esc_attr_e( 'Title:', 'yts_domain' ); ?>
            </label> 
            <input 
                class="widefat" 
                id="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>" 
                name="<?php echo esc_attr( $this->get_field_name( 'title' ) ); ?>" 
                type="text" 
                value="<?php echo esc_attr( $title ); 
            ?>">
		</p>
        <!-- CHANNEL -->
		<p>
            <label for="<?php echo esc_attr( $this->get_field_id( 'channel' ) ); ?>">
                <?php esc_attr_e( 'Channel:', 'yts_domain' ); ?>
            </label> 
            <input 
                class="widefat" 
                id="<?php echo esc_attr( $this->get_field_id( 'channel' ) ); ?>" 
                name="<?php echo esc_attr( $this->get_field_name( 'channel' ) ); ?>" 
                type="text" 
                value="<?php echo esc_attr( $channel ); 
            ?>">
		</p>
        <!-- LAYOUT -->
		<p>
            <label for="<?php echo esc_attr( $this->get_field_id( 'layout' ) ); ?>">
                <?php esc_attr_e( 'Layout:', 'yts_domain' ); ?>
            </label> 
            <select 
                class="widefat" 
                id="<?php echo esc_attr( $this->get_field_id( 'layout' ) ); ?>" 
                name="<?php echo esc_attr( $this->get_field_name( 'layout' ) ); ?>"> 
                <option value="default" <?php echo ($layout == 'default') ? 'selected': '';?>>
                    Default
                </option>
                <option value="full" <?php echo ($layout == 'full') ? 'selected': '';?>>
                    Full
                </option>
            </select>
		</p>
        <!-- THEME -->
		<p>
            <label for="<?php echo esc_attr( $this->get_field_id( 'theme' ) ); ?>">
                <?php esc_attr_e( 'Theme:', 'yts_domain' ); ?>
            </label> 
            <select 
                class="widefat" 
                id="<?php echo esc_attr( $this->get_field_id( 'theme' ) ); ?>" 
                name="<?php echo esc_attr( $this->get_field_name( 'theme' ) ); ?>"> 
                <option value="dark" <?php echo ($theme == 'dark') ? 'selected': '';?>>
                    Dark
                </option>
                <option value="light" <?php echo ($theme == 'light') ? 'selected': '';?>>
                    Light
                </option>
            </select>
		</p>
        <!-- COUNT -->
		<p>
            <label for="<?php echo esc_attr( $this->get_field_id( 'count' ) ); ?>">
                <?php esc_attr_e( 'Count:', 'yts_domain' ); ?>
            </label> 
            <select 
                class="widefat" 
                id="<?php echo esc_attr( $this->get_field_id( 'count' ) ); ?>" 
                name="<?php echo esc_attr( $this->get_field_name( 'count' ) ); ?>"> 
                <option value="default" <?php echo ($count == 'default') ? 'selected': '';?>>
                    Default
                </option>
                <option value="hidden" <?php echo ($count == 'hidden') ? 'selected': '';?>>
                    Hidden
                </option>
            </select>
		</p>
		<?php 
	}

	/**
	 * Sanitize widget form values as they are saved.
	 *
	 * @see WP_Widget::update()
	 *
	 * @param array $new_instance Values just sent to be saved.
	 * @param array $old_instance Previously saved values from database.
	 *
	 * @return array Updated safe values to be saved.
	 */
	public function update( $new_instance, $old_instance ) {
        $instance = array();
        
		$instance['title'] = ( ! empty( $new_instance['title'] ) ) ? sanitize_text_field( $new_instance['title'] ) : '';
		$instance['channel'] = ( ! empty( $new_instance['channel'] ) ) ? sanitize_text_field( $new_instance['channel'] ) : '';
		$instance['layout'] = ( ! empty( $new_instance['layout'] ) ) ? sanitize_text_field( $new_instance['layout'] ) : '';
		$instance['theme'] = ( ! empty( $new_instance['theme'] ) ) ? sanitize_text_field( $new_instance['theme'] ) : '';
		$instance['count'] = ( ! empty( $new_instance['count'] ) ) ? sanitize_text_field( $new_instance['count'] ) : '';

		return $instance;
	}

} // class Foo_Widget