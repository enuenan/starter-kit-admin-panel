@if(App::environment('local') && $errors->any())
    <ul class="text-red-600 list-disc list-inside">
        @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
    </ul>
@endif