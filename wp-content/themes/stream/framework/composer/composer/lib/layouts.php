<?php
/**
 * WPBakery Visual Composer layout to display elements of administration iinterface
 *
 * @package WPBakeryVisualComposer
 *
 */

class WPBakeryVisualComposerLayoutButton implements WPBakeryVisualComposerTemplateInterface {
    protected $params = Array();

    public function setup($params) {
        if(empty($params['id']) || empty($params['title']))
            trigger_error( __("Wrong layout params", "INFINITE_LANGUAGE"));
        $this->params = (array)$params;
        return $this;
    }

    public function output($post = null) {
        if(empty($this->params)) return '';
        $output = '<li class="category-layout wpb-layout-element-button not-column-inherit_o"><a id="'.$this->params['id'].'" data-element="vc_column" data-width="'.$this->params['id'].'" class="'.$this->params['id'].' dropable_el clickable_action" href="#"><span>'.__($this->params['title'], "INFINITE_LANGUAGE").'</span></a></li>';
        return $output;
    }
}

class WPBakeryVisualComposerTemplateMenuButton implements WPBakeryVisualComposerTemplateInterface {
    protected $params = Array();
    protected $id;

    public function setID($id) {
        $this->id = (string)$id;
        return $this;
    }
    public function setup($params) {
        $this->params = (array)$params;
        return $this;
    }

    public function output($post = null) {
        if(empty($this->params)) return '';
        $output = '<li class="wpb_template_li"><a data-template_id="'.$this->id.'" href="#">'.__($this->params['name'], "INFINITE_LANGUAGE").'</a> <span class="wpb_remove_template" rel="'.$this->id.'"><i class="icon-cancel2"> </i> </span></li>';
        return $output;
    }
}

class WPBakeryVisualComposerElementButton implements WPBakeryVisualComposerTemplateInterface {
    protected $params = Array();
    protected $base;

    public function setBase($base) {
        $this->base = $base;
        return $this;
    }
    public function setup($params) {
        $this->params = $params;
        return $this;
    }
    protected function getIcon() {
        return !empty($this->params['icon']) ? '<i class="vc-element-icon dashicons ' . sanitize_title($this->params['icon']) . '"></i> ' : '';
    }
    public function output($post = null) {
        if(empty($this->params)) return '';
        $output = $class = $class_out = $data = '';
        if ( !empty($this->params["class"]) ) {
            $class_ar = $class_at_out = explode(" ", $this->params["class"]);
            for ($n=0; $n<count($class_ar); $n++) {
                $class_ar[$n] .= "_nav";
                $class_at_out[$n] .= "_o";
            }
            $class = ' ' . implode(" ", $class_ar);
            $class_out = ' '. implode(" ", $class_at_out);
        }
        if(isset($this->params['is_container']) && $this->params['is_container']===true) $data .= ' data-is-container="true"';
        $output .= '<li data-element="' . $this->base . '" class="category-'.$this->params['_category_id'].' wpb-layout-element-button'.$class_out.'"'.$data.'><a id="' . $this->base . '" class="dropable_el clickable_action'.$class.'" href="#">' . $this->getIcon() . __($this->params["name"], "INFINITE_LANGUAGE") .'</a></li>';
        return $output;
    }
}

class WPBakeryVisualComposerTemplateMenu implements WPBakeryVisualComposerTemplateInterface {
    protected $params = Array();

    public function setup($params) {
        $this->params = (array)$params;
        return $this;
    }

    public function output( $only_list = false ) {
        // if(empty($this->params)) return '';
        $output = '';
        if($only_list===false) {
            $output .=  '<li><ul>
                        <li id="wpb_save_template"><a href="#" id="wpb_save_template_button" class="wpb_add_new_element_custom">'.__('Save current page as a Template', 'INFINITE_LANGUAGE').'</a></li>
                        <li class="divider"></li>
                        <li class="nav-header">'.__('Load Template', 'INFINITE_LANGUAGE').'</li>
                        </ul></li>
                        <li>
                        <ul class="wpb_templates_list">';
        }
        $is_empty = true;
        foreach($this->params as $id => $template) {
            if( is_array( $template) ) {
                $template_button = new WPBakeryVisualComposerTemplateMenuButton();
                $output .= $template_button->setup($template)->setID($id)->output();
               $is_empty = false;
            }
        }
        if($is_empty) $output .= '<li class="wpb_no_templates"><span>'.__('No custom templates yet.', 'INFINITE_LANGUAGE').'</span></li>';
        if($only_list===false) {
            $output .= '</ul></li>';

        }
        return $output;
    }
}

class WPBakeryVisualComposerTemplate_r extends WPBakeryVisualComposerAbstract {

    protected $templates = Array();

    public function getMenu($only_list = false) {
        $template_menu = new WPBakeryVisualComposerTemplateMenu();
        return $template_menu->setup($this->getTemplatesList())->output($only_list);
    }
    protected function getTemplates() {
        if($this->templates==null)
            $this->templates = (array)get_option('wpb_js_templates');
        return $this->templates;
    }

    public function getTemplatesList() {
        return $this->getTemplates();
    }
}

class WPBakeryVisualComposerNavBar implements WPBakeryVisualComposerTemplateInterface {
    public function __construct() {

    }
    public function getColumnLayouts() {
        $output = '';
        foreach ( WPBMap::getLayouts() as $layout ) {
            $layout_button = new WPBakeryVisualComposerLayoutButton();
            $output .= $layout_button->setup($layout)->output();
        }
        return $output;
    }

    public function getContentCategoriesLayouts() {
        $output = '<li><ul class="isotope-filter"><li class="active"><a href="#" data-filter="*">'
                  .__('Show all', 'INFINITE_LANGUAGE').'</a></li>';
        // $output .= '<li><a href="#" data-filter=".category-layout" class="category-layout-filer">'
        //           .__('Layout', 'INFINITE_LANGUAGE').'</a></li>';
        $_other_category_index = 0;
        $show_other = false;
        foreach(WPBMap::getUserCategories() as $key => $name) {
            if($name === '_other_category_') {
                $_other_category_index  = $key;
                $show_other = true;
            } else {
                $output .='<li><a href="#" data-filter=".category-'.$key.'">'.__($name, "INFINITE_LANGUAGE").'</a></li>';
            }
        }

        if($show_other) $output .= '<li><a href="#" data-filter=".category-'.$_other_category_index.'">'
                                    .__('Other', 'INFINITE_LANGUAGE').'</a></li>';
        //$output .= '<li class="name_filter"><input id="vc_elements_name_filter" type="text" name="vc_content_filter" placeholder="'.__('Search by element name', 'INFINITE_LANGUAGE').'"/></li>';
        $output .= '</ul></li>';
        return $output;
    }

    public function getElementsModal() {
        $output = '<div class="wpb_bootstrap_modals">
        <script id="wpb-elements-list-modal-template" type="text/template">
        <div class="modal wpb-elements-list-modal elements_list_modal_custom">
          <div class="modal_header_elements_custom">
                <button type="button" class="btn_composer_close_custom btn_close_elements_custom btn btn-close" data-dismiss="modal" aria-hidden="true">Cancel</button>
                <h3 class="h3_header_elements_custom">Elements</h3>
				<input id="vc_elements_name_filter" type="text" name="vc_content_filter" placeholder="'.__('Search by element name', 'INFINITE_LANGUAGE').'"/>
          </div>
          <div class="modal-body wpb-elements-list elements_list_custom">
            <ul class="wpb-content-layouts-container" style="position: relative;">
                '.$this->getContentCategoriesLayouts().'
                '.$this->getContentLayouts().'
            </ul>
          </div>
          <!--<div class="modal-body wpb-edit-form modal_body_alt_custom">
            <div class="vc_row-fluid wpb-edit-form-inner">
            </div>
          </div>
          <div class="modal-body wpb-image-gallery">
          </div>-->
          <div class="modal-footer hide">
            <button class="btn" data-dismiss="modal" aria-hidden="true">'.__('Close','INFINITE_LANGUAGE').'</button>
          </div>
        </div>
        </script>
        <script id="wpb-element-settings-modal-template" type="text/template">
        <div class="modal wpb-element-edit-modal post_custom_css_modal">
            <div class="modal_header_custom">
					<button type="button" class="btn_composer_close_custom btn btn-close" data-dismiss="modal" aria-hidden="true">Close</button>
                <h3 class="h3_close_custom"></h3>
            </div>
            <div class="modal-body wpb-edit-form modal_body_alt_custom">
                <div class="vc_row-fluid wpb-edit-form-inner">
                    <div class="loader-modal-body" >'.__('Loading...', 'INFINITE_LANGUAGE').'</div>
                </div>
            </div>
            <div class="modal-footer text-center modal_footer_custom">
                <button class="btn btn-close btn_close_custom" data-dismiss="modal" aria-hidden="true">'.__('Cancel',"INFINITE_LANGUAGE").'</button>
                <button class="btn btn_save_custom wpb_save_edit_form" data-dismiss="modal" aria-hidden="true">'.__('Save',"INFINITE_LANGUAGE").'</button>
          </div>
        </div>
        </script>
		<script id="wpb-post-custom-css-modal-template" type="text/template">
            <div class="modal wpb-post-custom-css-modal post_custom_css_modal">
                <div class="modal_header_custom">
                    <button type="button" class="btn_composer_close_custom btn btn-close" data-dismiss="modal" aria-hidden="true">Close</button>
                    <h3 class="h3_close_custom">'.__('Custom CSS', "INFINITE_LANGUAGE").'</h3>
                </div>
                <div class="modal-body modal_body_custom">
                    <textarea class="wpb_custom_post_css_editor"></textarea>
                    <span class="description description_custom">'.__('Enter custom CSS code here. Your custom CSS will be outputted only on this particular page.', "INFINITE_LANGUAGE").'</span>
                </div>
                <div class="modal-footer text-center modal_footer_custom">
                    <button class="btn btn-close btn_close_custom" data-dismiss="modal" aria-hidden="true">'.__('Cancel',"INFINITE_LANGUAGE").'</button>
					<button class="btn btn_save_custom wpb_save_edit_form" data-dismiss="modal" aria-hidden="true">'.__('Save',"INFINITE_LANGUAGE").'</button>
                </div>
            </div>
        </script>
        </div>';

        return $output;
    }

    public function getContentLayouts() {

        $output = '<li class="container_elements_custom"><ul class="wpb-content-layouts content_layouts_custom">';
        // $output .= $this->getColumnLayouts();

        foreach (WPBMap::getUserShortCodes() as $sc_base => $el) {
            if(isset($el['content_element']) && $el['content_element'] === false) continue;
                $element_button = new WPBakeryVisualComposerElementButton();
                $output .= $element_button->setBase($sc_base)->setup($el) ->output();
        }
        $output .= '</ul></li>';
        return $output;
    }

    public function getTemplateMenu($only_list = false) {
        $template_r = new WPBakeryVisualComposerTemplate_r();
        return $template_r->getMenu($only_list);
    }


    public function output($post = null) {
        global $current_user;
        get_currentuserinfo();
        /** @var $settings - get use group access rules */
        $settings = WPBakeryVisualComposerSettings::get('groups_access_rules');
        $role = $current_user->roles[0];
        $show_role = isset($settings[$role]['show']) ? $settings[$role]['show'] : '';

        $output = '
            <div id="wpb_visual_composer-elements" class="vc_navbar">
                <input type="hidden" name="wpb_js_composer_group_access_show_rule" class="wpb_js_composer_group_access_show_rule" value="'.$show_role.'" />
                <div class="vc_navbar-inner clearfix">
                    <!--<div class="container">-->
                            <ul class="vc_nav">
                                <li>
                                    <a class="wpb_add_new_element_custom" id="wpb-add-new-element">'.__('Add element', 'INFINITE_LANGUAGE').'</a>
                                </li>
                            </ul>

                            <ul class="vc_nav">
                              <li>
                                <a class="wpb_add_new_row_custom" id="wpb-add-new-row" data-element="vc_row">'.__('Add Section', 'INFINITE_LANGUAGE').'</a>
                                </li>
                            </ul>
							
							<ul class="vc_nav">
                                <li class="vc_dropdown">
                                    <a class="wpb_add_new_row_custom">'.__('Templates', 'INFINITE_LANGUAGE').' <i class="icon-arrow-down72"></i></a>
                                    <ul class="vc_dropdown-menu wpb_templates_ul">
                                        '.$this->getTemplateMenu().'
                                    </ul>
                                </li>
                            </ul>

                            <ul class="vc_nav pull-right wpb-update-button">
                                <li><a class="wpb_update_button_custom" id="wpb-save-post">'.__('Update', 'INFINITE_LANGUAGE').'</a></li>
                            </ul>
							<ul class="vc_nav pull-right">
                        <li><a class="wpb_custom_post_css_custom" id="wpb-custom-post-css">'.__('CSS', "INFINITE_LANGUAGE").'</a></li>
                </ul>
                    <!--</div>-->
                </div>
            </div>';
        return $output;
    }
}

class WPBakeryVisualComposerLayout implements  WPBakeryVisualComposerTemplateInterface {
    protected $navBar;
    public function __construct() {

    }
    public function getNavBar() {
        if($this->navBar==null) $this->navBar = new WPBakeryVisualComposerNavBar();
        return $this->navBar;
    }

	public function getContainerHelper() {
		// return '<div class="container-helper">' . __('<h2>No content yet! You should add some...</h2>', 'INFINITE_LANGUAGE') . __("<p>Use the buttons under <a href='javascript:open_elements_dropdown();' class='open-dropdown-content-element'><i class='icon'></i> Content Elements</a> on the top or add <a href='#' class='add-text-block-to-content'><i class='icon'></i> Text block</a> with single click.", 'INFINITE_LANGUAGE') . '</p></div>';
        //return '<div class="container-helper"><span>' . __('<h2>No content yet! You should add some...</h2>', 'INFINITE_LANGUAGE') . __('<p>Click <a href="#" class="add-element-to-layout" title="Add to this column"><i class="icon"></i></a> to add new element inside this column.', 'INFINITE_LANGUAGE') . '</p></span></div>';
        return '';
    }

    public function output($post = null) {

        $output = $this->getNavBar()->getElementsModal();

        $output .= $this->getNavBar()->output();

        $output .= '
        <div class="metabox-composer-content">
					<div id="wpb-convert-message">
					   <div class="messagebox_text"><p>'.__('Your page layout was created with previous Visual Composer version. Before converting your layout to the new version, make sure to <a target="_blank" href="http://kb.wpbakery.com/index.php?title=Update_Visual_Composer_from_3.4_to_3.5">read this page</a>.', 'INFINITE_LANGUAGE').'</p>
					     <div class="wpb-convert-buttons">
					       <a class="wpb_convert button" id="wpb-convert"><i class="icon"></i>'.__('Convert to new version', 'INFINITE_LANGUAGE').'</a>
					     </div>
					 </div>
				</div>
				
				<div id="visual_composer_content" class="wpb_main_sortable main_wrapper"></div>
					<div id="wpb-empty-blocks">
					 <h2>' . __("No content yet! You should add some...", "INFINITE_LANGUAGE") .'</h2>
					 <table class="helper-block">
					   <tr>
					     <td><span>1</span></td>
					     <td><p> '. __("This is a visual preview of your page. Currently, you don't have any content elements. Click or drag the button <a href='#' class='add-element-to-layout'><i class='icon'></i> Add element</a> on the top to add content elements on your page. Alternatively add <a href='#' class='add-text-block-to-content' parent-container='#visual_composer_content'><i class='icon'></i> Text block</a> with single click.", "INFINITE_LANGUAGE") . '</p></td>
					   </tr>
					 </table>
					 <table class="helper-block">
					   <tr>
					     <td><span>2</span></td><td><p class="one-line"> '. __("Click the pencil icon on the content elements to change their properties.", "INFINITE_LANGUAGE") . '</p></td>
					   </tr>
					   <tr>
					     <td colspan="2">
					       <div class="edit-picture"></div>
					     </td>
					   </tr>
					 </table>
				  </div>
				</div>
				<div id="container-helper-block" style="display: none;">' . $this->getContainerHelper() . '</div>';
        ?>
        <script type="text/javascript">
            var vc_user_mapper = <?php echo json_encode(WPBMap::getUserShortCodes()) ?>,
                vc_mapper = <?php echo json_encode(WPBMap::getShortCodes()) ?>;
        </script>
        <?php

        $wpb_vc_status = get_post_meta($post->ID, '_wpb_vc_js_status', true);
        $wpb_post_custom_css =  get_post_meta($post->ID, '_wpb_post_custom_css', true);
        if ( $wpb_vc_status == "" || !isset($wpb_vc_status) ) {
            $wpb_vc_status = 'false';
        }
		$output .= '<input type="hidden" id="wpb_custom_post_css_field" name="wpb_vc_post_custom_css" value="'. htmlspecialchars($wpb_post_custom_css) .'" />';
        $output .= '<input type="hidden" id="wpb_vc_js_status" name="wpb_vc_js_status" value="'. $wpb_vc_status .'" />';
        $output .= '<input type="hidden" id="wpb_vc_loading" name="wpb_vc_loading" value="'. __("Loading, please wait...", "INFINITE_LANGUAGE") .'" />';
        $output .= '<input type="hidden" id="wpb_vc_loading_row" name="wpb_vc_loading_row" value="'. __("Crunching...", "INFINITE_LANGUAGE") .'" />';

        $output .= '<input type="hidden" id="wpb_vc_js_interface_version" name="wpb_vc_js_interface_version" value="'. vc_get_initerface_version() .'" />';
        echo $output;
        require_once WPBakeryVisualComposer::config('COMPOSER').'templates/media_editor.php';
    }
}
?>
