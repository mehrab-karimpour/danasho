<fieldset class="container-fluid">
    @csrf
    <h4 class="text-center online-class-text">
        رفع اشکال آفلاین
        <i class="fas fa-video ml-3 pt-3"></i>
    </h4>
    <br>
    <section id="select-class-offline">
        <div onclick="itemsStartOffline(1,this)" class="grade-offline">
            <i class="fas fa-user-graduate ml-2"></i>
            پایه تحصیلی و عنوان درس
        </div>
        <div onclick="itemsStartOffline(2,this)" class="question-count">
            <i class="fas fa-hourglass-start ml-2"></i>
            تعداد سوال و هزینه آن
        </div>
        <div onclick="itemsStartOffline(3,this)" class="date-get-answer">
            <i class="fas fa-calendar-alt ml-2"></i>
            زمان دریافت پاسخ

        </div>
        <div onclick="itemsStartOffline(4,this)" class="get-record-offline">
            <i class="fas fa-edit ml-2"></i>
            ثبت درخواست
        </div>
    </section>
</fieldset>
