//Effetti jQuery per SliderJavaScript
var $j = jQuery.noConflict();

var i = 2;
$j(function() {

    var automatico = setInterval(function() {
        if (i == 4)
            i = 1;

        var attivo = $j('#container-slider .active'),
                prox = 'content-' + i;

        if (prox == 'content-4')
            prox = 'content-1';

        $j(attivo).fadeOut(500);

        $j('#' + prox).delay(500).fadeIn(1500);

        setTimeout(function() {
            $j('#' + prox).addClass('active');
            $j(attivo).removeClass('active');
        }, 1000);

        i++;
    }, 6000);

});

