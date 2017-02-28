  jQuery('select[name=fieldset-choice]').change(function(){
        var fieldsetName = $(this).val();
        $('fieldset').hide().filter('#' + fieldsetName).show();
    });

    // We need to hide all fieldsets except the first:
    $('fieldset').hide().filter('#f1').show();