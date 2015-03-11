/* =========================================================
 * params/all.js v0.0.1
 * =========================================================
 * Copyright 2012 Wpbakery
 *
 * Visual composer javascript functions to enable fields.
 * This script loads with settings form.
 * ========================================================= */

var wpb_change_tab_title, wpb_change_accordion_tab_title;

 !function($) {
    wpb_change_tab_title = function($element, field) {
        $('.tabs_controls a[href=#tab-' + $(field).val() +']').text($('.wpb-edit-form [name=title].wpb_vc_param_value').val());
    };
    wpb_change_accordion_tab_title = function($element, field) {
         var $section_title = $element.prev();
         $section_title.find('a').text($(field).val());
    };

    function init_textarea_html($element) {
        /*
         Simple version without all this buttons from Wordpress
         tinyMCE.init({
         mode : "textareas",
         theme: 'advanced',
         editor_selector: $element.attr('name') + '_tinymce'
         });
         */
        var textfield_id = $element.attr("id"),
            wpautop = false;
        $element.closest('.edit_form_line').find('.wp-switch-editor').removeAttr("onclick");

        $element.closest('.edit_form_line').find('.switch-tmce').click(function () {
            $element.closest('.edit_form_line').find('.wp-editor-wrap').removeClass('html-active').addClass('tmce-active');
            if(wpautop) {
                var val = window.switchEditors.wpautop($(this).closest('.edit_form_line').find("textarea.visual_composer_tinymce").val());
                $("textarea.visual_composer_tinymce").val(val);
            }
            // Add tinymce
            window.tinyMCE.execCommand("mceAddControl", true, textfield_id);
        });

        $element.closest('.edit_form_line').find('.switch-html').click(function () {
            $element.closest('.edit_form_line').find('.wp-editor-wrap').removeClass('tmce-active').addClass('html-active');
            window.tinyMCE.execCommand("mceRemoveControl", true, textfield_id);
        });

        $('#wpb_tinymce_content-html').trigger('click');
        $('#wpb_tinymce_content-tmce').trigger('click'); // Fix hidden toolbar
        wpautop = true;
    }
    $('.wpb-edit-form .textarea_html').each(function(){
        init_textarea_html($(this));
    });
	
	$('.vc-color-control').wpColorPicker();

    var InitGalleries = function() {
        var that = this;
        // TODO: Backbone style for view binding
        $('.gallery_widget_attached_images_list', this.$view).unbind('click.removeImage').on('click.removeImage', 'a.icon-remove', function(e){
            e.preventDefault();
            var $block = $(this).closest('.edit_form_line');
            $(this).parent().remove();
            var img_ids = new Array();
            $block.find('.added img').each(function () {
                img_ids.push($(this).attr("rel"));
            });
            $block.find('.gallery_widget_attached_images_ids').val(img_ids.join(',')).trigger('change');
        });
        $('.gallery_widget_attached_images_list').each(function (index) {
            var $img_ul = $(this);
            $img_ul.sortable({
                forcePlaceholderSize:true,
                placeholder:"widgets-placeholder-gallery",
                cursor:"move",
                items:"li",
                update:function () {
                    var img_ids = new Array();
                    $(this).find('.added img').each(function () {
                        img_ids.push($(this).attr("rel"));
                    });
                    $img_ul.closest('.edit_form_line').find('.gallery' +
                        '' +
                        '_widget_attached_images_ids').val(img_ids.join(',')).trigger('change'); 
                }
            });
        });
    };
    new InitGalleries();

}(window.jQuery);