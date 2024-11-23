document.getElementById('search-btn').addEventListener('click', function() {
    const searchTerm = document.getElementById('search-input').value;
    if (searchTerm) {
        // Ví dụ: Chuyển hướng đến trang tìm kiếm với từ khóa
        window.location.href = `search.html?q=${searchTerm}`;
    }
});
