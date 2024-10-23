@extends('layouts.admin.adminlayout')
@section('master-admin')
<meta name="csrf-token" content="{{ csrf_token() }}" />

<style>
    h2.head {
        color: #000;

        font-size: 1.5rem;
        font-style: normal;
        font-weight: 700;
        line-height: 90%;
    }

    p.head-desc {
        color: #000;

        font-size: .8rem;
        font-style: normal;
        font-weight: 400;
        line-height: 90%;
    }

    table thead {
        background: var(--primary-color);
        color: var(--white-color);
        padding: 8px 0px;
    }

    table thead tr {
        padding: 8px 0px;
        color: var(--white-color, #FDFDFD);

        font-size: 14px;
        font-style: normal;
        font-weight: 700;
        line-height: 140%;
    }

</style>
<div class="p-3">
    <h2 class="head">All Category</h2>
    <p class="head-desc">Manage category</p>
</div>
<div class="card p-3">

    @if (Session::has('success'))

    <div class="alert alert-success text-center fw-bolder" role="alert">
        {{Session::get('success')}}
      </div>
    @endif

    @if (Session::has('error'))

    <div class="alert alert-danger text-center fw-bolder" role="alert">
        {{Session::get('error')}}
      </div>
    @endif
  <div class="row justify-between my-3">
    <div class="col-12 col-md-6">
        <h2 class="head">All Category</h2>
    </div>
    <div class="col-12 col-md-6">
       <button class="btn btn-outline-success btn-sm float-end" data-bs-toggle="modal" data-bs-target="#myModal">Add New</button>
    </div>
  </div>

  {{-- List all category --}}
    <div class="table-responsive my-3">
        <table class="table table-striped table-hover table-responsive">
            <thead>
                <tr class="text-center">
                    <th>S/No</th>
                    <th style="min-width: 150px">Category</th>
                    <th>Status</th>
                    <th>Action</th>

                </tr>
            </thead>
            <tbody>
                @foreach ($data as $index => $item )


                <tr class="text-center align-middle">
                    <td>{{$index + 1}}</td>
                    <td>{{$item->category_name}}</td>
                    <td> <button class='btn {{$item->category_status == 1 ? 'btn-success': 'btn-danger'}}  btn-sm'>{{$item->category_status == 1 ? 'Active': 'Deactive'}}</button></td>
                    <td class="">
                        <div class="flex justify-center">
  {{-- <span  class="mx-2 text-success text-xl" id="view" data-id="{{$item->id}}"><i class="bi bi-eye-fill" style="font-size:1.3rem"></i></span> --}}

  <span onclick="deleteCategory({{$item->id}})" class="mx-2 text-danger text-xl"><i class="bi bi-trash-fill" style="font-size:1rem"></i></span>

                        </div>

                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    {{ $data->links('vendor.pagination.bootstrap-5') }}

    {{-- Add new category modal --}}
    <div class="modal fade" id="myModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1">
        <div class="modal-dialog" >
            <div class="modal-content">

                <!-- Modal Header -->
                <div class="modal-header">
                    <h4 class="modal-title text-orange-600 text-center">Add New Category</h4>
                    {{-- <button type="button" class="btn-close text-orange-600" data-bs-dismiss="modal"></button> --}}
                </div>

                <!-- Modal body -->
                <div class="modal-body">
                    <div>
                        <form id="project_type" method="POST" action="{{url('admin/addCategory')}}">
                            @csrf
                            <div class="mb-3">
                                <label for="name">Category name</label>
                                <input type="text" name="category_name" id="name" required class="form-control">
                            </div>
                            <div class="mb-3">
                                <input type="submit" class="form-control btn btn-outline-success btn-sm"
                                    value="Save">
                            </div>
                        </form>
                    </div>
                </div>

                <!-- Modal footer -->
                <div class="modal-footer">
                    <button type="button" class="btn btn-outline-danger" data-bs-dismiss="modal">Close</button>
                </div>

            </div>
        </div>
    </div>
    {{-- End of modal --}}
</div>
<script src="{{asset("js/jquery.min.js")}}"></script>
<script src="{{asset("js/sweetalert.js")}}"></script>
<script src="{{asset("js/alert.js")}}"></script>
<script>
    $(document).ready(function() {


        $("span#view").click(()=>{
          let id =  $(this).attr('data-id');
            console.log(id)
        })

        // $("#project_type").submit(function(e) {

        //     e.preventDefault();

        //     $.ajax({
        //         type: "post",
        //         headers: {
        //             'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        //         },
        //         url: "{{ url('admin/save_category') }}",
        //         data: $(this).serialize(),
        //         dataType: "json",
        //         success: function(response) {
        //             if (response.status == 401) {
        //                 Swal.fire({
        //                     icon: 'error',
        //                     title: response.error,
        //                     showConfirmButton: false,
        //                     timer: 1500
        //                 })
        //                 // $(".spinner-border").css("display", "none");
        //                 // $(".login_btn").css("display", "block");
        //             } else {
        //                 Swal.fire({
        //                     icon: 'success',
        //                     title: response.message,
        //                     showConfirmButton: false,
        //                     timer: 1000
        //                 });
        //                 window.location = "{{ url('admin/dashboard') }}"
        //             }
        //         }
        //     });
        // });





    });

   function deleteCategory(id){
    console.log(id);
    Swal.fire({
                title: '<strong>Are you sure you want to become delete it?</strong>',
                icon: 'info',
                html: "You won't be able to <b>revert</b> this ",
                // '<a href="//sweetalert2.github.io">links</a> ' +
                // 'and other HTML tags',
                showCloseButton: true,
                showCancelButton: true,
                focusConfirm: false,
                confirmButtonText: 'Yes',

                cancelButtonText:  'No',
            }).then((result) => {
                if (result.value) {
                    console.log(result);
                    $.ajax({
                        type: "post",
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        },
                        url: "{{url("admin/deleteCategory")}}",
                        data: {id: id},
                        dataType: 'json',
                        success: function (response) {
                            console.log(response);
                            if(response.code === 201){
                                showSuccessMsg(response.message);
                                window.location.href = "/admin/category"
                            }else{
                                showErrorMsg(response.message);
                            }
                        }
                    });

                }
            }).catch((err) => {

            });
    }
</script>
<script>
    $(document).ready(function() {
        $(".change_stat").click(function(e) {
            e.preventDefault();
            // alert( "Handler for .click() called." );
            const id = $(this).data('id');
            const value = $(this).data('value');

            $.ajax({
                type: "post",
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                url: "{{ url('update_project_type') }}",
                data: {
                    "id": id,
                    "status": value == 1 ? 0 : 1,
                    "name": ''
                },
                // dataType: "dataType",
                success: function(response) {
                    if (response.status == 401) {
                        Swal.fire({
                            icon: 'error',
                            title: response.error,
                            showConfirmButton: false,
                            timer: 1500
                        })
                        // $(".spinner-border").css("display", "none");
                        // $(".login_btn").css("display", "block");
                    } else {
                        Swal.fire({
                            icon: 'success',
                            title: response.message,
                            showConfirmButton: false,
                            timer: 1500
                        });
                        window.location.reload(true);
                    }
                }
            });
        });

        $(".edit").click(function(e) {
            e.preventDefault();
            const id = $(this).data('id');
            const name = $(this).data('name');
            const {
                value: nar
            } = Swal.fire({
                title: 'Edit Project Type',
                input: 'text',
                inputValue: name,
                inputAttributes: {
                    autocapitalize: 'off'
                },
                showCancelButton: true,
                confirmButtonText: 'Update',
                showLoaderOnConfirm: true,
                preConfirm: (nar) => {
                    if (nar != "") {
                        $.ajax({
                            type: "post",
                            headers: {
                                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr(
                                    'content')
                            },
                            url: "{{ url('update_project_type') }}",
                            data: {
                                "id": id,
                                "name": nar
                            },
                            // dataType: "dataType",
                            success: function(response) {
                                if (response.status == 401) {
                                    Swal.fire({
                                        icon: 'error',
                                        title: response.error,
                                        showConfirmButton: false,
                                        timer: 1500
                                    })
                                    // $(".spinner-border").css("display", "none");
                                    // $(".login_btn").css("display", "block");
                                } else {
                                    Swal.fire({
                                        icon: 'success',
                                        title: response.message,
                                        showConfirmButton: false,
                                        timer: 1500
                                    });
                                    window.location.reload(true);
                                }
                            }
                        });

                    }
                },
                allowOutsideClick: () => !Swal.isLoading()
            }).then((result) => {
                /* Read more about isConfirmed, isDenied below */
                if (result.isConfirmed) {

                } else if (result.isDenied) {
                    Swal.fire('Changes are not saved', '', 'info')
                }
            });



        });
    });
</script>
@endsection
