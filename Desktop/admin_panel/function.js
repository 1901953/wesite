function prevent_post(){
if ( window.history.replaceState ) {
    window.history.replaceState( null, null, window.location.href );
    }
}