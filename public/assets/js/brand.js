(function () {
    function renderTodayHours() {
        var dataEl = document.getElementById('mdHoursData');
        var todayEl = document.getElementById('mdTodayHours');
        if (!dataEl || !todayEl) {
            return;
        }

        var schedule = [];
        try {
            schedule = JSON.parse(dataEl.textContent || '[]');
        } catch (e) {
            return;
        }

        if (!Array.isArray(schedule) || !schedule.length) {
            return;
        }

        var today = new Date().toLocaleDateString('en-US', { weekday: 'long' });
        var shortToday = today.slice(0, 3).toLowerCase();
        var match = schedule.find(function (row) {
            return String(row.day || '').toLowerCase().indexOf(shortToday) !== -1;
        });

        if (match && match.hours) {
            todayEl.textContent = match.day + ' · ' + match.hours;
        }
    }

    function initShowMoreReviews() {
        var button = document.getElementById('mdShowMoreReviews');
        if (!button) {
            return;
        }

        button.addEventListener('click', function () {
            document.querySelectorAll('.md-review-extra').forEach(function (el) {
                el.classList.remove('hidden');
            });
            button.closest('.mt-6')?.remove();
        });
    }

    function initMenuCarousel() {
        var root = document.getElementById('mdMenuCarousel');
        var track = document.getElementById('mdMenuCarouselTrack');
        if (!root || !track) {
            return;
        }

        var prevBtn = root.querySelector('[data-md-carousel-prev]');
        var nextBtn = root.querySelector('[data-md-carousel-next]');
        var slides = Array.prototype.slice.call(track.querySelectorAll('.md-menu-carousel__slide'));

        function getScrollStep() {
            var slide = slides[0];
            if (!slide) {
                return 280;
            }
            var styles = window.getComputedStyle(track);
            var gap = parseFloat(styles.columnGap || styles.gap || '16') || 16;
            return slide.offsetWidth + gap;
        }

        function setActiveSlide(index) {
            slides.forEach(function (slide, i) {
                slide.classList.toggle('is-active', i === index);
            });
        }

        function scrollByDirection(direction) {
            track.scrollBy({
                left: direction * getScrollStep(),
                behavior: 'smooth',
            });
        }

        if (prevBtn) {
            prevBtn.addEventListener('click', function () {
                scrollByDirection(-1);
            });
        }

        if (nextBtn) {
            nextBtn.addEventListener('click', function () {
                scrollByDirection(1);
            });
        }

        track.addEventListener('scroll', function () {
            if (!slides.length) {
                return;
            }
            var trackRect = track.getBoundingClientRect();
            var center = trackRect.left + trackRect.width / 2;
            var closestIndex = 0;
            var closestDistance = Infinity;

            slides.forEach(function (slide, index) {
                var slideRect = slide.getBoundingClientRect();
                var slideCenter = slideRect.left + slideRect.width / 2;
                var distance = Math.abs(slideCenter - center);
                if (distance < closestDistance) {
                    closestDistance = distance;
                    closestIndex = index;
                }
            });

            setActiveSlide(closestIndex);
        }, { passive: true });
    }

    function parseJsonData(id) {
        var dataEl = document.getElementById(id);
        if (!dataEl) {
            return [];
        }

        try {
            var parsed = JSON.parse(dataEl.textContent || '[]');
            return Array.isArray(parsed) ? parsed : [];
        } catch (e) {
            return [];
        }
    }

    function initHeroGallery() {
        var root = document.getElementById('mdHeroGallery');
        var img = document.getElementById('mdHeroGalleryImage');
        var imgBtn = document.getElementById('mdHeroGalleryImageBtn');
        var dotsWrap = document.getElementById('mdHeroGalleryDots');
        var slides = parseJsonData('mdGalleryLightboxData');

        if (!root || !img || !slides.length) {
            return;
        }

        var current = 0;
        var autoplayTimer = null;
        var autoplayDelay = 5000;
        var dots = Array.prototype.slice.call(root.querySelectorAll('[data-md-hero-dot]'));
        var thumbs = Array.prototype.slice.call(document.querySelectorAll('.md-hero-thumb'));
        var prevBtn = root.querySelector('[data-md-hero-prev]');
        var nextBtn = root.querySelector('[data-md-hero-next]');

        function render(index) {
            if (index < 0) {
                index = slides.length - 1;
            }
            if (index >= slides.length) {
                index = 0;
            }

            current = index;
            var slide = slides[current] || {};
            img.src = slide.src || '';
            img.alt = slide.alt || slide.title || '';

            if (imgBtn) {
                imgBtn.setAttribute('data-md-lightbox-src', slide.src || '');
                imgBtn.setAttribute('data-md-lightbox-title', slide.title || slide.alt || '');
                imgBtn.setAttribute('data-md-lightbox-index', String(current));
            }

            dots.forEach(function (dot, i) {
                dot.classList.toggle('md-hero-dot--active', i === current);
            });

            thumbs.forEach(function (thumb) {
                var go = parseInt(thumb.getAttribute('data-md-hero-go') || '-1', 10);
                thumb.classList.toggle('is-active', go === current);
            });
        }

        function goNext() {
            render(current + 1);
            resetAutoplay();
        }

        function goPrev() {
            render(current - 1);
            resetAutoplay();
        }

        function startAutoplay() {
            if (slides.length <= 1) {
                return;
            }
            clearInterval(autoplayTimer);
            autoplayTimer = window.setInterval(function () {
                render(current + 1);
            }, autoplayDelay);
        }

        function resetAutoplay() {
            clearInterval(autoplayTimer);
            startAutoplay();
        }

        if (slides.length <= 1) {
            if (prevBtn) {
                prevBtn.style.display = 'none';
            }
            if (nextBtn) {
                nextBtn.style.display = 'none';
            }
            if (dotsWrap) {
                dotsWrap.style.display = 'none';
            }
        } else {
            if (prevBtn) {
                prevBtn.addEventListener('click', goPrev);
            }
            if (nextBtn) {
                nextBtn.addEventListener('click', goNext);
            }

            dots.forEach(function (dot) {
                dot.addEventListener('click', function () {
                    render(parseInt(dot.getAttribute('data-md-hero-dot') || '0', 10));
                    resetAutoplay();
                });
            });

            root.addEventListener('mouseenter', function () {
                clearInterval(autoplayTimer);
            });
            root.addEventListener('mouseleave', startAutoplay);

            startAutoplay();
        }

        if (dotsWrap && slides.length > 8) {
            dotsWrap.style.display = 'none';
        }

        thumbs.forEach(function (thumb) {
            thumb.addEventListener('click', function () {
                render(parseInt(thumb.getAttribute('data-md-hero-go') || '0', 10));
                resetAutoplay();
            });
        });

        render(0);
    }

    function initImageLightbox() {
        var groups = {
            gallery: parseJsonData('mdGalleryLightboxData'),
            menu: parseJsonData('mdMenuLightboxData'),
        };

        if (!groups.menu.length) {
            groups.menu = Array.prototype.slice.call(document.querySelectorAll('[data-md-lightbox-group="menu"]')).map(function (el) {
                return {
                    src: el.getAttribute('data-md-lightbox-src'),
                    title: el.getAttribute('data-md-lightbox-title') || '',
                    alt: el.getAttribute('data-md-lightbox-title') || '',
                };
            });
        }

        var hasItems = groups.gallery.length || groups.menu.length;
        if (!hasItems) {
            return;
        }

        var items = [];

        var lightbox = document.createElement('div');
        lightbox.className = 'md-lightbox hidden';
        lightbox.id = 'mdLightbox';
        lightbox.innerHTML =
            '<div class="md-lightbox__overlay" data-md-lightbox-close></div>' +
            '<div class="md-lightbox__dialog" role="dialog" aria-modal="true" aria-label="Image preview">' +
                '<button type="button" class="md-lightbox__close" style="padding-bottom: 6px;" data-md-lightbox-close aria-label="Close">&times;</button>' +
                '<button type="button" class="md-lightbox__nav md-lightbox__nav--prev" data-md-lightbox-prev aria-label="Previous image">' +
                    '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="m15 18-6-6 6-6"></path></svg>' +
                '</button>' +
                '<button type="button" class="md-lightbox__nav md-lightbox__nav--next" data-md-lightbox-next aria-label="Next image">' +
                    '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="m9 18 6-6-6-6"></path></svg>' +
                '</button>' +
                '<figure class="md-lightbox__figure">' +
                    '<img class="md-lightbox__image" src="" alt="">' +
                    '<figcaption class="md-lightbox__caption"></figcaption>' +
                '</figure>' +
            '</div>';
        document.body.appendChild(lightbox);

        var imageEl = lightbox.querySelector('.md-lightbox__image');
        var captionEl = lightbox.querySelector('.md-lightbox__caption');
        var prevBtn = lightbox.querySelector('[data-md-lightbox-prev]');
        var nextBtn = lightbox.querySelector('[data-md-lightbox-next]');
        var currentIndex = 0;
        var lastFocus = null;
        var activeGroup = 'menu';

        function getGroupItems(group) {
            return groups[group] || [];
        }

        function render(index) {
            items = getGroupItems(activeGroup);
            if (!items.length) {
                return;
            }

            if (index < 0) {
                index = items.length - 1;
            }
            if (index >= items.length) {
                index = 0;
            }

            currentIndex = index;
            var item = items[index];
            imageEl.src = item.src || '';
            imageEl.alt = item.alt || item.title || '';
            captionEl.textContent = item.title || item.alt || '';
            prevBtn.style.display = items.length > 1 ? '' : 'none';
            nextBtn.style.display = items.length > 1 ? '' : 'none';
        }

        function open(group, index) {
            activeGroup = groups[group] ? group : 'menu';
            items = getGroupItems(activeGroup);
            if (!items.length) {
                return;
            }

            lastFocus = document.activeElement;
            render(index);
            lightbox.classList.remove('hidden');
            document.body.classList.add('md-lightbox-open');
            lightbox.querySelector('.md-lightbox__close')?.focus();
        }

        function close() {
            lightbox.classList.add('hidden');
            document.body.classList.remove('md-lightbox-open');
            imageEl.src = '';
            if (lastFocus && typeof lastFocus.focus === 'function') {
                lastFocus.focus();
            }
        }

        document.querySelectorAll('[data-md-lightbox-src]').forEach(function (trigger) {
            trigger.addEventListener('click', function () {
                var group = trigger.getAttribute('data-md-lightbox-group') || 'menu';
                var groupItems = getGroupItems(group);
                if (!groupItems.length) {
                    return;
                }

                var index = parseInt(trigger.getAttribute('data-md-lightbox-index') || '-1', 10);
                if (index < 0 || Number.isNaN(index)) {
                    var src = trigger.getAttribute('data-md-lightbox-src');
                    index = groupItems.findIndex(function (item) {
                        return item.src === src;
                    });
                }

                open(group, index >= 0 ? index : 0);
            });
        });

        lightbox.querySelectorAll('[data-md-lightbox-close]').forEach(function (el) {
            el.addEventListener('click', close);
        });

        prevBtn.addEventListener('click', function () {
            render(currentIndex - 1);
        });

        nextBtn.addEventListener('click', function () {
            render(currentIndex + 1);
        });

        document.addEventListener('keydown', function (event) {
            if (lightbox.classList.contains('hidden')) {
                return;
            }

            if (event.key === 'Escape') {
                close();
            } else if (event.key === 'ArrowLeft') {
                render(currentIndex - 1);
            } else if (event.key === 'ArrowRight') {
                render(currentIndex + 1);
            }
        });
    }

    function initMenuCategoryFilter() {
        var root = document.getElementById('mdMenuFilters');
        var items = document.querySelectorAll('.md-menu-item');
        if (!root || !items.length) {
            return;
        }

        var activeClasses = ['bg-purple-800', 'text-white', 'shadow-md', 'shadow-purple-200/50'];
        var inactiveClasses = ['bg-purple-50', 'text-slate-600', 'hover:bg-purple-100'];

        function setActiveButton(button) {
            root.querySelectorAll('.md-menu-filter').forEach(function (btn) {
                btn.classList.remove('is-active');
                activeClasses.forEach(function (cls) {
                    btn.classList.remove(cls);
                });
                inactiveClasses.forEach(function (cls) {
                    btn.classList.add(cls);
                });
            });

            button.classList.add('is-active');
            inactiveClasses.forEach(function (cls) {
                button.classList.remove(cls);
            });
            activeClasses.forEach(function (cls) {
                button.classList.add(cls);
            });
        }

        function filterCategory(category) {
            items.forEach(function (item) {
                var itemCategory = item.getAttribute('data-md-menu-category') || '';
                var visible = category === 'all' || itemCategory === category;
                item.classList.toggle('hidden', !visible);
            });
        }

        root.querySelectorAll('.md-menu-filter').forEach(function (button) {
            button.addEventListener('click', function () {
                setActiveButton(button);
                filterCategory(button.getAttribute('data-md-menu-filter') || 'all');
            });
        });
    }

    function initReviewForm() {
        var form = document.getElementById('mdReviewForm');
        var successEl = document.getElementById('mdReviewSuccess');
        if (!form) {
            return;
        }

        var starButtons = form.querySelectorAll('.md-review-star');
        var defaultRating = 5;

        function setStars(rating) {
            starButtons.forEach(function (button, index) {
                var star = button.querySelector('svg');
                if (!star) {
                    return;
                }
                var filled = index < rating;
                star.classList.toggle('fill-amber-400', filled);
                star.classList.toggle('text-amber-400', filled);
                star.classList.toggle('text-slate-300', !filled);
            });
        }

        starButtons.forEach(function (button) {
            button.addEventListener('click', function () {
                var rating = parseInt(button.getAttribute('data-md-star') || '5', 10);
                setStars(Number.isNaN(rating) ? defaultRating : rating);
            });
        });

        form.addEventListener('submit', function (event) {
            event.preventDefault();

            if (successEl) {
                successEl.classList.remove('hidden');
            }

            form.reset();
            setStars(defaultRating);

            if (successEl) {
                window.setTimeout(function () {
                    successEl.classList.add('hidden');
                }, 4000);
            }
        });
    }

    function initSectionNav() {
        var nav = document.getElementById('mdSectionNav');
        if (!nav) {
            return;
        }

        var links = nav.querySelectorAll('.md-section-nav__link');
        var sections = [];

        function setActive(activeId) {
            links.forEach(function (link) {
                link.classList.toggle('is-active', link.getAttribute('data-md-section') === activeId);
            });
        }

        links.forEach(function (link) {
            var sectionId = (link.getAttribute('href') || '').replace('#', '');
            var sectionEl = document.getElementById(sectionId);
            if (!sectionEl) {
                return;
            }

            sections.push({ id: sectionId, el: sectionEl });

            link.addEventListener('click', function (event) {
                event.preventDefault();
                sectionEl.scrollIntoView({ behavior: 'smooth', block: 'start' });
                setActive(sectionId);
                if (history.replaceState) {
                    history.replaceState(null, '', '#' + sectionId);
                }
            });
        });

        if (!sections.length || !('IntersectionObserver' in window)) {
            return;
        }

        var visibleMap = {};

        var observer = new IntersectionObserver(function (entries) {
            entries.forEach(function (entry) {
                visibleMap[entry.target.id] = entry.isIntersecting ? entry.intersectionRatio : 0;
            });

            var bestId = sections[0].id;
            var bestRatio = -1;

            sections.forEach(function (section) {
                var ratio = visibleMap[section.id] || 0;
                if (ratio > bestRatio) {
                    bestRatio = ratio;
                    bestId = section.id;
                }
            });

            if (bestRatio >= 0) {
                setActive(bestId);
            }
        }, {
            root: null,
            rootMargin: '-30% 0px -55% 0px',
            threshold: [0, 0.15, 0.35, 0.55, 0.75, 1],
        });

        sections.forEach(function (section) {
            observer.observe(section.el);
        });

        var hash = (window.location.hash || '').replace('#', '');
        if (hash && document.getElementById(hash)) {
            setActive(hash);
        }
    }

    document.addEventListener('DOMContentLoaded', function () {
        renderTodayHours();
        initShowMoreReviews();
        initMenuCarousel();
        initHeroGallery();
        initImageLightbox();
        initMenuCategoryFilter();
        initReviewForm();
        initSectionNav();
    });
})();
