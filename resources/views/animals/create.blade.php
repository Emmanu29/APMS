@include('partials.header', [$title])

<?php $array = array('title' => 'Student System') ;?>
<x-nav :data="$array"/>

<header class="max-w-lg mx-auto mt-5">
    <a href="#">
        <h1 class="text-4xl font-bold text-black text-center">Add New Animal</h1>
    </a>
</header>

<main class="bg-green-300 max-w-lg mx-auto p-8 my-10 rounded-lg shadow-2xl mt-5 mb-10">
    <section>
        <h1 class="font-bold text-2xl ont-bold text-center">Welcome to Animal Patient Monitoring</h1>
    </section>

    <section class="mt-10">
        <form action="/add/animal" method="POST" class="max-w-lg mx-auto bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4">
            @csrf
            
            <div class="mb-4">
                <label for="species" class="block text-gray-700 text-sm font-bold mb-2">Species</label>
                <select id="species" name="species" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                    <option value="">Select Species</option>
                    @foreach ($species as $optionValue)
                        <option value="{{ $optionValue }}">{{ $optionValue }}</option>
                    @endforeach
                </select>
                @error('species')
                    <p class="text-red-500 text-xs mt-2 p-1">{{$message}}</p> 
                @enderror
            </div>

            <div class="mb-4">
                <label for="name" class="block text-gray-700 text-sm font-bold mb-2">Name</label>
                <input type="text" id="name" name="name" placeholder="Name" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" value="{{old('name')}}">
                @if ($errors->has('name'))
                    <p class="text-red-500 text-xs mt-2 p-1">{{ $errors->first('name') }}</p>
                @endif
            </div>

            <div class="mb-4">
                <label for="weight" class="block text-gray-700 text-sm font-bold mb-2">Weight</label>
                <input type="number" step="0.01" id="weight" name="weight" placeholder="Weight" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" value="{{ old('weight') }}">
                @error('weight')
                    <p class="text-red-500 text-xs mt-2 p-1">{{ $message }}</p> 
                @enderror
            </div>

            <div class="mb-4">
                <label for="age" class="block text-gray-700 text-sm font-bold mb-2">Age</label>
                <input type="number" id="age" name="age" placeholder="Age" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" value="{{old('age')}}">
                @error('age')
                    <p class="text-red-500 text-xs mt-2 p-1">{{$message}}</p> 
                @enderror
            </div>

            <div class="mb-4">
                <label for="sex" class="block text-gray-700 text-sm font-bold mb-2">Sex</label>
                <select id="sex" name="sex" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                    @foreach(['', 'Male', 'Female'] as $optionValue)
                        <option value="{{ $optionValue }}" {{ old('sex') == $optionValue ? 'selected' : '' }}>
                            {{ $optionValue ?: 'Select Sex' }}
                        </option>
                    @endforeach
                </select>
                @error('sex')
                    <p class="text-red-500 text-xs mt-2 p-1">{{$message}}</p> 
                @enderror
            </div> 

            <div class="mb-6">
                <label for="health_history" class="block text-gray-700 text-sm font-bold mb-2">Health History</label>
                <textarea id="health_history" name="health_history" placeholder="Health History" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">{{ old('health_history') }}</textarea>
                @error('health_history')
                    <p class="text-red-500 text-xs mt-2 p-1">{{ $message }}</p> 
                @enderror
            </div>

            <div class="mb-4">
                <label for="diagnosis" class="block text-gray-700 text-sm font-bold mb-2">Diagnosis</label>
                <input type="text" id="diagnosis" name="diagnosis" placeholder="Diagnosis" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" value="{{ old('diagnosis') }}">
                @error('diagnosis')
                    <p class="text-red-500 text-xs mt-2 p-1">{{ $message }}</p> 
                @enderror
            </div>

            <div class="mb-4">
                <label for="owner_name" class="block text-gray-700 text-sm font-bold mb-2">Owner Name</label>
                <input type="text" id="owner_name" name="owner_name" placeholder="Owner Name" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" value="{{ old('owner_name') }}">
                @error('owner_name')
                    <p class="text-red-500 text-xs mt-2 p-1">{{ $message }}</p> 
                @enderror
            </div>

            <div class="mb-4">
                <label for="owner_number" class="block text-gray-700 text-sm font-bold mb-2">Owner Number</label>
                <input type="number" id="owner_number" name="owner_number" placeholder="Owner Number" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" value="{{ old('owner_number') }}">
                @error('owner_number')
                    <p class="text-red-500 text-xs mt-2 p-1">{{ $message }}</p> 
                @enderror
            </div>

            <div class="flex items-center justify-between">
                <button type="submit" class="w-full bg-green-600 hover:bg-green-700 text-white font-bold py-2 mb-4 px-4 rounded focus:outline-none focus:shadow-outline">
                    Add New
                </button>
            </div>
        </form>
    </section>
</main>
@include('partials.footer')
