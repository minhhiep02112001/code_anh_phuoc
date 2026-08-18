/**
 * Venue Guide – front-end core (original)
 * Lazy images, section nav, lightbox, hours status, mobile menu.
 */
(function () {
    "use strict";

    var HEADER_OFFSET = 88;

    function ready(fn) {
        if (document.readyState !== "loading") {
            fn();
        } else {
            document.addEventListener("DOMContentLoaded", fn);
        }
    }

    /* ── Lazy load ── */
    function initLazyImages() {
        var images = [].slice.call(document.querySelectorAll("img[data-src]"));
        if (!images.length) return;

        var ticking = false;

        function loadVisible() {
            ticking = false;
            images = images.filter(function (img) {
                var rect = img.getBoundingClientRect();
                var visible =
                    rect.top <= window.innerHeight + 120 &&
                    rect.bottom >= -120 &&
                    getComputedStyle(img).display !== "none";

                if (visible && img.dataset.src) {
                    img.src = img.dataset.src;
                    img.removeAttribute("data-src");
                    img.classList.remove("lazy");
                    return false;
                }
                return true;
            });

            if (!images.length) {
                document.removeEventListener("scroll", onScroll);
                window.removeEventListener("resize", onScroll);
            }
        }

        function onScroll() {
            if (ticking) return;
            ticking = true;
            requestAnimationFrame(loadVisible);
        }

        document.addEventListener("scroll", onScroll, { passive: true });
        window.addEventListener("resize", onScroll);
        loadVisible();
    }

    /* ── Opening hours badge ── */
    function updateHoursStatus() {
        document.querySelectorAll("[data-hours-range]").forEach(function (el) {
            var raw = (el.getAttribute("data-hours-range") || "").trim();
            var lower = raw.toLowerCase();

            if (!raw || lower === "closed") {
                el.textContent = "Closed";
                el.classList.add("is-closed");
                el.classList.remove("is-open");
                return;
            }

            if (lower === "open 24 hours" || lower === "24 hours") {
                el.textContent = "Open now";
                el.classList.add("is-open");
                el.classList.remove("is-closed");
                return;
            }

            var parts = raw.split(" - ");
            if (parts.length < 2) {
                el.textContent = "Closed";
                el.classList.add("is-closed");
                el.classList.remove("is-open");
                return;
            }

            var now = new Date();
            var start = new Date(now.toDateString() + " " + parts[0].trim());
            var end = new Date(now.toDateString() + " " + parts[1].trim());

            if (end < start) {
                end.setDate(end.getDate() + 1);
            }

            if (now >= start && now <= end) {
                el.textContent = "Open now";
                el.classList.add("is-open");
                el.classList.remove("is-closed");
            } else {
                el.textContent = "Closed";
                el.classList.add("is-closed");
                el.classList.remove("is-open");
            }
        });
    }

    /* ── Expand / collapse blocks ── */
    function initExpandable() {
        document.querySelectorAll("[data-vn-expand]").forEach(function (btn) {
            var target = document.querySelector(btn.getAttribute("data-vn-expand"));
            if (!target) return;

            btn.addEventListener("click", function () {
                var expanded = target.classList.toggle("is-expanded");
                btn.setAttribute("aria-expanded", expanded ? "true" : "false");
                btn.textContent = expanded
                    ? btn.getAttribute("data-vn-label-less") || "Show less"
                    : btn.getAttribute("data-vn-label-more") || "Show more";
            });
        });
    }

    /* ── Load more reviews ── */
    function initLoadMore() {
        document.querySelectorAll("[data-vn-load-more]").forEach(function (btn) {
            var list = document.querySelector(btn.getAttribute("data-vn-load-more"));
            if (!list) return;

            var step = parseInt(btn.getAttribute("data-vn-step") || "5", 10);
            var hidden = list.querySelectorAll(".vn-review.hide, .hide");

            btn.addEventListener("click", function () {
                var shown = 0;
                hidden.forEach(function (item) {
                    if (shown >= step) return;
                    if (item.classList.contains("hide")) {
                        item.classList.remove("hide");
                        item.classList.add("show");
                        shown++;
                    }
                });

                hidden = list.querySelectorAll(".vn-review.hide, .hide");
                if (!hidden.length) {
                    btn.style.display = "none";
                }
            });
        });
    }

    /* ── Section navigation ── */
    function initSectionNav() {
        var nav = document.querySelector("[data-vn-section-nav]");
        if (!nav) return;

        var links = nav.querySelectorAll('a[href^="#"]');
        var sections = [];

        links.forEach(function (link) {
            var id = link.getAttribute("href").slice(1);
            var section = document.getElementById(id);
            if (section) {
                sections.push({ id: id, el: section, link: link });
            }

            link.addEventListener("click", function (e) {
                e.preventDefault();
                var target = document.getElementById(id);
                if (!target) return;
                var top =
                    target.getBoundingClientRect().top +
                    window.pageYOffset -
                    HEADER_OFFSET;
                window.scrollTo({ top: top, behavior: "smooth" });
            });
        });

        function setActive(id) {
            links.forEach(function (l) {
                l.classList.toggle(
                    "is-active",
                    l.getAttribute("href") === "#" + id
                );
            });
        }

        function onScroll() {
            var scrollY = window.pageYOffset + HEADER_OFFSET + 20;
            var current = sections.length ? sections[0].id : "";

            sections.forEach(function (s) {
                if (s.el.offsetTop <= scrollY) {
                    current = s.id;
                }
            });

            setActive(current);

            var hero = document.querySelector(".vn-brand-hero");
            if (hero) {
                var passedHero = hero.getBoundingClientRect().bottom <= HEADER_OFFSET;
                nav.classList.toggle("is-stuck", passedHero);
            }
        }

        window.addEventListener("scroll", onScroll, { passive: true });
        onScroll();
    }

    /* ── Lightbox ── */
    function initLightbox() {
        var overlay = document.getElementById("vnLightbox");
        if (!overlay) {
            overlay = document.createElement("div");
            overlay.id = "vnLightbox";
            overlay.className = "vn-lightbox";
            overlay.innerHTML =
                '<button type="button" class="vn-lightbox__close" aria-label="Close">&times;</button>' +
                '<button type="button" class="vn-lightbox__prev" aria-label="Previous">&#8249;</button>' +
                '<button type="button" class="vn-lightbox__next" aria-label="Next">&#8250;</button>' +
                '<figure class="vn-lightbox__figure"><img class="vn-lightbox__img" alt="" /></figure>' +
                '<p class="vn-lightbox__caption"></p>';
            document.body.appendChild(overlay);
        }

        var img = overlay.querySelector(".vn-lightbox__img");
        var caption = overlay.querySelector(".vn-lightbox__caption");
        var groups = {};
        var currentGroup = [];
        var currentIndex = 0;

        document.querySelectorAll("[data-vn-lightbox]").forEach(function (anchor) {
            var groupName = anchor.getAttribute("data-vn-lightbox") || "default";
            if (!groups[groupName]) groups[groupName] = [];
            var index = groups[groupName].length;
            groups[groupName].push(anchor);
            anchor.addEventListener("click", function (e) {
                e.preventDefault();
                currentGroup = groups[groupName];
                currentIndex = index;
                open();
            });
        });

        function open() {
            var item = currentGroup[currentIndex];
            if (!item) return;
            img.src = item.getAttribute("href") || item.dataset.full || "";
            caption.textContent = item.getAttribute("data-caption") || item.getAttribute("title") || "";
            overlay.classList.add("is-open");
            document.body.classList.add("vn-lightbox-open");
        }

        function close() {
            overlay.classList.remove("is-open");
            document.body.classList.remove("vn-lightbox-open");
            img.src = "";
        }

        function step(dir) {
            if (!currentGroup.length) return;
            currentIndex = (currentIndex + dir + currentGroup.length) % currentGroup.length;
            open();
        }

        overlay.querySelector(".vn-lightbox__close").addEventListener("click", close);
        overlay.querySelector(".vn-lightbox__prev").addEventListener("click", function () {
            step(-1);
        });
        overlay.querySelector(".vn-lightbox__next").addEventListener("click", function () {
            step(1);
        });

        overlay.addEventListener("click", function (e) {
            if (e.target === overlay) close();
        });

        document.addEventListener("keydown", function (e) {
            if (!overlay.classList.contains("is-open")) return;
            if (e.key === "Escape") close();
            if (e.key === "ArrowLeft") step(-1);
            if (e.key === "ArrowRight") step(1);
        });
    }

    /* ── Mobile navigation ── */
    function initMobileNav() {
        var trigger = document.querySelector(".mobile-nav-toggler");
        var mount = document.getElementById("nav-mobile");
        var source = document.getElementById("navbar");

        if (!trigger || !mount || !source || mount.dataset.vnReady) return;
        mount.dataset.vnReady = "1";

        var panel = document.createElement("nav");
        panel.className = "vn-mobile-panel";
        panel.setAttribute("aria-label", "Mobile navigation");
        panel.innerHTML = source.outerHTML;
        mount.appendChild(panel);

        var backdrop = document.createElement("div");
        backdrop.className = "vn-mobile-backdrop";
        mount.appendChild(backdrop);

        function toggle(open) {
            var isOpen = typeof open === "boolean" ? open : !document.body.classList.contains("vn-mobile-open");
            document.body.classList.toggle("vn-mobile-open", isOpen);
            trigger.setAttribute("aria-expanded", isOpen ? "true" : "false");
        }

        trigger.addEventListener("click", function (e) {
            e.preventDefault();
            toggle();
        });

        backdrop.addEventListener("click", function () {
            toggle(false);
        });

        panel.querySelectorAll("a").forEach(function (a) {
            a.addEventListener("click", function () {
                toggle(false);
            });
        });
    }

    ready(function () {
        initLazyImages();
        updateHoursStatus();
        setInterval(updateHoursStatus, 60000);
        initExpandable();
        initLoadMore();
        initSectionNav();
        initLightbox();
        initMobileNav();
    });
})();
