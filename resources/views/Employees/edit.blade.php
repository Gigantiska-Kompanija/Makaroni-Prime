<x-app-layout>
    <x-slot name="header">
    <div class="d-flex justify-content-between align-items-center">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Edit employeeName
        </h2>
        <form method="POST" action="{{ action([App\Http\Controllers\EmployeeController::class, 'destroy'], $id) }}">
            @csrf
            <input type="hidden" name="_method" value="delete">
            <x-button class="ml-4">
                Delete
            </x-button>
        </form>
    </div>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <form method="POST" action="{{ action([App\Http\Controllers\EmployeeController::class, 'update'], $id) }}">
                        @method('PUT')
                        @csrf

                        <div>
                            <x-label for="title" value="Personal ID" />
                            <x-input id="title" class="block mt-1 w-full" type="text" name="title" :value="old('title')" required autofocus />
                            <x-validation-error class="mb-4" :errors="$errors" title="title"/>            
                        </div>

                        <div>
                            <x-label for="year" value="First name" />
                            <x-input id="year" class="block mt-1 w-full" type="text" name="year" :value="old('year')" required />
                            <x-validation-error class="mb-4" :errors="$errors" title="year"/>            
                        </div>
                        
                        <div>
                            <x-label for="year" value="Last name" />
                            <x-input id="year" class="block mt-1 w-full" type="text" name="year" :value="old('year')" required />
                            <x-validation-error class="mb-4" :errors="$errors" title="year"/>            
                        </div>

                        <div>
                            <x-label for="year" value="Email" />
                            <x-input id="year" class="block mt-1 w-full" type="text" name="year" :value="old('year')" required />
                            <x-validation-error class="mb-4" :errors="$errors" title="year"/>            
                        </div>

                        <div>
                            <x-label for="year" value="Phone number" />
                            <x-input id="year" class="block mt-1 w-full" type="text" name="year" :value="old('year')" required />
                            <x-validation-error class="mb-4" :errors="$errors" title="year"/>            
                        </div>

                        <div>
                            <x-label for="year" value="Position" />
                            <x-input id="year" class="block mt-1 w-full" type="text" name="year" :value="old('year')" required />
                            <x-validation-error class="mb-4" :errors="$errors" title="year"/>            
                        </div>

                        <div>
                            <x-label for="year" value="Pay" />
                            <x-input id="year" class="block mt-1 w-full" type="text" name="year" :value="old('year')" required />
                            <x-validation-error class="mb-4" :errors="$errors" title="year"/>            
                        </div>

                        <div class="flex items-center justify-end mt-4">
                            <x-button class="ml-4">
                                Save
                            </x-button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
