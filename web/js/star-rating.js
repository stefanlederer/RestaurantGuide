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
        ajax_method: 'POST',
        additional_data: {} // Additional data to send to the server
    };

    $(".rating").rate(options);

    $(".sendComment").click(function () {
        console.log("clicked");
        $(".rating").on("change", function (ev, data) {
            //console.log(data.to);
            var rating = data.to;
            var url = "/test";
            $.post(url, {
                rating: rating
            }).fail(function () {
                console.log("error");
            });
        });
    });
});