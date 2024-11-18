import './bootstrap';

$(document).ready(function (){

    $(document).on('change', '.step-1-verif', function() {
        console.log('test before if');
        if ($('#company_name').val() || $('#current_year').val()) {
            console.log('test inside if');
            $('#error-message-step-1').hide();
        }
    });

    $(document).on('change', '#file_input', function() {
        const file = this.files[0];
        if (file) {
            $('#file-label').addClass('border-green-500').removeClass('border-gray-300');
            $('#error-message').hide();
        }
    });

    $('[data-decoration="stripe"]').css({
        'width': '105%',
        'background-color' : '#082E34',
        'padding' : '10px 2.5%',
        'transform': 'translateX(-2.5%)',
        'color' : '#082E34',
    })
})

