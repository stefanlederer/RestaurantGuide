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


    var rating;
    $(".rating").on("change", function (ev, data) {
        console.log(data.to);
        rating = data.to;
    });

    $('.sendComment').submit(function (event) {
        console.log("clicked");

        var url = "/food";
        $.post(url, function () {
            alert( "success" );
            //rating: rating
        });
        event.preventDefault();
    });
});