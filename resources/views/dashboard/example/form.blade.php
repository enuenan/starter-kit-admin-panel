<x-forms.form action="{{ isset($user) ? route('user.update', $user) : route('user.store') }}"
    method="{{ isset($user) ? 'PUT' : 'POST' }}" enctype>

    <div class="grid lg:grid-cols-2 lg:gap-4">
        <div class="my-4">
            <x-forms.input label="Username" name="username" type="text" required
                value="{{ old('username', isset($user) ? $user?->username : '') }}" />
        </div>

        <div class="my-4">
            <x-forms.input label="Name" name="name" type="text" required
                value="{{ old('name', isset($user) ? $user?->name : '') }}" />
        </div>

        <div class="my-4">
            <x-forms.input label="Email" name="email" type="email" required
                value="{{ old('email', isset($user) ? $user?->email : '') }}" />
        </div>

        <div class="my-4">
            <x-forms.input label="Password" name="password" type="password" :required="!isset($user)"
                value="{{ old('password') }}" />
        </div>

        <div class="my-4">
            <x-forms.input label="Image" name="image" type="file" :file="isset($user) ? $user->attr_user_image : ''" />
        </div>
    </div>

    <x-forms.footer :buttonText="isset($user) ? 'Update' : 'Submit'" />

</x-forms.form>