document.getElementById("submit-form-professor").addEventListener("click", function (e) {

    e.preventDefault();

    const validateClass = new validate();
    const formData = {
        0: {
            name: 'national_image',
            require: false,
            type: 'file',
            max: 2100000, // max size use can uploaded file is 2mb
            min: 15,
            message: "حداکثر حجم عکس کارت ملی باید 2 مگابایت باشد"
        }, 1: {
            name: 'university_image',
            require: false,
            type: 'file',
            max: 2100000, // max size use can uploaded file is 2mb
            min: 15,
            message: "حداکثر حجم عکس مدرک تحصیلی یا کارت دانشجویی باید 2 مگابایت باشد"
        }, 2: {
            name: 'cv_image',
            require: false,
            type: 'file',
            max: 2100000, // max size use can uploaded file is 2mb
            min: 15,
            message: "حداکثر حجم فایل pdf باید 2 مگابایت باشد"
        }, 3: {
            name: 'professor_tags_image',
            require: false,
            type: 'file',
            max: 2100000, // max size use can uploaded file is 2mb
            min: 15,
            message: "حداکثر حجم عکس سوابق تحصیلی و کاری باید 2 مگابایت باشد"
        }, 4: {
            name: 'bank_card_image',
            require: false,
            type: 'file',
            max: 2100000, // max size use can uploaded file is 2mb
            min: 15,
            message: "حداکثر حجم عکس تصویر کارت بانکی باید 2 مگابایت باشد"
        }
    }
    alert(validateClass.formValidation(formData));
    if (validateClass.formValidation(formData))
        $('#edit-profile').submit();

})
