<nav x-data="{open : false}" class="fixed top-0 left-0 right-0 w-full border-gray-200 bg-green-50 dark:bg-gray-900 dark:border-gray-700 z-50">
  <div class="max-w-screen-xl flex flex-wrap items-center justify-between mx-auto p-4">
    <a href="/" class="flex items-center space-x-3 rtl:space-x-reverse">
      <img src="{{ asset('images/apms.jpg') }}" class="h-8 rounded-full" alt="Flowbite Logo" />
      <span class="font-bold self-center text-2xl whitespace-nowrap dark:text-white dark:hover:text-gray-500">
      @if(Request::is('/'))
          Veterinary Clinic Dashboard
        @else
          APMS
        @endif
      </span>
    </a>
    <button id="menu-toggle" type="button" class="inline-flex items-center p-2 w-10 h-10 justify-center text-sm text-gray-500 rounded-lg md:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 dark:text-gray-400 dark:hover:bg-gray-700 dark:focus:ring-gray-600" aria-controls="navbar-solid-bg" aria-expanded="false">
      <span class="sr-only">Open main menu</span>
      <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 17 14">
        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 1h15M1 7h15M1 13h15"/>
      </svg>
    </button>
    <div class="hidden w-full md:block md:w-auto" id="navbar-solid-bg">
      @auth
          <ul class="flex flex-col font-medium mt-4 rounded-lg bg-gray-50 md:space-x-8 rtl:space-x-reverse md:flex-row md:mt-0 md:border-0 md:bg-transparent dark:bg-gray-900 md:dark:bg-transparent dark:border-gray-700">
          <li>
            <a href="/" target="_parent" class="block py-2 px-3 md:p-0 text-gray-900 rounded hover:bg-gray-900 md:hover:bg-transparent md:border-0 md:hover:text-gray-700 dark:text-white md:dark:hover:text-gray-500 dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent">
                <span class="text-sm">Home</span>
                <span class="float-left mt-0 mr-1 inline-block">
                  <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-4 h-6">
                    <path stroke-linecap="round" stroke-linejoin="round" d="m2.25 12 8.954-8.955c.44-.439 1.152-.439 1.591 0L21.75 12M4.5 9.75v10.125c0 .621.504 1.125 1.125 1.125H9.75v-4.875c0-.621.504-1.125 1.125-1.125h2.25c.621 0 1.125.504 1.125 1.125V21h4.125c.621 0 1.125-.504 1.125-1.125V9.75M8.25 21h8.25" />
                  </svg>
                </span>
            </a>
        </li>
        <li>
            <a href="/patients" target="_parent	" class="block py-2 px-3 md:p-0 text-gray-900 rounded hover:bg-gray-900 md:hover:bg-transparent md:border-0 md:hover:text-gray-700 dark:text-white md:dark:hover:text-gray-500 dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent">
            <span class="text-sm">Patients</span>
            <span class="float-left mt-0 mr-1 inline-block">
              <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-4 h-6">
                <path stroke-linecap="round" stroke-linejoin="round" d="M18 18.72a9.094 9.094 0 0 0 3.741-.479 3 3 0 0 0-4.682-2.72m.94 3.198.001.031c0 .225-.012.447-.037.666A11.944 11.944 0 0 1 12 21c-2.17 0-4.207-.576-5.963-1.584A6.062 6.062 0 0 1 6 18.719m12 0a5.971 5.971 0 0 0-.941-3.197m0 0A5.995 5.995 0 0 0 12 12.75a5.995 5.995 0 0 0-5.058 2.772m0 0a3 3 0 0 0-4.681 2.72 8.986 8.986 0 0 0 3.74.477m.94-3.197a5.971 5.971 0 0 0-.94 3.197M15 6.75a3 3 0 1 1-6 0 3 3 0 0 1 6 0Zm6 3a2.25 2.25 0 1 1-4.5 0 2.25 2.25 0 0 1 4.5 0Zm-13.5 0a2.25 2.25 0 1 1-4.5 0 2.25 2.25 0 0 1 4.5 0Z" />
              </svg>
            </span>
            </a>
        </li>
        @if(Auth::user()->category !== 'Temporary User')
        <li>
            <a href="/users" target="_parent	" class="block py-2 px-3 md:p-0 text-gray-900 rounded hover:bg-gray-900 md:hover:bg-transparent md:border-0 md:hover:text-gray-700 dark:text-white md:dark:hover:text-gray-500 dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent">
            <span class="text-sm">Users</span>
              <span class="float-left mt-0 mr-1 inline-block">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-4 h-6">
                  <path stroke-linecap="round" stroke-linejoin="round" d="M15 19.128a9.38 9.38 0 0 0 2.625.372 9.337 9.337 0 0 0 4.121-.952 4.125 4.125 0 0 0-7.533-2.493M15 19.128v-.003c0-1.113-.285-2.16-.786-3.07M15 19.128v.106A12.318 12.318 0 0 1 8.624 21c-2.331 0-4.512-.645-6.374-1.766l-.001-.109a6.375 6.375 0 0 1 11.964-3.07M12 6.375a3.375 3.375 0 1 1-6.75 0 3.375 3.375 0 0 1 6.75 0Zm8.25 2.25a2.625 2.625 0 1 1-5.25 0 2.625 2.625 0 0 1 5.25 0Z" />
                </svg>
              </span>
            </a>
        </li>
        <li id="add-new-link">
            <a href="#" target="_parent	" class="block py-2 px-3 md:p-0 text-gray-900 rounded hover:bg-gray-900 md:hover:bg-transparent md:border-0 md:hover:text-gray-700 dark:text-white md:dark:hover:text-gray-500 dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent">
            <span class="text-sm">Add New</span>
              <span class="inline-block mr-1 mt-0 float-left">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-4 h-6">
                  <path stroke-linecap="round" stroke-linejoin="round" d="M18 7.5v3m0 0v3m0-3h3m-3 0h-3m-2.25-4.125a3.375 3.375 0 1 1-6.75 0 3.375 3.375 0 0 1 6.75 0ZM3 19.235v-.11a6.375 6.375 0 0 1 12.75 0v.109A12.318 12.318 0 0 1 9.374 21c-2.331 0-4.512-.645-6.374-1.766Z" />
                </svg>
              </span>
            </a>
        </li>
        @endif
        <li>
            <form action="/logout" method="POST" class="inline">
                @csrf
                <button type="submit" class="block py-2 px-3 md:p-0 text-gray-900 rounded hover:bg-gray-900 md:hover:bg-transparent md:border-0 md:hover:text-gray-700 dark:text-white md:dark:hover:text-gray-500 dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent">
                <span class="text-sm">Logout</span>
                <span class="inline-block float-left mt-0 mr-1">
                  <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-4 h-6">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M5.636 5.636a9 9 0 1 0 12.728 0M12 3v9" />
                  </svg>
                </span>
                </button>
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
    var consultationPattern = /^\/consultation\/\d+$/;

    if (currentUrl === '/'|| currentUrl === '/register' || currentUrl === '/add/animal' || userPattern.test(currentUrl ) || animalPattern.test(currentUrl ) || consultationPattern.test(currentUrl )) {
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