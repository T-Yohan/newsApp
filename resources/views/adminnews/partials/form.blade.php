<form action="{{ !empty($actu) ? route('news.edit', $actu->id) : route('news.add') }}"method='post'
    enctype="multipart/form-data">
    <!--obligatoire pour envoyer des fichiers-->
    @csrf
    <div class="mb-5">
        <label for="titre" class="mb-3 block text-base font-medium text-white-700">
            Titre
        </label>
        <input type="text" name="titre" value="{{ !empty($actu) ? $actu->titre : '' }}" placeholder="saisissez votre titre"
            class="w-full rounded-md border border-violet bg-white py-3 px-6 text-base font-medium text-black outline-none focus:border-violet" />

        @error('titre')
            vous devez saisir un titre
        @enderror
        <div class="mb5">

            <label for="category" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Select an
                option</label>
            <select name="category"
                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                @foreach ($categories as $itemCategory)

                @if (!empty($actu) && $itemCategory->id == $actu->category_id)

                <option value="{{$itemCategory->id}}"selected>{{$itemCategory->name}}</option>

                @else

                <option value="{{$itemCategory->id}}">{{$itemCategory->name}}</option>

                @endif


                @endforeach

            </select>

        </div>
    </div>
    <div class="mb-5">

    </div>

    <div class="mb-5">
        <label for="image" class="mb-3 block text-base font-medium text-white-700">
            Image
        </label>
        @isset($actu)
            <img class="h-20 w-20  object-cover object-center p-2" src="{{ Storage::url($actu->image) }}"alt="" />
        @endisset

        <input type="file" name="image" placeholder="Ajoutez une image"
            class="w-full rounded-md border border-violet bg-white py-3 px-6 text-base font-medium text-black outline-none focus:border-violet" />

        @error('image')
            Ajoutez une image au bon format
        @enderror

    </div>

    <div class="mb-5">
    </div>

    <div class="mb-5">
        <label for="description" class="mb-3 block text-base font-medium text-white-700">
            Description
        </label>
        <textarea rows="4" name="description" placeholder="Ajoutez une description"
            class="w-full resize-none rounded-md border border-violet bg-white text-base font-medium text-black outline-none focus:border-violet cols="30" rows="10">
            {{ !empty($actu) ? $actu->description : '' }}
        </textarea>

    </div>
    <div class="mb-5">
    </div>
    <button
        class="bg-violet-600 px-8 py-3 text-white rounded-md font-weight-600">{{ !empty($actu) ? 'Modifier' : 'Ajouter' }}</button>




</form>
