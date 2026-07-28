@extends('front_end._index')
@section('content')
    <nav class="mj-breadcrumb" aria-label="Breadcrumb">
        <div class="container-xxl">
            <ol class="mj-crumb-list">
                <li class="mj-crumb"><a href="{{ url('/') }}" title="Menujoys">Menujoys</a></li>
                <li class="mj-crumb mj-crumb-current" aria-current="page">{{ $page->title }}</li>
            </ol>
        </div>
    </nav>

    <section class="mj-legal-hero" aria-labelledby="ppTitle">
        <div class="container-xxl">
            <span class="mj-eyebrow">
                <span class="mj-eyebrow-dot" aria-hidden="true"></span>
                {{ $page->title }}
            </span>
            <h1 id="ppTitle" class="mj-page-title">{{ $page->title }}</h1>
            @if (!empty($page->description))
                <p class="mj-page-lede">{{ $page->description }}</p>
            @endif
            <p class="mj-legal-meta">
                <i class="bi bi-pencil-square" aria-hidden="true"></i>
                Last updated <strong>{{ optional($page->updated_at)->format('d/m/Y') }}</strong>
            </p>
        </div>
    </section>

    <section class="mj-legal-section-wrap">
        <div class="container-xxl" id="mjLegalContainer">
            {{-- Mặc định chỉ #content. Có H2 thì JS bọc layout + TOC --}}
            <div class="mj-legal-content" id="content">
                {!! $page->content !!}
            </div>
        </div>
    </section>

    <script>
        (function () {
            const container = document.getElementById('mjLegalContainer');
            const content = document.getElementById('content');
            if (!container || !content) return;

            const headings = Array.from(content.querySelectorAll('h2'));

            // Không có H2: giữ nguyên #content.mj-legal-content
            if (!headings.length) return;

            // Có H2: bọc layout + tạo TOC
            const layout = document.createElement('div');
            layout.className = 'mj-legal-layout';

            const tocWrap = document.createElement('aside');
            tocWrap.className = 'mj-legal-toc';
            tocWrap.setAttribute('aria-label', 'Table of contents');
            tocWrap.innerHTML =
                '<p class="mj-legal-toc-label"><i class="bi bi-list-ol" aria-hidden="true"></i> On this page</p>' +
                '<ul class="mj-legal-toc-list" id="mjLegalToc"></ul>';

            content.classList.remove('mj-legal-content');
            const article = document.createElement('article');
            article.className = 'mj-legal-content';
            article.id = 'content';
            while (content.firstChild) article.appendChild(content.firstChild);

            layout.appendChild(tocWrap);
            layout.appendChild(article);
            content.replaceWith(layout);

            const tocList = document.getElementById('mjLegalToc');
            if (!tocList) return;

            const slugify = (text, index) => {
                const base = String(text || '')
                    .toLowerCase()
                    .normalize('NFD')
                    .replace(/[\u0300-\u036f]/g, '')
                    .replace(/[^a-z0-9\s-]/g, '')
                    .trim()
                    .replace(/\s+/g, '-')
                    .replace(/-+/g, '-');
                return base || ('section-' + String(index + 1).padStart(2, '0'));
            };

            const usedIds = new Set(
                Array.from(document.querySelectorAll('[id]')).map((el) => el.id)
            );

            const uniqueId = (base) => {
                let id = base;
                let i = 2;
                while (usedIds.has(id)) {
                    id = base + '-' + i;
                    i += 1;
                }
                usedIds.add(id);
                return id;
            };

            const frag = document.createDocumentFragment();

            headings.forEach((h2, index) => {
                const title = (h2.textContent || '').trim();
                if (!title) return;

                // Gán id nếu chưa có
                if (!h2.id) {
                    h2.id = uniqueId(slugify(title, index));
                } else {
                    usedIds.add(h2.id);
                }

                // Thêm "Section 01" nếu chưa có
                const prev = h2.previousElementSibling;
                const hasSectionNum = prev && prev.classList.contains('mj-legal-section-num');
                if (!hasSectionNum) {
                    const num = document.createElement('p');
                    num.className = 'mj-legal-section-num';
                    num.textContent = 'Section ' + String(index + 1).padStart(2, '0');
                    h2.parentNode.insertBefore(num, h2);
                }

                const li = document.createElement('li');
                const a = document.createElement('a');
                a.href = '#' + h2.id;
                a.textContent = title;
                a.addEventListener('click', function (e) {
                    e.preventDefault();
                    const target = document.getElementById(h2.id);
                    if (!target) return;
                    target.scrollIntoView({ behavior: 'smooth', block: 'start' });
                    history.replaceState(null, '', '#' + h2.id);
                    tocList.querySelectorAll('a').forEach((el) => el.classList.remove('is-active'));
                    a.classList.add('is-active');
                });
                li.appendChild(a);
                frag.appendChild(li);
            });

            tocList.appendChild(frag);

            // Active TOC khi scroll
            const links = Array.from(tocList.querySelectorAll('a'));
            const map = headings
                .filter((h) => h.id)
                .map((h) => ({ id: h.id, el: h }));

            const setActive = () => {
                const offset = 120;
                let current = map[0]?.id;
                for (const item of map) {
                    const top = item.el.getBoundingClientRect().top;
                    if (top - offset <= 0) current = item.id;
                }
                links.forEach((a) => {
                    a.classList.toggle('is-active', a.getAttribute('href') === '#' + current);
                });
            };

            window.addEventListener('scroll', setActive, { passive: true });
            setActive();

            // Jump nếu URL có hash
            if (location.hash) {
                const target = document.querySelector(location.hash);
                if (target) {
                    setTimeout(() => {
                        target.scrollIntoView({ behavior: 'smooth', block: 'start' });
                    }, 50);
                }
            }
        })();
    </script>
@endsection
