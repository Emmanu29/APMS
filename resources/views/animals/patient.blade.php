@include('partials.header')
<?php $array = array('title' => 'Student System') ;?>
<x-nav :data="$array"/>

<div class="max-w-lg mx-auto mt-5">
    <a href="#">
        <h1 class="text-4xl font-bold text-green-900 dark:text-gray-900 text-center">Animals' List</h1>
    </a>
</div>

<div class="relative overflow-x-auto shadow-2xl sm:rounded-lg mt-5 bg-blue-100 dark:bg-gray-800 max-w-6xl mx-auto mb-10 style="margin-top: 5rem;">
    <table class="w-full text-sm text-left rtl:text-right text-gray-700 dark:text-gray-400">
        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
            <tr>
                <th scope="col" class="px-6 py-3">
                    Species
                </th>
                <th scope="col" class="px-6 py-3">
                    Name
                </th>
                <!-- <th scope="col" class="px-6 py-3">
                    Weight
                </th>
                <th scope="col" class="px-6 py-3">
                    Age
                </th>
                <th scope="col" class="px-6 py-3">
                    Sex
                </th> -->
                <th scope="col" class="px-6 py-3">
                    Reason for Appointment
                </th>
                <th scope="col" class="px-6 py-3">
                    Diagnosis
                </th>
                <th scope="col" class="px-6 py-3">
                    Date
                </th>
                <th scope="col" class="px-6 py-3">
                    Owner Name
                </th>
                <th scope="col" class="px-6 py-3">
                    Owner Number
                </th>
                <th scope="col" class="px-6 py-3">
                    <span class="sr-only">Edit</span>
                </th>
            </tr>
        </thead>
        <tbody>
            @foreach ($animals as $animal)
            <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600 text-white">
                    <td class="px-6 py-4 font-medium text-white-900 whitespace-nowrap">
                        {{ $animal->species->name }}
                    </td>
                    <td class="px-6 py-4">
                        {{ $animal->name }}
                    </td>
                    <!-- <td class="px-6 py-4">
                        {{ $animal->weight }}
                    </td>
                    <td class="px-6 py-4">
                        {{ $animal->age }}
                    </td>
                    <td class="px-6 py-4">
                        {{ $animal->sex }}
                    </td> -->
                    <td class="px-6 py-4">
                        {{ $animal->health_history }}
                    </td>
                    <td class="px-6 py-4">
                        {{ $animal->diagnosis }}
                    </td>
                    <td class="px-6 py-4">
                        {{ \Carbon\Carbon::parse($animal->dateTime)->formatLocalized('%B %d, %Y %I:%M %p') }}
                    </td>
                    <td class="px-6 py-4">
                        {{ $animal->owner_name }}
                    </td>
                    <td class="px-6 py-4">
                        {{ $animal->owner_number }}
                    </td>
                    <td class="px-6 py-4 text-right">
                        <a href="/animal/{{ $animal->id }}" class="font-medium text-blue-600 dark:text-blue-500 hover:underline">View</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
        <div class="mx-auto max-w-lg pt-6 p-4 flex justify-center">
        <nav role="navigation" aria-label="Pagination">
            <ul class="flex list-none">
                {{-- Previous Page Link --}}
                @if ($animals->onFirstPage())
                    <li class="mr-2 disabled" aria-disabled="true" aria-label="@lang('pagination.previous')">
                        <span class="bg-gray-300 text-gray-600 px-3 py-2 rounded-md cursor-not-allowed">&laquo; Previous</span>
                    </li>
                @else
                    <li class="mr-2">
                        <a href="{{ $animals->previousPageUrl() }}" rel="prev" class="bg-blue-500 hover:bg-blue-600 text-white px-3 py-2 rounded-md">&laquo; Previous</a>
                    </li>
                @endif

                {{-- Next Page Link --}}
                @if ($animals->hasMorePages())
                    <li class="mr-2">
                        <a href="{{ $animals->nextPageUrl() }}" rel="next" class="bg-blue-500 hover:bg-blue-600 text-white px-3 py-2 rounded-md">Next &raquo;</a>
                    </li>
                @else
                    <li class="mr-2 disabled" aria-disabled="true" aria-label="@lang('pagination.next')">
                        <span class="bg-gray-300 text-gray-600 px-3 py-2 rounded-md cursor-not-allowed">Next &raquo;</span>
                    </li>
                @endif
            </ul>
        </nav>
    </div>
</div>
@include('partials.footer')
