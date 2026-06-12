<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ $title }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">

                    <form method="POST" action="{{ route('praktijkmanagement.update', $user->id) }}">
                        @csrf
                        @method('PUT')

                        <div class="mb-3">
                            <label class="form-label">Naam</label>
                            <input type="text" name="name" class="form-control" value="{{ $user->name }}">
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Email</label>
                            <input type="email" name="email" class="form-control" value="{{ $user->email }}">
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Gebruikersrol</label>
                            <select name="rolename" class="form-select">
                                @foreach ($userroles as $userrole)
                                    <option value="{{ $userrole->rolename }}" @selected($userrole->rolename == $user->rolename)>
                                        {{ $userrole->rolename }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <button type="submit" class="btn btn-primary">Opslaan</button>
                        <a href="{{ route('praktijkmanagement.userroles') }}" class="btn btn-secondary">Annuleren</a>
                    </form>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>