(function ($) {

    function closeIconPicker($picker) {
        var $menu = $picker.data('icon-menu');

        if ($menu && $menu.length) {
            $menu.removeClass('is-floating').removeAttr('style').appendTo($picker);
            $picker.removeData('icon-menu');
        }

        $picker.removeClass('is-open').find('.acf-bootstrap-icon-toggle').attr('aria-expanded', 'false');
    }


    $(document).on('click', '.acf-bootstrap-icon-toggle', function () {
        var $picker = $(this).closest('.acf-bootstrap-icon-picker');
        var isOpen = $picker.hasClass('is-open');

        $('.acf-bootstrap-icon-picker.is-open').each(function () {
            closeIconPicker($(this));
        });

        if (isOpen) {
            return;
        }

        var $menu = $picker.find('.acf-bootstrap-icon-menu');
        var toggleRect = this.getBoundingClientRect();

        $menu.data('picker', $picker);
        $picker.data('icon-menu', $menu);
        $menu.appendTo('body').addClass('is-floating').css({
            left: toggleRect.left + 'px',
            top: toggleRect.bottom + 3 + 'px',
            width: toggleRect.width + 'px'
        });
        $picker.addClass('is-open');
        $(this).attr('aria-expanded', 'true');
        $menu.find('.acf-bootstrap-icon-search').val('').trigger('input').focus();
    });

    $(document).on('input', '.acf-bootstrap-icon-search', function () {
        var searchTerm = $.trim($(this).val()).toLowerCase();
        var $menu = $(this).closest('.acf-bootstrap-icon-menu');

        $menu.find('.acf-bootstrap-icon-option').each(function () {
            var $option = $(this);
            var iconName = String($option.data('icon') || '').toLowerCase();

            $option.toggle(!searchTerm || iconName.indexOf(searchTerm) !== -1);
        });
    });

    $(document).on('click', '.acf-bootstrap-icon-option', function () {
        var $option = $(this);
        var $menu = $option.closest('.acf-bootstrap-icon-menu');
        var $picker = $menu.data('picker');

        if (!$picker || !$picker.length) {
            return;
        }

        var icon = $option.data('icon') || '';
        var label = $option.text();
        var iconMarkup = icon ? '<i class="bi bi-' + icon + '" aria-hidden="true"></i>' : '';

        $picker.find('select.acf-bootstrap-icon').val(icon).trigger('change');
        $picker.find('.acf-bootstrap-icon-label').html(iconMarkup + $('<span>').text(label).prop('outerHTML'));
        $picker.find('.acf-bootstrap-icon-option').removeClass('is-selected');
        $option.addClass('is-selected');
        closeIconPicker($picker);
    });

    $(document).on('click', function (event) {
        if (!$(event.target).closest('.acf-bootstrap-icon-picker, .acf-bootstrap-icon-menu').length) {
            $('.acf-bootstrap-icon-picker.is-open').each(function () {
                closeIconPicker($(this));
            });
        }
    });

    $(window).on('resize scroll', function () {
        $('.acf-bootstrap-icon-picker.is-open').each(function () {
            var $picker = $(this);
            var $menu = $picker.data('icon-menu');
            var toggle = $picker.find('.acf-bootstrap-icon-toggle')[0];

            if ($menu && $menu.length && toggle) {
                var toggleRect = toggle.getBoundingClientRect();
                $menu.css({
                    left: toggleRect.left + 'px',
                    top: toggleRect.bottom + 3 + 'px',
                    width: toggleRect.width + 'px'
                });
            }
        });
    });

    $('.acf-bootstrap-icon-menu').each(function () {
        $(this).data('picker', $(this).closest('.acf-bootstrap-icon-picker'));
    });


})(jQuery);

