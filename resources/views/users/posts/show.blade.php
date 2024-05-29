<x-layout>
    <x-heading>Show Post</x-heading>
    <div class="max-w-2xl mx-auto p-4 bg-slate-300 dark:bg-slate-900 rounded-lg">


        <div class="mb-6">
            <label for="default-input"
                   class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Title</label>
            <input type="text" id="title" name="title" value="{{$post->title}}"
                   class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:disabled:opacity-75">

        </div>

        <div>
            <div class="mb-6">
                <label for="message"
                       class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Description</label>
                <textarea type="text" id="description" name="description" rows="4"
                          class="block  w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">{{$post->description}} </textarea>

            </div>
        </div>

        <section class="mt-5">
            <div class="flex justify-end">
                <div class="flex justify-evenly">
                    @can('update',$post)
                        <a href="{{route('posts.edit',$post->id)}}"
                           class="focus:outline-none text-white bg-purple-700 hover:bg-purple-800 focus:ring-4 focus:ring-purple-300 font-medium rounded-lg text-sm px-5 py-2.5 mb-2 dark:bg-purple-600 dark:hover:bg-purple-700 dark:focus:ring-purple-900">
                            Edit Post
                        </a>
                    @endcan
                    <spacer class="w-4"></spacer>
                    @can('delete',$post)
                        <form method="post" action="{{route('posts.destroy',$post->id)}}">
                            @csrf
                            @method('DELETE')
                            <button type="submit" onclick="return confirm('Are you sure?')"
                                    class="focus:outline-none text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 mb-2 dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-900">
                                Delete Post
                            </button>
                        </form>
                    @endcan

                </div>
            </div>
        </section>

    </div>
</x-layout>
