@extends('layouts.master')
@section("title", 'Payment')
@section('content')
<script src="https://js.stripe.com/v3/"></script>
<style>
    /* .form-group {
        margin-bottom: 20px;
    }

    label {
        font-weight: bold;
    }

    #card-element {
        border: 1px solid #ccc;
        padding: 10px;
    }

    #card-element input.InputElement {
        display: block !important;
        width: 100%;
        border: #ccc 1px solid;
    }

    #card-errors {
        color: red;
    }

    button {
        background-color: #007bff;
        color: white;
        border: none;
        padding: 10px 20px;
        cursor: pointer;
    }

    .container {
        width: 100vw;
        height: 100vh;
        display: flex;
        justify-content: center;
        align-items: center;
    }

    .card {
        width: 500px;
        padding: 12px;
    } */

    .contaner{
      min-height: 50vh;
      display: flex;
      align-items: center
    }
</style>


<div class="container">  
<div class="card">
<form id="payment-form">
    <div id="card-element">
    <input type="text" placeholder="name">
    </div>
  

    <div id="card-errors" role="alert"></div>
  
    <button id="submit">Submit Payment</button>
  </form>
</div>
</div>

</body>

{{-- <script src="https://js.stripe.com/v3/"></script> --}}

<script type="text/javascript">
var stripe = Stripe('pk_test_51HIb63EFkSOsWovisUIYQnHQYmDyy4JyKG8mR7Xi3QERnSRzkjDAMREtYNI2CpoZuexenug0MW92ZMfFrW2W7RSn000UZ0R2Rn');
var elements = stripe.elements();

var style = {
base: {
color: "#32325d",
}
};

var card = elements.create("card", { style: style });
card.mount("#card-element");

card.on('change', ({error}) => {
let displayError = document.getElementById('card-errors');
if (error) {
displayError.textContent = error.message;
} else {
displayError.textContent = '';
}
});
</script>
@endsection