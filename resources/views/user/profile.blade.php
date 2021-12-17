<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Users') }}
        </h2>
    </x-slot>  
    <div class="py-12">
        <div class="max-w-5xl mx-auto sm:px-6 lg:px-8">
            
            @if ($message = Session::get('success'))
            <div class="alert alert-success alert-block"> 
                    <strong>{{ $message }}</strong>
            </div> 
            @endif
            <div class="max-w-4xl flex items-center h-auto   flex-wrap mx-auto my-3 lg:my-0">
            
                <!--Main Col-->
                <div id="profile" class="w-full grid lg:grid-cols-3 py-6  gap-2 h-auto rounded-lg lg:rounded-l-lg lg:rounded-r-none shadow-2xl bg-white opacity-75 mx-6 lg:mx-0">

                     <!--Img Col-->
                    <div class=" flex flex-col md:flex-col gap-3 justify-center max-h-80 max-w-80  mx-auto my-auto p-6"> 
                        <div class="row-span-5 flex mx-auto  my-auto">

                            @if($user->avatar)
                                <img class="rounded-none lg:rounded-lg max-h-64 max-w-64 shadow-2xl hidden lg:block" src="{{url('/profilepictures/'.$user->id.'/'.$user->avatar)}}"/> 
                            @else 
                                    
                                <span class="rounded-full lg:rounded-full max-h-64 max-w-64 shadow-2xl hidden lg:block bg-gray-400">
                                <svg class="h-full w-full text-gray-300 rounded-full lg:rounded-full" fill="currentColor" viewBox="0 0 24 24">
                                    <path d="M24 20.993V24H0v-2.996A14.977 14.977 0 0112.004 15c4.904 0 9.26 2.354 11.996 5.993zM16.002 8.999a4 4 0 11-8 0 4 4 0 018 0z" />
                                </svg>
                                </span>
                            @endif
                        </div>
                        <div class="row-span-2 gap-3 ">
                                
                                <form action="{{ route('user.profile.upload') }}" method="POST" enctype="multipart/form-data" class="hidden lg:block">
                                    @csrf
                                    <div class="row">
                            
                                        <div class="col-md-6">
                                            <input type="file" name="image" class="block w-full text-sm py-1.5 px-2 text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none focus:border-transparent dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400">
                                        </div>
                            
                                        <div class="col-md-6">
                                            <button type="submit" class="w-full mt-3 inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring ring-gray-300 disabled:opacity-25 transition ease-in-out duration-150">
                                                Upload
                                            </button>
                                        </div>
                            
                                    </div>
                                </form>
                        </div>
                    </div>
                    
                    <div class="col-span-2"> 
                        
                        <div class="p-4 md:p-4 text-center lg:text-left">
                            <!-- Image for mobile view-->  
                            
                            @if($user->avatar)
                                <img class="block lg:hidden rounded-full shadow-xl mx-auto -mt-16 
                            h-48 w-48 bg-cover bg-center bg-gray-400" src="{{url('/profilepictures/'.$user->id.'/'.$user->avatar)}}"/> 
                            @else 
                                    
                            <span class="block lg:hidden rounded-full shadow-xl mx-auto -mt-16 
                            h-48 w-48 bg-cover bg-center bg-gray-400">
                            <svg class="h-full w-full text-gray-300 rounded-full lg:rounded-full" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M24 20.993V24H0v-2.996A14.977 14.977 0 0112.004 15c4.904 0 9.26 2.354 11.996 5.993zM16.002 8.999a4 4 0 11-8 0 4 4 0 018 0z" />
                            </svg>
                            </span>
                            @endif
                            <form action="{{ route('user.profile.upload') }}" method="POST" enctype="multipart/form-data" class="block lg:hidden mt-6 w-60 mx-auto">
                                @csrf
                                <div class="row">
                        
                                    <div class="col-md-6">
                                        <input type="file" name="image" class="block w-full text-sm py-1.5 px-2 text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none focus:border-transparent dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400">
                                    </div>
                        
                                    <div class="col-md-6">
                                        <button type="submit" class="w-full text-center mt-3 inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring ring-gray-300 disabled:opacity-25 transition ease-in-out duration-150">
                                            Upload
                                        </button>
                                    </div>
                        
                                </div>
                            </form>
                            <div class="lg:hidden md:block" aria-hidden="true">
                            <div class="py-5">
                                <div class="border-t border-gray-200"></div>
                            </div>
                            </div>

                            <a href="{{ route('users.edit', auth()->id()) }}" class="w-15 text-center  inline-flex items-center px-4 py-2 bg-green-700 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-green-700 active:bg-green-900 focus:outline-none focus:border-green-900 focus:ring ring-gray-300 disabled:opacity-25 transition ease-in-out duration-150">
                                Edit profile
                            </a>
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