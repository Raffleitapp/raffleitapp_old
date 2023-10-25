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
        <!-- <div class="text-center"> -->
        <h5 class="fw-bold h5">Shipping address</h5>
        <!-- </div> -->
        <div class="card p-3 shadow">
            <div class="form">
                <div class="row">
                    <div class="form-group col-md-6">
                        <label for="">First Name</label>
                        <input type="text" required id="fname" class="form-control" placeholder="">
                    </div>
                    <div class="form-group col-md-6">
                        <label for="">Last Name</label>
                        <input type="text" required id="fname" class="form-control" placeholder="">
                    </div>
                </div>
                <div class="form-group">
                    <label for="cname">Company Name</label>
                    <input type="text" required id="cname" class="form-control" placeholder="Optional">
                </div>
                <div class="form-group">
                    <label for="region">Region/Country</label>
                    <input type="text" required id="region" class="form-control" placeholder="Region/Country">
                </div>
                <!-- <h5 class="mt-4 fw-bold"></h5> -->
                <div class="form-group">
                    <label for="saddress">Street Address</label>
                    <input type="text" required id="saddress" name="street_address" class="form-control" placeholder="Street number and street name">
                    <input type="text" required id="saddress" class="form-control" name="apartment" placeholder="Apartment, suite, unit etc (optional)">
                </div>
                <div class="form-group">
                    <label for="town">Town/City</label>
                    <input type="text" required id="town" name="town" class="form-control" placeholder="Town/City">
                </div>
                <div class="form-group">
                    <label for="country">Country</label>
                    <input type="country" required id="country" name="country" class="form-control" placeholder="Country">
                </div>
                <div class="form-group">
                    <label for="zipcode">Zip Code</label>
                    <input type="text" required id="country" name="zipcode" class="form-control" placeholder="Zip Code">
                </div>
                <button class="btn">Save Changes</button>
            </div>
        </div>
    </div>

    <script src="{{ asset('js/jquery.min.js') }}"></script>
    <script src="{{ asset('js/sweetalert.js') }}"></script>
    <script>
        $(document).ready(function() {


            $("span#view").click(() => {
                let id = $(this).attr('data-id');
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
