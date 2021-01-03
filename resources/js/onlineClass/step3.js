class Step3 extends index {
    constructor(props) {
        super(props);
    }

    dateHandle = () => {
        this.ajaxStart();
        this.completing('.date');
        index.appendItems(window.date[0], window.date[1]);
        this.showItem('#online-items');
    }

    stepTreeHandle = (url, data) => {

        this.ajaxStart();
        this.post(url, data).done(function (result) {
            window.grades = result;
            if (data['turn'] === 6) {
                index.ajaxLoaderEnd();
                $("#online-items").fadeOut();
                $('.ajax-back').fadeOut();
                index.completeEnd('.date');
                index.completedStep(result[0], '.date');
                window.time = result;
            } else {
                index.appendItems(result[0], result[1]);
            }

            let circleSelect = $('.circle-select span');
            circleSelect.removeClass('circle-select-active');
            switch (data['turn']) {
                case 5:
                    circleSelect.eq(1).addClass("circle-select-active");
                    break;
            }
        });
    }

    getDate = () => {
        this.ajaxStart();
        this.post('/online/getDate', {}).done(function (result) {
            console.log(result);
            let onlineItems = $('#online-items');
            onlineItems.fadeIn(200);
            $('#online-items>div>ul').empty();

            $('#turn').val(result[1]);
            $.each(result[0], function (key, value) {
                let tag = "<li onclick='beforeItemNotSelectedShowError()' class='list-group-item online-items-select' data-id='" + value['id'] + "'" +
                    ">" + value['title'] + "</li>";
                $('#online-items>div>ul').append(tag);
            });
            let firstDateItem=$('#online-items>div>ul li').eq(0);
            firstDateItem.removeAttr("onclick");
            firstDateItem.addClass('bg-danger');
            setTimeout(() => {
                index.ajaxLoaderEnd();
            }, 200)


        });

    }

}
