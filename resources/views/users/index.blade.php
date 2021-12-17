<x-app-layout>
    <x-slot name="header">
        <div class="flex flex-col-2 justify-between">
            <div>
                <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                    {{ __('Users') }}
                </h2>
            </div>
            <div class="flex ">   
                <a href="{{ route('users.create') }}" class="inline-flex items-center px-4 py-1 bg-blue-500 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-blue-700 active:bg-blue-900 focus:outline-none focus:border-gray-900 focus:ring ring-gray-300 disabled:opacity-25 transition ease-in-out duration-150">
                <div class="flex-none">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" viewBox="0 0 20 20" fill="currentColor">
                    <path fill-rule="evenodd" d="M10 3a1 1 0 011 1v5h5a1 1 0 110 2h-5v5a1 1 0 11-2 0v-5H4a1 1 0 110-2h5V4a1 1 0 011-1z" clip-rule="evenodd" />
                    </svg>
                </div>
                
                <div class="shrink shrink-0">
                    Create
                </div>
                </a>
            </div>

        </div>
    </x-slot>  
    <div class="py-12">
        <div class="max-w-6xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <a href="{{ route('users.trashed') }}" class="underline">
                        Archive</a>
                    <div class=" py-5">
                        <div class="overflow-x-auto w-full">    
                            <table class="mx-auto max-w-5xl w-full whitespace-nowrap rounded-lg bg-white divide-y divide-gray-300 overflow-hidden">
                                <thead class="bg-blue-400">
                                    <tr class="text-white text-left">
                                        <th class="font-semibold text-sm uppercase px-6 py-4"> # </th>
                                        <th class="font-semibold text-sm uppercase px-6 py-4"> Prefix </th>
                                        <th class="font-semibold text-sm uppercase px-6 py-4"> User </th>
                                        <th class="font-semibold text-sm uppercase px-6 py-4"> Suffix </th>
                                        <th class="font-semibold text-sm uppercase px-6 py-4"> Username </th>
                                        <th class="font-semibold text-sm uppercase px-6 py-4 text-center"> type </th> 
                                        <th class="font-semibold text-sm uppercase px-6 py-4"> </th>
                                    </tr>
                                </thead>
                                <tbody class="divide-y divide-gray-200">
                                    
                                    @foreach($users as $user)
                                    <tr>
                                        <td class="px-6 py-4">{{ $loop->iteration }}</td>
                                        <td class="px-6 py-4">
                                            <p class=""> {{ $user->prefixname ? ucfirst($user->prefixname) . '. ' :'' }} </p> 
                                        </td>
                                        <td class="px-6 py-4">
                                            <div class="flex items-center space-x-3">
                                                <div class="inline-flex w-10 h-10"> 
                                                    @if($user->avatar)
                                                        <img class="w-9 h-9 object-cover rounded-full" alt="User avatar" src="{{url('/profilepictures/'.$user->id.'/'.$user->avatar)}}"/>
                                                    @else 
                                                         
                                                        <span class="inline-block h-9 w-9 rounded-full overflow-hidden bg-gray-100">
                                                        <svg class="h-full w-full text-gray-300" fill="currentColor" viewBox="0 0 24 24">
                                                            <path d="M24 20.993V24H0v-2.996A14.977 14.977 0 0112.004 15c4.904 0 9.26 2.354 11.996 5.993zM16.002 8.999a4 4 0 11-8 0 4 4 0 018 0z" />
                                                        </svg>
                                                        </span>
                                                    @endif
                                                </div>
                                                <div>
                                                    <p> {{ $user->fullname }} </p>
                                                    <p class="text-gray-500 text-sm font-semibold tracking-wide"> {{ $user->email }} </p>
                                                </div>
                                            </div>
                                        </td>
                                        
                                        <td class="px-6 py-4">
                                            <p class=""> {{ $user->suffixname }} </p> 
                                        </td>
                                        <td class="px-6 py-4">
                                            <p class=""> {{ $user->username }} </p> 
                                        </td>
                                        <td class="px-6 py-4 text-center"> <span class="text-white text-sm w-1/3 pb-1 bg-green-600 font-semibold px-2 rounded-full"> {{ $user->type }} </span> </td>
                                        <td class="px-6 py-4 text-center"> 
                                            <div class="flex flex-cols-3 gap-2 justify-between">
                                                <div class="content-center align-middle flex items-center flex-shrink-0">
                                                    <a href="{{route('users.show', $user->id) }}" >
                                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-blue-500 hover:text-blue-700" viewBox="0 0 20 20" fill="currentColor">
                                                        <path d="M10 12a2 2 0 100-4 2 2 0 000 4z" />
                                                        <path fill-rule="evenodd" d="M.458 10C1.732 5.943 5.522 3 10 3s8.268 2.943 9.542 7c-1.274 4.057-5.064 7-9.542 7S1.732 14.057.458 10zM14 10a4 4 0 11-8 0 4 4 0 018 0z" clip-rule="evenodd" />
                                                        </svg>
                                                    </a>
                                                </div>
                                                <div class="content-center align-middle flex items-center flex-shrink-0">
                                                    <a href="{{route('users.edit', $user->id) }} ">
                                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-green-500 hover:text-green-700" viewBox="0 0 20 20" fill="currentColor">
                                                        <path d="M17.414 2.586a2 2 0 00-2.828 0L7 10.172V13h2.828l7.586-7.586a2 2 0 000-2.828z" />
                                                        <path fill-rule="evenodd" d="M2 6a2 2 0 012-2h4a1 1 0 010 2H4v10h10v-4a1 1 0 112 0v4a2 2 0 01-2 2H4a2 2 0 01-2-2V6z" clip-rule="evenodd" />
                                                        </svg>
                                                    </a>
                                                </div>
                                                  
                                                    <form action="{{route('users.destroy', $user->id)}}" method="POST" class="content-center align-middle flex items-center flex-shrink-0">
                                                        @method('DELETE')
                                                        @csrf

                                                        <button class=" " type="submit"> 
                                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-red-500 hover:text-red-700" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 8h14M5 8a2 2 0 110-4h14a2 2 0 110 4M5 8v10a2 2 0 002 2h10a2 2 0 002-2V8m-9 4h4" />
                                                            </svg>
                                                        </button>
                                                    
                                                    </form> 
                                                </div> 
                                            </div>
                                        </td>
                                    </tr> 
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
