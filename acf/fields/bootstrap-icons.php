<?php

if (!defined('ABSPATH')) {
    exit;
}


class ACF_Field_Bootstrap_Icons extends acf_field
{

    public function __construct()
    {
        $this->name = 'bootstrap_icons';
        $this->label = 'Bootstrap Icons';
        $this->category = 'choice';

        parent::__construct();
    }


    public function input_admin_enqueue_scripts()
    {

        wp_enqueue_style(
            'bootstrap-icons',
            get_template_directory_uri() . '/assets/vendor/bootstrap-icons/bootstrap-icons.min.css'
        );

        wp_add_inline_style('bootstrap-icons', '
            .acf-bootstrap-icon-picker { position: relative; max-width: 100%; }
            .acf-bootstrap-icon-toggle { align-items: center; background: #fff; border: 1px solid #8c8f94; border-radius: 3px; cursor: pointer; display: flex; font-size: 14px; justify-content: space-between; min-height: 40px; padding: 6px 10px; text-align: left; width: 100%; }
            .acf-bootstrap-icon-label { align-items: center; display: flex; gap: 8px; }
            .acf-bootstrap-icon-label i, .acf-bootstrap-icon-option i { font-size: 18px; width: 20px; }
            .acf-bootstrap-icon-menu { background: #fff; border: 1px solid #8c8f94; box-shadow: 0 4px 12px rgba(0, 0, 0, .16); display: none; direction: ltr; grid-template-columns: repeat(auto-fill, minmax(150px, 1fr)); left: 0; max-height: 360px; overflow-y: auto; padding: 6px; position: absolute; right: 0; top: calc(100% + 3px); z-index: 100000; }
            .acf-bootstrap-icon-picker.is-open .acf-bootstrap-icon-menu { display: grid; }
            .acf-bootstrap-icon-menu.is-floating { display: grid; position: fixed; right: auto; top: auto; }
            .acf-bootstrap-icon-search { background: #fff; border: 1px solid #8c8f94; grid-column: 1 / -1; margin: 0 0 6px; padding: 7px 9px; width: 100%; }
            .acf-bootstrap-icon-option { align-items: center; background: #fff; border: 0; border-radius: 3px; cursor: pointer; direction: ltr; display: flex; gap: 8px; min-height: 36px; overflow: hidden; padding: 7px 9px; text-align: left; width: 100%; }
            .acf-bootstrap-icon-option i { flex: 0 0 20px; text-align: center; }
            .acf-bootstrap-icon-option { color: #1d2327; font-size: 13px; white-space: nowrap; }
            .acf-bootstrap-icon-option:hover, .acf-bootstrap-icon-option.is-selected { background: #f0f6fc; }
            @media (max-width: 600px) { .acf-bootstrap-icon-menu { grid-template-columns: repeat(2, minmax(120px, 1fr)); } }
        ');


        wp_enqueue_script(
            'bootstrap-icons-picker',
            get_template_directory_uri() . '/acf/fields/bootstrap-icon.js',
            ['jquery'],
            '1.2',
            true
        );
    }


    function render_field($field)
    {
        $path = get_template_directory() . '/assets/vendor/bootstrap-icons/bootstrap-icons.json';
        $json = json_decode(file_get_contents($path), true);

        $icons = array_keys($json);
        $selected_icon = (string) $field['value'];
        $selected_label = $selected_icon ?: 'Select icon';

        echo '<div class="acf-bootstrap-icon-picker">';
        echo '<button type="button" class="acf-bootstrap-icon-toggle" aria-expanded="false">';
        echo '<span class="acf-bootstrap-icon-label">';
        if ($selected_icon) {
            echo '<i class="bi bi-' . esc_attr($selected_icon) . '" aria-hidden="true"></i>';
        }
        echo esc_html($selected_label) . '</span><span aria-hidden="true">&#9662;</span></button>';
        echo '<div class="acf-bootstrap-icon-menu" role="listbox">';
        echo '<input type="search" class="acf-bootstrap-icon-search" placeholder="Search icons" aria-label="Search icons">';

        echo '<button type="button" class="acf-bootstrap-icon-option" data-icon="">Select icon</button>';

        foreach ($icons as $icon) {
            $selected = selected($selected_icon, $icon, false) ? ' is-selected' : '';
            echo '<button type="button" class="acf-bootstrap-icon-option' . $selected . '" data-icon="' . esc_attr($icon) . '">';
            echo '<i class="bi bi-' . esc_attr($icon) . '" aria-hidden="true"></i>' . esc_html($icon);
            echo '</button>';
        }

        echo '</div><select class="acf-bootstrap-icon" name="' . esc_attr($field['name']) . '" hidden aria-hidden="true">';
        echo '<option value="">Select icon</option>';
        foreach ($icons as $icon) {
            echo '<option value="' . esc_attr($icon) . '" ' . selected($selected_icon, $icon, false) . '>' . esc_html($icon) . '</option>';
        }
        echo '</select></div>';
    }
}


new ACF_Field_Bootstrap_Icons();
