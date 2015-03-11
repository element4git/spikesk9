<?php
// Add term page
function infinite_taxonomy_add_new_meta_field() {
	// this will add the custom meta field to the add new term page
	?>
	<div class="form-field">
		<label for="term_meta[category_icon]"><?php _e( 'Icon', 'INFINITE_LANGUAGE' ); ?></label>
		<input type="text" name="term_meta[category_icon]" id="term_meta[category_icon]" value="">
		<p class="description"><?php _e( 'Enter an icon for category. This icons are used for example in Portfolio filter.','INFINITE_LANGUAGE' ); ?></p>
	</div>
<?php
}
add_action( 'project-category_add_form_fields', 'infinite_taxonomy_add_new_meta_field', 10, 2 );


// Edit term page
function infinite_taxonomy_edit_meta_field($term) {
 
	// put the term ID into a variable
	$t_id = $term->term_id;
 
	// retrieve the existing value(s) for this meta field. This returns an array
	$term_meta = get_option( "taxonomy_$t_id" ); ?>
	<tr class="form-field">
	<th scope="row" valign="top"><label for="term_meta[category_icon]"><?php _e( 'Icon', 'INFINITE_LANGUAGE' ); ?></label></th>
		<td>
			<input type="text" name="term_meta[category_icon]" id="term_meta[category_icon]" value="<?php echo esc_attr( $term_meta['category_icon'] ) ? esc_attr( $term_meta['category_icon'] ) : ''; ?>">
			<p class="description"><?php _e( 'Enter an icon for category. This icons are used for example in Portfolio filter.','INFINITE_LANGUAGE' ); ?></p>
		</td>
	</tr>
<?php
}
add_action( 'project-category_edit_form_fields', 'infinite_taxonomy_edit_meta_field', 10, 2 );


// Save extra taxonomy fields callback function.
function save_taxonomy_custom_meta( $term_id ) {
	if ( isset( $_POST['term_meta'] ) ) {
		$t_id = $term_id;
		$term_meta = get_option( "taxonomy_$t_id" );
		$cat_keys = array_keys( $_POST['term_meta'] );
		foreach ( $cat_keys as $key ) {
			if ( isset ( $_POST['term_meta'][$key] ) ) {
				$term_meta[$key] = $_POST['term_meta'][$key];
			}
		}
		// Save the option array.
		update_option( "taxonomy_$t_id", $term_meta );
	}
}  
add_action( 'edited_project-category', 'save_taxonomy_custom_meta', 10, 2 );  
add_action( 'create_project-category', 'save_taxonomy_custom_meta', 10, 2 );