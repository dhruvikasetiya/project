jquery(document).ready(function($){
    let search_form = $('#my-search-form');

    search_form.submit(
        function(event){
            event.preventDefault();
            let search_term = $('#my-search-term').val();
            console.log(search_form);
        }
    );
});



