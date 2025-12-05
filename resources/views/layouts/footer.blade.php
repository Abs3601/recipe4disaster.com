<footer class="mt-12 bg-ui-lightCard dark:bg-ui-darkCard border-t border-ui-lightCard/50 dark:border-ui-darkCard/50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
        <div class="flex flex-col md:flex-row md:items-center md:justify-between gap-6">
            <div class="flex items-center space-x-3">
                <a href="{{ url('/') }}" class="text-ui-primary font-brand text-lg font-bold">Recipe4Disaster.com</a>
                <p class="p text-sm">&copy; {{ date('Y') }} Recipe4Disaster. All rights reserved.</p>
            </div>

            <div class="flex items-center space-x-6">
                <a href="https://github.com/Abs3601" target="_blank" rel="noopener noreferrer" class="flex items-center space-x-2 hover:opacity-80 transition">
                    <img src="{{ asset('images/github.png') }}" alt="GitHub" class="w-5 h-5" />
                    <span class="link text-sm">Abs3601</span>
                </a>
                <a href="https://www.uws.ac.uk/" target="_blank" rel="noopener noreferrer" class="link text-sm">University of the West of Scotland</a>
            </div>
        </div>
    </div>
</footer>
