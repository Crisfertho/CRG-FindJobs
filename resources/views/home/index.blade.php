@section('titulo')
    Home
@endsection

<x-app-layout>
    <div class="px-14">
        <div class="py-16 bg-gray-50 dark:bg-gray-400 overflow-hidden lg:py-24 rounded-t-lg">
            <div class=" max-w-xl mx-auto px-4 sm:px-6 lg:px-8 lg:max-w-7xl">
                <div class="relative">
                    <h2 class="text-center text-4xl leading-8 font-extrabold tracking-tight text-indigo-900 sm:text-6xl">Encuentra un trabajo en Tegnología de forma presencial, híbrida o remota</h2>
                    <p class="mt-4 max-w-3xl mx-auto text-center text-xl text-gray-500 dark:text-gray-100">Encuentra el trabajo de tus sueños en una empresa nacional o internacional; tenemos vacantes para frontend developer, backend, devops, mobile y mucho más!</p>
                </div>
            </div>
        </div>
    </div>

    <livewire:home-vacantes />
</x-app-layout>