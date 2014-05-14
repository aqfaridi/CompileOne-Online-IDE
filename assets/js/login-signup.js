jQuery(document).ready(function($) {
    // Extend $.validate
    (function() {
        // RegEx Methods, adds pattern, pattern1, pattern2, etc...
        for (var i = 1; i < 5; i++) {
            $.validator.addMethod('pattern' + i, function(value, element, param) {
                return this.optional(element) || param.test(value);
            }, 'Please match the requested format.');
        }

        // notEqualTo Method
        $.validator.addMethod('notEqualTo', function(value, element, param) {
            var targets = $(param).off('blur').on('blur', function(e) {
                $(element).valid();
            }),
            length = targets.length,
            i;

            for (i = 0; i < length; i++) {
                if (targets.eq(i).val().toLowerCase() === value.toLowerCase()) {
                    return false;
                }
            }

            return true;
        }, 'Please enter a different value.');

        // Overrides default email method for better a implementation which trims trailing whitespace
        $.validator.addMethod('email', function(value, element) {
            // trim whitespace from the email address
            value = $.trim(value);
            // update the elements value with the trimmed value
            //$(element).val(value);
            // contributed by Scott Gonzalez: http://projects.scottsplayground.com/email_address_validation/
            return this.optional(element) || /^((([a-z]|\d|[!#\$%&'\*\+\-\/=\?\^_`{\|}~]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])+(\.([a-z]|\d|[!#\$%&'\*\+\-\/=\?\^_`{\|}~]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])+)*)|((\x22)((((\x20|\x09)*(\x0d\x0a))?(\x20|\x09)+)?(([\x01-\x08\x0b\x0c\x0e-\x1f\x7f]|\x21|[\x23-\x5b]|[\x5d-\x7e]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(\\([\x01-\x09\x0b\x0c\x0d-\x7f]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]))))*(((\x20|\x09)*(\x0d\x0a))?(\x20|\x09)+)?(\x22)))@((([a-z]|\d|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(([a-z]|\d|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])([a-z]|\d|-|\.|_|~|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])*([a-z]|\d|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])))\.)+(([a-z]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(([a-z]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])([a-z]|\d|-|\.|_|~|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])*([a-z]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])))$/i.test(value);
        });
        
    })();

    // Show password components
    $('[data-toggle~="showpassword"]').each(function() {
        var $checkbox = $(this), 
            $input = $($checkbox.attr('data-target'));

        $input.length && $checkbox.on('change', function(e) {
            var type = $(this).is(":checked") ? "text" : "password", 
                replacement = $("<input type='" + type + "' />")
                    .attr("id", $input.attr("id"))
                    .attr("name", $input.attr("name"))
                    .attr('class', $input.attr('class'))
                    .val($input.val())
                    .insertBefore($input);

            $input.remove();
            $input = replacement;
        });
    });

    $(':input[id|="signup"], :input[id|="login"]')
        .removeAttr('title')
        .removeAttr('pattern');

    // Signup form validation
    var $signup = $('#signup-form'),
        $login = $('#login-form'),
        showErrorsHandler = function(errorMap, errorList) {
            $.each(this.successList, function(index, value) {
                var errorTooltip = $(value).data("tooltip-error");
                errorTooltip && errorTooltip.destroy();
                $(value).removeData("tooltip-error");
            });

            var settings = this.settings, 
                error = errorList[0];

            if (!errorList.length) {
                return;
            }

            var settings = this.settings, 
                error = errorList[0],
                $element = $(error.element),
                _tooltip;

            _tooltip = $element.tooltip("destroy").tooltip({
                trigger: 'manual',
                placement: 'top',
                title: '<i class="icon-exclamation-sign icon-white"></i> ' + error.message,
                html: true,
                template: '<div class="tooltip tooltip-error"><div class="tooltip-arrow"></div><div class="tooltip-inner"></div></div>'
            });

            $element.addClass(settings.errorClass).tooltip("show");

            $element.data("tooltip-error", $element.data("tooltip"));
        };

    $signup.validate({
        ignore: '.novalidate', 
        groups: {
            name: 'firstname lastname'
        }, 
        rules: {
            firstname: {
                required: true, 
                maxlength: 18
            }, 
            lastname: {
                required: true, 
                maxlength: 18
            }, 
            email: {
                required: true,
                maxlength: 64
            }, 
            username: {
                required: true,
                minlength: 6,
                maxlength: 30,
                pattern1: new RegExp(/^[A-Za-z0-9\._]+$/),
                pattern2: new RegExp(/^[A-Za-z0-9]+/),
                pattern3: new RegExp(/[A-Za-z0-9]+$/),
                pattern4: new RegExp(/^(?!.*\.{2}|.*_{2})/)
            }, 
            password: {
                required: true,
                minlength: 6,
                maxlength: 64,
                notEqualTo: '#signup-firstname, #signup-lastname, #signup-email, #signup-username'
            }
        }, 
        messages: {
            firstname: {
                required: "First name is required.",
                maxlength: "First name cannot be more than 18 characters in length."
            }, 
            lastname: {
                required: "Last name is required.",
                maxlength: "Last name cannot be more than 18 characters in length."
            }, 
            email: {
                required: "Email is required.",
                maxlength: "Email cannot be more than 64 characters in length."
            }, 
            username: {
                required: "Username is required.", 
                pattern1: "Username may only contain letters (a-z), numbers, periods and underscores.", 
                pattern2: "The first character of your username should be a letter (a-z) or number.",
                pattern3: "The last character of your username should be a letter (a-z) or number.",
                pattern4: "A fan of punctuation! Alas, usernames can't have consecutive periods or underscores.",
                minlength: "Username must be more than 6 characters in length.",
                maxlength: "Username must be less than 30 characters in length."
            }, 
            password: {
                required: "Password is required.", 
                notEqualTo: "Your password is not secure enough, please enter something else."
            }
        }, 
        showErrors: showErrorsHandler
    });
    
    // Email validation using mailcheck.js
    $('#signup-email').on('focusout.mailcheck.validate', function() {
        var $element = $(this);
        $element.siblings('.suggestion').remove();

        $element.mailcheck({
            suggested: function(element, suggestion) {
                if ($element.hasClass('error')) {
                    //return;
                }

                var $suggestion = $('<span class="suggestion">'
                    + '<i class="icon-question-sign"></i> '
                    + 'Did you mean: '
                    + '<a href="#"><strong>' + suggestion.full + '</strong></a>?'
                    + ' <a class="close" data-dismiss="tooltip" href="#" title="dismiss">&times;</a>'
                    + '</span>');

                $suggestion.find('a:not([data-dismiss])').on('click', function(e) {
                    e.preventDefault();
                    $element.val(suggestion.full);
                    $element.tooltip('destroy');
                });

                $suggestion.find('[data-dismiss="tooltip"]').on('click', function(e) {
                    e.preventDefault();
                    $element.tooltip('destroy');
                });

                $element
                    .tooltip({
                        title: $suggestion, 
                        html: true, 
                        placement: 'top', 
                        trigger: 'manual'
                    })
                    .tooltip('show');
            },
            empty: function(element) {
                $(element).tooltip('destroy');
            }
        });
    });

    $login.validate({
        ignore: '.novalidate', 
        rules: {
            username: {
                required: true
            }, 
            password: {
                required: true
            }
        }, 
        messages: {
            username: {
                required: "Your email or username is required."
            }, 
            password: {
                required: "Password is required."
            }
        }, 
        showErrors: showErrorsHandler
    });

    // Add signup and login submit handler
    $([]).add($signup).add($login).on('submit', function(e) {
        e.preventDefault();
        
        var $form = $(this);

        if ($form.data('disabled')) {
            return false;
        }

        if ($form.valid()) {
            $form.data('disabled', true).addClass('processing');
          



            // send the request
            $.ajax({
                cache: false,
                type: 'POST',
                url: $form.attr('action'),
                data: $form.serialize(),
                dataType: 'json'
            })
            .done(function(data) {
                if (data.success) {
                    data.redirect ? (location = data.redirect) : location.reload(true);
                    return;
                }
                else if (data.errors) {
                    $submit.text(text);
                    $form.validate().showErrors(data.errors);
                }
                
                if (data.message) {
                    alert(data.message);
                }
                
                $('html').css('cursor', 'default');
                $form.data('disabled', false).removeClass('processing');
                $submit.removeAttr('disabled').text(text);
            })

        }

        return false;
    });
});
