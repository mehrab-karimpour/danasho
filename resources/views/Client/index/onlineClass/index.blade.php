<fieldset class="container-fluid">
    @csrf
    <h4 class="text-center online-class-text">
        کلاس انلاین
        <i class="fas fa-video ml-3 pt-3"></i>
    </h4>
    <br>

    <section id="select-class">
        <div class="grade online-item" onclick="itemsStart(1,'.select-class')">
            <i class="fas fa-user-graduate ml-2"></i>
            پایه تحصیلی و عنوان درس
        </div>
        <div class="time online-item public-items" onclick="itemsStart(2,'.time')">
            <i class="fas fa-hourglass-start ml-2"></i>
            مدت زمان کلاس و هزینه
        </div>
        <div class="date online-item public-items" onclick="itemsStart(3,'.date')">
            <i class="fas fa-calendar-alt ml-2"></i>
            زمان برگزاری کلاس
        </div>
        <div class="set-record online-item" onclick="itemsStart(4,'.set-record')">
            <i class="fas fa-edit ml-2"></i>
            ثبت درخواست
        </div>
    </section>
</fieldset>
<input type="radio" id="val-empty" style="opacity: 0">

<div class="modal fade" id="file-size-is-top" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
     aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content alert alert-danger">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">

                </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                حجم عکس باید کمتر از 20 مگابایت باشد
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">
                    متوجه شدم !
                </button>

            </div>
        </div>
    </div>
</div>
