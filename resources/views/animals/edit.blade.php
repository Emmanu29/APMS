@include('partials.header', [$title])
<header class="max-w-lg mx-auto mt-5">
    <a href="#">
        <h1 class="text-4xl font-bold text-black text-center">Edit {{$animal->name}}</h1>
    </a>
</header>

<main class="bg-green-300 max-w-lg mx-auto p-8 my-10 rounded-lg shadow-2xl mt-5 mb-10">
    <section>
        <h1 class="font-bold text-2xl ont-bold text-center">Welcome to Animal Patient Monitoring</h1>
    </section>

    <section class="mt-10">
        <form action="/animal/{{$animal->id}}" method="POST" class="max-w-lg mx-auto bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4">
                @method('PUT')
                @csrf 
                <div class="mb-4">
                <label for="species" class="block text-gray-700 text-sm font-bold mb-2">Species</label>
                <select id="species" name="species" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                    <option value="">Select Species</option>
                    @foreach ($speciesList as $species)
                        <option value="{{ $species }}" {{ $animal->species->name == $species ? 'selected' : '' }}>{{ $species }}</option>
                    @endforeach
                </select>
                @error('species')
                    <p class="text-red-500 text-xs mt-2 p-1">{{ $message }}</p> 
                @enderror
            </div>


            <div class="mb-4">
                <label for="name" class="block text-gray-700 text-sm font-bold mb-2">Name</label>
                <input type="text" id="name" name="name" placeholder="Name" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" value="{{$animal->name}}">
                @error('name')
                    <p class="text-red-500 text-xs mt-2 p-1">{{$message}}</p> 
                @enderror
            </div>

            <div class="mb-4">
                <label for="weight" class="block text-gray-700 text-sm font-bold mb-2">Weight</label>
                <input type="number" step="0.01" id="weight" name="weight" placeholder="Weight" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" value="{{$animal->weight}}">
                @error('weight')
                    <p class="text-red-500 text-xs mt-2 p-1">{{ $message }}</p> 
                @enderror
            </div>

            <div class="mb-4">
                <label for="age" class="block text-gray-700 text-sm font-bold mb-2">Age</label>
                <input type="number" id="age" name="age" placeholder="Age" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" value="{{$animal->age}}">
                @error('age')
                    <p class="text-red-500 text-xs mt-2 p-1">{{$message}}</p> 
                @enderror
            </div>

            <div class="mb-4">
                <label for="sex" class="block text-gray-700 text-sm font-bold mb-2">Sex</label>
                <select id="sex" name="sex" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                    <option value="" {{$animal->sex == "" ? 'selected' : ''}}></option>
                    <option value="Male" {{$animal->sex == "Male" ? 'selected' : ''}}>Male</option>
                    <option value="Female" {{$animal->sex == "Female" ? 'selected' : ''}}>Female</option>
                </select>
                @error('sex')
                    <p class="text-red-500 text-xs mt-2 p-1">{{$message}}</p> 
                @enderror
            </div> 

            <div class="mb-6">
                <label for="health_history" class="block text-gray-700 text-sm font-bold mb-2">Health History</label>
                <textarea id="health_history" name="health_history" placeholder="Health History" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">{{$animal->health_history}}</textarea>
                @error('health_history')
                    <p class="text-red-500 text-xs mt-2 p-1">{{ $message }}</p> 
                @enderror
            </div>

            <div class="mb-4">
                <label for="diagnosis" class="block text-gray-700 text-sm font-bold mb-2">Diagnosis</label>
                <input type="text" id="diagnosis" name="diagnosis" placeholder="Diagnosis" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" value="{{$animal->diagnosis}}">
                @error('diagnosis')
                    <p class="text-red-500 text-xs mt-2 p-1">{{ $message }}</p> 
                @enderror
            </div>

            <div class="mb-4">
                <label for="owner_name" class="block text-gray-700 text-sm font-bold mb-2">Owner Name</label>
                <input type="text" id="owner_name" name="owner_name" placeholder="Owner Name" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" value="{{$animal->owner_name}}">
                @error('owner_name')
                    <p class="text-red-500 text-xs mt-2 p-1">{{ $message }}</p> 
                @enderror
            </div>

            <div class="mb-4">
                <label for="owner_number" class="block text-gray-700 text-sm font-bold mb-2">Owner Number</label>
                <input type="text" id="owner_number" name="owner_number" placeholder="Owner Number" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" value="{{$animal->owner_number}}">
                @error('owner_number')
                    <p class="text-red-500 text-xs mt-2 p-1">{{ $message }}</p> 
                @enderror
            </div>

            <div class="flex items-center justify-between">
                <button type="submit" class=" w-full bg-green-600 hover:bg-green-700 text-white font-bold py-2 mb-4 px-4 rounded focus:outline-none focus:shadow-outline">
                    Update
                </button>
            </div>
        </form>
        
        <form action="{{ route('animal.destroy', $animal) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete {{$animal->name}}')">   
                    @csrf
                    @method('delete')
                        <button type="submit"class="w-full mt-5 bg-red-600 hover:bg-orange-600 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
                            Delete
                        </button>
                </form>     
    </section>
</main>
@include('partials.footer')
