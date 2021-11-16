require(['jquery', 'domReady!'], function ($) {
    //https://gist.github.com/chrisjhoughton/7890303

    // wait still one element was load
    var waitForEl = function (selector, callback) {
        if (jQuery(selector).length) { //if element was load
            // run callback
            callback();
        } else {
            // repeat function after timeout
            setTimeout(function () {
                waitForEl(selector, callback);
            }, 100);
        }
    };

    var company_select = '[name="customer[company_type]"]';
    waitForEl(company_select, function () {
        // check to show/hide organization name at load
        if ($(company_select).val() == 4) {
            $('[data-index="organization_name"]').show();
        } else { 
            $('[data-index="organization_name"]').hide();
        }

        // check to show/hide organization_name when change company type
        $(company_select).change(function () {
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