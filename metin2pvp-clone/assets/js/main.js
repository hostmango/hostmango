// Main JavaScript File for Metin2PVP Clone

// Wait for DOM to be ready
document.addEventListener('DOMContentLoaded', function() {
    // Remove loading animation after page loads
    setTimeout(function() {
        const loading = document.querySelector('.site_loading');
        if (loading) {
            loading.style.display = 'none';
        }
    }, 1000);

    // Mobile Navigation Toggle
    const navicon = document.querySelector('.navicon');
    const mobileNav = document.querySelector('.h-nav');

    if (navicon) {
        navicon.addEventListener('click', function() {
            this.classList.toggle('active');
            if (mobileNav) {
                mobileNav.style.display = mobileNav.style.display === 'block' ? 'none' : 'block';
            }
        });
    }

    // Popup Management
    const popupOverlay = document.getElementById('popupOverlay');
    const closePopup = document.getElementById('closePopup');

    function shouldShowPopup() {
        const popupLastClosed = localStorage.getItem('popupLastClosed');
        if (!popupLastClosed) {
            return true;
        }

        const lastClosedTime = parseInt(popupLastClosed);
        const currentTime = new Date().getTime();
        const fifteenMinutes = 15 * 60 * 1000;

        return (currentTime - lastClosedTime) > fifteenMinutes;
    }

    function closePopupAndSave() {
        if (popupOverlay) {
            popupOverlay.classList.remove('active');
            localStorage.setItem('popupLastClosed', new Date().getTime().toString());
        }
    }

    if (popupOverlay && shouldShowPopup()) {
        popupOverlay.classList.add('active');

        if (closePopup) {
            closePopup.disabled = true;
            closePopup.style.opacity = '0.5';
            closePopup.style.cursor = 'not-allowed';

            setTimeout(function() {
                closePopup.disabled = false;
                closePopup.style.opacity = '1';
                closePopup.style.cursor = 'pointer';
            }, 3000);

            closePopup.addEventListener('click', function(e) {
                e.preventDefault();
                if (!this.disabled) {
                    closePopupAndSave();
                }
            });
        }
    }

    // Dropdown menu functionality
    const dropdowns = document.querySelectorAll('.dropdown');
    dropdowns.forEach(function(dropdown) {
        dropdown.addEventListener('mouseenter', function() {
            const menu = this.querySelector('.dropdown-menu');
            if (menu) {
                menu.style.display = 'block';
            }
        });

        dropdown.addEventListener('mouseleave', function() {
            const menu = this.querySelector('.dropdown-menu');
            if (menu) {
                menu.style.display = 'none';
            }
        });
    });

    // Server card hover effects
    const servers = document.querySelectorAll('.server .s-left');
    servers.forEach(function(server) {
        server.addEventListener('mouseenter', function() {
            this.style.backgroundColor = 'rgba(255, 47, 0, 0.1)';
        });

        server.addEventListener('mouseleave', function() {
            this.style.backgroundColor = 'rgba(0, 0, 0, 0)';
        });
    });

    // Filter dropdown functionality
    const selectBase = document.querySelector('.select-base');
    if (selectBase) {
        const selectToggle = selectBase.querySelector('b');
        const selectMenu = selectBase.querySelector('.select');

        if (selectToggle) {
            selectToggle.addEventListener('click', function() {
                if (selectMenu) {
                    selectMenu.style.display = selectMenu.style.display === 'block' ? 'none' : 'block';
                }
            });
        }

        // Close dropdown when clicking outside
        document.addEventListener('click', function(e) {
            if (selectBase && !selectBase.contains(e.target) && selectMenu) {
                selectMenu.style.display = 'none';
            }
        });
    }

    // Smooth scroll for anchor links
    const anchorLinks = document.querySelectorAll('a[href^="#"]');
    anchorLinks.forEach(function(link) {
        link.addEventListener('click', function(e) {
            const href = this.getAttribute('href');
            if (href !== '#' && href !== '#!') {
                const target = document.querySelector(href);
                if (target) {
                    e.preventDefault();
                    target.scrollIntoView({
                        behavior: 'smooth',
                        block: 'start'
                    });
                }
            }
        });
    });

    // Blog menu toggle
    const blogToggle = document.querySelector('.arrow_before');
    if (blogToggle) {
        blogToggle.addEventListener('click', function() {
            const isOpen = this.getAttribute('data-open') === '1';
            const catId = this.getAttribute('data-cat');
            const subItems = document.querySelectorAll(`[data-parentcat="${catId}"]`);

            subItems.forEach(function(item) {
                item.style.display = isOpen ? 'none' : 'block';
            });

            this.setAttribute('data-open', isOpen ? '0' : '1');
        });
    }

    // Search form functionality
    const searchForm = document.getElementById('Ara');
    if (searchForm) {
        searchForm.addEventListener('submit', function(e) {
            e.preventDefault();
            const searchInput = this.querySelector('input[name="search"]');
            if (searchInput && searchInput.value.trim()) {
                console.log('Searching for:', searchInput.value);
                // In a real implementation, this would redirect to search results
            }
        });
    }

    // Add click animation to vote buttons
    const voteButtons = document.querySelectorAll('.votes-btn');
    voteButtons.forEach(function(btn) {
        btn.addEventListener('click', function(e) {
            // Add visual feedback
            this.style.transform = 'scale(0.95)';
            setTimeout(() => {
                this.style.transform = 'scale(1)';
            }, 100);
        });
    });

    // Odometer animation for statistics (simple version without library)
    function animateValue(element, start, end, duration) {
        if (!element) return;

        const range = end - start;
        const increment = end > start ? 1 : -1;
        const stepTime = Math.abs(Math.floor(duration / range));
        let current = start;

        const timer = setInterval(function() {
            current += increment;
            element.textContent = current;
            if (current === end) {
                clearInterval(timer);
            }
        }, stepTime);
    }

    // Notification check (simulated)
    function BildirimKontrol() {
        // In a real implementation, this would make an AJAX call
        const bildirimCount = document.querySelector('.bildirim_count');
        if (bildirimCount) {
            // Simulating no notifications
            bildirimCount.classList.add('d-none');
        }
    }

    // Initial notification check
    BildirimKontrol();

    // Check notifications every minute
    setInterval(BildirimKontrol, 60000);

    // Language switcher
    const langSwitcher = document.querySelector('.change-lang');
    if (langSwitcher) {
        const langMenu = langSwitcher.querySelector('ul');

        langSwitcher.addEventListener('mouseenter', function() {
            if (langMenu) {
                langMenu.style.display = 'block';
            }
        });

        langSwitcher.addEventListener('mouseleave', function() {
            if (langMenu) {
                langMenu.style.display = 'none';
            }
        });
    }

    // Server "More Info" button animation
    const moreInfoBtns = document.querySelectorAll('.more-info-btn');
    moreInfoBtns.forEach(function(btn) {
        const parent = btn.closest('.s-left');
        if (parent) {
            parent.addEventListener('mouseenter', function() {
                btn.style.transform = 'translateY(-8px)';
            });

            parent.addEventListener('mouseleave', function() {
                btn.style.transform = 'translateY(0)';
            });
        }
    });

    console.log('Metin2PVP Clone initialized successfully!');
});

// Utility function for formatting numbers
function formatNumber(num) {
    return num.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ".");
}

// Utility function for truncating text
function truncateText(text, length) {
    if (text.length <= length) return text;
    return text.substr(0, length) + '...';
}
