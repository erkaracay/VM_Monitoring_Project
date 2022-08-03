<x-layout>
    <div class='bg-gray-50 border border-gray-200 rounded p-6 p-10 max-w-lg mx-auto mt-24'>
        <header class="text-center">
            <h2 class="text-2xl font-bold uppercase mb-1">
                Create a Server
            </h2>
        </header>

        <form method="POST" action="/servers">
            @csrf
            <div class="mb-6">
                <label for="name" class="inline-block text-lg mb-2">Server Name</label>
                <input type="text" placeholder="ott-nds-php-portal-x" class="border border-gray-200 rounded p-2 w-full" name="name" value="{{old('name')}}"/>
                @error('name')
                    <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                @enderror
            </div>

            <div class="mb-6">
                <label for="ip" class="inline-block text-lg mb-2">IPv4 Address</label>
                <input type="text" placeholder="172.28.226.x" class="border border-gray-200 rounded p-2 w-full" name="ip" value="{{old('ip')}}"/>
                @error('ip')
                    <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                @enderror
            </div>

            <div class="mb-6">
                <button type="submit" class="bg-gray-700 text-white rounded py-2 px-4 hover:bg-black">
                    Create Server
                </button>

                <a href="/servers/manage" class="text-gray-700 hover:text-gray-900 hover:underline ml-4">Back</a>
            </div>
        </form>
    </div>
</x-layout>