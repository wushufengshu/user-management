<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Users') }}
        </h2>
    </x-slot>  
    <div class="py-12">
        <div class="max-w-5xl mx-auto sm:px-6 lg:px-8">
            

            <div class="max-w-4xl flex items-center h-auto   flex-wrap mx-auto my-3 lg:my-0">
            
                <!--Main Col-->
                <div id="profile" class="w-full grid lg:grid-cols-3  gap-2 h-auto rounded-lg lg:rounded-l-lg lg:rounded-r-none shadow-2xl bg-white opacity-75 mx-6 lg:mx-0">

                     <!--Img Col-->
                     <div class="flex max-h-80 max-w-80  mx-auto my-auto px-3">
                        <!-- Big profile image for side bar (desktop) -->
                        <img src="{{ url('default.jpg') }}" class="rounded-none lg:rounded-lg max-h-64 max-w-64 shadow-2xl hidden lg:block">
                        <!-- Image from: http://unsplash.com/photos/MP0IUfwrn0A -->
                        
                    </div>
                    
                    <div class="col-span-2"> 
                        
                        <div class="p-4 md:p-12 text-center lg:text-left">
                            <!-- Image for mobile view--> 
                        <img src="{{ url('default.png') }}" class="block lg:hidden rounded-full shadow-xl mx-auto -mt-16 
                            h-48 w-48 bg-cover bg-center"> 
                            <p class="pt-4 text-base font-bold flex items-center justify-center lg:justify-start">{{ ucfirst($user->prefixname) . '. ' }}</p>
                            <h1 class="text-3xl font-bold pt-8 lg:pt-0">{{ $user->firstname }} {{ $user->lastname }} {{ $user->suffixname }}</h1>
                            <!-- <div class="mx-auto lg:mx-0 w-4/5 pt-3 border-b-2 border-green-500 opacity-25"></div> -->
                            <p class="pt-4 text-base   flex items-center justify-center lg:justify-start">
                                
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 stroke-current text-green-700 pr-6"  fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                                </svg>
                                {{ $user->email }}</p>
                            <p class="pt-2 text-gray-600 text-xs lg:text-sm flex items-center justify-center lg:justify-start">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 stroke-current text-green-700 pr-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
</svg> {{ $user->username }}</p>
                            <p class="pt-8 text-sm"><span class="text-white text-sm w-1/3 pb-1 bg-green-600 font-semibold px-2 rounded-full"> {{ $user->type }} </span> </p>

                        
                        </div>
                    
                    </div>

                   

                </div>
                

                

            </div>

        </div>
    </div>
</x-app-layout> 