let itemsPerPage = 40;
            let list = document.getElementById('content');
            let pagination = document.getElementById('pagination');
            let items = Array.from(list.children);
            let totalPages = Math.ceil(items.length / itemsPerPage);

            function showPage(page) {
                let start = (page - 1) * itemsPerPage;
                let end = start + itemsPerPage;

                items.forEach((item, index) => {
                    if (index >= start && index < end) {
                        item.style.display = 'block';
                    } else {
                        item.style.display = 'none';
                    }
                });
            }

            function PaginationButtons() {
                for (let i = 1; i <= totalPages; i++) {
                    let li = document.createElement('a');
                    li.textContent = i;
                    li.addEventListener('click', () => showPage(i));
                    li.classList.add('page');
                    pagination.appendChild(li);
                }
            }

            function click(e) {
                if (e.target.tagName === 'LI') {
                    let pages = parseInt(e.target.textContent);
                    showPage(pages);
                }
            }
            pagination.addEventListener('click', click);
            showPage(1);
            PaginationButtons();