(function ($, Drupal) {
     Drupal.behaviors.consoleExit = {
         attach: function (context, settings) {
             console.log("Toy sirviendo");
         },
     };
})(jQuery, Drupal);