;(function ($, window) {
    //Ensure that global variables exist
    var GAZDA = window.GAZDA = window.GAZDA || {};

    GAZDA.utils = {
        capitalizeStr: function (str) {
            if (str && str.length > 0) {
                return str.charAt(0).toUpperCase() + str.slice(1);
            }
            else
                return str;
        },

        getNameFromEmail: function (email) {
            var emailParts = email.split('@');
            var name = emailParts[0].replace('.', ' ');
            return name.split(' ').map(function (s) { return GAZDA.utils.capitalizeStr(s) }).join(' ');
        }
    };


    GAZDA.client = {
        getCookie: function (name) {
            var matches = document.cookie.match(new RegExp(
                "(?:^|; )" + name.replace(/([\.$?*|{}\(\)\[\]\\\/\+^])/g, '\\$1') + "=([^;]*)"
            ));
            return matches ? decodeURIComponent(matches[1]) : null;
        },

        sendGAPageView: function (path) {
            ga('send', 'pageview', path);
        }
    };

    GAZDA.client.view = {
        clientAreaPrefix : "/account",

        processAnchorsCustomData: function() {
            $('a').click(function () {
                var gaPagePath = $(this).data('ga-page-path');
                if (gaPagePath) {
                    GAZDA.client.sendGAPageView(gaPagePath);
                }
            });
        },

        processAutofillFields: function () {
            var autofillFields = $('input[data-autofill]');

            autofillFields.blur(function () {
                var autoFillInputId = $(this).data('autofill');

                var srcValue = $(this).val();
                var autoFillInput = $('#' + autoFillInputId);
                var destValue = autoFillInput.val();
                if (srcValue && !destValue) {
                    //currently we update only contant name by email.
                    //If there will be other cases we will add something like `autofill-type` attribute
                    autoFillInput.val(GAZDA.utils.getNameFromEmail(srcValue));                    
                }
            });
        },
        
        applyConfirmButtons: function () {
            $('.confirm').confirm({
                title: 'Confirmation required',
                confirmButton: 'Yes I am',
                cancelButton: 'No',
                post: true
            });
        },

        addSubscribeButtonHandlers: function (options) {
            var options = options || {};
            options.endpoint = options.endpoint || '/api/gazda/channels/{channel}/subscribe';
            options.tokenCookieName = options.tokenCookieName || 'gazda.vst';

            var subscribeButtons = $('.gazda-subscribe-button');
            if (subscribeButtons.length == 0) return;

            var renderAlert = function (type, text) {
                var alertPanel = $('.gazda-subscribe-alert');
                if (type == 'none') {
                    alertPanel.html('');
                }
                else {
                    alertPanel.html(`
                                <div class="alert alert-${type} alert-dismissible">
                                    <button aria-label="Close" class="close" data-dismiss="alert" type="button"><span aria-hidden="true">×</span></button>
                                    ${text}
                                </div>
                            `);
                }
            };

            var hasValidEmail = function() {
                var emailInput = $('.gazda-subscribe-email');
                return emailInput.val().match(/.+?\@.+/g) != null;
            }

            var updateSubscribeButton = function () {
                var consentCheckbox = $('.gazda-subscribe-consent');
                var subscribeButton = $('.gazda-subscribe-button');

                if (consentCheckbox[0].checked && hasValidEmail()) {
                    subscribeButton.removeClass("disabled");
                    renderAlert('none');
                }
                else {
                    subscribeButton.addClass("disabled");
                }
            };

            subscribeButtons.addClass('disabled');

            $('.gazda-subscribe-consent').change(function () {
                updateSubscribeButton();
            });

            $('.gazda-subscribe-email').on('input', function () {
                updateSubscribeButton();
            });

            subscribeButtons.click(function () {
                var channelId = $(this).data('gazda-subscribe-channel');
                if ($(this).hasClass("disabled")) {
                    renderAlert('info', 'Please enter correct e-mail and check the consent checkbox');
                }
                else {
                    renderAlert('info', 'Sending request...');

                    var url = options.endpoint.replace('{channel}', channelId);
                    var email = $('.gazda-subscribe-email').val();
                    var name = $('.gazda-subscribe-name').val();
                    var token = GAZDA.client.getCookie(options.tokenCookieName);

                    var subscrReq = $.post(
                        url,
                        JSON.stringify({
                            'email': email,
                            'name': name || null,
                            'token': token
                        }),
                        function (data) {
                            if (options.success) {
                                options.success();
                            }
                            renderAlert('success', 'You have successfully subscribed! Please check your mailbox for the confirmation.');
                        }
                    )
                    .fail(function (data) {
                        if (data.status < 500) {
                            renderAlert('danger', data.responseJSON.message);
                        }
                        else {
                            renderAlert('danger', 'Server error');
                        }
                    })
                }
            });
        }
    };

})(jQuery, window);