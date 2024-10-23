@extends('layouts/master')
@section('title', 'Create Raffle')
@section('content')
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    {{-- @vite(['resources/scss/app.scss']) --}}
    <style>
        .top-bg {
            height: 20vh;
            background: linear-gradient(0deg, rgba(0, 0, 0, 0.63) 0%, rgba(0, 0, 0, 0.63) 100%),
                url("{{ asset('img/createwalk.png') }}"),
                lightgray 50% / cover no-repeat;
            background-repeat: no-repeat;
            background-position: center;
            background-size: cover;
            display: flex;
            justify-content: flex-start;
            align-items: center;

        }


        #clickable-image {
            height: 80px;
            width: 80px;
            border-radius: 12px;
            border: 1px solid #bebebe;
            /* This applies rounded corners to make it a circle */
            cursor: pointer;
        }

        /* Optionally, you can add some styles for a better user experience */
        #image-container {
            display: inline-block;
            position: relative;
        }

        #image-container input[type="file"] {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            opacity: 0;
            cursor: pointer;
            z-index: 1;
        }

        .img-head {
            color: var(--Body-text-color, #303030);

            font-size: 18px;
            font-style: normal;
            font-weight: 700;
            line-height: 140%;
        }

        .img-text {
            color: var(--text-primary-70000000, rgba(0, 0, 0, 0.70));
            /* H5 */

            font-size: 13px;
            font-style: normal;
            font-weight: 400;
            line-height: 140%;
        }

        .big-large {
            margin: 12px auto;
            color: #215273;
            text-align: center;
            font-size: 28px;
            margin-top: 1rem;
            max-width: 400px;
            font-style: normal;
            font-weight: 700;
            line-height: 150%;
        }

        .big-large-sm {
            margin: 12px auto;
            color: #215273;
            text-align: center;
            font-size: 12px;
            max-width: 400px;
            font-style: normal;
            font-weight: 600;
            line-height: 150%;
        }
    </style>
    <div class="top-bg">
        <div class="top-section">
            <div class="flex mb-2 align-items-center text-white fw-light">
                <li class="flex align-items-center" onclick="location.href='{{ url('/') }}'">
                    <span><svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 30 30"
                            fill="none">
                            <path
                                d="M23.7473 12.0343V6.65933C23.7473 5.97183 23.1848 5.40933 22.4973 5.40933H21.2473C20.5598 5.40933 19.9973 5.97183 19.9973 6.65933V8.65933L15.8348 4.90933C15.3598 4.48433 14.6348 4.48433 14.1598 4.90933L3.70981 14.3218C3.28481 14.6968 3.54731 15.4093 4.12231 15.4093H6.24731V24.1593C6.24731 24.8468 6.80981 25.4093 7.49731 25.4093H11.2473C11.9348 25.4093 12.4973 24.8468 12.4973 24.1593V17.9093H17.4973V24.1593C17.4973 24.8468 18.0598 25.4093 18.7473 25.4093H22.4973C23.1848 25.4093 23.7473 24.8468 23.7473 24.1593V15.4093H25.8723C26.4473 15.4093 26.7223 14.6968 26.2848 14.3218L23.7473 12.0343ZM12.4973 12.9093C12.4973 11.5343 13.6223 10.4093 14.9973 10.4093C16.3723 10.4093 17.4973 11.5343 17.4973 12.9093H12.4973Z"
                                fill="#FDFDFD" />
                        </svg></span><span>Raffleit</span>
                </li>
                <li>
                    <span><svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 25 25"
                            fill="none">
                            <path
                                d="M5.94263 6.99033C5.53638 7.39658 5.53638 8.05283 5.94263 8.45908L9.98429 12.5007L5.94263 16.5424C5.53638 16.9487 5.53638 17.6049 5.94263 18.0112C6.34888 18.4174 7.00513 18.4174 7.41138 18.0112L12.1926 13.2299C12.5989 12.8237 12.5989 12.1674 12.1926 11.7612L7.42179 6.99033C7.01554 6.58408 6.34888 6.58408 5.94263 6.99033Z"
                                fill="#FDFDFD" />
                            <path
                                d="M12.8072 6.99033C12.401 7.39658 12.401 8.05283 12.8072 8.45908L16.8489 12.5007L12.8072 16.5424C12.401 16.9487 12.401 17.6049 12.8072 18.0112C13.2135 18.4174 13.8697 18.4174 14.276 18.0112L19.0572 13.2299C19.4635 12.8237 19.4635 12.1674 19.0572 11.7612L14.276 6.97991C13.8801 6.58408 13.2135 6.58408 12.8072 6.99033Z"
                                fill="#FDFDFD" />
                        </svg></span>
                </li>
                <li><span>Raffle Creation Steps</span></li>
            </div>
            <div class="flex  ">
                <div class="vl mt-2 mr-2"></div>
                <p class="custom-textext">Follow Steps To Create Raffle</p>
            </div>
        </div>
    </div>
    <div class="container  p-3">
        <div class="custom-cards ">
            <h2 class="big-large">Tell us about your organisation</h2>
            <p class="big-large-sm">Step 1 of 3</p>
            @if (Session::has('success'))
                <div class="alert alert-success text-center">{{ Session::get('success') }}</div>
            @endif
            @if (Session::has('error'))
                <div class="alert alert-danger text-center">{{ Session::get('error') }}</div>
            @endif
            <div class="container mt-5" style="max-width: 600px;">
                <div class="card shadow rounded">
                    <div class="card-body p-4">
                        <form id="create-organ" enctype="multipart/form-data" method="POST">
                            <div class="mb-3">
                                <h6 class="img-head">Let your album speak for you</h6>
                                <p class="img-text">Upload your organisation profile image</p>
                                <div id="image-container" class="d-inline-block position-relative">
                                    <img id="clickable-image" required src="{{ asset('img/account_circle.png') }}"
                                        alt="Click to Upload" class="rounded-circle border">
                                    <input type="file" id="image-input" name="image" accept="image/*"
                                        class="position-absolute top-0 start-0 w-100 h-100 opacity-0 cursor-pointer">
                                </div>
                            </div>


                            <div class="mb-3">
                                <label for="new-input" class="form-label">New Input</label>
                                <input type="text" id="new-input" name="new_input" class="form-control" placeholder="Enter something">
                            </div>

                            <div class="mb-3">
                                <label for="nickname" class="form-label">Organization Name</label>
                                <input type="text" required id="nickname" name="organisation_name" class="form-control"
                                    placeholder="Organization Name">
                            </div>
                            @php
                                $categoryData = DB::table('category')->where('category_status', 1)->get();
                            @endphp
                            <div class="mb-3">
                                <label for="category" class="form-label">Category</label>
                                <select class="form-select" required name="category_id" id="category">
                                    <option value="">Choose one</option>
                                    @foreach ($categoryData as $item)
                                        <option value="{{ $item->id }}">{{ $item->category_name }}</option>
                                    @endforeach
                                    <option value="0">Others</option>
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="handle" class="form-label">Handle</label>
                                <input type="text" id="handle" name="handle" class="form-control"
                                    placeholder="@example">
                            </div>
                            <div class="mb-3">
                                <label for="website" class="form-label">Website</label>
                                <input type="text" id="website" name="website" class="form-control"
                                    placeholder="Optional">
                            </div>
                            <div class="mb-3">
                                <label for="description" class="form-label">Description</label>
                                <textarea type="text" name="description" class="form-control" id="description" cols="5" rows="5"
                                    placeholder="Write something..."></textarea>
                            </div>
                            <button type="submit" class="btn btn-primary w-100">Create</button>
                            <div class="d-flex justify-content-center mt-3">
                                <div class="spinner-border text-primary" role="status" style="display: none;">
                                    <span class="visually-hidden">Loading...</span>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <script src="{{ asset('js/jquery.min.js') }}"></script>
        <script src="{{ asset('js/sweetalert.js') }}"></script>
        <script src="{{ asset('js/alert.js') }}"></script>
        <script>
            $(document).ready(function() {
                let selected;
                $('#clickable-image').on('click', function() {
                    $('#image-input').click();
                });
                let image;
                $(".spinner-border").css("display", "none");
                $(".login_btn").css("display", "block");
                $('#image-input').on('change', function() {
                    var file = this.files[0];
                    if (file) {
                        var reader = new FileReader();
                        reader.onload = function(e) {
                            $('#clickable-image').attr('src', e.target.result);
                        };
                        reader.readAsDataURL(file);
                    }
                    image = this.files[0];
                });


                $("form#create-organ").on('submit', function(e) {
                    e.preventDefault(); // Prevent the default form submission

                    $(".spinner-border").css("display", "block");
                    $(".login_btn").css("display", "none");
                    var formData = new FormData(this);

                    // console.log("form", image);
                    var formData = new FormData(this);
                    $.ajax({
                        type: "post",
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        },
                        url: "{{ url('user/save_organisation') }}",
                        data: formData,
                        contentType: false,
                        processData: false,
                        success: function(response) {
                            console.log(response)
                            $(".spinner-border").css("display", "none");
                            $(".login_btn").css("display", "block");
                            if (response.code === 201) {
                                Swal.fire({
                                    icon: 'success',
                                    title: response.message,
                                    showConfirmButton: false,
                                    timer: 1000
                                });
                                window.location = "/user/createfundraise/" + response.data

                            } else {
                                Swal.fire({
                                    icon: 'error',
                                    title: response.message,
                                    showConfirmButton: false,
                                    timer: 1500
                                })
                                $(".spinner-border").css("display", "none");
                                $(".login_btn").css("display", "block");

                            }
                        },
                        error: function(data) {
                            // Handle the error response
                            $(".spinner-border").css("display", "none");
                            $(".login_btn").css("display", "block");
                            Swal.fire({
                                icon: 'error',
                                text: 'Something went wrong',
                                showConfirmButton: false,
                                timer: 1500
                            })
                            console.log(data);
                        }
                    });
                })

                function changeSelectedOrgan(id) {
                    selected = id;
                    $("div#organisation_select" + id).addClass("card-organs")
                }

            });
        </script>
    </div>
@endsection
