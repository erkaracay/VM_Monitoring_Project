<x-layout>
    <div class='bg-gray-50 border border-gray-200 rounded p-10 max-w-lg mx-auto mt-24'>
        <header class="text-center">
            <h2 class="text-2xl font-bold uppercase mb-1">
                Claim Server
            </h2>
            <h2 class="text-2xl font-bold uppercase mb-1">
                {{$server->name}}
            </h2>
                <p class="mb-4">Enter a date to unclaim this server.</p>
        </header>

        <form action="/servers/confirmClaim" method="POST">
            @csrf
            <div class="mb-6">
                <input type="date" id="datefield" class="border border-gray-200 rounded p-2 w-full" name="date"/>
                <input type="hidden" name="id" value="{{$server->id}}">
                @error("date")
                    <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                @enderror
            </div>

            <div class="mb-6">
                <button type="submit" class="bg-gray-700 text-white rounded py-2 px-4 hover:bg-black">
                    Confirm
                </button>
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
