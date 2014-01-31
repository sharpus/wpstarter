(function($) {
    var HDStarter = {
        init: function() {
            return this;
        },
        example: function() {
            $("a[href='#']").on('click', function(e) {
                e.preventDefault();
            });
        }
    };

    window.HDStarter = HDStarter.init();

})(jQuery);

$(function() {
    HDStarter.example();
});
