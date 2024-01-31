<x-app-layout>
 <div class="flex mt-6 mb-4 text-center items-center justify-center h-screen">
    <div class="bg-white p-8 rounded shadow-md w-full md:w-1/2 lg:w-1/3">
        <h2 class="text-2xl font-semibold mb-4">Add Recipe</h2>
        <form action="{{  route('Dashboard.store')  }}" method="POST" enctype="multipart/form-data">
            @csrf
            
            <div class="mb-4">
                <label for="title" class="block text-gray-700 text-sm font-medium">Title</label>
                <input type="text" id="title" name="title" class="mt-1 p-2 w-full border rounded-md">
            </div>
            <div class="mb-4">
                <label for="image" class="block text-gray-700 text-sm font-medium">Image</label>
                <input type="file" id="image" name="image" class="mt-1 p-2 w-full border rounded-md">
            </div>

            <div class="mb-4">
                <label for="ingredients" class="block text-gray-700 text-sm font-medium">Ingredients</label>
                <textarea id="ingredients" name="ingredients" rows="4" class="mt-1 p-2 w-full border rounded-md"></textarea>
            </div>

            <div class="mb-4">
                <label for="category_id" class="block text-gray-700 text-sm font-medium">Category</label>
                <select id="category_id" name="category_id" class="mt-1 p-2 w-full border rounded-md">
                    @foreach($categories as $category)
                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                @endforeach
            </select>
                </select>
            </div>

            <div class="mt-6">
                <button type="submit" class="bg-blue-500 text-white py-2 px-4 rounded-md">Add Recipe</button>
            </div>
        </form>
    </div>
</div>

    
</x-app-layout>

