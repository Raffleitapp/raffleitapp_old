<!doctype html>
<html>
@include('layouts.head')

<body>
    @include('layouts.header')
    <div class="container p-3 d-flex justify-content-center align-items-center">
        <div class="col-md-6">
            @yield('content')
        </div>
    </div>
    @include('layouts.footer')
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous">
    </script>

    <script src="{{ asset('js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('js/jquery.min.js') }}"></script>

    <script>
        // $("div.toggle").hide();
        let toggle = false;

        if ($(window).width() < 961) {
            // $('.content-container').load('mobile-content.html');
            $("div.toggle").show();
            $(".conta").css("display", "none");

        } else {
            // $('.content-container').load('desktop-content.html');
            $("div.toggle").hide();
            $(".conta").css("display", "flex");
            toggle = false;
        }
        $(window).resize(function() {
            if ($(window).width() < 961) {
                $("div.toggle").show();
                $(".conta").css("display", "none");

            } else {
                $("div.toggle").hide();
                $(".conta").css("display", "flex");
                toggle = false;

            }
        });
        $('div.toggle').click(function() {

            if (!toggle) {
                $(".conta").css("display", "block");
                toggle = true;

            } else {
                $(".conta").css("display", "none");
                toggle = false;
            }

        });
    </script>
</body>

</html>
