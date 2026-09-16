     <div class="hidden md:flex md:items-center md:space-x-4 md:py-4">

         <x-dropdown align="right" width="48">
             <x-slot name="trigger">

                 <button
                     class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-white
                           dark:text-white dark:bg-indigo-800 hover:text-slate-100 dark:hover:text-white focus:outline-none transition ease-in-out duration-150">
                     @if (Auth::user()->avatar)
                         <img src="{{ Storage::url(Auth::user()->avatar) }}" alt="{{ Auth::user()->name }}"
                             class="w-8 h-8 rounded-full object-cover" />
                     @else
                         <img src="https://ui-avatars.com/api/?name={{ urlencode(Auth::user()->name) }}&color=7F9CF5&background=F0F0FF"
                             alt="{{ Auth::user()->name }}" class="w-8 h-8 rounded-full object-cover" />
                     @endif

                     <div class="ms-2">{{ Auth::user()->name }}</div>

                     <div class="ms-1">
                         <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                             <path fill-rule="evenodd"
                                 d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                 clip-rule="evenodd" />
                         </svg>
                     </div>
                 </button>
             </x-slot>

             <x-slot name="content">
                 <x-dropdown-link :href="route('profile.edit')">
                     <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                         stroke="currentColor" class="size-6">
                         <path stroke-linecap="round" stroke-linejoin="round"
                             d="M17.982 18.725A7.488 7.488 0 0 0 12 15.75a7.488 7.488 0 0 0-5.982 2.975m11.963 0a9 9 0 1 0-11.963 0m11.963 0A8.966 8.966 0 0 1 12 21a8.966 8.966 0 0 1-5.982-2.275M15 9.75a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
                     </svg>

                     {{ __('Profile') }}
                 </x-dropdown-link>

                 <!-- Authentication -->
                 <form method="POST" action="{{ route('logout') }}">
                     @csrf

                     <x-dropdown-link :href="route('logout')"
                         onclick="event.preventDefault();
                                                this.closest('form').submit();">
                         <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                             stroke="currentColor" class="size-6">
                             <path stroke-linecap="round" stroke-linejoin="round"
                                 d="M15.75 9V5.25A2.25 2.25 0 0 0 13.5 3h-6a2.25 2.25 0 0 0-2.25 2.25v13.5A2.25 2.25 0 0 0 7.5 21h6a2.25 2.25 0 0 0 2.25-2.25V15M12 9l-3 3m0 0 3 3m-3-3h12.75" />
                         </svg>

                         {{ __('Log Out') }}
                     </x-dropdown-link>

                 </form>

             </x-slot>
         </x-dropdown>
     </div>
