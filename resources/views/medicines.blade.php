<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Semua Obat & Suplemen - Klinik Mumtaz</title>
    
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&family=Poppins:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    
    <!-- Styles / Scripts -->
    @if (file_exists(public_path('build/manifest.json')) || file_exists(public_path('hot')))
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    @endif
    @livewireScripts
    
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        
        body {
            font-family: 'Inter', -apple-system, BlinkMacSystemFont, 'Segoe UI', sans-serif;
            color: #004643;
            line-height: 1.6;
            background-color: #F0EDE5;
        }
        
        h1, h2, h3, h4, h5, h6 {
            font-family: 'Poppins', sans-serif;
            font-weight: 600;
            line-height: 1.2;
        }
        
        /* Header */
        .header {
            background: #004643;
            border-bottom: 1px solid rgba(240, 237, 229, 0.2);
            position: fixed;
            top: 0;
            left: 0;
            right: 0;
            z-index: 1000;
        }
        
        .header-container {
            max-width: 1280px;
            margin: 0 auto;
            padding: 1rem 2rem;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }
        
        .logo {
            font-size: 1.5rem;
            font-weight: 700;
            color: #F0EDE5;
            text-decoration: none;
        }
        
        .nav-menu {
            display: flex;
            gap: 2rem;
            list-style: none;
        }
        
        .nav-menu a {
            color: #F0EDE5;
            text-decoration: none;
            font-size: 0.9375rem;
            font-weight: 400;
            transition: color 0.2s;
        }
        
        .nav-menu a:hover {
            color: rgba(240, 237, 229, 0.8);
        }
        
        /* Main Content */
        .main-content {
            max-width: 1280px;
            margin: 0 auto;
            padding: calc(4rem + 80px) 2rem 4rem;
        }
        
        .page-header {
            margin-bottom: 3rem;
        }
        
        .page-title {
            font-size: 2.5rem;
            font-weight: 700;
            color: #004643;
            margin-bottom: 1rem;
        }
        
        .back-link {
            display: inline-flex;
            align-items: center;
            gap: 0.5rem;
            color: #004643;
            text-decoration: none;
            font-size: 0.9375rem;
            margin-bottom: 2rem;
            opacity: 0.8;
            transition: opacity 0.2s;
        }
        
        .back-link:hover {
            opacity: 1;
        }
        
        /* Search Form */
        .search-container {
            background: #ffffff;
            padding: 2rem;
            border-radius: 8px;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
            margin-bottom: 3rem;
        }
        
        .search-form {
            display: flex;
            gap: 1rem;
            align-items: center;
        }
        
        .search-input-wrapper {
            flex: 1;
            position: relative;
        }
        
        .search-icon {
            position: absolute;
            left: 1rem;
            top: 50%;
            transform: translateY(-50%);
            width: 20px;
            height: 20px;
            color: #004643;
            opacity: 0.6;
        }
        
        .search-input {
            width: 100%;
            padding: 0.875rem 1rem 0.875rem 3rem;
            border: 2px solid #004643;
            border-radius: 4px;
            font-size: 1rem;
            color: #004643;
            background: #ffffff;
            transition: border-color 0.2s;
        }
        
        .search-input:focus {
            outline: none;
            border-color: #006b66;
        }
        
        .search-button {
            padding: 0.875rem 2rem;
            background: #004643;
            color: #F0EDE5;
            border: none;
            border-radius: 4px;
            font-size: 1rem;
            font-weight: 500;
            cursor: pointer;
            transition: background 0.2s;
        }
        
        .search-button:hover {
            background: #003d3a;
        }
        
        /* Cards Grid */
        .cards-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(280px, 1fr));
            gap: 2rem;
        }
        
        .card {
            background: #ffffff;
            border-radius: 8px;
            overflow: hidden;
            transition: transform 0.2s, box-shadow 0.2s;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }
        
        .card:hover {
            transform: translateY(-4px);
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.15);
        }
        
        .card-image {
            width: 100%;
            height: 200px;
            object-fit: cover;
            background: #e5e5e5;
        }
        
        .card-content {
            padding: 1.5rem;
        }
        
        .card-title {
            font-size: 1.125rem;
            font-weight: 600;
            margin-bottom: 0.5rem;
            color: #1a1a1a;
        }
        
        .card-description {
            font-size: 0.875rem;
            color: #004643;
            opacity: 0.8;
            margin-bottom: 0.5rem;
            line-height: 1.5;
        }
        
        .card-footer {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-top: 0.5rem;
        }
        
        .card-price {
            font-size: 1.125rem;
            font-weight: 600;
            color: #004643;
        }
        
        .card-stock {
            font-size: 0.875rem;
            color: #004643;
            opacity: 0.7;
        }
        
        .empty-state {
            grid-column: 1 / -1;
            text-align: center;
            padding: 3rem;
            color: #004643;
            opacity: 0.7;
        }
        
        .empty-state-icon {
            font-size: 4rem;
            margin-bottom: 1rem;
        }
        
        /* Mobile Responsive */
        @media (max-width: 768px) {
            .main-content {
                padding: calc(2rem + 80px) 1rem 2rem;
            }
            
            .page-title {
                font-size: 2rem;
            }
            
            .search-form {
                flex-direction: column;
            }
            
            .search-button {
                width: 100%;
            }
            
            .cards-grid {
                grid-template-columns: 1fr;
            }
            
            .nav-menu {
                display: none;
            }
        }
        
        /* Live Search Styles */
        .card.hidden {
            display: none;
        }
        
        .card {
            animation: fadeIn 0.3s ease-in;
        }
        
        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: translateY(10px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }
        
        .search-input:focus {
            box-shadow: 0 0 0 3px rgba(0, 70, 67, 0.1);
        }
        
        .search-results-count {
            color: #004643;
            opacity: 0.7;
            font-size: 0.875rem;
            margin-top: 0.5rem;
            padding-left: 0.5rem;
        }
        
        #emptyState.hidden {
            display: none !important;
        }
    </style>
</head>
<body>
    <!-- Header -->
    <header class="header">
        <div class="header-container">
            <a href="/" class="logo">Klinik Mumtaz</a>
            <nav>
                <ul class="nav-menu">
                    <li><a href="/#doctors">Dokter</a></li>
                    <li><a href="/#facilities">Fasilitas</a></li>
                    <li><a href="/#services">Layanan</a></li>
                    <li><a href="/#boutique">Butik</a></li>
                    <li><a href="/#medicines">Obat</a></li>
                    <li><a href="/#contact">Kontak</a></li>
                </ul>
            </nav>
        </div>
    </header>

    <!-- Main Content -->
    <main class="main-content">
        <div class="page-header">
            <a href="/" class="back-link">
                <svg width="16" height="16" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"/>
                </svg>
                Kembali ke Beranda
            </a>
            <h1 class="page-title">Semua Obat & Suplemen</h1>
        </div>

        <!-- Search Form -->
        <div class="search-container">
            <form action="{{ route('medicines') }}" method="GET" class="search-form">
                <div class="search-input-wrapper">
                    <svg class="search-icon" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/>
                    </svg>
                    <input 
                        type="text" 
                        name="search" 
                        id="searchInput"
                        class="search-input" 
                        placeholder="Cari obat atau suplemen..." 
                        value="{{ $search }}"
                        autocomplete="off"
                    >
                </div>
                <button type="submit" class="search-button">Cari</button>
            </form>
        </div>

        <!-- Medicines Grid -->
        <div class="cards-grid" id="medicinesGrid">
            @forelse($medicines as $medicine)
                <div class="card"
                     data-name="{{ strtolower($medicine->name) }}"
                     data-description="{{ strtolower($medicine->description ?? '') }}">
                    @if($medicine->image)
                        <img src="{{ asset('storage/' . $medicine->image) }}" alt="{{ $medicine->name }}" class="card-image" onerror="this.src='https://via.placeholder.com/400x300?text=Medicine'">
                    @else
                        <div class="card-image" style="display: flex; align-items: center; justify-content: center; background: #e5e5e5; color: #999;">
                            <svg width="80" height="80" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19.428 15.428a2 2 0 00-1.022-.547l-2.387-.477a6 6 0 00-3.86.517l-.318.158a6 6 0 01-3.86.517L6.05 15.21a2 2 0 00-1.806.547M8 4h8l-1 1v5.172a2 2 0 00.586 1.414l5 5c1.26 1.26.367 3.414-1.415 3.414H4.828c-1.782 0-2.674-2.154-1.414-3.414l5-5A2 2 0 009 10.172V5L8 4z"/>
                            </svg>
                        </div>
                    @endif
                    <div class="card-content">
                        <h3 class="card-title">{{ $medicine->name }}</h3>
                        @if($medicine->description)
                            <p class="card-description">{{ Str::limit($medicine->description, 100) }}</p>
                        @endif
                        <div class="card-footer">
                            <p class="card-price">Rp {{ number_format($medicine->price, 0, ',', '.') }}</p>
                            @if(isset($medicine->stock))
                                <span class="card-stock">Stok: {{ $medicine->stock }}</span>
                            @endif
                        </div>
                    </div>
                </div>
            @empty
                <div class="empty-state">
                    <div class="empty-state-icon">🔍</div>
                    <h3>Tidak ada obat ditemukan</h3>
                    <p>{{ $search ? 'Coba gunakan kata kunci lain untuk mencari obat.' : 'Belum ada obat tersedia.' }}</p>
                </div>
            @endforelse
        </div>
        <div class="search-results-count" id="resultsCount"></div>
        <div class="empty-state hidden" id="emptyState" style="display: none;">
            <div class="empty-state-icon">🔍</div>
            <h3>Tidak ada obat ditemukan</h3>
            <p>Coba gunakan kata kunci lain untuk mencari obat.</p>
        </div>
    </main>
    
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const searchInput = document.getElementById('searchInput');
            const cards = document.querySelectorAll('#medicinesGrid .card');
            const resultsCount = document.getElementById('resultsCount');
            const searchForm = document.querySelector('.search-form');
            
            // Function to filter cards
            function filterCards(searchTerm) {
                const term = searchTerm.toLowerCase().trim();
                let visibleCount = 0;
                const emptyState = document.getElementById('emptyState');
                
                cards.forEach(card => {
                    const name = card.getAttribute('data-name') || '';
                    const description = card.getAttribute('data-description') || '';
                    
                    const matches = name.includes(term) || 
                                   description.includes(term);
                    
                    if (matches || term === '') {
                        card.classList.remove('hidden');
                        visibleCount++;
                    } else {
                        card.classList.add('hidden');
                    }
                });
                
                // Show/hide empty state
                if (term !== '' && visibleCount === 0) {
                    emptyState.classList.remove('hidden');
                    emptyState.style.display = 'block';
                } else {
                    emptyState.classList.add('hidden');
                    emptyState.style.display = 'none';
                }
                
                // Update results count
                if (term === '') {
                    resultsCount.textContent = '';
                } else {
                    resultsCount.textContent = `Menampilkan ${visibleCount} dari ${cards.length} obat`;
                }
            }
            
            // Live search on input
            searchInput.addEventListener('input', function(e) {
                filterCards(e.target.value);
            });
            
            // Prevent form submission on Enter (optional, or keep it for URL update)
            searchForm.addEventListener('submit', function(e) {
                e.preventDefault();
                // Optionally update URL without reload
                const searchTerm = searchInput.value;
                const url = new URL(window.location);
                if (searchTerm) {
                    url.searchParams.set('search', searchTerm);
                } else {
                    url.searchParams.delete('search');
                }
                window.history.pushState({}, '', url);
                filterCards(searchTerm);
            });
            
            // Initialize filter if there's a search term in URL
            if (searchInput.value) {
                filterCards(searchInput.value);
            }
        });
    </script>
</body>
</html>

