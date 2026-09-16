       <div class="flex items-center space-x-4 md:hidden">
           <!-- Mobile: Notification bell -->
           {{-- <button class="p-1.5 rounded-lg transition-opacity duration-150 opacity-80 hover:opacity-100"
               aria-label="Notifications">
               <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                   stroke="currentColor" class="size-6 text-white">
                   <path stroke-linecap="round" stroke-linejoin="round"
                       d="M14.857 17.082a23.848 23.848 0 0 0 5.454-1.31A8.967 8.967 0 0 1 18 9.75V9A6 6 0 0 0 6 9v.75a8.967 8.967 0 0 1-2.312 6.022c1.733.64 3.56 1.085 5.455 1.31m5.714 0a24.255 24.255 0 0 1-5.714 0m5.714 0a3 3 0 1 1-5.714 0M3.124 7.5A8.969 8.969 0 0 1 5.292 3m13.416 0a8.969 8.969 0 0 1 2.168 4.5" />
               </svg>
           </button> --}}
           <!-- Mobile: User menu dropdown -->
           <x-dropdown align="right" width="48">
               <x-slot name="trigger">
                   <button
                       class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-white
                          dark:text-slate-400 dark:bg-indigo-800 hover:text-slate-100 dark:hover:text-gray-300 focus:outline-none transition ease-in-out duration-150">
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
                       {{ __('Profile') }}
                   </x-dropdown-link>

                   <!-- Authentication -->
                   <form method="POST" action="{{ route('logout') }}">
                       @csrf

                       <x-dropdown-link :href="route('logout')"
                           onclick="event.preventDefault();
                                                this.closest('form').submit();">
                           {{ __('Log Out') }}
                       </x-dropdown-link>
                   </form>
               </x-slot>
           </x-dropdown>
           <!-- Mobile: Hamburger menu toggle -->
           <button
               class="p-1.5 rounded-lg transition-opacity duration-150 opacity-80 hover:opacity-100 focus:outline-none"
               @click="open = !open" aria-label="Toggle menu" :aria-expanded="open">
               <svg fill="currentColor" viewBox="0 0 20 20" class="w-5 h-5 text-white">
                   <path x-show="!open" fill-rule="evenodd"
                       d="M3 5a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 10a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM9 15a1 1 0 011-1h6a1 1 0 110 2h-6a1 1 0 01-1-1z"
                       clip-rule="evenodd"></path>
                   <path x-show="open" fill-rule="evenodd"
                       d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                       clip-rule="evenodd"></path>
               </svg>
           </button>
       </div>
