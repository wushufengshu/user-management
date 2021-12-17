<x-app-layout>
    <x-slot name="header">
        <div class="flex flex-col-2 justify-between">
            <div>
                <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                    {{ __('Users') }}
                </h2>
            </div> 
        </div>
       
    </x-slot>  
    <div class="py-12">
        <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">
             
                <div> 
                <x-auth-validation-errors class="mb-4" :errors="$errors" />
                
                <div class="md:grid  md:gap-6"> 
                    <!--  -->  
                    <!--  -->
 
                    <div class="mt-5 md:mt-0 md:col-span-2">
                    <form action="{{ route('users.update', $user->id) }}" method="POST">
                        @method('PUT')
                        @csrf
                        <div class="shadow sm:rounded-md sm:overflow-hidden">
                        <div class="px-4 py-5 bg-white space-y-6 sm:p-6">

                            <div class="col-span-12 sm:col-span-6 lg:col-span-2">
                                <label for="prefixname" class="block text-sm font-medium text-gray-700">Prefix</label>
                                <fieldset> 
                                <div class="gap-6 flex flex-col-3 pt -3">
                                    <div class="flex items-center">
                                    <input id="mr" value="mr" name="prefixname" type="radio" {{ ($user->prefixname == "mr")? "checked" : "" }} class="focus:ring-indigo-500 h-4 w-4 text-indigo-600 border-gray-300">
                                    <label for="mr" class="ml-3 block text-sm font-medium text-gray-700">
                                        Mr.
                                    </label>
                                    </div>
                                    <div class="flex items-center">
                                    <input id="mrs" value="mrs" name="prefixname" type="radio" {{ ($user->prefixname == "mrs")? "checked" : "" }} class="focus:ring-indigo-500 h-4 w-4 text-indigo-600 border-gray-300">
                                    <label for="mrs" class="ml-3 block text-sm font-medium text-gray-700">
                                        Mrs.
                                    </label>
                                    </div>
                                    <div class="flex items-center">
                                    <input id="ms" value="ms" name="prefixname" type="radio" {{ ($user->prefixname == "ms")? "checked" : "" }} class="focus:ring-indigo-500 h-4 w-4 text-indigo-600 border-gray-300">
                                    <label for="ms" class="ml-3 block text-sm font-medium text-gray-700">
                                        Ms.
                                    </label>
                                    </div>
                                </div>
                                </fieldset>
                            </div>
                            
                            <div class="grid grid-cols-12 gap-6">

                                
                                <div class="col-span-12 sm:col-span-12 lg:col-span-4">
                                    <label for="firstname" class="block text-sm font-medium text-gray-700">First name</label>
                                    <input type="text" name="firstname" id="firstname" value="{{ $user->firstname}}" required class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                                </div>

                                <div class="col-span-12 sm:col-span-12 lg:col-span-4">
                                    <label for="middlename" class="block text-sm font-medium text-gray-700">Middle name</label>
                                    <input type="text" name="middlename" id="middlename" value="{{ $user->middlename}}" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                                </div>

                                <div class="col-span-12 sm:col-span-12 lg:col-span-4">
                                    <label for="lastname" class="block text-sm font-medium text-gray-700">Last name</label>
                                    <input type="text" name="lastname" id="lastname" value="{{ $user->lastname}}" required class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                                </div>
                                    
                            </div>
                            <div class="grid grid-cols-3 gap-6">
                            <div class="col-span-3 sm:col-span-6 lg:col-span-1">
                                    <label for="suffixname" class="block text-sm font-medium text-gray-700">Suffix</label>
                                    <input type="text" name="suffixname" id="suffixname" value="{{ $user->suffixname}}" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                            </div>
                            </div>
                            
                            <div class="grid grid-cols-3 gap-6">
                            <div class="col-span-6 sm:col-span-4 lg:col-span-2">
                                <label for="username" class="block text-sm font-medium text-gray-700">Username</label>
                                <input type="text" name="username" id="username"  value="{{ $user->username}}" required class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                            </div>
                            </div>
                            
                            <div class="grid grid-cols-3 gap-6">
                            <div class="col-span-6 sm:col-span-4 lg:col-span-2">
                                <label for="email" class="block text-sm font-medium text-gray-700">Email address</label>
                                <input type="email" name="email" id="email" value="{{ $user->email}}" required autocomplete="email" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                            </div>
                            </div>
  
                        </div>
                        <div class="px-4 py-3 bg-gray-50 text-right sm:px-6">
                            <button type="submit" class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                            Save
                            </button>
                        </div>
                        </div>
                    </form>
                    </div>
                </div>
                </div>
            
 
 

        
        </div>
    </div>
</x-app-layout> 