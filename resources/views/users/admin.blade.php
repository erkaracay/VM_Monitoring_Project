<x-layout>
    <div class='bg-gray-50 border border-gray-200 rounded p-10 max-w-lg mx-auto mt-24'>
        <header class="text-center">
            <h2 class="text-2xl font-bold uppercase mb-1">
                Update a User
            </h2>
            <p class="mb-4">Update or delete a user.</p>
        </header>

        <form method="POST" action="/users/{{$user->id}}/update">
            @csrf
            @method('PUT')
            <div class="mb-6">
                <label for="name" class="inline-block text-lg mb-2">
                    Name Surname
                </label>
                <input type="text" value="{{$user->name}}"
                    class="border border-gray-200 rounded p-2 w-full" name="name"/>

                @error("name")
                    <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                @enderror
            </div>

            <div class="mb-6">
                <label for="email" class="inline-block text-lg mb-2">
                    Email
                </label>
                <input type="email" value="{{$user->email}}"
                    class="border border-gray-200 rounded p-2 w-full" name="email"/>

                @error("email")
                    <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                @enderror
            </div>

            <div class="mb-6">
                <label for="isAdmin" class="block text-lg mb-2">
                    User Type
                </label>
                <label for="down" class="inline-block text-lg">Regular</label>
                <input type="radio" name="isAdmin" id="regular" value="0"
                @if (!$user->isAdmin) checked @endif>
                <label for="up" class="inline-block text-lg ml-2 text-red-500">Admin</label>
                <input type="radio" name="isAdmin" id="admin" value="1"
                @if ($user->isAdmin) checked @endif>
            </div>

            <div class="mb-6">
                <a href="/users/{{$user->id}}/newPassword" class="text-emerald-500 text-lg">
                    Assign New Password
                </a>
            </div>

            <div class="mb-6 flex">
                <button type="submit" class="bg-gray-700 text-white rounded py-2 px-4 hover:bg-black">
                    Update User
                </button>
                <a href="/users/{{$user->id}}/delete" class="text-red-500 ml-2">Delete User</a>
            </div>
        </form>
    </div>
</x-layout>