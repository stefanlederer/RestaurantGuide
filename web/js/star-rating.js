/**
 * Created by stefan on 22.02.16.
 */
$(document).ready(function () {
    var options = {
        max_value: 5,
        step_size: 1,
        initial_value: 0,
        selected_symbol_type: 'utf8_star', // Must be a key from symbols
        cursor: 'default',
        readonly: false,
        change_once: false, // Determines if the rating can only be set once
        additional_data: {} // Additional data to send to the server
    };

    $(".rating").rate(options);


    var rating = "";
    $(".rating").on("change", function (ev, data) {
        console.log(data.to);
        rating = data.to;
    });

    $('.submit-comment').submit(function (e) {
        e.preventDefault();
        var myComment = $('.myComment').val();
        console.log(myComment, " ", rating);

        var url = window.location.href;
        console.log(url);

        $.ajax({
            type: "POST",
            url: url,
            data: {
                myComment: myComment,
                myRating: rating
            },
            success: console.log("success")
        });
    });
});