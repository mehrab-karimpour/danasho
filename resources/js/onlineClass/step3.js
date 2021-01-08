class Step3 extends index {
    constructor(props) {
        super(props);
    }

    dateHandle = () => {
        $('.step-title').text('انتخاب روز  مورد نظر');
        this.ajaxStart();
        this.completing('.date');
        index.appendItems(window.date[0], window.date[1]);
        this.showItem('#online-items');

    }

    stepTreeHandle = (url, data) => {
        $('.step-title').text('انتخاب محدوده زمانی مورد نظر');
        let firstDateSelected = $('#list-group li').eq(1).text();
        let firstPeriodSelect = 0;
        if (firstDateSelected === data['step']) {
            firstPeriodSelect = 1;
        }
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
            index.ajaxBackEnd();
        });
        this.goBack();
        if (firstPeriodSelect === 1) {
            setTimeout(() => {
                const onePeriodItem=$('#list-group li').eq(0);
                onePeriodItem.addClass('bg-danger');
                onePeriodItem.removeAttr('onclick');

            }, 300)
        }
    }

    goBack = () => {
        let goBack = $('.go-back');
        goBack.empty();
        goBack.append("<button onclick='goBackDate()' class='btn float-right  btn-secondary mb-5'> قبلی</button>");
    }

    getDate = () => {
        this.ajaxStart();
        this.post('/online/getDate', {}).done(function (result) {
            let onlineItems = $('#online-items');
            onlineItems.fadeIn(200);
            $('#online-items>div>ul').empty();

            $('#turn').val(result[1]);
            $.each(result[0], function (key, value) {
                let tag = "<li onclick='beforeItemNotSelectedShowError()' class='list-group-item online-items-select' data-id='" + value['id'] + "'" +
                    ">" + value['title'] + "</li>";
                $('#online-items>div>ul').append(tag);
            });
            let firstDateItem = $('#online-items>div>ul li').eq(0);
            firstDateItem.removeAttr("onclick");
            firstDateItem.addClass('bg-danger');
            setTimeout(() => {
                index.ajaxLoaderEnd();
            }, 200)
            index.ajaxBackEnd();
        });

    }

}
