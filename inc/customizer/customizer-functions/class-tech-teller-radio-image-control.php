<?php
/**
 * Template to customize radio button with images
 *
 * 
 * @package Tech_Teller
 *
 * @since 1.0.0
 *
 * @see WP_Customize_Control
 */

if ( ! class_exists( 'Tech_Teller_Radio_Image_Control' ) ) :
	class Tech_Teller_Radio_Image_Control extends WP_Customize_Control {

		/**
		 *
		 * @var string
		 */
		public $type = 'radio-image';

		/**
		 * Render content.
		 *
		 * @since 1.0.0
		 */
		public function render_content() {

			if ( empty( $this->choices ) ) {
				return;
			}

			$name = '_customize-radio-' . $this->id;

		?>
		<label>
			<?php if ( ! empty( $this->label ) ) : ?>
				<span class="customize-control-title"><?php echo esc_html( $this->label ); ?></span>
			<?php endif; ?>
			<?php if ( ! empty( $this->description ) ) : ?>
				<span class="description customize-control-description"><?php echo $this->description; ?></span>
			<?php endif; ?>

			<?php foreach ( $this->choices as $value => $label ) : ?>
				<label>
					<input type="radio" value="<?php echo esc_attr( $value ); ?>" <?php $this->link();
					checked( $this->value(), $value ); ?> class="np-radio-image" name="<?php echo esc_attr( $name ); ?>"/>
					<span><img src="<?php echo esc_url( $label ); ?>" alt="<?php echo esc_attr( $value ); ?>" /></span>
				</label>
			<?php endforeach; ?>
		</label>
	    <?php
		}
	}
endif;