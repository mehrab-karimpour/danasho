const sendTicket = () => {
    $("#send-box").submit();
    console.log($("#send-box").serializeArray())
}

$(function () {
    $('#message').keyup(function () {
        const val = $(this).val().trim();

        if (val.length === 0) {
            $('.fa-paper-plane').addClass('opacity-low');
        } else {
            $('.fa-paper-plane').removeClass('opacity-low');
        }
    });

    let ticketFile = {};
    $('#ticket-file').change(function () {
        // file size 2.46 mb === 2588672 byt
        if (this.files.length > 0) {
            ticketFile = this.files;
            $('.show-file-name').text(this.files[0].name);
            $('.fa-folder-open').addClass('text-success');
        } else {
            ticketFile = {};
            $('.show-file-name').text("");
            $('.fa-folder-open').removeClass('text-success');
        }
    });

    $('.fa-paper-plane').click(function () {
        if ($(this).hasClass('opacity-low')) {
            // message box is empty
        } else {
            if (ticketFile.length > 0) {
                if (ticketFile[0].size < 10000101) {
                    sendTicket();
                } else {
                    $("#ticketModal").modal();
                }
            } else {
                sendTicket();
            }
        }
    })
});
