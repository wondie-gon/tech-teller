<?php
/**
 * Template to customize category dropdown list
 *
 * 
 * @package Tech_Teller
 */
if ( ! class_exists( 'Tech_Teller_Category_Dropdown_Control' ) ) :
    class Tech_Teller_Category_Dropdown_Control extends WP_Customize_Control {

        public $type = 'dropdown-category';

        protected $cat_args = false;

        public function __construct($manager, $id, $cat_args = array()) {
      
          parent::__construct( $manager, $id, $cat_args );
        }

        protected function render_content() {
            ?>
                <label>
            <?php

                if ( ! empty( $this->label ) ) :
                    ?><span class="customize-control-title"><?php echo esc_html( $this->label ); ?></span><?php
                endif;

                if ( ! empty( $this->description ) ) :
                    ?><span class="description customize-control-description"><?php echo esc_html($this->description); ?></span><?php
                endif;


                $cat_args = wp_parse_args( $this->cat_args, array(
                    'taxonomy'          =>  'category',
                    'show_option_none'  =>  esc_html__('--Select Category--', 'tech-teller'),
                    'selected'          =>  $this->value(),
                    'show_option_all'   =>  '',
                    'orderby'           =>  'id',
                    'order'             =>  'ASC',
                    'show_count'        =>  0,
                    'hide_empty'        =>  1,
                    'name'              =>  'cat',
                    'id'                =>  'cat',
                    'child_of'          =>  0,
                    'exclude'           =>  '',
                    'hierarchical'      =>  1,
                    'depth'             =>  0,
                    'tab_index'         =>  0,
                    'hide_if_empty'     =>  false,
                    'option_none_value' =>  0,
                    'value_field'       =>  'term_id',
                ) );

                $cat_args['echo'] = false;

                $select_str = " selected='selected'";

                $selected_cat  = $cat_args['selected'];

                $cat_dropdown = wp_dropdown_categories( $cat_args );

                $cat_dropdown = str_replace( '<select', '<select ' . $this->get_link(), $cat_dropdown );
               

                if (intval($selected_cat) > 0) {

                    $cat_dropdown = str_replace( '<option value="' . $this->value() . '"', '<option value="' . $this->value() . '"' . $select_str, $cat_dropdown);

                }


                echo $cat_dropdown;

            ?>
                </label>

            <?php

        }
    }
endif;