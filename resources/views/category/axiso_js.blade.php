<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/axios/1.4.0/axios.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>

<script>
    //store
    $('body').on('submit','#addNewCat',function(e){
        e.preventDefault();

        axios.post("{{ route('categories') }}", {
            name: $('#name').val(),
        })
        .then(function(response){
            console.log(response);
        })
        .catch(function(error){
            console.log(response);
        })

    });
</script>
