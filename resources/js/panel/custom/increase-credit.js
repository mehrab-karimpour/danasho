const showAmount = (amount) => {
    $('.amount-increase-item-show').text(amount + ' ریال ');
    $('#main-amount').val(amount);
}


$(function () {
    $('#amount').keyup(function () {
        showAmount($(this).val());
    });

    $('.credit-item').click(function () {
        const amount = $(this).attr('data-credit');
        $('.credit-item').removeClass('active-credit-item');
        $(this).addClass('active-credit-item');
        showAmount(amount);
    });
    $('.credit-submit').click(function () {
        if ($('#main-amount').val().length < 5) {
            $('#amount-is-low').modal();
        }
    })
});


