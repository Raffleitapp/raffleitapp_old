@extends('layouts.dashlayout')
@section('title', 'Account Details')
@section('content')
<meta name="csrf-token" content="{{ csrf_token() }}" />

<style>
    label {
        font-weight: bold;
    }
</style>

<div class="regform p-3">
    <h5 class="fw-bold h5">Billing address</h5>
    <div class="card p-3 shadow">
        <div class="form" id="project_type" method="POST" action="{{url('user/billAddress')}}">
            @csrf
            <div class="row">
                <div class="form-group col-md-6">
                    <label for="first_name">First Name</label>
                    <input type="text" required id="first_name" class="form-control" name="first_name" placeholder="">
                </div>
                <div class="form-group col-md-6">
                    <label for="">Last Name</label>
                    <input type="text" required id="last_name" class="form-control" placeholder="" name="last_name">
                </div>
            </div>
            <div class="form-group">
                <label for="cname">Company Name</label>
                <input type="text" required id="cname" name="company_name" class="form-control" placeholder="Optional">
            </div>
            <div class="form-group">
                <label for="region">Region/Country</label>
                <input type="text" required id="region" class="form-control" name="region" placeholder="Region/Country">
            </div>
            <!-- <h5 class="mt-4 fw-bold"></h5> -->
            <div class="form-group">
                <label for="saddress">Street Address</label>
                <input type="text" required id="saddress" class="form-control" name="street_name" placeholder="Street number and street name">
                <input type="text" required id="saddress" class="form-control" name="apartment" placeholder="Apartment, suite, unit etc (optional)">
            </div>
            <div class="form-group">
                <label for="town">Town/City</label>
                <input type="text" required id="town" class="form-control" name="town" placeholder="Town/City">
            </div>
            <div class="form-group">
                <label for="country">Country</label>
                <input type="country" required id="country" class="form-control" name="country" placeholder="Country">
            </div>
            <div class="form-group">
                <label for="zipcode">Zip Code</label>
                <input type="text" required id="zipcode" class="form-control" name="zipcode" placeholder="Zip Code">
            </div>
            <div class="form-group">
                <label for="phone">Phone</label>
                <input type="text" required id="phone" name="phone_number" class="form-control" placeholder="Phone number">
            </div>
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" required id="email" name="email" class="form-control" placeholder="Email Address">
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-outline-danger" data-bs-dismiss="modal">Save Data</button>
            </div>
        </div>
    </div>
</div>
<script src="{{asset("js/jquery.min.js")}}"></script>
<script src="{{asset("js/sweetalert.js")}}"></script>
<script>
    $(document).ready(function() {


        $("span#view").click(()=>{
          let id =  $(this).attr('data-id');
            console.log(id)
        })

    });
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