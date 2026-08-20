<script>
    document.addEventListener("DOMContentLoaded", function() {
        const sectionNav = document.querySelector(".b1-section-nav, .b2-section-nav, .mj-section-nav");
        if (sectionNav) {
            const navLinks = Array.from(sectionNav.querySelectorAll("[data-sections]"));
            const navEntries = navLinks.map(function(link) {
                const sectionIds = (link.getAttribute("data-sections") || "")
                    .split(",").map(function(id) { return id.trim(); }).filter(Boolean);
                const elements = sectionIds.map(function(id) {
                    return document.getElementById(id);
                }).filter(Boolean);

                link.addEventListener("click", function(e) {
                    const target = elements[0];
                    if (!target) return;
                    e.preventDefault();
                    target.scrollIntoView({ behavior: "smooth", block: "start" });
                    navLinks.forEach(function(item) { item.classList.remove("is-active"); });
                    link.classList.add("is-active");
                });

                return { link: link, elements: elements };
            }).filter(function(entry) { return entry.elements.length > 0; });

            const setActiveNav = function() {
                const offset = window.innerHeight * 0.35;
                let activeEntry = navEntries[0] || null;
                navEntries.forEach(function(entry) {
                    entry.elements.forEach(function(section) {
                        if (section.getBoundingClientRect().top - offset <= 0) activeEntry = entry;
                    });
                });
                if (!activeEntry) return;
                navLinks.forEach(function(item) {
                    item.classList.toggle("is-active", item === activeEntry.link);
                });
            };
            window.addEventListener("scroll", setActiveNav, { passive: true });
            setActiveNav();
        }

        function initMjGalleryLightbox(config) {
            const lightbox = document.getElementById(config.lightboxId);
            const dataEl = document.getElementById(config.dataId);
            if (!lightbox || !dataEl) return;
            let album = [];
            try { album = JSON.parse(dataEl.textContent || "[]"); } catch (e) { return; }
            if (!album.length) return;
            const imgEl = lightbox.querySelector(".mj-lightbox-img");
            const btnClose = lightbox.querySelector(".mj-lightbox-close");
            const btnPrev = lightbox.querySelector(".mj-lightbox-prev");
            const btnNext = lightbox.querySelector(".mj-lightbox-next");
            const counterEl = config.counterId ? document.getElementById(config.counterId) : null;
            if (!imgEl) return;
            let current = 0, lastFocus = null;
            function updateCounter() {
                if (counterEl) counterEl.textContent = (current + 1) + " / " + album.length;
            }
            function show(index) {
                current = (index + album.length) % album.length;
                const item = album[current];
                imgEl.style.animation = "none"; imgEl.offsetWidth; imgEl.style.animation = "";
                imgEl.src = item.src; imgEl.alt = item.alt || "";
                updateCounter();
            }
            function open(index) {
                lastFocus = document.activeElement;
                show(index);
                lightbox.classList.add("is-open");
                lightbox.setAttribute("aria-hidden", "false");
                document.body.classList.add("mj-lightbox-open");
                if (btnClose) btnClose.focus();
            }
            function close() {
                lightbox.classList.remove("is-open");
                lightbox.setAttribute("aria-hidden", "true");
                document.body.classList.remove("mj-lightbox-open");
                imgEl.src = "";
                if (lastFocus && lastFocus.focus) lastFocus.focus();
            }
            if (config.globalOpenName) window[config.globalOpenName] = open;
            (config.openButtons || []).forEach(function(selector) {
                document.querySelectorAll(selector).forEach(function(btn) {
                    btn.addEventListener("click", function(e) { e.preventDefault(); open(0); });
                });
            });
            if (config.itemSelector) {
                document.querySelectorAll(config.itemSelector).forEach(function(el) {
                    const index = parseInt(el.getAttribute(config.itemAttr), 10) || 0;
                    el.addEventListener("click", function(e) {
                        if (el.tagName === "BUTTON") e.preventDefault();
                        open(index);
                    });
                    el.addEventListener("keydown", function(e) {
                        if (e.key === "Enter" || e.key === " ") { e.preventDefault(); open(index); }
                    });
                });
            }
            if (btnClose) btnClose.addEventListener("click", close);
            if (btnPrev) btnPrev.addEventListener("click", function() { show(current - 1); });
            if (btnNext) btnNext.addEventListener("click", function() { show(current + 1); });
            lightbox.addEventListener("click", function(e) { if (e.target === lightbox) close(); });
            document.addEventListener("keydown", function(e) {
                if (!lightbox.classList.contains("is-open")) return;
                if (e.key === "Escape") { e.preventDefault(); close(); }
                else if (e.key === "ArrowLeft") { e.preventDefault(); show(current - 1); }
                else if (e.key === "ArrowRight") { e.preventDefault(); show(current + 1); }
            });
        }

        initMjGalleryLightbox({
            lightboxId: "mjLightbox", dataId: "mjMenuGalleryData", counterId: "mjLightboxCounter",
            globalOpenName: "openMenuGallery", openButtons: [".js-open-menu-gallery"],
            itemSelector: "[data-menu-lightbox]", itemAttr: "data-menu-lightbox",
        });
        initMjGalleryLightbox({
            lightboxId: "mjPhotoLightbox", dataId: "mjPhotoGalleryData", counterId: "mjPhotoLightboxCounter",
            openButtons: [".js-open-photo-gallery"],
            itemSelector: "[data-photo-lightbox]", itemAttr: "data-photo-lightbox",
        });

        const btn = document.querySelector(".loadmoreReview");
        const comments = document.querySelectorAll(".listReview .comment.hide");
        if (btn && comments.length > 0) {
            btn.addEventListener("click", function() {
                comments.forEach(function(c) { c.classList.remove("hide"); c.classList.add("show"); });
                btn.style.display = "none";
            });
        }

        document.querySelectorAll("[data-accordion-trigger]").forEach(function(trigger) {
            trigger.addEventListener("click", function() {
                const panel = trigger.closest("[data-accordion]");
                if (!panel) return;
                const isOpen = panel.classList.contains("is-open");
                document.querySelectorAll("[data-accordion].is-open").forEach(function(p) {
                    p.classList.remove("is-open");
                });
                if (!isOpen) panel.classList.add("is-open");
            });
        });

        document.querySelectorAll("[data-tab-trigger]").forEach(function(trigger) {
            trigger.addEventListener("click", function() {
                const target = trigger.getAttribute("data-tab-trigger");
                const wrap = trigger.closest("[data-tab-group]");
                if (!wrap || !target) return;
                wrap.querySelectorAll("[data-tab-trigger]").forEach(function(t) {
                    t.classList.toggle("is-active", t === trigger);
                });
                wrap.querySelectorAll("[data-tab-panel]").forEach(function(p) {
                    p.classList.toggle("is-active", p.getAttribute("data-tab-panel") === target);
                });
            });
        });
    });
</script>
