<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>

<!-- jQuery -->
<script src="https://code.jquery.com/jquery-3.7.0.js" integrity="sha256-JlqSTELeR4TLqP0OG9dxM7yDPqX1ox/HfgiSLBj8+kM=" crossorigin="anonymous"></script>

<script>
    (() => {
        const SORT_BY_SELECT = $('#sort-by-select')

        SORT_BY_SELECT.on('change', (e) => {
            let selectedOption = SORT_BY_SELECT.val();

            $.ajax({
                type: 'POST',
                url: '/?action=sortBy',
                data: {
                    selectedOption
                },

                beforeSend: function(data) {
                    SORT_BY_SELECT.attr('disabled','');
                },

                error: function(error) {
                    console.log(error);
                },

                success: function(data) {
                    console.log(data);
                },

                complete: function(data) {
                    SORT_BY_SELECT.removeAttr('disabled');
                }
            });
        })
    })()
</script>