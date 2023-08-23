function loadResults() {
    var url = "/books?category_id=" + $("#category_fill").val();
    // alert(url);
    var table = $("#all-books");

    // alert(table);
    var default_tpl = _.template($("#allbooks_show").html());

    $.ajax({
        url: url,
        success: function (data) {
            console.log(data);
            if ($.isEmptyObject(data)) {
                table.html(
                    '<tr><td colspan="99">No Books in this category</td></tr>'
                );
            } else {
                table.html("");
                for (var book in data) {
                    table.append(default_tpl(data[book]));
                }
            }
        },
        beforeSend: function () {
            table.css({ opacity: 0.4 });
        },
        complete: function () {
            table.css({ opacity: 1.0 });
        },
    });
}

$(document).ready(function () {
    $("#category_fill").change(function () {
        var url = "/bookBycategory/" + $("#category_fill").val();
        // alert(url);
        var table = $("#all-books");

        // alert(table);
        var default_tpl = _.template($("#allbooks_show").html());

        $.ajax({
            url: url,
            success: function (data) {
                console.log(data);
                if ($.isEmptyObject(data)) {
                    table.html(
                        '<tr><td colspan="99">No Books in this category</td></tr>'
                    );
                } else {
                    table.html("");
                    for (var book in data) {
                        table.append(default_tpl(data[book]));
                    }
                }
            },
            beforeSend: function () {
                table.css({ opacity: 0.4 });
            },
            complete: function () {
                table.css({ opacity: 1.0 });
            },
        });
    });

    // $(document).on("click", "#addbooks", function () {
    //     var form = $(this).parents("form"),
    //         module_body = $(this).parents(".module-body"),
    //         sendJSON = {},
    //         send_flag = true,
    //         f$ = function (selector) {
    //             return form.find(selector);
    //         };

    //     title = f$("input[data-form-field~=title]").val();
    //     author = f$("input[data-form-field~=author]").val();
    //     isbn = f$("input[data-form-field~=isbn]").val();
    //     img = $("input[data-form-field~=image]");

    //     description = f$("textarea[data-form-field~=description]").val();
    //     category_id = f$("select[data-form-field~=category]").val();
    //     number = parseInt(f$("input[data-form-field~=number]").val());
    //     auth_user = f$("input[data-form-field~=auth_user]").val();
    //     _token = f$("input[data-form-field~=token]").val();

    //     if (
    //         title == "" ||
    //         isbn == "" ||
    //         author == "" ||
    //         description == "" ||
    //         number == null
    //     ) {
    //         module_body.prepend(
    //             templates.alert_box({
    //                 type: "danger",
    //                 message: "Book Details Not Complete",
    //             })
    //         );
    //         send_flag = false;
    //     }

    //     if (send_flag == true) {
    //         $.ajax({
    //             type: "POST",

    //             data: {
    //                 title: title,
    //                 author: author,
    //                 isbn: isbn,
    //                 description: description,
    //                 number: number,
    //                 category_id: category_id,

    //                 _token: _token,
    //                 auth_user: auth_user,
    //             },

    //             url: "/books",
    //             success: function (data) {
    //                 module_body.prepend(
    //                     templates.alert_box({ type: "success", message: data })
    //                 );
    //                 clearform();
    //             },
    //             error: function (xhr, status, error) {
    //                 var err = eval("(" + xhr.responseText + ")");
    //                 module_body.prepend(
    //                     templates.alert_box({
    //                         type: "danger",
    //                         message: err.error.message,
    //                     })
    //                 );
    //             },
    //             beforeSend: function () {
    //                 form.css({ opacity: "0.4" });
    //             },
    //             complete: function () {
    //                 form.css({ opacity: "1.0" });
    //             },
    //         });
    //     }
    // }); // add books to database
    $("#addBookForm").on("submit", function (e) {
        console.log("ok");
        e.preventDefault();
        var default_tpl = _.template($("#alert_box").html());
        var form = this;
        $.ajax({
            url: "/books",

            method: $(form).attr("method"),
            data: new FormData(form),
            processData: false,
            dataType: "json",
            contentType: false,
            beforeSend: function () {
                $(form).find("span.error-text").text("");
            },
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
                    $(".module-body").prepend(
                        default_tpl({
                            type: "danger",
                            message: data.message,
                        })
                    );

                    clearform();
                }
            },
        });
    });

    $("#editBookForm").on("submit", function (e) {
        console.log("ok");
        e.preventDefault();
        var default_tpl = _.template($("#alert_box").html());
        var form = this;
        $.ajax({
            url: "/update/book",

            method: $(form).attr("method"),
            data: new FormData(form),
            processData: false,
            dataType: "json",
            contentType: false,
            beforeSend: function () {
                $(form).find("span.error-text").text("");
            },
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

    $("#updateUserForm").on("submit", function (e) {
        e.preventDefault();
        var default_tpl = _.template($("#alert_box").html());
        var form = this;
        $.ajax({
            url: "/update/user",

            method: $(form).attr("method"),
            data: new FormData(form),
            processData: false,
            dataType: "json",
            contentType: false,
            beforeSend: function () {
                $(form).find("span.error-text").text("");
            },
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

    loadResults();
});

function clearform() {
    $("#title").val("");
    $("#author").val("");
    $("#description").val("");
    $("#number").val("");
    $("#category").val("");
    $("#isbn").val("");
    $("#image").val("");
}
