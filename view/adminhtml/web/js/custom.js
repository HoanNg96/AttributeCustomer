require(['jquery', 'domReady!'], function ($) {
    //https://gist.github.com/chrisjhoughton/7890303

    var waitForEl = function (company_select, callback) {
        if (jQuery(company_select).length) {
            callback();
        } else {
            setTimeout(function () {
                waitForEl(company_select, callback);
            }, 100);
        }
    };
    var company_select = '[name="customer[company_type]"]';
    waitForEl(company_select, function () {
        // show/hide when select other company
        if ($('[name="customer[company_type]"]').val() == 4)
            $('[data-index="organization_name"]').show();
        else $('[data-index="organization_name"]').hide();

        $('[name="customer[company_type]"]').change(function () {
            var data = $(this).val();
            if (data == 4) {
                $('[data-index="organization_name"]').show();
            } else {
                $('[data-index="organization_name"]').hide();
                $('[name="customer[organization_name]"]').val('');
            }
        });
    });
});