<x-layout>
    <div class='bg-gray-50 border border-gray-200 rounded p-10 max-w-lg mx-auto mt-24'>
        <header class="text-center">
            <h2 class="text-2xl font-bold uppercase mb-1">
                Create a User
            </h2>
            <p class="mb-4">Manually create a user as admin.</p>
        </header>

        <form action="/users/adminStore " method="POST">
            @csrf
            <div class="mb-6">
                <label for="name" class="inline-block text-lg mb-2">
                    Name Surname
                </label>
                <input type="text" value="{{old("name")}}"
                    class="border border-gray-200 rounded p-2 w-full" name="name"/>

                @error("name")
                    <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                @enderror
            </div>

            <div class="mb-6">
                <label for="email" class="inline-block text-lg mb-2">
                    Email
                </label>
                <input type="email" value="{{old("email")}}"
                    class="border border-gray-200 rounded p-2 w-full" name="email"/>

                @error("email")
                    <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                @enderror
            </div>

            <div class="mb-6">
                <label for="password" class="inline-block text-lg mb-2">
                    Password
                </label>
                <input type="password" value="{{old("password")}}" class="border border-gray-200 rounded p-2 w-full" name="password"/>

                @error("password")
                    <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                @enderror
            </div>

            <div class="mb-6">
                <label for="isAdmin" class="block text-lg mb-2">
                    User Type
                </label>
                <label for="down" class="inline-block text-lg">Regular</label>
                <input type="radio" name="isAdmin" id="regular" value="0" checked>
                <label for="up" class="inline-block text-lg ml-2 text-red-500">Admin</label>
                <input type="radio" name="isAdmin" id="admin" value="1">
            </div>

            <div class="mb-6">
                <button type="submit" class="bg-gray-700 text-white rounded py-2 px-4 hover:bg-black">
                    Create User
                </button>
            </div>
        </form>
    </div>
</x-layout>