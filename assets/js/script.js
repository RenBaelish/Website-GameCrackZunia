// DOM Elements
const themeToggle = document.getElementById('theme-toggle');
const mobileMenuBtn = document.getElementById('mobile-menu-btn');
const nav = document.querySelector('nav');
const carouselTrack = document.getElementById('carousel-track');
const prevBtn = document.getElementById('prev-btn');
const nextBtn = document.getElementById('next-btn');
const indicators = document.querySelectorAll('.indicator');
const carouselItems = document.querySelectorAll('.carousel-item');
const dropdowns = document.querySelectorAll('.dropdown');
const genreTabs = document.querySelectorAll('.tab-btn');

// Theme Toggle
themeToggle.addEventListener('click', () => {
    document.body.classList.toggle('light-mode');

    if (document.body.classList.contains('light-mode')) {
        themeToggle.innerHTML = '<i class="fas fa-sun"></i>';
        // Set cookie for PHP to read
        document.cookie = "theme=light; path=/; max-age=" + 60*60*24*365; // 1 year
    } else {
        themeToggle.innerHTML = '<i class="fas fa-moon"></i>';
        // Set cookie for PHP to read
        document.cookie = "theme=dark; path=/; max-age=" + 60*60*24*365; // 1 year
    }
});

// Mobile Menu Toggle
mobileMenuBtn.addEventListener('click', () => {
    mobileMenuBtn.classList.toggle('active');
    nav.classList.toggle('active');
});

// Close mobile menu when clicking outside
document.addEventListener('click', (e) => {
    if (!e.target.closest('nav') && !e.target.closest('#mobile-menu-btn') && window.innerWidth <= 768) {
        mobileMenuBtn.classList.remove('active');
        nav.classList.remove('active');
    }
});

// Mobile Dropdown Toggle
if (window.innerWidth <= 768) {
    dropdowns.forEach(dropdown => {
        const dropdownLink = dropdown.querySelector('a');

        dropdownLink.addEventListener('click', (e) => {
            e.preventDefault();
            dropdown.classList.toggle('active');
        });
    });
}

// Carousel Functionality
let currentSlide = 0;
const totalSlides = carouselItems.length;

// Initialize carousel
function showSlide(index) {
    // Hide all slides
    carouselItems.forEach(item => {
        item.classList.remove('active');
    });

    // Remove active class from all indicators
    indicators.forEach(dot => {
        dot.classList.remove('active');
    });

    // Show the current slide
    carouselItems[index].classList.add('active');

    // Add active class to current indicator
    indicators[index].classList.add('active');
}

// Next slide
function nextSlide() {
    currentSlide = (currentSlide + 1) % totalSlides;
    showSlide(currentSlide);
}

// Previous slide
function prevSlide() {
    currentSlide = (currentSlide - 1 + totalSlides) % totalSlides;
    showSlide(currentSlide);
}

// Event listeners for carousel navigation
if (prevBtn && nextBtn) {
    nextBtn.addEventListener('click', nextSlide);
    prevBtn.addEventListener('click', prevSlide);
}

// Indicator click events
if (indicators.length > 0) {
    indicators.forEach((indicator, index) => {
        indicator.addEventListener('click', () => {
            currentSlide = index;
            showSlide(currentSlide);
        });
    });

    // Auto slide (optional)
    let carouselInterval = setInterval(nextSlide, 5000);

    // Pause auto slide on hover
    if (carouselTrack) {
        carouselTrack.addEventListener('mouseenter', () => {
            clearInterval(carouselInterval);
        });

        // Resume auto slide when mouse leaves
        carouselTrack.addEventListener('mouseleave', () => {
            carouselInterval = setInterval(nextSlide, 5000);
        });
    }

    // Initialize the carousel
    showSlide(currentSlide);
}

// Genre Tabs
if (genreTabs.length > 0) {
    genreTabs.forEach(tab => {
        tab.addEventListener('click', () => {
            // Remove active class from all tabs
            genreTabs.forEach(t => t.classList.remove('active'));

            // Add active class to clicked tab
            tab.classList.add('active');

            // Here you would typically load different games based on the selected genre
            // For demo purposes, we'll just log the selected genre
            console.log(`Selected genre: ${tab.dataset.genre}`);

            // Animation for game grid (optional)
            const gameGrid = document.getElementById('game-grid');
            if (gameGrid) {
                gameGrid.style.opacity = '0';

                // Simulate AJAX request to load new games
                setTimeout(() => {
                    // Here you would update the game grid with new games
                    // In a real app, this would be an AJAX call to a PHP endpoint
                    gameGrid.style.opacity = '1';
                }, 300);
            }
        });
    });
}

// Add hover effect to game cards for better mobile experience
const gameCards = document.querySelectorAll('.game-card');
gameCards.forEach(card => {
    card.addEventListener('touchstart', () => {
        // Remove hover effect from all other cards
        gameCards.forEach(c => {
            if (c !== card) {
                const hoverInfo = c.querySelector('.hover-info');
                if (hoverInfo) {
                    hoverInfo.style.opacity = '0';
                }
            }
        });

        // Toggle hover effect on the current card
        const hoverInfo = card.querySelector('.hover-info');
        if (hoverInfo) {
            const currentOpacity = window.getComputedStyle(hoverInfo).opacity;
            hoverInfo.style.opacity = currentOpacity === '0' ? '1' : '0';
        }
    });
});

// Search functionality
const searchBtn = document.querySelector('.search-btn');
if (searchBtn) {
    searchBtn.addEventListener('click', () => {
        // You could show a search modal or redirect to search page
        console.log('Search button clicked');
    });
}

// Load more button functionality
const loadMoreBtn = document.querySelector('.load-more .btn');
if (loadMoreBtn) {
    loadMoreBtn.addEventListener('click', () => {
        // In a real app, this would load more games via AJAX
        console.log('Load more button clicked');

        // Example of how you might implement this:
        loadMoreBtn.textContent = 'Loading...';
        loadMoreBtn.disabled = true;

        // Simulate AJAX request
        setTimeout(() => {
            loadMoreBtn.textContent = 'Load More Action Games';
            loadMoreBtn.disabled = false;

            // Here you would append new game cards to the grid
            console.log('More games loaded');
        }, 1000);
    });
}
