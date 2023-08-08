{{-- <script src="{{ asset('assets/libs/jquery/jquery.min.js') }}"></script>
<script src="{{ asset('assets/libs/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<script src="http://cdn.bootcss.com/toastr.js/latest/js/toastr.min.js"></script> --}}
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
<script src="https://code.jquery.com/jquery-3.7.0.min.js" integrity="sha256-2Pmvv0kuTBOenSvLm6bvfBSSHrUJ+3A7x6P5Ebd07/g=" crossorigin="anonymous"></script>
<script src="http://cdn.bootcss.com/toastr.js/latest/js/toastr.min.js"></script>
<script src="{{ asset('assets/libs/metismenu/metisMenu.min.js') }}"></script>
<script src="{{ asset('assets/libs/simplebar/simplebar.min.js') }}"></script>
<script src="{{ asset('assets/libs/node-waves/waves.min.js') }}"></script>


<!-- apexcharts -->
<script src="{{ asset('assets/libs/apexcharts/apexcharts.min.js') }}"></script>

<!-- jquery.vectormap map -->
<script src="{{ asset('assets/libs/admin-resources/jquery.vectormap/jquery-jvectormap-1.2.2.min.js') }}"></script>
<script src="{{ asset('assets/libs/admin-resources/jquery.vectormap/maps/jquery-jvectormap-us-merc-en.js') }}"></script>

<!-- Required datatable js -->
<script src="{{ asset('assets/libs/datatables.net/js/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('assets/libs/datatables.net-bs4/js/dataTables.bootstrap4.min.js') }}"></script>

<!-- Responsive examples -->
<script src="{{ asset('assets/libs/datatables.net-responsive/js/dataTables.responsive.min.js') }}"></script>
<script src="{{ asset('assets/libs/datatables.net-responsive-bs4/js/responsive.bootstrap4.min.js') }}"></script>

<script src="{{ asset('assets/js/pages/dashboard.init.js') }}"></script>

<!-- App js -->
<script src="{{ asset('assets/js/app.js') }}"></script>

<script>
    $('#addt').show();
    $('#updatet').hide();
</script>

<script>
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
</script>
<script>

    $(document).ready(function(){

        $(document).on('click','.add_teacher',function(e){
            e.preventDefault();
            let name = $('#name').val();
            let title = $('#title').val();
            let institute = $('#institute').val();

            $.ajax({
                url:"{{ route('add.teacher') }}",
                method:'post',
                data:{name:name,title:title,institute:institute},
                success:function(res){
                    if(res.status=='success'){
                        $('#addTeacherForm')[0].reset();
                        $('.table').load(location.href+' .table');
                        Command: toastr["success"]("Teacher added")
                            toastr.options = {
                            "closeButton": true,
                            "debug": false,
                            "newestOnTop": false,
                            "progressBar": true,
                            "positionClass": "toast-top-right",
                            "preventDuplicates": false,
                            "onclick": null,
                            "showDuration": "300",
                            "hideDuration": "1000",
                            "timeOut": "5000",
                            "extendedTimeOut": "1000",
                            "showEasing": "swing",
                            "hideEasing": "linear",
                            "showMethod": "fadeIn",
                            "hideMethod": "fadeOut"
                            }

                    }

                },error:function(err){
                    let error = err.responseJSON;
                    $.each(error.errors,function(index, value){
                        $('.errMsgContainer').append('<span class="text-danger">'+value+'</span>'+'<br>');
                    });

                }
            });


        })


        // show teacher value in update form

        $(document).on('click','.edit_teacher',function(){
            let id = $(this).data('id');
            let name = $(this).data('name');
            let title = $(this).data('title');
            let institute = $(this).data('institute');

            $('#addt').hide();
            $('#updatet').show();



            $('#up_id').val(id);
            $('#up_name').val(name);
            $('#up_title').val(title);
            $('#up_institute').val(institute);


        });


        // update product data

        $(document).on('click','.update_teacher',function(e){
            e.preventDefault();
            let up_id = $('#up_id').val();
            let up_name = $('#up_name').val();
            let up_title = $('#up_title').val();
            let up_institute = $('#up_institute').val();

            $.ajax({
                url:"{{ route('update.teacher') }}",
                method:'post',
                data:{up_id:up_id,up_name:up_name,up_title:up_title,up_institute:up_institute},
                success:function(res){
                    if(res.status =='success'){
                        $('#addt').show();
                        $('#updatet').hide();
                        $('#updateTeacherForm')[0].reset();
                        $('.table').load(location.href+' .table');
                        Command: toastr["success"]("Teacher Updated")
                        toastr.options = {
                        "closeButton": true,
                        "debug": false,
                        "newestOnTop": false,
                        "progressBar": true,
                        "positionClass": "toast-top-right",
                        "preventDuplicates": false,
                        "onclick": null,
                        "showDuration": "300",
                        "hideDuration": "1000",
                        "timeOut": "5000",
                        "extendedTimeOut": "1000",
                        "showEasing": "swing",
                        "hideEasing": "linear",
                        "showMethod": "fadeIn",
                        "hideMethod": "fadeOut"
                        }

                    }
                },error:function(err){
                    let error = err.responseJSON;
                    $.each(error.errors,function(index, value){
                        $('.errMsgContainer').append('<span class="text-danger">'+value+'</span>'+'<br>');
                    });
                }

            });

        });

        // delete product data
        $(document).on('click','.delete_teacher',function(e){
            e.preventDefault();
            let teacher_id = $(this).data('id');
            if(confirm('Are you sure to delete teacher ?')){

                $.ajax({
                    url:"{{ route('delete.teacher') }}",
                    method:'post',
                    data:{teacher_id:teacher_id},
                    success:function(res){
                        if(res.status=='success'){
                            $('.table').load(location.href+' .table');
                            Command: toastr["success"]("Teacher Updated")
                            toastr.options = {
                            "closeButton": true,
                            "debug": false,
                            "newestOnTop": false,
                            "progressBar": true,
                            "positionClass": "toast-top-right",
                            "preventDuplicates": false,
                            "onclick": null,
                            "showDuration": "300",
                            "hideDuration": "1000",
                            "timeOut": "5000",
                            "extendedTimeOut": "1000",
                            "showEasing": "swing",
                            "hideEasing": "linear",
                            "showMethod": "fadeIn",
                            "hideMethod": "fadeOut"
                            }

                        }

                    }

                });

            }


        });

        // Pagination

        $(document).on('click','.pagination a',function(e){
                e.preventDefault();
                let page =$(this).attr('href').split('page=')[1]
                teacher(page)
        })

        function teacher(page){
            $.ajax({
                url:"/pagination/paginate-data?page="+page,
                success:function(res){
                    $('.table-data').html(res);
                }
            })
        }


    });

</script>
