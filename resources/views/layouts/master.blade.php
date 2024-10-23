<!doctype html>
<html>
@include('layouts.head')

<body>
    @include('layouts.header')
    <div class="master-container">
        @yield('content')
    </div>
    @include('layouts.footer')
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous">
    </script>

    <script>
        // $("div.toggle").hide();
        let toggle = false;
        if ($(window).width() < 961) {
            $("div.toggle").show();
            $(".conta").css("display", "none");
        } else {
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
                $(".conta").css("z-index", 999);
                $(".conta").css("display", "flex");
                toggle = false;

            }
        });
        $('div.toggle').click(function() {

            if (!toggle) {
                $(".conta").css("display", "block");
                $(".conta").css("z-index", "999");

                toggle = true;

            } else {
                $(".conta").css("display", "none");
                toggle = false;
            }

        });
    </script>
</body>

</html>
