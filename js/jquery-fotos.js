/**
 * Escopo de compatibilidade do jQuery
 */
 
 (function($){
    $(document).ready(function() {
      
         var div = $('<div></div>').addClass('paginas');
            $('#slider ul').before(div);
            $('#slider ul').cycle({
                        fx: 'fade',
                        pager:  'div.paginas'
            });
            
        /*
        *Roda o jQuery Cycle na lista ul que está
        *dentro do bloco de fotos (#fotos)
        */
        $('#fotos ul').cycle({
            pause: true,
            next: '.prox',
            prev: '.prev'    
        });
    })
 })(jQuery);