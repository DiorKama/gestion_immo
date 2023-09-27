$(document).ready(function() {
    var $html = $('html'),
        $body = $html.find('body');

    $body.find('.js-autocomplete').each(function() {
        var $this = $(this),
            url = $this.data('url') || window.location.href,
            originalKey = $this.data('value'),
            originalValue = $this.val() || "",
            dataParameter = $this.data('parameter') || $this.attr('name'),
            dataTarget = $this.attr('name'),
            hiddenInput = $('<input name="' + dataTarget + '" type="hidden" value="' + originalValue + '">'),
            hint = $('<span class="autocomplete-hint"></span><small class="form-text text-muted hint">Type 2 or more letters to see a list of possible options</small>'),
            selectedSomething = false;

        if(originalKey !== 'undefined') {
            $this.val(originalKey);
        }

        hint.insertAfter(hiddenInput.insertAfter($this.attr('name', dataTarget + '_autocomplete').attr('autocomplete', 'off')));

        $this.autocomplete({
            serviceUrl: url,
            paramName: dataParameter,
            dataType: 'json',
            minChars: 2,
            showNoSuggestionNotice: true,
            noSuggestionNotice: "No Results Found",
            onSelect: function(data) {
                hiddenInput.val(data.data).trigger('change');
                selectedSomething = true;
            },
            transformResult: function(response) {
                hiddenInput.next('.autocomplete-hint').addClass('active');
                return {
                    suggestions: $.map(response, function(key, value) {
                        return { value: key, data: value };
                    })
                };
            }
        });

        $this.on('blur', function() {
            hiddenInput.next('.autocomplete-hint').removeClass('active');
            if(selectedSomething === false) {
                if(originalKey !== 'undefined') {
                    $this.val(originalKey);
                } else {
                    $this.val(originalValue);
                }
            }
        });
    });
});
