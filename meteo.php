


    <div class="row mt-3">
        <div class="col-12">
            <h1 class="text-danger">Enter un nom de film</h1>
            <input id="search" type="text" class="form-control" placeholder="Guardians of the Galaxy Vol. 2">

            <hr>

            <div id="results"></div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.3.1.min.js" crossorigin="anonymous"></script>
<script>
    $(function() {

        const search = $('#search');
        const omdbApiKey = 'd213cd39';

        search.on('input', function() {
            console.log( $(this).val() );

            $.ajax({
                url: 'http://www.omdbapi.com/',
                type : 'GET',
                data : {
                    'apikey': omdbApiKey,
                    's' : $(this).val()
                },

                success : function(result) {

                    if (search.val().length >= 3 ) {

                        $('#results').html('');

                        if (result.Search && result.Search.length > 0) {


                            // comme en PHP : foreach ($result['Search'] as $movie)
                            result.Search.forEach(function (movie) {

                                console.log(movie);

                                let movieHtml = '<div class="card">' +
                                    '<div class="card-header">' + movie.Title + '</div>' +
                                    '<div class="card-body"><img src="' + movie.Poster + '" height="100"></div>' +
                                    '</div>';

                                $('#results').append(movieHtml);
                            });
                        }
                    }
                },

                // error : function(result) {
                //     console.log('erreur réseau !');
                // },

                // complete: function(result) {
                //     console.log('fini !');
                // }
            });
        });
    });
</script>