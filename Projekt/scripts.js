$(function() {

    $('.kustutakoer').on('click', function(e) {

        var id = $(this).attr('data-id');
        var koeraNimi = $('.koeranimi', $(this).closest('.row')).html().trim();
        var txt;
        var $row = $(this).closest('.row');

        var alert = confirm("Kas oled kindel, et soovid kustutada andmebaasist " + koeraNimi + "?");

        if (alert == true) {

            var jqxhr = $.get( "?action=kustuta&id=" + id, function() {
            })
            .done(function() {

                $row.slideUp();
            })
        }

        e.preventDefault();
    });
});