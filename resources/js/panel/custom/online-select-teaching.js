$(function () {

    $(".select-online-teaching-parents>li").click(function () {
        const lessonID = $(this).attr('data-id');
        const text = $(this).text();
        appendItem(text, lessonID);
    });


    const appendItem = (text, lessonID) => {
        const formParent = $("#online-selected-teaching").find('form');
        const currentItem = formParent.find("div");
        let DontExists = true;
        for (let i = 0; i < $("#online-selected-teaching>form div").length; i++) {
            if (currentItem.eq(i).find("input").val() === lessonID) {
                currentItem.eq(i).remove();
                DontExists = false;
            }
        }
        if (DontExists) {
            const newItem = "<div><i onclick='removeItemSelected(this)' class='fas fa-times bg-danger rounded-circle p-1 cursor-pointer'></i>" + text + "<input type='hidden' name='lesson[]' value='" + lessonID + "'></div>";
            formParent.append(newItem);
            if (formParent.find("div").length > 0) {
                formParent.find('.btn').remove();
                formParent.append("<button class='btn btn-primary'>ارسال</button>");
            } else {
                formParent.find('.btn').remove();
            }
            formParent[0].scrollTop = formParent[0].scrollHeight;

        }
    }

});


const removeItemSelected = (tag) => {
    $(tag).parent("div").remove();
}
