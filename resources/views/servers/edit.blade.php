<x-layout>
    <div class='bg-gray-50 border border-gray-200 rounded p-6 p-10 max-w-lg mx-auto mt-24'>
        <header class="text-center">
            <h2 class="text-2xl font-bold uppercase mb-1">
                Edit a Server
            </h2>
        </header>

        <form method="POST" action="/servers/{{$server->id}}">
            @csrf
            @method('PUT')
            <div class="mb-6">
                <label for="user_id" class="inline-block text-lg mb-2">Hostname</label><br>
                <select class="bg-transparent border-b" name="user_id">
                    <option disabled @php
                        if ($server->user_id == null) {
                            echo 'selected';
                        }
                    @endphp value>Select</option>
                    <option value="0">Empty</option>
                    @foreach ($users as $user)
                        <option class="text-black" @php
                            if ($server->user_id == $user->id) {
                                echo 'selected';
                            }
                        @endphp value="{{$user->id}}">{{$user->name}}</option>
                    @endforeach
                </select>
                @error('user_id')
                    <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                @enderror
            </div>

            <div class="mb-6">
                <label for="name" class="inline-block text-lg mb-2">Server Name</label>
                <input type="text" placeholder="ott-nds-php-portal-x" class="border border-gray-200 rounded p-2 w-full" name="name" value="{{$server->name}}"/>
                @error('name')
                    <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                @enderror
            </div>

            <div class="mb-6">
                <label for="ip" class="inline-block text-lg mb-2">IPv4 Address</label>
                <input type="text" placeholder="172.28.226.x" class="border border-gray-200 rounded p-2 w-full" name="ip" value="{{$server->ip}}"/>
                @error('ip')
                    <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                @enderror
            </div>

            <div class="mb-6">
                <p class="text-lg mb-2">Server Status</p>
                <label for="up" class="inline-block text-green-500 text-m">Up</label>
                <input type="radio" name="running" id="up" value="1" @if ($server->running) checked @endif>
                <label for="down" class="inline-block text-red-500 text-m ml-2">Down</label>
                <input type="radio" name="running" id="down" value="0" @if (!$server->running) checked @endif>
            </div>

            <div class="mb-6">
                <input type="date" id="datefield" class="border border-gray-200 rounded p-2 w-full" name="date" value="{{$server->available_on}}"/>
                @error("date")
                    <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                @enderror
            </div>

            <div class="mb-6">
                <button class="bg-gray-700 text-white rounded py-2 px-4 hover:bg-black">
                    Update Server
                </button>
                <a href="/servers/manage" class="text-gray-700 hover:text-gray-900 hover:underline ml-4">Back</a>
            </div>
        </form>
    </div>
    <script>
        var today = new Date();
        var dd = today.getDate();
        var mm = today.getMonth() + 1; //January is 0!
        var yyyy = today.getFullYear();

        if (dd < 10) {
            dd = '0' + dd;
        }
        if (mm < 10) {
            mm = '0' + mm;
        } 
            
        today = yyyy + '-' + mm + '-' + dd;
        document.getElementById("datefield").setAttribute("min", today);
    </script>
</x-layout>