/**
 * Created by stefan on 22.02.16.
 */

$('#slideButton').click(function () {
    $("#newRestaurantForm").slideToggle();
    if ($("#slider").hasClass('fa fa-sort-desc')) {
        $("#slider").removeClass("fa fa-sort-desc").addClass("fa fa-sort-asc");
    }
    else {
        $("#slider").removeClass("fa fa-sort-asc").addClass("fa fa-sort-desc");
    }
});