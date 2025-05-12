<?php
// Set page title
$pageTitle = "Frequently Asked Questions - GAMEZUNIA";

// Include header
include 'includes/header.php';
?>

<!-- FAQ Header Section -->
<section class="faq-header">
    <div class="container">
        <h1>Frequently Asked Questions</h1>
        <p>Find answers to the most common questions about GAMEZUNIA</p>

        <!-- Search Bar -->
        <div class="faq-search">
            <form id="faq-search-form">
                <input type="text" id="faq-search-input" placeholder="Search for questions...">
                <button type="submit"><i class="fas fa-search"></i></button>
            </form>
        </div>
    </div>
</section>

<!-- FAQ Content Section -->
<section class="faq-content">
    <div class="container">
        <div class="faq-container">
            <!-- FAQ Item 1 -->
            <div class="faq-item">
                <div class="faq-question">
                    <h3>Bagaimana cara mendaftar akun?</h3>
                    <span class="faq-toggle"><i class="fas fa-plus"></i></span>
                </div>
                <div class="faq-answer">
                    <p>Untuk mendaftar akun di GAMEZUNIA, klik tombol "Login" di pojok kanan atas halaman, kemudian
                        pilih opsi "Register". Isi formulir pendaftaran dengan email, username, dan password. Setelah
                        itu, Anda akan menerima email konfirmasi untuk mengaktifkan akun Anda.</p>
                </div>
            </div>

            <!-- FAQ Item 2 -->
            <div class="faq-item">
                <div class="faq-question">
                    <h3>Apakah game bisa diunduh?</h3>
                    <span class="faq-toggle"><i class="fas fa-plus"></i></span>
                </div>
                <div class="faq-answer">
                    <p>Ya, semua game di GAMEZUNIA dapat diunduh secara gratis. Setelah login, klik tombol "Download"
                        pada halaman detail game yang ingin Anda unduh. File game akan tersedia dalam format ZIP atau
                        executable sesuai dengan platform yang didukung.</p>
                </div>
            </div>

            <!-- FAQ Item 3 -->
            <div class="faq-question">
                <h3>Bagaimana cara menilai atau memberikan rating game?</h3>
                <span class="faq-toggle"><i class="fas fa-plus"></i></span>
            </div>
            <div class="faq-answer">
                <p>Untuk memberikan rating pada game, Anda harus login terlebih dahulu. Kemudian, kunjungi halaman
                    detail game yang ingin Anda nilai, scroll ke bawah hingga menemukan bagian "Rate This Game". Pilih
                    jumlah bintang (1-5) sesuai penilaian Anda dan opsional tambahkan review atau komentar.</p>
            </div>

            <!-- FAQ Item 4 -->
            <div class="faq-item">
                <div class="faq-question">
                    <h3>Apakah game gratis semua?</h3>
                    <span class="faq-toggle"><i class="fas fa-plus"></i></span>
                </div>
                <div class="faq-answer">
                    <p>Ya, GAMEZUNIA berfokus pada distribusi game PC gratis. Semua game yang tersedia di platform kami
                        dapat diunduh dan dimainkan tanpa biaya. Namun, beberapa game mungkin memiliki fitur in-game
                        purchase yang opsional.</p>
                </div>
            </div>

            <!-- FAQ Item 5 -->
            <div class="faq-item">
                <div class="faq-question">
                    <h3>Bagaimana cara melaporkan bug?</h3>
                    <span class="faq-toggle"><i class="fas fa-plus"></i></span>
                </div>
                <div class="faq-answer">
                    <p>Jika Anda menemukan bug pada website atau game, silakan laporkan melalui halaman "Contact Us"
                        atau langsung melalui Discord kami. Berikan detail lengkap tentang bug yang Anda temukan,
                        termasuk langkah-langkah untuk mereproduksi bug tersebut, screenshot (jika ada), dan informasi
                        sistem Anda.</p>
                </div>
            </div>

            <!-- FAQ Item 6 -->
            <div class="faq-item">
                <div class="faq-question">
                    <h3>Bagaimana spesifikasi minimum untuk menjalankan game?</h3>
                    <span class="faq-toggle"><i class="fas fa-plus"></i></span>
                </div>
                <div class="faq-answer">
                    <p>Setiap game memiliki spesifikasi minimum yang berbeda. Anda dapat melihat spesifikasi minimum
                        yang dibutuhkan pada halaman detail masing-masing game di bagian "System Requirements". Pastikan
                        komputer Anda memenuhi persyaratan tersebut sebelum mengunduh game.</p>
                </div>
            </div>

            <!-- FAQ Item 7 -->
            <div class="faq-item">
                <div class="faq-question">
                    <h3>Apakah saya bisa menjadi kontributor atau developer di GAMEZUNIA?</h3>
                    <span class="faq-toggle"><i class="fas fa-plus"></i></span>
                </div>
                <div class="faq-answer">
                    <p>Tentu! Kami selalu terbuka untuk developer indie yang ingin mendistribusikan game mereka di
                        platform kami. Untuk menjadi kontributor, silakan kunjungi halaman "For Developers" dan isi
                        formulir aplikasi. Tim kami akan meninjau aplikasi Anda dan menghubungi Anda dalam 3-5 hari
                        kerja.</p>
                </div>
            </div>
        </div>

        <!-- Need Help Section -->
        <div class="need-help">
            <h2>Masih Butuh Bantuan?</h2>
            <p>Jika Anda tidak menemukan jawaban yang Anda cari, jangan ragu untuk menghubungi kami atau bergabung
                dengan komunitas Discord kami.</p>
            <div class="help-buttons">
                <a href="contact.php" class="btn btn-primary">Hubungi Kami</a>
                <a href="discord.php" class="btn btn-secondary">Gabung Discord</a>
            </div>
        </div>
    </div>
</section>

<!-- FAQ JavaScript -->
<script>
document.addEventListener('DOMContentLoaded', function() {
    // Toggle FAQ answers
    const faqQuestions = document.querySelectorAll('.faq-question');

    faqQuestions.forEach(question => {
        question.addEventListener('click', function() {
            // Toggle active class on the question
            this.classList.toggle('active');

            // Toggle icon
            const icon = this.querySelector('.faq-toggle i');
            if (icon.classList.contains('fa-plus')) {
                icon.classList.remove('fa-plus');
                icon.classList.add('fa-minus');
            } else {
                icon.classList.remove('fa-minus');
                icon.classList.add('fa-plus');
            }

            // Toggle answer visibility
            const answer = this.nextElementSibling;
            if (answer && answer.classList.contains('faq-answer')) {
                if (answer.style.maxHeight) {
                    answer.style.maxHeight = null;
                } else {
                    answer.style.maxHeight = answer.scrollHeight + "px";
                }
            }
        });
    });

    // Search functionality
    const searchForm = document.getElementById('faq-search-form');
    const searchInput = document.getElementById('faq-search-input');
    const faqItems = document.querySelectorAll('.faq-item');

    searchForm.addEventListener('submit', function(e) {
        e.preventDefault();
        searchFAQs();
    });

    searchInput.addEventListener('keyup', searchFAQs);

    function searchFAQs() {
        const searchTerm = searchInput.value.toLowerCase();

        faqItems.forEach(item => {
            const question = item.querySelector('.faq-question h3').textContent.toLowerCase();
            const answer = item.querySelector('.faq-answer p').textContent.toLowerCase();

            if (question.includes(searchTerm) || answer.includes(searchTerm)) {
                item.style.display = 'block';
            } else {
                item.style.display = 'none';
            }
        });
    }
});
</script>

<?php
// Include footer
include 'includes/footer.php';
?>
