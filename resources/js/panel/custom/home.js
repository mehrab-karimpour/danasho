var this_tag;

$('.image-profile').change(function () {
    const ajaxLoader = $('#ajax-loader');
    const ajaxLoaderBack = $('#ajax-leader-back');
    $('.alert').remove();
    ajaxLoader.fadeIn();
    ajaxLoaderBack.fadeIn(200);

    this_tag = $(this);
    let file = this.files[0];
    let parent = $(this).parents('.card');
    let image = parent.find('img');

    if (file != null) {
        let size = this.files[0].size;

        let type = $(this).attr("data-type")
        let formData = new FormData();
        formData.append('pic', file);

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('input[name="_token"]').val()
            }
        });


        if (size < 21231360) {
            $.ajax({
                type: "POST",
                url: "/panel/upload-image-profile",
                data: formData,
                async: true,
                dataType: 'text',
                processData: false,
                cache: false,
                contentType: false,
                success: function (data) {
                    if (typeof data === 'string') {
                        let imageSrc = image.attr("src");

                        let newSrc = "/files/" + data;
                        image.attr("src", newSrc);
                        $('.ajax-start').fadeOut();

                        $('.clearfix').prepend("<div class='alert alert-success text-right direction-rtl'>اپلود فایل با موفقیت انجام شد .</div>");

                    } else {
                        $("#select-file-modal .model-body").text('اپلود فایل انجام نشد لطفا دوباره تلاش کنید');
                        $('.select-file-modal-fade').click();
                    }
                    ajaxLoader.fadeOut();
                    ajaxLoaderBack.fadeOut(200);
                },
                error: function (data) {
                    $('.clearfix').prepend("<div class='alert alert-danger text-right direction-rtl'>با عرض پوزش ! اپلود فایل انجام نشد لطفا دوباره تلاش کنید </div>");
                    ajaxLoader.fadeOut();
                    ajaxLoaderBack.fadeOut(200);
                }
            })
        } else {
            $('.clearfix').prepend("<div class='alert alert-danger text-right direction-rtl'> حجم عکس باید کمتر از 20 مگابایت باشد </div>");
            ajaxLoader.fadeOut();
            ajaxLoaderBack.fadeOut(200);
        }


    } else {
        $('.clearfix').prepend("<div class='alert alert-danger text-right direction-rtl'> حجم عکس باید کمتر از 20 مگابایت باشد </div>");

        ajaxLoader.fadeOut();
        ajaxLoaderBack.fadeOut(200);
    }
})
