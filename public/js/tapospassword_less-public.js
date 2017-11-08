AccountKit_OnInteractive = function(){
    AccountKit.init(
        {
            appId:"1952653494947783",
            state:randomString(20),
            version:"v1.0",
            fbAppEventsEnabled:true,
            redirect:"http://my-wp.dev/wp-admin/admin-ajax.php?action=tutexpFacebookDataFetch1"
        }
    );
};
function randomString(length) {
    return Math.round((Math.pow(36, length + 1) - Math.random() * Math.pow(36, length))).toString(36).slice(1);
}
(function ($) {
    'use strict';



    // initialize Account Kit with CSRF protection



    var mobileNumber = null;
    var countryCode = null;
    // login callback
    function loginCallback(response) {

        if (response.status === "PARTIALLY_AUTHENTICATED") {
            var code = response.code;
            var csrf = response.state;
            jQuery.ajax({
                url : tutexp_ajax.ajax_url,
                type : 'post',
                data : {
                    'action' : 'tutexpFacebookDataFetch',
                    'code' : code,
                    'csrf' : csrf,
                    'countryCode':countryCode,
                    'mobileNumber':mobileNumber
                },
                success : function( response ) {
                    console.log(response);
                   var  str = response.substring(0, response.length - 1);
                    window.location = str;
                }
            });

            // Send code to server to exchange for access token
        }
        else if (response.status === "NOT_AUTHENTICATED") {
            // handle authentication failure
        }
        else if (response.status === "BAD_PARAMS") {
            // handle bad parameters
        }
    }

    // phone form submission handler
    function smsLogin(countryCode,phoneNumber) {
       // debugger;
        AccountKit.login(
            'PHONE',
            {countryCode: countryCode, phoneNumber: phoneNumber}, // will use default values if not specified
            loginCallback
        );
    }


    // email form submission handler
    function emailLogin() {
        var emailAddress = document.getElementById("email").value;
        AccountKit.login(
            'EMAIL',
            {emailAddress: emailAddress},
            loginCallback
        );
    }


    /**
     * All of the code for your public-facing JavaScript source
     * should reside in this file.
     *
     * Note: It has been assumed you will write jQuery code here, so the
     * $ function reference has been prepared for usage within the scope
     * of this function.
     *
     * This enables you to define handlers, for when the DOM is ready:
     *
     * $(function() {
	 *
	 * });
     *
     * When the window is loaded:
     *
     * $( window ).load(function() {
	 *
	 * });
     *
     * ...and/or other possibilities.
     *
     * Ideally, it is not considered best practise to attach more than a
     * single DOM-ready or window-load handler for a particular page.
     * Although scripts in the WordPress core, Plugins and Themes may be
     * practising this, we should strive to set a better example in our own work.
     */

    $('.tutexpForm .form').find('input, textarea').on('keyup blur focus', function (e) {

        var $this = $(this),
            label = $this.prev('label');

        if (e.type === 'keyup') {
            if ($this.val() === '') {
                label.removeClass('active highlight');
            } else {
                label.addClass('active highlight');
            }
        } else if (e.type === 'blur') {
            if ($this.val() === '') {
                label.removeClass('active highlight');
            } else {
                label.removeClass('highlight');
            }
        } else if (e.type === 'focus') {

            if ($this.val() === '') {
                label.removeClass('highlight');
            }
            else if ($this.val() !== '') {
                label.addClass('highlight');
            }
        }

    });

    $('.tutexpForm .tab a').on('click', function (e) {

        e.preventDefault();

        $(this).parent().addClass('active');
        $(this).parent().siblings().removeClass('active');

        var target = $(this).attr('href');

        $('.tutexpForm .tab-content > div').not(target).hide();

        $(target).fadeIn(600);

    });

    $('.smsLogin').on('click',function (e) {

        countryCode = $("#country").val();
        mobileNumber = $("#phone").val();

        e.preventDefault();
        smsLogin(countryCode,mobileNumber);
    });

    $('.emailLogin').on('click',function (e) {
        alert("email click");
    })



})(jQuery);
