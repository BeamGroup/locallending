$(document).ready(function() {

    var hidden = true;
    $('#cat-toggle').click(function() {
        if (hidden === true) {
            $('#search-cats').css({display:''});
            hidden = false;
        }
        else if (hidden === false) {
            $('#search-cats').css({display:'none'});
            hidden = true;
        }
        else {
            console.log('ERROR: Cat toggle variable is neither "true" nor "false".');
        }
    });

});
