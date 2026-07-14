<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laravel CMS</title>

    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-slate-50">

    <!-- Navbar -->
    <nav class="bg-white shadow-lg border-b border-emerald-100">
        <div class="max-w-7xl mx-auto px-6">
            <div class="flex items-center justify-between h-16">
                <a href="{{ url('/') }}"
                    class="text-gray-700 hover:text-emerald-600 transition">
                    Home
                </a>
                <a href="{{ route('filament.admin.resources.articles.index') }}"
                    class="text-gray-700 hover:text-emerald-600 transition">
                    Articoli
                </a>
                <a href="{{ route('filament.admin.resources.categories.index') }}"
                    class="text-gray-700 hover:text-emerald-600 transition">
                    Categorie
                </a>
                <a href="{{ route('filament.admin.resources.tags.index') }}"
                    class="text-gray-700 hover:text-emerald-600 transition">
                    Tag
                </a>
                <a href="{{ route('filament.admin.auth.login') }}"
                    class="bg-emerald-600 hover:bg-emerald-700 text-white px-5 py-2 rounded-lg transition">
                    Admin
                </a>
            </div>
        </div>
        </div>
    </nav>

    <!-- Hero -->
    <section class="max-w-7xl mx-auto px-6 py-14">
        <div>
            <span
                class="inline-block bg-emerald-100 text-emerald-700 px-4 py-2 rounded-full text-sm font-semibold mb-6">
                Blog • News • Guide
            </span>
            <h1 class="text-5xl lg:text-6xl font-extrabold text-slate-900 leading-tight">
                Scopri i nostri
                <span class="text-emerald-600">
                    articoli
                </span>
                e rimani sempre aggiornato.
            </h1>
            <p class="mt-8 text-lg text-gray-600 leading-8">
                Esplora contenuti organizzati in categorie e tag, scopri nuovi articoli,
                approfondimenti, guide e tutte le ultime novità pubblicate sul nostro blog.
            </p>
            <div class="flex gap-4 mt-10">
                <a href="{{ route('filament.admin.resources.articles.index') }}"
                    class="bg-emerald-600 hover:bg-emerald-700 text-white px-7 py-3 rounded-xl font-semibold transition">
                    Scopri gli articoli
                </a>
                <a href="#features"
                    class="border border-emerald-600 text-emerald-600 hover:bg-emerald-50 px-7 py-3 rounded-xl font-semibold transition">
                    Esplora il sito
                </a>
            </div>
            <div class="mt-10">
                <img src="https://services.global.ntt/-/media/ntt/global/insights/blog/cms-attacks-on-the-rise/cms-2880x2000.jpg?rev=ca7502c231c54d50a694dc2e51c210af"
                    class="rounded-3xl shadow-2xl w-full" alt="Hero">
            </div>
        </div>
    </section>

    <!-- Features -->
    <section id="features" class="bg-white py-24">
        <div class="max-w-7xl mx-auto px-6">
            <div class="text-center">
                <h2 class="text-4xl font-bold text-slate-900">
                    Esplora il nostro blog
                </h2>
                <p class="mt-4 text-gray-500">
                    Tutti i contenuti sono organizzati per rendere la navigazione semplice e veloce.
                </p>
            </div>
            <div class="grid md:grid-cols-3 gap-8 mt-16">
                <div
                    class="bg-slate-50 p-8 rounded-2xl shadow hover:-translate-y-2 transition">
                    <div class="mb-4 text-emerald-600">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                            stroke-width="1.8" stroke="currentColor" class="w-10 h-10">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M19.5 5.25h-15A2.25 2.25 0 0 0 2.25 7.5v9A2.25 2.25 0 0 0 4.5 18.75h15A2.25 2.25 0 0 0 21.75 16.5v-9A2.25 2.25 0 0 0 19.5 5.25ZM6.75 9h10.5M6.75 12h10.5M6.75 15h6" />
                        </svg>
                    </div>
                    <h3 class="font-bold text-2xl mb-3">
                        Articoli
                    </h3>
                    <p class="text-gray-600">
                        Leggi gli ultimi articoli pubblicati, guide, approfondimenti e contenuti sempre aggiornati.
                    </p>
                </div>
                <div
                    class="bg-slate-50 p-8 rounded-2xl shadow hover:-translate-y-2 transition">
                    <div class="mb-4 text-emerald-600">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                            stroke-width="1.8" stroke="currentColor" class="w-10 h-10">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M3.75 6.75A2.25 2.25 0 0 1 6 4.5h3l1.5 1.5H18A2.25 2.25 0 0 1 20.25 8.25v9A2.25 2.25 0 0 1 18 19.5H6A2.25 2.25 0 0 1 3.75 17.25v-10.5Z" />
                        </svg>
                    </div>
                    <h3 class="font-bold text-2xl mb-3">
                        Categorie
                    </h3>
                    <p class="text-gray-600">
                        Sfoglia gli articoli suddivisi per argomento e trova rapidamente ciò che ti interessa.
                    </p>
                </div>
                <div
                    class="bg-slate-50 p-8 rounded-2xl shadow hover:-translate-y-2 transition">
                    <div class="mb-4 text-emerald-600">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                            stroke-width="1.8" stroke="currentColor" class="w-10 h-10">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M9.568 3.75H6A2.25 2.25 0 0 0 3.75 6v3.568a2.25 2.25 0 0 0 .659 1.591l8.182 8.182a2.25 2.25 0 0 0 3.182 0l3.568-3.568a2.25 2.25 0 0 0 0-3.182L11.159 4.409A2.25 2.25 0 0 0 9.568 3.75Z" />
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M7.5 7.5h.008v.008H7.5V7.5Z" />
                        </svg>
                    </div>
                    <h3 class="font-bold text-2xl mb-3">
                        Tag
                    </h3>
                    <p class="text-gray-600">
                        Esplora gli argomenti correlati attraverso i tag associati ad ogni articolo.
                    </p>
                </div>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer class="bg-slate-900 text-gray-300">
        <div class="max-w-7xl mx-auto px-6 py-10 flex justify-between">
            <p>
                © {{ date('Y') }} Articles CMS
            </p>
            <p>
                Articles
            </p>
        </div>
    </footer>
</body>

</html>