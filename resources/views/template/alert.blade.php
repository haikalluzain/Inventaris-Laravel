<form action="" method="POST" id="delete-form">
    @method('DELETE')
    @csrf
</form> 

<form action="" method="POST" id="fix-form">
    @method('DELETE')
    @csrf
</form> 

<form action="" id="confirm-form"></form>

<script>
    $(document).ready(function(){
        $('.delete-btn').on('click', function(e){
            e.preventDefault();
            var href = $(this).attr('href');
            swal({
                title: "Hapus data ?",
                text: "Data yang di hapus tidak dapat di kembalikan!", 
                icon: "warning",
                buttons: true,
                dangerMode: true,
            })
            .then((willDelete) => {
              if (willDelete) {
                $('#delete-form').attr('action',href).submit();
              }
            });
        });

        $('.fix-btn').on('click', function(e){
            e.preventDefault();
            var href = $(this).attr('href');
            swal({
                title: "Fix asset ?",
                text: "Data yang telah terupdate tidak dapat dikembalikan!", 
                icon: "warning",
                buttons: true,
                dangerMode: true,
            })
            .then((willDelete) => {
              if (willDelete) {
                $('#fix-form').attr('action',href).submit();
              }
            });
        });

        $('.confirm-btn').on('click', function(e){
            e.preventDefault();
            var href = $(this).attr('href');
            var title = $(this).attr('title');
            var content = $(this).attr('content');
            swal({
                title: title,
                text: content, 
                icon: "warning",
                buttons: true,
                dangerMode: true,
            })
            .then((next) => {
              if (next) {
                $('#confirm-form').attr('action',href).submit();
              }
            });
        });
    });
</script>
@if(session('message'))
<script>

iziToast.success({
    title: 'Success',
    message: "{{ session('message') }}",
    position : "topRight",
});

</script>
@elseif(session('error'))
<script>

iziToast.error({
    title: 'Whoops!',
    message: "{{ session('error') }}",
    position : "topRight",
});

</script>
@endif

@if($errors->any())
@foreach($errors->all() as $error)
<script>

iziToast.error({
    title: 'Whoops!',
    message: "{{ $error }}",
    position : "topRight",
});

</script>
@endforeach
@endif