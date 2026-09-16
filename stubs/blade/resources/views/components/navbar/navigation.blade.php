 <div x-data="{ open: false, userMenu: false, theme: 'dark', get greeting() { const h = new Date().getHours(); return h < 12 ? 'Buenos días' : h < 19 ? 'Buenas tardes' : 'Buenas noches'; }, get today() { return new Date().toLocaleDateString('es-ES', { weekday: 'long', year: 'numeric', month: 'long', day: 'numeric' }); } }"
     class="relative flex flex-col max-w-7xl px-6 mx-auto md:flex-row md:items-center bg-indigo-700 dark:bg-indigo-800">
     <!-- Top bar -->
     <div class="flex items-center justify-between w-full py-4 md:py-4 md:w-auto">
         <!-- LOGO -->
         <div class="flex items-center gap-1.5 text-white">
             <div
                 class="flex items-center justify-center w-10 h-10 rounded-xl bg-indigo-700/40 dark:bg-indigo-800 backdrop-blur-sm">
                 <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                     stroke="currentColor" class="size-30">
                     <path stroke-linecap="round" stroke-linejoin="round" d="M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                     <circle cx="12" cy="12" r="3.5" stroke-linecap="round" stroke-linejoin="round" />
                 </svg>

             </div>
             <a href="index.html" class="text-2xl font-bold tracking-tight">Aura</a>
         </div>
         <!-- Móvil: Campana + Avatar + Hamburguesa -->
         <x-navbar.mobile />
     </div>
     <!-- ============================================
                 RESPONSIVE NAVIGATION
                 - Mobile: Hidden by default, toggled via hamburger
                 - Desktop: Always visible, horizontal layout
                 ============================================ -->
     <nav x-show="open || window.innerWidth >= 768" x-transition:enter="transition ease-out duration-200"
         x-transition:enter-start="opacity-0 -translate-y-2" x-transition:enter-end="opacity-100 translate-y-0"
         x-transition:leave="transition ease-in duration-150" x-transition:leave-start="opacity-100 translate-y-0"
         x-transition:leave-end="opacity-0 -translate-y-2" :class="{ 'flex': open, 'hidden': !open }"
         class="absolute left-0 right-0 top-full z-50 flex-col bg-indigo-700 dark:bg-indigo-800 pb-4 md:pb-0 md:px-3 md:relative
          md:flex md:flex-1 md:items-center md:flex-row text-white">
         {{ $slot }}
     </nav>
     <!-- Desktop: Campana + Avatar -->
     <x-navbar.desktop />
 </div>
