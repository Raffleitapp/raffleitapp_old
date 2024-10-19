@extends('layouts.reguser')
@section('title', 'Complete Profile')
@section('content')
    <meta name="csrf-token" content="{{ csrf_token() }}" />

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://js.stripe.com/v3/"></script>
    @vite(['resources/scss/app.scss'])
    <style>
        .form-group label {
            color: #303030;
            /* H5 Bold */
            font-family: Poppins;
            font-size: 12px;
            font-style: normal;
            font-weight: 700;
            line-height: 140%;
        }

        .card {
            max-width: 700px;
            border-radius: 12px;
            border: none;
        }

        .credit-card-form {
            max-width: 400px;
            margin: 0 auto;
            padding: 20px;
            background-color: #f5f5f5;
            /* border: 1px solid #ccc; */
            border-radius: 5px;
            border-radius: 12px;

        }

        .form-group {
            margin-bottom: 12px;
        }

        label {
            display: block;
            font-weight: bold;
        }

        input[type="text"],
        input[type="number"],
        .form-group input {
            width: 100%;
            padding: 5px;
            outline: none;
            border: 1px solid #ccc !important;
            border-radius: 5px;
            font-size: 14px;
        }

        .card-details {
            display: flex;
            justify-content: space-between;
            /* align-items: center */
        }

        .card-expiration,
        .card-cvv {
            flex: 1;
            margin-right: 10px;
            align-items: center
        }

        .button-container {
            text-align: center;
        }

        button[type="submit"] {
            padding: 10px 20px;
            border-radius: 12px;
            background: var(--Button-Color, #55C595);
            color: #fff;
            border: none;
            width: 100%;
            border-radius: 3px;
            cursor: pointer;
        }

        /* Variables */
        * {
            box-sizing: border-box;
        }

        /* body {
                          font-family: -apple-system, BlinkMacSystemFont, sans-serif;
                          font-size: 16px;
                          -webkit-font-smoothing: antialiased;
                          display: flex;
                          justify-content: center;
                          align-content: center;
                          height: 100vh;
                          width: 100vw;
                        } */

        form {
            width: 30vw;
            min-width: 500px;
            align-self: center;
            box-shadow: 0px 0px 0px 0.5px rgba(50, 50, 93, 0.1),
                0px 2px 5px 0px rgba(50, 50, 93, 0.1), 0px 1px 1.5px 0px rgba(0, 0, 0, 0.07);
            border-radius: 7px;
            padding: 40px;
        }

        .hidden {
            display: none;
        }

        #payment-message {
            color: rgb(105, 115, 134);
            font-size: 16px;
            line-height: 20px;
            padding-top: 12px;
            text-align: center;
        }

        #payment-element {
            margin-bottom: 24px;
        }

        /* Buttons and links */
        button {
            background: #215273;
            font-family: "Poppins", sans-serif;
            color: #ffffff;
            border-radius: 12px;
            border: 0;
            padding: 12px 16px;
            font-size: 16px;
            font-weight: 600;
            cursor: pointer;
            display: block;
            transition: all 0.2s ease;
            box-shadow: 0px 4px 5.5px 0px rgba(0, 0, 0, 0.07);
            width: 100%;
        }

        button:hover {
            filter: contrast(115%);
        }

        button:disabled {
            opacity: 0.5;
            cursor: default;
        }

        /* spinner/processing state, errors */
        .spinner,
        .spinner:before,
        .spinner:after {
            border-radius: 50%;
        }

        .spinner {
            color: #ffffff;
            font-size: 22px;
            text-indent: -99999px;
            margin: 0px auto;
            position: relative;
            width: 20px;
            height: 20px;
            box-shadow: inset 0 0 0 2px;
            -webkit-transform: translateZ(0);
            -ms-transform: translateZ(0);
            transform: translateZ(0);
        }

        .spinner:before,
        .spinner:after {
            position: absolute;
            content: "";
        }

        .spinner:before {
            width: 10.4px;
            height: 20.4px;
            background: #215273;
            border-radius: 20.4px 0 0 20.4px;
            top: -0.2px;
            left: -0.2px;
            -webkit-transform-origin: 10.4px 10.2px;
            transform-origin: 10.4px 10.2px;
            -webkit-animation: loading 2s infinite ease 1.5s;
            animation: loading 2s infinite ease 1.5s;
        }

        .spinner:after {
            width: 10.4px;
            height: 10.2px;
            background: #215273;
            border-radius: 0 10.2px 10.2px 0;
            top: -0.1px;
            left: 10.2px;
            -webkit-transform-origin: 0px 10.2px;
            transform-origin: 0px 10.2px;
            -webkit-animation: loading 2s infinite ease;
            animation: loading 2s infinite ease;
        }

        @-webkit-keyframes loading {
            0% {
                -webkit-transform: rotate(0deg);
                transform: rotate(0deg);
            }

            100% {
                -webkit-transform: rotate(360deg);
                transform: rotate(360deg);
            }
        }

        @keyframes loading {
            0% {
                -webkit-transform: rotate(0deg);
                transform: rotate(0deg);
            }

            100% {
                -webkit-transform: rotate(360deg);
                transform: rotate(360deg);
            }
        }

        @media only screen and (max-width: 600px) {
            form {
                width: 80vw;
                min-width: initial;
            }
        }
    </style>
    <div class="container align-items-center min-h-full p-3">
        <div class="card p-3">

            <div id="payment-message" class="hidden alert alert-danger" role="alert"></div>

            <!-- Display a payment form -->
            <form id="payment-form">
                @csrf

                <div class="form-group">
                    <label for="">Name on card</label>
                    <input type="text" required autocomplete="off" id="card_name" name="card_name"
                        placeholder="Enter name on card" class="form-control">
                </div>
                <div class="form-group">
                    <label for="">Email Address</label>
                    <input type="email" required autocomplete="off" id="card_email" name="card_email"
                        placeholder="Enter your email address" class="form-control">
                </div>
                <div id="payment-element">


                </div>
                <button id="submit">
                    <div class="spinner hidden" id="spinner"></div>
                    <span id="button-text">Pay now</span>
                </button>
            </form>
        </div>


    </div>

    @php
        $pay_data = DB::table('payment_settings')
            ->where('id', 1)
            ->first();

    @endphp
    <script src="{{ asset('js/jquery.min.js') }}"></script>
    <script src="{{ asset('js/sweetalert.js') }}"></script>
    <script src="{{ asset('js/alert.js') }}"></script>
    <script>
        // This is your test publishable API key.
        const stripe = Stripe(
            "{{ $pay_data->payment_name }}"
        );

        // The items the customer wants to buy
        const items = [{
            id: "xl-tshirt"
        }];

        let elements;


        // initialize();
        checkStatus();
        const customer = JSON.parse(localStorage.getItem('myData'));

        const param = {
            amount: customer.amount,
            total_raffle: customer.total_raffle,
            raffle_id: customer.raffle_id,
            pay_type: customer.type
        }
        $("#button-text").text(`Pay $${customer.amount} Now`)
        $.ajax({
            type: "POST",
            headers: {
                "Content-Type": "application/json",
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            url: "{{ url('/createPay') }}",
            data: JSON.stringify(param),
            dataType: "json",
            success: function(response) {

                const appearance = {
                    theme: 'stripe',
                    variables: {
                        colorPrimary: '#215273',
                        colorBackground: '#ffffff',
                        colorText: '#30313d',
                        colorDanger: '#df1b41',
                        fontFamily: 'Ideal Sans, system-ui, sans-serif',
                        spacingUnit: '2px',
                        borderRadius: '4px',
                        // See all possible variables below
                    }
                };

                console.log(response);
                const clientSecret = response.clientSecret
                elements = stripe.elements({
                    clientSecret,
                    appearance
                });

                const paymentElementOptions = {
                    layout: "tabs",
                };

                const paymentElement = elements.create("payment", paymentElementOptions);
                paymentElement.mount("#payment-element");
                $(".p-PaymentAccordionButtonText").text('Details')
            }
        });

        // document
        //     .querySelector("#payment-form")
        //     .addEventListener("submit", handleSubmit);

        let emailAddress = '';

        $(document).ready(() => {
            $('#payment-form').submit((e) => {
                e.preventDefault();
                setLoading(true);
                const name = $("#card_name").val();
                const email = $("#card_email").val();

                // const {error} = stripe.confirmPayment({
                //     elements,
                //     confirmParams: {
                //         // Make sure to change this to your payment completion page
                //         {{-- return_url: "{{ url('/payment_success') }}", --}}
                //         return_url: "{{ url('/payment_success') }}",
                //         payment_method_data: {
                //             billing_details: {
                //                 name: name,
                //                 email: email,
                //             },

                //         },
                //     },

                // });

                stripe.confirmPayment({
                    elements,
                    confirmParams: {
                        // Make sure to change this to your payment completion page
                        {{-- return_url: "{{ url('/payment_success') }}", --}}
                        return_url: "{{ url('/payment_success') }}",
                        payment_method_data: {
                            billing_details: {
                                name: name,
                                email: email,
                            },

                        },
                    },

                }).then((result) => {
                    // console.log(result);
                    const error = result.error;

                    if (error.type === "card_error" || error.type === "validation_error" || error
                        .type === "card_declined") {
                        setLoading(false);
                        showMessage(error.message);
                    } else {
                        showMessage("An unexpected error occurred.");
                        setLoading(false);

                    }

                }).catch((err) => {
                    console.log(err);
                });


                // setLoading(false);
//

            });
        })

        // Fetches the payment intent status after payment submission
        async function checkStatus() {
            const clientSecret = new URLSearchParams(window.location.search).get(
                "payment_intent_client_secret"
            );

            if (!clientSecret) {
                return;
            }

            const {
                paymentIntent
            } = await stripe.retrievePaymentIntent(clientSecret);

            switch (paymentIntent.status) {
                case "succeeded":
                    showMessage("Payment succeeded!");
                    showSuccessMsg("Payment succeeded!");
                    window.location.href = "payment_success"
                    break;
                case "processing":
                    showMessage("Your payment is processing.");
                    break;
                case "requires_payment_method":
                    showMessage("Your payment was not successful, please try again.");
                    break;
                default:
                    showMessage("Something went wrong.");
                    break;
            }
        }

        // ------- UI helpers -------

        function showMessage(messageText) {
            const messageContainer = document.querySelector("#payment-message");

            messageContainer.classList.remove("hidden");
            messageContainer.textContent = messageText;

            // setTimeout(function() {
            //     messageContainer.classList.add("hidden");
            //     messageContainer.textContent = "";
            // }, 4000);
        }

        // Show a spinner on payment submission
        function setLoading(isLoading) {
            if (isLoading) {
                // Disable the button and show a spinner
                document.querySelector("#submit").disabled = true;
                document.querySelector("#spinner").classList.remove("hidden");
                document.querySelector("#button-text").classList.add("hidden");
            } else {
                document.querySelector("#submit").disabled = false;
                document.querySelector("#spinner").classList.add("hidden");
                document.querySelector("#button-text").classList.remove("hidden");
            }
        }
    </script>
@endsection
