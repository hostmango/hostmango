/**
 * Metin2PVP.com Clone - JavaScript
 * Handles all interactive functionality
 */

document.addEventListener('DOMContentLoaded', function () {

    // ============================================================
    // NAVBAR SCROLL EFFECT
    // ============================================================
    const navbar = document.getElementById('mainNavbar');
    let lastScroll = 0;

    window.addEventListener('scroll', function () {
        const currentScroll = window.pageYOffset;
        if (currentScroll > 50) {
            navbar.classList.add('scrolled');
        } else {
            navbar.classList.remove('scrolled');
        }
        lastScroll = currentScroll;
    });

    // ============================================================
    // MOBILE MENU TOGGLE
    // ============================================================
    const navToggler = document.getElementById('navToggler');
    const navbarMenu = document.getElementById('navbarMenu');

    if (navToggler && navbarMenu) {
        navToggler.addEventListener('click', function () {
            navbarMenu.classList.toggle('show');
            this.classList.toggle('active');
        });

        // Close menu when clicking a link
        navbarMenu.querySelectorAll('.nav-link-item').forEach(function (link) {
            link.addEventListener('click', function () {
                if (window.innerWidth <= 768) {
                    navbarMenu.classList.remove('show');
                    navToggler.classList.remove('active');
                }
            });
        });
    }

    // ============================================================
    // NOTIFICATION DROPDOWN
    // ============================================================
    const notifTrigger = document.getElementById('notifTrigger');
    const notifPanel = document.getElementById('notifPanel');

    if (notifTrigger && notifPanel) {
        notifTrigger.addEventListener('click', function (e) {
            e.preventDefault();
            e.stopPropagation();
            notifPanel.classList.toggle('show');
            // Close lang dropdown if open
            var langPanel = document.getElementById('langPanel');
            if (langPanel) langPanel.classList.remove('show');
        });
    }

    // ============================================================
    // LANGUAGE DROPDOWN
    // ============================================================
    const langTrigger = document.getElementById('langTrigger');
    const langPanel = document.getElementById('langPanel');

    if (langTrigger && langPanel) {
        langTrigger.addEventListener('click', function (e) {
            e.preventDefault();
            e.stopPropagation();
            langPanel.classList.toggle('show');
            // Close notif dropdown if open
            if (notifPanel) notifPanel.classList.remove('show');
        });
    }

    // Close dropdowns when clicking outside
    document.addEventListener('click', function (e) {
        if (notifPanel && !e.target.closest('#notifDropdown')) {
            notifPanel.classList.remove('show');
        }
        if (langPanel && !e.target.closest('#langDropdown')) {
            langPanel.classList.remove('show');
        }
    });

    // ============================================================
    // FILTER TOGGLE
    // ============================================================
    const filterToggle = document.getElementById('filterToggle');
    const filterBody = document.getElementById('filterBody');
    const filterArrow = filterToggle ? filterToggle.querySelector('.filter-arrow') : null;

    if (filterToggle && filterBody) {
        filterToggle.addEventListener('click', function () {
            filterBody.classList.toggle('show');
            if (filterArrow) filterArrow.classList.toggle('rotated');
        });
    }

    // ============================================================
    // FILTER PILLS
    // ============================================================
    const filterPills = document.querySelectorAll('.filter-pill');
    const serverCards = document.querySelectorAll('.server-card');
    const filterLabel = document.querySelector('.filter-label strong');

    filterPills.forEach(function (pill) {
        pill.addEventListener('click', function () {
            var filterType = this.getAttribute('data-filter');
            var filterValue = this.getAttribute('data-value');

            // Toggle active state for type filters
            if (filterType === 'type') {
                document.querySelectorAll('.filter-pill[data-filter="type"]').forEach(function (p) {
                    p.classList.remove('active');
                });
                this.classList.add('active');

                // Update filter label
                if (filterLabel) {
                    filterLabel.textContent = filterValue;
                }

                // Filter server cards
                serverCards.forEach(function (card) {
                    if (filterValue === 'Tümü') {
                        card.style.display = '';
                    } else {
                        var cardType = card.getAttribute('data-type');
                        if (cardType === filterValue) {
                            card.style.display = '';
                        } else {
                            card.style.display = 'none';
                        }
                    }
                });
            } else {
                // Language filter toggle
                this.classList.toggle('active');
            }
        });
    });

    // ============================================================
    // SEARCH FUNCTIONALITY
    // ============================================================
    const searchInput = document.getElementById('searchInput');
    var searchTimeout;

    if (searchInput) {
        searchInput.addEventListener('input', function () {
            var query = this.value.toLowerCase().trim();

            clearTimeout(searchTimeout);
            searchTimeout = setTimeout(function () {
                serverCards.forEach(function (card) {
                    var name = card.querySelector('.server-name');
                    var desc = card.querySelector('.server-description p');
                    var nameText = name ? name.textContent.toLowerCase() : '';
                    var descText = desc ? desc.textContent.toLowerCase() : '';

                    if (query === '' || nameText.indexOf(query) !== -1 || descText.indexOf(query) !== -1) {
                        card.style.display = '';
                    } else {
                        card.style.display = 'none';
                    }
                });
            }, 300);
        });
    }

    // ============================================================
    // COUNTER ANIMATION
    // ============================================================
    var counters = document.querySelectorAll('.counter');
    var counterObserved = false;

    function animateCounters() {
        counters.forEach(function (counter) {
            var target = parseInt(counter.getAttribute('data-target'), 10);
            var duration = 2000;
            var startTime = null;

            function updateCounter(timestamp) {
                if (!startTime) startTime = timestamp;
                var progress = Math.min((timestamp - startTime) / duration, 1);
                var eased = 1 - Math.pow(1 - progress, 3); // easeOutCubic
                var current = Math.floor(eased * target);
                counter.textContent = current.toLocaleString('tr-TR');

                if (progress < 1) {
                    requestAnimationFrame(updateCounter);
                } else {
                    counter.textContent = target.toLocaleString('tr-TR');
                }
            }

            requestAnimationFrame(updateCounter);
        });
    }

    // Intersection Observer for counters
    if (counters.length > 0 && 'IntersectionObserver' in window) {
        var observer = new IntersectionObserver(function (entries) {
            entries.forEach(function (entry) {
                if (entry.isIntersecting && !counterObserved) {
                    counterObserved = true;
                    animateCounters();
                }
            });
        }, { threshold: 0.3 });

        var statsSection = document.querySelector('.stats-section');
        if (statsSection) {
            observer.observe(statsSection);
        }
    }

    // ============================================================
    // STICKY CTA BANNER
    // ============================================================
    var stickyCta = document.getElementById('stickyCta');

    if (stickyCta) {
        window.addEventListener('scroll', function () {
            if (window.pageYOffset > 500) {
                stickyCta.classList.add('visible');
            } else {
                stickyCta.classList.remove('visible');
            }
        });
    }

    // ============================================================
    // LOGIN MODAL
    // ============================================================
    var loginModal = document.getElementById('loginModal');
    var modalClose = document.getElementById('modalClose');
    var loginLink = document.querySelector('a[href="/giris"]');

    if (loginLink && loginModal) {
        loginLink.addEventListener('click', function (e) {
            e.preventDefault();
            loginModal.classList.add('show');
            document.body.style.overflow = 'hidden';
        });
    }

    if (modalClose && loginModal) {
        modalClose.addEventListener('click', function () {
            loginModal.classList.remove('show');
            document.body.style.overflow = '';
        });

        loginModal.addEventListener('click', function (e) {
            if (e.target === loginModal) {
                loginModal.classList.remove('show');
                document.body.style.overflow = '';
            }
        });
    }

    // Close modal on Escape key
    document.addEventListener('keydown', function (e) {
        if (e.key === 'Escape' && loginModal && loginModal.classList.contains('show')) {
            loginModal.classList.remove('show');
            document.body.style.overflow = '';
        }
    });

    // ============================================================
    // PAGINATION (prevent default for demo)
    // ============================================================
    document.querySelectorAll('.page-btn').forEach(function (btn) {
        btn.addEventListener('click', function (e) {
            e.preventDefault();
            document.querySelectorAll('.page-btn').forEach(function (b) {
                b.classList.remove('active');
            });
            this.classList.add('active');

            // Scroll to top of ranked section
            var rankedSection = document.querySelector('.ranked-section');
            if (rankedSection) {
                rankedSection.scrollIntoView({ behavior: 'smooth', block: 'start' });
            }
        });
    });

    // ============================================================
    // SMOOTH SCROLL FOR ANCHOR LINKS
    // ============================================================
    document.querySelectorAll('a[href^="#"]').forEach(function (anchor) {
        anchor.addEventListener('click', function (e) {
            var targetId = this.getAttribute('href');
            if (targetId && targetId !== '#') {
                e.preventDefault();
                var target = document.querySelector(targetId);
                if (target) {
                    target.scrollIntoView({ behavior: 'smooth' });
                }
            }
        });
    });

    // ============================================================
    // CARD HOVER EFFECTS (touch devices)
    // ============================================================
    if ('ontouchstart' in window) {
        document.querySelectorAll('.server-card').forEach(function (card) {
            card.addEventListener('touchstart', function () {
                this.classList.add('touch-hover');
            });
            card.addEventListener('touchend', function () {
                var self = this;
                setTimeout(function () {
                    self.classList.remove('touch-hover');
                }, 300);
            });
        });
    }

});
