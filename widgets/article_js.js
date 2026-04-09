(function() {
    function initWidget(widgetContainer) {
        if (widgetContainer.dataset.initialized) return;
        widgetContainer.dataset.initialized = "true";

        var errorMessage = widgetContainer.getAttribute("data-error-message") || "No results found";
        var categoryButtons = widgetContainer.querySelectorAll(".Article-category-filter-button");
        var searchInput = widgetContainer.querySelector(".article-input2");
        var searchButton = widgetContainer.querySelector(".article-submit-button");
        var cards = widgetContainer.querySelectorAll(".article-card");
        var grid = widgetContainer.querySelector(".articles-grid");
        var noResultsMsg = widgetContainer.querySelector(".error-message");

        var pendingCategoryId = sessionStorage.getItem("Article-pending-category-" + widgetContainer.id);
        if (pendingCategoryId) {
            sessionStorage.removeItem("Article-pending-category-" + widgetContainer.id);
            var targetBtn = widgetContainer.querySelector('.Article-category-filter-button[data-Article-category="' + pendingCategoryId + '"]');
            if (targetBtn) {
                categoryButtons.forEach(function(btn) { btn.classList.remove("active"); });
                targetBtn.classList.add("active");
            }
        } else {
            var allBtn = widgetContainer.querySelector('.Article-category-filter-button[data-Article-category="all"]');
            if (allBtn) allBtn.classList.add("active");
        }

        if (window.location.search.indexOf("Article-category=") !== -1) {
            var currentUrl = new URL(window.location.href);
            var urlCategoryId = currentUrl.searchParams.get("Article-category");
            categoryButtons.forEach(function(btn) {
                btn.classList.remove("active");
                if (btn.getAttribute("data-Article-category") === urlCategoryId) {
                    btn.classList.add("active");
                }
            });
        }

        function checkCategoryOverflow() {
            var categories = widgetContainer.querySelectorAll(".Article-category");
            var cardWidth = 0;
            categories.forEach(function(category) {
                var card = category.closest(".article-card");

                // Salta le card nascoste
                if (!card || card.style.display === "none") return;

                if (card && !cardWidth) { cardWidth = card.offsetWidth; }
                var maxWidth = cardWidth * 0.8;
                var tempSpan = document.createElement("span");
                tempSpan.style.visibility = "hidden";
                tempSpan.style.position = "absolute";
                tempSpan.style.whiteSpace = "nowrap";
                tempSpan.style.fontSize = window.getComputedStyle(category).fontSize;
                tempSpan.style.fontFamily = window.getComputedStyle(category).fontFamily;
                tempSpan.style.fontWeight = window.getComputedStyle(category).fontWeight;
                tempSpan.innerText = category.innerText;
                document.body.appendChild(tempSpan);
                var textWidth = tempSpan.offsetWidth;
                document.body.removeChild(tempSpan);
                if (textWidth > maxWidth) {
                    category.classList.add("category-vertical");
                } else {
                    category.classList.remove("category-vertical");
                }
            });
        }

        function updateFilters() {
            var searchTerm = searchInput ? searchInput.value.toLowerCase().trim() : "";
            var searchScope = searchInput ? searchInput.getAttribute("data-search-scope") : "title";
            var activeCategoryBtn = widgetContainer.querySelector(".Article-category-filter-button.active");
            var categoryId = activeCategoryBtn ? activeCategoryBtn.getAttribute("data-Article-category") : "all";

            var visibleCount = 0;
            cards.forEach(function(card) {
                var matchesCategory = (categoryId === "all" || card.classList.contains("Article-category-" + categoryId));
                var matchesSearch = true;
                if (searchTerm) {
                    var titleElem = card.querySelector(".Article-title");
                    var title = titleElem ? titleElem.textContent.toLowerCase() : "";
                    var content = "";
                    if (searchScope === "both") {
                        var descElem = card.querySelector(".Article-description");
                        content = descElem ? descElem.textContent.toLowerCase() : "";
                    }
                    matchesSearch = title.indexOf(searchTerm) !== -1 || content.indexOf(searchTerm) !== -1;
                }

                if (matchesCategory && matchesSearch) {
                    card.style.display = "block";
                    visibleCount++;
                } else {
                    card.style.display = "none";
                }
            });

            if (visibleCount === 0 && cards.length > 0) {
                if (!noResultsMsg || !noResultsMsg.classList.contains("js-no-results")) {
                    noResultsMsg = document.createElement("div");
                    noResultsMsg.className = "error-message js-no-results";
                    noResultsMsg.textContent = errorMessage;
                    if (grid) grid.parentNode.insertBefore(noResultsMsg, grid.nextSibling);
                }
                if (noResultsMsg) noResultsMsg.style.display = "block";
                if (grid) grid.style.display = "none";
            } else {
                if (noResultsMsg && noResultsMsg.classList.contains("js-no-results")) {
                    noResultsMsg.style.display = "none";
                }
                if (grid) grid.style.display = "grid";
            }

            checkCategoryOverflow();
        }
        requestAnimationFrame(function() {
            requestAnimationFrame(function() {
                updateFilters();
            });
        });

        var styleBlockToRemove = document.querySelector('style[data-widget="' + widgetContainer.id + '"]');
        if (styleBlockToRemove) styleBlockToRemove.remove();

        categoryButtons.forEach(function(button) {
            button.addEventListener("click", function(e) {
                e.preventDefault();
                var categoryId = this.getAttribute("data-Article-category");
                var currentUrl = new URL(window.location.href);

                var hasUrlFilters = currentUrl.searchParams.has("Article-date") ||
                                   currentUrl.searchParams.has("Article-tag") ||
                                   currentUrl.searchParams.has("Article-category");

                if (hasUrlFilters) {
                    sessionStorage.setItem("Article-pending-category-" + widgetContainer.id, categoryId);
                    currentUrl.searchParams.delete("Article-date");
                    currentUrl.searchParams.delete("Article-tag");
                    currentUrl.searchParams.delete("Article-category");
                    window.location.href = currentUrl.toString();
                } else {
                    categoryButtons.forEach(function(btn) { btn.classList.remove("active"); });
                    this.classList.add("active");
                    updateFilters();
                }
            });
        });

        if (searchInput) {
            searchInput.addEventListener("input", updateFilters);
        }
        if (searchButton) {
            searchButton.addEventListener("click", function(e) {
                e.preventDefault();
                updateFilters();
            });
        }

        var toggles = widgetContainer.querySelectorAll(".category-toggle");
        toggles.forEach(function(toggle) {
            toggle.addEventListener("click", function() {
                var parent = this.closest(".Article-category-card2");
                if (!parent) return;
                parent.classList.toggle("show-categories");
                this.textContent = parent.classList.contains("show-categories") ? "×" : "+";
            });
        });

        var resetButton = widgetContainer.querySelector(".Article-reset-filters");
        if (resetButton) {
            resetButton.addEventListener("click", function() {
                var currentUrl = new URL(window.location.href);
                currentUrl.searchParams.delete("Article-date");
                currentUrl.searchParams.delete("Article-tag");
                currentUrl.searchParams.delete("Article-category");
                sessionStorage.removeItem("Article-pending-category-" + widgetContainer.id);
                window.location.href = currentUrl.toString();
            });
        }

        setTimeout(checkCategoryOverflow, 300);
        window.addEventListener("resize", checkCategoryOverflow);

        if (searchInput) {
            var computedStyle = window.getComputedStyle(searchInput);
            var bgColor = computedStyle.backgroundColor;
            var textColor = computedStyle.color;
            searchInput.addEventListener("animationstart", function(e) {
                if (e.animationName === "onAutoFillStart") {
                    this.style.backgroundColor = bgColor;
                    this.style.color = textColor;
                }
            });
            searchInput.addEventListener("change", function() {
                this.style.backgroundColor = bgColor;
                this.style.color = textColor;
            });
        }
    }

    // MutationObserver: inizializza ogni widget non appena appare nel DOM
    var observer = new MutationObserver(function(mutations) {
        mutations.forEach(function(mutation) {
            mutation.addedNodes.forEach(function(node) {
                if (node.nodeType !== 1) return;
                if (node.classList && node.classList.contains("article-widget-container")) {
                    initWidget(node);
                }
                var nested = node.querySelectorAll ? node.querySelectorAll(".article-widget-container:not([data-initialized])") : [];
                nested.forEach(function(el) { initWidget(el); });
            });
        });
    });

    observer.observe(document.body, { childList: true, subtree: true });

    // Inizializza anche i widget già presenti nel DOM al momento del caricamento
    document.addEventListener("DOMContentLoaded", function() {
        document.querySelectorAll(".article-widget-container:not([data-initialized])").forEach(function(el) {
            initWidget(el);
        });
    });

    // Fallback per sicurezza
    window.addEventListener("load", function() {
        document.querySelectorAll(".article-widget-container:not([data-initialized])").forEach(function(el) {
            initWidget(el);
        });
    });

})();