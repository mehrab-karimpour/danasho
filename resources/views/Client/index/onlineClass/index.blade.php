<fieldset class="container-fluid">
    @csrf
    <h4 class="text-center online-class-text">
        کلاس انلاین
        <i class="fas fa-video ml-3 pt-3"></i>
    </h4>
    <br>

    <section id="select-class">
        <div class="grade" onclick="itemsStart(1,'.select-class')">
            <i class="fas fa-user-graduate ml-2"></i>
            پایه تحصیلی و عنوان درس
        </div>
        <div class="time public-items" onclick="itemsStart(2,'.time')">
            <i class="fas fa-hourglass-start ml-2"></i>
            مدت زمان کلاس و هزینه
        </div>
        <div class="date public-items" onclick="itemsStart(3,'.date')">
            <i class="fas fa-calendar-alt ml-2"></i>
            زمان برگزاری کلاس
        </div>
        <div class="set-record" onclick="itemsStart(4,'.set-record')">
            <i class="fas fa-edit ml-2"></i>
            ثبت درخواست
        </div>
    </section>
</fieldset>
