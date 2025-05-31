/**
 * Hàm tải sidebar và tự động đánh dấu menu active
 */
function loadSidebar() {
    // Tải nội dung sidebar từ file
    fetch('partials/sidebar.html')
        .then(response => {
            if (!response.ok) {
                throw new Error('Không thể tải sidebar');
            }
            return response.text();
        })
        .then(data => {
            // Chèn sidebar vào đầu thẻ body
            document.body.insertAdjacentHTML('afterbegin', data);
            
            // Lấy tên file hiện tại (ví dụ: orders.html)
            const currentPage = window.location.pathname.split('/').pop();
            
            // Xóa tất cả class active cũ
            document.querySelectorAll('.sidebar .nav-link').forEach(link => {
                link.classList.remove('active');
            });
            
            // Thêm class active cho menu tương ứng
            let activeLink;
            switch(currentPage) {
                case 'index.html':
                case '':
                    activeLink = document.querySelector('.dashboard-link');
                    break;
                case 'products.html':
                    activeLink = document.querySelector('.products-link');
                    break;
                case 'customers.html':
                    activeLink = document.querySelector('.customers-link');
                    break;
                case 'orders.html':
                    activeLink = document.querySelector('.orders-link');
                    break;
                case 'promotions.html':
                    activeLink = document.querySelector('.promotions-link');
                    break;
                case 'reviews.html':
                    activeLink = document.querySelector('.reviews-link');
                    break;
                case 'reports.html':
                    activeLink = document.querySelector('.reports-link');
                    break;
                default:
                    activeLink = null;
            }
            
            if (activeLink) {
                activeLink.classList.add('active');
            }
            
            // Thiết lập sự kiện toggle cho sidebar
            setupSidebarToggle();
        })
        .catch(error => {
            console.error('Lỗi khi tải sidebar:', error);
            // Fallback UI nếu cần
            document.body.insertAdjacentHTML('afterbegin', `
                <div class="sidebar bg-dark">
                    <div class="p-3 text-white">
                        Menu tạm thời không khả dụng
                    </div>
                </div>
            `);
        });
}

/**
 * Hàm thiết lập sự kiện toggle sidebar trên mobile
 */
function setupSidebarToggle() {
    const sidebar = document.querySelector('.sidebar');
    const sidebarToggle = document.querySelector('.sidebar-toggle');
    const mainContent = document.querySelector('.main-content');
    
    if (sidebarToggle) {
        sidebarToggle.addEventListener('click', function() {
            sidebar.classList.toggle('show');
            mainContent.classList.toggle('sidebar-show');
        });
    }
}

/**
 * Xử lý các sự kiện cho trang sản phẩm
 */
function setupProductPage() {
    // Save product button
    const saveProductBtn = document.getElementById('saveProduct');
    if (saveProductBtn) {
        saveProductBtn.addEventListener('click', function() {
            const productName = document.getElementById('productName').value;
            const productCategory = document.getElementById('productCategory').value;
            
            if (productName && productCategory) {
                alert(`Sản phẩm "${productName}" đã được lưu thành công!`);
                bootstrap.Modal.getInstance(document.getElementById('addProductModal')).hide();
            } else {
                alert('Vui lòng điền đầy đủ thông tin sản phẩm!');
            }
        });
    }
    
    // Add hover effect to table rows
    const tableRows = document.querySelectorAll('#productTable tbody tr');
    tableRows.forEach(row => {
        row.addEventListener('mouseenter', function() {
            this.style.backgroundColor = 'rgba(0, 0, 0, 0.02)';
        });
        
        row.addEventListener('mouseleave', function() {
            this.style.backgroundColor = '';
        });
    });
    
    // Handle edit and delete buttons
    document.querySelectorAll('#productTable .btn-primary').forEach(btn => {
        btn.addEventListener('click', function(e) {
            e.preventDefault();
            const row = this.closest('tr');
            const productName = row.cells[2].textContent;
            alert(`Bạn đang chỉnh sửa sản phẩm: ${productName}`);
        });
    });
    
    document.querySelectorAll('#productTable .btn-danger').forEach(btn => {
        btn.addEventListener('click', function(e) {
            e.preventDefault();
            const row = this.closest('tr');
            const productName = row.cells[2].textContent;
            
            if (confirm(`Bạn có chắc muốn xóa sản phẩm "${productName}"?`)) {
                row.style.transition = 'all 0.3s ease';
                row.style.opacity = '0';
                
                setTimeout(() => {
                    row.remove();
                    alert(`Đã xóa sản phẩm "${productName}"`);
                }, 300);
            }
        });
    });
}

/**
 * Xử lý các sự kiện chung
 */
function setupCommonEvents() {
    // Simulate loading data
    setTimeout(() => {
        document.querySelectorAll('.card-body .h5').forEach(el => {
            el.style.transition = 'all 0.5s ease';
            el.style.color = '#4e73df';
            
            setTimeout(() => {
                el.style.color = '';
            }, 1000);
        });
    }, 500);
}

// Sự kiện khi DOM đã tải xong
document.addEventListener('DOMContentLoaded', function() {
    // Tải sidebar trước
    loadSidebar();
    
    // Thiết lập các sự kiện khác
    setupProductPage();
    setupCommonEvents();
    
    // Các xử lý khác có thể thêm vào đây
});

// Các hàm xử lý khác có thể đặt ở đây
function filterOrders(status) {
    console.log(`Lọc đơn hàng theo: ${status}`);
    // Thêm logic lọc đơn hàng ở đây
}

// Xử lý modal thêm khuyến mãi (nếu có trên trang)
if (document.getElementById('savePromotion')) {
    document.getElementById('savePromotion').addEventListener('click', function() {
        const promotionName = document.getElementById('promotionName').value;
        if (promotionName) {
            alert(`Khuyến mãi "${promotionName}" đã được thêm thành công!`);
            bootstrap.Modal.getInstance(document.getElementById('addPromotionModal')).hide();
        } else {
            alert('Vui lòng nhập tên chương trình khuyến mãi!');
        }
    });
}

// Xử lý duyệt đánh giá (nếu có trên trang)
document.querySelectorAll('#reviewTable .btn-success').forEach(btn => {
    btn.addEventListener('click', function() {
        const row = this.closest('tr');
        row.style.backgroundColor = '#e8f5e9';
        this.innerHTML = '<i class="fas fa-check-circle"></i> Đã duyệt';
        this.classList.remove('btn-success');
        this.classList.add('btn-secondary');
    });
});

// Xử lý filter đơn hàng (nếu có trên trang)
document.querySelectorAll('#filterOrders .dropdown-item').forEach(item => {
    item.addEventListener('click', function(e) {
        e.preventDefault();
        document.getElementById('filterOrders').innerHTML = 
            `<i class="fas fa-filter me-1"></i> ${this.textContent}`;
        filterOrders(this.textContent);
    });
});