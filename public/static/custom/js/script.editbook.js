$(document).ready(function () {
    $("#deleteBookForm").on("submit", function (e) {
        e.preventDefault();
        var default_tpl = _.template($("#alert_box").html());
        var form = this;
        $.ajax({
            url: "/delete/book",

            method: $(form).attr("method"),
            data: new FormData(form),
            processData: false,
            dataType: "json",
            contentType: false,

            success: function (data) {
                console.log(data.code);
                if (data.code == 0) {
                    $.each(data.error, function (prefix, val) {
                        $(form)
                            .find("span." + prefix + "_error")
                            .text(val[0]);
                    });
                } else {
                    // alert(data.message);
                    loadResults();
                    $(".module-body").prepend(
                        default_tpl({
                            type: "danger",
                            message: data.message,
                        })
                    );
                }
            },
        });
    });
});
