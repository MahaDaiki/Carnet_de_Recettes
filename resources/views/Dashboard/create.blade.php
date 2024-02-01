<x-app-layout>
    <div class="container">
        @if ($errors->any())
        <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert">
            <strong class="font-bold">Errors!</strong>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    </div>
    <div class="container mx-auto mt-6 flex justify-center text-center  ">
    <div class=" p-8 rounded shadow-md w-full md:w-1/2 lg:w-1/3" style="background:#847c75 ">
        <h2 class="text-2xl font-bold mb-4">Add Recipe</h2>
        <form action="{{  route('Dashboard.store')  }}" method="POST" enctype="multipart/form-data">
            @csrf
            
            <div class="mb-4">
                <label for="title" class="block text-gray-700 text-m font-large">Title</label>
                <input type="text" id="title" name="title" class="mt-1 p-2 w-full border rounded-md">
            </div>
            <div class="mb-4">
                <label for="image" class="block text-gray-700 text-sm font-medium">Image</label>
                <input type="file" id="image" name="image" class="mt-1 p-2 w-full border rounded-md">
            </div>
            <div class="mb-4">
                <label for="category_id" class="block text-gray-700 text-sm font-medium">Category</label>
                <select id="category_id" name="category_id" class="mt-1 p-2 w-full border rounded-md">
                    @foreach($categories as $category)
                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                @endforeach
            </select>
            </div>
            <div class="mb-4">
                <label for="ingredients" class="block text-gray-700 text-sm font-medium">Ingredients</label>
                <textarea id="ingredients" name="ingredients" rows="4" class="mt-1 p-2 w-full border rounded-md"></textarea>
            </div>
             <div class="mb-4">
                <label for="instruction" class="block text-gray-700 text-sm font-medium">Instructions</label>
                <textarea id="instruction" name="instruction" rows="4" class="mt-1 p-2 w-full border rounded-md"></textarea>
            </div>

          

            <div class="mt-6">
                <button type="submit" class=" text-white py-2 px-4 rounded-md" style="background: #c8a97e">Add Recipe</button>
            </div>
        </form>
    </div>
</div>

    
</x-app-layout>

