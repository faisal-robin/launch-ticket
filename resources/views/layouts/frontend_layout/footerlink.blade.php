<!--Jquery js-->
<script src="{{asset('public')}}/frontend_asset/js/jquery.min.js"></script>
<script src="{{ asset('public/frontend_asset/js/jquery-ui.min.js') }}"></script>
<!-- Popper JS -->

<script src="{{asset('public')}}/frontend_asset/js/popper.min.js"></script>
<!--Bootstrap js-->
<script src="{{asset('public')}}/frontend_asset/js/bootstrap.min.js"></script>
<!--Owl-Carousel js-->
<script src="{{asset('public')}}/frontend_asset/js/owl.carousel.min.js"></script>
<!--Animatedheadline js-->
<script src="{{asset('public')}}/frontend_asset/js/jquery.animatedheadline.min.js"></script>
<!--Slicknav js-->
<script src="{{asset('public')}}/frontend_asset/js/jquery.slicknav.min.js"></script>
<!--Magnific js-->
<script src="{{asset('public')}}/frontend_asset/js/jquery.magnific-popup.min.js"></script>
<!-- Datepicker -->
<script src="{{asset('public')}}/frontend_asset/js/jquery.datepicker.min.js"></script>
<!--Nice Select js-->
<script src="{{asset('public')}}/frontend_asset/js/jquery.nice-select.min.js"></script>
<!-- Way Points JS -->
<script src="{{asset('public')}}/frontend_asset/js/waypoints-min.js"></script>
<!-- Sticky sidebar JS -->
<script src="{{asset('public')}}/frontend_asset/js/jquery.sticky-sidebar.min.js"></script>
<!-- niceCountryInput js -->
<script src="{{asset('public')}}/frontend_asset/js/niceCountryInput.js"></script>
<!--Main js-->
<script src="{{asset('public')}}/frontend_asset/js/main.js"></script>

<!—- ShareThis BEGIN -—>
<!-- <script async src="https://platform-api.sharethis.com/js/sharethis.js#property=5e524534fb5dd10012827de6&product=sticky-share-buttons"></script> -->
<!—- ShareThis END -—>

<!-- Smartsupp Live Chat script -->
<script type="text/javascript">
var _smartsupp = _smartsupp || {};
_smartsupp.key = 'cd7f3b02734a47c2610e70bb02c46ef98cec330f';
window.smartsupp || (function (d) {
    var s, c, o = smartsupp = function () {
        o._.push(arguments)
    };
    o._ = [];
    s = d.getElementsByTagName('script')[0];
    c = d.createElement('script');
    c.type = 'text/javascript';
    c.charset = 'utf-8';
    c.async = true;
    c.src = 'https://www.smartsuppchat.com/loader.js?';
    s.parentNode.insertBefore(c, s);
})(document);
</script>

    <!-- <script>
    var tag = document.createElement('script');
    tag.src = "https://www.youtube.com/iframe_api";
    var firstScriptTag = document.getElementsByTagName('script')[0];
    firstScriptTag.parentNode.insertBefore(tag, firstScriptTag);

    var player;
    function onYouTubeIframeAPIReady() {
        player = new YT.Player('player', {
        videoId: 'JPe2mwq96cw',
        playerVars: {
            autoplay: 1,
            controls: 0,
            modestbranding: 1,
            loop: 1,
            playlist: 'JPe2mwq96cw'
        }
        });
    }
    </script> -->

<script>
    // CSRF Token
    var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
    $(document).ready(function () {
        //get country
        $("#search_departure").autocomplete({
            source: function (request, response) {
                // Fetch data
                $.ajax({
                    url: "{{ url('get-terminal') }}",
                    type: 'get',
                    dataType: "json",
                    data: {
                        _token: CSRF_TOKEN,
                        search: request.term
                    },
                    success: function (data) {
                        response(data);
                        console.log(data);
                    }
                });
            },
            select: function (event, ui) {
                if ($('#search_arrival').val() !== ui.item.label) {
                    // Set selection
                    $(this).val(ui.item.label); // display the selected text
                    $('#search_departure_id').val(ui.item.value); // save selected id to input
                    return false;
                } else {
                    alert('Terminal already selected!');
                    $(this).val(""); // display the selected text
                    $('#search_departure_id').val(""); // save selected id to input
                    return false;
                }

            }
        });
        $("#search_arrival").autocomplete({
            source: function (request, response) {
                // Fetch data
                $.ajax({
                    url: "{{ url('get-terminal') }}",
                    type: 'get',
                    dataType: "json",
                    data: {
                        _token: CSRF_TOKEN,
                        search: request.term
                    },
                    success: function (data) {
                        response(data);
                        console.log(data);
                    }
                });
            },
            select: function (event, ui) {
                if ($('#search_departure').val() !== ui.item.label) {
                    // Set selection
                    $(this).val(ui.item.label); // display the selected text
                    $('#search_arrival_id').val(ui.item.value); // save selected id to input
                    return false;
                } else {
                    alert('Terminal already selected!');
                    $(this).val(""); // display the selected text
                    $('#search_arrival_id').val(""); // save selected id to input
                    return false;
                }
            }
        });


    });

    function onChangeCallback(ctr) {
        console.log("The country was changed: " + ctr);
        //$("#selectionSpan").text(ctr);
    }

    
</script>