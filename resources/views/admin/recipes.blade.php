<x-app-layout>

<div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8 py-10">

    <div class="flex items-center justify-between mb-6">
        <h1 class="h1">Manage All Recipes</h1>
        <a href="{{ route('recipes.create') }}" class="btn-primary">Add Recipe</a>
    </div>

    <div class="bg-ui-lightCard dark:bg-ui-darkCard shadow-soft sm:rounded-lg overflow-hidden">
        <div class="px-4 py-4 sm:px-6">
            <div class="-mx-4 -my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                <div class="inline-block min-w-full py-2 align-middle px-4 sm:px-6 lg:px-8">
                    <table class="min-w-full divide-y divide-gray-200 dark:divide-gray-700">
                        <thead class="bg-ui-lightCard dark:bg-ui-darkCard">
                            <tr>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-ui-textLight dark:text-ui-textDark uppercase tracking-wider">Title</th>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-ui-textLight dark:text-ui-textDark uppercase tracking-wider">Author</th>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-ui-textLight dark:text-ui-textDark uppercase tracking-wider">Date</th>
                                <th scope="col" class="px-6 py-3 text-right text-xs font-medium text-ui-textLight dark:text-ui-textDark uppercase tracking-wider">Actions</th>
                            </tr>
                        </thead>
                        <tbody class="bg-ui-lightCard dark:bg-ui-darkCard divide-y divide-gray-200 dark:divide-gray-700">

                        @forelse ($recipes as $recipe)
                            <tr>
                                <td class="px-6 py-4 whitespace-nowrap align-top">
                                    <div class="text-sm font-medium text-ui-textLight dark:text-ui-textDark">{{ $recipe->title }}</div>
                                    @if(!empty($recipe->description))
                                        <div class="text-xs text-gray-500 dark:text-gray-400">{{ Illuminate\Support\Str::limit($recipe->description, 80) }}</div>
                                    @endif
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-ui-textLight dark:text-ui-textDark">{{ $recipe->user->name }}</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-ui-textLight dark:text-ui-textDark">{{ $recipe->created_at->format('d M Y') }}</td>
                                <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                    <div class="inline-flex items-center space-x-3 justify-end">
                                        <a href="{{ route('recipes.show', $recipe) }}" class="link">View</a>
                                        <a href="{{ route('recipes.edit', $recipe) }}" class="link">Edit</a>
                                        <form action="{{ route('recipes.destroy', $recipe) }}" method="POST" onsubmit="return confirm('Delete this recipe?');">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn-danger">Delete</button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="4" class="px-6 py-8 text-center">
                                    <div class="p-6">
                                        <p class="p">No recipes found.</p>
                                    </div>
                                </td>
                            </tr>
                        @endforelse

                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <div class="px-4 py-3 bg-ui-lightCard dark:bg-ui-darkCard border-t border-ui-lightCard/50 dark:border-ui-darkCard/50">
            <div class="flex items-center justify-between">
                <div class="text-sm text-ui-textLight dark:text-ui-textDark">Showing {{ $recipes->firstItem() ?? 0 }} to {{ $recipes->lastItem() ?? 0 }} of {{ $recipes->total() }} results</div>
                <div>
                    {{ $recipes->links() }}
                </div>
            </div>
        </div>
    </div>

</div>

</x-app-layout>
