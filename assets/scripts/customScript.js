jQuery(document).on('ready', function () {

    // Click on element with 'popup' class
    jQuery('.IUTIOpenPopUpListing').on('click', function () {

        var userID = jQuery(this).data('userid');
        var _this = this;
        jQuery(this).children('img').css('display', 'block');
        jQuery('<div id="IUTIOpenPopUpListingModal" class="IUTI-modal"></div>').appendTo('body')
            .load(ADMIN_AJAX.URL + '?action=IUTIOpenPopUpImportWizard&userID=' + userID, function () {
                jQuery(_this).children('img').css('display', 'none');
            }).show();
        return false;

    });

    jQuery('.iuti-notice-dismiss').click(function () {
        jQuery(this).parent('div').remove();
    });
});
jQuery('body').on('click', '.IUTICloseModalListing', function () {
    jQuery('#IUTIOpenPopUpListingModal').remove();
});

jQuery('body').on('submit', '#IUTIIContactImportForm', function (event) {
    event.preventDefault();
    jQuery('#IUTIIContactImportFormSubmit').attr('disabled', 'disabled').addClass('disabled');
    jQuery('#IUTILoaderImage').css('display', 'block');
    jQuery.ajax({
        data: {action: 'IUTITriggerIContactImport', formData: jQuery("#IUTIIContactImportForm").serialize()},
        type: 'POST',
        url: ADMIN_AJAX.URL,
        dataType: 'json',
        success: function (data) {
            jQuery('#IUTIIContactImportFormSubmit').removeAttr('disabled').removeClass('disabled');
            jQuery('#IUTIIContactImportForm').css('display', 'none');
            jQuery('#IUTIIContactImportFormDiv').html(data.msg).css('display', 'block');
            if (data.status === 'error') {
                jQuery('#IUTIIContactImportFormDiv').addClass('error');
            } else {
                jQuery('#IUTIIContactImportFormDiv').addClass('success');
            }
            setTimeout(function () {
                jQuery('#IUTIOpenPopUpListingModal').remove();
            }, 5000);
        },
        error: function (err) {
            jQuery('#IUTIIContactImportFormDiv').addClass('error');
            jQuery('#IUTIIContactImportFormDiv').html(err);
            jQuery('#IUTILoaderImage').css('display', 'none');
        }
    });
});