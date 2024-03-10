<nav x-data="{open : false}" class="fixed top-0 left-0 right-0 w-full border-gray-200 bg-green-50 dark:bg-gray-900 dark:border-gray-700 z-50">
  <div class="max-w-screen-xl flex flex-wrap items-center justify-between mx-auto p-4">
    <a href="/" class="flex items-center space-x-3 rtl:space-x-reverse">
      <img src="{{ asset('images/apms.jpg') }}" class="h-8" alt="Flowbite Logo" />
      <span class="font-bold self-center text-2xl whitespace-nowrap dark:text-white dark:hover:text-gray-500">
      @if(Request::is('/'))
          Veterinary Clinic Dashboard
        @else
          APMS
        @endif
      </span>
    </a>
    <button id="menu-toggle" type="button" class="inline-flex items-center p-2 w-10 h-10 justify-center text-sm text-green-500 rounded-lg md:hidden hover:bg-green-100 focus:outline-none focus:ring-2 focus:ring-green-200 dark:text-green-400 dark:hover:bg-green-700 dark:focus:ring-green-600" aria-controls="navbar-solid-bg" aria-expanded="false">
      <span class="sr-only">Open main menu</span>
      <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 17 14">
        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 1h15M1 7h15M1 13h15"/>
      </svg>
    </button>
    <div class="hidden w-full md:block md:w-auto" id="navbar-solid-bg">
      @auth
          <ul class="flex flex-col font-medium mt-4 rounded-lg bg-gray-50 md:space-x-8 rtl:space-x-reverse md:flex-row md:mt-0 md:border-0 md:bg-transparent dark:bg-gray-900 md:dark:bg-transparent dark:border-gray-700">
        <li>
            <a href="/" target="_parent	" class="block py-2 px-3 md:p-0 text-gray-900 rounded hover:bg-gray-900 md:hover:bg-transparent md:border-0 md:hover:text-gray-700 dark:text-white md:dark:hover:text-gray-500 dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent">Home</a>
        </li>
        <li>
            <a href="/patients" target="_parent	" class="block py-2 px-3 md:p-0 text-gray-900 rounded hover:bg-gray-900 md:hover:bg-transparent md:border-0 md:hover:text-gray-700 dark:text-white md:dark:hover:text-gray-500 dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent">Patients</a>
        </li>
        @if(Auth::user()->category !== 'Temporary User')
        <li>
            <a href="/users" target="_parent	" class="block py-2 px-3 md:p-0 text-gray-900 rounded hover:bg-gray-900 md:hover:bg-transparent md:border-0 md:hover:text-gray-700 dark:text-white md:dark:hover:text-gray-500 dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent">Users</a>
        </li>
        <li id="add-new-link">
            <a href="#" target="_parent	" class="block py-2 px-3 md:p-0 text-gray-900 rounded hover:bg-gray-900 md:hover:bg-transparent md:border-0 md:hover:text-gray-700 dark:text-white md:dark:hover:text-gray-500 dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent">Add New</a>
        </li>
        @endif
        <li>
            <form action="/logout" method="POST" class="inline">
                @csrf
                <button type="submit" class="block py-2 px-3 md:p-0 text-gray-900 rounded hover:bg-gray-900 md:hover:bg-transparent md:border-0 md:hover:text-gray-700 dark:text-white md:dark:hover:text-gray-500 dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent">Logout</button>
            </form>
        </li>
    </ul>
      @endauth
    </div>
  </div>
</nav>

<script>
  document.getElementById("menu-toggle").addEventListener("click", function() {
    var menu = document.getElementById("navbar-solid-bg");
    menu.classList.toggle("hidden");
  });

  // Check the current URL and hide the "Add New" link if needed
  document.addEventListener("DOMContentLoaded", function() {
    var addNewLink = document.getElementById("add-new-link");

    var currentUrl = window.location.pathname;

    // Regular expression pattern to match /user/{id}
    var userPattern = /^\/user\/\d+$/;
    var animalPattern = /^\/animal\/\d+$/;

    if (currentUrl === '/'|| currentUrl === '/register' || currentUrl === '/add/animal' || userPattern.test(currentUrl ) || animalPattern.test(currentUrl )) {
      // Hide the "Add New" link
      addNewLink.style.display = "none";
    }
  });

  // Check the current URL and set the href of Add New link accordingly
  document.addEventListener("DOMContentLoaded", function() {
    var addNewLink = document.getElementById("add-new-link").querySelector("a");
    var currentUrl = window.location.pathname;

    if (currentUrl === '/patients') {
      addNewLink.href = '/add/animal';
    } else if (currentUrl === '/users') {
      addNewLink.href = '/register';
    }
  });
</script>