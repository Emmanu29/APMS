@include('partials.header')
<?php $array = array('title' => 'Animal System') ;?>
<x-nav :data="$array"/>

<div class="max-w-4xl mx-auto mt-5">
    <a href="#">
        <h1 class="text-4xl font-bold text-gray-900 text-center">Users' List</h1>
    </a>
</div>

<div class="max-w-5xl mx-auto overflow-x-auto shadow-md sm:rounded-lg mt-10">
    <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
            <tr>
                <th scope="col" class="px-6 py-3">
                    User Name
                </th>
                <th scope="col" class="px-6 py-3">
                    First Name
                </th>
                <th scope="col" class="px-6 py-3">
                    Last Name
                </th>
                <th scope="col" class="px-6 py-3">
                    Category
                </th>
                <th scope="col" class="px-6 py-3">
                    Expiration Date
                </th>
                <th scope="col" class="px-6 py-3">
                    Email
                </th>
                <th scope="col" class="px-6 py-3">
                    <span class="sr-only">View</span>
                </th>
            </tr>
        </thead>
        <tbody>
            @foreach ($users as $user)
            <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                    {{$user->username}}
                </th>
                <td class="px-6 py-4">
                    {{$user->firstName}}
                </td>
                <td class="px-6 py-4">
                    {{$user->lastName}}
                </td>
                <td class="px-6 py-4">
                    {{$user->category}}
                </td>
                <td class="px-6 py-4">
                    @if($user->dateTime)
                        {{ \Carbon\Carbon::parse($user->dateTime)->formatLocalized('%B %d, %Y %I:%M %p') }}
                    @endif
                </td>
                <td class="px-6 py-4">
                    {{$user->email}}
                </td>
                <td class="px-6 py-4 text-right">
                    <a href="/user/{{$user->id}}" class="font-medium text-blue-600 dark:text-blue-500 hover:underline">View</a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    <div class="mx-auto max-w-lg pt-6 p-4 flex justify-center">
        <nav role="navigation" aria-label="Pagination">
            <ul class="flex list-none">
                {{-- Previous Page Link --}}
                @if ($users->onFirstPage())
                    <li class="mr-2 disabled" aria-disabled="true" aria-label="@lang('pagination.previous')">
                        <span class="bg-gray-300 text-gray-600 px-3 py-2 rounded-md cursor-not-allowed">&laquo; Previous</span>
                    </li>
                @else
                    <li class="mr-2">
                        <a href="{{ $users->previousPageUrl() }}" rel="prev" class="bg-blue-500 hover:bg-blue-600 text-white px-3 py-2 rounded-md">&laquo; Previous</a>
                    </li>
                @endif

                {{-- Next Page Link --}}
                @if ($users->hasMorePages())
                    <li class="mr-2">
                        <a href="{{ $users->nextPageUrl() }}" rel="next" class="bg-blue-500 hover:bg-blue-600 text-white px-3 py-2 rounded-md">Next &raquo;</a>
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
