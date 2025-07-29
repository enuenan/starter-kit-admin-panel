<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>{{ config('app.name') }}</title>
<link rel="stylesheet" href="{{ asset('dashboard/css/custom.css') }}">
@stack('page-css')

@vite(['resources/css/admin.css', 'resources/js/admin.js'])

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

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

    function previewFile2(input) {
        var file2 = $("input#image").get(0).files[0];
        console.log(file2);

        if (file2) {
            var reader2 = new FileReader();

            reader2.onload = function () {
                $("#previewImg2").attr("src", reader2.result);
                $(".previewImg2").attr("src", reader2.result);
            }

            reader2.readAsDataURL(file2);
        }
    }
</script>