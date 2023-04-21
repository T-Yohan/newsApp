<x-app-layout>

    <ul>
        @foreach ($categories as $itemCategory)
            <li>
                <a href="{{ route('news.standard.category', $itemCategory->id) }}">
                    {{ $itemCategory->name }}
                </a>
            </li>
        @endforeach

    </ul>

    @if (Gate::allows('admin'))
        <h1 class="text-white" m-2>ok</h1>
    @else
        <h1 class="text-white" m-2>not ok</h1>
    @endif

    <h1 class="text-white" m-2>Liste des news</h1>

    @forelse ($actus as $itemActu)
        <h3 class="text-white">{{ Str::limit($itemActu->titre, 35) }}</h3>

        <a href="{{ route('news.standard.detail', $itemActu) }}" class="text-white">Voir...</a>

    @empty
        <h2>Pas de news</h2>
    @endforelse

    {{ $actus->links() }}

</x-app-layout>
