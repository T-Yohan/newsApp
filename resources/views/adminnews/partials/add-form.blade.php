<form action="{{ Route('news.add') }}"method='post' enctype="multipart/form-data">  <!--obligatoire pour envoyer des fichiers-->
    @csrf
    <div class="mb-5">
        <label for="titre"
        class="mb-3 block text-base font-medium text-white-700">
            Titre
        </label>
        <input
        type="text"
        name="titre"
        placeholder="saisissez votre titre"
        class="w-full rounded-md border border-violet bg-white py-3 px-6 text-base font-medium text-black outline-none focus:border-violet" />

        @error('titre')
            vous devez saisir un titre
        @enderror

    </div>
        <div class="mb-5">

        </div>

        <div class="mb-5">
            <label for="image"
            class="mb-3 block text-base font-medium text-white-700">
                Image
            </label>
            <input
            type="file"
            name="image"
            placeholder="Ajoutez une image"
            class="w-full rounded-md border border-violet bg-white py-3 px-6 text-base font-medium text-black outline-none focus:border-violet" />

            @error('image')
                Ajoutez une image au bon format
            @enderror

        </div>

        <div class="mb-5">
        </div>

        <div class="mb-5">
            <label for="description"
            class="mb-3 block text-base font-medium text-white-700">
                Description
            </label>
            <textarea
            rows="4"
            name="description"
            placeholder="Ajoutez une description"
            class= "w-full resize-none rounded-md border border-violet bg-white text-base font-medium text-black outline-none focus:border-violet cols="30" rows="10"></textarea>

        </div>
        <div class="mb-5">
        </div>
        <button class="bg-violet-600 px-8 py-3 text-white rounded-md font-weight-600">Ajouter</button>




</form>
