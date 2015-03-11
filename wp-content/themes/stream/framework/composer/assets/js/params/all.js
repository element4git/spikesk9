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
        if($('#wp-link').parent().hasClass('wp-dialog')) $('#wp-link').wpdialog('destroy');
        var qt, textfield_id = $element.attr("id"),
            $form_line = $element.closest('.edit_form_line'),
            $content_holder = $form_line.find('textarea.visual_composer_tinymce'),
            content = $content_holder.val();

        window.tinyMCEPreInit.mceInit[textfield_id] = _.extend({}, tinyMCEPreInit.mceInit['content']);

        if(_.isUndefined(tinyMCEPreInit.qtInit[textfield_id])) {
            window.tinyMCEPreInit.qtInit[textfield_id] = _.extend({}, tinyMCEPreInit.qtInit['replycontent'], {id: textfield_id})
        }
        $element.val($content_holder.val());
        qt = quicktags( window.tinyMCEPreInit.qtInit[textfield_id] );
        QTags._buttonsInit();
        window.switchEditors.go(textfield_id, 'tmce');
        if(tinymce.majorVersion === "4") tinymce.execCommand( 'mceAddEditor', true, textfield_id );
        /// window.tinyMCE.get(textfield_id).focus();
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
            $block.find('.gallery_widget_attached_images_ids').val(img_ids.join(','));
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
                        '_widget_attached_images_ids').val(img_ids.join(','));
                }
            });
        });
    };
    new InitGalleries();

}(window.jQuery);