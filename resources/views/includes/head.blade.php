<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>{{ config('app.name') }}</title>
<link rel="stylesheet" href="{{ asset('dashboard/css/custom.css') }}">
@stack('page-css')

@vite(['resources/css/admin.css', 'resources/js/admin.js'])

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="{{ asset('dashboard/js/appearance.js') }}"></script>

<link rel="stylesheet" href="https://site-assets.fontawesome.com/releases/v6.7.2/css/all.css">

<link rel="stylesheet" href="{{ asset('dashboard/css/lightbox.css') }}">
<script src="{{ asset('dashboard/js/lightbox.js') }}"></script>

<script>
    function previewFile(input) {
        var file = $("input#image").get(0).files[0];

        if (file) {
            var reader = new FileReader();

            reader.onload = function () {
                $("#previewImg").attr("src", reader.result);
                $(".previewImg").attr("src", reader.result);
            }

            reader.readAsDataURL(file);
        }
    }
</script>