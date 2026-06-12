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

                    <h3 class="mb-4">Gebruikersrollen</h3>

                    <table class="table table-striped table-bordered align-middle shadow-sm">
                        <thead>
                            <tr>
                                <th>Naam</th>
                                <th>Email</th>
                                <th>Gebruikersrol</th>
                                <th class="text-center">Verwijder</th>
                                <th class="text-center">Wijzig</th>
                                <th class="text-center">Details</th>
                            </tr>
                        </thead>

                        <tbody>
                            @forelse ($users as $user)
                                <tr>
                                    <td>{{ $user->name }}</td>
                                    <td>{{ $user->email }}</td>
                                    <td>{{ $user->rolename }}</td>

                                   <td class="text-center">
    <form action="{{ route('praktijkmanagement.destroy', $user->id) }}" method="POST">
        @csrf
        @method('DELETE')

        <button type="submit" class="btn btn-danger btn-sm"
            onclick="return confirm('Weet je zeker dat je deze gebruiker wilt verwijderen?')">
            Verwijderen
        </button>
    </form>
</td>

                                    <td class="text-center">
                                        <a href="{{ route('praktijkmanagement.edit', $user->id) }}" class="btn btn-success btn-sm">
    Wijzig
</a>
                                    </td>

                                    <td class="text-center">
                                        <button class="btn btn-warning btn-sm">Details</button>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="6">Geen gebruikers gevonden.</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>